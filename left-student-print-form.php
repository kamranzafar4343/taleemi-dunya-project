<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#inquiry-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='left-students-manager'"> left student manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> student admission form</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<style>
.table, table, .table-responsive, .table-responsive tr, .table tr, .table tr th, .table tr td{
    border:none !important;
    border-bottom:none !important;
    box-shadow:none !important;
    text-transform:capitalize;
}
</style>
<br>
<?php
if(isset($_GET['id'])){
    
    $ids = $_GET['id'];
    
$sl_rsl = mysqli_query($con,"select * from leftStudents where instituteId='$userId' && id='$ids'");
$frm = mysqli_fetch_assoc($sl_rsl);

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
    $phone = $frm['phone'];
    $living = $frm['living'];
    $homeAddress = $frm['homeAddress'];
    $city = $frm['city'];
    $district = $frm['district'];
    $town = $frm['town'];
    $fatherName = $frm['fatherName'];
    $cnic = $frm['cnic'];
    $frmcell = $frm['cell'];
    $whatsapp = $frm['whatsapp'];
    $occupation = $frm['occupation'];
    $qualification = $frm['qualification'];
    $facebook = $frm['facebook'];
    $gmail = $frm['gmail'];
    if(!empty($frm['admissionFee'])){ $admissionFee = $frm['admissionFee']; }else{ "0"; } 
    if(!empty($frm['annualFund'])){ $annualFund = $frm['annualFund']; }else{ "0"; }
    if(!empty($frm['monthlyFee'])){ $monthlyFee = $frm['monthlyFee']; }else{ "0"; }
    if(!empty($frm['testFund'])){ $testFund = $frm['testFund']; }else{ "0"; }
    if(!empty($frm['others'])){ $others = $frm['others']; }else{ "0"; }
    $totalCharges = $admissionFee+$annualFund+$monthlyFee+$testFund+$others;
    $remarks = $frm['remarks'];
}
?>
<div class="container-fluid mt-4">
    
    <div class="row" id="bodies mt-3">
        <div class="col datas">
<div class="row">
    <div class="col mt-3">
<table class="table table-responsive table-striped w-100 bg-white">
    <tr align="center">
        <th width="100">
<img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid">
        </th>
        <th>
            <h4 class="fs-4 fw-bold text-uppercase"><?php echo $instituteName; ?></h4>
            <div class="text-center text-capitalize fw-bold">Cell: <span class="fw-normal"><?php echo $cell; ?></span></div>
            <div class="text-center text-capitalize fw-bold">address: <span class="fw-normal"><?php echo $mainaddress; ?></span></div>
        </th>
        <th width="100">
<img src="student_imgs/<?php echo $frmimage; ?>" class="img-fluid">
        </th>
    </tr>
    <tr align="center">
        <th colspan="3" class="text-uppercase fw-bold fs-6">admission form</th>
    </tr>
</table>
<table class="table table-responsive w-100 bg-white">
    <tr>
        <th colspan="6" class="text-capitalize">personal information</th>
    </tr>
    <tr>
        <th>A.D:</th>
        <td><?php echo $admissionDate; ?></td>
        <th>Roll No:</th>
        <td><?php echo $roll_num; ?></td>
        <th>Class:</th>
        <td class="text-uppercase"><?php echo $class; ?></td>
    </tr>
    <tr>
        <th>Section:</th>
        <td class="text-capitalize"><?php echo $section; ?></td>
        <th>Medium:</th>
        <td class="text-capitalize"><?php echo $medium; ?></td>
        <th>Session:</th>
        <td><?php echo $session; ?></td>
    </tr>
    <tr>
        <th>Student Name:</th>
        <td><?php echo $studentName; ?></td>
        <th>Bay Form No:</th>
        <td><?php echo $bForm; ?></td>
        <th>Gender:</th>
        <td class="text-capitalize"><?php echo $gender; ?></td>
    </tr>
    <tr>
        
        <th>Date of Birth:</th>
        <td><?php echo $dateOfBirth; ?></td>
        <th>Religion:</th>
        <td class="text-capitalize"><?php echo $religion; ?></td>
        <th>Home Phone:</th>
        <td><?php echo $phone; ?></td>
    </tr>
    <tr>
        <th>Living With:</th>
        <td><?php echo $living; ?></td>
        <th>Address:</th>
        <td class="text-capitalize"><?php echo $homeAddress; ?></td>
        <th>City:</th>
        <td class="text-capitalize"><?php echo $city; ?></td>
    </tr>
    <tr>
        <th>District:</th>
        <td class="text-capitalize"><?php echo $district; ?></td>
        <th>Town:</th>
        <td class="text-capitalize"><?php echo $town; ?></td>
        <th></th>
        <td></td>
    </tr>
    <tr>
        <th colspan="6" class="text-capitalize">Father / Guardian Detail</th>
    </tr>
    <tr>
        <th>Father Name:</th>
        <td><?php echo $fatherName; ?></td>
        <th>CNIC:</th>
        <td><?php echo $cnic; ?></td>
        <th>Cell:</th>
        <td><?php echo $frmcell; ?></td>
    </tr>
    <tr>
        <th>Whatsapp:</th>
        <td><?php echo $whatsapp; ?></td>
        <th>Occupation:</th>
        <td><?php echo $occupation; ?></td>
        <th>Qualification:</th>
        <td><?php echo $qualification; ?></td>
    </tr>
    <tr>
        <th>Gmail:</th>
        <td><?php echo $gmail; ?></td>
        <th>Facebook:</th>
        <td><?php echo $facebook; ?></td>
        <th></th>
        <td></td>
    </tr>
    <tr>
        <th colspan="6" class="text-capitalize">Fee Structure</th>
    </tr>
    <tr>
        <th>Admission Fee:</th>
        <td><?php echo $admissionFee; ?></td>
        <th>Annual Fund:</th>
        <td><?php echo $annualFund; ?></td>
        <th>Monthly Fee:</th>
        <td><?php echo $monthlyFee; ?></td>
    </tr>
    <tr>
        <th>Test Fund:</th>
        <td><?php echo $testFund; ?></td>
        <th>Others:</th>
        <td><?php echo $others; ?></td>
        <th>Total Amount:</th>
        <td><?php echo $totalCharges; ?></td>
    </tr>
    <tr>
        <th colspan="6"><?php echo $remarks; ?></th>
    </tr>
    <tr>
        <th colspan="3">Admission Incharge: ____________________</th>
        <th colspan="3">Principal Signature: ____________________</th>
    </tr>
    
</table>
    </div>

</div>
        </div>
    </div>
<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
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