<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-admin.php';?>

<?php /****************END menu-main********************/?>
<?php include 'slide-img.php';?>
 
<?

$product_type =$_POST["product_type"];
$product_name =$_POST["product_name"];
$product_qty =$_POST["product_qty"];
$product_price =$_POST["product_price"];


	if(copy($_FILES["filUpload"]["tmp_name"],"images/".$_FILES["filUpload"]["name"]))
	{
		echo "Copy/Upload Complete<br>";
		$uploadpic = $_FILES["filUpload"]["name"];
		echo "$_POST[product_type]=$_POST[product_name]=$_POST[product_detail]=$_POST[product_qty]=$_POST[product_price]=$uploadpic";
		//*** Insert Record ***//
		//$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
		//$objDB = mysql_select_db("database");
		include '../connect/db.php';
		connect_db();
		mysql_query('SET CHARACTER SET utf8');
		$sql = "INSERT INTO products (product_type,product_name,product_img_name,product_qty,product_price)"."VALUES('$product_type','$product_name','$uploadpic','$product_qty','$product_price')";
		$res = mysql_query($sql);
		//$strSQL = "INSERT INTO products ";
		//$strSQL .="(product_type,product_name,product_desc,product_img_name,product_qty,product_price) VALUES ('".$_POST["product_type"]."','".$_POST["product_name"]."','".$_POST["product_detail"]."','".$_FILES["filUpload"]["name"]."','".$_POST["product_qty"]."','".$_POST["product_price"]."')";
		//$strSQL = "INSERT INTO products ";
		//$strSQL .="(product_type) VALUES ('".$_POST["product_type"]."')";
		
		//$objQuery = mysql_query($strSQL);
		print "<meta http-equiv='refresh' content='0;URL=ad_store.php' />";
	}
?>	

<?php /****************END container********************/?>



<?php include '../include/footer.php';?>


