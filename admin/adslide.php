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
	<form  method="post" action="adslide_save.php" enctype="multipart/form-data">
	  <div align="center">
	<?php
	include "../admin/dblink.php";
		$sql = "select  *  from slide order by ad_idimg desc";
		$r	= mysqli_query($link, $sql);
		$rs_num			= mysqli_fetch_array($r);
	
		$ad_idimg_n		= $rs_num['ad_idimg'];
		
		$ad_idimg_n1		= intval($ad_idimg_n) + 1;
	?>
	<input type="hidden" name="ad_idimg" value="<?php echo $ad_idimg_n1;?>"/>
	<h3>  >> เพิ่มรูปภาพสไลด์ << </h3>
<input class="btn btn-default" style="font-size:20px;" type="file"  name="ad_img1" id="file">
	<red> *** ขนาดภาพ 1400x567  </red>
<br>
	 
	<input class="btn btn-default" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" type="submit" name="submit1" value="บันทึก">
      </div>
	</form>
<p align="center"><font size="3"><b>ตารางแสดงรูปภาพสไลด์</b>
<?php
	
 $perpage = 5;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;
	
	
	$ad_idimg 	= $_POST['ad_idimg'];
	$ad_img1 = $_POST['ad_img1'];
	
	$sql = "select *  from slide where ad_idimg order by ad_idimg desc limit {$start} , {$perpage}"; 
	$db_query = mysqli_query($link, $sql);
	$num_rows  = mysqli_num_rows($db_query);
	
	
	$sql1 = "select *  from slide where ad_idimg order by ad_idimg desc"; 
	$db_query1 = mysqli_query($link, $sql1);
	$num_rows1  = mysqli_num_rows($db_query1);
	
	echo "รายการทั้งหมด $num_rows1 รายการ";
	
?>
</font></p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#FFCC00">
    <td width="10%"><font size="3">รหัสรูปภาพ</font></td>
    <td width="50%"><font size="3">รูปภาพ</font></td>
	<td width="10%"><font size="3">แก้ไขรูปภาพ</font></td>
	<td width="10%"><font size="3">ลบรูปภาพ</font></td>
  </tr>
  <?php
  	
	$i = 0;
	while($i < $num_rows)
	{
		$rs = mysqli_fetch_array($db_query);		
		$ad_idimg 	= $rs['ad_idimg'];
		$ad_img1 	= $rs['ad_img1'];
	?> 
  <tr>
    <td align="center"><font size="3"><?=$ad_idimg;?></font></td>
    <td align="center"><font size="3"><img src="<?=$ad_img1;?>" width="240" height="100" border="0" /></font></td>
	<td align="center"><a href="updateslide.php?ad_idimg=<?=$ad_idimg;?>"><img src="../images/edit.png" width="30" height="30" border="0" /></a></td>
	<td align="center"><a href="del.php?ad_idimg=<?=$ad_idimg;?>" class="style2" OnClick="return chkdel();" onclick= "return del()"><img src="../images/del.png" width="30" height="30" border="0" /></a></td>
  </tr>
  <?php
  	$i++;
     }
	 ?>
</table>
<center><red>***เรียงลำดับจากการอัพเดตล่าสุด</red>
<?php
 $sql2 = "select * from slide";
 $query2 = mysqli_query($link, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
<nav>
 <ul class="pagination">
 <li>
 <a href="adslide.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li <?php if($page == $i) echo 'class="active"';?>><a href="adslide.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
 <li>
 <a href="adslide.php?page=<?php echo $total_page;?>" aria-label="Next">
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