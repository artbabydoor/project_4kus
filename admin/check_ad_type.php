<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-admin.php';?>

<?php /****************END menu-main********************/?>
<?php include 'slide-img.php';?>

<?
$type_s = $_POST["type_s"];//ประเภท

include '../connect/db.php'; /*ดึงไฟล์ db.php ที่อยู่ใน folder connect เข้ามาเพื่อใช้ในการติดต่อ database*/
connect_db(); /*เปิดการติดต่อ database*/
$sql = "INSERT INTO type (type_name)"."VALUES('$type_s')";
$res = mysql_query($sql);

print "Register Complete";
	print "<meta http-equiv='refresh' content='1;URL= ad_type.php' />";

?>

<?php /****************END container********************/?>



<?php include '../include/footer.php';?>
