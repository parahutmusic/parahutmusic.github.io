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
	echo " window.location=\"update_track.php?order_id=<?php echo $order_id ;?>\"\n";
	echo	"</script>\n";
	}else{
  	 $sql1="update tracking set track_num = '$track_num' where order_id ='$order_id'";
	 $link_query1 = mysqli_query($link, $sql1);

					echo "<script langquage='javascript'>\n";
					echo " window.location=\"ad_order.php\"\n";
					echo  "alert('แก้ไขข้อมูลเรียบร้อยแล้ว')";
					echo	"</script>\n";
   }
?>
