<?php 
session_start();
include "../admin/dblink.php";

$user_name = $_POST['user_name'];
$user_pass = $_POST['user_pass'];

if($user_name == '') {
	echo "<script>alert('กรุณาป้อน ชื่อผู้ใช้');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"index.php\"\n";
	echo	"</script>\n";
} else if ($user_pass == '') {
	echo "<script>alert('กรุณากรอก รหัสผ่าน');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"index.php\"\n";
	echo	"</script>\n";
} else {

	$sql = mysqli_query("SELECT * FROM userparahut WHERE userparahut.user_name = '$user_name' AND userparahut.user_pass = '$user_pass'");

	$num = mysqli_num_rows($link , $sql);

	if($num <= 0){
	echo "<script>alert('ไม่มีชื่อผู้ใช้อยู่ในระบบ');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"index.php\"\n";
	echo	"</script>\n";
	} else {
		while ($user = mysqli_fetch_array($link , $sql)) {
			//admin
			if($user['user_level'] == 1)
			{
				$_SESSION['admin'] = session_id();
				$_SESSION['user_name'] = $user['user_name'];
				$_SESSION['user_level'] = "Admin-Parahut";

				echo "<meta http-equiv='refresh' content='1;URL=admin_home.php'>";

			} else {

				$_SESSION['ses_id'] = session_id();
				$_SESSION['user_name'] = $user['user_name'];
				$_SESSION['user_level'] = "User-Parahut";

				echo "<meta http-equiv='refresh' content='1;URL=user_home.php'>";

			}
		}
	}
}

?>
