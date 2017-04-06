<?php 
include "check-login.php";
include "../admin/dblink.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset="utf-8" />
<title>imgsave</title>
</head>

<body>
<?php 
	$live_id = $_POST['live_id'];
	$live_url = $_POST['live_url'];
	$live_date = $_POST['live_date'];


   if(empty($live_url))
	{
	echo "<script>alert('กรุณาป้อน url ด้วยครับ');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"adlive.php\"\n";
	echo	"</script>\n";
	}else{
  	 $sql1="insert into live (live_id,live_url,live_date) VALUES('$live_id','$live_url','$live_date')";
	 $link_query1 = mysqli_query($link, $sql1);
					echo "<script langquage='javascript'>\n";
					echo " window.location=\"adlive.php\"\n";
					echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
   }
?>
</body>
</html>
