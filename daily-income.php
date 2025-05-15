<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#accounts"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Monthly Income</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<?php
$mnth = date("m");
$sl_selsesn = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
while($ses_reslt=mysqli_fetch_array($sl_selsesn)){
$session = $ses_reslt['session'];
}

$newadmisn = mysqli_query($con,"select SUM(receive_amount) as recngs from new_admission_collection where instituteId='$userId' && month='$mnth' && session='$session'");
while($newad = mysqli_fetch_array($newadmisn)){
    $recngs = $newad['recngs'];
}

$mnthly_chrges = mysqli_query($con,"select SUM(receive_amount) as rcveamnt from otherChargesPaid where instituteId='$userId' && months='$mnth' && session='$session'");
while($othr = mysqli_fetch_array($mnthly_chrges)){
    $rcveamnt = $othr['rcveamnt'];
}
$mnthly_fees = mysqli_query($con,"select SUM(receive_monthly) as recvemnths from fee_collection where instituteId='$userId' && month='$mnth' && session='$session'");
while($fes = mysqli_fetch_array($mnthly_fees)){
    $recvemnths = $fes['recvemnths'];
}

?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-3">
<a href="daily-new-admission-list" class="nav-link" target="_blank">
<div class="card py-2" style="background-color:hsl(28,100%,50%);">
    <h6 class="text-uppercase fs-6 fw-bolder text-center">New Adm. Collection</h6>
    <div class="text-center fw-normal"><?php if(!empty($recngs)){ echo $recngs; }else{ echo "0"; } ?></div>
</div>
</a>
        </div>
        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-3">
<a href="monthly-other-charges-list" class="nav-link" target="_blank">
<div class="card py-2" style="background-color:hsl(28,100%,50%);">
    <h6 class="text-uppercase fs-6 fw-bolder text-center">Other Charges</h6>
    <div class="text-center fw-normal"><?php if(!empty($rcveamnt)){ echo $rcveamnt; }else{ echo "0"; } ?></div>
</div>
</a>
        </div>
        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-3">
<a href="month-wise-fee-receiving-list" class="nav-link" target="_blank">
<div class="card py-2" style="background-color:hsl(28,100%,60%);">
    <h6 class="text-uppercase fs-6 fw-bolder text-center">Fee Collection</h6>
    <div class="text-center fw-normal"><?php if(!empty($recvemnths)){ echo $recvemnths; }else{ echo "0"; } ?></div>
</div>
</a>
        </div>
        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-3">
<a href="#" class="nav-link" target="_blank">
<div class="card py-2" style="background-color:hsl(28,100%,60%);">
    <h6 class="text-uppercase fs-6 fw-bolder text-center">Total Income</h6>
    <div class="text-center fw-normal"><?php echo $recngs+$rcveamnt+$recvemnths; ?></div>
</div>
</a>
        </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>