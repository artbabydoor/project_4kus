<?php
session_start();
$formid = isset($_SESSION['formid']) ? $_SESSION['formid'] : "";
if ($formid != $_POST['formid']) {
	echo "E00001!! SESSION ERROR RETRY AGAINT.";
} else {
	require 'connect.php';
	unset($_SESSION['formid']);
	/*if ($_POST) {
		 require 'connect.php';*/
	/*	$order_fullname = mysql_real_escape_string($_POST['order_fullname']);
		$order_address = mysql_real_escape_string($_POST['order_address']);
		$order_phone = mysql_real_escape_string($_POST['order_phone']);

		$meSql = "INSERT INTO orders (order_date, order_fullname, order_address, order_phone) VALUES (NOW(),'{$order_fullname}','{$order_address}','{$order_phone}') ";
		$meQeury = mysql_query($meSql);
		
		if ($meQeury) { */
			$order_id = mysql_insert_id();
			for ($i = 0; $i < count($_POST['qty']); $i++) {
				$buy_qty = mysql_real_escape_string($_POST['qty'][$i]);
				$buy_price = mysql_real_escape_string($_POST['product_price'][$i]);
				$product_id = mysql_real_escape_string($_POST['product_id'][$i]);
				echo $buy_qty."=".$buy_price."=".$product_id;
				
				
				$lineSql = "INSERT INTO buy_item (buy_product_id,buy_qty,buy_price,buy_date,buy_order) ";
				$lineSql .= "VALUES (";
				$lineSql .= "'{$product_id}',";		
				$lineSql .= "'{$buy_qty}',";
				$lineSql .= "'{$buy_price}',";
				$lineSql .= "NOW()";
				$lineSql .= "'{$order_id}'";
				$lineSql .= ") ";
				mysql_query($lineSql);
				
				
				/*$strSQL = "UPDATE orders ";
				$strSQL .=" SET order_phone = '{$buy_qty}' WHERE id = '{$order_id}' ";
				$objQuery = mysql_query($strSQL); */
				
			}
			mysql_close();
			unset($_SESSION['cart']);
			unset($_SESSION['qty']);
			header('location:buy_item.php?a=order');
		/*}else{
			mysql_close();
			header('location:buy_item.php?a=orderfail');
		}*/
	/*} */
}
