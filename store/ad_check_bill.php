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
  <div class="col-md-3"></div>
    <div class="col-md-6" style="background-color:#f4f4f4">
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
            <input type="email"  name="email" id="email" class="form-control" required placeholder="E-Mail" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12" align="center">
            <button type="submit" class="btn btn-primary" id="btn">ตรวจสอบ</button>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12" align="left">
          <span>&raquo; ขั้นตอนการติดต่อเจ้าหน้าที่ หากลืม เลขที่ใบสั่งซื้อ</span><br>
          <span>
          1. คลิก <a href="" data-target="#myModal" data-toggle="modal" style="color: red;">&raquo; ติดต่อเจ้าหน้าที่ &laquo;</a> <br>
          2. กรอก e-mail ที่ได้ทำการสั่งซื้อสินค้า <br>
          3. เจ้าหน้าที่จะส่ง เลขที่ใบสั่งซื้อ ไปทาง e-mail ของคุณ
          </span>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12" align="center">
            <a href="" data-target="#myModal" data-toggle="modal"  style="color: red;">&raquo; ติดต่อเจ้าหน้าที่ &laquo;</a>
          </div>
        </div>
      </form>
  <!-- Modal -->
       <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" style="margin-top: 15%;">
          <div class="modal-content">
          <form method="POST" action="sent_mail.php" class="form-horizontal">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">กรุณาป้อน E-Mail</h4>
            </div>
              <div class="modal-body">                
                  <div class="col-sm-12" align="center">
                    <input type="email" name="email" id="email" class="form-control" required placeholder="E-Mail" />
                    <br>
                  </div>                
              </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btn">ยืนยัน</button>
            </div>
          </form>
        </div>
    </div>
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