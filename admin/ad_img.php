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
<div class="col-md-6 col-md-offset-3">
<h2>เพิ่มเมนูอาหาร</h2>
  
  <form name="form1" method="post" action="check_ad_img.php" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
      <label class="control-label col-sm-3" for="picname">ชื่อเมนู:</label>
      <div class="col-sm-9">
      <select name="picname" id="picname" class="form-control" >
          <option value="">- เลือกชื่อวัตถุดิบ - </option>
          <?
          	mysql_query('SET CHARACTER SET utf8');
          	$strSQL = "SELECT * FROM name_product ORDER BY id_p ASC";
			
			$objQuery = mysql_query($strSQL);
			
			while($objResuut = mysql_fetch_array($objQuery))
			{
			?>
			<option value="<?=$objResuut["name_p"];?>"><?=$objResuut["name_p"];?></option>
						
			<?
			}
			?>
          </select>    
      </div>
    </div>
<div class="form-group">
      <label class="control-label col-sm-3" for="type_id">ประเภท:</label>
      <div class="col-sm-9">
      <select name="type_id" id="type_id" class="form-control" >
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
      <label class="control-label col-sm-3" for="name">เลือกรูปภาพ:</label>
      <div class="col-sm-9">
        <input type="file" class="form-control" id="filUpload" name="filUpload" value=""placeholder="เลือกรูปภาพ" ><br>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" onclick="return confirm('คุณต้องการเพิ่มข้อมูล')"class="btn btn-primary btn-lg btn-block">เพิ่มเมนูอาหาร</button>
      </div>
    </div>
  </form>
  </div>
</div>
 <hr>
    </div>
    
    
    <div class="clearfix visible-lg"></div>
  </div>
<?php /****************END container********************/?>



<?php include '../include/footer.php';?>

