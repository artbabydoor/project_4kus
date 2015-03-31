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

            <!-- Static navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li ><a href="buy_item.php">หน้าแสดงวัตถุดิบ</a></li>
                            <li><a href="cart_item.php">ตรวจสั้งซื้อวัตถุดิบ<span class="badge"><?php echo $meQty; ?></span></a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </div>

            <!-- Main component for a primary marketing message or call to action -->
            
            <h3>รายการวัตถุดิบ</h3>
<?php
if($action == 'exists'){
    echo "<div class=\"alert alert-warning\">เพิ่มจำนวนสินค้าแล้ว</div>";
}
if($action == 'add'){
    echo "<div class=\"alert alert-success\">เพิ่มสินค้าลงในตะกร้าเรียบร้อยแล้ว</div>";
}
if($action == 'order'){
	echo "<div class=\"alert alert-success\">สั่งซื้อสินค้าเรียบร้อยแล้ว</div>";
}
if($action == 'orderfail'){
	echo "<div class=\"alert alert-warning\">สั่งซื้อสินค้าไม่สำเร็จ มีข้อผิดพลาดเกิดขึ้นกรุณาลองใหม่อีกครั้ง</div>";
}
?>
        <?php 
        
        $sql = mysql_query("SELECT * FROM type");
        
        $records = mysql_num_rows($sql);
        
         $i=1;
         for ($i;$i<=$records;$i++)
         {
         	
         	$count_id = $i;
         	//**********************************
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
         	$meSql = "SELECT * FROM products WHERE  product_type = '$count_id' ";
         	$meQuery = mysql_query($meSql);
         	?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>รูปภาพ</th>
                        <th>ประเภทสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>จำนวน/กิโลกรัม</th>
                        <th>ราคา/กิโลกรัม</th>
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
                            <td>
                                <a class="btn btn-primary btn-lg" href="check_buy_item.php?itemId=<?php echo $meResult['id']; ?>" role="button">
                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                    </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
	<?  //*************************************
         }
        ?>

        </div> 

    
    
    <div class="clearfix visible-lg"></div>
  </div> 
       
<?php include '../include/footer.php';
mysql_close();