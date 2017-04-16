<?php include "admin/dblink.php"; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include "wg/scriptheader.php" ?>
</head>
  <body class="header-fixed-top">
    <?php include "wg/menu.php" ?> 
      
<?php {
		$sql_1 = "SELECT * FROM slide order by ad_idimg desc LIMIT 0,1 "; 
		$link_query_1 = mysqli_query($link, $sql_1);
		$rs1 = mysqli_fetch_array($link_query_1);
	$ad_img1 = $rs1['ad_img1'];
	$sql_2 = "SELECT * FROM slide order by ad_idimg desc LIMIT 1,1 "; 
		$link_query_2 = mysqli_query($link, $sql_2);
		$rs2 = mysqli_fetch_array($link_query_2);
	$ad_img2 = $rs2['ad_img1'];
	
	$sql_3 = "SELECT * FROM slide order by ad_idimg desc LIMIT 2,1 "; 
	
		$link_query_3 = mysqli_query($link, $sql_3);
		$rs3 = mysqli_fetch_array($link_query_3);
	
	$ad_img3 = $rs3['ad_img1'];
	
	$sql_4 = "SELECT * FROM slide order by ad_idimg desc LIMIT 3,1 "; 

		$link_query_4 = mysqli_query($link, $sql_4);
		$rs4 = mysqli_fetch_array($link_query_4);
	
	$ad_img4 = $rs4['ad_img1'];
	
	$sql_5 = "SELECT * FROM slide order by ad_idimg desc LIMIT 4,1 "; 
		
		$link_query_5 = mysqli_query($link, $sql_5);
		$rs5 = mysqli_fetch_array($link_query_5);
	
	$ad_img5 = $rs5['ad_img1'];

	?>
  <section id="main-slider" class="main-slider carousel slide" data-ride="carousel">
   <!-- Wrapper for slides -->
   <div class="carousel-inner" role="listbox">
    <div class="item item-1 active">
      <img src="admin/<?=$ad_img1;?>" width="3000" height="651">      
   </div>
   <div class="item item-2">
    <img src="admin/<?=$ad_img2;?>" width="3000" height="651">   
  </div>
  <div class="item item-3">
    <img src="admin/<?=$ad_img3;?>" width="3000" height="651">   
  </div>
  <div class="item item-4">
    <img src="admin/<?=$ad_img4;?>" width="3000" height="651">   
  </div>
  <div class="item item-5">
    <img src="admin/<?=$ad_img5;?>" width="3000" height="651">   
  </div>
</div>

<!-- Controls -->
<a class="left carousel-control" href="#main-slider" role="button" data-slide="prev">
  <i class="fa fa-angle-left"></i>
</a>
<a class="right carousel-control" href="#main-slider" role="button" data-slide="next">
  <i class="fa fa-angle-right"></i>
</a>

</section>	<?php } ?><!-- /#main-slider -->



<?php {
		$sql_1 = "SELECT * FROM photonews order by photo_id desc LIMIT 0,1 "; 	
		$link_query_1 = mysqli_query($link, $sql_1);
		$rs1 = mysqli_fetch_array($link_query_1);
	
	$photo_name1 = $rs1['photo_name'];
	
	$sql_2 = "SELECT * FROM photonews order by photo_id desc LIMIT 1,1 "; 	
		$link_query_2 = mysqli_query($link, $sql_2);
		$rs2 = mysqli_fetch_array($link_query_2);
	
	$photo_name2 = $rs2['photo_name'];
	
	
	$sql_4 = "SELECT * FROM news order by news_id desc LIMIT 0,1 "; 	
		$link_query_4 = mysqli_query($link, $sql_4);
		$rs4 = mysqli_fetch_array($link_query_4);
		
	$news_id4 = $rs4['news_id'];
	$news_name4 = $rs4['news_name'];
	$news_detail4 = $rs4['news_detail'];
	$news_date4 = $rs4['news_date'];
  $news_view4 = $rs4['news_view'];
	
	$sql_5 = "SELECT * FROM news order by news_id desc LIMIT 1,1 "; 	
		$link_query_5 = mysqli_query($link, $sql_5);
		$rs5 = mysqli_fetch_array($link_query_5);
	
	$news_id5 = $rs5['news_id'];
	$news_name5 = $rs5['news_name'];
	$news_detail5 = $rs5['news_detail'];
	$news_date5 = $rs5['news_date'];
  $news_view5 = $rs5['news_view'];
	
	?>
	<?php {
	
		$sql_1 = "SELECT * FROM photonews order by photo_id desc "; 
		
		$link_query_1 = mysqli_query($link, $sql_1);
			
		$sql_2 = "SELECT * FROM news order by news_id desc "; 
			
		$link_query_2 = mysqli_query($link, $sql_2);
		$num_rows  = mysqli_num_rows($link_query_2);	
	?>
<section id="latest-post" class="latest-post">
  <div class="container th">
    <div class="post-area">
      <div class="post-area-top text-center">
        <h2 class="post-area-title">ข่าวสาร พาราฮัท</h2>
        <p class="title-description">ข่าวสารประชาสัมพันธ์ กิจกรรม จากพาราฮัท</p>
      </div><!-- /.post-area-top -->

      <div class="row">
        <div class="latest-posts">
          <div class="col-sm-6">
            <div class="item">
              <article class="post type-post">
                <div class="post-top">
                  <div class="post-thumbnail">
                    <img src="admin/<?=$photo_name1;?>" alt="parahut">
                  </div><!-- /.post-thumbnail -->  
                  <div class="post-meta">
                    <div class="entry-meta">
                      <span class="entry-date">
                        <time datetime="2015-01-15"><i class="glyphicon glyphicon-time"></i> <?php echo $news_date4;?></time>&nbsp&nbsp&nbsp&nbsp
                           <i class="glyphicon glyphicon-eye-open"></i> &nbsp
                           <span class="badge"> <?php echo $news_view4;?></span> ครั้ง
                      </span>
                    </div><!-- /.entry-meta -->
                  </div><!-- /.post-meta -->
                </div><!-- /.post-top -->
                <div class="post-content">
                  <h2 class="entry-title"><a href="news_detail.php?news_id=<?=$news_id4;?>">
				  <?php echo "$news_name4";?></a></h2>
                  <p class="entry-text">
                    <?php 
					echo mb_substr($news_detail4,0,200,"UTF-8");
					?>
                    <a href="news_detail.php?news_id=<?php echo $news_id4;?>"><red>.... อ่านต่อ</red></a>
                  </p>
                </div><!-- /.post-content -->
              </article>
            </div><!-- /.item -->
          </div>
          <div class="col-sm-6">
            <div class="item">
              <article class="post type-post">
                <div class="post-top">
                  <div class="post-thumbnail">
                   <img src="admin/<?=$photo_name2;?>" alt="parahut">
                 </div><!-- /.post-thumbnail -->  
                 <div class="post-meta">
                  <div class="entry-meta">
                    <span class="entry-date">
                      <time datetime="2015-01-15"><i class="glyphicon glyphicon-time"></i> <?php echo $news_date5;?></time>&nbsp&nbsp&nbsp&nbsp
                      <i class="glyphicon glyphicon-eye-open"></i> &nbsp
                      <span class="badge"> <?php echo $news_view5;?></span> ครั้ง
                    </span>
                  </div><!-- /.entry-meta -->
                </div><!-- /.post-meta -->
              </div><!-- /.post-top -->
              <div class="post-content">
                <h2 class="entry-title"><a href="news_detail.php?news_id=<?php echo $news_id5;?>">
				  <?php echo "$news_name5";?></a></h2>
                <p class="entry-text">
                  <?php 
					echo mb_substr($news_detail5,0,200,"UTF-8");
					?>
                    <a href="news_detail.php?news_id=<?=$news_id5;?>"><red>.... อ่านต่อ</red></a>.
                </p>
                <a class="btn" href="news.php">
                    <span class="btn-icon" style="float:left;"><i class="fa fa-arrow-circle-right"></i></span>
                    <h5>ดูทั้งหมด</h5>
                </a>
              </div><!-- /.post-content -->
            </article>
          </div><!-- /.item -->
        </div>
      </div><!-- /.latest-posts -->
    </div><!-- /.row -->
  </div><!-- /.post-area -->
</div><!-- /.container -->
</section>
<?php } } ?><!-- /#latest-post --> 

<?php {
		$sql_1 = "SELECT * FROM band order by band_id ASC"; 
		
		$link_query_1 = mysqli_query($link, $sql_1);

		$num_rows  = mysqli_num_rows($link_query_1);	
?>
<section id="portfolio" class="portfolio text-center">
 <div class="container th">
  <div class="portfolio-area">
    <div class="portfolio-top">
      <h2 class="portfolio-title">ศิลปิน พาราฮัท</h2>
      <p class="title-description">ประวัติ ของศิลปินในพาราฮัท</p>
      <div class="slide-nav-container">
        <a class="slide-nav left slide-left post-prev" data-slide="post-prev"><i class="fa fa-angle-left"></i></a>
        <a class="slide-nav right slide-right post-next" data-slide="post-next"><i class="fa fa-angle-right"></i></a>
      </div>
    </div><!-- /.portfolio-top -->
    <div id="portfolio-slider" class="portfolio-slider owl-carousel owl-theme">
    <?php
	$i = 0;
	while($i < $num_rows)
	{
		$rs1 = mysqli_fetch_array($link_query_1);
		
		$band_id = $rs1['band_id'];
		$band_pic = $rs1['band_pic'];
		$band_name = $rs1['band_name'];
?>
      <div class="item">
        <div class="item-image">
         <a href="band_detail.php?band_id=<?=$band_id;?>"><img src="admin/<?=$band_pic;?>" width="200" alt="parahut"></a>
        </div>
        <span class="item-title"><?=$band_name;?></span>
      </div>
      <?php 
	$i++;
 	} 
 ?>
    </div>
  </div><!-- /.portfolio-area -->
</div><!-- /.container -->
</section>
<?php } ?><!-- /#portfolio -->

<section id="latest-post" class="latest-post">
  <div class="container th">
    <div class="post-area">
      <div class="post-area-top text-center">
        <h2 class="post-area-title">เสียงเพลงจากสวนยาง</h2>
        <p class="title-description">ฟังเพลง และ ติดตามเพจ จากพาราฮัท</p>
      </div><!-- /.post-area-top -->
      <div class="row">
          <div class="col-lg-12 text-center">
            <div class="item">
            	
              <article class="post type-post col-lg-6 col-sm-6">
                <div class="post-top th">
                <div class="title-video">
                <i class="fa fa-play-circle" style="font-size:24px"><span>Music Video</span></i>
                </div>
                   <div class='embed-container'>
                   <iframe src='https://www.youtube.com/embed/Q9LOWbDp7Xw?list=PLzFpNII8Q7bPK9LJvoOHTTTZHlbHxSrhV&amp;showinfo=0' frameborder='0' allowfullscreen></iframe>
                   </div>
                 
                </div><!-- /.post-top -->

              </article>
              
              <article class="post type-post col-lg-6 col-sm-6">
                <div class="post-top th">
                <div class="title-video">
                   <i class="fa fa-play-circle" style="font-size:24px"><span>Special Clips</span></i>
                </div>
                       <div class='embed-container'>
                       <iframe src='https://www.youtube.com/embed/videoseries?list=PLzFpNII8Q7bOt3rttcVA-MUMyH-TQl6tj&amp;showinfo=0' frameborder='0' allowfullscreen></iframe>
                       </div>
                     
                </div><!-- /.post-top -->
                  <div class="post-content" style="float:right;">
                  <a class="btn" href="https://www.youtube.com/user/Parahutmusic">
                    <span class="btn-icon" style="float:left;"><i class="fa fa-arrow-circle-right"></i></span>
                    <h5>ดูทั้งหมด</h5>
                  </a>
                </div><!-- /.post-content -->
              </article>
            </div><!-- /.item -->
          </div>
    </div><!-- /.row -->
  </div><!-- /.post-area -->
</div><!-- /.container -->
</section><!-- /#latest-post --> 


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

<?php include"wg/footer.php"; ?>

<div id="scroll-to-top" class="scroll-to-top">
  <span>
    <i class="fa fa-chevron-up"></i>    
  </span>
</div><!-- /#scroll-to-top -->

<?php include "wg/script.php" ?>


</body>
</html>