<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("profile.php"); require_once("lib/attendance.php");
require_once("lib/fee.php"); require_once("lib/examination.php"); require_once("lib/time-table.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">family challan</li>
  </ol>
</nav>
<?php
$sl_inst = mysqli_query($con,"select * from confirmSchools where institute_id='$instituteId'");
if(mysqli_num_rows($sl_inst)>0){
    $rst = mysqli_fetch_assoc($sl_inst);
$institute_name = $rst['institute_name'];
$campus = $rst['campus'];
$logo = $rst['logo'];
$instcel = $rst['cell'];
$ofceaddress = $rst['address'];
$account_detail = $rst['account_detail'];
}else{ echo "<div class='text-capitalize'>update your school profile!</div>"; }
    $sl_spec = mysqli_query($con,"select * from fee_collection where rollno='$roll_num' && instituteId='$instituteId'");
    
    $result = mysqli_fetch_assoc($sl_spec);
    $instituteId = $result['instituteId'];
    $admissionDate = $result['admissionDate'];
    $familyId = $result['familyId'];
    $roll_num = $result['roll_num'];
    $class = $result['class'];
    $section = $result['section'];
    $medium = $result['medium'];
    $session = $result['session'];
    $images = $result['image'];
    $studentName = $result['studentName'];
    $father_name = $result['father_name'];
    $bForm = $result['bForm'];
    $gender = $result['gender'];
    $dateOfBirth = $result['dateOfBirth'];
    $month = $result['month'];
    $challan_status = $result['challan_status'];
    if(empty($result['admissionFee'])){ $admissionFee = "0"; }else{ $admissionFee = $result['admissionFee']; }
    if(empty($result['annualFund'])){ $annualFund = "0"; }else{ $annualFund = $result['annualFund']; }
    if(empty($result['totalFee'])){ $monthlyFee = "0"; }else{ $monthlyFee = $result['totalFee']; }
    if(empty($result['testFund'])){ $testFund = "0"; }else{ $testFund = $result['testFund']; }
    if(empty($result['books'])){ $books = "0"; }else{ $books = $result['books']; }
    if(empty($result['unfirom'])){ $unfirom = "0"; }else{ $unfirom = $result['unfirom']; }
    if(empty($result['stationary'])){ $stationary = "0"; }else{ $stationary = $result['stationary']; }
    if(empty($result['others'])){ $others = "0"; }else{ $others = $result['others']; }

    
    $toalAmount = $admissionFee + $annualFund + $monthlyFee + $testFund + $books + $unfirom + $stationary + $others;
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];    

?>
<style>
</style>
<div class="container-fluid mt-4">
    <div class='row datas'>
  <div class='col-lg-12 col-12 col-sm-12 col-md-12 col-xl-12'>
      <div class='card mb-0' style="box-shadow:none;border:none;border-bottom:2px dashed black;">
        <div class='card-body' style="border:none;box-shadow:none;">
          <table class='w-100 bg-white table table-responsive' style="border:none;box-shadow:none;">
            <tr align='center' style="border-bottom:none;">
              <td style="padding:2px;font-size:0.8rem;border-bottom:none;" rowspan="3"><img src='../portal-admins/institute-logos/<?php echo $logo; ?>' class='img-fluid' width='50'></td>
              <td style="padding:2px;font-size:0.8rem;border-bottom:none;"><span class="fs-5 fw-bold text-capitalize"><?php echo $institute_name; ?></span></td>
              <td style="padding:2px;font-size:0.8rem;border-bottom:none;">Parent Copy</td>
            </tr>
            <tr align="center"><td style="padding:2px;font-size:0.8rem;border-bottom:none;" colspan="3" class="text-capitalize"><b>Cell:</b><?php echo $instcel; ?><b>Address:</b> <?php echo $ofceaddress; ?></td></tr>
            <tr align="center"><th style="padding:2px;font-size:0.8rem;border-bottom:none;" colspan="3" class="text-uppercase"><?php echo $account_detail; ?></th></tr>
          </table>
          <table class="table table-responsive w-100 bg-white" style="border:1px solid black;">
              <tr align="center">
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Family ID#</th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;"><?php echo $familyId; ?></th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Father Name</th>
                  <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-uppercase"><?php echo $father_name; ?></td>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Challan Month</th>
                  <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"><?php echo $month; ?></td>
              </tr>
              <tr align="center">
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Challan Type</th>
                  <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"><?php echo $challan_status; ?></td>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Issue Date</th>
                  <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"><?php echo date("j-m-Y"); ?></td>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Due Date</th>
                  <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"><?php echo date("10-m-Y"); ?></td>
              </tr>
          </table>
          <table class="table table-responsive w-100 bg-white" style="border:1px solid black;">
              <tr align="center">
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">#</th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Roll No</th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Student Name</th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Class</th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Section</th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Month Fee</th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Previous</th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Total</th>
              </tr>
<?php
$yr = date("Y");
$ad = 1;
$sll_st = mysqli_query($con,"select * from fee_collection where familyId='$familyId' && instituteId='$instituteId' && session='$yr'");
while($ad <= 100000 && $st = mysqli_fetch_array($sll_st)){
    $student_imgs = $st['student_imgs'];
    $rollno = $st['rollno'];
    $student_name = $st['student_name'];
    $class = $st['class'];
    $monthly_fee = $st['monthly_fee'];
    $previous_balance = $st['previous_balance'];
    $totls = $monthly_fee + $previous_balance;
    $totals += $monthly_fee + $previous_balance;
?>
  <tr align="center">
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"><?php echo $ad++; ?></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"><?php echo $rollno; ?></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"><?php echo $student_name; ?></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-uppercase"><?php echo $class_name; ?></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-uppercase"><?php echo $section; ?></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"><?php echo $monthly_fee; ?></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"><?php echo $previous_balance; ?></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"><?php echo $totls; ?></td>
  </tr>
<?php } ?>
<tr align="center">
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-uppercase"></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-uppercase"></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"><?php echo $totals; ?></td>
  </tr>
  <tr style="border:none;">
      <td colspan="8" style="border:none;"><b>Note:</b> Dues must be paid before 10th of each month. Dues once paid are niether refundable in any case.</td>
  </tr>
  <tr style="border:none;">
      <th colspan="4" style="border:none;">Principal: ________________________</th>
      <th colspan="4" style="border:none;">Admin: ________________________</th>
  </tr>
<tr style="background-color:hsl(0,0%,85%);">
    <td style="padding:2px;font-size:0.8rem;" colspan='10'><b style="font-size:0.8rem;">Address:</b> <?php echo $mainaddress; ?><b style="font-size:0.8rem;"> Cell:</b> <?php echo $cell; ?></td>
</tr>
          </table>
        </div>
      </div>
</div>
<div class='col-lg-12 col-12 col-sm-12 col-md-12 col-xl-12'>
      <div class='card mb-0' style="box-shadow:none;border:none;">
        <div class='card-body' style="border:none;box-shadow:none;">
          <table class='w-100 bg-white table table-responsive' style="border:none;box-shadow:none;">
            <tr align='center' style="border-bottom:none;">
              <td style="padding:2px;font-size:0.8rem;border-bottom:none;" rowspan="3"><img src='../portal-admins/institute-logos/<?php echo $logo; ?>' class='img-fluid' width='50'></td>
              <td style="padding:2px;font-size:0.8rem;border-bottom:none;"><span class="fs-5 fw-bold text-capitalize"><?php echo $institute_name; ?></span></td>
              <td style="padding:2px;font-size:0.8rem;border-bottom:none;">School Copy</td>
            </tr>
            <tr align="center"><td style="padding:2px;font-size:0.8rem;border-bottom:none;" colspan="3" class="text-capitalize"><b>Cell:</b><?php echo $instcel; ?><b>Address:</b> <?php echo $mainaddress; ?></td></tr>
            <tr align="center"><th style="padding:2px;font-size:0.8rem;border-bottom:none;" colspan="3" class="text-uppercase"><?php echo $account_detail; ?></th></tr>
          </table>
          <table class="table table-responsive w-100 bg-white" style="border:1px solid black;">
              <tr align="center">
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Family ID#</th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;"><?php echo $familyId; ?></th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Father Name</th>
                  <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-uppercase"><?php echo $father_name; ?></td>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Challan Month</th>
                  <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"><?php echo $month; ?></td>
              </tr>
              <tr align="center">
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Challan Type</th>
                  <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"><?php echo $challan_status; ?></td>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Issue Date</th>
                  <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"><?php echo date("j-m-Y"); ?></td>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Due Date</th>
                  <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"><?php echo date("10-m-Y"); ?></td>
              </tr>
          </table>
          <table class="table table-responsive w-100 bg-white" style="border:1px solid black;">
              <tr align="center">
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">#</th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Roll No</th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Student Name</th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Class</th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Section</th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Month Fee</th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Previous</th>
                  <th style="padding:2px;font-size:0.8rem;border:1px solid black;">Total</th>
              </tr>
<?php
$yr = date("Y");
$ad = 1;
$sll_st = mysqli_query($con,"select * from fee_collection where familyId='$familyId' && instituteId='$instituteId' && session='$yr'");
while($ad <= 100000 && $st = mysqli_fetch_array($sll_st)){
    $student_imgs = $st['student_imgs'];
    $rollno = $st['rollno'];
    $student_name = $st['student_name'];
    $class = $st['class'];
    $monthly_fee = $st['monthly_fee'];
    $previous_balance = $st['previous_balance'];
    $totls = $monthly_fee + $previous_balance;
    $totals += $monthly_fee + $previous_balance;
?>
  <tr align="center">
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"><?php echo $ad++; ?></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"><?php echo $rollno; ?></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"><?php echo $student_name; ?></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-uppercase"><?php echo $class_name; ?></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-uppercase"><?php echo $section; ?></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"><?php echo $monthly_fee; ?></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"><?php echo $previous_balance; ?></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"><?php echo $totls; ?></td>
  </tr>
<?php } ?>
<tr align="center">
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-uppercase"></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;" class="text-uppercase"></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"></td>
      <td style="padding:2px;font-size:0.8rem;border:1px solid black;"><?php echo $totals; ?></td>
  </tr>
  <tr style="border:none;">
      <td colspan="8" style="border:none;"><b>Note:</b> Dues must be paid before 10th of each month. Dues once paid are niether refundable in any case.</td>
  </tr>
  <tr style="border:none;">
      <th colspan="4" style="border:none;">Principal: ________________________</th>
      <th colspan="4" style="border:none;">Admin: ________________________</th>
  </tr>
  <tr style="background-color:hsl(0,0%,85%);">
    <td style="padding:2px;font-size:0.8rem;" colspan='10'><b style="font-size:0.8rem;">Address:</b> <?php echo $mainaddress; ?><b style="font-size:0.8rem;"> Cell:</b> <?php echo $cell; ?></td>
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