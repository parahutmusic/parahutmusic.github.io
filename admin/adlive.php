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
<form id="form-img1" method="post" action="adlive_save.php" enctype="multipart/form-data">
	  <div align="center">
	<?php
	include "dblink.php";
		$sql = "select  *  from live order by live_id desc";
		$r	= mysqli_query($link, $sql);
		$rs_num			= mysqli_fetch_array($r);
	
		$live_id_n		= $rs_num['live_id'];
		
		$live_id_n1		= intval($live_id_n) + 1;

	?>
	<input type="hidden" name="live_id" value="<?php echo $live_id_n1;?>"/>
	

		<h3> >> อัพเดตการถ่ายทอดสด << </h3> <br>
<input name="live_url" type="text" size="80">
<br><br>
<red> *** copy url หลังเครื่องหมาย = </red>เช่น https://www.youtube.com/watch?v=<red>_9fyPp6RRio</red>
<br>
<br>
<?php
$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");   
$thai_month_arr=array(   
    "0"=>"",   
    "1"=>"มกราคม",   
    "2"=>"กุมภาพันธ์",   
    "3"=>"มีนาคม",   
    "4"=>"เมษายน",   
    "5"=>"พฤษภาคม",   
    "6"=>"มิถุนายน",    
    "7"=>"กรกฎาคม",   
    "8"=>"สิงหาคม",   
    "9"=>"กันยายน",   
    "10"=>"ตุลาคม",   
    "11"=>"พฤศจิกายน",   
    "12"=>"ธันวาคม"                     
);   
$thai_month_arr_short=array(   
    "0"=>"",   
    "1"=>"ม.ค.",   
    "2"=>"ก.พ.",   
    "3"=>"มี.ค.",   
    "4"=>"เม.ย.",   
    "5"=>"พ.ค.",   
    "6"=>"มิ.ย.",    
    "7"=>"ก.ค.",   
    "8"=>"ส.ค.",   
    "9"=>"ก.ย.",   
    "10"=>"ต.ค.",   
    "11"=>"พ.ย.",   
    "12"=>"ธ.ค."                     
);   
function thai_date_and_time($time){   // 19 ธันวาคม 2556 เวลา 10:10:43
    global $thai_day_arr,$thai_month_arr;   
    $thai_date_return.=date("j",$time);   
    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];   
    $thai_date_return.= " ".(date("Y",$time)+543);   
	$thai_date_return.= " เวลา ".date("H:i:s",$time);
    return $thai_date_return;   
} 
?><?=thai_date_and_time(time())?>
<input  name="live_date"  readonly type="hidden" value="<?=thai_date_and_time(time())?>" size="35"><br><br>

	<input class="btn btn-default" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" type="submit" name="submit1" value="บันทึก">
      </div>
	</form>
        <p align="center"><font size="3"><b>ตารางแสดงรูปภาพสไลด์</b>
<?php
	$sql = "select *  from live where live_id order by live_id"; 
	$db_query = mysqli_query($link, $sql);
	$num_rows  = mysqli_num_rows($db_query);
	
	echo "รายการทั้งหมด $num_rows รายการ";
?>
</font></p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#FFCC00">
    <td width="5%"><font size="3">ที่</font></td>
    <td width="40%"><font size="3">ลิงค์ URL</font></td>
    <td width="30%"><font size="3">วันที่ลง</font></td>
	<td width="10%"><font size="3">ลบ</font></td>
  </tr>
  <?php
	$i = 0;
	while($i < $num_rows)
	{
		$rs = mysqli_fetch_array($db_query);		
		$live_id 	= $rs['live_id'];
		$live_url 	= $rs['live_url'];
		$live_date 	= $rs['live_date'];
	?> 
  <tr>
    <td align="center"><font size="3"><?=$live_id;?></font></td>
    <td align="center"><font size="3"><a href="https://www.youtube.com/watch?v=<?=$live_url;?>">https://www.youtube.com/watch?v=<?=$live_url;?></a></font></td>
    <td align="center"><font size="3"><?=$live_date;?></font></td>
	<td align="center"><a href="dellive.php?live_id=<?=$live_id;?>" class="style2" OnClick="return chkdel();" onclick= "return del()"><img src="../images/del.png" width="30" height="30" border="0" /></a></td>
  </tr>
  <?php
  	$i++;
     }
	 ?>
</table>
</div>
</body>
</html>