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
		$strSQL = "UPDATE products ";
		$strSQL .=" SET product_type = '".$_POST["product_type"]."' product_name = '".$_POST["product_name"]."' WHERE id = '".$_POST["id"]."' ";
		$objQuery = mysql_query($strSQL);
		include '../connect/db.php';
		connect_db();
		
		$id=$_POST["id"];
		$product_type = $_POST["product_type"];
		$product_name = $_POST["product_name"];
		$product_price = $_POST["product_price"];
		
		mysql_query('SET CHARACTER SET utf8');
		$sqlUpdate = "UPDATE products SET product_type = '$product_type',product_name = '$product_name',product_price = '$product_price' WHERE id = '$id'";
		mysql_query($sqlUpdate);
	
	if($_FILES["filUpload"]["name"] != "")
	{
		if(copy($_FILES["filUpload"]["tmp_name"],"images/".$_FILES["filUpload"]["name"]))
		{

			//*** Delete Old File ***//			
			@unlink("images/".$_POST["OldFile"]);
			
			$product_img_name = $_FILES["filUpload"]["name"];
			//*** Update New File ***//
			mysql_query('SET CHARACTER SET utf8');
			$sqlUpdate1 = "UPDATE products SET product_img_name = '$product_img_name' WHERE id = '$id'";
			mysql_query($sqlUpdate1);

			echo "<script>alert(\"edit successfully.\");</script>";
			echo "<script>window.location='ad_store.php'</script>";

		}
	}
?>
 <hr>
    </div>
    
    
    <div class="clearfix visible-lg"></div>
  </div>
<?php /****************END container********************/?>



<?php include '../include/footer.php';?>

