<?	$date = $_POST['dateInput'] ; 
	$date2 = $_POST['dateInput2'] ;
	
	$originalDate = $date;
	$newDate = date("d-M-Y", strtotime($originalDate));
	
	$originalDate2 = $date2;
	$newDate2 = date("d-M-Y", strtotime($originalDate2));
	
	?>
	<h3>ผลการค้นหา <small>ข้อมูลระหว่าง วันที่  <? echo $newDate." ถึง  ".$newDate2?></small></h3>
		<?php 	//$meSql = "SELECT * FROM buy_item WHERE  buy_date = '$date' ";
				//$meSql = "SELECT * FROM buy_item WHERE buy_date between '$date' and '$date2' ";
				$meSql = "SELECT * FROM sale_item WHERE sale_date BETWEEN '$date' AND '$date2'";
				$meQuery = mysql_query($meSql);

		?>
		<table class="table table-striped">
		                <thead>
		                    <tr>
		                        <th>ใบเบิกที่</th>
		                        <th>รูป</th>
		                        <th>ประเภท</th>
		                        <th>ชื่อสินค้า</th>
		                        
		                        <th>ชื้น</th>
		                        <th>ราคารวม</th>
		                        <th>ผู้ซื้อ</th>
		                        <th>วันที่</th>
		                        <th>&nbsp;</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <?php
		                    while ($meResult = mysql_fetch_assoc($meQuery))
		                    {
		                        ?>
		                        <tr>
		                        	<td><?php echo $meResult['sale_order']; ?></td>
		                        	<?
		          						mysql_query('SET CHARACTER SET utf8');
		          						$sql = "SELECT * FROM products WHERE  id = '$meResult[sale_product_id]'";
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
		          						$strSQL = "SELECT * FROM type WHERE  type_id = '$meResult[sale_type]'";
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
		          						$strSQL2 = "SELECT * FROM products WHERE  id = '$meResult[sale_product_id]'";
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
									<td><?php echo $meResult['sale_qty']; 
											$sum = $meResult['buy_price']*$meResult['buy_qty'];
											$total= $total + $sum;
									?></td>
									<td><?php echo number_format($meResult['buy_price']*$meResult['sale_qty'],2); ?></td>
												<?
		          								mysql_query('SET CHARACTER SET utf8');
		          								$strSQL4 = "SELECT * FROM sale_detail WHERE  ST_id = '$meResult[sale_order]'";
												$objQuery4 = mysql_query($strSQL4);
					
												while($objResuut4 = mysql_fetch_array($objQuery4))
												{
												?>
		                        					<td><?php echo "คุณ  ".$objResuut4['ST_name']; ?></td> 
		                        				<?
												}
		                        				?>
		                        	<td><?php 
		                        			$originalDate2 = $meResult['sale_date'];
		                        			$newDate3 = date("d-M-Y", strtotime($originalDate2));
		                        	
		                        			echo $newDate3; 
		                        		?></td>
		                        </tr>
		                        <?php
		                    }
		                    ?>		                    
		                    <tr>
		                    	<td>&nbsp;</td>
		                    </tr>
		                    
		                </tbody>
		            </table>
		         	<div class=" col-md-4 col-md-offset-8">
							<h4>รวมทั้งหมด :<?php echo number_format($total,2); ?>  บาท</h4>
		                <hr/>
					</div>
				</div>
				<div class="row">
		            <div class=" col-md-4 col-md-offset-9">
		         	<div id="non-printable"><button type="submit" onclick="window.print()"class="btn btn-primary glyphicon glyphicon-print"> พิมพ์รายงาน</button></div>
		        </div>
		        </div>