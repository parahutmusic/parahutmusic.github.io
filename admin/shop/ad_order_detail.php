<?php 
include "check-login.php";
include "dblink.php";
?>
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
<?php 
include "wg/menu.php";
?>
<div class="container top" style="margin-top:-20px;;"> 
    </div>
    <p align="center"><font size="3"><b>ตารางแสดงรายการสั่งซื้อสินค้า</b>
<?php	
	$order_id = $_GET['order_id'];
	
	$sql = "SELECT *  FROM products INNER JOIN tb_order_detail on(products.pro_id = tb_order_detail.pro_id) where tb_order_detail.order_id = '$order_id' ";
	$db_query = mysqli_query($link, $sql);
	$num_rows  = mysqli_num_rows($db_query);
	//echo $sql;
	echo "รายการทั้งหมด $num_rows รายการ";
?>
</font></p>
<table width="90%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#FFCC00">
    <td width="10%"><font size="3">รายการ</font></td>
    <td width="10%"><font size="3">รหัสสั่งซื้อ</font></td>
    <td width="20%"><font size="3">ชื่อสินค้า</font></td>
    <td width="5%"><font size="3">จำนวน</font></td>
    <td width="10%"><font size="3">ราคา</font></td>
  </tr>
  <?php
	$i = 0;
	while($i < $num_rows)
	{
		$rs = mysqli_fetch_array($db_query);	
			
		$order_id 	= $rs['order_id'];
		$pro_name 	= $rs['pro_name'];
		$total = $rs['total'];
		$phone = $rs['phone'];
		$quantity = $rs['quantity'];
		$status = $rs['status'];
		$order_date = $rs['order_date'];
		$size = $rs['size'];
		$sum	= $rs['price']*$quantity;
		$total1	+= $sum;
	?> 
  <tr>
    <td align="center"><font size="3"><?php echo $p += 1; ?></font></td>
    <td align="center"><font size="3"><?=$order_id;?></font></td>
    <td align="center"><font size="3"><?=$pro_name;?> <?=$size;?></font></td>
    <td align="center"><font size="3"><?=$quantity;?></font></td>
    <td align="center"><font size="3"><?=$total;?></font></td>
  </tr>
  <?php
  	$i++;
     }
 ?>
   <tr>
  	<td align="center" colspan="3"></td>
    <td align="center" bgcolor="#dff0d8"><font size="3">ราคารวม</font></td>
    <td align="center"  bgcolor="#dff0d8"><font size="3"><?=$total1;?></font></td>
  </tr>
</table>
<br>
<div class="row text-center">
 <a href="#" onClick="history.back();"><input class="btn btn-danger" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" name="return" value="กลับ"></a>
 <button class="btn btn-primary  btn-lg" onClick="window.print()"> พิมพ์รายละเอียดสั่งซื้อ </button>
</div>
</div>
<br>
<script language="JavaScript">
function chkdel(){if(confirm('  กรุณายืนยันการลบอีกครั้ง !!!  ')){
	return true;
}else{
	return false;
}
}
</script>
<script>
    document.getElementById("drop").onclick = function() {openNav()};

    function openNav(){
        document.getElementById("Dropdown").classList.toggle("show");
    }
</script>
<script src="../../assets/js/modernizr-2.8.3.min.js"></script>

<!-- Include jquery.min.js plugin -->
<script src="../../assets/js/jquery-2.1.0.min.js"></script>

<!-- Include magnific-popup.min.js -->
<script src="../../assets/js/jquery.magnific-popup.min.js"></script>

<!-- Google Maps Script -->
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>

<!-- Gmap3.js For Static Maps -->
<script src="../../assets/js/gmap3.js"></script>

<!-- Javascript Plugins  -->
<script src="../../assets/js/plugins.js"></script>

<!-- Custom Functions  -->
<script src="../../assets/js/functions.js"></script>

<script src="../../assets/js/wow.min.js"></script>

<script type="text/javascript" src="../../assets/js/jquery.ajaxchimp.min.js"></script>

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
</body>
</html>