<?php

  $url = 'https://www.its-rnd.ru/pikasonline/rostov/routes.txt?1495875600000';
  $txt = file_get_contents($url);
  echo $txt;
?>
