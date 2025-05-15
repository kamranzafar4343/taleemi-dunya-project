<?php
require_once("../functions/db.php");

$aply_cles = $_POST['aply_cles'];
$aply_sectn = $_POST['aply_sectn'];
$inst_ids = $_POST['inst_ids'];
$sesin_yers = $_POST['aply_sesin'];
$aply_mnths = $_POST['aply_mnths'];
if($aply_mnths > 9){ $mnths = $aply_mnths; }else{ $mnths = $aply_mnths-1; }
$inst_logo = $_POST['inst_logo'];
$inst_names = $_POST['inst_names'];
$inst_acnt = $_POST['inst_acnt'];

$sel_inst = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_ids'");
$scol = mysqli_fetch_assoc($sel_inst);
$institute_id = $scol['institute_id'];
$institute_name = $scol['institute_name'];
$campus = $scol['campus'];
$fmcels = $scol['cell'];
$address = $scol['address'];
$account_detail = $scol['account_detail'];
?>
<div class='row'>
  <div class='col-lg-12 col-12 col-sm-12 col-md-12 col-xl-12 datas'>
      <div class='card mb-0 p-0' style="border:none;">
        <div class='card-body'>
<div class="row">
<?php
$chls = rand(10,10219);
$at = $chls;
$tio = 1;
$sl_spec = mysqli_query($con,"select * from fee_collection where class='$aply_cles' && section='$aply_sectn' && session='$sesin_yers' && instituteId='$inst_ids' && month='$aply_mnths'");
if(mysqli_num_rows($sl_spec)>0){
while($tio<= 100000 && $at <= 10000000000000 && $result = mysqli_fetch_assoc($sl_spec)){
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
    
    $monthly_fees = str_replace( ',', '', $monthly_fee );
    
    $finlAmnt = $monthly_fees + $fine + $total_amount;
    $fees_status = $result['fees_status'];
    $month = $result['month'];
    $challan_status = $result['challan_status'];
    $instituteId = $result['instituteId'];
    $remarks = $result['remarks'];
    $dates = $result['dates'];
    $fomtgs = explode("-",$dates);
    $tareekh = $fomtgs['0'];
    $mahinas = $fomtgs['1'];
    $saals = $fomtgs['2'];
    $monthName = date('F', mktime(0, 0, 0, $month, 10));
    $due_dates = $result['due_dates'];
    $fomts = explode("-",$due_dates);
    $tarekh = $fomts['2'];
    $mahina = $fomts['1'];
    $saal = $fomts['0'];
    $dusdts = $tarekh."-".$mahina."-".$saal;

$sel_fesv = mysqli_query($con,"select monthlyFee from addStudents where instituteId='$inst_ids' && roll_num='$rollno'");
$resltes = mysqli_fetch_assoc($sel_fesv);
$relfee = $resltes['monthlyFee'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$sel_latfe = mysqli_query($con,"select SUM(charges_amount) as latfefund from addOtherChargesDecieded where instituteId='$inst_ids' && type='5'");
while($fnds = mysqli_fetch_array($sel_latfe)){ 
    if(!empty($fnds['latfefund'])){ $latfefund = $fnds['latfefund']; }else{ $latfefund = "0"; }
}

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

$lst_chlns = mysqli_query($con,"select * from fee_collection where rollno='$rollno' && instituteId='$inst_ids' && month='$mnths' && session='$sesin_yers'");
$chlns = mysqli_fetch_assoc($lst_chlns);
$lastmonth_fees = $chlns['monthly_fee'];
$fees_statuss = $chlns['fees_status'];
?>
<div class="col-6" style="height:520px;overflow:hidden;border-right:1px dashed black;">
<table class='w-100 bg-white'>
            <tr align='center'>
<td width='20'><img src='portal-admins/institute-logos/<?php echo $inst_logo; ?>' class='img-fluid'></td>
<td colspan='5'><span class="fw-bold text-capitalize" style="font-size:1.2rem;"><?php echo $inst_names; ?></span></td>
            </tr>
            <tr align='center'>
<th style="padding:2px;font-size:0.6rem;" colspan='6'><span class='text-uppercase' style="font-size:0.6rem;">Student Copy</span></th>
            </tr>
            <tr align='center'>
<th style="padding:2px;font-size:0.6rem;" colspan='6'><span class='text-uppercase fw-normal' style="font-size:0.6rem;"><?php echo $inst_acnt; ?></span></th>
            </tr>
                       <tr>
<th style="padding:2px;font-size:0.6rem;" colspan="2">Student Name</th>
<td style="padding:2px;font-size:0.6rem;" colspan="2" class="text-capitalize"><?php echo $student_name; ?></td>
<th style="padding:2px;font-size:0.6rem;">Due Date</th>
<td style="padding:2px;font-size:0.6rem;" class="text-capitalize"><?php echo $dusdts; ?></td>
            </tr>
<tr>
  <th style="padding:2px;font-size:0.6rem;" colspan="2">Father Name</th>
  <td style="padding:2px;font-size:0.6rem;" class="text-capitalize" colspan="2"><?php echo $father_name; ?></td>
  <th style="padding:2px;font-size:0.6rem;">Roll#</th>
  <td style="padding:2px;font-size:0.6rem;" class="text-capitalize"><?php echo $rollno; ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.6rem;" colspan="2">Class & Section</th>
  <td style="padding:2px;font-size:0.6rem;" class="text-uppercase" colspan="2"><?php echo $class_name." "."(".$section.")"; ?></td>
  <th style="padding:2px;font-size:0.6rem;">C.Month</th>
  <td style="padding:2px;font-size:0.6rem;" class="text-capitalize"><?php if(!empty($month)){ echo $monthName; }else{ echo "Nill"; } ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.6rem;border:1px solid black;">#</th>
  <th style="padding:2px;font-size:0.6rem;border:1px solid black;" colspan="3">Description</th>
  <th style="padding:2px;font-size:0.6rem;border:1px solid black;" colspan="2">Amount</th>
</tr>
<tr>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;" width="10">1</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;" colspan="3">M.Fee (<?php echo $monthName; ?>)</th>
    <td style="padding:2px;font-size:0.7rem;border:1px solid black;" colspan="2"><?php echo $monthly_fee; ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">2</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;" colspan="3">Last M.Fee</th>
  <td style="padding:2px;font-size:0.7rem;border:1px solid black;" colspan="2">
<?php  if($fees_statuss == "Unpaid"){ echo $lastmonth_fees."+".$latfefund." (Fine) = ".$latfefund+$lastmonth_fees; }elseif($fees_statuss == "unpaid"){
echo $lastmonth_fees."+".$latfefund." (Fine) = ".$latfefund+$lastmonth_fees;
}else{ echo "0"; } ?>
    </td>
</tr>
<?php
error_reporting (E_ALL ^ E_NOTICE);
$ids='';
$sl_prv = mysqli_query($con,"select remaing_balance from fee_collection where rollno='$rollno' && instituteId='$inst_ids' && month='$mnths' && session='$sesin_yers' limit 1");
$prvus = mysqli_fetch_assoc($sl_prv);
$remaing_balances = $prvus['remaing_balance'];
?>
<tr>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">3</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;" colspan="3">Balance</th>
  <td style="padding:2px;font-size:0.7rem;border:1px solid black;" colspan="2"><?php if(!empty($remaing_balances)){ echo $remaing_balances; }else{ echo "0"; } ?></td>
</tr>
<?php
$sl_chges = mysqli_query($con,"select * from addOtherChargesDecieded where instituteId='$inst_ids' && type='1' && class='$class'");
while($chrg = mysqli_fetch_array($sl_chges)){
 $othr_chrges = $chrg['charges_amount'];   
    }
$slchgs_title = mysqli_query($con,"select * from addOtherChargesDecieded where instituteId='$inst_ids' && type='1' && class='$class'");
while($titls = mysqli_fetch_array($slchgs_title)){
 $charges_title = $titls['charges_title'];
}
?>
<tr>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">4</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;" colspan="3">
<span class="text-capitalize" style="font-size:0.6rem;">
    <?php if(!empty($charges_title)){ echo $charges_title; }else{ echo "O.Charges"; } ?>
</span>
  </th>
  <td style="padding:2px;font-size:0.7rem;border:1px solid black;" colspan="2"><?php if(!empty($othr_chrges)){ echo $othr_chrges; }else{ echo "0"; } ?></td>
</tr>
<tr>
  <th style="border:1px solid black;padding:2px;font-size:0.7rem;width:10px;">5</th>
  <th style="border:1px solid black;padding:2px;font-size:0.7rem;width:70px;" colspan="3">Fine <span style="font-size:0.5rem;">(After Due Date)</span></th>
  <td style="border:1px solid black;padding:2px;font-size:0.7rem;" colspan="2"><?php echo $latfefund; ?></td>
</tr>
<tr>
  <th style="border:1px solid black;font-weight:bold;font-size:0.8rem;" colspan="4">Due Date</th>
    <td class="fs-6" style="border:1px solid black;" colspan="2">
      <?php
if($fees_statuss == "Unpaid"){
    echo $monthly_fees+$remaing_balances+$othr_chrges+$lastmonth_fees+$latfefund;
}elseif($fees_statuss == "unpaid"){
    echo $monthly_fees+$remaing_balances+$othr_chrges+$lastmonth_fees+$latfefund;
}else{
 echo $monthly_fees+$remaing_balances+$othr_chrges;   
}
 
      ?>
    </td>
</tr>
<tr>
  <th style="border:1px solid black;font-weight:bold;font-size:0.8rem;" colspan="4">After Due Date</th>
  <td class="fs-6" style="border:1px solid black;" colspan="2">
  <?php  
$latdte = date("d");
 if($fees_statuss == "Unpaid"){
    if($latdte >= $tarekh){
echo $monthly_fees+$remaing_balances+$othr_chrges+$lastmonth_fees+$latfefund+$latfefund;
    }elseif($latdte <= $tarekh){
echo $monthly_fees+$remaing_balances+$othr_chrges+$lastmonth_fees+$latfefund+$latfefund;
    }else{
        echo "Please Contact Your Developer";
    }
}elseif($fees_statuss == "unpaid"){
    if($latdte >= $tarekh){
echo $monthly_fees+$remaing_balances+$othr_chrges+$lastmonth_fees+$latfefund+$latfefund;
    }elseif($latdte <= $tarekh){
echo $monthly_fees+$remaing_balances+$othr_chrges+$lastmonth_fees+$latfefund+$latfefund;
    }else{
        echo "Please Contact Your Developer";
    }
}else{
    echo $monthly_fees+$remaing_balances+$othr_chrges+$latfefund;   
}  
  ?>
  </td>
</tr>
<tr>
  <td style="padding:2px;font-size:0.7rem;" colspan="3"><b>Principal:</b> _____________</td>
  <td style="padding:2px;font-size:0.7rem;" colspan="4"><b>Admin:</b> _____________</td>
</tr>
<tr>
    <td style="border:1px solid black;padding:2px;font-size:0.7rem;text-align:center;" colspan='6'><b style="font-size:0.7rem;">Address:</b> <?php echo $mainaddress; ?><b style="font-size:0.7rem;">Cell: </b> <?php echo $cell; ?></td>
</tr>
<tr><th colspan="8" style="border-bottom:1px dashed black;"></th></tr>
<tr><th colspan="4"></th></tr>
<tr align='center'>
    <th style="padding:2px;" colspan='6'><span class='text-uppercase' style="font-size:0.6rem;">Office Copy</span></th>
</tr>
            <tr>
<th style="padding:2px;font-size:0.6rem;" colspan="2">Student Name</th>
<td style="padding:2px;font-size:0.6rem;" class="text-capitalize" colspan="2"><?php echo $student_name; ?></td>
<th style="padding:2px;font-size:0.6rem;">Father Name</th>
  <td style="padding:2px;font-size:0.6rem;" class="text-capitalize"><?php echo $father_name; ?></td>
            </tr>
<tr>
    <th style="padding:2px;font-size:0.6rem;"colspan="2">Roll#</th>
    <td style="padding:2px;font-size:0.6rem;"colspan="2" class="text-capitalize"><?php echo $rollno; ?></td>
    <th style="padding:2px;font-size:0.6rem;">Due Date</th>
<td style="padding:2px;font-size:0.6rem;" class="text-capitalize"><?php echo $dusdts; ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.6rem;" colspan="2">Class & Section</th>
  <td style="padding:2px;font-size:0.6rem;" colspan="2" class="text-uppercase"><?php echo $class_name." "."(".$section.")"; ?></td>
  <th style="padding:2px;font-size:0.6rem;">C.Month</th>
  <td style="padding:2px;font-size:0.6rem;" class="text-capitalize"><?php if(!empty($month)){ echo $monthName; }else{ echo "Nill"; } ?></td>
</tr>
<tr>
  <th style="font-size:0.6rem;" colspan="2">Total Amount</th>
  <td style="font-size:0.6rem;" colspan="2">___________</td>
  <th style="font-size:0.6rem;">Balance: </th>
  <td style="font-size:0.6rem;">_________________</td>
</tr>
<tr>
    <td class="text-uppercase" style="border:1px solid black;padding:2px;font-size:0.8rem;text-align:center;" colspan='6'>
        <b style="font-size:0.8rem;">Address:</b> <?php echo $address; ?><b style="font-size:0.8rem;"><br>Cell:</b> <?php echo $fmcels; ?>
    </td>
</tr>
    </table>
    </div>
<?php 
    }
}else{
    echo "<div class='alert alert-danger'>There are no Challan Found!</div>";
}
?>
</div>
        </div>
      </div>
</div>
 </div>