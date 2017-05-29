<?php
  $arrayStops = array();
  $arrayStopsId = array();

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

  print_r($arrayStopsId);

?>
