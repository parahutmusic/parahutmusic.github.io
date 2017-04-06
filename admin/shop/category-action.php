<?php 
include "check-login.php";
include "dblink.php";
?>
<?php
if($_POST['action'] == "edit") {
	$cat = $_POST['cat'];
	$id = $_POST['cat_id'];
	$sql = "UPDATE categories SET cat_name = '$cat' WHERE cat_id = $cat_id";
	mysqli_query($link, $sql);
}
if($_POST['action'] == "del") {
	$id = $_POST['cat_id'];
	$sql = "DELETE FROM categories WHERE cat_id = $cat_id";
	mysqli_query($link, $sql);
}
mysqli_close($link);
?>