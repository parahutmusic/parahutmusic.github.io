<?php include "admin/dblink.php"; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include "wg/scriptheader.php" ?>
</head>
  <body class="header-fixed-top">
      <?php include "wg/menu.php" ?>

  
  	<?php {
		
	$rows = 6;
	if($page<="0")$page=1;
	$total_data  = mysqli_num_rows(mysqli_query($link,"select * from news"));
	$total_page=ceil ($total_data/$rows);
	if($page>=$total_page)$page=$total_page;
	$start=($page-1)*$rows;
			
		$sql_2 = "SELECT * FROM news inner join photonews on(news.news_id = photonews.news_id) order by news.news_id desc"; 
			
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
          <div class="col-sm-12">
          	<?php
	$i = 0;
	while($i < $num_rows)
	{	
		$rs2 = mysqli_fetch_array($link_query_2);
		
		$photo_name = $rs2['photo_name'];
		$news_id = $rs2['news_id'];
		$news_name = $rs2['news_name'];
		$news_detail = $rs2['news_detail'];
		$news_date = $rs2['news_date'];
		
	?>
            <div class="item col-sm-4">
              <article class="post type-post">
                <div class="post-top">
                  <div class="post-thumbnail">
                    <img src="admin/<?=$photo_name;?>" alt="parahut">
                  </div><!-- /.post-thumbnail -->  
                  <div class="post-meta">
                    <div class="entry-meta">
                      <span class="entry-date">
                        <time datetime="2015-01-15"><?php echo $news_date;?></time>
                      </span>
                    </div><!-- /.entry-meta -->
                  </div><!-- /.post-meta -->
                </div><!-- /.post-top -->
                <div class="post-content">
                  <h2 class="entry-title"><a href="news_detail.php?news_id=<?=$news_id;?>">
				  <?php echo "$news_name";?></a></h2>
                  <p class="entry-text">
                    <?php 
					echo mb_substr($news_detail,0,200,"UTF-8");
					?>
                    <a href="news_detail.php?news_id=<?=$news_id;?>"><red>.... อ่านต่อ</red></a>
                  </p>
                </div><!-- /.post-content -->
              </article>
            </div>
            <?php 
  	$i++;
     }
	 ?><!-- /.item -->
          </div>
      </div><!-- /.latest-posts -->
    </div><!-- /.row -->
  </div><!-- /.post-area -->
</div><!-- /.container -->
</section>
<?php } ?>


<center>
<nav aria-label="Page navigation">
  <ul class="pagination">
    <li <?php if($page==1) echo 'class="disabled"';?>>
      <a href="news.php?page=<?=$page-1;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li >
	<?php for($i=1;$i<=$total_page;$i++){ ?>
    <li <?php if($page==$i) echo 'class="active"';?>><a href="news.php?page=<?=$i;?>"><?=$i;?></a></li>
	<?php } ?>
    <li <?php if($page==$total_page) echo 'class="disabled"';?>>
      <a href="news.php?page=<?=$page+1;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</center>


<?php include"wg/footer.php"; ?>


          <div id="scroll-to-top" class="scroll-to-top">
           <span>
            <i class="fa fa-chevron-up"></i>    
          </span>
        </div><!-- /#scroll-to-top -->

<?php include "wg/script.php" ?>

      </body>
      </html>

