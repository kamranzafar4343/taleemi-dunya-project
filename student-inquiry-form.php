<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#inquiry-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='student-inquiry-manager'"> student inquiry manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> student inquiry form</li>
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
<br>
<?php
if(isset($_GET['id'])){
    
    $ids = $_GET['id'];
    
$sl_rsl = mysqli_query($con,"select * from studentInquiry where instituteId='$userId' && id='$ids'");
$result = mysqli_fetch_assoc($sl_rsl);

$instituteId = $result['instituteId'];
$studentName = $result['studentName'];
$fatherName = $result['fatherName'];
$inquiryId = $result['inquiryId'];
$dates = $result['dates'];
$gender = $result['gender'];
$medium = $result['medium'];
$class = $result['class'];
$fomphone = $result['phone'];
$fomcell = $result['cell'];
$previousInstitute = $result['previousInstitute'];
$monthlyFee = $result['monthlyFee'];
$discount = $result['discount'];
$testFund = $result['testFund'];
$totalFee = $result['totalFee'];
$admissionFee = $result['admissionFee'];
$annualFund = $result['annualFund'];
$books = $result['books'];
$uniform = $result['uniform'];
$stationary = $result['stationary'];
$others = $result['others'];
$otherTotal = $result['otherTotal'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
}
?>
<div class="container-fluid mt-4">
    
    <div class="row" id="bodies">
        <div class="col datas p-3">
<div class="row">
    <div class="col p-3" style="border:8px double black;">
<table class="w-100" style='background:hsl(35, 100%, 80%);'>
    <tr align="center">
        <th width="100" rowspan="2" class="p-1">
<img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid">
        </th>
        <th class="p-1">
<h3 class="text-uppercase fs-3 fw-bold"><?php echo $instituteName; ?></h3>
<div class="text-capitalize">address: <span class="fw-normal"><?php echo $mainaddress; ?></span> cell: <span class="fw-normal"><?php echo $cell; ?></span></div>
        </th>
        <th width="50" style="border:1px solid black;" rowspan="2" class="p-1">
<h6 class="p-2">Attach 3 Passport Size Photos</h6>
        </th>
    </tr>
</table>
<table class="w-100 table table-striped" style='background:hsl(35, 100%, 80%);'>
    <tr align="center">
        <th colspan="7" class="text-uppercase p-1 fs-5">student inquiry form session <?php echo date("Y"); ?></th>
    </tr>
    <tr>
        <th>InquiryID</th>
        <td colspan="2">
            <input value="<?php echo $inquiryId; ?>" class="form-control" readonly>
        </td>
        <th>Date</th>
        <td colspan="2">
            <input value="<?php echo $dates; ?>" class="form-control" readonly>
        </td>
    </tr>
    <tr>
        <th>Class</th>
        <td colspan="2" class="text-uppercase">
            <input value="<?php echo $class_name; ?>" class="form-control" readonly>
        </td>
        <th>Medium</th>
        <td colspan="2">
            <input value="<?php echo $medium; ?>" class="form-control" readonly>
        </td>
    </tr>
    <tr>
        <th>Gender</th>
        <td colspan="2">
            <input class="form-control" value="<?php echo $gender; ?>" readonly>
        </td>
        <th>DOB</th>
        <td colspan="2">
            <input class="form-control" value="" readonly>
        </td>
    </tr>
    <tr>
        <th>St.Name</th>
        <td colspan="2" class="text-capitalize">
            <input value="<?php echo $studentName; ?>" class="form-control" readonly>
        </td>
        <th>Father Name</th>
        <td colspan="2" class="text-capitalize">
            <input value="<?php echo $fatherName; ?>" class="form-control" readonly>
        </td>
    </tr>
    <tr>
        <th>Cell</th>
        <td colspan="2">
<input class="form-control" value="<?php if(!empty($fomcell)){ echo $fomcell;  }else{ echo "None"; } ?>" readonly>
        </td>
        <th>Whatsapp#</th>
        <td colspan="2">
<input class="form-control" value="<?php if(!empty($fomphone)){ echo $fomphone; }else{ echo "None"; } ?>" readonly>
        </td>
    </tr>
    <tr>
        <th>Bay Form</th>
        <td colspan="2">
            <input class="form-control" value="" readonly>
        </td>
        <th>F.CNIC</th>
        <td colspan="2">
            <input class="form-control" value="" readonly>
        </td>
    </tr>
    <tr>
        <th>Address</th>
        <td colspan="5">
            <input class="form-control" value="" readonly>
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
    <th colspan="6" class="p-1">
        <h6 class="text-capitalize fs-6 fw-bold">fee section</h6>
    </th>
</tr>
    <tr>
        <th>Monthly Fee</th>
        <th>Discount</th>
        <th>After Dis. Fee</th>
        <th class="text-capitalize">
            <?php if(!empty($charges1)){ echo $charges1; }else{ echo "Admission Form"; } ?>
        </th>
        <th class="text-capitalize">
            <?php if(!empty($charges2)){ echo $charges2; }else{ echo "Annual Fund";} ?>
        </th>
        <th class="text-capitalize"><?php if(!empty($charges3)){ echo $charges3; }else{ echo "Books"; } ?></th>
    </tr>
    <tr>
        <td>
            <input readonly value="<?php echo $monthlyFee; ?>" class="form-control">
        </td>
        <td>
            <input readonly value="<?php echo $discount; ?>" class="form-control">
        </td>
        <td>
            <input readonly value="<?php echo $totalFee; ?>" class="form-control">
        </td>
        <td>
            <input class="form-control" readonly value="<?php echo $admissionFee; ?>">
        </td>
        
        <td>
            <input class="form-control" readonly value="<?php echo $annualFund; ?>">
        </td>
        <td>
            <input class="form-control" readonly value="<?php echo $books; ?>">
        </td>
    </tr>
    <tr>
        <th class="text-capitalize">
            <?php if(!empty($charges4)){ echo $charges4; }else{ echo "uniform"; } ?>
        </th>
        <th class="text-capitalize">
            <?php if(!empty($charges5)){ echo $charges5; }else{ echo "stationary"; } ?>
        </th>
        <th class="text-capitalize"><?php if(!empty($charges6)){ echo $charges6; }else{ echo "others"; } ?></th>
        <th>T.Payable</th>
        <th>----</th>
        <th>----</th>
    </tr>
    <tr>
        <td>
            <input class="form-control" readonly value="<?php echo $uniform; ?>">
        </td>
        <td>
            <input class="form-control" readonly value="<?php echo $stationary; ?>">
        </td>
        <td>
            <input class="form-control" readonly value="<?php echo $others; ?>">
        </td>
        <td>
            <input class="form-control" readonly value="<?php echo $otherTotal; ?>">
        </td>
        <td>
            <input class="form-control" readonly value="">
        </td>
        <td>
            <input class="form-control" readonly value="">
        </td>
    </tr>
    <tr>
        <th colspan="6" style="padding:3px;font-size:1rem;">DOCUMENTS TO BE ATTACHED(COMPULSORY)</th>
    </tr>
    <tr>
        <th colspan="6" style="padding:3px;font-size:1rem;">
            <ul type="circle">
                <li style="float:left;width:50%;overflow:hidden;" class="fw-normal">3 Passport size Fresh Pictures</li>
                <li style="float:left;width:50%;overflow:hidden;" class="fw-normal">Copy of Father/Guardian CNIC</li>
                <li style="float:left;width:50%;overflow:hidden;" class="fw-normal">Copy of Student CNIC / Bay-Form</li>
                <li style="float:left;width:50%;overflow:hidden;" class="fw-normal">School Leaving Certificate/Result Card Copy</li>
            </ul>
        </th>
    </tr>
</table>
<br><br>
<table class="w-100" style='background:hsl(35, 100%, 80%);'>
    <tr align="right">
        <th colspan="6">Admission Officer: ______________________</th>
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