<?php

// CONSTANTE BASE_HREF_WWW
$tempURL = implode("/", explode("/", 'http://'.$_SERVER['HTTP_HOST']. $_SERVER['PHP_SELF'], -3)).'/';
define("BASE_HREF_WWW", $tempURL .'/www/public/');

// CONSTANTE BASE_HREF_BACKOFFICE
define("BASE_HREF_BACKOFFICE", $tempURL .'/backoffice/public/');

 