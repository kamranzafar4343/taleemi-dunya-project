<?php
require_once("../functions/db.php");

$recrd_id = $_POST['recrd_id'];
$selct_rcrd = mysqli_query($con,"select * from staffAttendance where id='$recrd_id'");
$reslts = mysqli_fetch_assoc($selct_rcrd);
$idps = $reslts['id'];
$staff_id = $reslts['staff_id'];
$date = $reslts['date'];
$status = $reslts['status'];
$att_time = $reslts['att_time'];
$time_out = $reslts['time_out'];
?>
<form>
<div class="row">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
<label class="fs-6 text-capitalize">Status</label>
<select class="form-select text-capitalize stats">
    <option class="text-capitalize" value="<?php echo $status; ?>"><?php echo $status; ?></option>
    <option class="text-capitalize" value="P">Present</option>
    <option class="text-capitalize" value="A">Absent</option>
    <option class="text-capitalize" value="L">Leave</option>
    <option class="text-capitalize" value="H">Holiday</option>
</select>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
<label class="fs-6 text-capitalize">Time In</label>
<input class="form-control tmeins" type="time" value="<?php echo $att_time; ?>">
<input type="hidden" class="atids" value="<?php echo $idps; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
<label class="fs-6 text-capitalize">Time Out</label>
<input class="form-control tmouts" type="time" value="<?php echo $time_out; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3 mt-4">
<div class="d-grid">
    <button class="btn btn-apna text-uppercase udtatdcnebtn" type="submit"><i class="fa-solid fa-arrow-rotate-right"></i> update</button>
</div>
    </div>
</div>
</form>
<script>
$(document).ready(function(){
    $(".udtatdcnebtn").on('click',function(e){
e.preventDefault();
var stats = $(".stats").val();
var tmeins = $(".tmeins").val();
var tmouts = $(".tmouts").val();
var atids = $(".atids").val();
if(stats == ""){
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "info",
  title: "Please Select Status!"
});
}else{
    $.ajax({
url: 'ajax/update-individual-attendance-record.php',
type: "POST",
data: {attendance_ids:atids,apl_status:stats,apl_timein:tmeins,apl_tmeout:tmouts},
success: function(updterecrds){
    if(updterecrds == 1){
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "Attendance Record Successfully Update!"
});
    }else{
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "error",
  title: "Record is not Update!"
});
    }
}
    });
}
    });
});
</script>