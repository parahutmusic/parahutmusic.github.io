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
	$ad_idimg = $_POST['ad_idimg'];
	$ad_img1 = $_FILES['ad_img1'];

	$logodir1="pic_slide/";   
	$pro_pic_file1 = $logodir1.basename($_FILES['ad_img1']['name']);
  	copy($_FILES['ad_img1']['tmp_name'],$pro_pic_file1); 
   
   $pic_file1 = substr($pro_pic_file1,4);
   
   if($_FILES["ad_img1"]["name"]=="")
		{
			echo "<script>alert('กรุณาเลือกรูปภาพสไลด์');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"adslide.php\"\n";
			echo	"</script>\n";	
		}else{
   	 $sql1="insert into slide (ad_idimg,ad_img1) VALUES('$ad_idimg','$pro_pic_file1')";
	 $link_query = mysqli_query($link, $sql1);
	 echo "<script langquage='javascript'>\n";
					echo " window.location=\"adslide.php\"\n";
					echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
   }
 
?>
</body>
</html>
