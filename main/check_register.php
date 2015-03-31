<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-main.php';?>

<?php /****************END menu-main********************/?>
<?php include 'slide-img.php';?>
 
<?
$name = $_POST["name"]; /*สร้างตัวแปรขึ้นมาเพื่อรองรับค่า ผ่านทาง  method post*/
$surename = $_POST["surename"];
$email = $_POST["email"];
$username = $_POST["username"];
$pass = $_POST["pwd"];
$status = user ;

include '../connect/db.php'; /*ดึงไฟล์ db.php ที่อยู่ใน folder connect เข้ามาเพื่อใช้ในการติดต่อ database*/
connect_db(); /*เปิดการติดต่อ database*/
$sql = "INSERT INTO member (name,surename,email,username,password,status)"."VALUES('$name','$surename','$email','$username','$pass','$status')";
$res = mysql_query($sql);

print "Register Complete";
	print "<meta http-equiv='refresh' content='1;URL= index.php' />";

?>


<?php /****************END container********************/?>



<?php include '../include/footer.php';?>

