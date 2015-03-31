<?php
session_start();
require 'connect.php';

$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if(isset($_SESSION['qty'])){
    $meQty = 0;
    foreach($_SESSION['qty'] as $meItem){
        $meQty = $meQty + $meItem;
    }
}else{
    $meQty=0;
}
include '../include/header.php';
include 'header-img.php';
include 'menu-admin.php';
?>
 <hr>
 <div class="row">
 <?php include 'menu_bar.php';?>
    <div class="col-md-9">
    <h3>สินค้าทั้งหมด<small> <a href="ad_store.php"><button type="button" class="btn btn-success">เพิ่มรายการ</button></a></small>
</h3> 
<?php 	$sql = mysql_query("SELECT * FROM type");
        $records = mysql_num_rows($sql);
         
         $i=1;
         for ($i;$i<=$records;$i++)
         {
         	
         	$count_id = $i;
		

?>           
<?php 	$meSql = "SELECT * FROM products WHERE  product_type = '$count_id' ";
		$meQuery = mysql_query($meSql);
?>
			<?
         	$typeid = $_REQUEST['id'];
         	mysql_query('SET CHARACTER SET utf8');
         	$strSQL = "SELECT * FROM type WHERE  type_id = '$count_id'";
         		
         	$objQuery = mysql_query($strSQL);
         		
         	while($objResuut = mysql_fetch_array($objQuery))
         	{
         	?>
         		<h3><small>ประเภท : <?=$objResuut["type_name"];?></small></h3>
         	<?
         	}
         	?>
<table class="table table-striped">
                <thead>
                    <tr>
                        <th>รูปภาพ</th>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>จำนวน/กิโลกรัม</th>
                        <th>ราคา/กิโลกรัม</th>
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
                            
                            <td class="text-center"><?php echo $meResult['product_qty']; ?></td>
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

		<?php }?>
        </div> 

    
    
    <div class="clearfix visible-lg"></div>
  </div> 
       
<?php include '../include/footer.php';
mysql_close();