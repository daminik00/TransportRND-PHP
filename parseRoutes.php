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
  unset($array1[0]);
  $array = array();
  for ($i = 0; $i < count($array1); $i+=2) {
    $array[] = "".$array1[$i]."".$array1[$i+1];
  }
  print_r($array);

?>
