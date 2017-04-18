<?php
    session_start(); 
    $pro_id = $_REQUEST['pro_id']; 
	$act = $_REQUEST['act'];
	
	
	if($act=='add' && !empty($pro_id))
	{
		if(!isset($_SESSION['shopping_cart']))
		{
			$_SESSION['shopping_cart']=array();
		}else{
		 
		}
		if(isset($_SESSION['shopping_cart'][$pro_id]))
		{
			$_SESSION['shopping_cart'][$pro_id]++;
		}
		else
		{
			$_SESSION['shopping_cart'][$pro_id]=1;
		}
	}

	if($act=='remove' && !empty($pro_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['shopping_cart'][$pro_id]);
	}
	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $pro_id => $amount)
		{
			$_SESSION['shopping_cart'][$pro_id]=$amount;
		}
	}
	if($act=='Cancel-Cart'){
		unset($_SESSION['shopping_cart']);	
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include "wg/menu.php"; ?>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row"> 
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
<form id="frmcart" name="frmcart" method="post" action="?act=update">
        <table width="100%" border="0" align="center" class="table table-hover" style="font-size:15px;">
        <tr>
          <td height="40" colspan="7" align="center" bgcolor="#CCCCCC"><strong><b>ตะกร้าสินค้า</span></strong></td>
        </tr>
        <tr>
          <td align="center" bgcolor="#EAEAEA"><strong>No.</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>รูป</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>สินค้า</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>ราคา</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>จำนวน</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>รวม/รายการ</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>ลบ</strong></td>
        </tr>
        <?php
if(!empty($_SESSION['shopping_cart']))
{
require_once('dblink.php');
	foreach($_SESSION['shopping_cart'] as $pro_id=>$quantity)
	{
		
		$sql = "select * from products where pro_id=$pro_id";
		$query = mysqli_query($link, $sql);
		while($row = mysqli_fetch_array($query))
			{		 
		$sum = $row['price'] * $quantity;
		$total += $sum;
    $size = $row['size'];  
		echo "<tr>";
		echo "<td align='center'>";
        echo $i += 1;
        echo ".";
		echo "</td>";
		echo "<td align='center' width='100'>"."<img src='../admin/shop/$row[img]'  width='50'/>"."</td>";
		echo "<td width='334'>"." " . $row["pro_name"] . " $size";
		echo "</td>";
		echo "<td width='100' align='right'>" . number_format($row["price"],2) . "</td>";
		
		echo "<td width='57' align='right'>";  
		echo "<input type='text' name='amount[$pro_id]' value='$quantity' size='2'/></td>";
		
		echo "<td width='100' align='right'>" .number_format($sum,2)."</td>";
		echo "<td width='100' align='center'><a id='dis' href='cart.php?pro_id=$pro_id&act=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";
		
		echo "</tr>";
		}
 
	}
	echo "<tr>";
  	echo "<td colspan='5' bgcolor='#CEE7FF' align='right'>ราคารวม</td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>";
  	echo "<b>";
  	echo  number_format($total,2);
  	echo " บาท</b>";
  	echo "</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>
        <tr>
          <td></td>
          <td colspan="5" align="right">
          
          
          
          
         	 <button type="submit" name="button" id="button" class="btn btn-warning"> คำนวณราคาใหม่ </button>
             <a href="cart.php?act=Cancel-Cart" class="btn btn-danger"> ยกเลิกตะกร้าสินค้า </a>
            <button type="button" name="Submit2"  onclick="window.location='confirm.php';" class="btn btn-primary">
            <span class="glyphicon glyphicon-shopping-cart"> </span> สั่งซื้อ </button>
            </td>
        </tr>
      </form>
      <p align="center"> <a href="index.php" class="btn btn-primary">กลับไปเลือกสินค้า</a> </p>

                            <div class="cart-collaterals">
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="../store/js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="../store/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="../store/js/main.js"></script>
  </body>
</html>