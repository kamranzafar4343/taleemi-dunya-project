<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#stock"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> payables </li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
<div class="card bg-apna">
    <div class="card-header">
<div class="d-flex">
    <div class="flex-fill">
        <h4 class="fs-4 fw-bold text-uppercase bg-apna text-center py-1">paid amounts</h4>
    </div>
    <div class=""><a href="javascript:void()" onclick="location.href='payable-manager'" class="btn btn-primary text-capitalize">
        <i class="fa-regular fa-rectangle-list"></i> monthly report
        </a>
    </div>
    <div class=""><a href="javascript:void()" onclick="location.href='annual-payable-report'" class="btn btn-success text-capitalize">
        <i class="fa-solid fa-clipboard-list"></i> annualy report
        </a>
    </div>
</div>

    </div>
    <div class="card-body" style="background:hsl(0,0%,15%);">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
            <label class="text-capitalize">select vendor name</label>
            <input type="hidden" value="<?php echo $userId; ?>" id="instid">
            <select class="form-select text-capitalize" id="vnem">
                <option class="text-capitalize" value="">---select vendor----</option>
<?php
$slct_vndr = mysqli_query($con,"select * from vendorAccount where instituteId='$userId'");
if(mysqli_num_rows($slct_vndr)>0){
    while($vndr = mysqli_fetch_array($slct_vndr)){
$vname = $vndr['vname'];
$vids = $vndr['vids'];
?>
<option class="text-capitalize" value="<?php echo $vids; ?>"><?php echo $vname; ?></option>
<?php
    }
}else{
    echo "<option class='text-capitalize'>there are no vendor available.</option>";
}
?>
            </select>
        </div>
    </div>
<div id="paid-form-vendor" class="mt-5"></div>
    </div>
</div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
$("#vnem").on('change',function(){
var vendNme = this.value;
var instCde = $("#instid").val();
if(vendNme == ""){
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
   url:'ajax/vendor-paid-form.php',
   type:"POST",
   data:{ vend_nmes:vendNme,inst_code:instCde },
   success: function(result){
       $('#paid-form-vendor').html(result);
       //console.log(result);
   }
    });    
}
    });
});    
</script>
<?php require_once("source/foot-section.php"); ?>