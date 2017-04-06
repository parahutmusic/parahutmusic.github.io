<?php include "admin/dblink.php"; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include "wg/scriptheader.php" ?>
</head>
  	<body class="header-fixed-top">
      <?php include "wg/menu.php" ?>

<section id="latest-post" class="latest-post">
  <div class="container th">
    <div class="post-area">
      <div class="post-area-top text-center">
        <h2 class="post-area-title">พาราฮัทมิวสิค</h2>
        <p class="title-description">รายละเอียด และข้อมูลการติดต่อ</p>
      </div><!-- /.post-area-top -->
	<div class="col-sm-6 map-contact col-xs-12">
    <h3 class="map-contact"><i class="fa fa-map-marker top-icon" aria-hidden="true"></i>แผนที่</h3>
    <section id="contact" class="contact">
  <div class="contact-area th">
    <!-- Google Map Section -->
    <div id="google-map" class="google-map">
      <div class="map-container">
 		 <div id="map"></div>
			<script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAir_blMHtx2YK8X25btrr7bk48kjwLFQI&callback=initMap">
            </script>
 	   </div>
      </div><!-- /.map-container -->
    <!-- Google Map Section End -->
  </div><!-- /.contact-area -->
</section><!-- /#contact -->
    </div>
    <div class="col-sm-6 map-contact col-xs-12">
		<h3 class="map-contact"><i class="fa fa-map-marker top-icon" aria-hidden="true"></i>ข้อมูลการติดต่อ</h3>
   		<div class="top-icon"><i class="fa fa-home"></i></div>117 ม.8 ต.หนองธง อ.ป่าบอน จ.พัทลุง<br>
        <div class="top-icon"><i class="fa fa-phone"></i></div>ติดต่องานแสดงศิลปิน โทร 084-185-3266<br>
        <div class="top-icon"><i class="fa fa-phone"></i></div>มิวสิควิดีโอ พาราฮัท โปรดักชั่น โทร 081-099-4345 <br>
    	<div class="top-icon"><i class="fa fa-envelope"></i></div>parahut_music@gmail.com<br>
        <div class="top-icon"><a href="https://www.facebook.com/ParahutMusicOfficial" class="top-icon fa fa-facebook"></a></div>พาราฮัทมิวสิค<br>
    	<div class="top-icon"><a href="https://www.youtube.com/user/Parahutmusic" class="top-icon fa fa-youtube-play"></a></div>PARAHUT MUSIC CHANNEL<br>
        <div class="fb-follow" data-href="https://www.facebook.com/Parahutmusic/" data-layout="standard" data-size="small" data-show-faces="true"></div>
    </div>	
</div>
</div><!-- /.post-area -->
</div><!-- /.container -->
</section><!-- /#latest-post --> 

<br>
<br>
<br>

<?php include"wg/footer.php"; ?>

          <div id="scroll-to-top" class="scroll-to-top">
           <span>
            <i class="fa fa-chevron-up"></i>    
          </span>
        </div><!-- /#scroll-to-top -->



<?php include "wg/script.php" ?>


      </body>
      </html>

