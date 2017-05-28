<?php

  $url = "https://www.its-rnd.ru/pikasonline/rostov/stops.txt";
  $txt = file_get_contents($url);

  $handle = fopen($url, "r");
  $array = array();
  while (($line = fgets($handle)) !== false) {
    echo $line."<br /><br />";
    $array[] = $line;
  }
  fclose($handle);
?>
