<?php 
include "check-login.php";
include "../admin/dblink.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?php include "../admin/admin_parahut.php"; ?>
<div class="container top">
<form id="form-img1" method="post" action="edit_pic_band_profile_save.php" enctype="multipart/form-data"> 
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
<table class="text-center" align="center" width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="3" scope="col"><h3 class="text-center">
    แก้ไขรูปภาพโปรไฟล์วง</h3><br> 
    <h4 class="text-center">วง<red><?=$band_name;?></red></h4><br>
    </th>
    </tr>
  <tr>
    <td width="100%" align="center">
    <input class="btn btn-default" style="font-size:20px;" type="file"  name="band_pic" id="file1"><br>
<font size="3"><img src="<?=$band_pic;?>" width="150" height="110" border="0"/><br><br>
    <red> *** ขนาดภาพ 600x455 </red>
     </td>
  </tr>
</table>
<input type="hidden" name="band_id" value="<?php echo $band_id;?>"/>
  <div align="center">	
	
	 	<ul class="portfolio-filter">
	  		<li>
			<input type="submit" class="btn btn-default" style="font-size:20px;
	  			font-weight:900;
	  			width:200px;" name="submit1" value="บันทึก">
			</li>
		</ul>
	
  </div>
	</form>
    </div>
</body>
</html>