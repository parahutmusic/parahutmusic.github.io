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
		$member_id 	= $_POST['member_id'];
		$prename 	= $_POST['prename'];
		$member_name 	= $_POST['member_name'];
		$member_nikname	= $_POST['member_nikname'];
		$member_edu 	= $_POST['member_edu'];
		$position = $_POST['position'];

	
	$sql="update member set prename = '$prename',member_name = '$member_name',member_nikname = '$member_nikname',member_edu = '$member_edu' ,position = '$position' where member_id = '$member_id'";
	 $link_query = mysqli_query($link, $sql);
	echo "<script langquage='javascript'>\n";
					echo " window.location=\"admember_show.php\"\n";
					echo  "alert('แก้ไขข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
?>
</body>
</html>
