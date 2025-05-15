<?php
require_once("../functions/db.php");

$inst_id = $_POST['inst_id'];
$cless = $_POST['cless'];
$sectins = $_POST['sectins'];
$sesins = $_POST['sesins'];
$strt_dtes = $_POST['strt_dtes'];

$frmts = explode("-",$strt_dtes);
$dteg = $frmts['2'];
$dayname = date('D', strtotime($dteg));
$mt = $frmts['1'];
$monthName = date("M", mktime(0, 0, 0, $mt, 10));
$yr = $frmts['0'];

$aplydte = $dayname.",".$dteg.",".$monthName."-".$yr;

$sl_attendance = mysqli_query($con,"select * from attandance where instituteId='$inst_id' && class='$cless' && section='$sectins' && session='$sesins' && date='$strt_dtes'");
if(mysqli_num_rows($sl_attendance)>0){
while($result = mysqli_fetch_array($sl_attendance)){
    
    $instituteId = $result['instituteId'];
    $stu_name = $result['stu_name'];
    if(!empty($result['student_img'])>0){ $frmimage = $result['student_img']; }else{ $frmimage = "users.jpg"; }
    $fatherName = $result['father_name'];
    $class = $result['class'];
    $section = $result['section'];
    $session = $result['session'];
    $roll_no = $result['roll_no'];
    $status = $result['status'];
    $dates = $result['date'];
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_id' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];


$sl_att_totl = mysqli_query($con,"select * from attandance where instituteId='$inst_id' && class='$cless' && section='$sectins' && session='$sesins' && date='$strt_dtes'");
$cnt_totl = mysqli_num_rows($sl_att_totl);

$sl_att_p = mysqli_query($con,"select * from attandance where instituteId='$inst_id' && class='$cless' && section='$sectins' && session='$sesins' && date='$strt_dtes' && status='P'");
$cnt_p = mysqli_num_rows($sl_att_p);

$sl_att_a = mysqli_query($con,"select * from attandance where instituteId='$inst_id' && class='$cless' && section='$sectins' && session='$sesins' && date='$strt_dtes' && status='A'");
$cnt_a = mysqli_num_rows($sl_att_a);

$sl_att_l = mysqli_query($con,"select * from attandance where instituteId='$inst_id' && class='$cless' && section='$sectins' && session='$sesins' && date='$strt_dtes' && status='L'");
$cnt_l = mysqli_num_rows($sl_att_l);

$sl_att_h = mysqli_query($con,"select * from attandance where instituteId='$inst_id' && class='$cless' && section='$sectins' && session='$sesins' && date='$strt_dtes' && status='H'");
$cnt_h = mysqli_num_rows($sl_att_h);
    }
?>
<div class="row">
    <div class="col mb-3">
        <div class="card text-center">
            <a href="class-wise-students-attendance?instid=<?php echo $instituteId; ?> && cles=<?php echo $class; ?> && sectn=<?php echo $section; ?> && sesin=<?php echo $session; ?> && dates=<?php echo $dates; ?>" target="_blank" class="nav-links text-uppercase p-3 px-4" style="background-color:hsl(28,80%,40%);">
<h6 class="text-white"><?php echo $aplydte; ?></h6>
                Total Students
<h2 class="fs-2 fw-bold text-black"><?php echo $cnt_totl; ?></h2>
            </a>
        </div>  
    </div>
    <div class="col mb-3">
        <div class="card text-center">
            <a href="class-wise-students-attendance-presents?instid=<?php echo $instituteId; ?> && cles=<?php echo $class; ?> && sectn=<?php echo $section; ?> && sesin=<?php echo $session; ?> && dates=<?php echo $dates; ?>" target="_blank" class="nav-links text-uppercase p-3 px-4" style="background-color:hsl(28,80%,45%);">
<h6 class="text-white"><?php echo $aplydte; ?></h6>
                Presents
<h2 class="fs-2 fw-bold text-black"><?php echo $cnt_p; ?></h2>
            </a>
        </div>  
    </div>
    <div class="col mb-3">
        <div class="card text-center">
            <a href="class-wise-students-attendance-absents?instid=<?php echo $instituteId; ?> && cles=<?php echo $class; ?> && sectn=<?php echo $section; ?> && sesin=<?php echo $session; ?> && dates=<?php echo $dates; ?>" target="_blank" class="nav-links text-uppercase p-3 px-4" style="background-color:hsl(28,80%,50%);">
<h6 class="text-white"><?php echo $aplydte; ?></h6>
                absents
<h2 class="fs-2 fw-bold text-black"><?php echo $cnt_a; ?></h2>
            </a>
        </div>  
    </div>
    <div class="col mb-3">
        <div class="card text-center">
            <a href="class-wise-students-attendance-leaves?instid=<?php echo $instituteId; ?> && cles=<?php echo $class; ?> && sectn=<?php echo $section; ?> && sesin=<?php echo $session; ?> && dates=<?php echo $dates; ?>" target="_blank" class="nav-links text-uppercase p-3 px-4" style="background-color:hsl(28,80%,55%);">
<h6 class="text-white"><?php echo $aplydte; ?></h6>
                leaves
<h2 class="fs-2 fw-bold text-black"><?php echo $cnt_l; ?></h2>
            </a>
        </div>  
    </div>
    <div class="col mb-3">
        <div class="card text-center">
            <a href="class-wise-students-attendance-holiday?instid=<?php echo $instituteId; ?> && cles=<?php echo $class; ?> && sectn=<?php echo $section; ?> && sesin=<?php echo $session; ?> && dates=<?php echo $dates; ?>" target="_blank" class="nav-links text-uppercase p-3 px-4" style="background-color:hsl(28,80%,60%);">
<h6 class="text-white"><?php echo $aplydte; ?></h6>
                Holidays
<h2 class="fs-2 fw-bold text-black"><?php echo $cnt_h; ?></h2>
            </a>
        </div>  
    </div>
</div>
<?php
 }else{ 
?>
<div class="row">
    <div class="col mb-3">
        <div class="card text-center">
            <a href="#" class="nav-links text-uppercase p-3 px-4" style="background-color:hsl(28,80%,40%);" data-bs-toggle="modal" data-bs-target="#">
<h6 class="text-white"><?php echo $aplydte; ?></h6>
                Total Students
<h2 class="fs-2 fw-bold text-black"><?php echo "0"; ?></h2>
<div style="font-size:0.8rem;">Attendance not Marked!</div>
            </a>
        </div>  
    </div>
    <div class="col mb-3">
        <div class="card text-center">
            <a href="#" class="nav-links text-uppercase p-3 px-4" style="background-color:hsl(28,80%,45%);" data-bs-toggle="modal" data-bs-target="#">
<h6 class="text-white"><?php echo $aplydte; ?></h6>
                presents
<h2 class="fs-2 fw-bold text-black"><?php echo "0"; ?></h2>
<div style="font-size:0.8rem;">Attendance not Marked!</div>
            </a>
        </div>  
    </div>
    <div class="col mb-3">
        <div class="card text-center">
            <a href="#" class="nav-links text-uppercase p-3 px-4" style="background-color:hsl(28,80%,50%);" data-bs-toggle="modal" data-bs-target="#">
<h6 class="text-white"><?php echo $aplydte; ?></h6>
                absents
<h2 class="fs-2 fw-bold text-black"><?php echo "0"; ?></h2>
<div style="font-size:0.8rem;">Attendance not Marked!</div>
            </a>
        </div>  
    </div>
    <div class="col mb-3">
        <div class="card text-center">
            <a href="#" class="nav-links text-uppercase p-3 px-4" style="background-color:hsl(28,80%,55%);" data-bs-toggle="modal" data-bs-target="#">
<h6 class="text-white"><?php echo $aplydte; ?></h6>
                leaves
<h2 class="fs-2 fw-bold text-black"><?php echo "0"; ?></h2>
<div style="font-size:0.8rem;">Attendance not Marked!</div>
            </a>
        </div>  
    </div>
    <div class="col mb-3">
        <div class="card text-center">
            <a href="#" class="nav-links text-uppercase p-3 px-4" style="background-color:hsl(28,80%,60%);" data-bs-toggle="modal" data-bs-target="#">
<h6 class="text-white"><?php echo $aplydte; ?></h6>
                Holidays
<h2 class="fs-2 fw-bold text-black"><?php echo "0"; ?></h2>
<div style="font-size:0.8rem;">Attendance not Marked!</div>
            </a>
        </div>  
    </div>
</div> 
<?php } ?>