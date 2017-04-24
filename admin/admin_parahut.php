<?php 
include "check-login.php";
include "../admin/dblink.php";
?>
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
            <li class="list-drop"><a href="../admin/adslide.php">จัดการภาพสไลด์</a></li>
            <li class="list-drop"><a href="../admin/adnews.php">จัดการข่าวสาร</a></li>
            <li class="list-drop"><a href="../admin/adarttist.php">จัดการข้อมูลศิลปิน</a></li>
            <li class="list-drop"><a href="../admin/adlive.php">จัดการการถ่ายทอดสด</a></li>
            <li class="list-drop"><a href="../admin/shop/">จัดการข้อมูลร้านค้า</a></li>
            <li class="list-drop"><a href="../admin/ad_user.php">จัดการผู้ใช้งาน</a></li>
            <li class="list-drop"><a href="logout.php" title="ออกจากระบบ"><span class="glyphicon glyphicon-remove-circle"></span> ออกจากระบบ</a></li>
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
</script>
</body>
</html>