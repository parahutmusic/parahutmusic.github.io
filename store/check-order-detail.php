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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>   
<?php include "wg/menu.php" ?>
<div class="single-product-area">
   		 <div class="zigzag-bottom"></div>
                 <div class="container">
                  <div class="row">
                  <div class="col-md-4"></div>
                    <div class="col-md-5" style="background-color:#f4f4f4">
                      <h3 align="center" style="color:green; margin-top:10px;">
                      <span class="glyphicon glyphicon-bell"></span> แจ้งการโอนเงิน </h3>
                      
                      <form  name="formlogin" action="save_bank.php" method="POST"  class="form-horizontal" enctype="multipart/form-data">
                      <?php
							$sql = "select  *  from payments order by pay_id desc";
							$r	= mysqli_query($link, $sql);
							$rs_num			= mysqli_fetch_array($r);
						
							$pay_id_n		= $rs_num['pay_id'];
							
							$pay_id_n1		= intval($pay_id_n) + 1;
						?>
							<input type="hidden" name="pay_id" value="<?php echo $pay_id_n1;?>"/>
                        <div class="form-group">
                          <div class="col-sm-12">
                            <input type="text"  name="name" class="form-control" required placeholder="ชื่อ-นามสกุล" />
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-12">
                            <input type="text"  name="phone" class="form-control" required placeholder="เบอร์โทรศัพท์" />
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-12">
                            <select name="bank">
                              <option value="">------- โอนผ่านธนาคาร -------</option>
                              <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                              <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                              <option value="ธนาคารทหารไทย TMB">ธนาคารทหารไทย TMB</option>
                              <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                              <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                              <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                       	 <div class="col-sm-4 text-right" style="padding:10px; color:#F00;">
                            หลักฐานการโอนเงิน&nbsp;:
                          </div>
                          <div class="col-sm-8">
                            <input type="file"  name="img_bank" class="form-control" required placeholder="หลักฐานการโอนเงิน" />
                            <red>*เพื่อความรวดเร็วในการตรวจสอบ</red>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-12">
                            <input type="text"  name="money" class="form-control" required placeholder="จำนวนเงิน" />
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-12">
                            <input type="text"  name="order_id" class="form-control" required placeholder="เลขที่ใบสั่งซื้อ" />
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-12" align="center">
                            <button type="submit" class="btn btn-primary" id="btn">ยืนยันการโอนเงิน</button><br>
                            <red>*กรุณาตรวจสอบข้อมูลก่อนกดยืนยัน</red>
                          </div>
                        </div>
                      </form>
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