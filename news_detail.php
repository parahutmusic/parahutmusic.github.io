<?php include "admin/dblink.php"; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include "wg/scriptheader.php" ?>
</head>
    <body class="header-fixed-top">
      <?php include "wg/menu.php" ?>
  
  	<?php {
	$news_id_m = $_GET['news_id'];
	
		$sql_1 = "SELECT * FROM photonews where news_id = '$news_id_m'";
		$link_query_1 = mysqli_query($link, $sql_1);
		$rsm1 = mysqli_fetch_array($link_query_1);
		
		$news_id1 = $rsm1['news_id'];
		$photo_name1 = $rsm1['photo_name'];
			
		$sql_2 = "SELECT * FROM news where news_id = '$news_id_m'"; 	
		$link_query_2 = mysqli_query($link, $sql_2);
		$rsm2 = mysqli_fetch_array($link_query_2);
		
		$news_id2 = $rsm2['news_id'];
		$news_name2 = $rsm2['news_name'];
		$news_detail2 = $rsm2['news_detail'];
		$news_date2 = $rsm2['news_date'];
			
	?>
      <section id="main-content" class="main-content blog-post-singgle-page">
        <div class="container">
          <div class="row">
            <div class="col-sm-8">
              <div id="blog-post-content" class="blog-post-content">
                <article class="post type-post">
                  <div class="post-top">
                    <div class="post-thumbnail">
                      <img class="img-responsive" src="admin/<?=$photo_name1;?>" alt="parahut">
                    </div><!-- /.post-thumbnail -->  
                    <div class="post-meta">
                      <div class="entry-meta">
                        <div class="author-avatar">
                          <img src="images/logo/parahutnews.jpg" alt="parahut">
                        </div><!-- /.author-avatar -->
                        <div class="entry-meta-content">
                          <span class="entry-date">
                            <time datetime="2015-01-15" ><i class="glyphicon glyphicon-time"></i> <?php echo "ลงวันที่ : $news_date2";?> 
<!--  Share Button Start -->
<!-- <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Loader" type="text/javascript"></script>  <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>  <div align=right><a name="fb_share" type="button_count" href="javascript"onclick="window.open('https://www.facebook.com/sharer.php?u=http%3A%2F%2Fparahutmusic.com%2Fnews_detail.php%3Fnews_id%3D<?php echo $news_id2;?>','windowname2','width=560, height=500, directories=no, location=no, menubar=no, resizable=no, scrollbars=no, status=no, toolbar=no'); return false;"><img src="images/fb.png" width="100" class="btn btn-default"></a> -->


<!-- <div class="fb-share-button" data-href="http://parahutmusic.com/news_detail.php?news_id=<?php echo $news_id2;?>" data-layout="box_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fparahutmusic.com%2Fnews_detail.php%3Fnews_id%3D<?php echo $news_id2;?>&amp;src=sdkpreparse">แชร์</a></div> -->
<!--  Share Button Start -->

<!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <!-- Your share button code -->
  <div class="fb-share-button" 
    data-href="http://parahutmusic.com/news_detail.php?news_id=<?php echo $news_id2;?>" 
    data-layout="button_count">
  </div>
                            </time>
                          </span>
                        </div><!-- /.meta-content -->
                      </div><!-- /.entry-meta -->
                    </div><!-- /.post-meta -->
                  </div><!-- /.post-top -->
                  <div class="post-content">
                    <h2 class="entry-title"><a href="#"><?php 
					echo "<br>";
				 	echo "&rsaquo;&rsaquo; "; 
					echo "$news_name2 ";
					echo "<br>";
					?></a></h2>
                    <p class="entry-text">
                      <?php 
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo "$news_detail2";
					?>
                    </p>
                  </div><!-- /.post-content -->
	
                </article>
              </div>
            </div>
            	<?php } ?>
                
                
<?php		
	$sql1 = "SELECT * FROM news INNER JOIN photonews ON (news.news_id = photonews.news_id) ORDER BY news.news_id DESC LIMIT 0,5"; 
	$db_query1 = mysqli_query($link, $sql1);
	$num_rows1  = mysqli_num_rows($db_query1);
?>
            <div class="col-sm-4">
              <div id="blog-sidebar" class="blog-sidebar widget-area" role="complementary">
                <div class="sidebar-content">

                  <aside class="widget widget_recent_entries">
                    <h3 class="widget-title">
                      ข่าวล่าสุด
                    </h3><!-- /.widget-title -->
                    
      <?php
  	
	$i = 0;
	while($i < $num_rows1)
	{
		$rs = mysqli_fetch_array($db_query1);
					
		$news_id 	= $rs['news_id'];
		$news_detail1 = $rs['news_detail'];
		$news_name 	= $rs['news_name'];
		$photo_name1 = $rs['photo_name'];
		
		
	?> 
    <ul class="recent-post">
                      <li>
                        <div class="recent-post-details">
                            <div class="post-thumbnail">
                              <img class="img-responsive" src="admin/<?=$photo_name1;?>"  alt="parahut">
                            </div>
                            <?php echo mb_substr($news_detail1,0,100,"UTF-8");?>
                            <a href="news_detail.php?news_id=<?php echo $news_id;?>"><red>.... อ่านต่อ</red></a>
                        </div><!-- /.recent-post-details -->
                      </li>
    </ul>
     <?php
  	$i++;
     }
	 ?>
                   
                    <!-- /.recent-post -->
                  </aside><!-- /.widget -->

                    </div><!-- /.sidebar-content -->
                  </div><!-- /#sidebar -->
                </div>
              </div>
            </div><!-- /.container -->
          </section><!-- /#main-content -->



<?php include"wg/footer.php"; ?>



          <div id="scroll-to-top" class="scroll-to-top">
           <span>
            <i class="fa fa-chevron-up"></i>    
          </span>
        </div><!-- /#scroll-to-top -->


<?php include "wg/script.php" ?>


      </body>
      </html>