<?php include "check-login.php"; ?>
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
<form id="form-img1" method="post" action="adband_save.php" enctype="multipart/form-data">
<?php
	include "dblink.php";
		$sql = "select  *  from band order by band_id desc";
		$r	= mysqli_query($link, $sql);
		$rs_num			= mysqli_fetch_array($r);
	
		$band_id_n		= $rs_num['band_id'];
		
		$band_id_n1		= intval($band_id_n) + 1;
		
		
	?>
<table class="img-responsive" align="center" width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="3" scope="col"><h3 class="text-center">เพิ่มวงดนตรี</h3><br>
</th>
    </tr>
 
  <tr>
    <td width="30%" valign="top"><span class="style6">>> เพิ่มรูปภาพโปรไฟล์วง <<</span></td>
    <td width="5%">&nbsp;</td>
    <td width="70%"><input class="btn btn-default" style="font-size:20px;" type="file"  name="band_pic" id="file1"><red> *** ขนาดภาพ 600x455  </red></td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
    </tr>
  <tr>
  <tr>
    <td width="30%" valign="top"><span class="style6">>> เพิ่มรูปภาพหน้ารายละเอียดวง <<</span></td>
    <td width="5%">&nbsp;</td>
    <td width="70%"><input class="btn btn-default" style="font-size:20px;" type="file"  name="band_dt" id="file1"><red> *** ขนาดภาพ 960x475  </red></td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
    </tr>
  <tr>
    <td width="30%" valign="top"><span class="style6">>> ชื่อวง <<</span></td>
    <td width="5%">&nbsp;</td>
    <td width="70%"><input name="band_name" type="text" size="30"></td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
  </tr>
  <tr>
    <td width="30%" valign="top"><span class="style6">>> ผลงานเพลง <<</span></td>
    <td width="5%">&nbsp;</td>
    <td width="70%"><textarea name="music" cols="50" rows="5"></textarea></td>
  </tr>
</table>
	<input type="hidden" name="band_id" value="<?php echo $band_id_n1;?>"/>
  <div align="center">	
	
	 	<ul class="portfolio-filter">
	  		<li>
            <input class="btn btn-danger" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" name="return" type="reset" value="ยกเลิก">
                
			<input type="submit" class="btn btn-default" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" name="submit1" value="บันทึก">
			</li>
		</ul>
	
  </div>
	</form>
	<p align="center"><font size="3"><b></b>
<?php
	
	$rows = 5;
	if($page<="0")$page=1;
	$total_data  = mysqli_num_rows(mysqli_query($link,"select *  from band"));
	$total_page=ceil ($total_data/$rows);
	if($page>=$total_page)$page=$total_page;
	$start=($page-1)*$rows;
	
	
	$band_id 	= $_POST['band_id'];
	$band_name = $_POST['band_name'];
	$band_pic = $_FILES['band_pic'];
	
	$sql = "select *  from band where band_id order by band_id desc"; 
	$db_query = mysqli_query($link, $sql);
	$num_rows  = mysqli_num_rows($db_query);
	
	echo "รายการทั้งหมด $num_rows รายการ";
?>
</font></p>
<table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#FFCC00" style="border-bottom:1px solid #000" height="40" valign="middle">
    <td width="10%"><font size="3">รหัสวง</font></td>
    <td width="20%"><font size="3">ชื่อวง</font></td>
	<td width="10%"><font size="3">รูปวง</font></td>
    <td width="10%"><font size="3">รูปปก</font></td>
	<td width="10%"><font size="3">แก้ไข</font></td>
	<td width="10%"><font size="3">ลบข้อมูล</font></td>
  </tr>
  <?php
	$i = 0;
	while($i < $num_rows)
	{
		$rs = mysqli_fetch_array($db_query);
				
		$band_id 	= $rs['band_id'];
		$band_name 	= $rs['band_name'];
		$band_pic 	= $rs['band_pic'];
		$band_dt 	= $rs['band_dt'];
	?> 
  <tr style="border-bottom:1px solid #000;" height="80">
    <td align="center"><font size="3"><?=$band_id;?></font></td>
	<td align="center"><font size="3"><?=$band_name;?></font></td>
    <td align="center"><font size="3"><img src="<?=$band_pic;?>" width="70" height="70" border="0" /></font></td>
    <td align="center"><font size="3"><img src="<?=$band_dt;?>" width="120" height="70" border="0" /></font></td>
	<td align="center"><a href="update_band.php?band_id=<?=$band_id;?>"><img src="../images/edit.png" width="30" height="30" border="0" /></a></td>
	<td align="center"><a href="delband.php?band_id=<?=$band_id;?>" class="style2" OnClick="return chkdel();" onclick= "return del()"><img src="../images/del.png" width="30" height="30" border="0" /></a></td>
  </tr>
  <?php
  	$i++;
     }
	 ?>
</table>
<center><red>***เรียงลำดับภาพจากการอัพเดตล่าสุด</red>
<nav aria-label="Page navigation">
  <ul class="pagination">
    <li <?php if($page==1) echo 'class="disabled"';?>>
      <a href="adband.php?page=<?=$page-1;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li >
	<?php for($i=1;$i<=$total_page;$i++){ ?>
    <li <?php if($page==$i) echo 'class="active"';?>><a href="adband.php?page=<?=$i;?>"><?=$i;?></a></li>
	<?php } ?>
    <li <?php if($page==$total_page) echo 'class="disabled"';?>>
      <a href="adband.php?page=<?=$page+1;?>" aria-label="Next">
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