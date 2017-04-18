<?php include "dblink.php" ; ?>

<?php 	
		$pay_id = $_GET['pay_id'];
		
		$pay_id = $_POST['pay_id'];
		$confirm = $_POST['confirm'];
		$order_id 	= $_POST['order_id'];
		$status = "จัดส่งสินค้า";
	
	$sql="update payments set confirm = '$confirm' where payments.pay_id ='$pay_id'";
	$link_query = mysqli_query($link, $sql);


	$sql2="update tb_order set status = '$status' where tb_order.order_id ='$order_id'";
	$link_query2 = mysqli_query($link, $sql2);
	
					echo "<script langquage='javascript'>\n";
					echo " window.location=\"ad_bank.php\"\n";
					echo  "alert('ยืนยันการโอนเงินเรียบร้อยแล้ว')";
					echo	"</script>\n";
?>


