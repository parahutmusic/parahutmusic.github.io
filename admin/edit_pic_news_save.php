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
	$photo_id = $_POST['photo_id'];
	$photo_name = $_FILES['photo_name'];
	
	$logodir1="pic_news/";   
	$pro_pic_file1 = $logodir1.basename($_FILES['photo_name']['name']);
    copy($_FILES['photo_name']['tmp_name'],$pro_pic_file1); 
	if($_FILES["photo_name"]["name"]=="")
		{
			echo "<script>alert('กรุณาเลือกรูปภาพข่าว');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"edit_pic_news.php?band_id=$band_id\"\n";
			echo	"</script>\n";	
		}else{
    $sql1="update photonews set photo_name = '$pro_pic_file1' where photo_id ='$photo_id'";
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
