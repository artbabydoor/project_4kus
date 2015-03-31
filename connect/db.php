<?php/*โค้ดใช้ในการติดต่อ database ใช้สำหรับอัพเว็บไซต์เพื่อออนไลน์จริง*/
/*
function connect_db() { library 
	$host     = "localhost";
	$username = "design2hou_db";
	$password = "123456789";
	$db       = "design2hou_db";
	
	@mysql_connect($host, $username, $password) or die("MySQL Connection Failed");
	@mysql_select_db($db) or die("MySQL Select Database Failed");
	mysql_query("SET NAMES utf8") or die(mysql_error());
}

*/
?>

<?php 
function connect_db() { /*โค้ดใช้ในการติดต่อ database*/
	$host     = "localhost"; 
	$username = "root";
	$password = "1234";
	$db       = "database";
	
	@mysql_connect($host, $username, $password) or die("MySQL Connection Failed");
	@mysql_select_db($db) or die("MySQL Select Database Failed");
	mysql_query("SET NAMES utf8") or die(mysql_error());
}
 
?>
