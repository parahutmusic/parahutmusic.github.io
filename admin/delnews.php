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
	 
	$news_id	= $_GET['news_id'];	
	
	$sql="delete from news where news_id = '$news_id';";
	$db_query=mysqli_query($link, $sql);
	
	$sql1="delete from photonews where news_id = '$news_id';";
	$db_query1=mysqli_query($link, $sql1);
	
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"adnews.php\"\n";
	echo	"</script>\n";
	?>
	
</body>
</html>
