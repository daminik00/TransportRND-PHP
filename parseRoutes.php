<?php
  header("Content-Type: text/html; charset=utf-8");
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

  $RouteNum = "";
  $Authority = "";
  $City = "";
  $Transport = "";
  $Operator = "";
  $ValidityPeriods = "";
  $SpecialDates = "";
  $RouteTag = "";
  for ($i = 0; $i < count($array1); $i++) {
      // echo count(split(';', $array1[$i]));
      $localArray = split(';', $array1[$i]);
      if ($localArray[0] == "" || $localArray[0] == " ") {} else $RouteNum = $localArray[0];
      if ($localArray[1] == "" || $localArray[1] == " ") {} else $Authority = $localArray[1];
      if ($localArray[2] == "" || $localArray[2] == " ") {} else $City = $localArray[2];
      if ($localArray[3] == "" || $localArray[3] == " ") {} else $Transport = $localArray[3];
      if ($localArray[4] == "" || $localArray[4] == " ") {} else $Operator = $localArray[4];
      if ($localArray[5] == "" || $localArray[5] == " ") {} else $ValidityPeriods = $localArray[5];
      if ($localArray[6] == "" || $localArray[6] == " ") {} else $SpecialDates = $localArray[6];
      if ($localArray[7] == "" || $localArray[7] == " ") {} else $RouteTag = $localArray[7];
      if ($i == 0) {
        $RouteNum = $localArray[0];
        $Authority = $localArray[1];
        $City = $localArray[2];
        $Transport = $localArray[3];
        $Operator = $localArray[4];
        $ValidityPeriods = $localArray[5];
        $SpecialDates = $localArray[6];
        $RouteTag = $localArray[7];
      }
      $info = array(
        "RouteNum" => $RouteNum,
        "Authority" => $Authority,
        "City" => $City,
        "Transport" => $Transport,
        "Operator" => $Operator,
        "ValidityPeriods" => $ValidityPeriods,
        "SpecialDates" => $SpecialDates,
        "RouteTag" => $RouteTag,
        "RouteTypes" => array(
          "ab" => array( // 8
            "Commercial" => $localArray[9],
            "RouteName" => $localArray[10],
            "Weekdays" => $localArray[11],
            "Streets" => $localArray[12],
            "RouteStops" => $localArray[13],
            "RouteStopsPlatforms" => $localArray[14],
          ),
          "ba" => array( // 22
            "Commercial" => $localArray[23],
            "RouteName" => $localArray[24],
            "Weekdays" => $localArray[25],
            "Streets" => $localArray[26],
            "RouteStops" => $localArray[27],
            "RouteStopsPlatforms" => $localArray[28],
          )
        )
      );
      $preFinalArray[] = $info;
      // echo "<pre>";
      // print_r($preFinalArray[$i]);
      // echo "</pre><br /><br />";
  }

  // echo "<pre>";
  // print_r(json_encode($preFinalArray));
  // echo "</pre>";
?>
