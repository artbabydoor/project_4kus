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
      <h2>ค้นหา</h2> 
<!-- *************************************************** -->
<div id="non-printable">
<div class=" col-md-offset-2">
<form method="post" action="" class=" form-inline" enctype="multipart/form-data">

	<div class="form-group">
    <label for="exampleInputName2">ราคาเริ่มต้น</label>
    <input type="text" name="price" class="form-control " id="price" placeholder="Enter price">
  </div>
  <div class="form-group">
    <label for="exampleInputName2">ถึง</label>
    <input type="text" name="price1" class="form-control " id="price1" placeholder="Enter price">
  </div>
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
	$price = $_POST['price'] ; 
	$price1 = $_POST['price1'] ;
	?>
	<h3>ผลการค้นหา <small>ข้อมูลระหว่าง วันที่  <? echo $price." ถึง  ".$price1?></small></h3>
		<?php 	//$meSql = "SELECT * FROM buy_item WHERE  buy_date = '$date' ";
				//$meSql = "SELECT * FROM buy_item WHERE buy_date between '$date' and '$date2' ";
				$meSql = "SELECT * FROM buy_item WHERE buy_price BETWEEN '$price' AND '$price1'";
				$meQuery = mysql_query($meSql);

		?>
		<table class="table table-striped">
		                <thead>
		                    <tr>
		                        <th>ใบสั่งซื้อที่</th>
		                        <th>รูป</th>
		                        <th>ประเภท</th>
		                        <th>ชื่อสินค้า</th>
		                        
		                        <th>ชื้น</th>
		                        <th>ราคา/ชิ้น</th>
		                        <th>ราคารวม</th>
		                        <th>ผู้ซื้อ</th>
		                        <th>&nbsp;</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <?php
		                    while ($meResult = mysql_fetch_assoc($meQuery))
		                    {
		                        ?>
		                        <tr>
		                        	<td><?php echo $meResult['buy_order']; ?></td>
		                        	<?
		          						mysql_query('SET CHARACTER SET utf8');
		          						$sql = "SELECT * FROM products WHERE  id = '$meResult[buy_product_id]'";
										$darr = mysql_query($sql);
					
										while($obj = mysql_fetch_array($darr))
										{
									?>
										<td><img src="images/<?  echo $obj['product_img_name']; ?>" border="0"></td>	
									<?
										}
									?>
		                        	<?
		          						mysql_query('SET CHARACTER SET utf8');
		          						$strSQL = "SELECT * FROM type WHERE  type_id = '$meResult[buy_type]'";
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
		          						$strSQL2 = "SELECT * FROM products WHERE  id = '$meResult[buy_product_id]'";
										$objQuery2 = mysql_query($strSQL2);
					
										while($objResuut2 = mysql_fetch_array($objQuery2))
										{
									?>
										<!--  <td><img src="images/<? // echo $objResuut2['product_img_name']; ?>" border="0"></td>-->
										<!--  <td><? // echo $objResuut2['product_name']; ?></td> -->
												<?
		          								mysql_query('SET CHARACTER SET utf8');
		          								$strSQL3 = "SELECT * FROM name_product WHERE  id_p = '$objResuut2[product_name]'";
												$objQuery3 = mysql_query($strSQL3);
					
												while($objResuut3 = mysql_fetch_array($objQuery3))
												{
												?>
		                        					<td><?php echo $objResuut3['name_p']; ?></td> 
		                        				<?
												}
		                        				?>
		                            	
									<?
										}
									?>
									<td><?php echo $meResult['buy_qty']; ?></td>
									<td><?php echo number_format($meResult['buy_price'],2); ?></td>
									<td><?php echo number_format($meResult['buy_price']*$meResult['buy_qty'],2); ?></td>
												<?
		          								mysql_query('SET CHARACTER SET utf8');
		          								$strSQL4 = "SELECT * FROM buy_detail WHERE  BT_id = '$meResult[buy_order]'";
												$objQuery4 = mysql_query($strSQL4);
					
												while($objResuut4 = mysql_fetch_array($objQuery4))
												{
												?>
		                        					<td><?php echo "คุณ  ".$objResuut4['BT_name']; ?></td> 
		                        				<?
												}
		                        				?>
		                        </tr>
		                        <?php
		                    }
		                    ?>		                    
		                    <tr>
		                    	<td>&nbsp;</td>
		                    </tr>
		                    
		                </tbody>
		            </table>
		         	<div id="non-printable"><button type="submit" onclick="window.print()"class="btn btn-success btn-lg btn-block glyphicon glyphicon-print"> พิมพ์รายงาน</button></div>
		           
<?php 
}
?>

<!-- *************************************************** -->
 <hr>
 </div>
     <div class="clearfix visible-lg"></div>
  </div>
<?php include '../include/footer.php';?>