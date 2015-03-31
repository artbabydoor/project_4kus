<?php include '../include/header.php';?> 
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-admin.php';?>

<?php /****************END menu-main********************/?>
<?php //include 'slide-img.php';?>
<?php include '../connect/db.php'; /*ดึงไฟล์ db.php ที่อยู่ใน folder connect เข้ามาเพื่อใช้ในการติดต่อ database*/			
	connect_db();
?>
<hr>
 <div class="row">
 <?php include 'menu_bar.php';?>
    <div class="col-md-9">
      <div class="row">
      <h2>Report การเบิกวัตถุดิบ</h2>
<div class="row ">

<div class=" col-md-5">
<a href="search_type_sale.php"><img src="images/s1.jpg" alt="..." class="img-thumbnail"></a>
</div>
<div class=" col-md-5">
<a href="search_date_sale.php"><img src="images/s2.jpg" alt="..." class="img-thumbnail"></a>
</div>
<div class=" col-md-5">
<a href="search_name_sale.php"><img src="images/s3.jpg" alt="..." class="img-thumbnail"></a>
</div>
<br>
<div class=" col-md-5">
<a href="search_price_sale.php"><img src="images/s4.jpg" alt="..." class="img-thumbnail"></a>
</div>           
</div>
    
</div>
</div>    
    <div class="clearfix visible-lg"></div>
  </div>
  
<?php /****************END container********************/?>


<?php include '../include/footer.php';?>

