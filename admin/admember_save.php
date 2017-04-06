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
		$member_id 	= $_POST['member_id'];
		$prename 	= $_POST['prename'];
		$member_name 	= $_POST['member_name'];
		$member_nikname	= $_POST['member_nikname'];
		$day 	= $_POST['day'];
		$month 	= $_POST['month'];
		$year 	= $_POST['year'];
		$member_edu 	= $_POST['member_edu'];
		$position = $_POST['position'];
		$member_pic 	= $_FILES['member_pic'];
		
		$mb_id 	= $_POST['mb_id'];
		$band_id 	= $_POST['band_id'];
	
	$logodir1="pic_member/";   
	$pro_pic_file1 = $logodir1.basename($_FILES['member_pic']['name']);
  	copy($_FILES['member_pic']['tmp_name'],$pro_pic_file1); 
   
   $pic_file1 = substr($pro_pic_file1,4);
   
   if($_FILES["member_pic"]["name"]=="") 
	{
	echo "<script>alert('กรุณาเลือกรูปภาพโปรไฟล์');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"admember_band.php?band_id=$band_id\"\n";
	echo	"</script>\n";	
	}else{
	if(empty($prename)) 
	{
	echo "<script>alert('กรุณาเลือกคำนำหน้า');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"admember_band.php?band_id=$band_id\"\n";
	echo	"</script>\n";	
	}else{
		if(empty($member_name)) 
	{
	echo "<script>alert('กรุณาใส่ชื่อ - นามสกุล');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"admember_band.php?band_id=$band_id\"\n";
	echo	"</script>\n";	
	}else{
		if(empty($member_nikname)) 
	{
	echo "<script>alert('กรุณาใส่ชื่อเล่น');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"admember_band.php?band_id=$band_id\"\n";
	echo	"</script>\n";	
	}else{
		if(empty($day)) 
	{
	echo "<script>alert('กรุณาเลือกวันที่เกิด');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"admember_band.php?band_id=$band_id\"\n";
	echo	"</script>\n";	
	}else{
		if(empty($month)) 
	{
	echo "<script>alert('กรุณาเลือกเดือนที่เกิด');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"admember_band.php?band_id=$band_id\"\n";
	echo	"</script>\n";	
	}else{
		
		if(empty($year)) 
	{
	echo "<script>alert('กรุณาเลือกปีที่เกิด');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"admember_band.php?band_id=$band_id\"\n";
	echo	"</script>\n";	
	}else{
		if(empty($member_edu)) 
	{
	echo "<script>alert('กรุณาใส่การศึกษา');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"admember_band.php?band_id=$band_id\"\n";
	echo	"</script>\n";	
	}else{
		if(empty($position)) 
	{
	echo "<script>alert('กรุณาเลือกตำแหน่ง');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"admember_band.php?band_id=$band_id\"\n";
	echo	"</script>\n";	
	}else{
   if(empty($band_id))
	{
$sql="insert into member (member_id,																											prename,																															member_name,																															member_nikname,																																		day,																																	month,																																					year,																																						member_edu,position,																																																																															member_pic)VALUES('$member_id','$prename','$member_name','$member_nikname','$day','$month','$year','$member_edu','$position','$pro_pic_file1')";
	 $link_query = mysqli_query($link, $sql);
					echo "<script langquage='javascript'>\n";
					echo " window.location=\"admember.php\"\n";
					echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
					
	}else{
	 $sql="insert into member(member_id,prename,member_name,member_nikname,day,month,year,member_edu,position,member_pic)VALUES('$member_id','$prename','$member_name','$member_nikname','$day','$month','$year','$member_edu','$position','$pro_pic_file1')";
	 $link_query = mysqli_query($link, $sql);
	 
	 $sql1="insert into memberband(mb_id,member_id,band_id)VALUES('$mb_id','$member_id','$band_id')";
	 $link_query1 = mysqli_query($link, $sql1);
	 
					echo "<script langquage='javascript'>\n";
					echo " window.location=\"admember.php\"\n";
					echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
		
	}
	}
	}
	}
	}
	}
	}
	}
	}
	}
?>
</body>
</html>
