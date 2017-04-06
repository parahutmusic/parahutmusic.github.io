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

	<a href="admember.php"><input type="button" class="btn btn-primary add-btn" style="font-size:22px;font-weight:500;margin-bottom:10px;margin-top:10px" value="เพิ่ม/จัดการข้อมูลศิลปิน"></a>
    
    
    <a href="adband.php"><input type="button" class="btn btn-primary add-btn" style="font-size:22px;font-weight:500;margin-bottom:10px;margin-top:10px" value="เพิ่ม/จัดการวงดนตรี"></a>
</div>
</body>
</html>