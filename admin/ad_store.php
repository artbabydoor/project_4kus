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
<h2>เพิ่มรายการวัตถุดิบ</h2>
  
  <form name="form1" method="post" action="check_ad_store.php" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
      <label class="control-label col-sm-3" for="picname">ชื่อวัตถุดิบ:</label>
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
      <label class="control-label col-sm-3" for="type_id">ประเภท:</label>
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
      <label class="control-label col-sm-3" for="name">เลือกรูปภาพ:</label>
      <div class="col-sm-9">
        <input type="file" class="form-control" id="filUpload" name="filUpload" value=""placeholder="เลือกรูปภาพ" ><br>
      </div>
    </div>
    <!--  <div class="form-group">
      <label class="control-label col-sm-3" for="type_s">รายละอียด:</label>
      <div class="col-sm-9">
        <textarea class="form-control" rows="4" style="width: 100%;" name="product_detail" id="product_detail" placeholder="Enter รายละเอียด "></textarea>
      </div>
    </div> -->
    <div class="form-group">
      <label class="control-label col-sm-3" for="type_s">ราคา:</label>
      <div class="col-sm-9">
        <input type="text" name="product_price" class="form-control" id="product_price" placeholder="Enter ราคา">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      	<input type="hidden" name="product_qty" value="0" />
        <button type="submit" onclick="return confirm('คุณต้องการเพิ่มข้อมูล')"class="btn btn-primary btn-lg btn-block">เพิ่มรายการวัตถุดิบ</button>
      </div>
    </div>
  </form>
  </div>
</div>
 <hr>
<?php 
$meSql = "SELECT * FROM products ";
$meQuery = mysql_query($meSql);
?>
<h3>สินค้าทั้งหมด</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ประเภทสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคา/ชื้น</th>
                        <th>ราคารวม</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($meResult = mysql_fetch_assoc($meQuery))
                    {
                        ?>
                        <tr>
                            <td><img src="images/<?php echo $meResult['product_img_name']; ?>" border="0"></td>
                            <?
          						mysql_query('SET CHARACTER SET utf8');
          						$strSQL = "SELECT * FROM type WHERE  type_id = '$meResult[product_type]'";
			
								$objQuery = mysql_query($strSQL);
			
								while($objResuut = mysql_fetch_array($objQuery))
								{
							?>
								<td><?php echo $objResuut['type_name']; ?></td>
						
							<?
								}
							?>
							<?
          						mysql_query('SET CHARACTER SET utf8');
          						$strSQL1 = "SELECT * FROM name_product WHERE  id_p = '$meResult[product_name]'";
			
								$objQuery1 = mysql_query($strSQL1);
			
								while($objResuut1 = mysql_fetch_array($objQuery1))
								{
							?>
								<td><?php echo $objResuut1['name_p']; ?></td>
						
							<?
								}
							?>
                            
                            <td><?php echo $meResult['product_qty']; ?></td>
                            <td><?php echo number_format($meResult['product_price'],2); ?></td>
                            <td><?php echo number_format($meResult['product_price']*$meResult['product_qty'],2); ?></td>
                        	<td><small><a href="update_ad_store.php?id=<?=$meResult["id"];?>"><button type="button" class="btn btn-warning btn-block glyphicon glyphicon-wrench"> แก้ไข</button></a></small></td>
                			<td><small><a href="delete_ad_store.php?id=<?=$meResult["id"];?>"><button type="button" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')" class="btn btn-danger btn-block glyphicon glyphicon-trash" >  ลบ</button></a></small></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
</div>
    
    
    <div class="clearfix visible-lg"></div>
  </div>
<?php /****************END container********************/?>



<?php include '../include/footer.php';?>

