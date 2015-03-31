<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-admin.php';?>

<?php /****************END menu-main********************/?>
<?php //include 'slide-img.php';?>

 <hr>
 <div class="row">
 <?php include 'menu_bar.php';?>
    <div class="col-md-9">
     <div class="row">
<div class="col-md-6 col-md-offset-3">
<?php
$id=$_POST["id_update"];
$type_s = $_POST["type_s"];

include "../connect/db.php";
connect_db();

$sqlUpdate = "UPDATE type SET type_name = '$type_s' WHERE type_id = '$id'";

mysql_query($sqlUpdate);
echo "<script>alert(\"edit Profile successfully.\");</script>";
echo "<script>window.location='ad_type.php'</script>";
?>
  
  </div>
</div>
    </div>
    
    
    <div class="clearfix visible-lg"></div>
  </div>
<?php /****************END container********************/?>



<?php include '../include/footer.php';?>
