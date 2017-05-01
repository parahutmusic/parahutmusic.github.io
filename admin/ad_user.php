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
<div class="container top" id="hidden"> 
<form id="form-img1" method="post" action="ad_user_save.php" enctype="multipart/form-data">
	  <div align="center">
	<?php
	include "dblink.php";
		$sql = "select  *  from userparahut order by user_id desc";
		$r	= mysqli_query($link, $sql);
		$rs_num			= mysqli_fetch_array($r);
	
		$user_id_n		= $rs_num['user_id'];
		
		$user_id_n1		= intval($user_id_n) + 1;

	?>
	<input type="hidden" name="user_id" value="<?php echo $user_id_n1;?>"/>
	
		<h3> >> จัดการ ADMIN / USER << </h3> <br>
            <input name="user_name" type="text" size="30" style="width:300px;" placeholder="Username">
        <br>
        <br>
            <input name="user_pass" type="password" size="30" style="width:300px;" placeholder="password">
        <br>
        <br>
            <input name="name" type="text" size="30" style="width:300px;" placeholder="ชื่อ - นามสกุล">
        <br>
        <br>
        	<select name="user_level" style="width:300px;">
        		<option name="user_level"  value="">-- กรุณาเลือก --</option>
        		<option name="user_level" value="2">User พาราฮัท</option>
        		<option name="user_level" value="3">User ร้านค้า</option>
        	</select>	
        <br>
        <br>
	<input class="btn btn-default" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" type="submit" name="submit1" value="บันทึก">
      </div>
	</form>
        <p align="center"><font size="3"><b>ตารางแสดง ADMIN / USER</b>
<?php
$perpage = 5;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;

	$sql = "select *  from userparahut where user_id order by user_id desc limit {$start} , {$perpage} "; 
	$db_query = mysqli_query($link, $sql);
	$num_rows  = mysqli_num_rows($db_query);
	
	echo "รายการทั้งหมด $num_rows รายการ";
?>
</font></p>
<table width="70%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#FFCC00">
    <td width="5%"><font size="3">ที่</font></td>
    <td width="10%"><font size="3">Username</font></td>
    <td width="30%"><font size="3">ชื่อ</font></td>
    <td width="10%"><font size="3">สถานะ</font></td>
    <td width="5%"><font size="3">แก้ไข</font></td>
	<td width="10%"><font size="3">ลบ</font></td>
  </tr>
  <?php
	$i = 1;
	while($i < $num_rows)
	{
		$rs = mysqli_fetch_array($db_query);		
		$user_id 	= $rs['user_id'];
        $user_name    = $rs['user_name'];
        $user_pass    = $rs['user_pass'];
        $user_level    = $rs['user_level'];
		$name 	= $rs['name'];
        $md_pass = md5($user_pass);
	?> 
  <tr>
    <td align="center"><font size="3"><?=$user_id;?></font></td>
    <td align="center"><font size="3"><?=$user_name;?></font></td>
    <td align="center"><font size="3"><?=$name;?></font></td>
    <td align="center"><font size="3"><?php if($user_level == "1"){ echo "ADMIN"; } else { echo "USER"; }  ?> <?=$user_level;?></font></td>
    <td align="center">
		<a href="edit_user.php?user_id=<?=$user_id;?>&user_name=<?=$user_name;?>" class="style2"><img src="../images/edit.png" width="30" height="30" border="0" /></a>
	</td>
	<td align="center">
		<a href="del_user.php?user_id=<?=$user_id;?>" class="style2" OnClick="return chkdel();" onclick= "return del()"><img src="../images/del.png" width="30" height="30" border="0" /></a>
	</td>
  </tr>
  <?php
  	$i++;
     }
	 ?>
</table>
<center><red>***เรียงลำดับจากการอัพเดตล่าสุด</red>
<?php
 $sql2 = "select * from userparahut ";
 $query2 = mysqli_query($link, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
<nav>
 <ul class="pagination">
 <li <?php if($page == 1) echo 'class="disabled"';?>>
 <a href="ad_user.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li <?php if($page == $i) echo 'class="active"';?>><a href="ad_user.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
 <li <?php if($page == $total_page) echo 'class="disabled"';?>>
 <a href="ad_user.php?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
</center>
</div>
<script language="JavaScript">
function chkdel(){if(confirm('  กรุณายืนยันการลบอีกครั้ง !!!  ')){
    return true;
}else{
    return false;
}
}
</script>
</body>
</html>