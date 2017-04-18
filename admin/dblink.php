<?php 
error_reporting(E_ALL ^ E_NOTICE);
?>
<?php 
$user = 'root';
$password = 'root';
$db = 'parahutnew';
$host = 'localhost';
$port = 8889;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db,
   $port
);
?>
<?php
date_default_timezone_set('Asia/Bangkok');
?>