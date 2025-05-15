<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3" id="main-baner">
<div class="owl-carousel owl-theme">
    <div class="item"><img src="main-slider/1-min.webp" class="img-fluid"></div>
    <div class="item"><img src="main-slider/2-min.webp" class="img-fluid"></div>
    <div class="item"><img src="main-slider/3-min.webp" class="img-fluid"></div>
    <div class="item"><img src="main-slider/4-min.webp" class="img-fluid"></div>
</div>
        </div>
<div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-9 col-xxl-9">
<?php
$sel_dshbrd = mysqli_query($con,"select * from institute_collection where instituteId='$userId' order by id desc");
$frsh = mysqli_fetch_array($sel_dshbrd);
$months = $frsh['months'];
$deactive_date = $frsh['deactive_date'];
$mtch_dte = date("Y-m-d");
$session = $frsh['session'];
$fee_type = $frsh['fee_type'];
$frmt = explode("-",$deactive_date);
$dtng = $frmt['2'];
$mahina = $frmt['1'];
$saal = $frmt['0'];
$navi_dte = $dtng-02;
$new_tareekh = $navi_dte."-".$mahina."-".$saal;
$extdte = date("j-m-Y");
if($new_tareekh == $extdte){
    echo '<div class="alert alert-danger alert-dismissible fade show fs-4" role="alert">
 <strong> Notice: </strong> Please Pay Your Payment. Before Deactivation Date.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if($deactive_date > $mtch_dte && $fee_type == 'paid' || $deactive_date > $mtch_dte && $fee_type == 'balance'){
?>
    <div class="row">
<!---Start Generate Challan----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" data-bs-toggle="modal" data-bs-target="#fee" class="nav-link box">            
    <img src="icons/challan.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">generate challan</h6>
    </div>
</a>
            </div>
        </div>
<!---End Generate Challan----->
<!---Start Challan Manager----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" data-bs-toggle="modal" data-bs-target="#chlan-manager" class="nav-link box">            
    <img src="icons/challan-manager.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">challan manager</h6>
    </div>
</a>
            </div>
        </div>
<!---End Challan Manager----->
<!---Start collection----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" data-bs-toggle="modal" data-bs-target="#clection" class="nav-link box">            
    <img src="icons/fee.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">collection</h6>
    </div>
</a>
            </div>
        </div>
<!---End collection----->
<!---Start collection Manager
        <div class="col-4 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="javascript:void()" onclick="location.href=''" class="nav-link box">            
    <img src="icons/fee-manager.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">collection manager</h6>
    </div>
</a>
            </div>
        </div>
End collection Manager----->
<!---Start Accounts----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#accounts">            
    <img src="icons/account.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">accounts</h6>
    </div>
</a>
            </div>
        </div>
<!---End Accounts----->
<!---Start Accounts----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#">            
    <img src="icons/account-manager.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">accounts manager</h6>
    </div>
</a>
            </div>
        </div>
<!---End Accounts----->
<!---Start stock----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#stock">            
    <img src="icons/stock.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">stock</h6>
    </div>
</a>
            </div>
        </div>
<!---End stock----->
    </div>
<?php
 }elseif($fee_type == '') {
 echo '<script>
Swal.fire({
  title: "Non Payment!",
  html: "<h5>Dear Customer, </h5><br>" + "<h6>Your Taleemi Portal Account is temporarily blocked due to Non Payment.Please Submit your pending dues to continue our services. Thank You</h6>" + "<br><div>For Further Details Contact with Admin.</div> <br><h6>0335-7963004 (Whatsaap only)</h6>",
  icon: "warning",
  showConfirmButton: false,
  allowOutsideClick: false,
  allowEscapeKey: false,
  iconColor: "#f50202",
  color: "#000000",
  background: "#dbd9d7",
});
</script>';
}
?>
</div>
<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
    <div class="card mb-3" style="border:none;">
        <div class="card-body text-center">
            <a href="https://attendance.taleemidunya.com/" target="_blank">
                <img src="main-slider/new-attendance.gif" class="img-fluid">    
            </a>
        </div>
    </div>
</div>



    </div>
</div>
<?php require_once("source/foot-section.php"); ?>