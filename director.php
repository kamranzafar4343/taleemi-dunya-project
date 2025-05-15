<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("addfee.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid mb-5">
    <div class="row">
<?php
$sl_inst = mysqli_query($con,"select * from confirmSchools where institute_id='$userId'");
if(mysqli_num_rows($sl_inst)>0){
    $rst = mysqli_fetch_assoc($sl_inst);
$institute_name = $rst['institute_name'];
$campus = $rst['campus'];
$logo = $rst['logo'];
$assign_role = $rst['assign_role'];
}else{ echo "<div class='text-capitalize'>update your school profile!</div>"; }

if($userId == "758948"){ ?> 
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3" id="main-baner">
    <div class="owl-carousel owl-theme">
        <div class="item"><img src="main-slider/1-min.webp" class="img-fluid"></div>
        <div class="item"><img src="main-slider/2-min.webp" class="img-fluid"></div>
        <div class="item"><img src="main-slider/3-min.webp" class="img-fluid"></div>
        <div class="item"><img src="main-slider/4-min.webp" class="img-fluid"></div>
    </div>
</div>
<?php }else{ ?>

        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
            <div class="card">
<div class="input-group">
    <div class="form-control">
        <marquee scrollamount="3" behavior="scroll" direction="right">
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الرَّحْمَنُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
    <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الرَّحِيمُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْمَلِكُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْقُدُّوسُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    السَّلاَمُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْمُؤْمِنُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْمُهَيْمِنُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْعَزِيزُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْجَبَّارُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْمُتَكَبِّر	
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْخَالِقُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْبَارِئُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْمُصَوِّرُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْغَفَّارُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْقَهَّارُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْوَهَّابُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الرَّزَّاقُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْفَتَّاحُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    اَلْعَلِيْمُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْقَابِضُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْبَاسِطُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْخَافِضُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الرَّافِعُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْمُعِزُّ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    ٱلْمُذِلُّ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    السَّمِيعُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْبَصِيرُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْحَكَمُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4">
    الْعَدْلُ
</a>
<a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    اللَّطِيفُ
</a><a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْخَبِيرُ
</a><a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْحَلِيمُ
</a><a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْعَظِيمُ
</a><a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْغَفُور
</a><a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الشَّكُورُ
</a><a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْعَلِيُّ
</a><a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْكَبِيرُ
</a><a href="#" class="text-warning fs-4 p-2 text-decoration-none">
    
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْحَفِيظُ
</a><a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    المُقيِت
</a><a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْحسِيبُ
</a><a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْجَلِيلُ
</a><a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْكَرِيمُ
</a><a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الرَّقِيبُ
</a><a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    ٱلْمُجِيبُ
</a><a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْوَاسِعُ  
</a><a href="#" class="text-warning fs-4 p-2 text-decoration-none">
        <i class="fa-regular fa-circle text-warning"></i>
</a>
<a href="#" class="text-warning fs-4 px-4 text-decoration-none">
    الْحَكِيمُ
</a>

        </marquee>
    </div>
</div>
            </div>
        </div>
<?php } ?>
        
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
    <div class="row mb-5">
<div class="whts">
    <a href="https://wa.me/923357963004?text=Help Line No: 923357963004 - Timing: 11:00 AM to 05:00 PM" target="_blank">
        <img src="logo/whats.webp" class="img-fluid">
    </a>
</div>
<!---Start Dashboard----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="javascript:void()" onclick="location.href='dashboard'" class="nav-link box">            
    <img src="icons/dash.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white fs-6">dashbaord</h6>
    </div>
</a>
            </div>
        </div>
<!---End Dashboard----->
<!---Start Inquiry----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#add-inquiry">            
    <img src="icons/inquiry.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white fs-6">add inquiry</h6>
    </div>
</a>
            </div>
        </div>
<!---End Inquiry----->
<!---Start Inquiry Manager----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#inquiry-manager">            
    <img src="icons/inquiry-manager.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white fs-6">inquiry Manager</h6>
    </div>
</a>
            </div>
        </div>
<!---End Inquiry Manager----->
<!---Start Students----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#add-students">            
    <img src="icons/students.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white fs-6">add Students</h6>
    </div>
</a>
            </div>
        </div>
<!---End Students----->
<!---Start Students Manager----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#student-manager">            
    <img src="icons/student-manager.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">Student Manager</h6>
    </div>
</a>
            </div>
        </div>
<!---End Students Manager----->
<!---Start Staff----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="javascript:void()" onclick="location.href='add-staffs'" class="nav-link box">            
    <img src="icons/staff.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">add staff</h6>
    </div>
</a>
            </div>
        </div>
<!---End Staff----->
<!---Start Staff----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#staff-manager">            
    <img src="icons/staff-manager.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">staff manager</h6>
    </div>
</a>
            </div>
        </div>
<!---End Staff----->
<!---Start Attendance----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#attendance">
    <img src="icons/attendance.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">attendance</h6>
    </div>
</a>
            </div>
        </div>
<!---End Attendance----->
<!---Start Attendance Manager----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#attendance-manager">            
    <img src="icons/attendance-manager.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">attendance manager</h6>
    </div>
</a>
            </div>
        </div>
<!---End Attendance Manager----->
<!---Start Fees Manager ---->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#addfee">            
    <img src="icons/fees.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">add fee</h6>
    </div>
</a>
            </div>
        </div>
<!----- End collection Manager----->
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
<!---Start Academics----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#academics">            
    <img src="icons/academics.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">academics</h6>
    </div>
</a>
            </div>
        </div>
<!---End Academics----->
<!---Start Academics Manager----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#acad-manager">            
    <img src="icons/academic-manager.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">academic manager</h6>
    </div>
</a>
            </div>
        </div>
<!---End Academics----->
<!---Start Exames----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#exames">            
    <img src="icons/exames.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">exames</h6>
    </div>
</a>
            </div>
        </div>
<!---End Exames----->
<!---Start Exames Manager----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#exame-manager">            
    <img src="icons/exameManager.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">exame manager</h6>
    </div>
</a>
            </div>
        </div>
<!---End Exames Manager----->
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
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#account-manager">            
    <img src="icons/account-manager.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">accounts manager</h6>
    </div>
</a>
            </div>
        </div>
<!---End Accounts----->
<!---Start Settings----->
<?php if($email == "demoadmin@gmail.com"){ }else{ ?>
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#settings">            
    <img src="icons/settings.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">settings</h6>
    </div>
</a>
            </div>
        </div>
<?php } ?>
<!---End Settings----->
<!---Start Preiod Bell----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#period">            
    <img src="icons/period.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">Period Bell</h6>
    </div>
</a>
            </div>
        </div>
<!---End Period Bell----->
<!---Start E-Certificate----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#e-certificates">            
    <img src="icons/certificate.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">e-certificates</h6>
    </div>
</a>
            </div>
        </div>
<!---End E-Certificate----->
<!---Start Assign Role----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#assignrols">            
    <img src="icons/role.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">assign role</h6>
    </div>
</a>
            </div>
        </div>
<!---End Assign Role----->
<!---Start stock----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#stock">            
    <img src="icons/stock.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">inventory</h6>
    </div>
</a>
            </div>
        </div>
<!---End stock----->
<!---Start reminder----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="javascript:void()" onclick="location.href='reminders'" class="nav-link box">            
    <img src="icons/reminder.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">reminder</h6>
    </div>
</a>
            </div>
        </div>
<!---End reminder----->
<!---Start call log----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="javascript:void()" onclick="location.href='call-log'" class="nav-link box">            
    <img src="icons/call-log.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">call log</h6>
    </div>
</a>
            </div>
        </div>
<!---End call log----->
<!---Start student portal----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#studentportal">            
    <img src="icons/student-portal.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">student portal</h6>
    </div>
</a>
            </div>
        </div>
<!---End student portal----->
<!---Start teacher portal----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#teacherportal">            
    <img src="icons/teacher-portal.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">teacher portal</h6>
    </div>
</a>
            </div>
        </div>
<!---End teacher portal----->
<!---Start SMS----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#mesge">            
    <img src="icons/sms.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">SMS</h6>
    </div>
</a>
            </div>
        </div>
<!---End SMS----->
<!---Start E-Services----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="#" class="nav-link box" data-bs-toggle="modal" data-bs-target="#e-services">            
    <img src="icons/services.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">e-services</h6>
    </div>
</a>
            </div>
        </div>
<!---End E-Services----->
<!---Start E-Services----->
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center px-4 py-2 cards">
<a href="javascript:void()" onclick="location.href='social-posts'" class="nav-link box">            
    <img src="icons/socl.webp" class="card-img-top">
    <div class="card-body">
        <h6 class="text-uppercase text-white">Social Post</h6>
    </div>
</a>
            </div>
        </div>
<!---End E-Services----->
    </div>
<?php
 }else{
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