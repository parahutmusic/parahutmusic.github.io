<?php 
include "check-login.php";
include "../admin/dblink.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin parahut</title>
    <link href="../admin/css/menu.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- icon fonts font Awesome -->
	<link href="../assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- Import Magnific Pop Up Styles -->
	<link rel="stylesheet" href="../assets/css/magnific-popup.css">

	<!-- Import Custom Styles -->
	<link href="../assets/css/style.css" rel="stylesheet">

	<!-- Import Animate Styles -->
	<link href="../assets/css/animate.min.css" rel="stylesheet">

	<!-- Import owl.carousel Styles -->
	<link href="../assets/css/owl.carousel.css" rel="stylesheet">

	<!-- Import Custom Responsive Styles -->
	<link href="../assets/css/responsive.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Kanit');
</style>
<body style="margin:0;padding:0;">
<?php include "../admin/admin_parahut.php"; ?>
<div class="container top"> 
<div id="hidden">
	<form id="form-img1" method="post" action="adnews_save.php" enctype="multipart/form-data">
<?php
		$sql = "select  *  from news order by news_id desc";
		$r	= mysqli_query($link, $sql);
		$rs_num			= mysqli_fetch_array($r);
	
		$news_id_n		= $rs_num['news_id'];
		
		$news_id_n1		= intval($news_id_n) + 1;
		
		$sql1 = "select  *  from photonews order by photo_id desc";
		$r1	= mysqli_query($link, $sql1);
		$rs1_num			= mysqli_fetch_array($r1);
	
		$photo_id_n1		= $rs1_num['photo_id'];
		
		$photo_id_n2		= intval($photo_id_n1) + 1;
		
	?>
<table class="img-responsive" align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="3" class="text-center" scope="col" align="center"><h3>เพิ่มข้อมูลข่าวสาร/กิจกรรม</h3></th>
    </tr>
 
  <tr>
    <td width="30%" valign="top"><span class="style6">>> เพิ่มรูปภาพข่าว <<</span></td>
    <td width="5%">&nbsp;</td>
    <td width="70%"><input id="img" class="btn btn-default" style="font-size:20px;" type="file"  name="photo_name" id="file1"><red> *** ขนาดภาพ 960x475  </red></td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
    </tr>
  <tr>
    <td width="30%" valign="top"><span class="style6">>> วันที่ <<</span></td>
    <td width="5%">&nbsp;</td>
    <td width="70%">
	<?php
$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");   
$thai_month_arr=array(   
    "0"=>"",   
    "1"=>"มกราคม",   
    "2"=>"กุมภาพันธ์",   
    "3"=>"มีนาคม",   
    "4"=>"เมษายน",   
    "5"=>"พฤษภาคม",   
    "6"=>"มิถุนายน",    
    "7"=>"กรกฎาคม",   
    "8"=>"สิงหาคม",   
    "9"=>"กันยายน",   
    "10"=>"ตุลาคม",   
    "11"=>"พฤศจิกายน",   
    "12"=>"ธันวาคม"                     
);   
$thai_month_arr_short=array(   
    "0"=>"",   
    "1"=>"ม.ค.",   
    "2"=>"ก.พ.",   
    "3"=>"มี.ค.",   
    "4"=>"เม.ย.",   
    "5"=>"พ.ค.",   
    "6"=>"มิ.ย.",    
    "7"=>"ก.ค.",   
    "8"=>"ส.ค.",   
    "9"=>"ก.ย.",   
    "10"=>"ต.ค.",   
    "11"=>"พ.ย.",   
    "12"=>"ธ.ค."                     
);   
function thai_date_and_time($time){   // 19 ธันวาคม 2556 เวลา 10:10:43
    global $thai_day_arr,$thai_month_arr;   
    $thai_date_return.=date("j",$time);   
    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];   
    $thai_date_return.= " ".(date("Y",$time)+543);
	$thai_date_return.= " เวลา ".date("H:i:s",$time);    
    return $thai_date_return;   
} 
?><?=thai_date_and_time(time())?>
<input  name="news_date" id="news_date" readonly type="hidden" value="<?=thai_date_and_time(time())?>
" size="35"></td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
  </tr>
  <tr>
    <td valign="top"><span class="style6">>> หัวข้อข่าว/กิจกรรม << </span></td>
    <td>&nbsp;</td>
    <td><input name="news_name" id="news_name"  type="text" size="60"></td>
  </tr>
  <tr>
    <td colspan="3" ><hr></td>
  </tr>
  <tr>
    <td valign="top"><span> >> รายละเอียดข่าวสาร/กิจกรรม << </span></td>
    <td>&nbsp;</td>
    <td>
    <div class="col-sm-12" align="left">
      <a href="javascript"onclick="window.open('ad_pic_upload.php','windowname2','width=1000, \height=600, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;" class="btn-default btn-sm btn glyphicon glyphicon-picture" ></a>
    </div>
 <textarea name="news_detail" id="news_detail" cols="60" rows="5"></textarea>
 </td>
  </tr>
</table>
<input type="hidden" name="news_id" value="<?php echo $news_id_n1;?>"/>
	<input type="hidden" name="photo_id" value="<?php echo $photo_id_n2;?>"/>
  <div align="center">	
	
	 	<ul class="portfolio-filter">
	  		<li>
			<input type="submit" class="btn btn-default" style="font-size:22px;
	  			font-weight:900;
	  			width:200px;" name="submit1" value="บันทึก">
			</li>
		</ul>
	
  </div>
	</form>
  </div>
   <!-- Modal -->
        <!--  <form method="POST" action="ad_pic_upload_save.php" class="form-horizontal">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">อัพโหลดรูปภาพ</h4>
            </div>
              <div class="modal-body">                
                  <div class="col-sm-12" align="center">
                    <input id="img_upload" class="btn btn-default" style="font-size:20px;" type="file"  name="pic_upload" id="file1">
                    <br>
                  </div>                
              </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btn">ยืนยัน</button>
            </div>
          </form> -->
  <!-- Modal -->
    <div class="text-center">
<?php
	 $perpage = 5;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;

	
		$sql_1 = "SELECT * FROM photonews order by photo_id desc limit {$start} , {$perpage}"; 
		$link_query_1 = mysqli_query($link, $sql_1);
			
		$sql_2 = "SELECT * FROM news order by news_id desc "; 	
		$link_query_2 = mysqli_query($link, $sql_2);
		$num_rows  = mysqli_num_rows($link_query_2);	
	
	$sql1 = "select *  from news where news_id order by news_id desc"; 
	$db_query1 = mysqli_query($link, $sql1);
	$num_rows1  = mysqli_num_rows($db_query1);
	
	echo "รายการทั้งหมด $num_rows1 รายการ";
?></div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#FFCC00" style="border-bottom:1px solid #000" height="40" valign="middle">
    <td width="10%"><font size="3">รหัสข่าว</font></td>
    <td width="20%"><font size="3">หัวข้อข่าว</font></td>
	<td width="10%"><font size="3">รูปข่าว</font></td>
	<td width="10%"><font size="3">แก้ไข</font></td>
	<td width="10%"><font size="3">ลบข้อมูล</font></td>
  </tr>
	<?php
	$i = 0;
	while($i < $num_rows)
	{
		$rs1 = mysqli_fetch_array($link_query_1);
		
		$photo_name1 = $rs1['photo_name'];
		
		$rs2 = mysqli_fetch_array($link_query_2);
		
		$news_id = $rs2['news_id'];
		$news_name2 = $rs2['news_name'];
		$news_detail2 = $rs2['news_detail'];
		$news_date2 = $rs2['news_date'];
	?>
  <tr style="border-bottom:1px solid #000;" height="80">
    <td align="center"><font size="3"><?=$news_id;?></font></td>
	<td align="center"><font size="3"><?=$news_name2;?></font></td>
    <td align="center"><font size="3"><img src="<?=$photo_name1;?>" width="200" height="80" border="0" /></font></td>
	<td align="center"><a href="update_news.php?news_id=<?=$news_id;?>"><img src="../images/edit.png" width="30" height="30" border="0" /></a></td>
	<td align="center"><a href="delnews.php?news_id=<?=$news_id;?>" class="style2" OnClick="return chkdel();" onclick= "return del()"><img src="../images/del.png" width="30" height="30" border="0" /></a></td>
  </tr>
  <?php
  	$i++;
     }
	 ?>
</table>
<center><red>***เรียงลำดับจากการอัพเดตล่าสุด</red>
<?php
 $sql2 = "select * from news";
 $query2 = mysqli_query($link, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
<nav>
 <ul class="pagination">
 <li <?php if($page == 1) echo 'class="disabled"';?>>
 <a href="adnews.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li <?php if($page == $i) echo 'class="active"';?>><a href="adnews.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
 <li <?php if($page == $total_page) echo 'class="disabled"';?>>
 <a href="adnews.php?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
</center>
<br>
<script language="JavaScript">
function chkdel(){if(confirm('  กรุณายืนยันการลบอีกครั้ง !!!  ')){
	return true;
}else{
	return false;
}
}
</script>
</div>
</body>
</html>