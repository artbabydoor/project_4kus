<div id="startDate">
<script type="text/javascript">
$(function(){
	$("#dateInput").datepicker({
		dateFormat: 'dd-M-yy',
		numberOfMonths: 1,
	});
	$("#dateInput2").datepicker({
		dateFormat: 'dd-M-yy',
		numberOfMonths: 1,
	});
	
});

</script>
<form  name="form1" method="post" action="#" class=" form-inline" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputName2">วันเริ่มต้น</label>
    <input type="text" name="dateInput2" class="form-control " id="dateInput" placeholder="dd-m-yy">
  </div>
  <div class="form-group">
    <label for="exampleInputName2">ถึง</label>
    <input type="text" name="dateInput2" class="form-control " id="dateInput2" placeholder="dd-m-yy">
  </div>
  <button type="submit" class="btn btn-default">ค้นหา</button>
</form>
</div>