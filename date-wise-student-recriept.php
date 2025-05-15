<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<script>
    window.onload = function(){ serch_vls.focus() }
</script>
<div class="container-fluid mb-3">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#clection"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='other-charges-manager'"> Other Charges Manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Date Wise Student Receipt</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <form class="colctFrm">
    <div class="row">
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fs-6">enter student roll#</label>
    <input type="text" id="serch_vls" class="form-control" required placeholder="Enter Roll No# Search" autocomplete="off">
    <input type="hidden" id="institue" class="form-control" required value="<?php echo $userId; ?>">
    <input type="hidden" id="usrrols" class="form-control" required value="<?php echo $role; ?>">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fs-6">Date</label>
            <input type="date" class="form-control dtewse">
        </div>
        
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3 mt-4">
<button type="submit" id="searchbtn" class="btn btn-apna text-uppercase"><i class="fas fa-search"></i> search</button>
        </div>
    </div>
    </form>    
    </div>
<br>
</div>
<div class="paid-form"></div>
<?php require_once("source/foot-section.php"); ?>
<script>
$(document).ready(function(){
    $("#searchbtn").on('click',function(e){
e.preventDefault();
var serch_vls = $("#serch_vls").val();
var institue = $("#institue").val();
var dtewse = $(".dtewse").val();

if(serch_vls == ""){
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
  icon: 'info',
  title: 'Please Enter Roll#'
})
}else{
    $.ajax({
url: 'ajax/generate-other-charges-receipt.php',
type: "POST",
data: {rol_nbr:serch_vls,inst_id:institue,date_wise:dtewse},
success: function(datas){
$(".paid-form").html(datas);
//alert(datas);
}
    });
}


    });
});
</script>