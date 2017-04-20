<?php 
error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
$link = @mysqli_connect("mysql.hostinger.in.th", "u242059028_store", "123456789", "u242059028_store") or die(mysqli_connect_error(ติดต่อฐานข้อมูลไม่ได้));
mysqli_set_charset($link, "utf8");
?> 
<?php
date_default_timezone_set('Asia/Bangkok');
?>
