<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#accounts"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Cash Closing</li>
  </ol>
</nav>
<div class="container-fluid mt-4">
    <div class="row">
<div class="col-12 mb-3">
    <div class="d-flex">
        <div class="flex-fill">
            <h4 class="text-capitalize fs-4 fw-bold text-white" style="border-bottom:2px dashed white;">daily Closing Balance</h4>
        </div>
    </div>
</div>
    </div>
<form id="closForm">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3">

<label class="text-capitalize">closing date</label>
<div class="input-group">
    <input type="date" class="form-control closdte">
    <button type="submit" class="btn btn-apna text-uppercase gentbtn"> generate</button>
</div>
        </div>
    </div>
    <input type="hidden" id="acinstid"  value="<?php echo $userId; ?>">
    <input type="hidden" id="rul"  value="<?php echo $role; ?>">
</form>
<div class="view-record"></div>

<script type="text/javascript">

</script>
</div>

<?php require_once("source/foot-section.php"); ?>
<script>
$(document).ready(function(){

$(".gentbtn").on('click',function(e){
e.preventDefault();
var closdte = $(".closdte").val();
var acinstid = $("#acinstid").val();
var rul = $("#rul").val();
if(closdte == ""){
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
  title: "Please Select Closing Date!"
});
}else{
    $.ajax({
url: 'ajax/fetch-closing-date.php',
type: "POST",
data: {clsing_date:closdte,inst_ids:acinstid,asing_role:rul},
success: function(alrts){ $(".view-record").html(alrts);}
    });
}
    });
});
 </script>