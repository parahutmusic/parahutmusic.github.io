<?php include "admin/dblink.php"; 

$news_id = $_GET['news_id'];

$sql5 = "SELECT * FROM news where news_id = '$news_id'";
$link_query = mysqli_query($link, $sql5);
$rsm5 = mysqli_fetch_array($link_query);

$news_id = $rsm5['news_id'];
$news_view = $rsm5['news_view'];
$count = $news_view + 1;
 
$sql6 = "update news set news_view = $count WHERE news.news_id = $news_id";
$query  = mysqli_query($link ,$sql6);

?>
<!doctype html>
<html lang="en">
<head>
  <?php {
  $news_id_m = $_GET['news_id'];
      
    $sql_2 = "SELECT * FROM news INNER JOIN photonews ON (news.news_id = photonews.news_id) where news.news_id = '$news_id_m'";
    $link_query_2 = mysqli_query($link, $sql_2);
    $rsm2 = mysqli_fetch_array($link_query_2);
    
    $news_id2 = $rsm2['news_id'];
    $news_name2 = $rsm2['news_name'];
    $news_detail2 = $rsm2['news_detail'];
    $news_date2 = $rsm2['news_date'];
    $photo_name2 = $rsm2['photo_name'];
    $news_view = $rsm2['news_view'];
      
  ?>
<title>พาราฮัทมิวสิค | <?php echo $news_name2; ?></title>
<meta name="description" content="<?php echo mb_substr($news_detail2,0,100,"UTF-8");?>">
  <meta property="og:url"           content="http://parahutmusic.com/news_detail.php?news_id=<?=$news_id2;?>" />
  <meta property="og:title"         content="พาราฮัทมิวสิค | <?php echo $news_name2; ?>" />
  <meta property="og:description"   content="<?php echo mb_substr($news_detail2,0,150,"UTF-8");?>" />
  <meta property="og:image"         content="http://parahutmusic.com/admin/<?php echo $photo_name2;?>"/>
  <?php include "wg/scriptheader.php" ?>
</head>
    <body class="header-fixed-top">
      <?php include "wg/menu.php" ?>
      <section id="main-content" class="main-content blog-post-singgle-page">
        <div class="container">
          <div class="row">
            <div class="col-sm-8">
              <div id="blog-post-content" class="blog-post-content">
                <article class="post type-post">
                  <div class="post-top">
                    <div class="post-thumbnail">
                      <img class="img-responsive" src="admin/<?php echo $photo_name2;?>" alt="parahut">
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
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Loader" type="text/javascript"></script>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
<!-- <div align=left>
<a name="fb_share" type="button_count" href="javascript"onclick="window.open('https://www.facebook.com/sharer.php?u=http%3A%2F%2Fparahutmusic.com%2Fnews_detail.php%3Fnews_id%3D<?php //echo $news_id2;?>','windowname2','width=560, height=500, directories=no, location=no, menubar=no, resizable=no, scrollbars=no, status=no, toolbar=no'); return false;"><img src="images/fb.png" width="100" class="btn btn-default"></a>
</div> -->
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58d00123e2c2ebb4"></script> 
<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox_r5zh"></div>
<!--  Share Button Start -->
                            </time>
                          </span>
                        </div><!-- /.meta-content -->
                      </div><!-- /.entry-meta -->
                    </div><!-- /.post-meta -->
                  </div><!-- /.post-top -->
                  <div class="post-content">
                    <span class="glyphicon glyphicon-eye-open"></span>&nbsp
                    <span class="badge"><?php echo $news_view;?></span> ครั้ง
                    <br>
                    <h2 class="entry-title"><a href="#">
                    <?php 
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
                    <br>
                    <div class="comment">
                  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments" data-href="http://parahutmusic.com/news_detail.php?news_id=<?=$news_id2;?>" data-numposts="5"></div>
                  </div>
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