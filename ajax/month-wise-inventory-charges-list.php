<?php
require_once("../functions/db.php");

$institut_ids = $_POST['institut_ids'];
$chrge_months = $_POST['chrge_months'];
$chrge_sesion = $_POST['chrge_sesion'];

$td = 1;

$selct_othr_list = mysqli_query($con,"select * from otherChargesPaid where months='$chrge_months' && instituteId='$institut_ids' && type='3'");
if(mysqli_num_rows($selct_othr_list)>0){
?>
<div class="row">
    <div class="col mb-3">
<table class="w-100">
    <thead>
        <tr class="bg-apna" align="center">
            <th style="border:1px solid black;">#</th>
            <th style="border:1px solid black;">Roll#</th>
            <th style="border:1px solid black;">Student Name</th>
            <th style="border:1px solid black;">Charges</th>
            <th style="border:1px solid black;">T.Amount</th>
            <th style="border:1px solid black;">Receive</th>
            <th style="border:1px solid black;">Balance</th>
            <th style="border:1px solid black;">Type</th>
            <th style="border:1px solid black;">Month</th>
        </tr>
    </thead>
    <tbody>
<?php
while($td <= 1000 && $othrs = mysqli_fetch_array($selct_othr_list)){
    $roll_number = $othrs['roll_number'];
    $student_name = $othrs['student_name'];
    $charges_name = $othrs['charges_name'];
    $total_amount = $othrs['total_amount'];
    $receive_amount = $othrs['receive_amount'];
    $balance_amount = $othrs['balance_amount'];
    $type = $othrs['type'];
    $months = $othrs['months'];
    $monthName = date('M', mktime(0, 0, 0, $month, 10));
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$institut_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<tr style="background-color:hsl(35,100%,80%);">
    <td style="border:1px solid black;"><?php echo $td++; ?></td>
    <td style="border:1px solid black;"><?php echo $roll_number; ?></td>
    <td style="border:1px solid black;" class="text-capitalize"><?php echo $student_name; ?></td>
    <td style="border:1px solid black;" class="text-capitalize"><?php echo $charges_name; ?></td>
    <td style="border:1px solid black;"><?php echo $total_amount; ?></td>
    <td style="border:1px solid black;"><?php echo $receive_amount; ?></td>
    <td style="border:1px solid black;"><?php echo $balance_amount; ?></td>
    <td style="border:1px solid black;"><?php echo $type; ?></td>
    <td style="border:1px solid black;"><?php echo $monthName; ?></td>
</tr>
<?php }
$sel_othr_list = mysqli_query($con,"select * from otherChargesPaid where months='$chrge_months' && instituteId='$institut_ids' && type='3'");
while($chrgs = mysqli_fetch_array($sel_othr_list)){
    $othrschrgs = $chrgs['recveschrgs'];
}
?>
<tr style="background-color:hsl(35,100%,80%);">
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;" class="text-capitalize"></td>
    <td style="border:1px solid black;" class="text-capitalize"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;" class="text-capitalize"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"><?php if(!empty($othrschrgs)){ echo $othrschrgs; }else{ echo "0"; } ?></td>
    <td style="border:1px solid black;"></td>
</tr>
<?php
}else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; }
?>
        
    </tbody>
</table>
    </div>
</div>
