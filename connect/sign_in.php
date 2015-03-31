<?php include '../include/header.php';?>
<?php /****************END HEADER********************/?>
<?php include 'header-img.php';?>
<?php include 'menu-main.php';?>

<?php /****************END menu-main********************/?>
<?php include 'slide-img.php';?>
 
<?php //include 'content-main.php';?>

<h2>Horizontal form</h2>
  <form class="form-horizontal" role="form">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>

<?php /****************END container********************/?>



<?php include '../include/footer.php';?>
