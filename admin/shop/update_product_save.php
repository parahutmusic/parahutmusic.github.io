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
$pro_id = $_GET['pro_id'];
		$pro_id = $_POST['pro_id'];
		$pro_name 	= $_POST['pro_name'];
		$cat_id = $_POST['cat_id'];
		$cat_name = $_POST['cat_name'];
		$price = $_POST['price'];
		$detail = $_POST['detail'];
		$img = $_FILES['img'];
		
		
	$logodir1="pic_product/";  
	$pro_pic_file1 = $logodir1.basename($_FILES['img']['name']);
    copy($_FILES['img']['tmp_name'],$pro_pic_file1); 
   
   $pic_file1 = substr($pro_pic_file1,4);
   
   if($_FILES["img"]["name"]=="")
	{
	$sql = "update products set pro_name = '$pro_name',cat_id = '$cat_id', price = '$price', detail = '$detail' where products . pro_id ='$pro_id'";
	$link_query = mysqli_query($link,$sql);
					echo "<script langquage='javascript'>\n";
					echo " window.location=\"ad_product.php\"\n";
					echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
			//echo $sql;
		
	}else{
		$sql = "update products set pro_name = '$pro_name',cat_id = '$cat_id', price = '$price', detail = '$detail', img = '$pro_pic_file1' where products . pro_id ='$pro_id'";
	$link_query = mysqli_query($link,$sql);
					echo "<script langquage='javascript'>\n";
					echo " window.location=\"ad_product.php\"\n";
					echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
			//echo $sql;
	}
?>
</body>
</html>
