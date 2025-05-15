<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid mb-3">
    <div class="row">
<?php
if(isset($_GET['rolid'])){
    $rolsnbr = $_GET['rolid'];
    $sel_rol = mysqli_query($con,"select * from attandance where instituteId='$userId' && roll_no='$rolsnbr'");
    $reslts = mysqli_fetch_assoc($sel_rol);
    $student_imgs = $reslts['student_img'];
    $rollno = $reslts['roll_no'];
    $session = $reslts['session'];
    $student_name = $reslts['stu_name'];
    $father_name = $reslts['father_name'];
    $class = $reslts['class'];
    $section = $reslts['section'];
    $status = $reslts['status'];
    $date = $reslts['date'];
    $month = $reslts['month'];
    $monthName = date("F", mktime(0, 0, 0, $month, 10));
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
}
?>
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='dashboard'"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> <?php echo $student_name; ?> Attendance Report</li>
  </ol>
</nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
<div class="col-12">
    <table class="table table-responsive w-100">
        <thead>
            <tr style="background-color:hsl(35,100%,60%);" align="center">
                <th width="50">
<img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid">
                </th>
                <th colspan="4">
<h3 class="text-uppercase fs-3 fw-bolder"><?php echo $instituteName; ?></h3>
<h6 class="text-uppercase fs-6"><?php echo $campus; ?></h6>
                </th>
                <th width="50">
<img src="student_imgs/<?php echo $student_imgs; ?>" class="img-fluid">
                </th>
            </tr>
            <tr align="center" class="bg-apna">
                <th style="border:1px solid hsl(28,100%,50%);" colspan="6" class="text-capitalize"><?php echo $student_name; ?> Attendance Report <?php echo $session; ?></th>
            </tr>
            <tr style="background-color:hsl(35,100%,70%);">
                <th style="border:1px solid hsl(28,100%,50%);">St.Name</th>
                <td class="text-capitalize" style="border:1px solid hsl(28,100%,50%);"><?php echo $student_name; ?></td>
                <th style="border:1px solid hsl(28,100%,50%);">F.Name</th>
                <td class="text-capitalize" style="border:1px solid hsl(28,100%,50%);"><?php echo $father_name; ?></td>
                <th style="border:1px solid hsl(28,100%,50%);">Roll #</th>
                <td style="border:1px solid hsl(28,100%,50%);"><?php echo $rollno; ?></td>
            </tr>
            <tr style="background-color:hsl(35,100%,70%);">
                <th style="border:1px solid hsl(28,100%,50%);">Class</th>
                <td class="text-capitalize" style="border:1px solid hsl(28,100%,50%);"><?php echo $class_name; ?></td>
                <th style="border:1px solid hsl(28,100%,50%);">Section</th>
                <td class="text-capitalize" style="border:1px solid hsl(28,100%,50%);"><?php echo $section; ?></td>
                <th style="border:1px solid hsl(28,100%,50%);">Month</th>
                <td class="text-capitalize" style="border:1px solid hsl(28,100%,50%);"><?php echo $monthName; ?></td>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-apna">
                <th style="border:1px solid hsl(28,100%,50%);" class="text-capitalize">Sr#</th>
                <th style="border:1px solid hsl(28,100%,50%);" class="text-capitalize">Date</th>
                <th style="border:1px solid hsl(28,100%,50%);" class="text-capitalize">status</th>
                <th style="border:1px solid hsl(28,100%,50%);" class="text-capitalize">month</th>
                <th style="border:1px solid hsl(28,100%,50%);" class="text-capitalize">time</th>
                <th style="border:1px solid hsl(28,100%,50%);" class="text-capitalize">Del</th>
            </tr>
<?php
$mnths = date("m");
$sesins = date("Y");
$ea = 1;
$sel_rols = mysqli_query($con,"select * from attandance where instituteId='$userId' && roll_no='$rolsnbr' && month='$mnths' && session='$sesins' order by id desc");
if(mysqli_num_rows($sel_rols)>0){
  while($ea <= 10000 && $results = mysqli_fetch_assoc($sel_rols)){
    $student_imgs = $results['student_img'];
    $rollno = $results['roll_no'];
    $session = $results['session'];
    $student_name = $results['stu_name'];
    $father_name = $results['father_name'];
    $class = $results['class'];
    $section = $results['section'];
    $status = $results['status'];
    $date = $results['date'];
    $att_time = $results['att_time'];
    $month = $results['month'];
    $monthName = date("F", mktime(0, 0, 0, $month, 10));
?>
<tr style="background-color:hsl(35,100%,80%);">
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $ea++; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $date; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $status; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $monthName; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $att_time; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><a href="#"><i class="fa fa-trash-alt text-danger"></i></a></td>
</tr>
<?php } 
}else{
    echo "<div class='alert alert-danger p-2'>There are no Record Found!</div>";
}
?>
        </tbody>
    </table>
</div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>