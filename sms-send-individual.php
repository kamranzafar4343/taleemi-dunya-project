<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> individual app SMS</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<style>
.table, table, .table-responsive, .table tr, .table tr th, .table tr td{
    border:none;
    border-bottom:none;
    box-shadow:none;
}
</style>
<?php
if(isset($_GET['id'])){
    
    $ids = $_GET['id'];
    
$sl_rsl = mysqli_query($con,"select * from addStudents where instituteId='$userId' && id='$ids'");
$frm = mysqli_fetch_assoc($sl_rsl);

    $instituteId = $frm['instituteId'];
    $admissionDate = $frm['admissionDate'];
    $inquiryId = $frm['inquiryId'];
    $roll_num = $frm['roll_num'];
    $class = $frm['class'];
    $section = $frm['section'];
    $medium = $frm['medium'];
    $session = $frm['session'];
    $frmimage = $frm['image'];
    $studentName = $frm['studentName'];
    $bForm = $frm['bForm'];
    $gender = $frm['gender'];
    $dateOfBirth = $frm['dateOfBirth'];
    $religion = $frm['religion'];
    $frmphoness = $frm['phone'];
    $living = $frm['living'];
    $homeAddress = $frm['homeAddress'];
    $city = $frm['city'];
    $district = $frm['district'];
    $town = $frm['town'];
    $fatherName = $frm['fatherName'];
    $cnic = $frm['cnic'];
    $frmcells = $frm['cell'];
    $whatsapp = $frm['whatsapp'];
    $occupation = $frm['occupation'];
    $qualification = $frm['qualification'];
    $facebook = $frm['facebook'];
    $gmail = $frm['gmail'];
    $remarks = $frm['remarks'];
}
?>
<div class="container-fluid">
<div class="row">
    <div class="col-12 mb-3">
        <input type="hidden" class="form-control" id="phones" value="<?php echo $cell; ?>">
<label class="text-capitalize">Message</label>
<textarea class="form-control" rows="20" placeholder="Write Message....." id="conts"></textarea>  
    </div>
    <div class="col-12" align="right">
<button type="button" onclick="whatsappSend()" class="btn btn-success text-capitalize"><i class="fa-brands fa-whatsapp"></i> Send on Whatsapp</button>
    </div>
</div>
<script>
function whatsappSend(){

var phnes = document.getElementById("phones").value;
var conteing = document.getElementById("conts").value;
 
var url = "https://wa.me/"+phnes+"?text=%20"+conteing;
 
window.open(url,'_blank').focus();
}
</script>
</div>
<?php require_once("source/foot-section.php"); ?>