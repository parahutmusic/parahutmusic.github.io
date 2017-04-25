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
<div <?php  
  if($user_level == "1"){
    echo $hidden_user;
  } else {
      if($user_level == "2"){
      echo $show_user;
      } else {
        echo $show_user;
      }
  }
  ?>>
<div class="col-xs-12 text-center" style="padding-top:60px;">
<img src="../img/btn/data-store.jpg" width="500">
<br>
    <h1>จัดการข้อมูลพาราช้อป</h1>
  </div>
</div>

<div class="container top" <?php  
  if($user_level == "1"){
    echo $show_user;
  } else {
      if($user_level == "2"){
      echo $hidden_user;
      } else {
        echo $hidden_user;
      }
  }
  ?>> 
<form id="form-img1" method="post" action="ad_categories_save.php" enctype="multipart/form-data">
	  <div align="center">
	<?php
		$sql = "select  *  from categories order by cat_id desc";
		$r	= mysqli_query($link, $sql);
		$rs_num			= mysqli_fetch_array($r);
	
		$cat_id_n		= $rs_num['cat_id'];
		
		$cat_id_n1		= intval($cat_id_n) + 1;

	?>
	<input type="hidden" name="cat_id" value="<?php echo $cat_id_n1;?>"/>
	
		<h3> >> เพิ่มหมวดหมู่สินค้า << </h3> <br>
        
	<input class="admin-prh" name="cat_name" align="middle" type="text" size="80" style="width:300px; text-align:center;">
	<br><br>
	<input class="btn btn-default" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" type="submit" name="submit1" value="บันทึก">
      </div>
	</form>
    <p align="center"><font size="3"><b>ตารางแสดงรูปภาพสไลด์</b>
<?php
	
	$rows = 5;
	if($page<="0")$page=1;
	$total_data  = mysqli_num_rows(mysqli_query($link,"select *  from categories"));
	$total_page=ceil ($total_data/$rows);
	if($page>=$total_page)$page=$total_page;
	$start=($page-1)*$rows;
	
	
	$cat_id 	= $_POST['cat_id'];
	$cat_name = $_POST['cat_name'];
	
	$sql = "select *  from categories where cat_id order by cat_id asc limit $start,10"; 
	$db_query = mysqli_query($link, $sql);
	$num_rows  = mysqli_num_rows($db_query);
	
	echo "รายการทั้งหมด $num_rows รายการ";
?>
</font></p>
<table width="50%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#FFCC00">
    <td width="20%"><font size="3">รหัสหมวดหมู่</font></td>
    <td width="30%"><font size="3">ชื่อหมวดหมู่</font></td>
	<td width="10%"><font size="3">แก้ไข</font></td>
	<td width="10%"><font size="3">ลบ</font></td>
  </tr>
  <?php
	$i = 0;
	while($i < $num_rows)
	{
		$rs = mysqli_fetch_array($db_query);		
		$cat_id 	= $rs['cat_id'];
		$cat_name 	= $rs['cat_name'];
	?> 
  <tr>
    <td align="center"><font size="3"><?=$cat_id;?></font></td>
    <td align="center"><font size="3"><?=$cat_name;?></font></td>
	<td align="center"><a href="update_categories.php?cat_id=<?=$cat_id;?>"><img src="../../images/edit.png" width="30" height="30" border="0" /></a></td>
	<td align="center"><a href="del_categories.php?cat_id=<?=$cat_id;?>" class="style2" OnClick="return chkdel();" onclick= "return del()"><img src="../../images/del.png" width="30" height="30" border="0" /></a></td>
  </tr>
  <?php
  	$i++;
     }
	 ?>
</table>

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