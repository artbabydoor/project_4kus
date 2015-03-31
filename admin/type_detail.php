<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-admin.php';?>

<?php /****************END menu-main********************/?>
 <hr>
 <div class="row">
 <?php include 'menu_bar.php';?>
    <div class="col-md-9">
      <?php include 'slide-img.php';?>
<?php include '../connect/db.php'; /*ดึงไฟล์ db.php ที่อยู่ใน folder connect เข้ามาเพื่อใช้ในการติดต่อ database*/			
connect_db();
?>    
<!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><small> <a href="ad_type.php"><button type="button" class="btn btn-info">กลับ</button></a></small> รายการเมนูอาหาร
                <?
            $typeid = $_REQUEST['id'];
          	mysql_query('SET CHARACTER SET utf8');
          	$strSQL = "SELECT * FROM type WHERE  type_id = '$typeid'";
			
			$objQuery = mysql_query($strSQL);
			
			while($objResuut = mysql_fetch_array($objQuery))
			{
			?>
			<small>ประเภท : <?=$objResuut["type_name"];?></small>
						
			<?
			}
			?>
                    <small> <a href="ad_img.php"><button type="button" class="btn btn-success">เพิ่มเมนูอาหาร</button></a></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
<?
			$id = $_REQUEST['id'];

          	mysql_query('SET CHARACTER SET utf8');
			$strSQL1 = "SELECT * FROM pic_stock  WHERE  type_id = '$id'";
			$objQuery1 = mysql_query($strSQL1);
			
			while($objResuut1 = mysql_fetch_array($objQuery1))
			{
			?>
		<!-- Projects Row -->
        
            <div class="col-md-3 portfolio-item ">
                <img src="../pic/<?=$objResuut1["img_picname"];?>"class="img-responsive img-thumbnail"alt="" > 
                <h4 class="text-center "><?=$objResuut1["img_name"];?></h4>
                <a href="update_menu_order.php?id=<?=$objResuut1["img_id"];?>"><button type="button" class="btn btn-warning btn-block">แก้ไข</button></a>
                <a href="delete_menu_order.php?id=<?=$objResuut1["img_id"];?>"><button type="button" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')" class="btn btn-danger btn-block" >ลบ</button></a>
            </div>							
			<?
			}
			?>
        </div>
        <!-- /.row -->
</div>
    
    
    <div class="clearfix visible-lg"></div>
  </div> 

<?php /****************END container********************/?>



<?php include '../include/footer.php';?>
