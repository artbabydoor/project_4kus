<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-admin.php';?>

<?php /****************END menu-main********************/?>
<?php include 'slide-img.php';?>
 
<?
	if(copy($_FILES["filUpload"]["tmp_name"],"../picPromotion/".$_FILES["filUpload"]["name"]))
	{
		echo "Copy/Upload Complete<br>";

		//*** Insert Record ***//
		include '../connect/db.php'; /*ดึงไฟล์ db.php ที่อยู่ใน folder connect เข้ามาเพื่อใช้ในการติดต่อ database*/			
		connect_db();
		mysql_query('SET CHARACTER SET utf8');
		$strSQL = "INSERT INTO promotion ";
		$strSQL .="(pro_name,pro_img,pro_detail1) VALUES ('".$_POST["pro_name"]."','".$_FILES["filUpload"]["name"]."','".$_POST["pro_detail1"]."')";
		$objQuery = mysql_query($strSQL);
		print "<meta http-equiv='refresh' content='1;URL=ad_promotion.php' />";
	}
?>	

<?php /****************END container********************/?>



<?php include '../include/footer.php';?>


