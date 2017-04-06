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
<form id="form-img1" method="post" action="update_band_save.php" enctype="multipart/form-data">
	  <div align="center">
	<?php
	include "dblink.php";
		$sql = "select  *  from band order by band_id desc";
		$r	= mysqli_query($link, $sql);
		$rs_num			= mysqli_fetch_array($r);
	
		$band_n		= $rs_num['band_'];
		
		$band_n1		= intval($band_n) + 1;
	
		
	?>
<?php 
	$band_id = $_GET['band_id'];

	$sql_m = "select *  from band where band_id = '$band_id'"; 
	$db_query_m = mysqli_query($link, $sql_m);
	$rsm = mysqli_fetch_array($db_query_m);
				
		$band_id 	= $rsm['band_id'];
		$band_name 	= $rsm['band_name'];
		$music 	= $rsm['music'];
		$band_pic 	= $rsm['band_pic'];
		$band_dt 	= $rsm['band_dt'];

?>

	<input type="hidden" name="band_id" value="<?php echo $band_id;?>"/>
	
<table class="img-responsive" align="center" width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="3" scope="col"><h1>แก้ไขข้อมูล <red><?php echo $band_name;?></red></h1></th>
    </tr>
 
  <tr>
    <td width="30%" valign="top"><span class="style6">>> แก้ไขรูปภาพวง <<</span></td>
    <td width="5%">&nbsp;</td>
    <td width="70%">
    <?php if(empty($band_pic)){	?>
    <input class="btn btn-default" style="font-size:20px;" type="file"  name="band_pic" id="file1">
    <?php };?>
    <img src="<?=$band_pic;?>" width="150" height="110" border="0"/><br><br>
			<a href="javascript"onclick="window.open('edit_pic_band_profile.php?band_id=<?php echo $band_id;?>','windowname2','width=900, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><input type="button" class="btn btn-default" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" name="edit" value="แก้ไขรูปภาพ"></a>
   
	</td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
    </tr>
      <tr>
    <td width="30%" valign="top"><span class="style6">>> แก้ไขรูปภาพหน้ารายละเอียดวง <<</span></td>
    <td width="5%">&nbsp;</td>
    <td width="70%">
    <?php if(empty($band_pic)){	?>
    <input class="btn btn-default" style="font-size:20px;" type="file"  name="band_pic" id="file1">
    <?php };?>
    <img src="<?=$band_dt;?>" width="250" height="110" border="0"/><br><br>
			<a href="javascript"onclick="window.open('edit_pic_band_detail.php?band_id=<?php echo $band_id;?>','windowname2','width=900, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><input type="button" class="btn btn-default" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" name="edit" value="แก้ไขรูปภาพ"></a>
   
	</td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
    </tr>
  <tr>
    <td width="30%" valign="top"><span class="style6">>> ชื่อวง <<</span></td>
    <td width="5%">&nbsp;</td>
    <td width="70%"><input name="band_name" type="text" size="30" value="<?php echo $band_name;?>"></td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
  </tr>
  <tr>
    <td width="30%" valign="top"><span class="style6">>> ผลงานเพลง <<</span></td>
    <td width="5%">&nbsp;</td>
    <td width="70%"><textarea name="music" cols="50" rows="5"><?php echo $music;?></textarea></td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
  </tr>
    <tr>
    <td width="30%" valign="top"><span class="style6">>> เพิ่มสมาชิก <<</span></td>
    <td width="5%">&nbsp;</td>
    <td width="70%">
     <ul class="portfolio-filter">
	  		
			<a href="javascript"onclick="window.open('admember_band.php?band_id=<?php echo $band_id;?>','windowname2','width=1200, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><input type="button" class="btn btn-default" style="font-size:22px;" name="edit" value="เพิ่ม/แก้ไขสมาชิกวง"></a>
			
		</ul>
     </td>
  </tr>
</table><br>

	<input type="hidden" name="band_id" value="<?php echo $band_id;?>"/>
  <div align="center">	
	
	 	<ul class="portfolio-filter">
	  		<li>
            <a href="#" onClick="history.back();"><input class="btn btn-danger" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" name="return" value="กลับ"></a><br><br>


			<input type="submit" class="btn btn-default" style="font-size:22px;" name="submit1" value="ยืนยันการแก้ไข">
			</li>
		</ul>
	
  </div>
	</form>
</div>
</body>
</html>