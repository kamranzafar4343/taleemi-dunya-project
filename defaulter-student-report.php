<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> defaulter student report</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col datas">
<table class="table table-responsive table-striped w-100 bg-white">
    <tr align="center">
        <th width="100">
<img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid">
        </th>
        <th colspan="10">
<h4 class="text-uppercase fs-4 fw-bold"><?php echo $instituteName; ?></h4>
<div class="text-capitalize">phone: <span class="fw-normal"><?php echo $mainphones; ?></span>&nbsp; cell: <span class="fw-normal"><?php echo $cell; ?></span> </div>
<div class="text-capitalize">address: <span class="fw-normal"><?php echo $mainaddress; ?></span> </div>
        </th>
    </tr>
    <tr align="center">
        <th>Sr.No</th>
        <th>Roll No#</th>
        <th>Image</th>
        <th>Student Name</th>
        <th>Father Name</th>
        <th>Class</th>
        <th>Section</th>
        <th>Session</th>
        <th>Fee</th>
        <th>Status</th>
        <th>Month</th>
    </tr>

<form method="post" enctype="multipart/form-data">
<?php    
$b = 1;

$mnths = date("m");
$sl_stud = mysqli_query($con,"select * from fee_collection where instituteId='$userId' && month='$mnths' && fees_status='Unpaid' order by id desc");
$counts = mysqli_num_rows($sl_stud);
if($counts == 0){ echo "<div class='fs-6 text-capitalize text-white'>there are no record here.</div>"; }
while($b <= 100000 && $rows = mysqli_fetch_array($sl_stud)){
$studntid = $rows['id'];
$student_imgs = $rows['student_imgs'];
$familyId = $rows['familyId'];
$rollno = $rows['rollno'];
$session = $rows['session'];
$student_name = $rows['student_name'];
$father_name = $rows['father_name'];
$class = $rows['class'];
$section = $rows['section'];
$session = $rows['session'];
$monthly_fee = $rows['monthly_fee'];
$fees_status = $rows['fees_status'];
$month = $rows['month'];
?>
<tr align="center">
    <td><?php echo $b++; ?></td>
    <td><?php echo $rollno; ?></td>
<?php if(!empty($student_imgs)){ ?>
    <td width="50"><img src="student_imgs/<?php echo $student_imgs; ?>" class="img-fluid"></td>
<?php }else{ ?>
    <td width="50"><img src="student_imgs/users.jpg" class="img-fluid"></td>
<?php } ?>
    <td><?php echo $student_name; ?></td>
    <td><?php echo $father_name; ?></td>
    <td><?php echo $class; ?></td>
    <td><?php echo $section; ?></td>
    <td><?php echo $session; ?></td>
    <td><?php echo $monthly_fee; ?></td>
    <td><?php echo $fees_status; ?></td>
    <td><?php echo $month; ?></td>
    <input type="hidden" value="<?php echo $userId; ?>" name="inst_id">
</tr>
<?php } ?>

</table>

        </div>
    </div> 
<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
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
</div>
<?php require_once("source/foot-section.php"); ?>