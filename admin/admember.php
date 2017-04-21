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
<form id="form-img1" method="post" action="admember_save.php" enctype="multipart/form-data">
	  <div align="center">
	<?php
	include "dblink.php";
		$sql = "select  *  from member order by member_id desc";
		$r	= mysqli_query($link, $sql);
		$rs_num			= mysqli_fetch_array($r);
	
		$member_id_n		= $rs_num['member_id'];
		
		$member_id_n1		= intval($member_id_n) + 1;

	?>
    <?php
		$sql = "select * from memberband order by mb_id desc";
		$r	= mysqli_query($link, $sql);
		$rs_num			= mysqli_fetch_array($r);
	
		$mb_n		= $rs_num['mb_id'];
		
		$mb_n1		= intval($mb_n) + 1;

	?>
	<table class="img-responsive" align="center" width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="3" scope="col" class="text-center">
    <h3 class="text-center">เพิ่มข้อมูลศิลปิน</h3>
    <br>
    <h4><a href="admember_show.php">- รายชื่อศิลปินทั้งหมด -</a></h4>
    <br>    
    </th>
    </tr>
  <tr>
    <td width="30%" valign="top"><span class="style6">>> เพิ่มรูปภาพประจำตัว <<</span></td>
    <td width="5%">&nbsp;</td>
    <td width="70%"><input class="btn btn-default" style="font-size:20px;" type="file"  name="member_pic" id="file1"><red> *** ขนาดภาพ 255x255  </red></td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
    </tr>
  <tr>
    <td valign="top"><span class="style6">>> ชื่อ - นามสกุล << </span></td>
    <td>&nbsp;</td>
    <td><select name="prename">
		<option value="นาย">นาย</option>
		<option value="นาย">นางสาว</option>
		<option value="นาย">นาง</option>	
	</select>&nbsp;<input name="member_name"  type="text" size="60"><br>
<red> *** นายพาราฮัท มิวสิค  </red></td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
  </tr>
  <tr>
    <td valign="top"><span class="style6">>> ชื่อเล่น <<</span></td>
    <td>&nbsp;</td>
    <td><input name="member_nikname"  type="text" size="30"></td>
  </tr>
    <tr>
    <td colspan="3" ><hr></td>
  </tr>
   <tr>
    <td valign="top"><span class="style6">>> วันเกิด <<</span></td>
    <td>&nbsp;</td>
    <td>วันที่  <?php
	print("<select name =\"day\">");
for($i = 1 ; $i <= 31 ; $i++){
echo '<option value="'.$i.'"> '.$i.'&nbsp;&nbsp;&nbsp;&nbsp;</option>';
}
echo '</select>';
?>

	เดือน <?php
print("<select name =\"month\">");
$var_month = array('มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
$m=0;
for($i=1;$i<=12;$i++){    
    if(($_GET['month']-$m)==1){ $selected="selected";}else{$selected="";}
    echo"<option value='{$i}' $selected>{$var_month[$m]}&nbsp;&nbsp;&nbsp;&nbsp;</otpion>";
    $m++;
}
echo'</select>';

?>

 ปี <?php
print("<select name =\"year\">");
$var_y=date("Y")+543;
$ys = $var_y - 80;

for($i=$ys;$i<=$var_y;$i++){
    if($i==date("Y")+543){ $selected="selected";}else{$selected="";}    
    echo"<option  value='{$i}' $selected >{$i}&nbsp;&nbsp;&nbsp;&nbsp;</option>";
}
echo'</select>';
?>
</td>
  </tr>
    <tr>
    <td colspan="3" ><hr></td>
  </tr>
   <tr>
    <td valign="top"><span class="style6">>> การศึกษา <<</span></td>
    <td>&nbsp;</td>
    <td><textarea name="member_edu" cols="60" rows="3"></textarea></td>
  </tr>
  <tr>
    <td valign="top"><span class="style6"> >> ตำแหน่ง << </span></td>
    <td>&nbsp;</td>
    <td>
    <select name="position">
      	<option value="">-- เลือกตำแหน่ง --</option>
  		  <option value="ร้องนำ">ร้องนำ</option>
  		  <option value="กีต้าร์">กีต้าร์</option>
  		  <option value="เบส">เบส</option>
        <option value="กลอง">กลอง</option>
        <option value="คีย์บอร์ด">คีย์บอร์ด</option>		
	</select><br><br>

   			 <?php
				  $sql1="select * from band order by band_id;"; 
				  $rs1=mysqli_query($link, $sql1);
				  $num1=mysqli_num_rows($rs1);    						
					print('<select id =\'band_id\' name =\'band_id\'>');
					print('<option value=\'\'>---- กรุณาเลือกวง -----</option>');	
				  	while($rs2 = mysqli_fetch_array($rs1))
					{   
						print("<option value=$rs2[band_id]>$rs2[band_name]</option>");
					}
                  	print('</select>');
		?><red>* สามารถเลือกภายหลังได้</red>
    </td>
  </tr> 
    <tr>
    <td colspan="3" ><hr></td>
  </tr>
</table>
<input type="hidden" name="mb_id" value="<?php echo $mb_n1;?>"/>
<input type="hidden" name="member_id" value="<?php echo $member_id_n1;?>"/>
  <div align="center">	
	
	 	<ul class="portfolio-filter">
	  		<li>
            <a href="adarttist.php"><input class="btn btn-danger" style="font-size:22px;
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