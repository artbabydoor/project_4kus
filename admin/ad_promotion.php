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

<h2>เพิ่มโปรโมชั่น</h2>
  
  <form name="form1" method="post" action="check_ad_promotion.php" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
      <label class="control-label col-sm-3" for="picname">ชื่อโปรโมชั่น:</label>
      <div class="col-sm-5">
        <input type="text" name="pro_name" class="form-control" id="pro_name" placeholder="Enter ชื่อโปรโมชั่น">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="pro_detail1">รายละเอียด :</label>
      <div class="col-sm-5"> 
        <textarea class="form-control" rows="4" style="width: 100%;" name="pro_detail1" id="pro_detail1" placeholder="Enter รายละเอียด "></textarea>
      </div>
    </div>
  	<div class="form-group">
      <label class="control-label col-sm-3" for="name">เลือกรูปภาพ:</label>
      <div class="col-sm-5">
        <input type="file" class="form-control" id="filUpload" name="filUpload" value=""placeholder="เลือกรูปภาพ" ><br>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-3 col-sm-5">
        <button type="submit" onclick="return confirm('คุณต้องการเพิ่มข้อมูล') "class="btn btn-primary btn-lg btn-block">เพิ่มโปรโมชั่น</button>
      </div>
    </div>
  </form>
  <?
          	mysql_query('SET CHARACTER SET utf8');
			$strSQL1 = "SELECT * FROM promotion ORDER BY id ASC";
			$objQuery1 = mysql_query($strSQL1);
			
			while($objResuut1 = mysql_fetch_array($objQuery1))
			{
			?>
		<!-- Projects Row -->
        
            <div class="col-md-6 portfolio-item ">
                <img src="../picPromotion/<?=$objResuut1["pro_img"];?>"class="img-responsive img-thumbnail"alt="" > 
                <h4 class="text-center "><?=$objResuut1["pro_name"];?></h4>
                <p><?=nl2br($objResuut1["pro_detail1"]);?></p>
                <a href="update_promotion.php?id=<?=$objResuut1["id"];?>"><button type="button" class="btn btn-warning btn-block">แก้ไข</button></a>
                <a href="delete_promotion.php?id=<?=$objResuut1["id"];?>"><button type="button" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')"class="btn btn-danger btn-block" >ลบ</button></a>
            </div>							
			<?
			}
			?>
  
</div>
 <hr>
    </div>
    
    
    <div class="clearfix visible-lg"></div>
  </div>
<?php /****************END container********************/?>



<?php include '../include/footer.php';?>

