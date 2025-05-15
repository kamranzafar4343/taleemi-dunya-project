<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#studentportal"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> lms status</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="<?php echo $userId; ?>" class="scid">
<script>
$(document).ready(function(){
    function studentPortalRecord(){
var scid = $(".scid").val();
$.ajax({
    url: 'ajax/student-portal-manager.php',
    type: "POST",
    data:{user_ids:scid},
    success: function(prtlrcrd){
        $(".studnet-record-portal").html(prtlrcrd);
    }
});
    }
studentPortalRecord();
});
</script>
<div class="container-fluid mt-4">
<div class="row">
    <div class="col-6 mb-3">
<div class='input-group'>
  <a href="lms-student-list-pdf?id=<?php echo $userId; ?> && instnme=<?php echo $instituteName; ?> && cpms=<?php echo $campus; ?> && logs=<?php echo $image; ?>" target="_blank" class='btn btn-danger text-capitalize'><i class="fa-solid fa-file-pdf"></i> List in PDF</a>
    <a href="javascript:void()" onclick="location.href='all-lms-receipt-prints'" class='btn btn-success text-capitalize'>
        <i class="fa fa-print"></i> All Receipt Prints
    </a>
</div>
    </div>
    <div class="col-6 mb-3">
<!---------------
<div align="right">
  <a href="all-active-student-portal?id=<?php //echo $userId; ?>" class='btn btn-success text-capitalize'><i class="fa-solid fa-check"></i> All Active</a>
    <a href="all-deactive-student-portal?id=<?php //echo $userId; ?>" class='btn btn-danger text-capitalize'>
        <i class="fa-solid fa-xmark"></i> All Deactive
    </a>
</div>
----------->
    </div>
</div>
    <div class="row">
<div class="studnet-record-portal"></div>
        
    </div>    
</div>
<?php require_once("source/foot-section.php"); ?>
<script>
$(document).on('click','#stdprtl',function(e){
    e.preventDefault();
    var idno = $(this).attr('rowid');
    var scid = $(".scid").val();
$.ajax({
    url: 'ajax/active-student-for-portal.php',
    type: "POST",
    data:{std_id:idno,inst_id:scid},
    success: function(stdntportl){
if(stdntportl == 11){
    studentPortalRecord();
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
  icon: "warning",
  title: "This User Already Active!"
});
}else if(stdntportl == 1){
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
  title: "User Account Successfully Active!"
});
window.location.reload();
//    studentPortalRecord();
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
  title: "User is not Active!"
});
}
    }
});
});
</script>