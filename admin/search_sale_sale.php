<?$sale = $_POST['sale'];?>
		<?php 	
				$Sql = "SELECT DISTINCT sale_order,sale_date FROM sale_item WHERE sale_order =".$sale." ";
				$Query = mysql_query($Sql);
				
		?>
		<?php 
		         while ($me = mysql_fetch_array($Query))
		         {?>
		<div class ="row">
			<div class=" col-md-4 col-md-offset-4">
					<h1>ใบเบิกวัตถุดิบ</h1>
			</div>
		</div>
		<div class ="row">
			<div class=" col-md-3 col-md-offset-1">		
					<h4>เลขที่ใบเบิกวัตถุดิบที่ :  <?php echo $me['sale_order']; ?></h4>
			</div>
			<div class=" col-md-3 col-md-offset-5">
					<h4>วันที่ :  <?php
					$date = $me['sale_date'];
					$originalDate = $date;
					$newDate = date("d-M-Y", strtotime($originalDate));
					echo $newDate; ?></h4>
			</div>
		</div>
		<div class ="row">
			<div class=" col-md-3 col-md-offset-1">
				<?
		         mysql_query('SET CHARACTER SET utf8');
		         $strSQL4 = "SELECT * FROM sale_detail WHERE  ST_id = '$me[sale_order]'";
				 $objQuery4 = mysql_query($strSQL4);
				  while($obj = mysql_fetch_array($objQuery4))
				{?>
		          <h4>ผู้เบิก : <?php echo "คุณ  ".$obj['ST_name']; ?></h4> 
		         <?}?>				
			</div>
		</div>
		<?}?>
		<Hr/>
		<table class="table table-striped">
		                <thead>
		                    <tr>
		                        <th>รูปภาพ</th>
		                        <th>ประเภท</th>
		                        <th>ชื่อสินค้า</th>            
		                        <th>กิโลกรัม</th>
		                        <th>ราคารวม</th>
		                        <th>ผู้เบิก</th>
		                        <th>&nbsp;</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <?php 
		                    $total = 0 ;
		                    $meSql = "SELECT * FROM sale_item WHERE sale_order =".$sale."";
		                    $meQuery = mysql_query($meSql);
		                    while ($meResult = mysql_fetch_assoc($meQuery))
		                    {?>
		                        <tr>
		                        
		                        	<?
		          						mysql_query('SET CHARACTER SET utf8');
		          						$sql = "SELECT * FROM products WHERE  id = '$meResult[sale_product_id]'";
										$darr = mysql_query($sql);
					
										while($obj = mysql_fetch_array($darr))
										{?>
										<td><img src="images/<?  echo $obj['product_img_name']; ?>" border="0"></td>	
									<?}?>
		                        	<?
		          						mysql_query('SET CHARACTER SET utf8');
		          						$strSQL = "SELECT * FROM type WHERE  type_id = '$meResult[sale_type]'";
										$objQuery = mysql_query($strSQL);
					
										while($objResuut = mysql_fetch_array($objQuery))
										{?>
		                        				<td><?php echo $objResuut['type_name']; ?></td> 
		                        			<?}?>	
		                        	<?
		          						mysql_query('SET CHARACTER SET utf8');
		          						$strSQL2 = "SELECT * FROM products WHERE  id = '$meResult[sale_product_id]'";
										$objQuery2 = mysql_query($strSQL2);
					
										while($objResuut2 = mysql_fetch_array($objQuery2))
										{?>
										<!--  <td><img src="images/<? // echo $objResuut2['product_img_name']; ?>" border="0"></td>-->
										<!--  <td><? // echo $objResuut2['product_name']; ?></td> -->
												<?
		          								mysql_query('SET CHARACTER SET utf8');
		          								$strSQL3 = "SELECT * FROM name_product WHERE  id_p = '$objResuut2[product_name]'";
												$objQuery3 = mysql_query($strSQL3);
					
												while($objResuut3 = mysql_fetch_array($objQuery3))
												{?>
		                        					<td><?php echo $objResuut3['name_p']; ?></td> 
		                        				<?}?>
		                            	
									<?}?>
									<td ><?php echo $meResult['sale_qty']; ?></td>
									<td><?php 
												$sum = $meResult['sale_price']*$meResult['sale_qty'];
												$total= $total + $sum;
												echo number_format($meResult['sale_price']*$meResult['sale_qty'],2); ?></td>
												<?
		          								mysql_query('SET CHARACTER SET utf8');
		          								$strSQL4 = "SELECT * FROM sale_detail WHERE  ST_id = '$meResult[sale_order]'";
												$objQuery4 = mysql_query($strSQL4);
					
												while($objResuut4 = mysql_fetch_array($objQuery4))
												{?>
		                        					<td><?php echo "คุณ  ".$objResuut4['ST_name']; ?></td> 
		                        				<?}?>
		                        </tr>
		                        <?php  } ?>		                                   
		                </tbody>
		            </table>
		          <div class="row">
		            <div class=" col-md-4 col-md-offset-8">
							<h4>รวมทั้งหมด :<?php echo number_format($total,2); ?>  บาท</h4>
		                <hr/>
					</div>
				</div>
				<div class="row">
		            <div class=" col-md-4 col-md-offset-8">
		         	<div id="non-printable"><button type="submit" onclick="window.print()"class="btn btn-primary glyphicon glyphicon-print"> พิมพ์รายงาน</button></div>
		        </div>
		        </div>