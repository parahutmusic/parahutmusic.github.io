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
	<form id="form-img1" method="post" action="updateslide_save.php" enctype="multipart/form-data">
	  <div align="center">
	<?php
	include "../admin/dblink.php";
		$sql = "select  *  from slide order by ad_idimg desc";
		$r	= mysqli_query($link, $sql);
		$rs_num			= mysqli_fetch_array($r);
	
		$ad_idimg_n		= $rs_num['ad_idimg'];
		
		$ad_idimg_n1		= intval($ad_idimg_n) + 1;
	
		
	?>
<?php 
	$ad_idimg = $_GET['ad_idimg'];

	$sql_m = "select *  from slide where ad_idimg = '$ad_idimg'"; 
	$db_query_m = mysqli_query($link, $sql_m);
	$rsm = mysqli_fetch_array($db_query_m);
				
		$ad_idimg 	= $rsm['ad_idimg'];
		$ad_img1 	= $rsm['ad_img1'];

?>

	<input type="hidden" name="ad_idimg" value="<?php echo $ad_idimg;?>"/>
	
	<span class="style6">
	>> เพิ่มรูปภาพสไลด์ << </span>
<input class="btn btn-default" style="font-size:20px;" type="file"  name="ad_img1" id="file1">
<red> *** ขนาดภาพ 1400x567  </red>
<br>
<img src="<?=$ad_img1;?>" width="480" height="200" border="0" />
<br><br>	 
<a href="#" onClick="history.back();"><input class="btn btn-danger" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" name="return" value="กลับ"></a>
	<input class="btn btn-default" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" type="submit" name="submit1" value="บันทึก">
      </div>
	</form>
</div>
</body>
</html>