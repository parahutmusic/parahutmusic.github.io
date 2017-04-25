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
	$user_id 	= $_POST['user_id'];
    $user_name    = $_POST['user_name'];
    $user_pass    = $_POST['user_pass'];
    $news_pass = md5($user_pass);
	$name 	= $_POST['name'];
	$user_level   =  $_POST['user_level'];;


	$sql = "select *  from userparahut where user_name = '$user_name'"; 
	$db_query = mysqli_query($link, $sql);

		$rs = mysqli_fetch_array($db_query);		
        $user_name_db    = $rs['user_name'];

   if($user_name == "") {
	echo "<script>alert('กรุณาป้อน Username');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"ad_user.php\"\n";
	echo	"</script>\n";
	} else {
		if($user_pass == "") {
		echo "<script>alert('กรุณาป้อน Password');history.back();</script>";
		echo "<script langquage='javascript'>\n";
		echo " window.location=\"ad_user.php\"\n";
		echo	"</script>\n";
		} else {
			if($name == "") {
			echo "<script>alert('กรุณาป้อน ชื่อ - นามสกุล');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"ad_user.php\"\n";
			echo	"</script>\n";
		} else {
				if($user_level == "") {
				echo "<script>alert('กรุณาเลือก User');history.back();</script>";
				echo "<script langquage='javascript'>\n";
				echo " window.location=\"ad_user.php\"\n";
				echo	"</script>\n";
				} else {
					if($user_name == "$user_name_db") {
					echo "<script>alert('ไม่สามารถใช่ Username นี้ได้');history.back();</script>";
					echo "<script langquage='javascript'>\n";
					echo " window.location=\"ad_user.php\"\n";
					echo	"</script>\n";
				} else {
			  	$sql1="insert into userparahut (user_id,user_name,user_pass,name,user_level) VALUES('$user_id','$user_name','$news_pass','$name','$user_level')";
				$link_query1 = mysqli_query($link, $sql1);
						echo "<script langquage='javascript'>\n";
						echo " window.location=\"ad_user.php\"\n";
						echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
						echo	"</script>\n";
					}
				}
			}
		}
   }
?>
</body>
</html>
