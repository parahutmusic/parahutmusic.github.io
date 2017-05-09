<?php 
include "check-login.php";
include "dblink.php";
?>
<?php 
	$order_id = $_POST['order_id'];
	$track_num = $_POST['track_num'];
	$status = 'จัดส่งสินค้าแล้ว';

   if(empty($track_num))
	{
	echo "<script>alert('กรุณาป้อน เลขที่เช็คพัสดุ');history.back();</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"ad_track.php\"\n";
	echo	"</script>\n";
	}else{
  	 $sql1="insert into tracking (track_id,track_num,order_id) VALUES('NULL','$track_num','$order_id')";
	 $link_query1 = mysqli_query($link, $sql1);

	 $sql2="update tb_order set status = '$status' where tb_order.order_id ='$order_id'";
	$link_query2 = mysqli_query($link, $sql2);

					echo "<script langquage='javascript'>\n";
					echo " window.location=\"ad_order.php\"\n";
					echo  "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
   }
?>
