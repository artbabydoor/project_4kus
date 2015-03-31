<?php
session_start();
require 'connect.php';

$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
$_SESSION['formid'] = sha1('itoffside.com' . microtime());
if (isset($_SESSION['qty'])) {
	$meQty = 0;
	foreach ($_SESSION['qty'] as $meItem) {
		$meQty = $meQty + $meItem;
	}
} else {
	$meQty = 0;
}
if (isset($_SESSION['cart']) and $itemCount > 0) {
	$itemIds = "";
	foreach ($_SESSION['cart'] as $itemId) {
		$itemIds = $itemIds . $itemId . ",";
	}
	$inputItems = rtrim($itemIds, ",");
	$meSql = "SELECT * FROM products WHERE id in ({$inputItems})";/****    *****/
	$meQuery = mysql_query($meSql);
	$meCount = mysql_num_rows($meQuery);
} else {
	$meCount = 0;
}
include '../include/header.php';
include 'header-img.php';
include 'menu-admin.php';
?>
<hr>
 <div class="row">
 <div id="non-printable"><?php include 'menu_bar.php';?></div>
    <div class="col-md-9">

            <!-- Static navbar -->
            <div class="navbar navbar-default" role="navigation" id="non-printable">
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
                            <li><a href="buy_item.php">หน้าแสดงวัตถุดิบ</a></li>
                            <li><a href="cart_item.php">ตรวจสั่งซื้อวัตถุดิบ<span class="badge"><?php echo $meQty; ?></span></a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </div>
			<h3>กรอกรายละเอียดผู้สั่งซื้อ</h3>
            <!-- Main component for a primary marketing message or call to action -->
            <?php
            if ($action == 'removed')
            {
                echo "<div class=\"alert alert-warning\">ลบสินค้าเรียบร้อยแล้ว</div>";
            }

            if ($meCount == 0)
            {
                echo "<div class=\"alert alert-warning\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
            } else
            {
                ?>
		<Hr/>
                <form action="check_confirm.php" method="post" name="formupdate" role="form" id="formupdate" onsubmit="JavaScript:return updateSubmit();">
                    <div class ="row">
						<div class=" col-md-3 col-md-offset-5">
							<h1>ใบสั่งซื้อ</h1>
						</div>
					</div>
					<div class ="row">
						<div class=" col-md-3 ">
							<h4>ชื่อ-นามสกุล :
								<input type="text" class="form-control" id="order_fullname" placeholder="ใส่ชื่อ - นามสกุล" style="width: 300px;" name="order_fullname">
							</h4>
						</div>
						<div class=" col-md-4 col-md-offset-5">
							<h4>ใบสั่งซื้อเลขที่ : 
								<?
          						mysql_query('SET CHARACTER SET utf8');
          						$sqlor = "SELECT * FROM buy_item ORDER BY buy_order DESC limit 1";
          									
								$objdorder = mysql_query($sqlor);
			
								while($obj_or = mysql_fetch_array($objdorder))
								{
									echo $obj_or['buy_order']+1;
								}
							?>
							</h4>
						</div>
						
					</div>
					<div class ="row">
						<div class=" col-md-3 ">
							<h4>ชื่อรายการ : 
								<input type="text" class="form-control" id="order_namelist" placeholder="ex.ครัว" style="width: 300px;" name="order_namelist">
							</h4>
						</div>
						<div class=" col-md-4 col-md-offset-5">
							<h4>วันที่ :<?php 
						function DateThai($strDate)
						{
							$strYear = date("Y",strtotime($strDate))+543;
							$strMonth= date("n",strtotime($strDate));
							$strDay= date("j",strtotime($strDate));
							$strHour= date("H",strtotime($strDate));
							$strMinute= date("i",strtotime($strDate));
							$strSeconds= date("s",strtotime($strDate));
							$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
							$strMonthThai=$strMonthCut[$strMonth];
							return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
						}
							$strDate = "2008-08-14 13:42:44";
							echo DateThai($strDate);
							?></h4>
						</div>
					</div>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ประเภทสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>จำนวน</th>
                                <th>ราคา/กิโลกรัม</th>
                                <th>จำนวนเงิน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_price = 0;
                            $num = 0;
                            while ($meResult = mysql_fetch_assoc($meQuery))
                            {
                                $key = array_search($meResult['id'], $_SESSION['cart']);
                                $total_price = $total_price + ($meResult['product_price'] * $_SESSION['qty'][$key]);
                                ?>
                                <tr>
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
                                   
                                    <td>
                                    	<?php echo $_SESSION['qty'][$key]; ?>
                                    	<input type="hidden" name="qty[]" value="<?php echo $_SESSION['qty'][$key]; ?>" />
                                    	<input type="hidden" name="product_id[]" value="<?php echo $meResult['id']; ?>" />
                                    	<input type="hidden" name="product_type[]" value="<?php echo $meResult['product_type']; ?>" />
                                    	<input  type="hidden" name="product_price[]" value="<?php echo $meResult['product_price']; ?>" />
                                    </td>
                                    <td><?php echo number_format($meResult['product_price'], 2); ?></td>
                                    <td><?php echo number_format(($meResult['product_price'] * $_SESSION['qty'][$key]), 2); ?></td>
                                </tr>
                                <?php
								$num++;
								}
                            ?>
                            <tr>
                                <td colspan="8" style="text-align: right;">
                                    <h4>จำนวนเงินรวมทั้งหมด <?php echo number_format($total_price, 2); ?> บาท</h4>
                                </td>
                            </tr>
                            <tr id="non-printable">
                                <td colspan="8" style="text-align: right;">
                                	<button type="button" onclick="window.print()"class="btn btn-primary btn-lg glyphicon glyphicon-print"> พิมพ์รายงาน</button>
                                	<input type="hidden" name="formid" value="<?php echo $_SESSION['formid']; ?>"/>
                                	<a href="cart_item.php" type="button" class="btn btn-danger btn-lg">ย้อนกลับ</a>
                                    <button type="submit" onclick="return confirm('คุณตรวจสอบดีแล้วนะค่ะ ?')"class="btn btn-primary btn-lg">บันทึกการสั่งซื้อวัตถุดิบ</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <?php }?>
      </div>
    
    
    <div class="clearfix visible-lg"></div>
  </div> 
      
<?php include '../include/footer.php';
mysql_close();
