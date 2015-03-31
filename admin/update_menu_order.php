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
                <h1 class="page-header">รายการเมนูอาหาร
                    <small>Secondary Text</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
<?
	$idEdit = $_REQUEST['id'];
	
	mysql_query('SET CHARACTER SET utf8');
	$sql = "SELECT * FROM pic_stock WHERE  img_id = '$idEdit'";
	$res = mysql_query($sql);

if($darr = mysql_fetch_array($res))
{
?>
		<div class="col-md-6 col-md-offset-3">
<h2>แก้ไขเมนูอาหาร</h2>
  
  <form name="form1" method="post" action="check_update_menu_order.php" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
      <label class="control-label col-sm-3" for="picname">ชื่อรูปภาพ:</label>
      <div class="col-sm-9">
        <input type="text" name="picname" class="form-control" id="picname" value="<?=$darr["img_name"];?>">
      </div>
    </div>
    	<div class="form-group">
      <label class="control-label col-sm-3" for="name">รูปภาพเดิม:</label>
      <div class="col-sm-9">
        <img src="../pic/<?=$darr["img_picname"];?>"class="img-responsive img-thumbnail"alt="" > 
      </div>
    </div>
  	<div class="form-group">
      <label class="control-label col-sm-3" for="name">เลือกรูปภาพ:</label>
      <div class="col-sm-9">
        <input type="file" class="form-control" id="filUpload" name="filUpload" value="<?=$darr["img_picname"];?>"><br>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      	<input type="hidden" name="OldFile" value="<?=$darr["img_picname"];?>">
      	<input type="hidden" value="<?=$darr["img_id"]?>" name="id_update">
        <button type="submit" onclick="return confirm('คุณต้องการแก้ไขข้อมูล') "class="btn btn-primary btn-lg btn-block">update</button>
        <a href="menu_order.php"><button type="button" onclick="return confirm('คุณต้องการยกเลิกแก้ไขข้อมูล') "class="btn btn-warning btn-block">ยกเลิก</button></a>
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
