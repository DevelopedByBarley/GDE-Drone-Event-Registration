<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User;
use Exception;
use PDO;

class UserController extends Controller
{
  private $User;

  public function __construct()
  {
    $this->User = new User();
    parent::__construct();
  }



  public function store()
  {
    session_start();
    //$this->CSRFToken->check();

    $instructor = isset($_POST['is_instructor']) ? (bool)$_POST['is_instructor'] : null;

    $attachment = isset($_FILES['attachment']) ? $_FILES['attachment'] : null;



    $validators  = [
      'first_name' => ['validators' => ['required' => true, 'minLength' => 3, 'maxLength' => 100]],
      'last_name' => ['validators' => ['required' => true, 'minLength' => 3, 'maxLength' => 100]],
      'company' => ['validators' => ['required' => true, 'minLength' => 3, 'maxLength' => 500]],
      'org_unit' => ['validators' => ['required' => true, 'minLength' => 3, 'maxLength' => 200]],
      'post' => ['validators' => ['required' => true, 'minLength' => 3, 'maxLength' => 200]],
      'country' => ['validators' => ['required' => true, 'minLength' => 3, 'maxLength' => 200]],
      'post_code' => ['validators' => ['required' => true, 'minLength' => 3, 'maxLength' => 10]],
      'city' => ['validators' => ['required' => true, 'minLength' => 3, 'maxLength' => 100]],
      'street_and_num' => ['validators' => ['required' => true, 'minLength' => 3, 'maxLength' => 100]],
      'email' => ['validators' => ['required' => true, 'minLength' => 7, 'maxLength' => 30, 'email' => true]],
    ];



    // Csak akkor adjuk hozzá a 'is_instructor' validációt, ha jelen van az inputban
    if ($instructor && pathinfo($_SERVER['HTTP_REFERER'])["basename"] === "instructor") {
      $validators['authors'] = ['validators' => ['required' => true, 'minLength' => 3, 'maxLength' => 1000]];
      $validators['conf_title'] = ['validators' => ['required' => true, 'minLength' => 3, 'maxLength' => 200]];
      $validators['conf_lang'] = ['validators' => ['required' => true, 'minLength' => 3, 'maxLength' => 100]];
      $validators['conf_theme'] = ['validators' => ['required' => true]];
      $_POST['is_instructor'] = $instructor;

      // --------- Make attach required if we need!
      /* if (!$attachment) {
        $this->Alert->set('Csatolmány feltöltése kötelező!', 'danger', $_SERVER['HTTP_REFERER'], null);
      } */
    }


    $errors = $this->Validator->validate($validators);
    $user_exist = $this->Model->selectByRecord('users', 'email', filter_var($_POST['email'], FILTER_SANITIZE_EMAIL), PDO::PARAM_STR);

    if ($user_exist) {
      $errors['email'] = [$_COOKIE['lang'] === "hu" ? "Ezekkel az adatokkal már regisztráltak, kérjük próbálkozzon másik e-mail címmel" : "This email address is already registered, please try another email address."];
    }


    if (!empty($errors)) {
      $_SESSION['errors'] = $errors;
      $_SESSION['prev'] = $_POST;
      $this->Alert->set("Regisztráció sikertelen, kérjük próbálja meg más adatokkal!", 'danger', $_SERVER['HTTP_REFERER'], "Registration unsuccessful, please try with different data!");
    }

    if ($attachment) {
      $attachment = $this->FileSaver->saver($_FILES['attachment'], 'uploads', null, null);
    }


    $isSuccess = $this->User->storeUser($attachment, $_POST);

    if (!$isSuccess) {
      $this->Alert->set("Regisztráció sikertelen, kérjük próbálja meg más adatokkal!", 'danger', $_SERVER['HTTP_REFERER'], "Registration unsuccessful, please try with different data!");
      $_SESSION['prev'] = $_POST;
    }

    if (isset($_SESSION['errors'])) unset($_SESSION['errors']);
    if (isset($_SESSION['prev'])) unset($_SESSION['prev']);
    $this->Alert->set('Regisztráció sikeres!', 'success', $_SERVER['HTTP_REFERER'], "Registration successful!");
  }



  /* 
  public function index()
  {
    $userId = $this->Auth->checkUserIsLoggedInOrRedirect('userId', '/user/login');

    echo $this->Render->write("public/Layout.php", [
      "csrf" => $this->CSRFToken,
      "content" => $this->Render->write("public/pages/user/Dashboard.php", [
        "user" => $this->Model->show('users', $userId)

      ])
    ]);
  }

  public function registerPage()
  {
    session_start();


    $user = $_SESSION["userId"] ?? null;

    if ($user) {
      header("Location: /user/dashboard");
      exit;
    }


    echo $this->Render->write("public/Layout.php", [
      "content" => $this->Render->write("public/pages/user/Register.php", [
        "csrf" => $this->CSRFToken
      ])
    ]);
  }



  public function loginPage()
  {
    session_start();

    $user = $_SESSION["userId"] ?? null;

    if ($user) {
      header("Location: /user/dashboard");
      exit;
    }


    echo $this->Render->write("public/Layout.php", [
      "content" => $this->Render->write("public/pages/user/Login.php", [
        "csrf" => $this->CSRFToken
      ])
    ]);
  }
 */




  public function login()
  {
    try {
      $this->CSRFToken->check();


      $userId = $this->User->loginUser($_POST);


      if ($userId) {
        session_write_close(); // Bezárjuk a sessiont
        $session_timeout = 6000;
        session_set_cookie_params($session_timeout, '/', '', true, true); // secure és httponly flag beállítása
        session_start();
        session_regenerate_id(true);
        $_SESSION['userId'] = $userId;
        header('Location: /user/dashboard');
        exit;
      } else {
        $this->Toast->set('Hibás e-mail cím vagy jelszó!', 'danger', '/user/login', null);
      }
    } catch (Exception $e) {
      http_response_code(500);
      echo "Internal Server Error" . $e->getMessage();
      exit;
    }
  }




  public function logout()
  {
    try {
      $this->CSRFToken->check();
      session_start();
      session_destroy();
      session_regenerate_id(true);

      $cookieParams = session_get_cookie_params();
      setcookie(session_name(), "", 0, $cookieParams["path"], $cookieParams["domain"], $cookieParams["secure"], isset($cookieParams["httponly"]));

      header("Location: /user/login");
      exit;
    } catch (Exception $e) {
      http_response_code(500);
      echo "Internal Server Error" . $e->getMessage();
      exit;
    }
  }
}
