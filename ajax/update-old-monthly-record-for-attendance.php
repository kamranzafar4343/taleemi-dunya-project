<?php
require_once("../functions/db.php");

$recrd_id = $_POST['recrd_id'];
$selct_rcrd = mysqli_query($con,"select * from staffAttendance where id='$recrd_id'");
$reslts = mysqli_fetch_assoc($selct_rcrd);
$idps = $reslts['id'];
$staff_id = $reslts['staff_id'];
?>
<form>
<div class="row">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
<label class="fs-6 text-capitalize">ID#</label>
<input class="form-control stfids" type="text" value="<?php echo $staff_id; ?>">
<input class="form-control oldstafid" type="hidden" value="<?php echo $staff_id; ?>">
<input type="hidden" class="atids" value="<?php echo $idps; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3 mt-4">
<div class="d-grid">
    <button class="btn btn-apna text-uppercase udtatdbtn" type="submit"><i class="fa-solid fa-arrow-rotate-right"></i> update</button>
</div>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3 mt-4">
<div class="d-grid">
    <button class="btn btn-warning text-uppercase ovraludtatdbtn" type="submit"><i class="fa-solid fa-arrow-rotate-right"></i> update by staff id</button>
</div>
    </div>
</div>
</form>
<script>
$(document).ready(function(){
////////// Staff Update By Staff Id
    $(".ovraludtatdbtn").on('click',function(e){
e.preventDefault();
var stfids = $(".stfids").val();
var oldstafid = $(".oldstafid").val();
if(stfids == ""){
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
  title: "Please Enter Staff ID#!"
});
}else{
    $.ajax({
url: 'ajax/update-staff-id-by-staff.php',
type: "POST",
data: {staff_idps:stfids,apl_oldstaffid:oldstafid},
success: function(sfrest){ 
    if(sfrest == 1){
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
  title: "All Staff ID is Successfully Update!"
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
  title: "Staff ID is not Update!"
});
    }
}

    });
}
    });
///////// Staff Update By id no
    $(".udtatdbtn").on('click',function(e){
e.preventDefault();
var stfids = $(".stfids").val();
var atids = $(".atids").val();
if(stfids == ""){
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
  title: "Please Enter the Staff ID!"
});
}else{
    $.ajax({
url: 'ajax/update-old-attendance-record.php',
type: "POST",
data: {staf_idps:stfids,attendance_ids:atids},
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