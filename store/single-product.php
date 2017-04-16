<?php require_once("dblink.php"); 

$sql5 = "SELECT * FROM products where pro_id = '$pro_id'";
$link_query_5 = mysqli_query($link, $sql5);
$rsm5 = mysqli_fetch_array($link_query_5);

$pro_id = $rsm5['pro_id'];
$pro_view = $rsm5['pro_view'];
$count = $pro_view + 1;
 
$sql= "update products set pro_view = $count WHERE pro_id = $pro_id";
    mysqli_query($link ,$sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parahut Shop</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../store/css/owl.carousel.css">
    <link rel="stylesheet" href="../store/css/style.css">
    <link rel="stylesheet" href="../store/css/responsive.css">

  </head>
  <body>   
<?php include "wg/menu.php" ?>

  <?php 
  
  $pro_id = $_GET['pro_id'];
	
		$sql_1 = "SELECT * FROM products where pro_id = '$pro_id'";
		$link_query_1 = mysqli_query($link, $sql_1);
		$rsm1 = mysqli_fetch_array($link_query_1);
		
		$id =  $rsm1['pro_id'];
		$pro_name 	= $rsm1['pro_name'];
		$cat_id = $rsm1['cat_id'];
		$cat_name = $rsm1['cat_name'];
		$price = $rsm1['price'];
		$detail = $rsm1['detail'];
		$quantity = $rsm1['quantity'];
		$img = $rsm1['img'];	
        $size = $rsm1['size'];   	
?>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                    <div class="product-content-right">  
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="product-images">
                                    <div class="product-main-img">
                                       <img src="../admin/shop/<?php echo $img; ?>" alt="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                <br>
			<h2 class="product-name"><?php echo "<span class=\"pro-name\" data-id=\"$id\">". $rsm1['pro_name'] . " $size</span>";?></h2>
                  <div class="product-inner-price">
                    <h4>รายละเอียด</h4>
                    <span><?php echo $detail; ?></span>
                    <br>
               	</div>  
                <ins><h4><?php echo  "<span class=\"price\">ราคา : " . number_format($rsm1['price'],2) . " บาท</span>";  ?></h4></ins>

        <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;width:100px;background:url(img/crossword.png) repeat scroll 0 0 #4caf50;">
                    เลือกขนาด<span class="glyphicon glyphicon-chevron-down floatright"></span> </button>
         <ul class="dropdown-menu" style="top: -5px;left: 100%;font-size: large;">          
                <?php 
                include "lib/pagination.php";
                $sql = "SELECT * FROM products where products.pro_name = '$pro_name'";
                $r = mysqli_query($link, $sql);
                $self = $_SERVER['PHP_SELF'];
                $h = $self . "?pro_id=";
                while($row = mysqli_fetch_array($r)) {
                    $h = $self . "?pro_id=" . $row['pro_id'] . "&pro_name=" . $row['pro_name'] . "&size=" . $row['size'];
                    echo "<li><a href=\"$h\">". $row['size'] . "</a></li>";
                }
                ?>
        </ul>
    </div> 

 <?php echo "<a href='cart.php?pro_id=$id&$pro_name&act=add' class='btn btn-info btn-md'><span class='glyphicon glyphicon-shopping-cart'> </span> เพิ่มลงตะกร้าสินค้า </a>"; ?>  
                            	</div>
                        </div>
                        
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="../store/js/owl.carousel.min.js"></script>
    <script src="../store/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="../store/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="../store/js/main.js"></script>
  </body>
</html>