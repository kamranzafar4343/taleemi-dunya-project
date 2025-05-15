<?php
require_once("../functions/db.php");

$atend_id = $_POST['atend_id'];

$slatt = mysqli_query($con,"select * from staffAttendance where id='$atend_id'");
$record = "";

foreach($slatt as $row){
    
$record .= "<form class='updfrm'><h5 class='fs-5 fw-bold text-uppercase text-center py-1 bg-apna'>Update Staff Attendance</h5><div class='row' style='background:hsl(0,0%, 15%);'>
<div class='col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3'>
    <label class='text-capitalize fs-6'>Staff ID#</label>
    <input type='text' value='$row[staff_id]' class='form-control rols'>
</div>
<div class='col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3'>
    <label class='text-capitalize fs-6'>Staff Name</label>
    <input type='text' value='$row[staff_name]' class='form-control'>
</div>
<div class='col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3'>
    <label class='text-capitalize fs-6'>Attedance</label>
    <select class='text-capitalize form-select dropDownId'>
<option class='text-capitalize' value='$row[status]'>$row[status]</option>
<option class='text-capitalize' value='P'>present</option>
<option class='text-capitalize' value='A'>absent</option>
<option class='text-capitalize' value='L'>leave</option>
<option class='text-capitalize' value='H'>holiday</option>
    </select>
</div>
<div class='col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3'>
    <label class='text-capitalize fs-6'>Time In</label>
    <input type='time' value='$row[att_time]' class='form-control tmein'>
    <input type='hidden' value='$row[id]' id='stids' class='form-control'>
</div>
<div class='col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3'>
    <label class='text-capitalize fs-6'>Tim Out</label>
    <input type='time' value='$row[time_out]' class='form-control' id='timout'>
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
var tmein = $('.tmein').val();
var timout = $('#timout').val();


$.ajax({
    url: 'ajax/update-attendance-record.php',
    type: "POST",
    data: {stats:dropDownId,ids:stids,times_ins:tmein,time_outs:timout},
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
  title: "Attendance is not Update!"
});
}

    }
});

    });
});
</script>