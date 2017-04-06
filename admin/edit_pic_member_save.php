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
	$member_id = $_POST['news_id'];
	$member_pic 	= $_FILES['member_pic'];
	
	$logodir1="pic_member/";   
	$pro_pic_file1 = $logodir1.basename($_FILES['member_pic']['name']);
    copy($_FILES['member_pic']['tmp_name'],$pro_pic_file1); 
	if($_FILES["member_pic"]["name"]=="")
		{
			echo "<script>alert('กรุณาเลือกรูปภาพโปรไฟล์ศิลปิน');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"edit_pic_member.php?band_id=$band_id\"\n";
			echo	"</script>\n";	
		}else{
    $sql1="update member set member_pic = '$pro_pic_file1' where member_id ='$member_id'";
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
