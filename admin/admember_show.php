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
<p align="center"><font size="3"><b>ตารางแสดงข้อมูล</b>
<?php
 $perpage = 10;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;

	$sql = "select *  from member order by member_id limit {$start} , {$perpage} "; 
	$query = mysqli_query($link, $sql);
	$num_rows  = mysqli_num_rows($query);
	

	$sql1 = "select *  from member"; 
	$db_query1 = mysqli_query($link, $sql1);
	$num_rows1  = mysqli_num_rows($db_query1);
	echo "รายการทั้งหมด $num_rows1 รายการ";	
	
?>
</font></p>
<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#FFCC00">
    <td width="10%" style="border:solid 1px;"><font size="3">รูปภาพ</font></td>
	<td width="20%" style="border:solid 1px;"><font size="3">ชื่อนาม-สกุล</font></td>
    <td width="10%" style="border:solid 1px;"><font size="3">ชื่อเล่น</font></td>
    <td width="10%" style="border:solid 1px;"><font size="3">ตำแหน่ง</font></td>
	<td width="10%" style="border:solid 1px;"><font size="3">รายละเอียด</font></td>
	<td width="10%" style="border:solid 1px;"><font size="3">แก้ไขประวัติ</font></td>
	<td width="10%" style="border:solid 1px;"><font size="3">ลบประวัติ</font></td>
  </tr>
  <?php
  	
	$i = 0;
	while($i < $num_rows)
	{
		$rs1 = mysqli_fetch_array($query);			

		$member_id 	= $rs1['member_id'];
		$prename 	= $rs1['prename'];
		$member_name 	= $rs1['member_name'];
		$member_nikname	= $rs1['member_nikname'];
		$position 	= $rs1['position'];
		$member_pic 	= $rs1['member_pic'];		
	?> 
  <tr>
  	<td align="center" style="border:dotted 1px;"><font size="3"><img src="<?php echo $member_pic;?>" width="70" height="70" border="0" /></font></td>
	<td align="center" style="border:dotted 1px;"><font size="3"><?=$prename;?><?=$member_name;?></font></td>
    <td align="center" style="border:dotted 1px;"><font size="3"><?=$member_nikname;?></font></td>
    <td align="center" style="border:dotted 1px;"><font size="3"><?=$position;?></font></td>
	<td align="center" style="border:dotted 1px;"><font size="3"><img src="../images/view.png" width="30" height="30" border="0" /></font></td>
	<td align="center" style="border:dotted 1px;"><a href="update_member.php?member_id=<?=$member_id;?>"><img src="../images/edit.png" width="30" height="30" border="0" /></a></td>
	<td align="center" style="border:dotted 1px;"><a href="delmember.php?member_id=<?=$member_id;?>" class="style2" OnClick="return chkdel();" onclick= "return del()"><img src="../images/del.png" width="30" height="30" border="0" /></a></td>
  </tr>
  <?php
  	$i++;
     }
	 ?>
</table>
<center><red>***เรียงลำดับจากการอัพเดตล่าสุด</red>
<p align="center"><font size="3"><a href="admember.php">- เพิ่มข้อมูลศิลปิน -</a></b>
<?php
 $sql2 = "select * from member ";
 $query2 = mysqli_query($link, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
<nav>
 <ul class="pagination">
 <li <?php if($page == 1) echo 'class="disabled"';?>>
 <a href="admember_show.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li <?php if($page == $i) echo 'class="active"';?>><a href="admember_show.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
 <li <?php if($page == $total_page) echo 'class="disabled"';?>>
 <a href="admember_show.php?page=<?php echo $total_page;?>" aria-label="Next">
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