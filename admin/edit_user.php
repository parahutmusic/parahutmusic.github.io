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
	<form id="form-img1" method="post" action="edit_user_save.php" enctype="multipart/form-data">
	  <div align="center">
<?php 
	$user_id = $_GET['user_id'];

	$sql_m = "select *  from userparahut where user_id = '$user_id'"; 
	$db_query_m = mysqli_query($link, $sql_m);
	$rs = mysqli_fetch_array($db_query_m);
				
		$user_id 	= $rs['user_id'];
        $user_name    = $rs['user_name'];
        $user_pass    = $rs['user_pass'];
        $name    = $rs['name'];
?>

<input type="hidden" name="user_id" value="<?php echo $user_id;?>"/>
	
		<h3> >> แก้ไข้ ADMIN / USER << </h3> <br>
            <input name="user_name" type="text" size="30" style="width:300px;" placeholder="Username" value="<?php echo $user_name;?>">
        <br>
        <br>
            <input name="user_pass" type="password" size="30" style="width:300px;" placeholder="password" value="<?php echo $user_pass;?>">
        <br>
        <br>
            <input name="name" type="text" size="30" style="width:300px;" placeholder="ชื่อ - นามสกุล" value="<?php echo $name;?>">
        <br>
        <br>	 
<a href="#" onClick="history.back();"><input class="btn btn-danger" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" name="return" value="กลับ"></a>
	<input class="btn btn-default" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" type="submit" name="submit1" value="บันทึก">
      </div>
	</form>
</div>
</body>
</html>