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

<div class="container top"> 
<form id="form-img1" method="post" action="ad_product_save.php" enctype="multipart/form-data">
	  <div align="left" style="margin-left:20%;">
	<?php
		$sql = "select  *  from products order by pro_id desc";
		$r	= mysqli_query($link, $sql);
		$rs_num			= mysqli_fetch_array($r);
	
		$pro_id_n		= $rs_num['pro_id'];
		
		$pro_id_n1		= intval($pro_id_n) + 1;

	?>
	<input type="hidden" name="pro_id" value="<?php echo $pro_id_n1;?>"/>
		<h3> >> เพิ่มสินค้า << </h3> <br>
    <?php
	  $sql1="select * from categories order by cat_id;"; 
	  $rs1=mysqli_query($link, $sql1);
	  $num1=mysqli_num_rows($rs1); 	
		print('<select class=\'admin-prh\' name =\'cat_id\'>');
		print('<option value=\'\'>---- กรุณาเลือกหมวดหมู่ -----&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>');	
		while($rs2 = mysqli_fetch_array($rs1))
		{   
			print("<option value=$rs2[cat_id]>$rs2[cat_name]</option>");
		}
		print('</select>');
	?>
    <br><br>
	ชื่อสินค้า : <input class="admin-prh" name="pro_name" align="middle" type="text" size="80" style="width:300px; text-align:center;">
	<br><br>
    รายละเอียดสินค้า :<br>
     <textarea class="admin-prh" name="detail" align="middle" cols="60" rows="5"type="text-area" size="80" style="width:500px;"></textarea>
	<br><br>
    ราคา : <input class="admin-prh" name="price" align="middle" type="text" size="80" style="width:300px; text-align:center;">
	<br><br>
    รูปภาพสินค้า : <input class="admin-prh" name="img" align="middle" type="file">
	<br><br>
    </div>
    <div align="center">
	<input class="btn btn-default" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" type="submit" name="submit1" value="บันทึก">

	</form>
    </div>
    <p align="center"><font size="3"><b>ตารางแสดงรายการสินค้า</b>
<?php
	
	$rows = 5;
	if($page<="0")$page=1;
	$total_data  = mysqli_num_rows(mysqli_query($link,"select *  from products"));
	$total_page=ceil ($total_data/$rows);
	if($page>=$total_page)$page=$total_page;
	$start=($page-1)*$rows;
	
	$cat_id = $_GET['cat_id'];
	
	$sql = "select * FROM products INNER JOIN categories ON( products.cat_id = categories.cat_id )"; 
	$db_query = mysqli_query($link, $sql);
	$num_rows  = mysqli_num_rows($db_query);
	echo "รายการทั้งหมด $num_rows รายการ";
?>
</font></p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#FFCC00">
    <td width="10%"><font size="3">รหัสสินค้า</font></td>
    <td width="10%"><font size="3">รูปสินค้า</font></td>
    <td width="20%"><font size="3">ชื่อสินค้า</font></td>
    <td width="20%"><font size="3">ชื่อหมวดหมู่</font></td>
    <td width="10%"><font size="3">ราคา</font></td>
	<td width="10%"><font size="3">แก้ไข</font></td>
	<td width="20%"><font size="3">ลบ</font></td>
  </tr>
  <?php
	$i = 0;
	while($i < $num_rows)
	{
		$rs = mysqli_fetch_array($db_query);	
			
		$pro_id 	= $rs['pro_id'];
		$pro_name 	= $rs['pro_name'];
		$cat_id = $rs['cat_id'];
		$cat_name = $rs['cat_name'];
		$price = $rs['price'];
		$detail = $rs['detail'];
		$quantity = $rs['quantity'];
		$img = $rs['img'];
	?> 
  <tr>
    <td align="center"><font size="3"><?=$pro_id;?></font></td>
    <td align="center"><font size="3"><img src="<?=$img;?>" width="70" height="70" border="0" /></font></td>
    <td align="center"><font size="3"><?=$pro_name;?></font></td>
    <td align="center"><font size="3"><?=$cat_name;?></font></td>
    <td align="center"><font size="3"><?=$price;?></font></td>
	<td align="center"><a href="update_product.php?pro_id=<?=$pro_id;?>"><img src="../../images/edit.png" width="30" height="30" border="0" /></a></td>
	<td align="center"><a href="del_product.php?pro_id=<?=$pro_id;?>" class="style2" OnClick="return chkdel();" onclick= "return del()"><img src="../../images/del.png" width="30" height="30" border="0" /></a></td>
  </tr>
  <?php
  	$i++;
     }
	 ?>
</table>
<center><red>***เรียงลำดับภาพจากการอัพเดตล่าสุด</red>
<nav aria-label="Page navigation">
  <ul class="pagination">
    <li <?php if($page==1) echo 'class="disabled"';?>>
      <a href="ad_product.php?page=<?=$page-1;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li >
	<?php for($i=1;$i<=$total_page;$i++){ ?>
    <li <?php if($page==$i) echo 'class="active"';?>><a href="ad_product.php?page=<?=$i;?>"><?=$i;?></a></li>
	<?php } ?>
    <li <?php if($page==$total_page) echo 'class="disabled"';?>>
      <a href="ad_product.php?page=<?=$page+1;?>" aria-label="Next">
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