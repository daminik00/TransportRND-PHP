<?php
  header("Content-Type: text/html; charset=utf-8");
  $url = "https://www.its-rnd.ru/pikasonline/rostov/stops.txt";
  $txt = file_get_contents($url);

  $handle = fopen($url, "r");
  $array = array();
  while (($line = fgets($handle)) !== false) {
    $array[] = $line;
  }
  fclose($handle);

  $array1 = array();
  for ($i = 1; $i < count($array); $i++) {
    $array1[] = $array[$i];
  }
  print_r($array1);
?>
