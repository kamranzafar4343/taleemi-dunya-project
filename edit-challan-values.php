<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<?php
if(isset($_GET['id'])){
    
$ids = $_GET['id'];

$sel_fee = mysqli_query($con,"select * from fee_collection where id='$ids' && instituteId='$userId'");
$count = mysqli_num_rows($sel_fee);
if($count == 0){ echo "<div class='alert alert-danger text-uppercase'>there are no fee record against this roll number.</div>"; }
$rows=mysqli_fetch_assoc($sel_fee);
    
$feid = $rows['id'];
$instituteId = $rows['instituteId'];
$student_imgs = $rows['student_imgs'];
$rollno = $rows['rollno'];
$session = $rows['session'];
$student_name = $rows['student_name'];
$father_name = $rows['father_name'];
$class = $rows['class'];
$section = $rows['section'];
$monthly_fee = $rows['monthly_fee'];
$discounts = $rows['discounts'];
$fine = $rows['fine'];
$previous_balance = $rows['previous_balance'];
$total_amount = $rows['total_amount'];
$receive_monthly = $rows['receive_monthly'];
$remaing_balance = $rows['remaing_balance'];
$fees_status = $rows['fees_status'];
$month = $rows['month'];
$monthName = date("F", mktime(0, 0, 0, $month, 10));
$dates = $rows['dates'];
}
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<div class="container-fluid mb-3">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#clection"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='challan-manager'"> challan manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Edit Challan Form</li>
  </ol>
</nav>    
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
<form class="colctFrm">
<div class="input-group mb-4">
    <input type="hidden" id="institue" class="form-control" required value="<?php echo $userId; ?>">
    <input type="hidden" id="usrid" class="form-control" required value="<?php echo $feid; ?>">
</div>
</form>
        </div>
    </div>
</div>
<div class="paid-form"></div>
<br><br>
<?php require_once("source/foot-section.php"); ?>
<script>
function collectionForm(){
    var institue = $("#institue").val();
    var usrid = $("#usrid").val();
$.ajax({
    url: 'ajax/edit-collection-monthly-challan.php',
    type: "POST",
    data: {ins_ids:institue,st_ieds:usrid},
    success: function(problems){
$(".paid-form").html(problems);
    }
});
}
collectionForm();
</script>