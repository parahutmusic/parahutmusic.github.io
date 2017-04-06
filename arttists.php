<?php include "admin/dblink.php"; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include "wg/scriptheader.php" ?>
</head>
  	<body class="header-fixed-top">
      <?php include "wg/menu.php" ?>
  
<?php {
		$sql_1 = "SELECT * FROM band order by band_id ASC"; 
		
		$link_query_1 = mysqli_query($link, $sql_1);

		$num_rows  = mysqli_num_rows($link_query_1);	
?>
<section id="portfolio" class="portfolio text-center">
 <div class="container th"><br>

    <div class="portfolio-top">
      <h2 class="portfolio-title">ศิลปิน พาราฮัท</h2>
      <p class="title-description">ประวัติ ของศิลปินในพาราฮัท</p>
  	</div>
    <?php
	$i = 0;
	while($i < $num_rows)
	{
		$rs1 = mysqli_fetch_array($link_query_1);
		
		$band_id = $rs1['band_id'];
		$band_pic = $rs1['band_pic'];
		$band_name = $rs1['band_name'];
?>
      <div class="col-sm-3 col-xs-6">
        <div class="item-image">
         <a href="band_detail.php?band_id=<?=$band_id;?>"><img src="admin/<?=$band_pic;?>" width="200" alt="parahut" style="box-shadow: #4caf50 0px 14px 23px -9px;"></a>
        </div>
        <span class="item-title"><?=$band_name;?></span>
      </div>
      <?php 
	$i++;
 	} 
 ?>
</div><!-- /.container -->
</section>
<?php } ?><!-- /#portfolio -->
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

