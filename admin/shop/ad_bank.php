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
  
  <style>
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
    max-width: 20%;
}

#myImg:hover {opacity: 0.7;}

.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

.modal-content {
    margin: auto;
    display: block;
    width: 20%;
    max-width: 700px;
}
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 50px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #fff;
    text-decoration: none;
    cursor: pointer;
}

@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
  
<body style="margin:0;padding:0;">
<?php 
include "wg/menu.php";
?>
<div class="container top" style="margin-top:-20px;;"> 
    </div>
    <p align="center"><font size="3"><b>ตารางแสดงการโอนเงิน</b>
<?php
	$sql = "SELECT *  FROM payments INNER JOIN tb_order_detail ON(payments.order_id = tb_order_detail.order_id)";
	$db_query = mysqli_query($link, $sql);
	$num_rows  = mysqli_num_rows($db_query);
	echo "รายการทั้งหมด $num_rows รายการ";
?>
</font></p>
<table width="90%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#FFCC00">
    <td width="5%"><font size="3">รหัสสั่่งซื้อ</font></td>
    <td width="20%"><font size="3">ชื่อลูกค้า</font></td>
    <td width="15%"><font size="3">โอนจากธนาคาร</font></td>
	<td width="10%"><font size="3">หลักฐานการโอนเงิน</font></td>
    <td width="10%"><font size="3">ราคารวม</font></td>
    <td width="10%"><font size="3">จำนวนเงิน</font></td>
    <td width="10%"><font size="3">เบอร์โทร</font></td>
    <td width="5%"><font size="3">การยืนยัน</font></td>
    <td width="10%" id="hid"><font size="3">ยืนยันการโอนเงิน</font></td>
  </tr>
  <?php
	$i = 0;
	while($i < $num_rows)
	{
		$rs = mysqli_fetch_array($db_query);	
			
		$pay_id 	= $rs['pay_id'];
		$order_id 	= $rs['order_id'];
		$name 	= $rs['name'];
		$phone = $rs['phone'];
		$confirm = $rs['confirm'];
		$money = $rs['money'];
		$bank = $rs['bank'];
		$img_bank = $rs['img_bank'];
    $no = "btn-danger";
    $yes = "btn-success";
    $total = $rs['total'];
	?> 
  <tr>
    <td align="center"><font size="3"><?=$order_id;?></font></td>
    <td align="center"><font size="3"><?=$name;?></font></td>
    <td align="center"><font size="3"><?=$bank;?></font></td>
    <td align="center"><font size="3"><img id="myImg" src="../../store/<?=$img_bank;?>" width="80"></font></td>
    <td align="center"><font size="3"><?=$total;?></font></td>
    <td align="center"><font size="3"><?=$money;?></font></td>
    <td align="center"><font size="3"><?=$phone;?></font></td>
    <td align="center"><font size="3"><button class="btn <?=$$confirm;?> btn-sm" id="btn" disabled><?=$confirm;?></button></font></td>
    <td align="center" id="hid"><font size="3">
    <form  name="formlogin" action="update_bank.php" method="POST"  class="form-horizontal" enctype="multipart/form-data">
    	 <input name="confirm" value="yes" type="hidden">
       <input name="order_id" value="<?=$order_id;?>" type="hidden">
        <input name="pay_id" value="<?=$pay_id;?>" type="hidden">
      <?php 
      if($confirm == 'no'){

        ?>
        <a href="del_bank.php?pay_id=<?=$pay_id;?>" id="hidden" class="btn btn-danger btn-sm" OnClick="return chkdel();" onclick= "return del()">ลบ</a>
        <?php 
      }
      ?>
    	<button type="submit" class="btn btn-primary btn-sm" id="btn" <?php 
      if($confirm == 'yes'){

        ?>disabled=""<?php 
      }
      ?>> ยืนยัน</button>
    </form>
    </font></td>
  </tr>
  <?php
  	$i++;
     }
 ?>
</table><br>

<div id="myModal" class="modal">
  <span class="close" style="color:#FFF;">X</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<div class="row text-center" id="hid">
 <button class="btn btn-primary btn-lg" onClick="window.print()"> พิมพ์รายการสั่งซื้อ </button>
</div>

</div>
<br>
<script>
var modal = document.getElementById('myModal');

var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() { 
    modal.style.display = "none";
}
</script>

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