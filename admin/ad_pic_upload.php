<?php 
include "check-login.php";
include "../admin/dblink.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin parahut</title>
    <link href="../admin/css/menu.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- icon fonts font Awesome -->
	<link href="../assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- Import Magnific Pop Up Styles -->
	<link rel="stylesheet" href="../assets/css/magnific-popup.css">

	<!-- Import Custom Styles -->
	<link href="../assets/css/style.css" rel="stylesheet">

	<!-- Import Animate Styles -->
	<link href="../assets/css/animate.min.css" rel="stylesheet">

	<!-- Import owl.carousel Styles -->
	<link href="../assets/css/owl.carousel.css" rel="stylesheet">

	<!-- Import Custom Responsive Styles -->
	<link href="../assets/css/responsive.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Kanit');
</style>
<body style="margin:0;padding:0;">
<?php include "../admin/admin_parahut.php"; ?>
<div class="container top"> 
	<form  method="post" action="ad_pic_upload_save.php" enctype="multipart/form-data">
	  <div align="center">
	<?php
	include "../admin/dblink.php";
		$sql = "select  *  from pic_upload order by pic_upid desc";
		$r	= mysqli_query($link, $sql);
		$rs_num			= mysqli_fetch_array($r);
	
		$pic_upid_n		= $rs_num['pic_upid'];
		
		$pic_upid_n1		= intval($pic_upid_n) + 1;
	?>
	<input type="hidden" name="pic_upid" value="<?php echo $pic_upid_n1;?>"/>
	<h3>  >> อัพโหลดรูปภาพ<< </h3>
<input class="btn btn-default" style="font-size:20px;" type="file"  name="pic_name" id="file">
	<red> *** ขนาดภาพ 600x312  </red>
<br>
	<input class="btn btn-default" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" type="submit" name="submit1" value="บันทึก">
      </div>
	</form>
<p align="center"><font size="3"><b>ตารางแสดงรูปภาพอัพโหลด</b>
<?php
	
 $perpage = 5;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;

 $pic_upid 	= $_POST['pic_upid'];
	$pic_name = $_POST['pic_name'];
	
	$sql = "select *  from pic_upload where pic_upid order by pic_upid desc limit {$start} , {$perpage}"; 
	$db_query = mysqli_query($link, $sql);
	$num_rows  = mysqli_num_rows($db_query);
	
	
	$sql1 = "select *  from pic_upload where pic_upid order by pic_upid desc"; 
	$db_query1 = mysqli_query($link, $sql1);
	$num_rows1  = mysqli_num_rows($db_query1);
	
	echo "รายการทั้งหมด $num_rows1 รายการ";
	
?>
</font></p>
<table width="70%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#FFCC00">
    <td width="10%"><font size="3">รหัสรูปภาพ</font></td>
    <td width="10%"><font size="3">รูปภาพ</font></td>
	<td width="40%"><font size="3">ที่อยู่รูปภาพ</font></td>
	<td width="10%"><font size="3">ลบรูปภาพ</font></td>
  </tr>
  <?php
  	
	$i = 0;
	while($i < $num_rows)
	{
		$rs = mysqli_fetch_array($db_query);		
		$pic_upid 	= $rs['pic_upid'];
		$pic_name 	= $rs['pic_name'];
	?> 
  <tr>
    <td align="center"><font size="3"><?=$pic_upid;?></font></td>
    <td align="center"><font size="3"><img src="<?=$pic_name;?>" width="100" height="50" border="0" /></font></td>
	<td align="center"><font size="3"><?=$pic_name;?></font></td>
	<td align="center"><a href="del_pic_upload.php?pic_upid=<?=$pic_upid;?>" class="style2" OnClick="return chkdel();" onclick= "return del()"><img src="../images/del.png" width="30" height="30" border="0" /></a></td>
  </tr>
  <?php
  	$i++;
     }
	 ?>
</table>
<center><red>***เรียงลำดับจากการอัพเดตล่าสุด</red>
<?php
 $sql2 = "select * from pic_upload";
 $query2 = mysqli_query($link, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
<nav>
 <ul class="pagination">
 <li <?php if($page == 1) echo 'class="disabled"';?>>
 <a href="ad_pic_upload.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li <?php if($page == $i) echo 'class="active"';?>><a href="ad_pic_upload.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
 <li <?php if($page == $total_page) echo 'class="disabled"';?>>
 <a href="ad_pic_upload.php?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
</center>
<br>
<script language="JavaScript">
function chkdel(){if(confirm('  กรุณายืนยันการลบอีกครั้ง !!!  ')){
	return true;
}else{
	return false;
}
}
</script>
</div>
</body>
</html>