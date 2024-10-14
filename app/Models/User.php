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
