<?php

  $url = 'https://www.its-rnd.ru/pikasonline/rostov/routes.txt';
  $txt = file_get_contents($url);
  // echo $txt;

  $handle = fopen($url, "r");
  $array = array();
  while (($line = fgets($handle)) !== false) {
    $array[] = $line;
  }
  fclose($handle);

  $array1 = array();
  for ($i = 0; $i < count($array); $i+=2) {
    $array1[] = "".$array[$i]."".$array[$i+1];
  }

  $array = array();
  for ($i = 1; $i < count($array1); $i++) {
    $array[] = $array1[$i];
  }
  $array1 = array();
  for ($i = 0; $i < count($array); $i+=2) {
    $array1[] = "".$array[$i]."".$array[$i+1];
  }
  $preFinalArray = array();
  for ($i = 0; $i < count($array1); $i++) {
      $preFinalArray[] = split(';', $array1[$i]);
  }

  print_r($preFinalArray);

?>
