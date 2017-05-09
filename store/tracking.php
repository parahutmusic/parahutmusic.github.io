<?php include "dblink.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="shortcut icon" href="../images/icon.png">
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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    

  <style type="text/css">
  body{
    font-family: kanit
  }
  @media print{
	  #hid{
		  display:none;
	  }
}
  </style>
  </head>
  <body>   
<?php include "wg/menu.php" ?>
<div class="single-product-area">
<div class="container">
  <div class="row">
  <div class="col-md-2"></div>
    <div class="col-md-8" style="background-color:#f4f4f4">
      <h3 align="center" style="color:green">
      <span class=" glyphicon glyphicon-file"> </span>
         ตรวจสอบเลขเช็คพัสดุ </h3>

<?php
  
  $perpage = 10;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;

  
  $sql = "SELECT *  FROM tracking INNER JOIN tb_order ON (tracking.order_id = tb_order.order_id) order by track_id desc limit {$start} , {$perpage}";
  $db_query = mysqli_query($link, $sql);
  $num_rows  = mysqli_num_rows($db_query);
?>
  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#FFCC00">
    <td width="30%"><font size="3">เลขที่ใบสั่งซื้อ</font></td>
    <td width="40%"><font size="3">ชื่อลูกค้า</font></td>
    <td width="30%"><font size="3">เลขเช็คพัสดุ</font></td>
  </tr>
    <?php
  $i = 0;
  while($i < $num_rows)
  {
    $rs = mysqli_fetch_array($db_query);  
      
    $order_id   = $rs['order_id'];
    $name   = $rs['name'];
    $phone = $rs['phone'];
    $status = $rs['status'];
    $address = $rs['address'];
    $order_date = $rs['order_date'];
    $track_num = $rs['track_num'];

  ?> 
  <tr>
    <td align="center"><font size="3"><?=$order_id;?></font></td>
    <td align="center"><font size="3"><?=$name;?></font></td>
    <td align="center"><font size="3"><?=$track_num;?></font></td>
  </tr>
  <?php
    $i++;
     }
  ?>
  </table>
  <br>
    </div>
<div class="col-md-2"></div>
</div>
<br>
<center><red>***เรียงลำดับจากการอัพเดตล่าสุด</red>
<?php
 $sql2 = "select * from tracking";
 $query2 = mysqli_query($link, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
<nav>
 <ul class="pagination">
 <li <?php if($page == 1) echo 'class="disabled"';?>>
 <a href="tracking.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li <?php if($page == $i) echo 'class="active"';?>><a href="tracking.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
 <li <?php if($page == $total_page) echo 'class="disabled"';?>>
 <a href="tracking.php?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
</center>
</div>
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