<?php
session_start();
$msg = "";

include "dblink.php";

if($_POST) {
 	$login = $_POST['login'];
	$pw = md5($_POST['pswd']);

  // echo $pw;

  $sql = "SELECT * FROM userparahut WHERE user_name = '$login' and user_pass = '$pw' ";

  $db_query = mysqli_query($link, $sql);
  $num_rows  = mysqli_num_rows($db_query);
  $rs = mysqli_fetch_array($db_query);    

    $user_name   = $rs['user_name'];
    $user_pass   = $rs['user_pass'];
    $user_level  = $rs['user_level'];

  if(($login == "") && ($pw == "")) {
  echo "<script>alert('กรุณาป้อน Username หรือ Password');history.back();</script>";
  echo "<script langquage='javascript'>\n";
  echo " window.location=\"index.php\"\n";
  echo  "</script>\n";
  } else {
      if (($login != "") && ($pw == "")) {
        echo "<script>alert('กรุณาป้อน Password');history.back();</script>";
        echo "<script langquage='javascript'>\n";
        echo " window.location=\"index.php\"\n";
        echo  "</script>\n";
      } else {
          if (($login == "") && ($pw != "")) {
            echo "<script>alert('กรุณาป้อน Username');history.back();</script>";
            echo "<script langquage='javascript'>\n";
            echo " window.location=\"index.php\"\n";
            echo  "</script>\n";
        } else { 
            if (($login != "$user_name") && ($pw != "$user_pass")) {
                  echo "<script>alert('Username และ Password ไม่ถูกต้อง');history.back();</script>";
                  echo "<script langquage='javascript'>\n";
                  echo " window.location=\"index.php\"\n";
                  echo  "</script>\n";
            
           } else { 
              if (($login == "$user_name") && ($pw != "$user_pass")) {
                  echo "<script>alert('Password ไม่ถูกต้อง');history.back();</script>";
                  echo "<script langquage='javascript'>\n";
                  echo " window.location=\"index.php\"\n";
                  echo  "</script>\n";
             } else {  
                if (($login != "$user_name") && ($pw == "$user_pass")) {
                echo "<script>alert('Username ไม่ถูกต้อง');history.back();</script>";
                echo "<script langquage='javascript'>\n";
                echo " window.location=\"index.php\"\n";
                echo  "</script>\n";
               } else {
                  if (($login == "$user_name") && ($pw == "$user_pass") && ($user_level == "1")) {
                    $_SESSION['admin'] = "$user_name";
                    $_SESSION['level'] = "1";
                    header("location: admin_home.php");
                  } else {
                    if (($login == "$user_name") && ($pw == "$user_pass") && ($user_level == "2")) {
                    $_SESSION['admin'] = "$user_name";
                    $_SESSION['level'] = "2";
                    header("location: admin_home.php");
                  } else {
                    if (($login == "$user_name") && ($pw == "$user_pass") && ($user_level == "3")) {
                    $_SESSION['admin'] = "$user_name";
                    $_SESSION['level'] = "3";
                    header("location: shop/index.php");
                    exit;
                    }
                  }
                }
              }
            }
          } 
        }
      }
    }
  }
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>admin parahut</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- icon fonts font Awesome -->
	<link href="../assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- Import Magnific Pop Up Styles -->
	<link rel="stylesheet" href="../assets/css/magnific-popup.css">

	<!-- Import Custom Styles -->

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
<style>
	@imports "global.css";
	
	body {
		margin-top: 20px;
		text-align: center;
	}
	div.warn {
		color: red;
		font-size: 18px;
		margin: 10px;
	}
	img {
		height: 300px;
	}
</style>
</head>

<body>
<img src="img/btn/data-store.jpg"><br>
<div class="col-xs-12">
<form method="post">
	<input class="admin" type="text" name="login" placeholder="Username" required >
	<input class="admin" type="password" name="pswd" placeholder="Password" required>
<button type="submit">เข้าสู่ระบบ</button>
</form>
</div>
<!-- <div class="col-xs-12" style="padding: 10px; margin: 10px; font-family: kanit;">
<a href="admin_shop.php" class="btn-lg btn-success" > <span class="glyphicon glyphicon-shopping-cart"> </span> ADMIN ร้านค้าพาราฮัท </a>
</div> -->
</body>
<script>
    document.getElementById("drop").onclick = function() {openNav()};

    function openNav(){
        document.getElementById("Dropdown").classList.toggle("show");
    }
</script>
<script src="../assets/js/modernizr-2.8.3.min.js"></script>

<!-- Include jquery.min.js plugin -->
<script src="../assets/js/jquery-2.1.0.min.js"></script>

<!-- Include magnific-popup.min.js -->
<script src="../assets/js/jquery.magnific-popup.min.js"></script>

<!-- Google Maps Script -->
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>

<!-- Gmap3.js For Static Maps -->
<script src="../assets/js/gmap3.js"></script>

<!-- Javascript Plugins  -->
<script src="../assets/js/plugins.js"></script>

<!-- Custom Functions  -->
<script src="../assets/js/functions.js"></script>

<script src="../assets/js/wow.min.js"></script>

<script type="text/javascript" src="../assets/js/jquery.ajaxchimp.min.js"></script>

</html>