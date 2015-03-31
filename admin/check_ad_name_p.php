<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-admin.php';?>

<?php /****************END menu-main********************/?>
<?php include 'slide-img.php';?>

<?
$name_p = $_POST["name_p"];//ประเภท

include '../connect/db.php'; /*ดึงไฟล์ db.php ที่อยู่ใน folder connect เข้ามาเพื่อใช้ในการติดต่อ database*/
connect_db(); /*เปิดการติดต่อ database*/
$sql = "INSERT INTO name_product (name_p)"."VALUES('$name_p')";
$res = mysql_query($sql);

print "Register Complete";
	print "<meta http-equiv='refresh' content='1;URL= ad_name_p.php' />";

?>

<?php /****************END container********************/?>



<?php include '../include/footer.php';?>
