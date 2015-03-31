<?php include '../include/header.php';?>
 
<?php include 'header-img.php';?>

<?php include 'menu-admin.php';?>

<?php /****************END menu-main********************/?>
<?php //include 'slide-img.php';?>
<?php include '../connect/db.php'; /*ดึงไฟล์ db.php ที่อยู่ใน folder connect เข้ามาเพื่อใช้ในการติดต่อ database*/			
	connect_db();
?>
<hr>

 <div class="row">
<div id="non-printable"> <?php include 'menu_bar.php';?></div>
    <div class="col-md-9">   
      <div id="non-printable"><h2>ระบบค้นหาใบเบิกวัตถุดิบ</h2> </div>
<!-- *************************************************** -->
<div id="non-printable">
	<div class=" col-md-offset-2">
		<form method="post" action="" class=" form-inline" enctype="multipart/form-data">
		<div class="form-group ">
    		<label for="exampleInputName2">ใบเบิก</label>   		
  			<input type="text" name="sale" class="form-control " id="sale" placeholder="xx">
  			<input type="hidden" value="1" name="id">
  			<button type="Submit" class="btn btn-info btn-lg glyphicon glyphicon-search" name="Submit" value="search"></button>
  		</div>		
		</form>
	</div>
<!-- *************************************************** -->
	<div class=" col-md-offset-2">
	<form method="post" action="" class=" form-inline" enctype="multipart/form-data">
	<div class="form-group ">
    	<label for="exampleInputName2">วันเริ่มต้น</label>  	
    	<input type="text" name="dateInput" class="form-control " id="dateInput" placeholder="วัน-เดือน-ปี">
 	</div>
  	<div class="form-group">
    	<label for="exampleInputName2">ถึง</label>
    	<input type="text" name="dateInput2" class="form-control " id="dateInput2" placeholder="วัน-เดือน-ปี">
  	</div>
  		<input type="hidden" value="2" name="id">
		<button type="submit" name="Submit"  class="btn btn-info btn-lg glyphicon glyphicon-search" value="search"></button>
	</form>
</div>
</div>
<hr>
<!-- *************************************************** -->
<!-- รับค่า -->
<?
if ($Submit=="search")
{
	$id = $_POST['id'];
	if($id =="1")
	{
		include 'search_sale_sale.php';	
	}
	elseif ($id == "2")
	{
		include 'search_by_date.php';
	}
	else {echo "FFFF";}
	
}
?>

<!-- *************************************************** -->
 <hr>
 </div>
     <div class="clearfix visible-lg"></div>
  </div>
<?php include '../include/footer.php';?>