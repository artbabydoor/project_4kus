<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-admin.php';?>

<?php /****************END menu-main********************/?>
 <hr>
 <div class="row">
 <?php include 'menu_bar.php';?>
    <div class="col-md-9">
      <?php include 'slide-img.php';?>
<?php 
	$id = $_REQUEST['id'];
	include '../connect/db.php'; /*ดึงไฟล์ db.php ที่อยู่ใน folder connect เข้ามาเพื่อใช้ในการติดต่อ database*/			
	connect_db();
	mysql_query('SET CHARACTER SET utf8');
	$sql = "DELETE FROM products WHERE id ='$id'";
	$res = mysql_query($sql);

	if($res )
	{
	print "Delete Complete";
	print "<meta http-equiv='refresh' content='0;URL=ad_store.php' />";
	}
	else{
	print "Delete Failed";
	print "<meta http-equiv='refresh' content='0;URL=ad_store.php' />";
	}
	
	
?>
      
</div>
    
    
    <div class="clearfix visible-lg"></div>
  </div> 

<?php /****************END container********************/?>



<?php include '../include/footer.php';?>



