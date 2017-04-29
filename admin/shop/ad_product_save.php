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

	$pro_id = $_POST['pro_id'];
	$cat_id = $_POST['cat_id'];
	$pro_name = $_POST['pro_name'];
	$price = $_POST['price'];
	$detail = $_POST['detail'];
	$img = $_FILES['img'];

	
	$logodir1="pic_product/";   
	$pro_pic_file1 = $logodir1.basename($_FILES['img']['name']);
   copy($_FILES['img']['tmp_name'],$pro_pic_file1); 
   
   $pic_file1 = substr($pro_pic_file1,4);
	
   if(empty($cat_id))
	{
	echo "<script>alert('กรุณาป้อน หมวดหมู่ ด้วยครับ');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"ad_product.php\"\n";
	echo	"</script>\n";
	}else{
		if(empty($pro_name))
	{
	echo "<script>alert('กรุณาป้อน ชื่อสินค้า ด้วยครับ');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"ad_product.php\"\n";
	echo	"</script>\n";
	}else{
		if(empty($price))
	{
	echo "<script>alert('กรุณาป้อน ราคา ด้วยครับ');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"ad_product.php\"\n";
	echo	"</script>\n";
	}else{
		if(empty($detail))
	{
	echo "<script>alert('กรุณาป้อน รายละเอียด ด้วยครับ');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"ad_product.php\"\n";
	echo	"</script>\n";
	}else{
		if($_FILES["img"]["name"]=="")
	{
	echo "<script>alert('กรุณาเลือก รูปภาพ ด้วยครับ');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"ad_product.php\"\n";
	echo	"</script>\n";
	}else{

		if($cat_id != "1")
	{
		$sql2="INSERT INTO products( pro_id , cat_id , pro_name , price , detail , img) VALUES ('$pro_id','$cat_id','$pro_name','$price','$detail','$pro_pic_file1')";

		$sql4="INSERT INTO pro_size( size_id , size_name , pro_id ) VALUES ('','','$pro_id')";
	 $link_query4 = mysqli_query($link, $sql4);


	 		$link_query2 = mysqli_query($link, $sql2);
					echo "<script langquage='javascript'>\n";
					echo " window.location=\"ad_product.php\"\n";
					echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";

	}else{
		
  	$sql1="INSERT INTO products( pro_id , cat_id , pro_name , price , detail , img , pro_view ) VALUES ('$pro_id','$cat_id','$pro_name','$price','$detail','$pro_pic_file1','0')";
	 $link_query1 = mysqli_query($link, $sql1);

	$sql3="INSERT INTO pro_size( size_id , size_name , pro_id ) VALUES ('','S','$pro_id'),('','M','$pro_id'),('','L','$pro_id'),('','XL','$pro_id'),('','XXL','$pro_id')";
	 $link_query3 = mysqli_query($link, $sql3);

					echo "<script langquage='javascript'>\n";
					echo " window.location=\"ad_product.php\"\n";
					echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
					}
	    		}
			}
		}
	}	
}
	
	
	
?>
</body>
</html>
