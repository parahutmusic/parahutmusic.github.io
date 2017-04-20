<?php include "dblink.php" ; ?>

<?php 	
		$email_id = $_POST['email_id'];
		$email2 	= $_POST['email'];
		$email_dt 	= "ลืมเลขที่ใบสั่งซื้อ";

	  $sql = "SELECT * FROM tb_order WHERE email = '$email2' ";
	  $db_query = mysqli_query($link, $sql);
	  $num_rows  = mysqli_num_rows($db_query);
	  $rs = mysqli_fetch_array($db_query);  

    	$email = $rs['email'];

		if($email2 != "$email")
		{
			echo "<script>alert('ไม่มีอีเมลนี้ในการสั่งซื้อ');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"ad_check_bill.php\"\n";
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

