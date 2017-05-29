<?php
  $arrayStops = array();
  $arrayStopsId = array();

  function cordDecoder($c) {
    $str = "";
    for ($i = 0; $i < strlen($c); $i++) {
      $str .= $c[$i];
      if ($i == 1) {
        $str .= ".";
      }
    }
    return $str;
  }

  $mysqli = @new mysqli('mysql.daminik00.myjino.ru', 'daminik00', 'luabeo', 'daminik00_routes');
      if (mysqli_connect_errno()) {
        echo "Подключение невозможно: ".mysqli_connect_error();
      }

  $mysqli->query ("SET NAMES 'utf8'");

  $result_set = $mysqli->query ("SELECT * FROM `routes`");

  $ab = "";
	while (($row = $result_set->fetch_assoc()) != false) {
    $ab = $row["ab"];
    break;
    return;
	}

  $result_set = $mysqli->query ("SELECT * FROM `ab` WHERE id = '{$ab}'");

  while (($row = $result_set->fetch_assoc()) != false) {
    $arrayStopsId = split(',', $row["RouteStops"]);
	}

  // print_r($arrayStopsId);

  $result_set = $mysqli->query ("SELECT * FROM `stops`");

  while (($row = $result_set->fetch_assoc()) != false) {
    if (in_array($row['id'], $arrayStopsId)) {
      $lat = cordDecoder($row['Lat']);
      $lng = cordDecoder($row['Lng']);
      $arrayStops[] = array("lat" => $lat, "lng" => $lng);
    }
  }

  print_r($arrayStops);


?>
