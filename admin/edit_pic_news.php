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
<form id="form-img1" method="post" action="edit_pic_news_save.php" enctype="multipart/form-data"> 
    <?php 
	include "dblink.php";
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
<table class="img-responsive" align="center" width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="3" scope="col"><h3 class="text-center">
    แก้ไขรูปภาพข่าวสาร/กิจกรรม</h3><br> 
    <h4 class="text-center">เรื่อง <red><?=$news_name;?></red></h4><br>
    </th>
    </tr>
  <tr>
    <td width="70%" align="center"><?php if(empty($photo_name)){?>
    <input class="btn btn-default" style="font-size:20px;" type="file"  name="photo_name" id="file1">
    <?php };?>
	<br><img src="<?=$photo_name;?>" width="400" height="200" border="0"/><br><br>
     <input type="file" id="file1" size="20" name="photo_name">
     <red> *** ขนาดภาพ 960x475  </red>
     </td>
  </tr>
</table>
<input type="hidden" name="news_id" value="<?php echo $news_id;?>"/>
	<input type="hidden" name="photo_id" value="<?php echo $photo_id;?>"/>
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