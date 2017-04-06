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
<form id="form-img1" method="post" action="update_member_save.php" enctype="multipart/form-data">
	  <div align="center">
	  <?php 
	$member_id = $_GET['member_id'];

	$sql_m = "select *  from member where member.member_id = '$member_id'"; 
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
	<table class="img-responsive" align="center" width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="3" scope="col"><h3 class="text-center">แก้ไขข้อมูลศิลปิน</h3><br>
    <h4 class="text-center">ชื่อ <red><?=$member_name;?></red></h4><br>
</th>
    </tr>
 
  <tr>
    <td width="30%" valign="top"><span class="style6">>> เพิ่มรูปภาพประจำตัว <<</span></td>
    <td width="5%">&nbsp;</td>
    <td width="70%">
<img src="<?=$member_pic;?>" width="100" height="100" border="0"/><br><br>
			<a href="javascript"onclick="window.open('edit_pic_member.php?news_id=<?php echo $member_id;?>','windowname2','width=900, \height=600, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><input type="button" class="btn btn-default" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" name="edit" value="แก้ไขรูปภาพ"></a>
</td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
    </tr>
  <tr>
    <td valign="top"><span class="style6">>> ชื่อ - นามสกุล << </span></td>
    <td>&nbsp;</td>
    <td><select name="prename">
	<option value="<?=$prename?>"><?=$prename;?></option>
		<option value="นาย">นาย</option>
		<option value="นาย">นางสาว</option>
		<option value="นาย">นาง</option>	
	</select>&nbsp;<input name="member_name"  type="text" size="60" value="<?=$member_name;?>"><br>
<red> *** นายพาราฮัท มิวสิค  </red></td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
  </tr>
  <tr>
    <td valign="top"><span class="style6">>> ชื่อเล่น <<</span></td>
    <td>&nbsp;</td>
    <td><input name="member_nikname"  type="text" size="30" value="<?=$member_nikname;?>"></td>
  </tr>
    <tr>
    <td colspan="3" ><hr></td>
  </tr>
   <tr>
    <td valign="top"><span class="style6">>> วันเกิด <<</span></td>
    <td>&nbsp;</td>
    <td><?=$day;?> / <?=$month;?> / <?=$year;?> </td>
  </tr>
    <tr>
    <td colspan="3" ><hr></td>
  </tr>
   <tr>
    <td valign="top"><span class="style6">>> การศึกษา <<</span></td>
    <td>&nbsp;</td>
    <td><textarea name="member_edu" cols="60" rows="3"><?=$member_edu;?></textarea></td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
  </tr>
  <tr>
    <td valign="top"><span class="style6">>> ตำแหน่ง <<</span></td>
    <td>&nbsp;</td>
    <td> <select name="position">
    	<option value="<?=$position;?>"><?=$position;?></option>
		<option value="ร้องนำ">ร้องนำ</option>
		<option value="กีต้าร์">กีต้าร์</option>
		<option value="เบส">เบส</option>
        <option value="กลอง">กลอง</option>
        <option value="คีย์บอร์ด">คีย์บอร์ด</option>		
	</select></td>
  </tr>
    <tr>
    <td colspan="3" ><hr></td>
  </tr>
</table>
<input type="hidden" name="member_id" value="<?php echo $member_id;?>"/>
  <div align="center">	
	
	 	<ul class="portfolio-filter">
	  		<li>
            <a href="#" onClick="history.back();"><input class="btn btn-danger" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" name="return" value="กลับ"></a>
			<input type="submit" class="btn btn-default" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" name="submit1" value="บันทึก">
			</li>
		</ul>
	
  </div>
	</form>
</div>
</body>
</html>