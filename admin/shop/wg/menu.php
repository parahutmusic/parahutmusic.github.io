<?php 
include "check-login.php";
include "dblink.php";
?>
<style type="text/css">
     <?php
        if($_SESSION['admin'] == "admin@shop") { ?>

        #hidden { 
          display:none;
        }
        #show { 
          display:block;
        }

      <?php } else if($_SESSION['admin'] == "admin@parahut") { ?>

        #hidden { 
          display: contents;
        }
        #show { 
          display: none;
        }
        <?php } else { ?>

          <?php } ?>
        }
  </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin parahut</title>
    <link href="css/menu.css" rel="stylesheet">
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- icon fonts font Awesome -->
	<link href="../../assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- Import Magnific Pop Up Styles -->
	<link rel="stylesheet" href="../../assets/css/magnific-popup.css">

	<!-- Import Custom Styles -->
	<link href="../../assets/css/style.css" rel="stylesheet">

	<!-- Import Animate Styles -->
	<link href="../../assets/css/animate.min.css" rel="stylesheet">

	<!-- Import owl.carousel Styles -->
	<link href="../../assets/css/owl.carousel.css" rel="stylesheet">

	<!-- Import Custom Responsive Styles -->
	<link href="../../assets/css/responsive.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Kanit');
</style>
<body style="margin:0;padding:0;">
<div id="fix">
<div class="menudrop">
    <div class="dropdown">
        <div id="drop" class="icon-l">
        <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="parahut-menu">
   			<h1>Parahut Music</h1>
        </div>
        <ul id="Dropdown" class="dropdown-content dropbg">
       		<li class="list-drop" id="hidden"><a href="../admin_home.php" style="color: #FF0;"> >> เมนูหลัก << </a></li>
            <li class="list-drop" id="hidden"><a href="../shop/">หมวดหมู่สินค้า</a></li>
            <li class="list-drop" id="hidden"><a href="../shop/ad_product.php">รายการสินค้า</a></li>
            <li class="list-drop"><a href="../shop/ad_order.php">รายการสั่งซื้อ</a></li>
            <li class="list-drop"><a href="../shop/ad_bank.php">รายการโอนเงิน</a></li>
            <li class="list-drop"><a href="../logout.php" title="ออกจากระบบ"><span class="glyphicon glyphicon-remove-circle"></span> ออกจากระบบ</a></li>
        </ul>
    </div>
</div>
</div>

<script>
    document.getElementById("drop").onclick = function() {openNav()};

    function openNav(){
        document.getElementById("Dropdown").classList.toggle("show");
    }
</script>
</body>
</html>