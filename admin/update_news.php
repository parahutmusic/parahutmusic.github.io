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
	<form id="form-img1" method="post" action="update_news_save.php" enctype="multipart/form-data"> 
    <?php 
	$news_id = $_GET['news_id'];
	$photo_id = $_POST ['photo_id'];

	$sql_m = "select *  from news where news_id = '$news_id'"; 
	$db_query_m = mysqli_query($link, $sql_m);
	$rsm = mysqli_fetch_array($db_query_m);
				
		$news_id 	= $rsm['news_id'];
		$news_name 	= $rsm['news_name'];
		$news_detail	= $rsm['news_detail'];
		$news_date	= $rsm['news_date'];
		
	$sql_m1 = "select * from photonews where news_id = '$news_id'"; 
	$db_query_m1 = mysqli_query($link, $sql_m1);
	$rsm1 = mysqli_fetch_array($db_query_m1);
	
		$photo_id	= $rsm1['photo_id'];
		$photo_name 	= $rsm1['photo_name'];
		$news_id 	= $rsm1['news_id'];
?>
<table class="img-responsive" align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="3" scope="col"><h3 class="text-center">
    แก้ไขข้อมูลข่าวสาร/กิจกรรม</h3><br> 
    <h4 class="text-center">เรื่อง <red><?=$news_name;?></red></h4><br>
    </th>
    </tr>
  <tr>
    <td width="30%" valign="top"><span class="style6">>> เพิ่มรูปภาพข่าว <<</span></td>
    <td width="5%">&nbsp;</td>
    <td width="70%">
	<img src="<?=$photo_name;?>" width="400" height="200" border="0"/><br><br>
			<a href="javascript"onclick="window.open('edit_pic_news.php?news_id=<?php echo $news_id;?>','windowname2','width=900, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><input type="button" class="btn btn-default" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" name="edit" value="แก้ไขรูปภาพ"></a>
     </td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
    </tr>
  <tr>
    <td valign="top"><span class="style6">>> หัวข้อข่าว/กิจกรรม << </span></td>
    <td>&nbsp;</td>
    <td><input name="news_name"  type="text" size="60" value="<?=$news_name;?>"></td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
  </tr>
  <tr>
    <td valign="top"><span class="style6">>> รายละเอียดข่าวสาร/กิจกรรม <<</span></td>
    <td>&nbsp;</td>
    <td><textarea name="news_detail" cols="60" rows="5"><?=$news_detail;?></textarea></td>
  </tr>
</table>
<input  name="news_date"  readonly type="hidden" value="<?=$news_date;?>" size="35">
<input type="hidden" name="news_id" value="<?php echo $news_id;?>"/>
	<input type="hidden" name="photo_id" value="<?php echo $photo_id;?>"/>
  <div align="center">	
  <a href="#" onClick="history.back();"><input class="btn btn-danger" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" name="return" value="กลับ"></a>
			<input type="submit" class="btn btn-default" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" name="submit1" value="บันทึก">
  </div>
	</form>
</div>
</body>
</html>