<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-main.php';?>

<?php /****************END menu-main********************/?>
<?php include 'slide-img.php';?>
 
<?php //include 'content-main.php';?>
<div class="row">
<div class="col-md-8 col-md-offset-3">
<h2>ผู้ดูแลระบบ</h2>
  <form action="check_sign_in.php" method="post" class="form-horizontal" role="form">
    <div class="form-group">
      <label class="control-label col-sm-2" for="Username">ชื่อใช้ระบบ:</label>
      <div class="col-sm-5">
        <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">รหัสผ่าน:</label>
      <div class="col-sm-5">          
        <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-5">
        <button type="submit" class="btn btn-primary btn-lg btn-block">ล็อกอิน</button>
        <br>
        <!-- <a href="register.php"><button type="button" class="btn btn-primary btn-block">Register</button></a> -->
      </div>
    </div>
  </form>
  </div>
</div>
<?php /****************END container********************/?>



<?php include '../include/footer.php';?>
