<?php
    session_start();  
	
	
	// echo "<pre>";
	// print_r($_SESSION);
	// echo "<hr>";
	// print_r($_POST);
	// echo "</pre>";

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->

<?php
   
require_once('dblink.php');

	//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');

	$name = $_POST["name"]; 
	$address = $_POST["address"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$quantity = $_POST["quantity"];
	$total = $_POST["total"];
	$size = $_POST["size"];
	$order_date = date("Y-m-d H:i:s");
	$status = "ค้างชำระเงิน";


$code = "PRH";
$yearMonth = substr(date("Y")+543, -2).date("m");

//query MAX ID 
$sql = "SELECT MAX(order_id) AS order_id FROM tb_order";
$qry = mysqli_query($link , $sql) or die(mysql_error());
$rs = mysqli_fetch_assoc($qry);
$maxId = substr($rs['order_id'], -4);  //ข้อมูลนี้จะติดรหัสตัวอักษรด้วย ตัดเอาเฉพาะตัวเลขท้ายนะครับ
$maxId = ($maxId + 1); 

$maxId = substr("0000".$maxId, -4);
$nextId = $code.$yearMonth.$maxId;
	
	
	//บันทึกการสั่งซื้อลงใน order_detail
	mysqli_query($link, "BEGIN"); 
	$sql1 = "INSERT INTO tb_order VALUES
	('$nextId',  
	'$name',
	'$address',
	'$email',
	'$phone',
	'$status',
	'$order_date' 
	)";
	
	$query1	= mysqli_query($link, $sql1) or die ("Error in query: $sql1 " . mysqli_error());
	
	//บันทึกการสั่งซื้อลงใน customers
	$sql2 = "SELECT MAX(order_id) AS order_id FROM tb_order  WHERE phone='$phone'";
	$query2	= mysqli_query($link, $sql2);
	$row = mysqli_fetch_array($query2);
	$order_id = $row['order_id'];
	
	
	foreach($_SESSION['shopping_cart'] as $size_id=>$quantity)
	 
	{
		$sql3	= "SELECT * FROM products INNER JOIN pro_size ON (products.pro_id = pro_size.pro_id) where pro_size.size_id = '$size_id'";
		$query3 = mysqli_query($link, $sql3);
		$row3 = mysqli_fetch_array($query3);
		$total = $row3['price']*$quantity;
		$size_name = $row3['size_name'];
		
		$sql4 = "INSERT INTO tb_order_detail 
		values(NULL, 
		'$order_id', 
		'$size_id', 
		'$quantity', 
		'$total')";
		$query4	= mysqli_query($link, $sql4);
		
		
		/*$sql5 = "INSERT  INTO customers 
		VALUES(NULL,  
		'$email',
		'$name',
		'$address',
		'$phone'
		)";
		$query5	= mysqli_query($link, $sql5);*/
	}
	
	if($query1 && $query4){
		mysqli_query($link, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว";
		foreach($_SESSION['shopping_cart'] as $pro_id)
		{	
			unset($_SESSION['shopping_cart']);
		}
	}
	else{
		mysqli_query($link, "ROLLBACK");  
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อแอดมิน";	
	}

?>


<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='bill_payment.php?order_id=<?php echo $order_id;?>';
</script>

<?php

	mysqli_close($link);
	?>
 
</body>
</html>