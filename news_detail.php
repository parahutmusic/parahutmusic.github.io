<?php include "admin/dblink.php"; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include "wg/scriptheader.php" ?>
</head>
  <style type="text/css">
    /*** Share Post Styling ***/
#share-post {
width: 100%;
overflow: hidden;
margin-top: 20px;
}
#share-post a {
display: block;
height: 32px;
line-height: 43px;
color: #fff;
float: left;
padding-right: 10px;
margin-right: 10px;
margin-bottom: 25px;
text-decoration: none;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-o-border-radius: 4px;
-ms-border-radius: 4px;
-khtml-border-radius: 4px;
border-radius: 4px;
overflow: hidden;
margin: 0 10px 10px 0;
transition: .5s;
-webkit-transition: .5s;
-moz-transition: .5s;
width: 125px;
height: 45px;
float: left;
padding: 0;
overflow: hidden;
text-align: center;
font-weight: 600;
}
#share-post
.facebook {
background-color: #6788CE;
}
#share-post
.twitter {
background-color: #29C5F6;
}
#share-post
.google {
background-color: #E75C3C;
}
#share-post
span {
display: block;
width: 32px;
height: 32px;
float: left;
padding: 6px;
background: url(http://4.bp.blogspot.com/-M_utSb-nN04/U6V8Gut9dJI/AAAAAAAAAjE/6g1X58pjjcg/s1600/single-share.png) no-repeat;
background-position-y: 6px;
background-position-x: 7px;
}
#share-post
.facebook span {
background-color: #3967C6;
}
#share-post
.twitter span {
background-color: #26B5F2;
background-position: -65px;
}
#share-post
.google span {
background-color: #E94D36;
background-position: -137px;
}
  </style>
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
<div id='share-post'>
  <a class='facebook' expr:href='data:post.sharePostUrl + &quot;&amp;target=facebook&quot;' expr:onclick='&quot;window.open(this.href, \&quot;_blank\&quot;, \&quot;height=430,width=640\&quot;); return false;&quot;' expr:title='data:top.shareToFacebookMsg' target='_blank'>
    <span/>
    SHARE
  </a>
</div>
<!--  Share Button Start -->
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