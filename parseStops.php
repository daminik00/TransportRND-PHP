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
    );
  }

  $mysqli = @new mysqli('mysql.daminik00.myjino.ru', 'daminik00', 'luabeo', 'daminik00_routes');
      if (mysqli_connect_errno()) {
        echo "Подключение невозможно: ".mysqli_connect_error();
      }

  $mysqli->query ("SET NAMES 'utf8'");
// for ($i = 0; $i < count($array1); $i++) {
  for ($i = 800; $i < 1000; $i++) {
    $handle = fopen($array1[$i]['id'].'.png', "w");
    fwrite($handle, file_get_contents("https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=".$array1[$i]['id']));
    fclose($handle);
    // $mysqli->query ("
    //   INSERT INTO `stops` (
    //       `id`,
    //       `Lat`,
    //       `Lng`,
    //       `Stops`,
    //       `Name`,
    //     ) VALUES (
    //         '{$array1[$i]['id']}',
    //         '{$array1[$i]['Lat']}',
    //         '{$array1[$i]['Lng']}',
    //         '{$array1[$i]['Stops']}',
    //         '{$array1[$i]['Name']}',
    //       )
    //   ");
  }
  print_r($array1);
  // "Info" => $array2[5],
  // "Street" => $array2[6],
  // "Area" => $array2[7],
  // "City" => $array2[8],
?>
