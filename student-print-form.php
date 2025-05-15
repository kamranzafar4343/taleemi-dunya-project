<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> student admission challan</li>
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
    if(!empty($frm['monthlyFee'])){ $monthlyFee = $frm['monthlyFee']; }else{ "0"; }
    if(!empty($frm['discount'])){ $discount = $frm['discount']; }else{ "0"; }
    if(!empty($frm['totalFee'])){ $totalFee = $frm['totalFee']; }else{ "0"; }
    if(!empty($frm['admissionFee'])){ $admissionFee = $frm['admissionFee']; }else{ "0"; } 
    if(!empty($frm['annualFund'])){ $annualFund = $frm['annualFund']; }else{ "0"; }
    if(!empty($frm['books'])){ $books = $frm['books']; }else{ "0"; }
    if(!empty($frm['uniform'])){ $uniform = $frm['uniform']; }else{ "0"; }
    if(!empty($frm['stationary'])){ $stationary = $frm['stationary']; }else{ "0"; }
    if(!empty($frm['others'])){ $others = $frm['others']; }else{ "0"; }
    if(!empty($frm['totalAmount'])){ $totalAmount = $frm['totalAmount']; }else{ "0"; }
    $totalCharges = $admissionFee+$annualFund+$monthlyFee+$testFund+$others;
    $remarks = $frm['remarks'];
}
$sl_cls = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$result = mysqli_fetch_assoc($sl_cls);
$class_name  = $result['class_name'];
$duration  = $result['duration'];
?>
<div class="container-fluid mt-4">
    
    <div class="row" id="bodies px-5">
        <div class="col datas px-4">
<div class="row">
    <div class="col p-3" style="border:8px double black;">
<table class="w-100" style='background:hsl(35, 100%, 80%);'>
    <tr align="center">
        <th width="80">
<img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid">
        </th>
        <th>
            <h4 class="fs-4 fw-bold text-uppercase"><?php echo $instituteName; ?></h4>
            <div class="text-center text-capitalize fw-bold">
                Cell: <span class="fw-normal"><?php echo $cell; ?></span>
                address: <span class="fw-normal"><?php echo $mainaddress; ?></span>
            </div>
        </th>
        <th width="80">
<img src="student_imgs/<?php echo $frmimage; ?>" class="img-fluid" style="width:100%;height:80px;overflow:hidden;">
        </th>
    </tr>
    <tr align="center">
        <th colspan="6" class="text-uppercase fw-bold fs-6">admission form</th>
    </tr>
</table>
<table class="table table-responsive table-striped w-100" style='background:hsl(35, 100%, 80%);'>
    <tr>
        <th colspan="6" class="text-capitalize">personal information</th>
    </tr>
    <tr>
        <th>A.D</th>
        <th>Medium</th>
        <th>Session</th>
        <th>Roll No</th>
        <th colspan="2">Class</th>
    </tr>
    <tr>
        <td>
            <input class="form-control" readonly value="<?php echo $admissionDate; ?>" style="font-size:0.8rem;">
        </td>
        <td class="text-capitalize">
            <input class="form-control" readonly value="<?php echo $medium; ?>">
        </td>
        <td>
            <input class="form-control" readonly value="<?php echo $session; ?>">
        </td>
        <td>
            <input class="form-control" readonly value="<?php echo $roll_num; ?>">
        </td>
        <td class="text-uppercase" colspan="2">
            <input class="form-control" readonly value="<?php echo $class_name; ?>">
        </td>
    </tr>
    <tr>
        <th>Section</th>
        <th colspan="2">Student Name</th>
        <th colspan="2">BayForm#</th>
        <th>Gender</th>
    </tr>
    <tr>
        <td class="text-capitalize">
            <input class="form-control" readonly value="<?php echo $section; ?>">
        </td>
        <td colspan="2">
            <input class="form-control" readonly value="<?php echo $studentName; ?>">
        </td>
        <td colspan="2">
            <input class="form-control" readonly value="<?php echo $bForm; ?>">
        </td>
        <td class="text-capitalize">
            <input class="form-control" readonly value="<?php echo $gender; ?>">
        </td>
    </tr>
    <tr>
        <th colspan="2">DOB</th>
        <th>Religion</th>
        <th colspan="2">H.Phone</th>
        <th>City</th>
    </tr>
    <tr>
        <td colspan="2">
            <input class="form-control" readonly value="<?php echo $dateOfBirth; ?>">
        </td>
        <td class="text-capitalize">
            <input class="form-control" readonly value="<?php echo $religion; ?>">
        </td>
        <td colspan="2">
            <input class="form-control" readonly value="<?php echo $phone; ?>">
        </td>
        <td class="text-capitalize">
            <input class="form-control" readonly value="<?php echo $city; ?>">
        </td>
    </tr>
    <tr>
        <th>Address:</th>
        <td class="text-capitalize" colspan="5">
            <input class="form-control" readonly value="<?php echo $homeAddress; ?>">
        </td>
    </tr>
    <tr>
        <th colspan="6" class="text-capitalize p-1">Father / Guardian Detail</th>
    </tr>
    <tr>
        <th colspan="2" class="p-1">Father Name</th>
        <th colspan="2" class="p-1">CNIC</th>
        <th colspan="2" class="p-1">Cell</th>
    </tr>
    <tr>
        <td colspan="2" class="p-1">
            <input class="form-control" readonly value="<?php echo $fatherName; ?>">
        </td>
        <td colspan="2" class="p-1">
            <input class="form-control" readonly value="<?php echo $cnic; ?>">
        </td>
        <td colspan="2" class="p-1">
            <input class="form-control" readonly value="<?php echo $frmcell; ?>">
        </td>
    </tr>
    <tr>
        <th colspan="2" class="p-1">Whatsapp</th>
        <th colspan="2" class="p-1">Occupation</th>
        <th colspan="2" class="p-1">Qualification</th>
    </tr>
    <tr>
        <td colspan="2" class="p-1">
            <input class="form-control" readonly value="<?php echo $whatsapp; ?>">
        </td>
        <td colspan="2" class="p-1">
            <input class="form-control" readonly value="<?php echo $occupation; ?>">
        </td>
        <td colspan="2" class="p-1">
            <input class="form-control" readonly value="<?php echo $qualification; ?>">
        </td>
    </tr>
<?php
$sl_titles = mysqli_query($con,"select * from addChargesTitle where instituteId='$userId' order by id desc limit 0,1");
while($chrgtitle = mysqli_fetch_array($sl_titles)){
    
    $charges1 = $chrgtitle['charges1'];
    $charges2 = $chrgtitle['charges2'];
    $charges3 = $chrgtitle['charges3'];
    $charges4 = $chrgtitle['charges4'];
    $charges5 = $chrgtitle['charges5'];
    $charges6 = $chrgtitle['charges6'];
}
?> 
    <tr>
        <th colspan="6" class="text-capitalize p-1">Fee Structure</th>
    </tr>
    <tr>
        <th class="text-capitalize p-1">
            <?php if(!empty($charges1)){ echo $charges1; }else{ echo "Admission Form"; } ?>
        </th>
        <th class="text-capitalize p-1">
            <?php if(!empty($charges2)){ echo $charges2; }else{ echo "Annual Fund";} ?>
        </th>
        <th class="text-capitalize p-1">
            <?php if(!empty($charges3)){ echo $charges3; }else{ echo "Books";} ?>
        </th>
        <th class="text-capitalize p-1">
            <?php if(!empty($charges4)){ echo $charges4; }else{ echo "uniform"; } ?>
        </th>
        <th class="text-capitalize p-1">
            <?php if(!empty($charges5)){ echo $charges5; }else{ echo "stationary"; } ?>
        </th>
        <th class="text-capitalize p-1"><?php if(!empty($charges6)){ echo $charges6; }else{ echo "others"; } ?></th>
    </tr>
    <tr>
        <td class="p-1">
            <input class="form-control" readonly value="<?php echo $admissionFee; ?>">
        </td>
        <td class="p-1">
            <input class="form-control" readonly value="<?php echo $annualFund; ?>">
        </td>
        <td class="p-1">
            <input class="form-control" readonly value="<?php echo $books; ?>">
        </td>
        <td class="p-1">
            <input class="form-control" readonly value="<?php echo $uniform; ?>">
        </td>
        <td class="p-1">
            <input class="form-control" readonly value="<?php echo $stationary; ?>">
        </td>
        <td class="p-1">
            <input class="form-control" readonly value="<?php echo $others; ?>">
        </td>
    </tr>
    <tr>
        <th colspan="1" class="p-1">M.Fee</th>
        <th colspan="1" class="p-1">Disc.</th>
        <th colspan="2" class="p-1">After Disc.</th>
        <th colspan="2" class="p-1">Total</th>
    </tr>
    <tr>
        <td colspan="1" class="p-1">
            <input class="form-control" readonly value="<?php echo $monthlyFee; ?>">
        </td>
        <td colspan="1" class="p-1">
            <input class="form-control" readonly value="<?php echo $discount; ?>">
        </td>
        <td colspan="2" class="p-1">
            <input class="form-control" readonly value="<?php echo $totalFee; ?>">
        </td>
        <td colspan="2" class="p-1">
            <input class="form-control" readonly value="<?php echo $totalAmount; ?>">
        </td>
    </tr>
    <tr>
        <th class="p-1" colspan="6"><?php echo $remarks; ?></th>
    </tr>
    <tr>
        <th class="p-1" colspan="3">Admission Incharge: ____________________</th>
        <th class="p-1" colspan="3">Principal Signature: ____________________</th>
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