<?php 
include "check-login.php";
include "../admin/dblink.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>โปรแกรมตัวอย่างภาษา PHP</title>
</head>

<body>
<?php 
		$band_id 	= $_POST['band_id'];
		$band_name 	= $_POST['band_name'];
		$music 	= $_POST['music'];

	$sql="update band set band_name = '$band_name',music = '$music' where band_id = '$band_id'";
	 $link_query = mysqli_query($link, $sql);
					echo "<script langquage='javascript'>\n";
					echo " window.location=\"adband.php\"\n";
					echo  "alert('แก้ไขข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
		
?>
</body>
</html>
