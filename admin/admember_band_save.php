<?php 
include "check-login.php";
include "../admin/dblink.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>imgsave</title>
</head>

<body>
<?php 
$mb_id = $_GET['mb_id'];
$band_id = $_GET['band_id'];
$member_id = $_GET['member_id'];

		$mb_id		= $_POST['mb_id'];
		$member_id 	= $_POST['member_id'];
		$band_id	= $_POST['band_id'];
		
if(empty($member_id))
	{
	echo "<script>alert('กรุณาเลือกสมาชิก');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"admember_band.php?band_id=$band_id\"\n";
	echo	"</script>\n";	
	}else{
	 $sql="insert into memberband (mb_id,member_id,band_id)VALUES('$mb_id','$member_id','$band_id')";
	 $link_query = mysqli_query($link, $sql);
	 				echo "<script langquage='javascript'>\n";
					echo " window.location=\"admember_band.php?band_id=$band_id\"\n";
					echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
	}
?>
</body>
</html>
