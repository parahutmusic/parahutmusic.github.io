<?php include "dblink.php" ; ?>

<?php 	
		$email_id = $_POST['email_id'];
		$email 	= $_POST['email'];
		$email_dt 	= "ลืมเลขที่ใบสั่งซื้อ";
   
		if(empty($email))
		{
			echo "<script>alert('กรุณาเลือกโอนผ่านธนาคาร');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"check-order-detail.php\"\n";
			echo	"</script>\n";	
		}else{
	$sql="insert into email values('','$email','$email_dt')";
	$link_query = mysqli_query($link, $sql);
					echo "<script langquage='javascript'>\n";
					echo " window.location=\"ad_check_bill.php\"\n";
					echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
		}
?>


