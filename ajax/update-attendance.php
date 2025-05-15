<?php
require_once("../functions/db.php");

$st_id = $_POST['st_id'];

$slatt = mysqli_query($con,"select * from attandance where id='$st_id'");
$record = "";

foreach($slatt as $row){
    
$record .= "<form class='updfrm'><h5 class='fs-5 fw-bold text-uppercase text-center py-1'>edit student attendance</h5><div class='row' style='background:hsl(0,0%, 15%);'>
<div class='col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3'>
    <label class='text-capitalize fs-6'>roll no#</label>
    <input type='text' value='$row[roll_no]' class='form-control'>
    <input type='hidden' value='$row[id]' id='stids' class='form-control'>
</div>
<div class='col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3'>
    <label class='text-capitalize fs-6'>Student Name</label>
    <input type='text' value='$row[stu_name]' class='form-control'>
</div>
<div class='col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3'>
    <label class='text-capitalize fs-6'>Father Name</label>
    <input type='text' value='$row[father_name]' class='form-control'>
</div>
<div class='col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3'>
    <label class='text-capitalize fs-6'>Status</label>
    <select class='text-capitalize form-select dropDownId'>
<option class='text-capitalize' value='$row[status]'>$row[status]</option>
<option class='text-capitalize' value='P'>present</option>
<option class='text-capitalize' value='A'>absent</option>
<option class='text-capitalize' value='L'>leave</option>
<option class='text-capitalize' value='H'>holiday</option>
    </select>
</div>
<div class='col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3 mt-4'>
    <div class='d-grid'>
        <button class='btn btn-apna text-uppercase' type='submit' id='updteid'> <i class='fa-solid fa-retweet'></i> update</button>
    </div>
</div>
</div>
</form>
    ";
}
echo $record;
?>
<script>
$(document).ready(function(){
    $("#updteid").on('click',function(e){
e.preventDefault();
var dropDownId = $('.dropDownId :selected').val();
var stids = $('#stids').val();
        
$.ajax({
    url: 'ajax/update-student-attendance.php',
    type: "POST",
    data: {stats:dropDownId,ids:stids},
    success: function(resls){
if(resls == 1){
    const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 1500,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "Attendance Successfully Update!"
});
}else{
    const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 1500,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "error",
  title: "Attendance is not Update"
});
}
    }
});
    });
});
</script>