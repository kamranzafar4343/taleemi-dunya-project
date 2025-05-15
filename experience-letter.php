<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#e-certificates"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='staff-certificates'">  Staff certificates </a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> experience letter</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
<h4 class="fs-4 fw-bold text-uppercase mb-3 mt-3 text-white" style="border-bottom:2px dashed white;">experience letter</h4>
<?php
if(isset($_GET['id'])){
    $ids = $_GET['id'];
    $sl_st = mysqli_query($con,"select * from addStaff where instituteId='$userId' && id='$ids'");
$result = mysqli_fetch_assoc($sl_st);
    
    $id = $result['id'];
    $joiningDate = $result['joiningDate'];
    $frmsst = explode("-",$joiningDate);
    $dte = $frmsst[2];
    $mnths = $frmsst[1];
    $yrs = $frmsst[0];
    $arnge_dte = $dte."-".$mnths."-".$yrs;
    $staffId = $result['staffId'];
    $appliedPost = $result['appliedPost'];
    $staffType = $result['staffType'];
    $maritalStatus = $result['maritalStatus'];
    $staffName = $result['staffName'];
    $gender = $result['gender'];
    $fatherName = $result['fatherName'];
    $cnic = $result['cnic'];
    $dob = $result['dob'];
    $phone = $result['phone'];
    $formcell = $result['cell'];
    $subject = $result['subject'];
    $location = $result['location'];
    $qualification = $result['qualification'];
    $salary = $result['salary'];
    $timeIn = $result['timeIn'];
    $timeOut = $result['timeOut'];
    $facebookAcount = $result['facebookAcount'];
    $gmailAcount = $result['gmailAcount'];
    $digitalCard = $result['digitalCard'];
    $staffimage = $result['staffimage'];
}
?>
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 datas">
    <div class="card">
        <img src="logo/exp-letter.webp" class="card-img-top">
        <div class="card-img-overlay">
<div class="row mt-5">
    <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2 offset-1 offset-sm-1 offset-md-1 offset-lg-1 offset-xl-1 offset-xxl-1">
        <div style="width:50px; height:50px; border:1px solid black;overflow:hidden;">
            <img src="portal-admins/institute-logos/<?php echo $image; ?>" style="width:100%;" class="img-fluid">
        </div>
    </div>
    <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
        <h4 class="fs-4 fw-bold text-uppercase text-center"><?php echo $instituteName; ?></h4>
        <div class="d-flex">
            <div class="p-2 flex-fill text-center fw-bold">Phone:</div>
            <div class="p-2 flex-fill text-center"><?php echo $mainphones; ?></div>
            <div class="p-2 flex-fill text-center fw-bold">Cell:</div>
            <div class="p-2 flex-fill text-center"><?php echo $cell; ?></div>
        </div>
    </div>
    <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
        <div style="width:50px; height:50px; border:1px solid black;overflow:hidden;">
            <img src="staff_imgs/<?php echo $staffimage; ?>" style="width:100%;" class="img-fluid">
        </div>
    </div>
</div>
<br><br><br><br>
<div class="row">
    <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-2 offset-sm-2 offset-md-2 offset-lg-2 offset-xl-2 offset-xxl-2">
        <h6 align="justify">
This Is Certify That Mr./Miss <span class="text-uppercase fw-bold fs-6"><?php echo $staffName; ?></span> S/D/O <span class="text-uppercase fw-bold fs-6"><?php echo $fatherName; ?></span> Has Worked In Our <br><br>Institute As A Teacher From <span class="text-uppercase fw-bold fs-6"><?php echo $arnge_dte; ?></span>. He/She Is Very Punctual And Hard Workig Teacher.<br><br> He/She Has Been Very Innovative In Her Profession And Her Performance In The Institution<br><br> Has Been Very Excellent. We Wish Him/Her Good Luck For Bright Future.
        </h6>
    </div>
</div>   
        </div>
    </div>
</div>
    </div>

<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-apna' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
    </div>
</div>


</div>
<script type="text/javascript">
$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>
<?php require_once("source/foot-section.php"); ?>