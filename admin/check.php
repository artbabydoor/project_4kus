<?php
$product_type =$_POST["product_type"];
$product_name =$_POST["product_name"];
$product_desc =$_POST["product_detail"];
$product_qty =$_POST["product_qty"];
$product_price =$_POST["product_price"];

echo "$_POST[product_type]=$_POST[product_name]=$_POST[product_detail]=$_POST[product_qty]=$_POST[product_price]=$uploadpic";



include '../connect/db.php';
mysql_query('SET CHARACTER SET utf8');
$sql = "INSERT INTO product (product_type,product_name,product_desc,product_qty,product_price)"."VALUES('$product_type','$product_name','$product_desc','$product_qty','$product_price')";
$res = mysql_query($sql);