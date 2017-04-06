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
		$band_id 	= $_POST['band_id'];
		$band_name 	= $_POST['band_name'];
		$music 	= $_POST['music'];
		$band_pic 	= $_FILES['band_pic'];
		$band_dt 	= $_FILES['band_dt'];
	
	$logodir1="pic_band_profile/";   
	$pro_pic_file1 = $logodir1.basename($_FILES['band_pic']['name']);
  	copy($_FILES['band_pic']['tmp_name'],$pro_pic_file1); 
   
    $logodir2="pic_band_detail/";   
	$pro_pic_file2 = $logodir2.basename($_FILES['band_dt']['name']);
  	copy($_FILES['band_dt']['tmp_name'],$pro_pic_file2);
	
   $pic_file1 = substr($pro_pic_file1,4);
   $pic_file2 = substr($pro_pic_file2,4);
   
   if($_FILES["band_pic"]["name"]=="")
	{
	echo "<script>alert('กรุณาเลือกรูปภาพโปรไฟล์วง');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"adband.php\"\n";
	echo	"</script>\n";
		
	}else{
		if($_FILES["band_dt"]["name"]=="")
		{
			echo "<script>alert('กรุณาเลือกรูปภาพหน้ารายละเอียดวง');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"adband.php\"\n";
			echo	"</script>\n";	
		}else{
			if(empty($band_name))
		{
			echo "<script>alert('กรุณาใส่ชื่อวงด้วยครับ');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"adband.php\"\n";
			echo	"</script>\n";	
		}else{	
	$sql="insert into band (band_id,band_name,music,band_pic,band_dt)VALUES('$band_id','$band_name','$music','$pro_pic_file1','$pro_pic_file2')";
	$link_query = mysqli_query($link, $sql);
					echo "<script langquage='javascript'>\n";
					echo " window.location=\"adband.php\"\n";
					echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
			}
		}
	}
?>
</body>
</html>
