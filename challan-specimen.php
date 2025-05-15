<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#chlan-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='challan-manager'">challan manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> monthly Challan form</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_GET['id'])){
    $ids = $_GET['id'];

$sl_spec = mysqli_query($con,"select * from fee_collection where id='$ids' && instituteId='$userId' && challan_status='monthly' order by id desc");
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
    $mode_of_payment = $result['mode_of_payment'];
    $dates = $result['dates'];
    $due_dates = $result['due_dates'];
    
$b = str_replace( ',', '', $monthly_fee );
    
$frmtg = explode("-",$due_dates);

$datngs = $frmtg['2'];
$manths = $frmtg['1'];
$salls = $frmtg['0'];

$dwedate = $datngs."-".$manths."-".$salls;
    
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
}
$frmts = explode(",",$bank_account);
$bnkName = $frmts['0'];
$bnkAdres = $frmts['1'];
$bnkAcnt = $frmts['2'];

$mnth = date("m");
if($month <= 9){ 
    $mnthes = $month-1; 
    $mnths = "0".$mnthes;
$monthNaming = date('M', mktime(0, 0, 0, $mnths, 10));
}elseif($month >= 10){
    $mnthes = $month-1;
    $mnths = $mnthes; 
}

if($mnths == 00){ $mnths = 12;}

$lst_chlns = mysqli_query($con,"select * from fee_collection where rollno='$rollno' && instituteId='$userId' && month='$mnths' && session='$session'");
$chlns = mysqli_fetch_assoc($lst_chlns);
$monthly_fees = $chlns['monthly_fee'];
$fees_statuss = $chlns['fees_status'];

$sel_latfe = mysqli_query($con,"select SUM(charges_amount) as latfefund from addOtherChargesDecieded where instituteId='$userId' && type='5'");
while($fnds = mysqli_fetch_array($sel_latfe)){ 
    if(!empty($fnds['latfefund'])){ $latfefund = $fnds['latfefund']; }else{ $latfefund = "0"; }
}
?>
<div class="container mt-4 p-0">
    <div class='row' id='data'>
  <div class='col-lg-12 col-12 col-sm-12 col-md-12 col-xl-12 p-0'>
      <div class='card mb-0 datas p-0'>
        <div class='card-body p-0'>
          <table class='w-100 bg-white'>
            <tr align='center'>
              <td width='50'><img src='portal-admins/institute-logos/<?php echo $image; ?>' class='img-fluid'></td>
              <td colspan='2' style="border-right:1px dashed black;">
<div class="fs-6 fw-bold text-uppercase text-center p-0"><?php echo $instituteName; ?></div>
<div class="text-capitalize p-0 text-center" style="font-size:0.8rem;"><?php echo $campus; ?></div>
                </td>
              <td></td>
              <td width='50'><img src='portal-admins/institute-logos/<?php echo $image; ?>' class='img-fluid'></td>
              <td colspan='2' style="border-right:1px dashed black;">
<div class="fs-6 fw-bold text-uppercase text-center p-0"><?php echo $instituteName; ?></div>
<div class="text-capitalize p-0 text-center" style="font-size:0.8rem;"><?php echo $campus; ?></div>
              </td>
              <td></td>
              <td width='50'><img src='portal-admins/institute-logos/<?php echo $image; ?>' class='img-fluid'></td>
              <td colspan='2'>
<div class="fs-6 fw-bold text-uppercase text-center p-0"><?php echo $instituteName; ?></div>
<div class="text-capitalize p-0 text-center" style="font-size:0.8rem;"><?php echo $campus; ?></div>
              </td>
            </tr>
            <tr align='center'>
              <th style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan='3'><span class='text-uppercase' style="font-size:0.8rem;">Bank Copy</span></th>
              <th width='20'></th>
              <th style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan='3'><span class='text-uppercase' style="font-size:0.8rem;">Institute Copy</span></th>
              <th width='20'></th>
              <th style="padding:2px;font-size:0.7rem;" colspan='3'><span class='text-uppercase' style="font-size:0.8rem;">Parents Copy</span></th>
            </tr>
            <tr align='center'>
              <th style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan='3'><span class='text-uppercase fw-normal' style="font-size:0.7rem;"><?php echo $bnkName." ".$bnkAdres; ?></span></th>
              <th></th>
              <th style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan='3'><span class='text-uppercase fw-normal' style="font-size:0.7rem;"><?php echo $bnkName." ".$bnkAdres; ?></span></th>
              <th></th>
              <th style="padding:2px;font-size:0.7rem;" colspan='3'><span class='text-uppercase fw-normal' style="font-size:0.7rem;"><?php echo $bnkName." ".$bnkAdres; ?></span></th>
            </tr>
            <tr align='center'>
              <th style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan='3'><span class='text-uppercase fw-normal' style="font-size:0.7rem;"><?php echo $bnkAcnt; ?></span></th>
              <th></th>
              <th style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan='3'><span class='text-uppercase fw-normal' style="font-size:0.7rem;"><?php echo $bnkAcnt; ?></span></th>
              <th></th>
              <th style="padding:2px;font-size:0.7rem;" colspan='3'><span class='text-uppercase fw-normal' style="font-size:0.7rem;"><?php echo $bnkAcnt; ?></span></th>
            </tr>
            <tr align='center'>
              <th style="padding:2px;font-size:0.7rem;border:1px solid black;border-right:1px dashed black;" colspan='3'><span class='text-uppercase fs-6'><?php echo $student_name; ?></span></th>
              <th width='20'></th>
              <th style="padding:2px;font-size:0.7rem;border:1px solid black;border-right:1px dashed black;" colspan='3'><span class='text-uppercase fs-6'><?php echo $student_name; ?></span></th>
              <th width='20'></th>
              <th style="padding:2px;font-size:0.7rem;border:1px solid black;" colspan='3'><span class='text-uppercase fs-6'><?php echo $student_name; ?></span></th>
            </tr>
<tr>
  <th colspan="2" style="padding:2px;font-size:0.7rem;">Father Name</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-capitalize"><?php echo $father_name; ?></td>
  <td></td>
  <th colspan="2" style="padding:2px;font-size:0.7rem;">Father Name</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-capitalize"><?php echo $father_name; ?></td>
  <td></td>
  <th colspan="2" style="padding:2px;font-size:0.7rem;">Father Name</th>
  <td style="padding:2px;font-size:0.7rem;" class="text-capitalize"><?php echo $father_name; ?></td>
</tr>
<tr>
  <th colspan="2"style="padding:2px;font-size:0.7rem;">Roll#</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-capitalize"><?php echo $rollno; ?> (Ch# <span id="chno" style="font-size:0.7rem;"></span>)<input type="hidden" value="<?php echo rand(10,10000); ?>" id="clns"></td>
  <td></td>
  <th colspan="2"style="padding:2px;font-size:0.7rem;">Roll#</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-capitalize"><?php echo $rollno; ?> (Ch# <span id="chnos" style="font-size:0.7rem;"></span>)</td>
  <td></td>
  <th colspan="2"style="padding:2px;font-size:0.7rem;">Roll#</th>
  <td style="padding:2px;font-size:0.7rem;" class="text-capitalize"> <?php echo $rollno; ?>(Ch# <span id="cheno" style="font-size:0.7rem;"></span>)</td>
</tr>
<script>
var chln = document.getElementById('clns').value;
document.getElementById('chno').innerHTML = chln;
document.getElementById('chnos').innerHTML = chln;
document.getElementById('cheno').innerHTML = chln;
</script>
<tr>
  <th colspan="2" style="padding:2px;font-size:0.7rem;">Class & Section</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-uppercase"><?php echo $class_name." "."(".$section.")"; ?></td>
  <td></td>
  <th colspan="2" style="padding:2px;font-size:0.7rem;">Class & Section</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-uppercase"><?php echo $class_name." "."(".$section.")"; ?></td>
  <td></td>
  <th colspan="2" style="padding:2px;font-size:0.7rem;">Class & Section</th>
  <td style="padding:2px;font-size:0.7rem;" class="text-uppercase"><?php echo $class_name." "."(".$section.")"; ?></td>
</tr>
<tr>
  <th colspan="2" style="padding:2px;font-size:0.7rem;">Challan Month</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-capitalize"><?php echo $monthName; ?></td>
  <td></td>
  <th colspan="2" style="padding:2px;font-size:0.7rem;">Challan Month</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-capitalize"><?php echo $monthName; ?></td>
  <td></td>
  <th colspan="2" style="padding:2px;font-size:0.7rem;">Challan Month</th>
  <td style="padding:2px;font-size:0.7rem;" class="text-capitalize"><?php echo $monthName; ?></td>
</tr>
<tr>
  <th colspan="2" style="padding:2px;font-size:0.7rem;">Issue Date</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-capitalize"><?php if(!empty($dates)){ echo $dates; }else{ echo "Nill"; } ?></td>
  <td></td>
  <th colspan="2" style="padding:2px;font-size:0.7rem;">Issue Date</th>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" class="text-capitalize"><?php if(!empty($dates)){ echo $dates; }else{ echo "Nill"; } ?></td>
  <td></td>
  <th colspan="2" style="padding:2px;font-size:0.7rem;">Issue Date</th>
  <td style="padding:2px;font-size:0.7rem;" class="text-capitalize"><?php if(!empty($dates)){ echo $dates; }else{ echo "Nill"; } ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;" width="10">#</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Description</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;border-right:1px dashed black;">Amount (PKR)</th>
  <th></th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;" width="10">#</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Description</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;border-right:1px dashed black;">Amount (PKR)</th>
  <th></th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;" width="10">#</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Description</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Amount (PKR)</th>
</tr>
<tr>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">1</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Monthly Fee (<?php echo $monthName; ?>)</th>
  <td style="padding:2px;font-size:0.7rem;border:1px solid black;border-right:1px dashed black;">  <?php echo $b; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">1</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Monthly Fee (<?php echo $monthName; ?>)</th>
  <td style="padding:2px;font-size:0.7rem;border:1px solid black;border-right:1px dashed black;"><?php echo $b; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">1</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Monthly Fee (<?php echo $monthName; ?>)</th>
  <td style="padding:2px;font-size:0.7rem;border:1px solid black;"><?php echo $b; ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">2</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Last Month Fee</th>
    <td style="padding:2px;font-size:0.7rem;border:1px solid black;border-right:1px dashed black;">
<?php  if($fees_statuss == "Unpaid"){ echo $monthly_fees+$latfefund; }elseif($fees_statuss == "unpaid"){ echo $monthly_fees+$latfefund; }else{ echo "0"; } ?>
    </td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">2</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Last Month Fee</th>
    <td style="padding:2px;font-size:0.7rem;border:1px solid black;border-right:1px dashed black;">
<?php  if($fees_statuss == "Unpaid"){ echo $monthly_fees+$latfefund; }elseif($fees_statuss == "unpaid"){ echo $monthly_fees+$latfefund; }else{ echo "0"; } ?>
    </td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">2</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Last Month Fee</th>
  <td style="padding:2px;font-size:0.7rem;border:1px solid black;">
<?php  if($fees_statuss == "Unpaid"){ echo $monthly_fees+$latfefund; }elseif($fees_statuss == "unpaid"){ echo $monthly_fees+$latfefund; }else{ echo "0"; } ?>
    </td>
</tr>
<?php
error_reporting (E_ALL ^ E_NOTICE);
$ids='';
$sl_prv = mysqli_query($con,"select remaing_balance from fee_collection where rollno='$rollno' && instituteId='$userId' && month='$mnths' && session='$session' limit 1");
$prvus = mysqli_fetch_assoc($sl_prv);
$remaing_balances = $prvus['remaing_balance'];
?>
<tr>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">3</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Balance</th>
  <td style="padding:2px;font-size:0.7rem;border:1px solid black;border-right:1px dashed black;"><?php if(!empty($remaing_balances)){ echo $remaing_balances; }else{ echo "0"; } ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">3</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Balance</th>
  <td style="padding:2px;font-size:0.7rem;border:1px solid black;border-right:1px dashed black;"><?php if(!empty($remaing_balances)){ echo $remaing_balances; }else{ echo "0"; } ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">3</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Balance</th>
  <td style="padding:2px;font-size:0.7rem;border:1px solid black;"><?php if(!empty($remaing_balances)){ echo $remaing_balances; }else{ echo "0"; } ?></td>
</tr>
<?php
$sl_chges = mysqli_query($con,"select * from addOtherChargesDecieded where instituteId='$userId' && type='1' && class='$class'");
while($chrg = mysqli_fetch_array($sl_chges)){
    $classes = $chrg['class'];
 if(!empty($chrg['charges_amount'])){ $othr_chrges = $chrg['charges_amount']; }else{ $othr_chrges = "0"; }   
    }
?>
<tr>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">4</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;"><span class="text-capitalize" style="font-size:0.6rem;"><?php
$slchgs_title = mysqli_query($con,"select * from addOtherChargesDecieded where instituteId='$userId' && type='1' && class='$class'");
while($titls = mysqli_fetch_array($slchgs_title)){
   $charges_title = $titls['charges_title'];
 if(!empty($charges_title)){ echo $charges_title; }else{ echo "O.Charges"; }
}
  ?>
    </span>
  </th>
    <td style="padding:2px;font-size:0.7rem;border:1px solid black;border-right:1px dashed black;"><?php echo $othr_chrges; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">4</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">
<span class="text-capitalize" style="font-size:0.6rem;"><?php
$slchgs_title = mysqli_query($con,"select * from addOtherChargesDecieded where instituteId='$userId' && type='1' && class='$class'");
while($titls = mysqli_fetch_array($slchgs_title)){
 $charges_title = $titls['charges_title'];
  if(!empty($charges_title)){ echo $charges_title; }else{ echo "O.Charges"; }
}
  ?>
</span>
  </th>
  <td style="padding:2px;font-size:0.7rem;border:1px solid black;border-right:1px dashed black;"><?php echo $othr_chrges; ?></td>
  <td></td>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">4</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">
<span class="text-capitalize" style="font-size:0.6rem;"><?php
$slchgs_title = mysqli_query($con,"select * from addOtherChargesDecieded where instituteId='$userId' && type='1' && class='$class'");
while($titls = mysqli_fetch_array($slchgs_title)){
    $charges_title = $titls['charges_title'];
     if(!empty($charges_title)){ echo $charges_title; }else{ echo "O.Charges"; }
}
  ?>
</span>
  </th>
  <td style="padding:2px;font-size:0.7rem;border:1px solid black;"><?php echo $othr_chrges; ?></td>
</tr>
<tr>
  <th style="border:1px solid black;padding:2px;font-size:0.7rem;width:10px;">6</th>
  <th style="border:1px solid black;padding:2px;font-size:0.7rem;width:70px;">Fine <span style="font-size:0.5rem;">(After Due Date)</span></th>
  <td style="border:1px solid black;padding:2px;font-size:0.7rem;border-right:1px dashed black;"><?php echo $latfefund; ?></td>
  <td></td>
  <th style="border:1px solid black;padding:2px;font-size:0.7rem;width:10px;">6</th>
  <th style="border:1px solid black;padding:2px;font-size:0.7rem;width:70px;">Fine <span style="font-size:0.5rem;">(After Due Date)</span></th>
  <td style="border:1px solid black;padding:2px;font-size:0.7rem;border-right:1px dashed black;"><?php echo $latfefund; ?></td>
  <td></td>
  <th style="border:1px solid black;padding:2px;font-size:0.7rem;width:10px;">6</th>
  <th style="border:1px solid black;padding:2px;font-size:0.7rem;width:70px;">Fine <span style="font-size:0.5rem;">(After Due Date)</span></th>
  <td style="border:1px solid black;padding:2px;font-size:0.7rem;"><?php echo $latfefund; ?></td>
</tr>
<tr>
  <th colspan="2" style="border:1px solid black;font-weight:bold;">Due Date</th>
  <td class="fs-6" style="border:1px solid black;border-right:1px dashed black;">
<?php
if($fees_statuss == "Unpaid"){
echo $monthly_fees+$b+$remaing_balances+$othr_chrges+$latfefund;
}elseif($fees_statuss == "unpaid"){
    echo $monthly_fees+$b+$remaing_balances+$othr_chrges+$latfefund;
}else{
 echo $b+$remaing_balances+$othr_chrges;   
}
?>
  </td>
  <td></td>
  <th colspan="2" style="border:1px solid black;font-weight:bold;">Due Date</th>
  <td class="fs-6" style="border:1px solid black;border-right:1px dashed black;">
<?php
if($fees_statuss == "Unpaid"){
    echo $monthly_fees+$b+$remaing_balances+$othr_chrges+$latfefund;
}elseif($fees_statuss == "unpaid"){
    echo $monthly_fees+$b+$remaing_balances+$othr_chrges+$latfefund;
}else{
 echo $b+$remaing_balances+$othr_chrges;   
}
?>
  </td>
  <td></td>
  <th colspan="2" style="border:1px solid black;font-weight:bold;">Due Date</th>
  <td class="fs-6" style="border:1px solid black;">
<?php
if($fees_statuss == "Unpaid"){
    echo $monthly_fees+$b+$remaing_balances+$othr_chrges+$latfefund;
}elseif($fees_statuss == "unpaid"){
    echo $monthly_fees+$b+$remaing_balances+$othr_chrges+$latfefund;
}else{
 echo $b+$remaing_balances+$othr_chrges;   
}
?>
  </td>
</tr>
<tr>
  <th colspan="2" style="border:1px solid black;font-weight:bold;">After Due Date</th>
    <td class="fs-6" style="border:1px solid black;border-right:1px dashed black;">
<?php
if($fees_statuss == "Unpaid"){
    echo $monthly_fees+$b+$remaing_balances+$othr_chrges+$latfefund;
}elseif($fees_statuss == "unpaid"){
    echo $monthly_fees+$b+$remaing_balances+$othr_chrges+$latfefund;
}else{
 echo $b+$remaing_balances+$othr_chrges;   
}
?>
    </td>
  <td></td>
  <th colspan="2" style="border:1px solid black;font-weight:bold;">After Due Date</th>
    <td class="fs-6" style="border:1px solid black;border-right:1px dashed black;">
<?php
if($fees_statuss == "Unpaid"){
    echo $monthly_fees+$b+$remaing_balances+$othr_chrges+$latfefund;
}elseif($fees_statuss == "unpaid"){
    echo $monthly_fees+$b+$remaing_balances+$othr_chrges+$latfefund;
}else{
 echo $b+$remaing_balances+$othr_chrges;   
}
?>
    </td>
  <td></td>
  <th colspan="2" style="border:1px solid black;font-weight:bold;">After Due Date</th>
    <td class="fs-6" style="border:1px solid black;">
<?php
if($fees_statuss == "Unpaid"){
    echo $monthly_fees+$b+$remaing_balances+$othr_chrges+$latfefund;
}elseif($fees_statuss == "unpaid"){
    echo $monthly_fees+$b+$remaing_balances+$othr_chrges+$latfefund;
}else{
 echo $b+$remaing_balances+$othr_chrges;   
}
?>
    </td>
</tr>
<tr>
<td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan='3'>
    <b>Note:</b>
<ul>
    <li style="padding:2px;font-size:0.7rem;">Dues must be paid till due date <span style="padding:2px;font-size:0.7rem;" class="fw-bolder">
        (<?php if(!empty($due_dates)){ echo $dwedate; }else{ echo "Nill"; } ?>).
    </span></li>
    <li style="padding:2px;font-size:0.7rem;">After due date Fine will be Charged Rs <?php if(!empty($latfefund)){ echo $latfefund."/"; }else{ echo "_____"; } ?>.</li>
    <li style="padding:2px;font-size:0.7rem;">The Fee Challan is no longer valid after the end of the month.</li>
    <li style="padding:2px;font-size:0.7rem;">Any kind of editing on the fee challan strictly prohibited.</li>
    <li style="padding:2px;font-size:0.7rem;">We have the right to take legal action.</li>
</ul>
</td>            
<td width='20'></td>
<td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;" colspan='3'>
    <b>Note:</b> 
<ul>
    <li style="padding:2px;font-size:0.7rem;">Dues must be paid till due date <span style="padding:2px;font-size:0.7rem;" class="fw-bolder">
        (<?php if(!empty($due_dates)){ echo $dwedate; }else{ echo "Nill"; } ?>).</li>
    <li style="padding:2px;font-size:0.7rem;">After due date Fine will be Charged Rs <?php if(!empty($latfefund)){ echo $latfefund."/"; }else{ echo "_____"; } ?>.</li>
    <li style="padding:2px;font-size:0.7rem;">The Fee Challan is no longer valid after the end of the month.</li>
    <li style="padding:2px;font-size:0.7rem;">Any kind of editing on the fee challan strictly prohibited.</li>
    <li style="padding:2px;font-size:0.7rem;">We have the right to take legal action.</li>
</ul>
</td>
<td style="font-size:0.7rem;" class="px-4" colspan='4'>
    <b>Note:</b>
<ul>
    <li style="padding:2px;font-size:0.7rem;">Dues must be paid till due date <span style="padding:2px;font-size:0.7rem;" class="fw-bolder">
        (<?php if(!empty($due_dates)){ echo $dwedate; }else{ echo "Nill"; } ?>).</li>
    <li style="padding:2px;font-size:0.7rem;">After due date Fine will be Charged Rs <?php if(!empty($latfefund)){ echo $latfefund."/"; }else{ echo "_____"; } ?>.</li>
    <li style="padding:2px;font-size:0.7rem;">The Fee Challan is no longer valid after the end of the month.</li>
    <li style="padding:2px;font-size:0.7rem;">Any kind of editing on the fee challan strictly prohibited.</li>
    <li style="padding:2px;font-size:0.7rem;">We have the right to take legal action.</li>
</ul>
</td>
</tr>
<tr>
  <td style="padding:2px;font-size:0.7rem;" colspan="2"><b>Principal:</b> _____________</td>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;"><b>Admin:</b> _____________</td>
  <td width='20'></td>
  <td style="padding:2px;font-size:0.7rem;" colspan="2"><b>Principal:</b> _____________</td>
  <td style="padding:2px;font-size:0.7rem;border-right:1px dashed black;"><b>Admin:</b> _____________</td>
  <td width='20'></td>
  <td style="padding:2px;font-size:0.7rem;" colspan="2"><b>Principal:</b> _____________</td>
  <td style="padding:2px;font-size:0.7rem;"><b>Admin:</b> _____________</td>
</tr>
<tr>
    <td style="border:1px solid black;padding:2px;font-size:0.8rem;text-align:center;" colspan='3'><b style="font-size:0.8rem;">Address:</b> <?php echo $mainaddress; ?><b style="font-size:0.8rem;"><br>Cell:</b> <?php echo $cell; ?></td>
    <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;" width='20'></td>
    <td style="border:1px solid black;padding:2px;font-size:0.8rem;text-align:center;" colspan='3'><b style="font-size:0.8rem;">Address:</b> <?php echo $mainaddress; ?><b style="font-size:0.8rem;"><br>Cell:</b> <?php echo $cell; ?></td>
    <td style="padding:2px;font-size:0.8rem;border-left:1px dashed black;" width='20'></td>
    <td style="border:1px solid black;padding:2px;font-size:0.8rem;text-align:center;" colspan='3'><b style="font-size:0.8rem;">Address:</b> <?php echo $mainaddress; ?><b style="font-size:0.8rem;"><br>Cell:</b> <?php echo $cell; ?></td>
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