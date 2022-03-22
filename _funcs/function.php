<?php
if (!function_exists('al')) {
  function al($datas)
  {
    $datas = trim(htmlspecialchars(htmlentities(strtolower($datas))));
    return $datas;
  }
  
}

if (!function_exists('redirection')) {
  function redirection($url){
    header('location: ' . $url);
  }
}


