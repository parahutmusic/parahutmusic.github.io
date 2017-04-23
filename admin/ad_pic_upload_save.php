<?php 
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
	$pic_upid = $_POST['pic_upid'];
	$pic_name = $_FILES['pic_name'];
	$date = date("d-m-Y");

	$logodir1="pic_upload/";   
	$pro_pic_file1 = $logodir1.basename($_FILES['pic_name']['name']);

	//เอาชื่อไฟล์ที่มีอักขระแปลกๆออก
	$remove_these = array(' ','`','"','\'','\\','/','_');
	$newname = str_replace($remove_these, '', $_FILES['pic_name']['name']);
 
	//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
	$newname = time().'-'.$newname;
	$path_copy=$path.$newname;
	$path_link="pic_upload/".$newname;

  	copy($_FILES['pic_name']['tmp_name'],$path_link); 
   
   
   if($_FILES["pic_name"]["name"]=="")
		{
			echo "<script>alert('กรุณาเลือกรูปภาพ');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"adslide.php\"\n";
			echo	"</script>\n";	
		}else{
   	 $sql1="insert into pic_upload (pic_upid,pic_name) VALUES('$pic_upid','$path_link')";
	 $link_query = mysqli_query($link, $sql1);
	 echo "<script langquage='javascript'>\n";
					echo " window.location=\"ad_pic_upload.php\"\n";
					echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
   }
 
?>
</body>
</html>
