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
<h2>แก้ไขประเภทของวัตถุดิบ</h2>
<?
	$idEdit = $_REQUEST['id'];
	
	mysql_query('SET CHARACTER SET utf8');
	$sql = "SELECT * FROM type WHERE  type_id = '$idEdit'";
	$res = mysql_query($sql);

if($darr = mysql_fetch_array($res))
{
?>
  <form action="check_update_type.php" method="post" class="form-horizontal" role="form">
  	<div class="form-group">
      <label class="control-label col-sm-3" for="type_s">ชื่อประเภท:</label>
      <div class="col-sm-9">
        <input type="text" name="type_s" class="form-control" id="type_s" value="<?=$darr["type_name"];?>">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-9">
      	<input type="hidden" value="<?=$darr["type_id"]?>" name="id_update">
        <button type="submit" onclick="return confirm('คุณต้องการแก้ไขข้อมูล') "class="btn btn-primary btn-lg btn-block">แก้ไขประเภทของวัตถุดิบ</button>
      </div>
    </div>
  </form>
 <?
		}
			?> 
  <table class="table">
    <thead>
      <tr>
        <th class="text-center ">ลำดับ</th>
        <th class="text-center ">ชื่อประเภท</th>
        <th class="text-center ">แก้ไข</th>
        <th class="text-center ">ลบ</th>
      </tr>
    </thead>
    
    <tbody>

<?
          	mysql_query('SET CHARACTER SET utf8');
			$strSQL1 = "SELECT * FROM type ORDER BY type_id ASC";
			$objQuery1 = mysql_query($strSQL1);
			$i=1;
			while($objResuut1 = mysql_fetch_array($objQuery1))
			{
			?>
      <tr class="success">
        <td class="text-center "><?=$i;?></td>
        <td ><?=$objResuut1["type_name"];?></td>
        <td class="text-center "><a href="update_type.php?id=<?=$objResuut1["type_id"];?>"><button type="button" class="btn btn-warning btn-block">แก้ไข</button></a></td>
        <td class="text-center "><a href="delete_type.php?id=<?=$objResuut1["type_id"];?>"><button type="button" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')"class="btn btn-danger btn-block">ลบ</button></a></td>
        
      </tr>
      <?
			$i=$i+1;}
			?>
    </tbody>
  </table>
  
  </div>
</div>
    </div>
    
    
    <div class="clearfix visible-lg"></div>
  </div>
<?php /****************END container********************/?>



<?php include '../include/footer.php';?>
