<?php include "admin/dblink.php"; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include "wg/scriptheader.php" ?>
</head>
  	<body class="header-fixed-top">
      <?php include "wg/menu.php" ?>
  
  	<?php {
	$band_id = $_GET['band_id'];
	
	$sql = "select *  from band where band.band_id = '$band_id'"; 
	$db_query = mysqli_query($link, $sql);
	$num_rows  = mysqli_num_rows($db_query);
	$rs = mysqli_fetch_array($db_query);
		
		$band_id 	= $rs['band_id'];
		$band_name 	= $rs['band_name'];
		$band_pic 	= $rs['band_pic'];
		$band_dt 	= $rs['band_dt'];
		$music 	= $rs['music'];
		
			
	?>
      <section id="main-content" class="main-content blog-post-singgle-page">
        <div class="container">
          <div class="row">
            <div class="col-sm-8">
              <div id="blog-post-content" class="blog-post-content">
                <article class="post type-post">
                  <div class="post-top">
                    <div class="post-thumbnail">
                      <img class="img-responsive" src="admin/<?=$band_dt;?>" alt="parahut">
                    </div><!-- /.post-thumbnail -->  
                    <div class="post-meta">
                      <div class="entry-meta">
                        <div class="author-avatar">
                          <img src="admin/<?=$band_pic;?>" alt="parahut">
                        </div><!-- /.author-avatar -->
                        <div class="entry-meta-content">
                          <span class="entry-date">
                            <time datetime="2015-01-15"><h2  class="entry-title"><?php echo "&rsaquo;&rsaquo; ";  echo $band_name;?></h2></time>
                          </span>
                        </div><!-- /.meta-content -->
                      </div><!-- /.entry-meta -->
                    </div><!-- /.post-meta -->
                  </div><!-- /.post-top -->
                  <div class="post-content" style="border-bottom: 0px solid #4caf50;">
                 		<h2  class="entry-title">ผลงานเพลง</h2>
                  		<pre style="font-family: 'Kanit', sans-serif; font-size:16px;"><?php echo $music;?></pre>
                        	
           <div id="blog-sidebar" class="blog-sidebar widget-area" role="complementary" style="padding:0px;" >
                <div class="sidebar-content">
 <?php		
	$sql2 = "SELECT * FROM memberband inner join member on (memberband.member_id = member.member_id) where memberband.band_id = '$band_id' "; 
	$db_query2 = mysqli_query($link, $sql2);
	$num_rows2  = mysqli_num_rows($db_query2);
	?>               

                  <aside class="widget widget_recent_entries" style="padding-bottom:0px;">
   					 <ul class="recent-post">
                           <?php
  	
	$i = 0;
	while($i < $num_rows2)
	{
		$rs2 = mysqli_fetch_array($db_query2);
					
		$member_id 	= $rs2['member_id'];
		$pername 	= $rs2['prename'];
		$member_name 	= $rs2['member_name'];
		$member_nikname 	= $rs2['member_nikname'];
		$day 	= $rs2['day'];
		$month 	= $rs2['month'];
		$year 	= $rs2['year'];
		$member_edu 	= $rs2['member_edu'];
		$position 	= $rs2['position'];
		$member_pic	= $rs2['member_pic'];
	
	?> 
                      <li>
                        <div class="recent-post-details" style="clear: both;">
                            <div class="post-thumbnail">
                            <img class="img-responsive col-xs-12 col-sm-4" src="admin/<?=$member_pic;?>" width="100%" alt="parahut">
                            </div>
                            <div class="detail">
                             ชื่อ : <?php echo $pername ;?> <?php echo $member_name ;?><br>
                            ชื่อเล่น : <?php echo $member_nikname ;?><br>
                            เกิดวันที่ : <?php echo $day;?> / <?php echo $month; ?> / <?php echo $year; ?><br>
การศึกษา<pre style="padding: 0px;margin: 0 0 10px;font-family: 'Kanit', sans-serif;line-height: 1.42857143;color: #333;word-break: break-all;word-wrap: break-word;background-color: #FFF;border: 0px solid #ccc;border-radius: 0px;    white-space: pre-wrap; "><?php echo $member_edu ;?></pre>
							</div>
                        </div><!-- /.recent-post-details -->
                      </li>
       <?php
  	$i++;
     }
	 ?>
    				</ul>
  
                    <!-- /.recent-post -->
                  </aside><!-- /.widget -->

                    </div><!-- /.sidebar-content -->
                  </div><!-- /#sidebar -->
                 
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

