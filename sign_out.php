<?php
session_start(); /*เปิดใช้งาน session */
session_destroy(); /*ใช้ในการลบค่าของ session ทั้งหมด*/

?>
<?
 header( "location: index.php" ); 
 exit(0);
?>