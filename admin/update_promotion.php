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
                <h1 class="page-header">รายการแก้ไขโปรโมชั่น
                    <small>Secondary Text</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
<?
	$idEdit = $_REQUEST['id'];
	
	mysql_query('SET CHARACTER SET utf8');
	$sql = "SELECT * FROM promotion WHERE  id = '$idEdit'";
	$res = mysql_query($sql);

if($darr = mysql_fetch_array($res))
{
?>
		<div class="col-md-8 col-md-offset-1">
<h2>แก้ไขโปรโมชั่น</h2>
  
  <form name="form1" method="post" action="check_update_promotion.php" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
      <label class="control-label col-sm-3" for="picname">ชื่อโปรโมชั่น:</label>
      <div class="col-sm-9">
        <input type="text" name="pro_name" class="form-control" id="pro_name" value="<?=$darr["pro_name"];?>">
      </div>
    </div>
    	<div class="form-group">
      <label class="control-label col-sm-3" for="name">รูปภาพเดิม:</label>
      <div class="col-sm-9">
        <img src="../picPromotion/<?=$darr["pro_img"];?>"class="img-responsive img-thumbnail"alt="" > 
      </div>
    </div>
  	<div class="form-group">
      <label class="control-label col-sm-3" for="name">เลือกรูปภาพ:</label>
      <div class="col-sm-9">
        <input type="file" class="form-control" id="filUpload" name="filUpload" value="<?=$darr["pro_img"];?>"><br>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="pro_detail1">รายละเอียด :</label>
      <div class="col-sm-9">
        
        <textarea class="form-control" rows="8"  name="pro_detail1" id="pro_detail1" ><?=$darr["pro_detail1"];?></textarea>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      	<input type="hidden" name="OldFile" value="<?=$darr["pro_img"];?>">
      	<input type="hidden" value="<?=$darr["id"]?>" name="id_update">
        <button type="submit" onclick="return confirm('คุณต้องการแก้ไขข้อมูล') " class="btn btn-primary btn-lg btn-block">บันทึก</button>
        <a href="ad_promotion.php"><button type="button" onclick="return confirm('คุณต้องการยกเลิกแก้ไขข้อมูล') "class="btn btn-warning btn-block">ยกเลิก</button></a>
      </div>
    </div>
  </form>
  </div>
</div>
 <hr>							
			<?
			}
			?>
        </div>
        <!-- /.row -->
</div>
    
    
    <div class="clearfix visible-lg"></div>

<?php /****************END container********************/?>



<?php include '../include/footer.php';?>
