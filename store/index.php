<?php include "dblink.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="shortcut icon" href="../images/icon.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parahut Shop</title>
    

    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="../store/css/owl.carousel.css">
    <link rel="stylesheet" href="../store/css/style.css">
    <link rel="stylesheet" href="../store/css/responsive.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
    
    


<link href="https://fonts.googleapis.com/css?family=Kanit:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Questrial|Yellowtail" rel="stylesheet">
    
  </head>
  
  <body style="font-family:'Kanit', sans-serif;">
 
<?php include "wg/menu.php" ?>
  
    <div class="single-product-area" style="padding-top:10px;">
   		 <div class="zigzag-bottom"></div>
       		 <div class="container">
   				<div class="text-left">
					<div class="btn-group">
                    <button type="button" class="btn btn-success btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;width:200px;background:url(img/crossword.png) repeat scroll 0 0 #4caf50;">
                    หมวดหมู่<span class="glyphicon glyphicon-chevron-down floatright"></span> </button>
 		 <ul class="dropdown-menu">          
				<?php 
					$sql = "SELECT * FROM categories order by categories.cat_id ASC";
					$result = mysqli_query($link, $sql);
					$num_rows  = mysqli_num_rows($result);
                ?>
					<?php 
                include "lib/pagination.php";
                $sql = "SELECT * FROM categories LIMIT 20";
                $r = mysqli_query($link, $sql);
                $self = $_SERVER['PHP_SELF'];
                $h = $self . "?catid=";
                echo "<li><a href=\"$h\">ทั้งหมด</a></li>";
                while($cat = mysqli_fetch_array($r)) {
                    $h = $self . "?catid=" . $cat['cat_id'] . "&catname=" . $cat['cat_name'];
                    echo "<li><a href=\"$h\">". $cat['cat_name'] . "</a></li>";
                }
          ?>
		</ul>
	</div> 
</div>    
   <div class="row">
<?php
$field = "ทั้งหมด";
$sql = "SELECT *  FROM products ";
if(isset($_GET['catid']) && !empty($_GET['catid'])) {
	$cat_id  = $_GET['catid'];
	$sql .= "WHERE cat_id  = '$cat_id'";
	$field = $_GET['catname'];
}
$sql .= "ORDER BY size ASC";
$result = page_query($link, $sql, 8);
$first = page_start_row();
$last = page_stop_row();
$total = page_total_rows();
if($total == 0) {
	$first = 0;
}
?>
<?php

while($rs = mysqli_fetch_array($result)) {
	 	$id =  $rs['pro_id'];
		$pro_name 	= $rs['pro_name'];
		$cat_id = $rs['cat_id'];
		$cat_name = $rs['cat_name'];
		$price = $rs['price'];
		$detail = $rs['detail'];
		$quantity = $rs['quantity'];
		$img = $rs['img'];
    $size = $rs['size'];
    $pro_view = $rs['pro_view'];   
 ?>     
 
   
                <div class=" col-sm-3 col-xs-12" style="margin-top:20px;">
  			<?php  ?>
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="../admin/shop/<?php echo $img; ?>"><br><br>
                        </div>
                        <?php echo "<span class=\"pro-name\" data-id=\"$id\">". $rs['pro_name'] . " $size</span>";?>
                        <div class="product-carousel-price">
    <ins><?php echo  "<span class=\"price\">ราคา: " . number_format($rs['price'],2) . " บาท</span>";  ?></ins>
                    <span class="glyphicon glyphicon-eye-open"></span> 
                    <span class="badge"> <?php echo $pro_view;?></span> ครั้ง
                        </div>
                        <div class="product-option-shop">
<a href="single-product.php?pro_id=<?php echo $id; ?>&<?php echo $pro_name; ?>&size=<?php echo $size ; ?>" class="btn btn-info btn-md" onclick="document.getElementById('id01').style.display='block'">รายละเอียด</a> 
                		</div>                       
            		</div>
                  </div>
<?php
}
?>

			
         </div>
         
            <div class="text-center" style="font-size:16px;"><?php
	if(page_total() > 1) { 	 //ให้แสดงหมายเลขเพจเฉพาะเมื่อมีมากกว่า 1 เพจ
		echo '<div id="pagenum">';
		page_echo_pagenums();
		echo '</div>';
	}
	?> </div>
      </div>
   </div>
</div>


   	

    <script src="https://code.jquery.com/jquery.min.js"></script>
    

    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    

    <script src="../store/js/owl.carousel.min.js"></script>
    <script src="../store/js/jquery.sticky.js"></script>
    

    <script src="../store/js/jquery.easing.1.3.min.js"></script>
    
  
    <script src="../store/js/main.js"></script>
  </body>
</html>