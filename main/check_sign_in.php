<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-main.php';?>

<?php /****************END menu-main********************/?>
<?php 


$username = $_POST["username"];
$pass = $_POST["password"];


include '../connect/db.php';
connect_db();
$sql = "SELECT * FROM member WHERE username = '$username' and password = '$pass'";
$res = mysql_query($sql);
$darr = mysql_fetch_array($res);
if($darr == 0)
{	
	
    print "ไม่มีชื่อผู้ใช้นี้";
    print "<meta http-equiv='refresh' content='1;URL=sign_in.php' />";
}
else
{
    print "ยินดีต้อนรับ";
    $sql1 = "SELECT * FROM member WHERE username = '$username'";
    $res1 = mysql_query($sql1);
    while($objResuut = mysql_fetch_array($res1))
    {
    	
    $_SESSION["name"] = $objResuut['name']; 
    $_SESSION["surename"] = $objResuut['surename']; 
    $_SESSION["status"] = $objResuut['status'];
    $_SESSION["username"] = $username;
    
    if($_SESSION["status"] == "admin")
    {
        $_SESSION["admin"] = "admin";
         print "<meta http-equiv='refresh' content='1;URL=../admin/index.php' />"; 
    }
    else
    {	
        print "<meta http-equiv='refresh' content='1;URL=index.php' />";
    }
    }
}


?>

<?php /****************END container********************/?>



<?php include '../include/footer.php';?>

