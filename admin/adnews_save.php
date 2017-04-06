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
	$news_id = $_POST['news_id'];
	$news_name = $_POST['news_name'];
	$news_detail = $_POST['news_detail'];
	$news_date = $_POST['news_date'];
	
	$photo_id = $_POST['photo_id'];
	$photo_name = $_FILES['photo_name'];
	
	$logodir1="pic_news/";   
	$pro_pic_file1 = $logodir1.basename($_FILES['photo_name']['name']);
   copy($_FILES['photo_name']['tmp_name'],$pro_pic_file1); 
   
   $pic_file1 = substr($pro_pic_file1,4);
   
   if($_FILES["photo_name"]["name"]=="")
	{
	echo "<script>alert('กรุณาเลือกรูปภาพด้วยครับ');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"adnews.php\"\n";
	echo	"</script>\n";
		
	}else{
   if(empty($news_name))
	{
	echo "<script>alert('กรุณาป้อนชื่อหัวข้อด้วยครับ');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"adnews.php\"\n";
	echo	"</script>\n";
	}else{
			if(empty($news_detail))
			{
		echo "<script>alert('กรุณาป้อน รายละเอียดข่าวสาร/กิจกรรม ด้วยครับ');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"adnews.php\"\n";
			echo	"</script>\n";
			
			}else{
  	 $sql2="insert into news (news_id,news_name,news_date,news_detail,photo_id) 		VALUES('$news_id','$news_name','$news_date','$news_detail','$photo_id')";
	 //echo	"$sql2";
	 $link_query2 = mysqli_query($link, $sql2);
	
	 
   	 $sql1="insert into photonews (photo_id,photo_name,news_id) 
	 VALUES('$photo_id','$pro_pic_file1','$news_id')";
	 //echo	"$sql1";
	 $link_query = mysqli_query($link, $sql1);
	 				echo "<script langquage='javascript'>\n";
					echo " window.location=\"adnews.php\"\n";
					echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
   }
   }
   }
?>
</body>
</html>
