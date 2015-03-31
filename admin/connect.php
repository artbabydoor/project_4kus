<?php
/*
 * set var
 */
/*
$cfHost = "localhost";
$cfUser = "design2hou_db";
$cfPassword = "123456789";
$cfDatabase = "design2hou_db";
*/


$cfHost = "localhost";
$cfUser = "root";
$cfPassword = "1234";
$cfDatabase = "database";

/*
 * connection mysql
 */
$meConnect = mysql_connect($cfHost, $cfUser, $cfPassword) or die("Error conncetion mysql...");
$meDatabase = mysql_select_db($cfDatabase);
mysql_query("SET NAMES UTF8");
