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
	$band_id = $_POST['band_id'];
	$band_pic 	= $_FILES['band_pic'];
	
	$logodir1="pic_band_profile/";   
	$pro_pic_file1 = $logodir1.basename($_FILES['band_pic']['name']);
    copy($_FILES['band_pic']['tmp_name'],$pro_pic_file1); 
	
	if($_FILES["band_pic"]["name"]=="")
		{
			echo "<script>alert('กรุณาเลือกรูปภาพโปรไฟล์วง');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"edit_pic_band_profile.php?band_id=$band_id\"\n";
			echo	"</script>\n";	
		}else{
    $sql1="update band set band_pic = '$pro_pic_file1' where band_id ='$band_id'";
	 			 $link_query = mysqli_query($link, $sql1);			 	
					echo "<script langquage='javascript'>\n";
					echo "{";
					echo "if(confirm('แก้ไขรูปภาพเรียบร้อยแล้ว')==true)\n";
					echo "{";
					echo  "window.close();";
					echo "}";
					echo "}";
					echo	"</script>\n";
		}
?>
</body>
</html>
