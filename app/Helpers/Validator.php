<?php

namespace App\Helpers;

use App\Models\Model;


 /*  
  
 HOW TO USE?
 
 $validators  = [
      'name' => ['validators' => ['required' => true, 'split' => true, 'minLength' => 5, 'maxLength' => 50,]],
      'email' => ['validators' => ['required' => true, 'minLength' => 7, 'maxLength' => 30, 'email' => true]],
      'test' => ['validators' => ['required' => true, 'num' => true]],
    ];


    $validated = $this->Validator->validate( $validators); */


class Validator
{
  protected $Model;

  public function __construct()
  {
    $this->Model = new Model();
  }

  private function structureValidators($validators)
  {
    $ret = [];
    foreach ($validators as $key => $validator) {
      $validator['name'] = $key;
      $ret[] = $validator;
    }
    return $ret;
  }

  public function validate($validators)
  {
    $ret = [];
    $data = self::structureValidators($validators);


    foreach ($data as $index => $validatorsData) {
      $value = filter_var($_POST[$validatorsData['name']], FILTER_SANITIZE_SPECIAL_CHARS);
      $name = $data[$index]['name'];
      foreach ($validatorsData['validators'] as $validatorName => $validatorValue) {
        $ret[$name][$validatorName] = [
          'status' => $this->{$validatorName}($value, $validatorValue),
          'errorMessage' => !$this->{$validatorName}($value, $validatorValue) ? self::errorMessages($validatorName, $name, $validatorValue) : ''
        ];
      }
    }

    return self::getRecordsWithErrors($ret);
  }


  public function getRecordsWithErrors($validated)
  {
    $ret = [];
    foreach ($validated as $key => $record) {
      foreach ($record as $validator) {
        if (!empty($validator['errorMessage'])) $ret[$key][] = $validator['errorMessage'];
      }
    }

    return $ret;
  }

  public function hasValidateErrors($data)
  {
    foreach ($data as $value) {
      if (is_array($value)) {
        if (isset($value['status']) && $value['status'] === false) {
          return true;
        } elseif (self::hasValidateErrors($value)) {
          return true;
        }
      }
    }
    return false;
  }

  public function required($value)
  {
    if (!$value || $value === '') return false;
    return true;
  }

  public function minLength($value, $minLength)
  {
    if (strlen($value) < $minLength) return false;
    return true;
  }

  public function maxLength($value, $maxLength)
  {
    if (strlen($value) > $maxLength) return false;
    return true;
  }

  // Új validátor: Telefonszám formátum ellenőrzése
  public function phone($value)
  {
    // Tisztítja a számot szóközöktől és kötőjelekről
    $cleanValue = preg_replace('/[\s\-]/', '', $value);
    // Regex, ami +36 vagy 06 formátumot fogad el
    $pattern = '/^(?:\+36|06)\d{9}$/';

    return preg_match($pattern, $cleanValue);
  }

  // Új validátor: E-mail formátum ellenőrzése
  public function email($value)
  {
    return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
  }



  // Új validátor: Szóköz nélküli érték ellenőrzése
  public function noSpaces($value)
  {
    if (strpos($value, ' ') !== false) return false;
    return true;
  }

  // Új validátor: Csak szám ellenőrzés
  public function num($value)
  {
    if (!is_numeric($value)) return false;
    return true;
  }

  // Új validátor: Legalább egy számot tartalmaz
  public function hasNum($value)
  {
    return preg_match('/\d/', $value);
  }

  // Új validátor: Legalább egy nagybetűt tartalmaz
  public function hasUppercase($value)
  {
    return preg_match('/[A-Z]/', $value);
  }

  // Új validátor: Legalább két szó (szóköz alapú szétválasztás)
  public function split($value)
  {
    $words = explode(' ', trim($value));
    return count($words) >= 2 && strlen($words[1]) > 0;
  }

  // Új validátor: Jelszó összetettség ellenőrzése
  public function password($value)
  {
    $hasUpperCase = preg_match('/[A-Z]/', $value);
    $hasLowerCase = preg_match('/[a-z]/', $value);
    $hasNumber = preg_match('/\d/', $value);
    $hasSpecialChar = preg_match('/[!@#$%^&*(),.?":{}|<>]/', $value);
    $isLengthValid = strlen($value) >= 8;

    return $hasUpperCase && $hasLowerCase && $hasNumber && $hasSpecialChar && $isLengthValid;
  }

  // Új validátor: Jelszó összehasonlítás
  public function comparePw($password, $confirmPassword)
  {
    return $password === $confirmPassword;
  }

  // Validátor hibaüzenetek frissítése
  public function errorMessages($validator, $field = '', $param = '')
  {
    $messages = [
      'required' => [
        'Hu' => 'Kitöltés kötelező!',
      ],
      'minLength' => [
        'Hu' => "A mezőnek legalább {$param} karakter hosszúnak kell lennie.",
      ],
      'maxLength' => [
        'Hu' => "A mező nem lehet hosszabb, mint {$param} karakter.",
      ],
      'phone' => [
        'Hu' => "A telefonszám formátuma helytelen.",
      ],
      'email' => [
        'Hu' => "Az e-mail cím formátuma helytelen.",
      ],
      'noSpaces' => [
        'Hu' => 'A mező értéke nem tartalmazhat szóközt!',
      ],
      'num' => [
        'Hu' => 'A mező értéke csak szám lehet!',
      ],
      'hasNum' => [
        'Hu' => 'A mezőnek tartalmaznia kell legalább egy számot!',
      ],
      'hasUppercase' => [
        'Hu' => 'A mezőnek tartalmaznia kell legalább egy nagybetűt!',
      ],
      'split' => [
        'Hu' => 'A mezőnek minimum 2 szóból kell állnia.',
      ],
      'password' => [
        'Hu' => 'A jelszónak tartalmaznia kell legalább egy nagybetűt, egy kisbetűt, egy számot és egy speciális karaktert, valamint legalább 8 karakter hosszúnak kell lennie!',
      ],
      'comparePw' => [
        'Hu' => 'A 2 jelszó nem egyezik meg!',
      ],
    ];

    return $messages[$validator]['Hu'];
  }
}



