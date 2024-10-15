<?php
function getStringByLang($titleInHu, $titleInEn)
{
  $lang = $_COOKIE["lang"] ?? null;

  if ($lang === "hu") {
    return $titleInHu;
  } else {
    return $titleInEn;
  }
}
