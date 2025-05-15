<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#stock"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> dispatch stock</li>
  </ol>
</nav>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 mb-3">
<div class="d-flex">
    <div class="me-2"><button class="btn btn-secondary fs-6 text-capitalize">enter vendor name</button></div>
    <div class="flex-fill me-2">
<form id="dipfrm">
    <div class="input-group">
<input type="search" class="form-control" placeholder="Enter Vendor Name" id="vend-name">
<input type="hidden" class="form-control" value="<?php echo $userId; ?>" id="scholid">
<button type="submit" class="btn btn-apna text-uppercase" id="btnserch"><i class="fa fa-search"></i> search</button>
    </div>
</form>
    </div>
    <div><a class="btn btn-primary text-capitalize" hre="javascript:void()" onclick="location.href='dispatch-history'"><i class="fa-solid fa-file-waveform"></i> dispatch history</a></div>
</div>
        </div>
    </div>
<div class="row">
    <div class="col-12 mb-3">
        <h4 class="text-center fs-4 text-uppercase fw-bold bg-apna py-1"> vendor stock detail</h4>
    </div>
<div id="serch-bar-data"></div>
<?php
$a = 1;
$sl_stk = mysqli_query($con,"select * from vendorAccount where instituteId='$userId'");
if(mysqli_num_rows($sl_stk)>0){
    while($a <= 1000000 && $skreslt = mysqli_fetch_array($sl_stk)){
$vname = $skreslt['vname'];
$vids = $skreslt['vids'];
$business_type = $skreslt['business_type'];
$items = $skreslt['items'];
?>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xl-2">
    <div class="card mb-3 text-center cards">
        <a href="show-stock?id=<?php echo $vids; ?>" class="nav-links text-uppercase bg-white p-3 px-4 fs-4">
            <?php echo $vname; ?>
            <h5 class="fs-5 text-secondary text-capitalize"><?php echo $business_type."<span style='font-size:0.8rem;'> (".$items.")</span>"; ?></h5>
        </a>
    </div> 
</div>
<?php
    }
}else{ echo "<div class='alert alert-danger text-capitlaize'></div>"; }
?>
</div>
    
</div>
<script>
$(document).ready(function(){
    $("#btnserch").on('click',function(e){
e.preventDefault();
var vndrSrch = $("#vend-name").val();
var colgId = $("#scholid").val();
if(vndrSrch == ""){
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
  title: 'Please the Enter the Search Value!'
}) 
}else{
$.ajax({
    url: 'ajax/vendor-search-bar.php',
    type: "POST",
    data: {vdr_srch:vndrSrch,col_id:colgId},
    success: function(datas){
//console.log(datas);
$("#serch-bar-data").html(datas);
$("#dipfrm").trigger("reset");
    }
});
}
    });
});
</script>
<?php require_once("source/foot-section.php"); ?>