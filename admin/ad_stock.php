<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-admin.php';?>

<?php /****************END menu-main********************/?>
<?php include 'slide-img.php';?>
<?php include '../connect/db.php'; /*ดึงไฟล์ db.php ที่อยู่ใน folder connect เข้ามาเพื่อใช้ในการติดต่อ database*/
			
	connect_db();
?>
 <div class="row">
<div class="col-md-6 col-md-offset-3">
<h2>เพิ่มวัตถุดิบ</h2>
  <form action="check_ad_type.php" method="post" class="form-horizontal" role="form">
  	<div class="form-group">
      <label class="control-label col-sm-3" for="type_s">ประเภท:</label>
      <div class="col-sm-9">
      <select name="p_type" id="type" class="form-control" >
          <option value="">- เลือกประเภทวัตถุดิบ - </option>
          <?
          	mysql_query('SET CHARACTER SET utf8');
			$strSQL = "SELECT * FROM type ORDER BY type_id ASC";
			$objQuery = mysql_query($strSQL);
			
			while($objResuut = mysql_fetch_array($objQuery))
			{
			?>
			<option value="<?=$objResuut["type_id"];?>"><?=$objResuut["type_id"];?>-<?=$objResuut["type_name"];?></option>
						
			<?
			}
			?>
          </select>    
      </div>
      
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="type_s">รูปภาพ:</label>
      <div class="col-sm-9">
      <select name="p_type" id="type" class="form-control" >
          <option value="">- เลือกรูปภาพวัตถุดิบ - </option>
          <?
          	mysql_query('SET CHARACTER SET utf8');
			$strSQL1 = "SELECT * FROM pic_stock ORDER BY img_id ASC";
			$objQuery1 = mysql_query($strSQL1);
			
			while($objResuut1 = mysql_fetch_array($objQuery1))
			{
			?>
			<option value="<?=$objResuut1["img_id"];?>"><img src="../pic_stock/<?=$objResuut1["img_picname"];?>"width =100px; height = 100px;>-<?=$objResuut1["img_name"];?></option>
						
			<?
			}
			?>
          </select>    
      </div>
      
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="type_s">ชื่อวัตถุดิบ:</label>
      <div class="col-sm-9">
      <select name="p_type" id="type" class="form-control" >
          <option value="">- เลือกวัตถุดิบ - </option>
          <?
          	mysql_query('SET CHARACTER SET utf8');
			$strSQL2 = "SELECT * FROM name_product ORDER BY id_p ASC";
			$objQuery2 = mysql_query($strSQL2);
			
			while($objResuut2 = mysql_fetch_array($objQuery2))
			{
			?>
			<option value="<?=$objResuut2["id_p"];?>"><?=$objResuut2["id_p"];?>-<?=$objResuut2["name_p"];?></option>
						
			<?
			}
			?>
          </select>    
      </div>    
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-9">
        <button type="submit" class="btn btn-primary btn-lg btn-block">เพิ่มประเภทของวัตถุดิบ</button>
      </div>
    </div>
  </form>
  </div>
</div>

<?php /****************END container********************/?>



<?php include '../include/footer.php';?>


