<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#studentportal"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='lms-status'">lms status</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> LMS Receipt</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
<?php
if(isset($_GET['id'])){
    $stuid = $_GET['id'];
    $stqry = mysqli_query($con,"select * from addStudents where instituteId='$userId' && id='$stuid'");
    $stdnt=mysqli_fetch_assoc($stqry);
    $admissionDate = $stdnt['admissionDate'];
    $familyId = $stdnt['familyId'];
    $roll_num = $stdnt['roll_num'];
    $class = $stdnt['class'];
    $section = $stdnt['section'];
    $medium = $stdnt['medium'];
    $session = $stdnt['session'];
    $stud_image = $stdnt['image'];
    $studentName = $stdnt['studentName'];
    $fatherName = $stdnt['fatherName'];
    $bForm = $stdnt['bForm'];
    
}

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
    <div class="row datas">
        <div class="col-12">
            <div class="card" style="border:none;">
<table class="w-100 bg-apna-body">
    <tr>
        <th width="50"><img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid"></th>
        <th colspan="4">
            <h3 class="text-center fs-3 fw-bold m-0">
                <?php echo $instituteName; ?>
            </h3>
            <div class="text-center mb-3"><?php echo $campus; ?></div>
        </th>
        <th width="50"><img src="student_imgs/<?php echo $stud_image; ?>" class="img-fluid"></th>
    </tr>
    <tr>
        <th class="text-center pb-3" colspan="6"><span class="px-4 py-1 text-uppercase" style="border:1px solid black;">Student portal slip</span></th>
    </tr>
</table>
<table class="w-100 bg-apna-body">
    <tr>
        <th>Student Name</th>
        <td class="text-capitalize"><?php echo $studentName; ?></td>
        <th>Father Name</th>
        <td class="text-capitalize"><?php echo $fatherName; ?></td>
        <th>Family#</th>
        <td><?php echo $familyId; ?></td>
    </tr>
    <tr>
        <th>Roll#</th>
        <td><?php echo $roll_num; ?></td>
        <th>Class/Sec</th>
        <td class="text-capitalize"><?php echo $class_name." (".$section.")"; ?></td>
        <th>Session</th>
        <td><?php echo $session; ?></td>
    </tr>
    <tr>
        <td colspan="6" style="font-size:16px;">
            <br>
            <b>Respected Parent's:</b><br><br>
            Your Child LMS Portal activated now. You can get all official alerts (SMS,Daily Diary, Attendance, Fee Record, Exame Reports, Syllabus etc) on Student Portal.<br><br>
            Login Now and Stay Updated.
            Thank You!<br><br>
        </td>
    </tr>
    <tr align="right">
        <td colspan="3" class="fs-5" align="left">
            <b class="fs-5">Username:</b> <?php echo $bForm; ?>
            <b class="fs-5">Password:</b> <?php echo $roll_num; ?>
        </td>
        <th colspan="3">____________________<br><b>Signature/Stamp</b></th>
    </tr>
    <tr>
        <td colspan="6" style="border:1px solid black;" class="p-2">
<b>Address:</b> <?php echo $mainaddress; ?> <b>Cell:</b> <?php echo $cell; ?>
        </td>
    </tr>
</table>
<hr style="border:2px dashed black;">
            </div>
        </div>
    </div>
    <div class="row">
<div class="col-12 mb-3" align="right">
    <button class='btn btn-primary text-capitalize' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
</div>
</div>
<?php require_once("source/foot-section.php"); ?>
<script type="text/javascript">
$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>