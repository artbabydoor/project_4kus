<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-admin.php';?>

<?php /****************END menu-main********************/?>
<?php include 'slide-img.php';?>
 
<?
	if(copy($_FILES["filUpload"]["tmp_name"],"../pic/".$_FILES["filUpload"]["name"]))
	{
		echo "Copy/Upload Complete<br>";

		//*** Insert Record ***//
		include '../connect/db.php'; /*ดึงไฟล์ db.php ที่อยู่ใน folder connect เข้ามาเพื่อใช้ในการติดต่อ database*/			
		connect_db();
		mysql_query('SET CHARACTER SET utf8');
		$strSQL = "INSERT INTO pic_stock ";
		$strSQL .="(img_name,img_picname,type_id) VALUES ('".$_POST["picname"]."','".$_FILES["filUpload"]["name"]."','".$_POST["type_id"]."')";
		$objQuery = mysql_query($strSQL);
		print "<meta http-equiv='refresh' content='1;URL=menu_order.php' />";
	}
?>	

<?php /****************END container********************/?>



<?php include '../include/footer.php';?>


