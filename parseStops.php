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
    $array = split(';', $array[$i]);
    $array1[] = array(
      "id" => $array[0],
      "Lat" => $array[1],
      "Lng" => $array[2],
      "Stops" => $array[3],
      "Name" => $array[4],
      "Info" => $array[5],
      "Street" => $array[6],
      "Area" => $array[7],
      "City" => $array[8],
    );

    print_r($array1[$i]);
    echo "<br /><br />";
  }
?>
