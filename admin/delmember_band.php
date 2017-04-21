<?php 
include "dblink.php";
?>
	<?php
	$band_id	= $_GET['band_id'];
	$member_id	= $_GET['member_id'];	
	
	$sql="delete from memberband where member_id = '$member_id';";
	$db_query=mysqli_query($link, $sql);
	
	echo "<script>history.back();</script>\n";
	echo "window.location.reload(true)=\"admember_band.php?band_id=$band_id\"\n";
	echo	"</script>\n";
?>
