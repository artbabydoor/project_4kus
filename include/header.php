<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
<title>ร้านโฟกัส สุกี้บุฟเฟต์</title>
	<link rel="shortcut icon" href="../image/4kus.ico" />
	<!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	<link href="../css/bootstrap.css" rel="stylesheet">
		
	<!-- Start WOWSlider.com HEAD section -->
		<link rel="stylesheet" type="text/css" href="../engine1/style.css" />
		<script type="text/javascript" src="../engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
<!-- Latest compiled and minified JavaScript -->
	
	<script type='text/javascript' src='../js/bootstrap.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	
		<link rel="stylesheet" media="all" type="text/css" href="../css/jquery-ui.css" />
		<link rel="stylesheet" media="all" type="text/css" href="../css/jquery-ui-timepicker-addon.css" />

		<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="../js/jquery-ui.min.js"></script>

		<script type="text/javascript" src="../js/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="../js/jquery-ui-sliderAccess.js"></script>
	<!-- jQuery -->
    <!-- <script src="../js/jquery.js"></script>    --> 

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
<script type="text/javascript">
	function updateSubmit(){
		if(document.formupdate.order_fullname.value == ""){
			alert('โปรดใส่ชื่อนามสกุลด้วย!');
			document.formupdate.order_fullname.focus();
			return false;
		}
		document.formupdate.submit();
		return false;
	}
</script>
<style type="text/css"> 
@media print 
{ 
#non-printable { display: none; } 
#printable { display: block; } 
} 
</style>
<script type="text/javascript">
$(function(){
	$("#dateInput").datepicker({
		dateFormat: 'yy-m-dd',
		numberOfMonths: 1,
	});
	$("#dateInput2").datepicker({
		//dateFormat: 'dd-M-yy',
		dateFormat: 'yy-m-dd',
		numberOfMonths: 1,
	});
	
});

</script>
</head>
<body>
<div class="container">