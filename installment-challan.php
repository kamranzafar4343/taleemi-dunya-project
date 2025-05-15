<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#chlan-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='student-wise-installments'">student wise installment challan</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Installment Challan form</li>
  </ol>
</nav>
<?php
if(isset($_GET['id'])){
    $ids = $_GET['id'];
    $sl_spec = mysqli_query($con,"select * from fee_collection where id='$ids' && instituteId='$userId' && challan_status='installment' order by id desc");
    
$result = mysqli_fetch_assoc($sl_spec);
    $student_imgs = $result['student_imgs'];
    $familyId = $result['familyId'];
    $rollno = $result['rollno'];
    $session = $result['session'];
    $student_name = $result['student_name'];
    $father_name = $result['father_name'];
    $class = $result['class'];
    $section = $result['section'];
    if(!empty($result['monthly_fee'])){ $monthly_fee = $result['monthly_fee']; }else{ $monthly_fee = "0"; }
    if(!empty($result['previous_balance'])){ $previous_balance = $result['previous_balance']; }else{ $previous_balance = "0"; }
    if(empty($result['discounts'])){ $discounts = "0"; }else{ $discounts = $result['discounts']; }
    if(empty($result['fine'])){ $fine = "0"; }else{ $fine = $result['fine']; }
    if(empty($result['total_amount'])){ $total_amount = "0"; }else{ $total_amount = $result['total_amount']; }
    if(empty($result['receive_monthly'])){ $receive_monthly = "0"; }else{ $receive_monthly = $result['receive_monthly']; }
    if(empty($result['remaing_balance'])){ $remaing_balance = "0"; }else{ $remaing_balance = $result['remaing_balance']; }
    $finlAmnt = $monthly_fee + $fine + $total_amount;
    $fees_status = $result['fees_status'];
    $month = $result['month'];
    $monthName = date('F', mktime(0, 0, 0, $month, 10));
    $challan_status = $result['challan_status'];
    $instituteId = $result['instituteId'];
    $remarks = $result['remarks'];
    $dates = $result['dates'];
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
}
?>
<div class="container-fluid mt-4">
    <div class='row' id='data'>
  <div class='col-lg-12 col-12 col-sm-12 col-md-12 col-xl-12'>
      <div class='card mb-0 datas'>
        <div class='card-body'>
          <table class='table table-responsive w-100 bg-white table-striped'>
            <tr align='center'>
              <td><img src='portal-admins/institute-logos/<?php echo $image; ?>' class='img-fluid' width='50'></td>
              <td colspan='2' style="border-right:1px dashed black;"><span class="fs-5 fw-bold text-capitalize"><?php echo $instituteName; ?></span></td>
              <td></td>
              <td><img src='portal-admins/institute-logos/<?php echo $image; ?>' class='img-fluid' width='50'></td>
              <td colspan='2' style="border-right:1px dashed black;"><span class="fs-5 fw-bold text-capitalize"><?php echo $instituteName; ?></span></td>
              <td></td>
              <td><img src='portal-admins/institute-logos/<?php echo $image; ?>' class='img-fluid' width='50'></td>
              <td colspan='2'><span class="fs-5 fw-bold text-capitalize"><?php echo $instituteName; ?></span></td>
            </tr>
            <tr align='center'>
              <th style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan='3'><span class='text-uppercase'>Bank Copy</span></th>
              <th width='20'></th>
              <th style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan='3'><span class='text-uppercase'>School Copy</span></th>
              <th width='20'></th>
              <th style="padding:2px;font-size:0.7rem;" colspan='3'><span class='text-uppercase'>Parents Copy</span></th>
            </tr>
            <tr align='center'>
              <th style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan='3'><span class='text-uppercase fw-normal' style="font-size:0.7rem;"><?php echo $bank_account; ?></span></th>
              <th></th>
              <th style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan='3'><span class='text-uppercase fw-normal' style="font-size:0.7rem;"><?php echo $bank_account; ?></span></th>
              <th></th>
              <th style="padding:2px;font-size:0.7rem;" colspan='3'><span class='text-uppercase fw-normal' style="font-size:0.7rem;"><?php echo $bank_account; ?></span></th>
            </tr>
            <tr align='center'>
              <th style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan='3'><span class='text-uppercase'><?php echo $student_name; ?></span></th>
              <th width='20'></th>
              <th style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan='3'><span class='text-uppercase'><?php echo $student_name; ?></span></th>
              <th width='20'></th>
              <th style="padding:2px;font-size:0.7rem;" colspan='3'><span class='text-uppercase'><?php echo $student_name; ?></span></th>
            </tr>
            <tr>
                <th style="padding:2px;font-size:0.7rem;">CH No</th>
                <td colspan="2" style="padding:2px;font-size:0.7rem;border-right:1px dashed black;"><div id="chno" style="font-size:0.7rem;"></div><input type="hidden" value="<?php echo rand(10,10000); ?>" id="clns"></td>
                <td></td>
                <th style="padding:2px;font-size:0.7rem;">CH No</th>
                <td colspan="2" style="padding:2px;font-size:0.7rem;border-right:1px dashed black;"><div id="chnos" style="font-size:0.7rem;"></div></td>
                <td></td>
                <th style="padding:2px;font-size:0.7rem;">CH No</th>
                <td style="padding:2px;font-size:0.7rem;" colspan="2"><div id="cheno" style="font-size:0.7rem;"></div></td>
            </tr>
<script>
var chln = document.getElementById('clns').value;
document.getElementById('chno').innerHTML = chln;
document.getElementById('chnos').innerHTML = chln;
document.getElementById('cheno').innerHTML = chln;
</script>
<tr>
  <th style="padding:2px;font-size:0.7rem;">Father Name</th>
  <td colspan="2" style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-capitalize"><?php echo $father_name; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">Father Name</th>
  <td colspan="2" style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-capitalize"><?php echo $father_name; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">Father Name</th>
  <td colspan="2" style="padding:2px;font-size:0.7rem;" class="text-capitalize"><?php echo $father_name; ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.7rem;">Roll#</th>
  <td colspan="2" style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-capitalize"><?php echo $rollno; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">Roll#</th>
  <td colspan="2" style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-capitalize"><?php echo $rollno; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">Roll#</th>
  <td colspan="2" style="padding:2px;font-size:0.7rem;" class="text-capitalize"><?php echo $rollno; ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.7rem;">Class & Section</th>
  <td colspan="2" style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-uppercase"><?php echo $class_name." "."(".$section.")"; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">Class & Section</th>
  <td colspan="2" style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-uppercase"><?php echo $class_name." "."(".$section.")"; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">Class & Section</th>
  <td colspan="2" style="padding:2px;font-size:0.7rem;" class="text-uppercase"><?php echo $class_name." "."(".$section.")"; ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.7rem;">Challan Month</th>
  <td colspan="2" style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-capitalize"><?php echo $monthName." ". date("Y"); ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">Challan Month</th>
  <td colspan="2" style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-capitalize"><?php echo $monthName." ". date("Y"); ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">Challan Month</th>
  <td colspan="2" style="padding:2px;font-size:0.7rem;" class="text-capitalize"><?php echo $monthName." ". date("Y"); ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.7rem;">Issue Date</th>
  <td colspan="2" style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-capitalize"><?php echo date("j-m-Y"); ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">Issue Date</th>
  <td colspan="2" style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-capitalize"><?php echo date("j-m-Y"); ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">Issue Date</th>
  <td colspan="2" style="padding:2px;font-size:0.7rem;" class="text-capitalize"><?php echo date("j-m-Y"); ?></td>
</tr>
<tr align="center">
  <th style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan="3">Due Date: <?php echo date("10-m-Y l"); ?></th>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan="3">Due Date: <?php echo date("10-m-Y l"); ?></th>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;" colspan="3">Due Date: <?php echo date("10-m-Y l"); ?></th>
</tr>
<tr>
  <th style="padding:2px;font-size:0.7rem;">#</th>
  <th style="padding:2px;font-size:0.7rem;">Description</th>
  <th style="padding:2px;font-size:0.7rem;border-right:1px dashed black;">Amount</th>
  <th></th>
  <th style="padding:2px;font-size:0.7rem;">#</th>
  <th style="padding:2px;font-size:0.7rem;">Description</th>
  <th style="padding:2px;font-size:0.7rem;border-right:1px dashed black;">Amount</th>
  <th></th>
  <th style="padding:2px;font-size:0.7rem;">#</th>
  <th style="padding:2px;font-size:0.7rem;">Description</th>
  <th style="padding:2px;font-size:0.7rem;">Amount</th>
</tr>
<tr>
  <th style="padding:2px;font-size:0.7rem;">1</th>
  <th style="padding:2px;font-size:0.7rem;">Monthly Fee</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;"><?php  echo $b = str_replace( ',', '', $monthly_fee ); ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">1</th>
  <th style="padding:2px;font-size:0.7rem;">Monthly Fee</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;"><?php echo $b = str_replace( ',', '', $monthly_fee ); ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">1</th>
  <th style="padding:2px;font-size:0.7rem;">Monthly Fee</th>
  <td style="padding:2px;font-size:0.7rem;"><?php echo $b = str_replace( ',', '', $monthly_fee ); ?></td>
</tr>
<?php
$sl_prv = mysqli_query($con,"select * from fee_collection where rollno='$rollno' && instituteId='$instituteId' && challan_status='monthly' order by id desc limit 0,1");
$prvus = mysqli_fetch_assoc($sl_prv);
$remaing_balances = $prvus['remaing_balance'];
?>
<tr>
  <th style="padding:2px;font-size:0.7rem;">2</th>
  <th style="padding:2px;font-size:0.7rem;">Arreas</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;"><?php if(!empty($remaing_balances)){ echo $remaing_balances; }else{ echo "0"; } ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">2</th>
  <th style="padding:2px;font-size:0.7rem;">Arreas</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;"><?php if(!empty($remaing_balances)){ echo $remaing_balances; }else{ echo "0"; } ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">2</th>
  <th style="padding:2px;font-size:0.7rem;">Arreas</th>
  <td style="padding:2px;font-size:0.7rem;"><?php if(!empty($remaing_balances)){ echo $remaing_balances; }else{ echo "0"; } ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.7rem;">3</th>
  <th style="padding:2px;font-size:0.7rem;">Discount</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;"><?php echo $discounts; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">3</th>
  <th style="padding:2px;font-size:0.7rem;">Discount</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;"><?php echo $discounts; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">3</th>
  <th style="padding:2px;font-size:0.7rem;">Discount</th>
  <td style="padding:2px;font-size:0.7rem;"><?php echo $discounts; ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.7rem;">4</th>
  <th style="padding:2px;font-size:0.7rem;">Fine</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;"><?php if(date("j") >= 10){ echo $fine; } ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">4</th>
  <th style="padding:2px;font-size:0.7rem;">Fine</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;"><?php if(date("j") >= 10){ echo $fine; } ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;">4</th>
  <th style="padding:2px;font-size:0.7rem;">Fine</th>
  <td style="padding:2px;font-size:0.7rem;"><?php if(date("j") >= 10){ echo $fine; } ?></td>
</tr>
<tr>
  <th colspan="2" class="fs-6">Total Amount</th>
  <td class="fs-6" style="border-right:1px dashed black;"><?php echo $b + $remaing_balances + $fine - $discounts; ?></td>
  <td></td>
  <th colspan="2" class="fs-6">Total Amount</th>
  <td class="fs-6" style="border-right:1px dashed black;"><?php echo $b + $remaing_balances + $fine - $discounts; ?></td>
  <td></td>
  <th colspan="2" class="fs-6">Total Amount</th>
  <td class="fs-6"><?php echo $b + $remaing_balances + $fine - $discounts; ?></td>
</tr>
<tr>
<td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan='3'><b>Note:</b> Dues must be paid before 10th of each month.<br>Dues once paid are neither refuncdable nor adjustable in any case.</td>
              <td width='20'></td>
<td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan='3'><b>Note:</b> Dues must be paid before 10th of each month.<br>Dues once paid are neither refuncdable nor adjustable in any case.</td>
              <td width='20'></td>
<td style="padding:2px;font-size:0.7rem;" colspan='3'><b>Note:</b> Dues must be paid before 10th of each month.<br>Dues once paid are neither refuncdable nor adjustable in any case.</td>
</tr>
<tr>
  <td style="padding:2px;font-size:0.7rem;"><b>Principal:</b> _____________</td>
  <td style="padding:2px;font-size:0.7rem;" width='20'></td>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;"><b>Admin:</b> _____________</td>
  <td width='20'></td>
  <td style="padding:2px;font-size:0.7rem;"><b>Principal:</b> _____________</td>
  <td style="padding:2px;font-size:0.7rem;" width='20'></td>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;"><b>Admin:</b> _____________</td>
  <td width='20'></td>
  <td style="padding:2px;font-size:0.7rem;"><b>Principal:</b> _____________</td>
  <td style="padding:2px;font-size:0.7rem;" width='20'></td>
  <td style="padding:2px;font-size:0.7rem;"><b>Admin:</b> _____________</td>
</tr>
<tr style="background-color:hsl(0,0%,85%);">
    <td style="padding:2px;font-size:0.8rem;" colspan='3'><b style="font-size:0.8rem;">Address:</b> <?php echo $mainaddress; ?><b style="font-size:0.8rem;">Cell:</b> <?php echo $cell; ?></td>
    <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;" width='20'></td>
    <td style="padding:2px;font-size:0.8rem;" colspan='3'><b style="font-size:0.8rem;">Address:</b> <?php echo $mainaddress; ?><b style="font-size:0.8rem;">Cell:</b> <?php echo $cell; ?></td>
    <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;" width='20'></td>
    <td style="padding:2px;font-size:0.8rem;" colspan='3'><b style="font-size:0.8rem;">Address:</b> <?php echo $mainaddress; ?><b style="font-size:0.8rem;">Cell:</b> <?php echo $cell; ?></td>
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
<?php echo require_once("source/foot-section.php");?>