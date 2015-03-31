<?php  /*<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">4Kus </a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="#">เมนูอาหาร</a></li>
        <li><a href="#">โปรโมชั่น</a></li> 
        <li><a href="#">ติดต่อเรา</a></li> 
      </ul>
    </div>
  </div>
</nav> */?>
<!-- Navigation -->
    <nav class="navbar navbar-inverse " role="navigation"> <!-- navbar-fixed-top -->
        
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <label class="navbar-brand" >
                <? if(isset($_SESSION["username"]))
					{  
						 print " Welcome : ".$_SESSION["name"]." ".$_SESSION["surename"]; 
					}
					else
					{   
  					 ?>
   						<a class=" navbar-brand" href="index.php"></a>
  					<?
 					}?>
                </label>
            
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right"><!--  -->
                    <li>
                        <a href="index.php">HOME</a>
                    </li>
                    <li>
                        <a href="order-main.php">MENU</a>
                    </li>
                    <li>
                        <a href="Promotion-main.php">PROMOTION</a>
                    </li>
                    <li>
                        <a href="contact-main.php">CONTACT</a>
                    </li>
                    <? if(isset($_SESSION["username"])){if($_SESSION["status"] == "admin"){?>
   					<li>
   						<a href="../admin"><button type="button" onclick="return confirm('คุณต้องการเข้าจัดการเว็บไซต์ ?')"class="btn btn-success btn-xs">Administrator</button></a>  
   					</li>
   					<li>
   						<a href="../sign_out.php"><button type="button" onclick="return confirm('คุณต้องการออกจากระบบ ?')"class="btn btn-danger btn-xs">Sign Out</button></a>
   					</li>
   					<?}else{?>
   					<li>
   						<a href="../sign_out.php"><button type="button" onclick="return confirm('คุณต้องการออกจากระบบ ?')"class="btn btn-danger btn-xs">Sign Out</button></a>
					</li>
					<?}}else{ ?>
   					<li>
   						<a href="sign_in.php"><button type="button" class="btn btn-info btn-xs">Sign In</button></a> 
					</li>
					<?}?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        
        <!-- /.container -->
    </nav>