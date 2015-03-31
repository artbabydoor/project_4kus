<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-admin.php';?>

<?php /****************END menu-main********************/?>
<?php //include 'slide-img.php';?>
<hr>
 <div class="row">
 <?php include 'menu_bar.php';?>
    <div class="col-md-9">
<?

		//*** Update Record ***//
		include '../connect/db.php'; /*ดึงไฟล์ db.php ที่อยู่ใน folder connect เข้ามาเพื่อใช้ในการติดต่อ database*/			
		connect_db();
		mysql_query('SET CHARACTER SET utf8');
		$strSQL = "UPDATE promotion ";
		$strSQL .=" SET pro_name = '".$_POST["pro_name"]."', pro_detail1 = '".$_POST["pro_detail1"]."' WHERE id = '".$_POST["id_update"]."' ";
		$objQuery = mysql_query($strSQL);		
	
	if($_FILES["filUpload"]["name"] != "")
	{
		if(copy($_FILES["filUpload"]["tmp_name"],"../picPromotion/".$_FILES["filUpload"]["name"]))
		{

			//*** Delete Old File ***//			
			@unlink("../picPromotion/".$_POST["OldFile"]);
			
			//*** Update New File ***//
			mysql_query('SET CHARACTER SET utf8');
			$strSQL = "UPDATE promotion ";
			$strSQL .=" SET pro_img = '".$_FILES["filUpload"]["name"]."' WHERE id = '".$_POST["id_update"]."' ";
			$objQuery = mysql_query($strSQL);		

			echo "<script>alert(\"edit successfully.\");</script>";
			echo "<script>window.location='ad_promotion.php'</script>";

		}
	}
?>
 <hr>
    </div>
    
    
    <div class="clearfix visible-lg"></div>
  </div>
<?php /****************END container********************/?>



<?php include '../include/footer.php';?>

