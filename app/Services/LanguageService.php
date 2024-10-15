<?php

namespace App\Services;

class LanguageService
{
  public function language()
  {

    if (isset($_COOKIE['lang'])) return;
    $expiration_date = time() + (7 * 24 * 60 * 60);
    $ret = "";

    // Böngésző által preferált nyelv kinyerése
    $browser_language = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : '';
    $preferred_languages = explode(',', $browser_language);
    $language = strtolower(trim(explode(';', $preferred_languages[0])[0]));

    // Engedélyezett nyelvek ellenőrzése
    if ($language === "hu-hu") {
      $ret = "hu";
    } else {
      $ret = "en";
    }

    // Biztonságos sütikezelés
    $cookie_name = "lang";
    $cookie_value = ($ret === "hu" || $ret === "en") ? $ret : "en"; // Csak engedélyezett értékek
    setcookie($cookie_name, $cookie_value, $expiration_date, "/", "", false, false); // HttpOnly és Secure opciók
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit;
  }

  // NYELV VÁLTÁSA
  public function switchLanguage($lang)
  {
    $expiration_date = time() + (7 * 24 * 60 * 60);
    $referer = $_SERVER["HTTP_REFERER"] ?? '/'; // Ellenőrizze a referer URL-t
    $cookie_value = $lang['value'];
    // Engedélyezett nyelvek
    $allowedLanguages = ['hu', 'en']; // Kisbetűs nyelvi kódok
    $cookie_name = "lang";


    // A sütibe írt nyelv érvényesítése
    $accepted_langs = in_array($cookie_value, $allowedLanguages);

    if (!$accepted_langs) {
      return false;
    }


    // Biztonságos sütikezelés
    setcookie($cookie_name, $cookie_value, $expiration_date, "/", "", false, true); // HttpOnly opció

    // Visszatérés a referer URL-re
    header("Location: $referer");
    exit();
  }
}
