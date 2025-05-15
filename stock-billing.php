<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#stock"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> billing </li>
  </ol>
</nav>
<div class="container-fluid">
<form id="bilform">
    <div class="row">
        <input type="hidden" value="<?php echo $userId; ?>" id="instid">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-uppercase">bill iD#</label>
<div class="input-group">
    <input type="text" onkeypress="isInputNumber(event)" class="form-control" id="bilid" autocomplete="off" placeholder="Enter Bill No#">
    <button type="submit" class="btn btn-apna text-uppercase" id="genbilBtn"><i class="fa-solid fa-spinner"></i> generate</button>
</div>
        </div>
    </div>
</form>
<div class="bill-view-memo"></div>
</div>
<script>
$(document).ready(function(){
    $("#genbilBtn").click(function(e){
e.preventDefault();
var bilId = $("#bilid").val();
var intId= $("#instid").val();
if(bilId == ""){
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
  title: 'Please Enter Bill ID'
})
}else{
$.ajax({
url: 'ajax/ajax-stock-bill-copy.php',
type: "POST",
data: {bils_id:bilId,ints_id:intId},
success: function(results){
   $(".bill-view-memo").html(results);
   $("#bilform").trigger("reset");
}
});
}
    });
});
</script>
<?php require_once("source/foot-section.php"); ?>