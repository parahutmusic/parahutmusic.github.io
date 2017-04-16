<?php
session_start();
$msg = "";
if($_POST) {
 	$login = $_POST['login'];
	$pw = $_POST['pswd'];
  $login = $_POST['login'];
  $pw = $_POST['pswd'];
  if(($login == "") && ($pw == "")) {
  echo "<script>alert('กรุณาป้อน Username หรือ Password');history.back();</script>";
  echo "<script langquage='javascript'>\n";
  echo " window.location=\"index.php\"\n";
  echo  "</script>\n";
  } else {
  	if(($login != "admin@parahut") && ($pw != "1959900423488")) {

    if(($login != "admin@parahut") && ($pw != "1959900423488")) {
    echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');history.back();</script>";
    echo "<script langquage='javascript'>\n";
    echo " window.location=\"index.php\"\n";
    echo  "</script>\n";
  	} else {

    } else {
      if(($login == "admin@parahut") && ($pw != "1959900423488")) {
        echo "<script>alert('Password ไม่ถูกต้อง');history.back();</script>";
        echo "<script langquage='javascript'>\n";
        echo " window.location=\"index.php\"\n";
        echo  "</script>\n";
      } else {
        if(($login != "admin@parahut") && ($pw == "1959900423488")) {
        echo "<script>alert('Username ไม่ถูกต้อง');history.back();</script>";
        echo "<script langquage='javascript'>\n";
        echo " window.location=\"index.php\"\n";
        echo  "</script>\n";
        } else {

      		$_SESSION['admin'] = "admin@parahut";
      		header("location: admin_home.php");
      		exit;
        }
      }
  	}
          $_SESSION['admin'] = "admin@parahut";
          header("location: admin_home.php");
          exit;
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

<script>
function initMap() {
  var uluru = {lat: 7.294519, lng: 100.136190};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: uluru
  });

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">พาราฮัท มิวสิค</h1>';

  var infowindow = new google.maps.InfoWindow({
    content: contentString,
    position: uluru,
    map: map,
  });

  var marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}
</script>


<script>

 $(document).ready(function() {

  /* -------- One page Navigation ----------*/
  $('#main-menu #menu').onePageNav({
    currentClass: 'active',
    changeHash: false,
    scrollSpeed: 1500,
    scrollThreshold: 0.5,
    scrollOffset: 95,
    filter: ':not(.sub-menu a, .not-in-home)',
    easing: 'swing'
  }); 


  /*----------- Google Map - with support of gmaps.js ----------------*/

  function isMobile() { 
   return ('ontouchstart' in document.documentElement);
 }

 function init_gmap() {
   if ( typeof google == 'undefined' ) return;
   var options = {
    center: [-37.817331, 144.955652],
    zoom: 15,
    mapTypeControl: true,
    mapTypeControlOptions: {
     style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
   },
   navigationControl: true,
   scrollwheel: false,
   streetViewControl: true
 }

 if (isMobile()) {
  options.draggable = false;
}

$('#googleMaps').gmap3({
  map: {
   options: options
 },
 marker: {
   latLng: [-37.817331, 144.955652],
   options: { icon: 'images/mapicon.png' }
 }
});
}

init_gmap();
});



</script>
</html>