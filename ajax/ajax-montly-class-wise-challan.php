<?php
require_once("../functions/db.php");

$inst_id = $_POST['inst_id'];
$sesin_yers = $_POST['sesin_yer'];
$month_name = $_POST['month_name'];
$aply_class = $_POST['aply_class'];
$aply_sectin = $_POST['aply_sectin'];

$sl_schol = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_id'");
$reslt = mysqli_fetch_assoc($sl_schol);
$institute_name = $reslt['institute_name'];
$logo = $reslt['logo'];
$campus = $reslt['campus'];
$fmcels = $reslt['cell'];
$address = $reslt['address'];
$account_detail = $reslt['account_detail'];

$chls = rand(10,10219);
$chlnno = $chls;
$tio = 1;

$sl_spec = mysqli_query($con,"select * from fee_collection where class='$aply_class' && section='$aply_sectin' && session='$sesin_yers' && instituteId='$inst_id' && month='$month_name'");
if(mysqli_num_rows($sl_spec)>0){
    ?>
<div class="row">
<?php
    while($tio<= 100000 && $chlnno <= 10000000000000 && $result = mysqli_fetch_assoc($sl_spec)){
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
    
    
$sel_fesv = mysqli_query($con,"select monthlyFee from addStudents where instituteId='$inst_id' && roll_num='$rollno'");
$resltes = mysqli_fetch_assoc($sel_fesv);
$relfee = $resltes['monthlyFee'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_id' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$sel_latfe = mysqli_query($con,"select SUM(charges_amount) as latfefund from addOtherChargesDecieded where instituteId='$inst_id' && type='5'");
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

$lst_chlns = mysqli_query($con,"select * from fee_collection where rollno='$rollno' && instituteId='$inst_id' && month='$mnths' && session='$sesin_yers'");
$chlns = mysqli_fetch_assoc($lst_chlns);
$lastmonth_fees = $chlns['monthly_fee'];
$fees_statuss = $chlns['fees_status'];

?>
<div class='col-4 mb-3' style="height:700px;overflow:hidden;">
          <table class='w-100 bg-white'>
            <tr align='center'>
              <td width='30'><img src='portal-admins/institute-logos/<?php echo $logo; ?>' class='img-fluid'></td>
              <td colspan='2' style="border-right:1px dashed black;">
<div class="fs-6 fw-bold text-uppercase text-center p-0"><?php echo $institute_name; ?></div>
<div class="text-capitalize p-0 text-center" style="font-size:0.8rem;"><?php echo $campus; ?></div>
                </td>
            </tr>
            <tr align='center'>
              <th width='20'></th>
              <th style="padding:2px;font-size:0.7rem;" colspan='3'><span class='text-uppercase fw-bolder' style="font-size:0.9rem;">Parents Copy</span></th>
            </tr>
            <tr align='center'>
              <th style="padding:2px;font-size:0.7rem;" colspan='3'><span class='text-uppercase' style="font-size:0.7rem;"><?php echo $account_detail; ?></span></th>
            </tr>
            <tr align='center'>
              <th style="padding:2px;font-size:0.7rem;border:1px solid black;border-right:1px dashed black;" colspan='3'><span class='text-uppercase fs-6'><?php echo $student_name; ?></span></th>
            </tr>
<tr>
  <th colspan="2" style="padding:2px;font-size:0.7rem;">Father Name</th>
  <td style="padding:2px;font-size:0.7rem;" class="text-capitalize"><?php echo $father_name; ?></td>
</tr>
<tr>
  <th colspan="2"style="padding:2px;font-size:0.7rem;">Roll#</th>
  <td style="padding:2px;font-size:0.7rem;" class="text-capitalize"> <?php echo $rollno; ?> (Ch# <span style="font-size:0.7rem;"><?php echo $chlnno++; ?></span>)</td>
</tr>
<tr>
  <th colspan="2" style="padding:2px;font-size:0.7rem;">Class & Section</th>
  <td style="padding:2px;font-size:0.7rem;" class="text-uppercase"><?php echo $class_name." "."(".$section.")"; ?></td>
</tr>
<tr>
  <th colspan="2" style="padding:2px;font-size:0.7rem;">Challan Month</th>
  <td style="padding:2px;font-size:0.7rem;" class="text-capitalize"><?php echo $monthName; ?></td>
</tr>
<tr>
  <th colspan="2" style="padding:2px;font-size:0.7rem;">Issue Date</th>
  <td style="padding:2px;font-size:0.7rem;" class="text-capitalize"><?php if(!empty($dates)){ echo $dates; }else{ echo "Nill"; } ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;" width="10">#</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Description</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Amount (PKR)</th>
</tr>
<tr>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;" width="10">1</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">M.Fee (<?php echo $monthName; ?>)</th>
    <td style="padding:2px;font-size:0.7rem;border:1px solid black;"><?php echo $monthly_fees; ?></td>
</tr>
<tr>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">2</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Last M.Fee</th>
  <td style="padding:2px;font-size:0.7rem;border:1px solid black;">
<?php  if($fees_statuss == "Unpaid"){ echo $lastmonth_fees."+".$latfefund." (Fine) = ".$latfefund+$lastmonth_fees; }elseif($fees_statuss == "unpaid"){
echo $lastmonth_fees."+".$latfefund." (Fine) = ".$latfefund+$lastmonth_fees;
}else{ echo "0"; } ?>
    </td>
</tr>
<?php
error_reporting (E_ALL ^ E_NOTICE);
$ids='';
$sl_prv = mysqli_query($con,"select remaing_balance from fee_collection where rollno='$rollno' && instituteId='$inst_id' && month='$mnths' && session='$sesin_yers' limit 1");
$prvus = mysqli_fetch_assoc($sl_prv);
$remaing_balances = $prvus['remaing_balance'];
?>
<tr>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">3</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">Balance</th>
  <td style="padding:2px;font-size:0.7rem;border:1px solid black;"><?php if(!empty($remaing_balances)){ echo $remaing_balances; }else{ echo "0"; } ?></td>
</tr>
<?php
$sl_chges = mysqli_query($con,"select * from addOtherChargesDecieded where instituteId='$inst_id' && type='1' && class='$class'");
while($chrg = mysqli_fetch_array($sl_chges)){
 $othr_chrges = $chrg['charges_amount'];   
    }
$slchgs_title = mysqli_query($con,"select * from addOtherChargesDecieded where instituteId='$inst_id' && type='1' && class='$class'");
while($titls = mysqli_fetch_array($slchgs_title)){
 $charges_title = $titls['charges_title'];
}
?>
<tr>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">4</th>
  <th style="padding:2px;font-size:0.7rem;border:1px solid black;">
<span class="text-capitalize" style="font-size:0.6rem;">
    <?php if(!empty($charges_title)){ echo $charges_title; }else{ echo "O.Charges"; } ?>
</span>
  </th>
  <td style="padding:2px;font-size:0.7rem;border:1px solid black;">
<?php if(!empty($othr_chrges)){ echo $othr_chrges; }else{ echo "0"; } ?>
  </td>
</tr>
<tr>
  <th style="border:1px solid black;padding:2px;font-size:0.7rem;width:10px;">5</th>
  <th style="border:1px solid black;padding:2px;font-size:0.7rem;width:70px;">Fine <span style="font-size:0.5rem;">(After Due Date)</span></th>
  <td style="border:1px solid black;padding:2px;font-size:0.7rem;"><?php echo $latfefund; ?></td>
</tr>
<tr>
  <th colspan="2" style="border:1px solid black;font-weight:bold;">Due Date</th>
    <td class="fs-6" style="border:1px solid black;">
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
  <th colspan="2" style="border:1px solid black;font-weight:bold;">After Due Date</th>
  <td class="fs-6" style="border:1px solid black;">
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
    <td style="font-size:0.7rem;" class="px-4" colspan='4'>
        <b>Note:</b>
    <ul>
        <li style="padding:2px;font-size:0.7rem;">Dues must be paid till due date <span style="padding:2px;font-size:0.7rem;" class="fw-bolder">
            (<?php if(!empty($due_dates)){ echo $dusdts; }else{ echo "Nill"; } ?>).</li>
        <li style="padding:2px;font-size:0.7rem;">After due date Fine will be Charged Rs <?php if(!empty($latfefund)){ echo $latfefund."/"; }else{ echo "_____"; } ?>.</li>
        <li style="padding:2px;font-size:0.7rem;">The Fee Challan is no longer valid after the end of the month.</li>
        <li style="padding:2px;font-size:0.7rem;">Any kind of editing on the fee challan strictly prohibited.</li>
        <li style="padding:2px;font-size:0.7rem;">We have the right to take legal action.</li>
    </ul>
    </td>
</tr>
<tr>
  <td style="padding:2px;font-size:0.7rem;" colspan="2"><b>Principal:</b> _____________</td>
  <td style="padding:2px;font-size:0.7rem;"><b>Admin:</b> _____________</td>
</tr>
<tr>
    <td class="text-uppercase" style="border:1px solid black;padding:2px;font-size:0.8rem;text-align:center;" colspan='3'><b style="font-size:0.8rem;">Address:</b> <?php echo $address; ?><b style="font-size:0.8rem;"><br>Cell:</b> <?php echo $fmcels; ?></td>
</tr>
          </table>
</div>
<?php } ?>
    </div>
<?php }else{ echo "<div class='alert alert-danger text-capitalize'>there are no record found!</div>"; } ?>