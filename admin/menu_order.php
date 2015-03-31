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
		<h1>รายการเมนูอาหาร<small> <a href="ad_img.php"><button type="button" class="btn btn-success">เพิ่มเมนูอาหาร</button></a></small></h1>
		<hr>
        <?php 
        
        $sql = mysql_query("SELECT * FROM type");
        
        $records = mysql_num_rows($sql);
        
         $i=1;
         for ($i;$i<=$records;$i++)
         {
         	
         	$count_id = $i;
         	//**********************************
         	?>
         	
         	<div class="row">
         	<div class="col-lg-12 ">
         	<?
         	$typeid = $_REQUEST['id'];
         	mysql_query('SET CHARACTER SET utf8');
         	$strSQL = "SELECT * FROM type WHERE  type_id = '$count_id'";
         		
         	$objQuery = mysql_query($strSQL);
         		
         	while($objResuut = mysql_fetch_array($objQuery))
         	{
         	?>
         		<h2><small>ประเภท : <?=$objResuut["type_name"];?></small></h2>
         	<?
         	}
         	?>
         	</div>
         	</div>
         	
         	<div class="row box1">
			<?
          	mysql_query('SET CHARACTER SET utf8');
			$strSQL1 = "SELECT * FROM pic_stock WHERE  type_id = '$count_id'";
			$objQuery1 = mysql_query($strSQL1);
			
			while($objResuut1 = mysql_fetch_array($objQuery1))
			{
			?>
		<!-- Projects Row -->
        
            <div class="col-md-3 portfolio-item ">
                <img src="../pic/<?=$objResuut1["img_picname"];?>"class="img-responsive img-thumbnail"alt="" > 
                <h4 class="text-center "><?=$objResuut1["img_name"];?></h4>
                <small><a href="update_menu_order.php?id=<?=$objResuut1["img_id"];?>"><button type="button" class="btn btn-warning btn-block glyphicon glyphicon-wrench"> แก้ไข</button></a></small>
                <small><a href="delete_menu_order.php?id=<?=$objResuut1["img_id"];?>"><button type="button" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')" class="btn btn-danger btn-block glyphicon glyphicon-trash" >  ลบ</button></a></small>
            </div>							
			<?
			}
			?>
        	</div>
         	        
        <?  //*************************************
         }
        ?>
        <!-- /.row -->
</div>
    
    
    <div class="clearfix visible-lg"></div>
  </div> 

<?php /****************END container********************/?>



<?php include '../include/footer.php';?>
