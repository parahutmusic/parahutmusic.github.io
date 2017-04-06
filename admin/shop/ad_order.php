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
  <style type="text/css">
  @media print{
	  #hid{
		  display:none;
	  }
}
  </style>
<body style="margin:0;padding:0;">
<?php 
include "wg/menu.php";
?>
<div class="container top" style="margin-top:-20px;;"> 
    </div>
    <p align="center"><font size="3"><b>ตารางแสดงรายการสั่งซื้อสินค้า</b>
<?php
	
	$rows = 5;
	if($page<="0")$page=1;
	$total_data  = mysqli_num_rows(mysqli_query($link,"select *  from tb_order"));
	$total_page=ceil ($total_data/$rows);
	if($page>=$total_page)$page=$total_page;
	$start=($page-1)*$rows;
	
	$cat_id = $_GET['cat_id'];
	
	$sql = "SELECT *  FROM tb_order";
	$db_query = mysqli_query($link, $sql);
	$num_rows  = mysqli_num_rows($db_query);
	echo "รายการทั้งหมด $num_rows รายการ";
?>
</font></p>
<table width="90%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#FFCC00">
    <td width="10%"><font size="3">รหัสสั่่งซื้อ</font></td>
    <td width="20%"><font size="3">ชื่อลูกค้า</font></td>
    <td width="20%"><font size="3">เบอร์โทร</font></td>
	<td width="10%" id="hid" ><font size="3">ดูรายการสั่งซื้อ</font></td>
    <td width="20%"><font size="3">วันที่สั่งซื้อ</font></td>
    <td width="5%"><font size="3">การจัดส่ง</font></td>
    <td width="5%"><font size="3">ลบ</font></td>
  </tr>
  <?php
	$i = 0;
	while($i < $num_rows)
	{
		$rs = mysqli_fetch_array($db_query);	
			
		$order_id 	= $rs['order_id'];
		$name 	= $rs['name'];
		$phone = $rs['phone'];
		$status = $rs['status'];
		$order_date = $rs['order_date'];
	?> 
  <tr>
    <td align="center"><font size="3"><?=$order_id;?></font></td>
    <td align="center"><font size="3"><?=$name;?></font></td>
    <td align="center"><font size="3"><?=$phone;?></font></td>
    <td align="center" id="hid"><font size="3"><a href="ad_order_detail.php?order_id=<?php echo $order_id ;?>&<?php echo $name; ?>"  class="btn btn-info btn-xs">รายละเอียด</a></font></td>
    <td align="center"><font size="3"><?=$order_date;?></font></td>
    <td align="center"><font size="3"><?=$status;?></font></td>
    <td align="center"><font size="3"><a href="del_order.php?order_id=<?=$order_id;?>" OnClick="return chkdel();" onclick= "return del()" class="btn btn-danger btn-xs">ลบ</a></font></td>
  </tr>
  <?php
  	$i++;
     }
 ?>
</table><br>

<div class="row text-center" id="hid">
 <button class="btn btn-primary btn-lg" onClick="window.print()"> พิมพ์รายการสั่งซื้อ </button>
</div>
<center id="hid"><red>***เรียงลำดับจากการอัพเดตล่าสุด</red>
<nav aria-label="Page navigation" >
  <ul class="pagination">
    <li <?php if($page==1) echo 'class="disabled"';?>>
      <a href="ad_order.php?page=<?=$page-1;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li >
	<?php for($i=1;$i<=$total_page;$i++){ ?>
    <li <?php if($page==$i) echo 'class="active"';?>><a href="ad_order.php?page=<?=$i;?>"><?=$i;?></a></li>
	<?php } ?>
    <li <?php if($page==$total_page) echo 'class="disabled"';?>>
      <a href="ad_order.php?page=<?=$page+1;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</center>
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