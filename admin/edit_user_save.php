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
    $new_pass = md5($user_pass);
	$name 	= $_POST['name'];


	$sql = "select *  from userparahut where user_id = '$user_id'"; 
	$db_query = mysqli_query($link, $sql);

		$rs = mysqli_fetch_array($db_query);		
        $user_id_db    = $rs['user_id'];
        $user_name_db    = $rs['user_name'];
        $user_pass_db    = $rs['user_pass'];
        $name_db    = $rs['name'];


    $sql2 = "select *  from userparahut where user_name = '$user_name'"; 
	$db_query2 = mysqli_query($link, $sql2);

		$rs2 = mysqli_fetch_array($db_query2);		
        $user_id_db2    = $rs2['user_id'];
        $user_name_db2    = $rs2['user_name'];
        $user_pass_db2    = $rs2['user_pass'];
        $name_db2    = $rs2['name'];

if ($user_name == "") {
	echo "<script>alert('กรุณาป้อน Username');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"ad_user.php\"\n";
	echo	"</script>\n";
} else {
	if ($user_pass == "") {
		echo "<script>alert('กรุณาป้อน Password');history.back();</script>";
		echo "<script langquage='javascript'>\n";
		echo " window.location=\"ad_user.php\"\n";
		echo	"</script>\n";
	} else {
		if ($name == "") {
			echo "<script>alert('กรุณาป้อน ชื่อ - นามสกุล');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"ad_user.php\"\n";
			echo	"</script>\n";
		} else {
			if(($user_name == "$user_name_db2") && ($user_name != "$user_name_db")) {
				echo "<script>alert('ไม่สามารถใช่ Username นี้ได้');history.back();</script>";
				echo "<script langquage='javascript'>\n";
				echo " window.location=\"ad_user.php\"\n";
				echo	"</script>\n";
			} else {
				if(($user_name == "$user_name_db2") && ($user_name == "$user_name_db") && ($user_pass != "$user_pass_db")){
					$sql6="UPDATE userparahut set user_name = '$user_name', user_pass = '$new_pass', name = '$name' where user_id = '$user_id'";
						$link_query6 = mysqli_query($link, $sql6);
						echo "<script>alert('แก้ไขข้อมูล เรียบร้อย');</script>";
						echo "<script langquage='javascript'>\n";
						echo " window.location=\"ad_user.php\"\n";
						echo	"</script>\n";
				} else {
					if(($user_name == "$user_name_db2") && ($user_name == "$user_name_db")) {
						$sql5="UPDATE userparahut set user_name = '$user_name', name = '$name' where user_id = '$user_id'";
						$link_query5 = mysqli_query($link, $sql5);
						echo "<script>alert('แก้ไขข้อมูล เรียบร้อย');</script>";
						echo "<script langquage='javascript'>\n";
						echo " window.location=\"ad_user.php\"\n";
						echo	"</script>\n";
					} else {
						if (($user_pass == "$user_pass_db") && ($user_name != "$user_name_db2") ) {
							$sql3="UPDATE userparahut set user_name = '$user_name', name = '$name' where user_id = '$user_id'";
							$link_query3 = mysqli_query($link, $sql3);
							echo "<script>alert('แก้ไขข้อมูล เรียบร้อย');</script>";
							echo "<script langquage='javascript'>\n";
							echo " window.location=\"ad_user.php\"\n";
							echo	"</script>\n";
						} else {
							if ($user_pass != "$user_pass_db") {
								$sql4="UPDATE userparahut set user_name = '$user_name', user_pass = '$new_pass', name = '$name' where user_id = '$user_id'";
								$link_query4 = mysqli_query($link, $sql4);
								echo "<script>alert('แก้ไขข้อมูล เรียบร้อย');</script>";
								echo "<script langquage='javascript'>\n";
								echo " window.location=\"ad_user.php\"\n";
								echo	"</script>\n";
							}
						}
					}
				}
			}
		}
	}
}
?>
</body>
</html>
