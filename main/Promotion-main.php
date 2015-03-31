<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-main.php';?>

<?php /****************END menu-main********************/?>
<?php include 'slide-img.php';?>
<?php include '../connect/db.php'; /*ดึงไฟล์ db.php ที่อยู่ใน folder connect เข้ามาเพื่อใช้ในการติดต่อ database*/			
connect_db();
?>
      <!-- Features Section -->
      <?
          	mysql_query('SET CHARACTER SET utf8');
			$strSQL1 = "SELECT * FROM promotion ORDER BY id ASC";
			$objQuery1 = mysql_query($strSQL1);
			
			while($objResuut1 = mysql_fetch_array($objQuery1))
			{
			?>
			
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><?=$objResuut1["pro_name"];?></h2>
            </div>
            <div class="col-md-6">
            	<?=nl2br($objResuut1["pro_detail1"]);?>  
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="../picPromotion/<?=$objResuut1["pro_img"];?>" alt="">
            </div>
        </div>
        <!-- /.row -->
		<?
			}
			?>
        <hr>


<?php /****************END container********************/?>



<?php include '../include/footer.php';?>


