<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid mb-3">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> reminder</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>  
<script>
$(document).ready(function(){
    $("#remndbtn").on("click",function(e){
e.preventDefault();
var taReekhs = $(".tareekh").val();
var instid = $(".instid").val();
var rolOuts = $(".rolout").val();
var waqats = $("#waqat").val();
var rmorks = $(".rmrks").val();

if(taReekhs == ""){
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'warning',
  title: 'Please Select Date!'
})
}else if(waqats == ""){
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'warning',
  title: 'Please Select Time!'
})
}else if(rmorks == ""){
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'warning',
  title: 'Please Write the Message!'
})
}else{
    $.ajax({
url: 'ajax/reminder-inserted.php',
type: "POST",
data: {rem_dte:taReekhs,rem_time:waqats,remks:rmorks,int_ids:instid,rl_out:rolOuts},
success: function(reminderdata){
    if(reminderdata == 1){
remindrData()
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Your Message Remind Me!'
})
$(".rmndForm").trigger("reset");
    }else{
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: 'Your Message is not Remind Me!'
})
    }
}
    });
}

    });
});
</script>
<div class="container-fluid">
<form class="rmndForm">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">date</label>
            <input type="date" class="form-control tareekh">
            <input type="hidden" class="form-control instid" value="<?php echo $userId; ?>">
            <input type="hidden" class="form-control rolout" value="<?php echo $role; ?>">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">time</label>
            <input type="time" class="form-control" id="waqat"/>
        </div>
        <div class="col-12 mb-3">
            <label class="text-capitalize">remarks</label>
            <textarea class="form-control rmrks"></textarea>
        </div>
        <div class="col-12" align="right">
            <button type="submit" class="btn btn-apna text-uppercase" id="remndbtn"><i class="fa-regular fa-clock"></i> remind</button>
        </div>
    </div>
</form>
<br>
<div class="remindr-record"></div>
<script>
function remindrData(){
    var istId = $(".instid").val();
    var rlOts = $(".rolout").val();
$.ajax({
url: 'ajax/reminder-fetch-record.php',
type: "POST",
data: {inst_ds:istId,rol_s:rlOts},
success: function(recordrem){
    $(".remindr-record").html(recordrem);

}
    });
}
remindrData();
</script>
</div>
<?php require_once("source/foot-section.php"); ?>