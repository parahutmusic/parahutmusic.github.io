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
<form id="form-img1" method="post" action="edit_pic_member_save.php" enctype="multipart/form-data"> 
  <?php 
	$member_id = $_GET['member_id'];

	$sql_m = "select *  from member where member_id"; 
	$db_query_m = mysqli_query($link, $sql_m);
	$rs1 = mysqli_fetch_array($db_query_m);
				
		$member_id 	= $rs1['member_id'];
		$prename 	= $rs1['prename'];
		$member_name 	= $rs1['member_name'];
		$member_nikname	= $rs1['member_nikname'];
		$day 	= $rs1['day'];
		$month 	= $rs1['month'];
		$year 	= $rs1['year'];
		$member_edu 	= $rs1['member_edu'];
		$position 	= $rs1['position'];
		$member_pic 	= $rs1['member_pic'];
		
?>
<table class="text-center" align="center" width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="3" scope="col"><h3 class="text-center">
    แก้ไขรูปภาพศิลปิน</h3><br> 
    <h4 class="text-center">ชื่อ <red><?=$member_name;?></red></h4><br>
    </th>
    </tr>
  <tr>
    <td width="100%" align="center">
    <input class="btn btn-default" style="font-size:20px;" type="file"  name="member_pic" id="file1"><br>
<font size="3"><img src="<?=$member_pic;?>" width="200" height="200" border="0" /><br>
<red> *** ขนาดภาพ 255x255  </red>
     </td>
  </tr>
</table>
<input type="hidden" name="news_id" value="<?php echo $member_id;?>"/>
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