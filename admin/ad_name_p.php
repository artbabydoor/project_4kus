<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-admin.php';?>

<?php /****************END menu-main********************/?>
<?php //include 'slide-img.php';?>

 <hr>
 <div class="row">
 <?php include 'menu_bar.php';?>
    <div class="col-md-9">
      <div class="row">
<div class="col-md-6 col-md-offset-3">
<h2>เพิ่มชื่อวัตถุดิบ</h2>
  <form action="check_ad_name_p.php" method="post" class="form-horizontal" role="form">
  	<div class="form-group">
      <label class="control-label col-sm-3" for="type_s">ชื่อวัตถุดิบ:</label>
      <div class="col-sm-9">
        <input type="text" name="name_p" class="form-control" id="name_p" placeholder="Enter name">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-9">
        <button type="submit" onclick="return confirm('คุณต้องการเพิ่มข้อมูล') "class="btn btn-primary btn-lg btn-block">เพิ่มชื่อของวัตถุดิบ</button>
      </div>
    </div>
  </form>
  
  </div>
  
    <table class="table">
    <thead>
      <tr>
        <th class="text-center ">ลำดับ</th>
        <th class="text-center ">ชื่อวัตถุดิบ</th>
        <th class="text-center ">แก้ไข</th>
        <th class="text-center ">ลบ</th>
      </tr>
    </thead>
    
    <tbody>
<?php include '../connect/db.php'; /*ดึงไฟล์ db.php ที่อยู่ใน folder connect เข้ามาเพื่อใช้ในการติดต่อ database*/			
connect_db();
?>
<?
          	mysql_query('SET CHARACTER SET utf8');
			$strSQL1 = "SELECT * FROM name_product ORDER BY id_p ASC";
			$objQuery1 = mysql_query($strSQL1);
			$i=1;
			while($objResuut1 = mysql_fetch_array($objQuery1))
			{
			?>
      <tr class="success">
        <td class="text-center "><?=$i;?></td>
        <td ><?=$objResuut1["name_p"];?></td>
        <td class="text-center "><a href="update_name.php?id=<?=$objResuut1["id_p"];?>"><button type="button" class="btn btn-warning btn-block">แก้ไข</button></a></td>
        <td class="text-center "><a href="delete_name.php?id=<?=$objResuut1["id_p"];?>"><button type="button" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')"class="btn btn-danger btn-block">ลบ</button></a></td>
        
      </tr>
      <?
			$i=$i+1;}
			?>
    </tbody>
  </table>
</div>
    </div>
    
    
    <div class="clearfix visible-lg"></div>
  </div>
<?php /****************END container********************/?>



<?php include '../include/footer.php';?>
