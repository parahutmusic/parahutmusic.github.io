<?php 
include "dblink.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
	<?php
	 
	$order_id	= $_GET['order_id'];	
	
	$sql="delete from tb_order where order_id = '$order_id';";
	$db_query=mysqli_query($link, $sql);

	$sql2="delete from tb_order_detail where order_id = '$order_id';";
	$db_query2=mysqli_query($link, $sql2);
	
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"ad_order.php\"\n";
	echo	"</script>\n";
	?>
	
</body>
</html>
