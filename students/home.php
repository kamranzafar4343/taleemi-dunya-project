<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("profile.php"); require_once("lib/attendance.php");
require_once("lib/fee.php"); require_once("lib/examination.php"); require_once("lib/time-table.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3 text-center">
<?php
$sl_inst = mysqli_query($con,"select * from confirmSchools where institute_id='$instituteId'");
if(mysqli_num_rows($sl_inst)>0){
    $rst = mysqli_fetch_assoc($sl_inst);
$institute_name = $rst['institute_name'];
$campus = $rst['campus'];
$logo = $rst['logo'];
}else{ echo "<div class='text-capitalize'>update your school profile!</div>"; }
?>
<div class="text-center mb-3">
    <img src="../portal-admins/institute-logos/<?php echo $logo; ?>" class="img-fluid" style="width:120px;height:120px;border-radius:50%;border:1px solid hsla(36, 100%, 46%);">
</div>
<h2 class="fs-2 fw-bold text-center text-uppercase text-white"><?php echo $institute_name; ?></h2>
<h6 class="fs-6 fw-bold text-center text-capitalize text-warning">student portal</h6>
        </div>
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
    <div class="row">
<!---Start Profile----->
        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center p-2 cards">
<a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#profile">            
    <img src="../icons/students.webp" class="card-img-top">
    <div class="card-body">
        <div class="text-capitalize text-white" style="font-size:0.9rem;">Profile</div>
    </div>
</a>
            </div>
        </div>
<!---End Profile----->
<!---Start SMS----->
        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center p-2 cards">
<a href="javascript:void()" onclick="location.href='app-sms'" class="nav-link">            
    <img src="../icons/sms.webp" class="card-img-top">
    <div class="card-body">
        <div class="text-capitalize text-white" style="font-size:0.9rem;">App SMS</div>
    </div>
</a>
            </div>
        </div>
<!---Start SMS----->
<!---Start Daily Diary----->
        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center p-2 cards">
<a href="#" class="nav-link">
    <img src="../icons/attendance.webp" class="card-img-top" data-bs-toggle="modal" data-bs-target="#atendnce">
    <div class="card-body">
        <div class="text-capitalize text-white" style="font-size:0.8rem;">attendance</div>
    </div>
</a>
            </div>
        </div>
<!---End Daily Diary----->
<!---Start Daily Diary----->
        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center p-2 cards">
<a href="javascript:void()" onclick="location.href='daily-diary'" class="nav-link">
    <img src="../icons/diary.webp" class="card-img-top">
    <div class="card-body">
        <div class="text-capitalize text-white" style="font-size:0.8rem;">Daily Diary</div>
    </div>
</a>
            </div>
        </div>
<!---End Daily Diary----->
<!---Start Syllabus----->
        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center p-2 cards">
<a href="javascript:void()" onclick="location.href='syllabus'" class="nav-link">            
    <img src="../icons/slybus.webp" class="card-img-top">
    <div class="card-body">
        <div class="text-capitalize text-white" style="font-size:0.9rem;">syllabus</div>
    </div>
</a>
            </div>
        </div>
<!---Start Syllabus----->
<!---Start Fee Record----->
        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center p-2 cards">
<a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#fees">            
    <img src="../icons/fee-manager.webp" class="card-img-top">
    <div class="card-body">
        <div class="text-capitalize text-white" style="font-size:0.8rem;">Fee Record</div>
    </div>
</a>
            </div>
        </div>
<!---End Fee Record----->
<!---Start Examination----->
        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center p-2 cards">
<a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#exmes">            
    <img src="../icons/exames.webp" class="card-img-top">
    <div class="card-body">
        <div class="text-capitalize text-white" style="font-size:0.75rem;">Examination</div>
    </div>
</a>
            </div>
        </div>
<!---End Examination----->
<!---Start Time Table----->
        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center p-2 cards">
<a href="#" data-bs-toggle="modal" data-bs-target="#tms" class="nav-link">            
    <img src="../icons/period.webp" class="card-img-top">
    <div class="card-body">
        <div class="text-capitalize text-white" style="font-size:0.8rem;">Time Table</div>
    </div>
</a>
            </div>
        </div>
<!---End Time Table----->
<!---Start Gallery----->
        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center p-2 cards">
<a href="javascript:void()" onclick="location.href='gallery'" class="nav-link">            
    <img src="../icons/gallerys.webp" class="card-img-top">
    <div class="card-body">
        <div class="text-capitalize text-white" style="font-size:0.9rem;">Gallery</div>
    </div>
</a>
            </div>
        </div>
<!---End Gallery----->
<!---Start Staff----->
        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center p-2 cards">
<a href="javascript:void()" onclick="location.href='video-lectures'" class="nav-link">            
    <img src="../icons/lms.webp" class="card-img-top">
    <div class="card-body">
        <div class="text-capitalize text-white" style="font-size:0.9rem;">LMS</div>
    </div>
</a>
            </div>
        </div>
<!---End Staff----->


<!---Start Challan Manager----->
        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center p-2 cards">
<a href="javascript:void()" onclick="location.href='birthday-card'" class="nav-link">            
    <img src="../icons/birthday.webp" class="card-img-top">
    <div class="card-body">
        <div class="text-capitalize text-white" style="font-size:0.9rem;">Birthday</div>
    </div>
</a>
            </div>
        </div>
<!---End Challan Manager----->

<!---Start Notices----->
        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <div class="card mb-3 text-center p-2 cards">
<a href="javascript:void()" onclick="location.href='notices'" class="nav-link">            
    <img src="../icons/mesge.webp" class="card-img-top">
    <div class="card-body">
        <div class="text-capitalize text-white" style="font-size:0.9rem;">notices</div>
    </div>
</a>
            </div>
        </div>
<!---Start Notices----->
        
    </div>

</div>


    </div>
</div>
<?php require_once("source/foot-section.php"); ?>