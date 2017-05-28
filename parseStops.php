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
  for ($i = 0; $i < count($array); $i++) {
    $array2 = split(';', $array[$i]);
    $array1[] = array(
      "id" => $array2[0],
      "Lat" => $array2[1],
      "Lng" => $array2[2],
      "Stops" => $array2[3],
      "Name" => $array2[4],
      "Info" => $array2[5],
      "Street" => $array2[6],
      "Area" => $array2[7],
      "City" => $array2[8],
    );

    print_r($array1[$i]);
    echo "<br /><br />";
  }
?>
