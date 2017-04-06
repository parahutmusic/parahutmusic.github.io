<?php 
include "check-login.php";
include "dblink.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset="utf-8" />
<title>imgsave</title>
</head>

<body>
<?php 

	$cat_id = $_GET['cat_id'];
	$cat_id = $_POST['cat_id'];
	$cat_name = $_POST['cat_name'];
	
   if(empty($cat_name))
	{
	echo "<script>alert('กรุณาป้อน หมวดหมู่ ด้วยครับ');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"update_categories.php?cat_id=$cat_id\"\n";
	echo	"</script>\n";
	}else{

  	 $sql="update categories set cat_name = '$cat_name' where categories . cat_id ='$cat_id'";
	 $link_query = mysqli_query($link,$sql);
					echo "<script langquage='javascript'>\n";
					echo " window.location=\"index.php\"\n";
					echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
   }
?>
</body>
</html>
