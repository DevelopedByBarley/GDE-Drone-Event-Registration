<?php

namespace App\Models;

use App\Models\Model;
use Exception;
use PDO;
use PDOException;

class User extends Model
{
  public function storeUser($attachment, $body)
  {
    $first_name = isset($body['first_name']) ? filter_var($body['first_name'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
    $last_name = isset($body['last_name']) ? filter_var($body['last_name'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
    $company = isset($body['company']) ? htmlspecialchars($body['company'], ENT_QUOTES | ENT_HTML5) : null;
    $org_unit = isset($body['org_unit']) ? filter_var($body['org_unit'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
    $post = isset($body['post']) ? filter_var($body['post'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
    $country = isset($body['country']) ? filter_var($body['country'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
    $post_code = isset($body['post_code']) ? filter_var($body['post_code'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
    $city = isset($body['city']) ? filter_var($body['city'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
    $street_and_num = isset($body['street_and_num']) ? filter_var($body['street_and_num'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
    $email = isset($body['email']) ? filter_var($body['email'], FILTER_SANITIZE_EMAIL) : null;
    $lunch = isset($body['lunch']) ? filter_var($body['lunch'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
    $authors = isset($body['authors']) ? filter_var($body['authors'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
    $conf_title = isset($body['conf_title']) ? filter_var($body['conf_title'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
    $conf_lang = isset($body['conf_lang']) ? filter_var($body['conf_lang'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
    $attachment = isset($attachment) ? filter_var($attachment, FILTER_SANITIZE_SPECIAL_CHARS) : null; // Assuming $attachment is a variable from outside $body
    $conf_theme = isset($body['conf_theme']) ? filter_var($body['conf_theme'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
    $comment = isset($body['comment']) ? filter_var($body['comment'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
    $is_instructor = isset($body['is_instructor']) ? filter_var($body['is_instructor'], FILTER_VALIDATE_BOOL) : false;
    $prefix = isset($body['prefix']) ? filter_var($body['prefix'], FILTER_SANITIZE_SPECIAL_CHARS) : null;




    try {
      $stmt = $this->Pdo->prepare("INSERT INTO `users` (prefix, first_name, last_name, company, org_unit, post, country, post_code, city, street_and_num, email, lunch, authors, conf_title, conf_lang, conf_theme, attachment, comment, is_instructor, created_at) 
VALUES (:prefix, :first_name, :last_name, :company, :org_unit, :post, :country, :post_code, :city, :street_and_num, :email, :lunch, :authors, :conf_title, :conf_lang, :conf_theme, :attachment, :comment, :is_instructor, current_timestamp())
");

      $stmt->bindParam(":prefix", $prefix, PDO::PARAM_STR);
      $stmt->bindParam(":first_name", $first_name, PDO::PARAM_STR);
      $stmt->bindParam(":last_name", $last_name, PDO::PARAM_STR);
      $stmt->bindParam(":company", $company, PDO::PARAM_STR);
      $stmt->bindParam(":org_unit", $org_unit, PDO::PARAM_STR);
      $stmt->bindParam(":post", $post, PDO::PARAM_STR);
      $stmt->bindParam(":country", $country, PDO::PARAM_STR);
      $stmt->bindParam(":post_code", $post_code, PDO::PARAM_STR);
      $stmt->bindParam(":city", $city, PDO::PARAM_STR);
      $stmt->bindParam(":street_and_num", $street_and_num, PDO::PARAM_STR);
      $stmt->bindParam(":email", $email, PDO::PARAM_STR);
      $stmt->bindParam(":lunch", $lunch, PDO::PARAM_STR);
      $stmt->bindParam(":authors", $authors, PDO::PARAM_STR);
      $stmt->bindParam(":conf_title", $conf_title, PDO::PARAM_STR);
      $stmt->bindParam(":conf_lang", $conf_lang, PDO::PARAM_STR);
      $stmt->bindParam(":conf_theme", $conf_theme, PDO::PARAM_STR);
      $stmt->bindParam(":attachment", $attachment, PDO::PARAM_STR);
      $stmt->bindParam(":comment", $comment, PDO::PARAM_STR);
      $stmt->bindParam(":is_instructor", $is_instructor, PDO::PARAM_BOOL);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      // Hibakezelés
      echo "Hiba: " . $e->getMessage();
      return false;
    }
  }


  public function loginUser($body)
  {
    try {

      $email = filter_var($body["email"] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
      $pw = filter_var($body["password"] ?? '', FILTER_SANITIZE_EMAIL);



      $stmt = $this->Pdo->prepare("SELECT * FROM `users` WHERE `email` = :email");
      $stmt->bindParam(":email", $email, PDO::PARAM_STR);
      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if (!$user || !password_verify($pw, $user["password"])) {
        return false;
      }


      return $user['id'];
    } catch (PDOException $e) {
      throw new  Exception("An error occurred during the database operation in loginUser method: " . $e->getMessage(), 1);
      exit;
    }
  }
}



/**
 *   public function storeUser($attachment, $body)
  {
    $name = filter_var($body["name"] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($body["email"] ?? '', FILTER_SANITIZE_EMAIL);
    $company = filter_var($body["company"] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = filter_var($body["phone"] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
    $conf_theme = filter_var($body["conf_theme"] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
    $attachment = filter_var($attachment ?? null, FILTER_SANITIZE_SPECIAL_CHARS);
    $is_instructor = filter_var($body["is_instructor"] ?? false, FILTER_VALIDATE_BOOL);

  

    try {
      $stmt = $this->Pdo->prepare("INSERT INTO `users` (`email`, `name`, `company`, `phone`, `conf_theme`, `attachment`, `is_instructor`, `created_at`)
      VALUES (:email, :name, :company, :phone, :conf_theme, :attachment, :is_instructor, current_timestamp())");

      $stmt->bindParam(":email", $email, PDO::PARAM_STR);
      $stmt->bindParam(":name", $name, PDO::PARAM_STR);
      $stmt->bindParam(":company", $company, PDO::PARAM_STR);
      $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
      $stmt->bindParam(":conf_theme", $conf_theme, PDO::PARAM_STR);
      $stmt->bindParam(":attachment", $attachment, PDO::PARAM_STR);
      $stmt->bindParam(":is_instructor", $is_instructor, PDO::PARAM_BOOL);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      throw new Exception("An error occurred during the database operation in storeUser method: " . $e->getMessage());
    }
  }
 * 
 */
