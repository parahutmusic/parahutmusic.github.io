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
	$news_id = $_POST['news_id'];
	$news_name 	= $_POST['news_name'];
	$news_detail	= $_POST['news_detail'];

    	$sql2="update news set news_name = '$news_name', news_detail ='$news_detail' where news_id ='$news_id'";
	    $link_query2 = mysqli_query($link, $sql2); 
				 	echo "<script langquage='javascript'>\n";
					echo " window.location=\"adnews.php\"\n";
					echo  "alert('แก้ไขข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
 
?>
</body>
</html>
