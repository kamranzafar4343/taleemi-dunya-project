<?php
require_once("../functions/db.php");

$aply_status = $_POST['aply_status'];
$aply_sesin = $_POST['aply_sesin'];
$colg_id = $_POST['colg_id'];
$manths = $_POST['manths'];
$monthName = date("M", mktime(0, 0, 0, $manths, 10));

$selct_schol = mysqli_query($con,"select * from confirmSchools where institute_id='$colg_id'");
$schl = mysqli_fetch_assoc($selct_schol);
$institute_name = $schl['institute_name'];
$campus = $schl['campus'];
$logos = $schl['logo'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$colg_id' && id='$aply_clas'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$tr=1;

$sl_colt = mysqli_query($con,"select * from fee_collection where session='$aply_sesin' && instituteId='$colg_id' && month='$manths' && fees_status='$aply_status' order by receive_date asc");
if(mysqli_num_rows($sl_colt)>0){
?>
<div class="row">
    <div class="col-12 mb-3">
<table class="w-100" style='background:hsl(35, 100%, 80%);'>
    <thead>
         <tr>
            <th width="50">
<img class="img-fluid" src="portal-admins/institute-logos/<?php echo $logos; ?>" style="width:100%;">
            </th>
            <th colspan="18">
<h3 class="fs-3 fw-bolder text-uppercase text-center"><?php echo $institute_name; ?></h3>
<div class="text-center"><?php echo $campus; ?></div>
            </th>
        </tr>
        <tr>
            <th colspan="19" class="text-uppercase fs-6 fw-bold text-center" style="border:1px solid hsl(0,0%,0%);">
Class Wise Month of "<?php echo $monthName; ?>" Fee Collection Record Session (<?php echo $aply_sesin; ?>)
            </th>
        </tr>
        <tr>
            <th colspan="2">Class</th>
            <td colspan="2" class="text-capitalize"><?php echo $class_name; ?></td>
            <th colspan="1">Section</th>
            <td colspan="2" class="text-capitalize"><?php echo $aply_sectin; ?></td>
            <th colspan="2">Month</th>
            <td colspan="2" class="text-capitalize"><?php echo $monthName; ?></td>
            <th colspan="2">Session</th>
            <td colspan="2"><?php echo $aply_sesin; ?></td>
            <th colspan="2">Status</th>
            <td colspan="2" class="text-capitalize"><?php echo $aply_status; ?></td>
        </tr>
        <tr class="bg-apna">
            <th>#</th>
            <th>Date</th>
            <th>Roll#</th>
            <th>Image</th>
            <th>Student Name</th>
            <th>Class</th>
            <th>Section</th>
            <th>Session</th>
            <th>M.Fee</th>
            <th>Pre.Fee</th>
            <th>Disc.</th>
            <th>Fine</th>
            <th>O.Charges</th>
            <th>Mode</th>
            <th>T.Amount</th>
            <th>Received</th>
            <th>Balance</th>
            <th>Status</th>
            <th>Month</th>
        </tr>
    </thead>
    <tbody>
<?php
while($tr <= 100000 && $colct = mysqli_fetch_array($sl_colt)){
    $dates = $colct['dates'];
    $receive_date = $colct['receive_date'];
    $rollno = $colct['rollno'];
    $student_imgs = $colct['student_imgs'];
    $student_name = $colct['student_name'];
    $class = $colct['class'];
    $section = $colct['section'];
    $session = $colct['session'];
    $monthly_fee = $colct['monthly_fee'];
    $previous_balance = $colct['previous_balance'];
    $discounts = $colct['discounts'];
    $fine = $colct['fine'];
    $other_charges = $colct['other_charges'];
    $total_amount = $colct['total_amount'];
    $receive_monthly = $colct['receive_monthly'];
    $remaing_balance = $colct['remaing_balance'];
    $account_type = $colct['account_type'];
    $fees_status = $colct['fees_status'];
    $month = $colct['month'];
    $monthNames = date("M", mktime(0, 0, 0, $month, 10));

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$colg_id' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$selct_incme = mysqli_query($con,"select SUM(other_charges) as totlincme from fee_collection where session='$aply_sesin' && instituteId='$colg_id' && month='$manths' && fees_status='$aply_status'");
while($icm = mysqli_fetch_array($selct_incme)){
    $totlincme = $icm['totlincme'];
}
$selct_expnse = mysqli_query($con,"select SUM(receive_monthly) as totlexpnse from fee_collection where session='$aply_sesin' && instituteId='$colg_id' && month='$manths' && fees_status='$aply_status'");
while($exprn = mysqli_fetch_array($selct_expnse)){
    $totlexpnse = $exprn['totlexpnse'];
}

$selct_mnfee = mysqli_query($con,"select SUM(monthly_fee) as mhanafee from fee_collection where session='$aply_sesin' && instituteId='$colg_id' && month='$manths' && fees_status='$aply_status'");
while($mfee = mysqli_fetch_array($selct_mnfee)){
    $mhanafee = $mfee['mhanafee'];
}
?>
<tr>
    <th style="border:1px solid hsl(0,0%,0%);"><?php echo $tr++; ?></th>
    <th style="border:1px solid hsl(0,0%,0%);"><?php echo $receive_date; ?></th>
    <th style="border:1px solid hsl(0,0%,0%);"><?php echo $rollno; ?></th>
    <td style="border:1px solid hsl(0,0%,0%);" width="30">
        <img src="student_imgs/<?php echo $student_imgs; ?>" class="img-fluid">
    </td>
    <td style="border:1px solid hsl(0,0%,0%);" class="text-capitalize"><?php echo $student_name; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);" class="text-capitalize"><?php echo $class_name; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);" class="text-capitalize"><?php echo $section; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $session; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $monthly_fee; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $previous_balance; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $discounts; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $fine; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $other_charges; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $account_type; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $total_amount; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $receive_monthly; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $remaing_balance; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);" class="text-capitalize"><?php echo $fees_status; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $monthNames; ?></td>
</tr>
<?php } 
if($aply_status == "paid"){
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td colspan="5" style="border:1px solid hsl(0,0%,0%);font-size:1.5rem;font-weight:bolder;">Total Other Charges</td>
    <td colspan="4" style="border:1px solid hsl(0,0%,0%);font-size:1.5rem;font-weight:bolder;"><?php echo $totlincme; ?></td>
    <td colspan="5" style="border:1px solid hsl(0,0%,0%);font-size:1.5rem;font-weight:bolder;">Total Receivings</td>
    <td colspan="4" style="border:1px solid hsl(0,0%,0%);font-size:1.5rem;font-weight:bolder;"><?php echo $totlexpnse; ?></td>
</tr>
<?php }else{ ?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td colspan="9" style="border:1px solid hsl(0,0%,0%);font-size:1.5rem;font-weight:bolder;">Total Monthly Fee</td>
    <td colspan="9" style="border:1px solid hsl(0,0%,0%);font-size:1.5rem;font-weight:bolder;"><?php echo $mhanafee; ?></td>
</tr>
<?php }?>
    </tbody>
</table>
    </div>
</div>
<?php
}else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; }
?>