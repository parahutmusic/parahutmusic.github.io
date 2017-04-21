<?php include "admin/dblink.php"; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include "wg/scriptheader.php" ?>
</head>
  	<body class="header-fixed-top">
      <?php include "wg/menu.php" ?>
        
		<?php {	
		$sql_1 = "SELECT * FROM live order by live_id desc "; 
		
		$link_query_1 = mysqli_query($link, $sql_1);

		$num_rows  = mysqli_num_rows($link_query_1);
		
		$rs1 = mysqli_fetch_array($link_query_1);
		
		$live_id = $rs1['live_id'];

		$live_url = $rs1['live_url'];
		$live_date = $rs1['live_date'];	
	?>
<section id="latest-post" class="latest-post">
  <div class="container th">
    <div class="post-area">
      <div class="post-area-top text-center">
        <h2 class="post-area-title">PARAHUT LIVE</h2>
        <p class="title-description">รายงานสด จากพาราฮัท</p>
      </div><!-- /.post-area-top -->
      <div class="row">
          <div class="col-lg-12 text-center">
            <div class="item">
            	
              <article class="post type-post col-lg-8 col-sm-8">
                <div class="post-top th">
                   <div class='embed-container'>
                      <iframe src="<?=$live_url?>"  frameborder="0" allowfullscreen></iframe>
                   </div>
                 <!-- ?rel=0&amp;showinfo=0&autoplay=1 -->
                </div><!-- /.post-top -->

              </article>
              
              <article class="post type-post col-lg-4 col-sm-4">
                <div class="post-top th">
                		<h2 class="text-center post-area-title-ads">ขอขอบคุณ</h2>
                        <br>
                       <div class="ads">
               			      <div class="col-xs-6">
                            <img class="img-responsive" src="admin/img/ads/ads-delong.jpg" alt="parahut">
                          </div>
                          <div class="col-xs-6">
                            <img class="img-responsive" src="admin/img/ads/ads-redbull.jpg" alt="parahut">
                          </div>
                          
                       </div>
                </div><!-- /.post-top -->
              </article>
            </div><!-- /.item -->
          </div>
    </div><!-- /.row -->
  </div><!-- /.post-area -->
</div><!-- /.container -->
</section><!-- /#latest-post --> 
<?php } ?>


<?php include"wg/footer.php"; ?>





<!-- Include modernizr-2.8.3.min.js -->
<script src="assets/js/modernizr-2.8.3.min.js"></script>

<!-- Include jquery.min.js plugin -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Include magnific-popup.min.js -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>

<!-- Google Maps Script -->
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>

<!-- Gmap3.js For Static Maps -->
<script src="assets/js/gmap3.js"></script>

<!-- Javascript Plugins  -->
<script src="assets/js/plugins.js"></script>

<!-- Custom Functions  -->
<script src="assets/js/functions.js"></script>

<script src="assets/js/wow.min.js"></script>

<script type="text/javascript" src="assets/js/jquery.ajaxchimp.min.js"></script>



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

