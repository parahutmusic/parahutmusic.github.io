<?php include "dblink.php"; ?>
<?php

if($_POST) {
  $order_id2 = $_POST['order_id'];
  $email2 = $_POST['email'];

  $sql = "SELECT * FROM tb_order WHERE order_id ='$order_id2' AND email = '$email2' ";
  $db_query = mysqli_query($link, $sql);
  $num_rows  = mysqli_num_rows($db_query);
  $rs = mysqli_fetch_array($db_query);  
      
    $order_id   = $rs['order_id'];
    $name   = $rs['name'];
    $phone = $rs['phone'];
    $status = $rs['status'];
    $email = $rs['email'];
    $order_date = $rs['order_date'];

  if(($order_id2 != "$order_id") && ($email2 != "$email")) {
  echo "<script>alert('ไม่มีเลขที่ใบสั่งซื้อ');history.back();</script>";
  echo "<script langquage='javascript'>\n";
  echo " window.location=\"ad_check_bill.php\"\n";
  echo  "</script>\n";
  } else {
    echo "<script langquage='javascript'>\n";
    echo " window.location=\"bill_payment.php?order_id=$order_id2&email=$email2\"\n";
    echo  "</script>\n";
  }
}
?>
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

  <style type="text/css">
  @media print{
	  #hid{
		  display:none;
	  }
}
  </style>
  </head>
  <body>   
<?php include "wg/menu.php" ?>
</br>
<div class="container" id="hid">
  <div class="row">
  <div class="col-md-4"></div>
    <div class="col-md-5" style="background-color:#f4f4f4">
      <h3 align="center" style="color:green">
      <span class=" glyphicon glyphicon-file"> </span>
         ตรวจสอบใบชำระเงิน </h3>
      <form  name="check-bill" method="POST" id="check-bill" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text"  name="order_id" id="order_id" class="form-control" required placeholder="เลขที่ใบสั่งซื้อ" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text"  name="email" id="email" class="form-control" required placeholder="e-mail" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12" align="center">
            <button type="submit" class="btn btn-primary" id="btn">ตวรจสอบ</button>
          </div>
        </div>
      </form>
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