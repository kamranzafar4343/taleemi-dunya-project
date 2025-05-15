<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#chlan-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='annualy-challan-manager'">annualy challan manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> annualy Challan form</li>
  </ol>
</nav>
<?php
if(isset($_GET['rol'])){
    $rol = $_GET['rol'];
    $sl_spec = mysqli_query($con,"select * from addStudents where instituteId='$userId' && roll_num='$rol'");
$results = mysqli_fetch_assoc($sl_spec);
    $frmimage = $results['image'];
    $familyId = $results['familyId'];
    $roll_num = $results['roll_num'];
    $class = $results['class'];
    $section = $results['section'];
    $session = $results['session'];
    $studentName = $results['studentName'];
    $fatherName = $results['fatherName'];

$sl_colectn = mysqli_query($con,"select * from fee_collection where instituteId='$userId' && rollno='$roll_num' && challan_status='annualy' && session='$session'");
$rslt = mysqli_fetch_assoc($sl_colectn);
if(!empty($rslt['monthly_fee'])){ $monthly_fee = $rslt['monthly_fee']; }else{ $monthly_fee = "0"; }
if(!empty($rslt['discounts'])){ $discounts = $rslt['discounts']; }else{ $discounts = "0"; }
if(!empty($rslt['fine'])){ $fine = $rslt['fine']; }else{ $fine = "0"; }
    }
?>
<div class="container-fluid mt-4">
    <div class='row' id='data'>
  <div class='col-lg-12 col-12 col-sm-12 col-md-12 col-xl-12'>
      <div class='card mb-0 datas'>
        <div class='card-body'>
          <table class='table table-responsive table-striped w-100 bg-white'>
<tr align='center'>
  <td><img src='company-logos/<?php echo $image; ?>' class='img-fluid' width='50'></td>
  <td colspan='2'><span class="fs-5 fw-bold text-capitalize"><?php echo $instituteName; ?></span></td>
  <td style="border-left:1px dashed black;"></td>
  <td><img src='company-logos/<?php echo $image; ?>' class='img-fluid' width='50'></td>
  <td colspan='2'><span class="fs-5 fw-bold text-capitalize"><?php echo $instituteName; ?></span></td>
  <td style="border-left:1px dashed black;"></td>
  <td><img src='company-logos/<?php echo $image; ?>' class='img-fluid' width='50'></td>
  <td colspan='2'><span class="fs-5 fw-bold text-capitalize"><?php echo $instituteName; ?></span></td>
</tr>
<tr align='center'>
  <th style="padding:2px;font-size:0.8rem;" colspan='3'><span class='text-uppercase'>Bank Copy</span></th>
  <th style="padding:2px;font-size:0.8rem;border-left:1px dashed black;" width='20'></th>
  <th style="padding:2px;font-size:0.8rem;" colspan='3'><span class='text-uppercase'>School Copy</span></th>
  <th style="padding:2px;font-size:0.8rem;border-left:1px dashed black;" width='20'></th>
  <th style="padding:2px;font-size:0.8rem;" colspan='3'><span class='text-uppercase'>Parents Copy</span></th>
</tr>
<tr align='center'>
  <th style="padding:2px;" colspan='3'><span class='text-uppercase fw-normal' style=font-size:0.8rem;><?php echo $bank_account; ?></span></th>
  <th style="padding:2px;border-left:1px dashed black;" width='20'></th>
  <th style="padding:2px;" colspan='3'><span class='text-uppercase fw-normal' style=font-size:0.8rem;><?php echo $bank_account; ?></span></th>
  <th style="padding:2px;border-left:1px dashed black;" width='20'></th>
  <th style="padding:2px;" colspan='3'><span class='text-uppercase fw-normal' style=font-size:0.8rem;><?php echo $bank_account; ?></span></th>
</tr>
<tr align='center'>
  <th style="padding:2px;font-size:0.8rem;" colspan='3'><span class='text-uppercase'><?php echo $studentName; ?></span></th>
  <th style="padding:2px;font-size:0.8rem;border-left:1px dashed black;" width='20'></th>
  <th style="padding:2px;font-size:0.8rem;" colspan='3'><span class='text-uppercase'><?php echo $studentName; ?></span></th>
  <th style="padding:2px;font-size:0.8rem;border-left:1px dashed black;" width='20'></th>
  <th style="padding:2px;font-size:0.8rem;" colspan='3'><span class='text-uppercase'><?php echo $studentName; ?></span></th>
</tr>
<tr>
  <th style="padding:2px;font-size:0.8rem;">CH No</th>
  <td style="padding:2px;font-size:0.8rem;" colspan="2"><div id="chno" style="font-size:0.8rem;"></div><input type="hidden" value="<?php echo rand(10,10000); ?>" id="clns"></td>
  <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;"></td>
  <th style="padding:2px;font-size:0.8rem;">CH No</th>
  <td style="padding:2px;font-size:0.8rem;" colspan="2"><div id="chnos" style="font-size:0.8rem;"></div></td>
  <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;"></td>
  <th style="padding:2px;font-size:0.8rem;">CH No</th>
  <td style="padding:2px;font-size:0.8rem;" colspan="2"><div id="cheno" style="font-size:0.8rem;"></div></td>
</tr>
<script>
var chln = document.getElementById('clns').value;
document.getElementById('chno').innerHTML = chln;
document.getElementById('chnos').innerHTML = chln;
document.getElementById('cheno').innerHTML = chln;
</script>
<tr>
  <th style="padding:2px;font-size:0.8rem;">Father Name</th>
  <td style="padding:2px;font-size:0.8rem;" colspan="2" class="text-capitalize"><?php echo $fatherName; ?></td>
  <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;"></td>
  <th style="padding:2px;font-size:0.8rem;">Father Name</th>
  <td style="padding:2px;font-size:0.8rem;" colspan="2" class="text-capitalize"><?php echo $fatherName; ?></td>
  <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;"></td>
  <th style="padding:2px;font-size:0.8rem;">Father Name</th>
  <td style="padding:2px;font-size:0.8rem;" colspan="2" class="text-capitalize"><?php echo $fatherName; ?></td>
</tr>
<tr>
    <th style="padding:2px;font-size:0.8rem;">Family ID#</th>
    <td style="padding:2px;font-size:0.8rem;" colspan="2" class="text-capitalize"><?php echo $familyId; ?></td>
    <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;"></td>
    <th style="padding:2px;font-size:0.8rem;">Family ID#</th>
    <td style="padding:2px;font-size:0.8rem;" colspan="2" class="text-capitalize"><?php echo $familyId; ?></td>
    <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;"></td>
    <th style="padding:2px;font-size:0.8rem;">Family ID#</th>
    <td style="padding:2px;font-size:0.8rem;" colspan="2" class="text-capitalize"><?php echo $familyId; ?></td>
</tr>
<tr>
    <th style="padding:2px;font-size:0.8rem;">Class & Section</th>
    <td style="padding:2px;font-size:0.8rem;" colspan="2" class="text-capitalize"><?php echo $class." "."(".$section.")"; ?></td>
    <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;"></td>
    <th style="padding:2px;font-size:0.8rem;">Class & Section</th>
    <td style="padding:2px;font-size:0.8rem;" colspan="2" class="text-capitalize"><?php echo $class." "."(".$section.")"; ?></td>
    <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;"></td>
    <th style="padding:2px;font-size:0.8rem;">Class & Section</th>
    <td style="padding:2px;font-size:0.8rem;" colspan="2" class="text-capitalize"><?php echo $class." "."(".$section.")"; ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.8rem;">Challan Month</th>
  <td style="padding:2px;font-size:0.8rem;" colspan="2" class="text-capitalize"><?php echo date("m-Y"); ?></td>
  <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;"></td>
  <th style="padding:2px;font-size:0.8rem;">Challan Month</th>
  <td style="padding:2px;font-size:0.8rem;" colspan="2" class="text-capitalize"><?php echo date("m-Y"); ?></td>
  <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;"></td>
  <th style="padding:2px;font-size:0.8rem;">Challan Month</th>
  <td style="padding:2px;font-size:0.8rem;" colspan="2" class="text-capitalize"><?php echo date("m-Y"); ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.8rem;">Issue Date</th>
  <td style="padding:2px;font-size:0.8rem;" colspan="2" class="text-capitalize"><?php echo date("j-m-Y"); ?></td>
  <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;"></td>
  <th style="padding:2px;font-size:0.8rem;">Issue Date</th>
  <td style="padding:2px;font-size:0.8rem;" colspan="2" class="text-capitalize"><?php echo date("j-m-Y"); ?></td>
  <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;"></td>
  <th style="padding:2px;font-size:0.8rem;">Issue Date</th>
  <td style="padding:2px;font-size:0.8rem;" colspan="2" class="text-capitalize"><?php echo date("j-m-Y"); ?></td>
</tr>
<tr align="center">
    <th style="padding:2px;font-size:0.8rem;" colspan="3">Due Date: <?php echo date("10-m-Y l"); ?></th>
    <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;"></td>
    <th style="padding:2px;font-size:0.8rem;" colspan="3">Due Date: <?php echo date("10-m-Y l"); ?></th>
    <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;"></td>
    <th style="padding:2px;font-size:0.8rem;" colspan="3">Due Date: <?php echo date("10-m-Y l"); ?></th>
</tr>
<tr>
  <th style="padding:2px;font-size:0.8rem;">#</th>
  <th style="padding:2px;font-size:0.8rem;">Description</th>
  <th style="padding:2px;font-size:0.8rem;border-right:1px dashed black;">Amount</th>
  <th></th>
  <th style="padding:2px;font-size:0.8rem;">#</th>
  <th style="padding:2px;font-size:0.8rem;">Description</th>
  <th style="padding:2px;font-size:0.8rem;border-right:1px dashed black;">Amount</th>
  <th></th>
  <th style="padding:2px;font-size:0.8rem;">#</th>
  <th style="padding:2px;font-size:0.8rem;">Description</th>
  <th style="padding:2px;font-size:0.8rem;">Amount</th>
</tr>
  <th style="padding:2px;font-size:0.8rem;">1</th>
  <th style="padding:2px;font-size:0.8rem;">Monthly Fee</th>
  <td style="padding:2px;font-size:0.8rem;border-right:1px dashed black;"><?php echo $monthly_fee; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.8rem;">1</th>
  <th style="padding:2px;font-size:0.8rem;">Monthly Fee</th>
  <td style="padding:2px;font-size:0.8rem;border-right:1px dashed black;"><?php echo $monthly_fee; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.8rem;">1</th>
  <th style="padding:2px;font-size:0.8rem;">Monthly Fee</th>
  <td style="padding:2px;font-size:0.8rem;"><?php echo $monthly_fee; ?></td>
</tr>
<?php
$sl_prv = mysqli_query($con,"select * from fee_collection where rollno='$rollno' && instituteId='$instituteId' && challan_status='monthly' order by id desc limit 1,2");
$prvus = mysqli_fetch_assoc($sl_prv);
if(!empty($prvus['remaing_balance'])){ $remaing_balances = $prvus['remaing_balance']; }else{ $remaing_balances = "0"; }
?>
<tr>
  <th style="padding:2px;font-size:0.8rem;">2</th>
  <th style="padding:2px;font-size:0.8rem;">Arreas</th>
  <td style="padding:2px;font-size:0.8rem;border-right:1px dashed black;"><?php echo $remaing_balances; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.8rem;">2</th>
  <th style="padding:2px;font-size:0.8rem;">Arreas</th>
  <td style="padding:2px;font-size:0.8rem;border-right:1px dashed black;"><?php echo $remaing_balances; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.8rem;">2</th>
  <th style="padding:2px;font-size:0.8rem;">Arreas</th>
  <td style="padding:2px;font-size:0.8rem;"><?php echo $remaing_balances; ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.8rem;">3</th>
  <th style="padding:2px;font-size:0.8rem;">Discount</th>
  <td style="padding:2px;font-size:0.8rem;border-right:1px dashed black;"><?php echo $discounts; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.8rem;">3</th>
  <th style="padding:2px;font-size:0.8rem;">Discount</th>
  <td style="padding:2px;font-size:0.8rem;border-right:1px dashed black;"><?php echo $discounts; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.8rem;">3</th>
  <th style="padding:2px;font-size:0.8rem;">Discount</th>
  <td style="padding:2px;font-size:0.8rem;"><?php echo $discounts; ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.8rem;">4</th>
  <th style="padding:2px;font-size:0.8rem;">Fine</th>
  <td style="padding:2px;font-size:0.8rem;border-right:1px dashed black;"><?php if(date("j") >= 10){ echo $fine; } ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.8rem;">4</th>
  <th style="padding:2px;font-size:0.8rem;">Fine</th>
  <td style="padding:2px;font-size:0.8rem;border-right:1px dashed black;"><?php if(date("j") >= 10){ echo $fine; } ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.8rem;">4</th>
  <th style="padding:2px;font-size:0.8rem;">Fine</th>
  <td style="padding:2px;font-size:0.8rem;"><?php if(date("j") >= 10){ echo $fine; } ?></td>
</tr>
<tr>
  <th colspan="2" class="fs-6">Total Amount</th>
  <td class="fs-6" style="border-right:1px dashed black;"><?php echo $monthly_fee + $remaing_balances + $fine - $discounts; ?></td>
  <td></td>
  <th colspan="2" class="fs-6">Total Amount</th>
  <td class="fs-6" style="border-right:1px dashed black;"><?php echo $monthly_fee + $remaing_balances + $fine - $discounts; ?></td>
  <td></td>
  <th colspan="2" class="fs-6">Total Amount</th>
  <td class="fs-6"><?php echo $monthly_fee + $remaing_balances + $fine - $discounts; ?></td>
</tr>
<tr>
    <td style="padding:2px;font-size:0.8rem;" colspan='3'><b>Note:</b> Dues must be paid before 10th of each month.<br>Dues once paid are neither refuncdable nor adjustable in any case.</td>
                  <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;" width='20'></td>
    <td style="padding:2px;font-size:0.8rem;" colspan='3'><b>Note:</b> Dues must be paid before 10th of each month.<br>Dues once paid are neither refuncdable nor adjustable in any case.</td>
                  <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;" width='20'></td>
    <td style="padding:2px;font-size:0.8rem;" colspan='3'><b>Note:</b> Dues must be paid before 10th of each month.<br>Dues once paid are neither refuncdable nor adjustable in any case.</td>
</tr>
<tr>
    <td style="padding:2px;font-size:0.8rem;"><b>Principal:</b> _____________</td>
    <td style="padding:2px;font-size:0.8rem;" width='20'></td>
    <td style="padding:2px;font-size:0.8rem;border-right:1px dashed black;"><b>Admin:</b> _____________</td>
    <td width='20'></td>
    <td style="padding:2px;font-size:0.8rem;"><b>Principal:</b> _____________</td>
    <td style="padding:2px;font-size:0.8rem;" width='20'></td>
    <td style="padding:2px;font-size:0.8rem;border-right:1px dashed black;"><b>Admin:</b> _____________</td>
    <td width='20'></td>
    <td style="padding:2px;font-size:0.8rem;"><b>Principal:</b> _____________</td>
    <td style="padding:2px;font-size:0.8rem;" width='20'></td>
    <td style="padding:2px;font-size:0.8rem;"><b>Admin:</b> _____________</td>
</tr>
<tr style="background-color:hsl(0,0%,85%);">
    <td style="padding:2px;font-size:0.8rem;" colspan='3'><b style="font-size:0.8rem;">Address:</b> <?php echo $mainaddress; ?><b style="font-size:0.8rem;">Cell:</b> <?php echo $cell; ?></td>
    <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;" width='20'></td>
    <td style="padding:2px;font-size:0.8rem;" colspan='3'><b style="font-size:0.8rem;">Address:</b> <?php echo $mainaddress; ?><b style="font-size:0.8rem;">Cell:</b> <?php echo $cell; ?></td>
    <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;" width='20'></td>
    <td style="padding:2px;font-size:0.8rem;" colspan='3'><b style="font-size:0.8rem;">Address:</b> <?php echo $mainaddress; ?><b style="font-size:0.8rem;">Cell:</b> <?php echo $cell; ?></td>
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