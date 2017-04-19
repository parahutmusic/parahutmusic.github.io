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
    <style>
	.u-section .titleHeader {
    position: relative;
    height: 57px;
    width: 100%;
    margin-bottom: 15px;
}
	.titleHeader {
    position: relative;
    display: block;
    margin-bottom: 10px;
    overflow: hidden;
}
	</style>
  </head>
  <body>   
     	<div class="container" style="margin-top:40px;margin-bottom:40px;min-width: 780px;">
                <?php 
                    $order_id =$_GET['order_id'];
                    $sql1 = "SELECT *  FROM tb_order INNER JOIN tb_order_detail on(tb_order.order_id = tb_order_detail.order_id) where tb_order.order_id = '$order_id' ";
                    $db_query1 = mysqli_query($link, $sql1);
                    $rs1    = mysqli_fetch_array($db_query1);

                     $order_id1 = $rs1['order_id'];
                     $name1 = $rs1['name'];
                     $address1 = $rs1['address'];
                     $email1 = $rs1['email'];
                     $phone1 = $rs1['phone'];
                     $order_date1 = $rs1['order_date'];
                     $total1 = $rs1['total'];
                     $status1 = $rs1['status'];
                ?>
            <div class="col-xs-12" style="padding:10px;border: black 3px solid;">
            	<div class="col-xs-12" style="padding:10px; text-align: center;">
                    <img src="../images/logo.png" style="padding:10px;">
                    <h2>ใบแจ้งการชำระเงิน</h2>
                    <h3>บริษัท พาราฮัทมิวสิค จำกัด</h3>
                    <h4>117 ม.8 ต.หนองธง อ.ป่าบอน จ.พัทลุง</h2>
                </div>
                <table width="700" border="1" align="center" class="table">
                <?php   
                    $order_id = $_GET['order_id'];
                    
                    $sql = "SELECT *  FROM pro_size INNER JOIN products on(pro_size.pro_id = products.pro_id) INNER JOIN tb_order_detail on(pro_size.size_id = tb_order_detail.size_id) where tb_order_detail.order_id = '$order_id' ";
                    $db_query = mysqli_query($link, $sql);
                    $num_rows  = mysqli_num_rows($db_query);
                    //echo $sql;
                    //echo "รายการทั้งหมด $num_rows รายการ";
                ?>
                <tr>
                  <td width="1558" colspan="5" align="center">
                  <strong>รายการสินค้าที่สั่งซื้อ</strong></td>
                </tr>
                <tr class="success">
                    <td align="center">ลำดับ</td>
                    <td align="center">สินค้า</td>
                    <td align="center">ราคา</td>
                    <td align="center">จำนวน</td>
                    <td align="center">รวม/รายการ</td>
                </tr>
                <?php
                    $i = 0;
                    while($i < $num_rows)
                    {
                        $row = mysqli_fetch_array($db_query);    
                            
                        $order_id   = $row['order_id'];
                        $pro_name   = $row['pro_name'];
                        $total = $row['total'];
                        $phone = $row['phone'];
                        $quantity = $row['quantity'];
                        $status = $row['status'];
                        $order_date = $row['order_date'];
                        $size = $row['size'];
                        $sum    = $row['price']*$quantity;
                        $total2 += $sum;
                        $size_id = $row['size_id']; 
                        $size_name = $row['size_name'];
                        $price = $row['price'];
                    ?> 
                <tr>
                    <td align="center"><font size="3"><?php echo $p += 1; ?></font></td>
                    <td align="center"><font size="3"><?=$pro_name;?> <?=$size_name;?></font></td>
                    <td align="center"><font size="3"><?=$price;?></font></td>
                    <td align="center"><font size="3"><?=$quantity;?></font></td>
                    <td align="center"><font size="3"><?=$total;?></font></td>
                </tr>
                 <?php
                    $i++;
                     }
                 ?>
                <tr>
                    <td align="center" colspan="3"></td>
                    <td align="center" bgcolor="#dff0d8"><font size="3">ราคารวม</font></td>
                    <td align="center"  bgcolor="#dff0d8"><font size="3"><?=$total2;?></font></td>
                </tr>
            </table>
            <div class="col-xs-12" style="padding:10px; text-align: right;">
                <div class="col-xs-6 " style="padding:10px; text-align: left;">
                    <h2>การชำระเงิน : <font style="color: red;"><?php echo $status1 ;?></font></h2>
                    <h2>เลขที่ใบสั่งซื้อ : <font style="color: red;"><?php echo $order_id1 ;?></font></h2>
                    <h4>คุณ : <?php echo $name1 ;?></h4>
                    <h4>ที่อยู่ : <?php echo $address1 ;?></h4>
                    <h4>วันที่ทำรายการ : <?php echo $order_date1 ;?></h4>

                    <h3>จำนวนเงินที่ชำระ</h3>
                    <h1><?php echo $total1 ;?> บาท</h1>
                    <h5>**หมายเหตุ : ราคานี้ยังไม่รวมค่าส่ง</h5>
                </div>
                    <div class="col-xs-6">
                    <img src="img/KBANK.jpg">
                        <h3>ธนาคารกสิกรไทย</h3>
                        <h4>ชื่อบัญชี : นางสาวกัลยา แก้วบุญส่ง</h4>
                        <h4>เลขที่บัญชี : 018-3-71678-6</h4>
                    </div>
                </div>
            <p><a href="index.php" class="btn btn-danger">กลับหน้าหลัก</a> &nbsp;  <button class="btn btn-primary" onClick="window.print()"> พิมพ์ใบชำระเงิน </button></p>
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