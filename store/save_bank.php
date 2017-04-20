<?php include "dblink.php" ; ?>

<?php 	
		$pay_id = $_POST['pay_id'];
		$pro_id 	= $_POST['pro_id'];
		$order_id2 	= $_POST['order_id'];
		$name 	= $_POST['name'];
		$phone 	= $_POST['phone'];
		$money 	= $_POST['money'];
		$bank 	= $_POST['bank'];
		$img_bank 	= $_FILES['img_bank'];
		$confirm = 'no';
	
	$logodir1="pic_bank/";   
	$pro_pic_file1 = $logodir1.basename($_FILES['img_bank']['name']);
  	copy($_FILES['img_bank']['tmp_name'],$pro_pic_file1); 
 
   $pic_file1 = substr($pro_pic_file1,4);

   	  $sql = "SELECT * FROM tb_order WHERE order_id = '$order_id2' ";
	  $db_query = mysqli_query($link, $sql);
	  $num_rows  = mysqli_num_rows($db_query);
	  $rs = mysqli_fetch_array($db_query);  

    	$order_id = $rs['order_id'];

   
		if(empty($bank))
		{
			echo "<script>alert('กรุณาเลือกโอนผ่านธนาคาร');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"check-order-detail.php\"\n";
			echo	"</script>\n";	
		}else{
			if($order_id2 != "$order_id")
		{
			echo "<script>alert('ไม่มีเลขที่ใบสั่งซื้อ');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"check-order-detail.php\"\n";
			echo	"</script>\n";	
		}else{
			if($_FILES['img_bank']['name']=='')
			{
				echo "<script>alert('กรุณาเพิ่มรูปหลักฐาน');history.back();</script>";
				echo "<script langquage='javascript'>\n";
				echo " window.location=\"check-order-detail.php\"\n";
				echo	"</script>\n";	
			}else{
	$sql="insert into payments values('$pay_id', 
		'$order_id2', 
		'$name',
		'$bank',
		'$pro_pic_file1',
		'$money', 
		'$phone',
		'$confirm')";
	$link_query = mysqli_query($link, $sql);
					echo "<script langquage='javascript'>\n";
					echo " window.location=\"check-order-detail.php\"\n";
					echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
			}
		}
	}
?>


