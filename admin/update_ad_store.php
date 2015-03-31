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
	$sql = "SELECT * FROM products WHERE  id = '$idEdit'";
	$res = mysql_query($sql);

if($darr = mysql_fetch_array($res))
{
?>
		<div class="col-md-6 col-md-offset-3">
<h2>แก้ไขเมนูอาหาร</h2>
  
  <form name="form1" method="post" action="check_update_ad_store.php" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
      <label class="control-label col-sm-3" for="picname">ชื่อเดิม:</label>
      <div class="col-sm-9">
          <?
          	mysql_query('SET CHARACTER SET utf8');
          	$strSQL = "SELECT * FROM name_product WHERE id_p = '$darr[product_name]'";		
			$objQuery = mysql_query($strSQL);
			
			while($objResuut = mysql_fetch_array($objQuery))
			{
			?>
			<input class="form-control"  id="disabledInput" type="text" value="<?=$objResuut["name_p"];?>" disabled>			
			<?
			}
			?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="picname">ชื่อใหม่:(เลือกใหม่)</label>
      <div class="col-sm-9">
      <select name="product_name" id="product_name" class="form-control" >
          <option value="">- เลือกชื่อวัตถุดิบ - </option>
          <?
          	mysql_query('SET CHARACTER SET utf8');
          	$strSQL = "SELECT * FROM name_product ORDER BY id_p ASC";
			
			$objQuery = mysql_query($strSQL);
			
			while($objResuut = mysql_fetch_array($objQuery))
			{
			?>
			<option value="<?=$objResuut["id_p"];?>"><?=$objResuut["name_p"];?></option>
						
			<?
			}
			?>
          </select>    
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="picname">ประเภทเดิม:</label>
      <div class="col-sm-9">
          <?
          	mysql_query('SET CHARACTER SET utf8');
          	$strSQL = "SELECT * FROM type WHERE type_id = '$darr[product_type]'";		
			$objQuery = mysql_query($strSQL);
			
			while($objResuut = mysql_fetch_array($objQuery))
			{
			?>
			<input class="form-control"  id="disabledInput" type="text" value="<?=$objResuut["type_name"];?>" disabled>
			<?
			}
			?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="type_id">ประเภทใหม่:(เลือกใหม่)</label>
      <div class="col-sm-9">
      <select name="product_type" id="product_type" class="form-control" >
          <option value="">- เลือกประเภทวัตถุดิบ - </option>
          <?
          	mysql_query('SET CHARACTER SET utf8');
          	$strSQL1 = "SELECT * FROM type ORDER BY type_id ASC";
			
			$objQuery1 = mysql_query($strSQL1);
			
			while($objResuut1 = mysql_fetch_array($objQuery1))
			{
			?>
			<option value="<?=$objResuut1["type_id"];?>"><?=$objResuut1["type_name"];?></option>
						
			<?
			}
			?>
          </select>    
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="picname">ราคา:</label>
      <div class="col-sm-9">
        <input type="text" name="product_price" class="form-control" id="product_price" value="<?= $darr["product_price"]; ?>">
      </div>
    </div>
    	<div class="form-group">
      <label class="control-label col-sm-3" for="product_img_name">รูปภาพเดิม:</label>
      <div class="col-sm-9">
        <img src="images/<?=$darr["product_img_name"];?>"class="img-responsive img-thumbnail"alt="" > 
      </div>
    </div>
  	<div class="form-group">
      <label class="control-label col-sm-3" for="name">เลือกรูปภาพ:</label>
      <div class="col-sm-9">
        <input type="file" class="form-control" id="filUpload" name="filUpload" value="<?=$darr["product_img_name"];?>"><br>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      	<input type="hidden" name="OldFile" value="<?=$darr["product_img_name"];?>">
      	<input type="hidden" value="<?=$darr["id"]?>" name="id">
        <button type="submit" onclick="return confirm('คุณต้องการแก้ไขข้อมูล') "class="btn btn-primary btn-lg btn-block">update</button>
        <a href="ad_store.php"><button type="button" onclick="return confirm('คุณต้องการยกเลิกแก้ไขข้อมูล') "class="btn btn-warning btn-block">ยกเลิก</button></a>
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
