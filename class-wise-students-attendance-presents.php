<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); 
if(isset($_GET['instid'])){
    
    $instid = $_GET['instid'];
    $cles = $_GET['cles'];
    $sectn = $_GET['sectn'];
    $sesin = $_GET['sesin'];
    $dates = $_GET['dates'];

}
?>

<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#attendance-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='today-attendance'"> today attendance</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> class wise student presents attendance report</li>
  </ol>
</nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12" align="right">
<div class="input-group" align="right">
    <a href="student-lists-contact?id=<?php echo $instid; ?> && cls=<?php echo $cles; ?> && sectin=<?php echo $sectn; ?> && sesin=<?php echo $sesin; ?> && dts=<?php echo $dates; ?>" target="_blank" class='btn btn-success text-uppercase'><i class="fa-solid fa-file-excel"></i> Excel</a>
    <a href="presents-students-record?id=<?php echo $instid; ?> && cls=<?php echo $cles; ?> && sectin=<?php echo $sectn; ?> && sesin=<?php echo $sesin; ?> && dts=<?php echo $dates; ?>" target="_blank" class='btn btn-danger text-uppercase'>
        <i class="fa-solid fa-file-pdf"></i> PDF
    </a>
    <button class='btn btn-apna text-uppercase' id="btn_print"><i class="fa fa-print"></i> Print</button>
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
<br><br>
        <div class="col datas">
<table class="table table-reponsive w-100" style='background:hsl(35, 100%, 80%);'>
    <thead>
        <tr>
            <th style='border:1px solid hsl(25, 100%, 50%);' width="40">
                <img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid">
            </th>
            <th style='border:1px solid hsl(25, 100%, 50%);' width="40" colspan="8">
                <h4 class="fs-4 fw-bold text-uppercase text-center"><?php echo $instituteName; ?></h4>
                <h6 class="fs-6 text-uppercase text-center"><?php echo $campus; ?></h6>
            </th>
        </tr>
        <tr align="center">
            <th colspan="10" class="fs-5">Student Attendance Present Report <?php echo $dates; ?></th>
        </tr>
        <tr>
            <th style='border:1px solid hsl(25, 100%, 50%);'>Sr#</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>Roll#</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>Student Name</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>Father Name</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>Class</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>Section</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>Session</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>Status</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>Whatsapp</th>
        </tr>
    </thead>
    <tbody>
<?php
$at=1;
$sl_attendance = mysqli_query($con,"select * from attandance where instituteId='$instid' && class='$cles' && section='$sectn' && session='$sesin' && date='$dates' && status='P'");
while($at <= 100000 && $result = mysqli_fetch_array($sl_attendance)){
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
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instid' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
        <tr>
            <th style='border:1px solid hsl(25, 100%, 50%);'><?php echo $at++; ?></th>
            <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $roll_no; ?></td>
            <td style='border:1px solid hsl(25, 100%, 50%);' class="text-capitalize"><?php echo $stu_name; ?></td>
            <td style='border:1px solid hsl(25, 100%, 50%);' class="text-capitalize"><?php echo $fatherName; ?></td>
            <td style='border:1px solid hsl(25, 100%, 50%);' class="text-uppercase"><?php echo $class_name; ?></td>
            <td style='border:1px solid hsl(25, 100%, 50%);' class="text-uppercase"><?php echo $section; ?></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $session; ?></td>
            <td style='border:1px solid hsl(25, 100%, 50%);' class="text-uppercase"><?php echo $status; ?></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'><a href="#" class="btn"><i class="fa-brands fa-whatsapp text-success"></i></a></td>
        </tr>
<?php } ?>
    </tbody>
</table>
        </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>