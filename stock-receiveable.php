<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#stock"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">receiveables </li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
        <input value="<?php echo $userId; ?>" id="instid" type="hidden">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize"> select vendor name</label>
            <select class="text-capitalize form-select" id="vndr">
                <option class="text-capitalize" value="">---select vendor---</option>
<?php
$sl_vndr = mysqli_query($con,"select * from vendorAccount where instituteId='$userId'");
if(mysqli_num_rows($sl_vndr)>0){
    while($vndr = mysqli_fetch_array($sl_vndr)){
        $vids = $vndr['vids'];
        $vname = $vndr['vname'];
echo "<option value='".$vids."'>".$vname."</option>";
    }
}else{
    echo "<option value='' class='text-capitalize'>there are no vendor available.</option>";
}
?>
            </select>
        </div>
        <div class="col-12 col-sm-6 col-md-8 col-lg-9 col-xl-10 col-xxl-10 mb-3 mt-4" align="right">
<div class="d-flex">
    <div class="">
        <a href="javascript:void()" onclick="location.href='receiveable-manager'" class="btn btn-primary text-capitalize">
                <i class="fa-regular fa-rectangle-list"></i> monthly report
        </a>
    </div>
    <div class="">
        <a href="javascript:void()" onclick="location.href='annualy-receiveable-report'" class="btn btn-success text-capitalize">
                <i class="fa-solid fa-clipboard-list"></i> annualy report
        </a>
    </div>
</div>
            
        </div>
    </div>
<div class="form-receiveable"></div>
</div>
<script>
$(document).ready(function(){
    $("#vndr").on('change',function(){
var vndrId = this.value;
var scholId = $("#instid").val();
if(vndrId == ""){
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
  title: 'Please Select Vendor!'
})
}else{
$.ajax({
    url: 'ajax/ajax-receiveable-stock.php',
    type: "POST",
    data: {vnr_id:vndrId,schl_id:scholId},
    success: function(results){
$(".form-receiveable").html(results);
    }
});    
}
    });
});
</script>
<?php require_once("source/foot-section.php"); ?>