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
	 
	$pay_id	= $_GET['pay_id'];	
	
	$sql="delete from payments where pay_id = '$pay_id';";
	$db_query=mysqli_query($link, $sql);
	
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"ad_bank.php\"\n";
	echo	"</script>\n";
	?>
	
</body>
</html>
