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
<form id="form-img1" method="post" action="admember_band_save.php" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
	  <div align="center">
	<?php
		$sql = "select * from memberband order by mb_id desc";
		$r	= mysqli_query($link, $sql);
		$rs_num			= mysqli_fetch_array($r);
	
		$mb_n		= $rs_num['mb_id'];
		
		$mb_n1		= intval($mb_n) + 1;

	?>
<?php 
	$band_id = $_GET['band_id'];

	$sql_m = "select *  from band where band_id = '$band_id'"; 
	$db_query_m = mysqli_query($link, $sql_m);
	$rsm = mysqli_fetch_array($db_query_m);
				
		$band_id 	= $rsm['band_id'];
		$band_name 	= $rsm['band_name'];
?>
<?php 
	$member_id = $_GET['member_id'];

	$sql_m1 = "select *  from member where member_id = '$member_id'"; 
	$db_query_m1 = mysqli_query($link, $sql_m1);
	$rsm1 = mysqli_fetch_array($db_query_m1);
				
		$member_id 	= $rsm1['member_id'];
		$member_name 	= $rsm1['member_name'];
?>	
<table class="img-responsive" align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="3" scope="col"><h1><b>แก้ไข<red><?php echo $band_name;?></red></b></h1></th>
    </tr>

  <tr>
    <td width="50%" valign="top"><span class="style6">>> เพิ่มสมาชิก <<</span></td>
  </tr>
  <tr>
  	<td></td>
    <td>&nbsp;</td>
    <td align="center"><a href="javascript:window.location.reload(history.go(-1));"><red> >> กดรีเฟรช ทุกครั้งเพื่ออัปเดต << </red><a></td>
  </tr>
 <tr>
    <td></td>
    <td>&nbsp;</td>
    <td align="center"><br>

		<?php
				  $sql1="select * from member order by member_id;"; 
				  $rs1=mysqli_query($link, $sql1);
				  $num1=mysqli_num_rows($rs1);    						
					print('<select id =\'member_id\' name =\'member_id\'>');
					print('<option value=\'\'>---- กรุณาเลือกสมาชิก -----</option>');	
				  	while($rs2 = mysqli_fetch_array($rs1))
					{   
						print("<option value=$rs2[member_id]>$rs2[member_nikname] ----- $rs2[member_name]</option>");
					}
                  	print('</select>');
		?>
	</td>
  </tr> 
</table><br>
  <div align="center">	
	
	 	<ul class="portfolio-filter">
	  		<li>
    <input type="hidden" name="mb_id" value="<?php echo $mb_n1;?>"/>
    <input type="hidden" name="band_id" value="<?php echo $band_id;?>"/>
			<input type="submit" class="btn btn-default" style="font-size:22px;
	  			font-weight:500;" name="submit1" value="เพิ่มสมาชิกใน<?php echo $band_name ;?>" >
			</li>
		</ul>
	
  </div>
	</form>
<p align="center"><font size="3"><b>ตารางแสดงข้อมูล</b>
<?php
		$mb_id 	= $_POST['mb_id'];
		$member_id 	= $_POST['member_id'];
		$prename 	= $_POST['prename'];
		$member_name 	= $_POST['member_name'];
		$member_nikname	= $_POST['member_nikname'];
		$band_id 	= $_POST['band_id'];
		$band_name 	= $_POST['band_name'];
		$position 	= $_POST['position'];
		$member_pic 	= $_FILES['member_pic'];
		
$band_id = $_GET['band_id'];
			
	$sql1 = "select * FROM memberband LEFT JOIN member ON ( memberband.member_id = member.member_id ) WHERE band_id = '$band_id'"; 
	$db_query1 = mysqli_query($link, $sql1);
	$num_rows1  = mysqli_num_rows($db_query1);
	echo "รายการทั้งหมด $num_rows1 รายการ";	
?>
</font></p>
<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#FFCC00">
    <td width="1%" style="border:solid 1px;"><font size="3">รูปภาพ</font></td>
	<td width="20%" style="border:solid 1px;"><font size="3">ชื่อนาม-สกุล</font></td>
    <td width="10%" style="border:solid 1px;"><font size="3">ชื่อเล่น</font></td>
    <td width="10%" style="border:solid 1px;"><font size="3">ตำแหน่ง</font></td>
	<td width="10%" style="border:solid 1px;"><font size="3">รายละเอียด</font></td>
	<td width="10%" style="border:solid 1px;"><font size="3">แก้ไขประวัติ</font></td>
	<td width="10%" style="border:solid 1px;"><font size="3">ลบประวัติ</font></td>
  </tr>
  <?php
  	
	$i = 0;
	while($i < $num_rows1)
	{
		$rs = mysqli_fetch_array($db_query1);
					
		$mb_id 	= $rs['mb_id'];
		$member_id 	= $rs['member_id'];
		$prename 	= $rs['prename'];
		$member_name 	= $rs['member_name'];
		$member_nikname	= $rs['member_nikname'];
		$band_id 	= $rs['band_id'];
		$band_name 	= $rs['band_name'];
		$position 	= $rs['position'];
		$member_pic 	= $rs['member_pic'];
				
	?> 
  <tr>
  	<td align="center" style="border:dotted 1px;"><font size="3"><img src="<?php echo $member_pic;?>" width="70" height="70" border="0" /></font></td>
	<td align="center" style="border:dotted 1px;"><font size="3"><?=$prename;?><?=$member_name;?></font></td>
    <td align="center" style="border:dotted 1px;"><font size="3"><?=$member_nikname;?></font></td>
    <td align="center" style="border:dotted 1px;"><font size="3"><?=$position;?></font></td>
	<td align="center" style="border:dotted 1px;"><font size="3"><img src="../images/view.png" width="30" height="30" border="0" /></font></td>
	<td align="center" style="border:dotted 1px;"><a href="update_member.php?member_id=<?=$member_id;?>"><img src="../images/edit.png" width="30" height="30" border="0" /></a></td>
	<td align="center" style="border:dotted 1px;"><a href="delmember_band.php?member_id=<?=$member_id;?>" class="style2" OnClick="return chkdel();"						 onclick="return del()"><img src="../images/del.png" width="30" height="30" border="0" /></a></td>
  </tr>
  <?php
  	$i++;
     }
	 ?>
</table>
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