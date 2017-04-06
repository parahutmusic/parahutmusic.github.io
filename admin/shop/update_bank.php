<?php include "dblink.php" ; ?>

<?php 	
		$pay_id = $_GET['pay_id'];
		
		$pay_id = $_POST['pay_id'];
		$confirm = $_POST['confirm'];
	
	$sql="update payments set confirm = '$confirm' where payments.pay_id ='$pay_id'";
	$link_query = mysqli_query($link, $sql);
					echo "<script langquage='javascript'>\n";
					echo " window.location=\"ad_bank.php\"\n";
					echo  "alert('ยืนยันการโอนเงินเรียบร้อยแล้ว')";
					echo	"</script>\n";
?>


