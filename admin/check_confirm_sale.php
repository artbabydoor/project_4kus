<?php
session_start();
$formid = isset($_SESSION['formid']) ? $_SESSION['formid'] : "";
if ($formid != $_POST['formid']) {
	echo "E00001!! SESSION ERROR RETRY AGAINT.";
} else {
	unset($_SESSION['formid']);
	if ($_POST) {
		require 'connect.php';
		$order_fullname = mysql_real_escape_string($_POST['order_fullname']);
		$order_namelist = mysql_real_escape_string($_POST['order_namelist']);

		$meSql = "INSERT INTO sale_detail (ST_name, ST_namelist) VALUES ('{$order_fullname}','{$order_namelist}') ";
		$meQeury = mysql_query($meSql);
		
		if ($meQeury) {	
			$order_id = mysql_insert_id();
			
			for ($i = 0; $i < count($_POST['qty']); $i++) {
				$new_qty=0;
				$buy_qty = mysql_real_escape_string($_POST['qty'][$i]);
				$buy_price = mysql_real_escape_string($_POST['product_price'][$i]);
				$product_id = mysql_real_escape_string($_POST['product_id'][$i]);
				$product_type = mysql_real_escape_string($_POST['product_type'][$i]);
				
				
				mysql_query('SET CHARACTER SET utf8');
				$strSQL = "SELECT * FROM products WHERE  id = '$product_id'";	
				$objQuery = mysql_query($strSQL);
					
				while($objResuut = mysql_fetch_array($objQuery))
				{
				
				 $new_qty = $objResuut["product_qty"]-$buy_qty;
				 
				 $sqlUpdate = "UPDATE products SET product_qty = '$new_qty' WHERE id = '$product_id'";
				 mysql_query($sqlUpdate);
				
				}
				
				
				$lineSql = "INSERT INTO sale_item (sale_type,sale_product_id,sale_qty,sale_price,sale_date,sale_order) VALUES ('{$product_type}','{$product_id}','{$buy_qty}','{$buy_price}',NOW(),'{$order_id}') ";
				mysql_query($lineSql);

				
				
			}
			mysql_close();
			unset($_SESSION['cart']);
			unset($_SESSION['qty']);
			/*header('location:buy_item.php?a=order');*/
			echo "<script>window.location='sale_item.php?a=order'</script>";
			
		}else{
			mysql_close();
				/*header('location:index.php?a=orderfail');*/
				echo "<script>window.location='sale_item.php?a=orderfail'</script>";
		}
	}
}
			