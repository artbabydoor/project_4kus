<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-main.php';?>

<?php /****************END menu-main********************/?>
<?php include 'slide-img.php';?>
 
<div class="row">
<div class="col-md-6 col-md-offset-3">
<h2>สมัครสมาชิก</h2>
  <form action="check_register.php" method="post" class="form-horizontal" role="form">
  	<div class="form-group">
      <label class="control-label col-sm-2" for="name">ชื่อ:</label>
      <div class="col-sm-10">
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="surename">นามสกุล:</label>
      <div class="col-sm-10">
        <input type="text" name="surename" class="form-control" id="surename" placeholder="Enter surename">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">E-mail:</label>
      <div class="col-sm-10">
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter E-mail">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Username">Username:</label>
      <div class="col-sm-10">
        <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Enter password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary btn-lg btn-block">สมัครสมาชิก</button>
      </div>
    </div>
  </form>
  </div>
</div>


<?php /****************END container********************/?>



<?php include '../include/footer.php';?>

