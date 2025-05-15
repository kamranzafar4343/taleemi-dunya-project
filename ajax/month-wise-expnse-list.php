<?php
require_once("../functions/db.php");

$institut_ids = $_POST['institut_ids'];
$chrge_months = $_POST['chrge_months'];
$chrge_sesion = $_POST['chrge_sesion'];



$td = 1;
$selct_othr_list = mysqli_query($con,"select * from dayBook where month='$chrge_months' && session='$chrge_sesion' && institute_id='$institut_ids'");
if(mysqli_num_rows($selct_othr_list)>0){
?>
<div class="row">
    <div class="col mb-3">
<table class="w-100">
    <thead>
        
        <tr class="bg-apna" align="center">
            <th style="border:1px solid black;">#</th>
            <th style="border:1px solid black;">Date</th>
            <th style="border:1px solid black;">ID#</th>
            <th style="border:1px solid black;">Username</th>
            <th style="border:1px solid black;">Acount Type</th>
            <th style="border:1px solid black;">Narration</th>
            <th style="border:1px solid black;">Expenses</th>
            <th style="border:1px solid black;">Session</th>
            <th style="border:1px solid black;">Month</th>
        </tr>
    </thead>
    <tbody>
<?php
while($td <= 1000 && $othrs = mysqli_fetch_array($selct_othr_list)){
    $date = $othrs['date'];
    $user_id = $othrs['user_id'];
    $user_name = $othrs['user_name'];
    $account_type = $othrs['account_type'];
    $narration = $othrs['narration'];
    $expense = $othrs['expense'];
    $session = $othrs['session'];
    $months = $othrs['month'];
    $monthName = date('M', mktime(0, 0, 0, $months, 10));
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$institut_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<tr style="background-color:hsl(35,100%,80%);">
    <td style="border:1px solid black;"><?php echo $td++; ?></td>
    <td style="border:1px solid black;"><?php echo $date; ?></td>
    <td style="border:1px solid black;"><?php echo $user_id; ?></td>
    <td style="border:1px solid black;" class="text-capitalize"><?php echo $user_name; ?></td>
    <td style="border:1px solid black;" class="text-capitalize"><?php echo $account_type; ?></td>
    <td style="border:1px solid black;"><?php echo $narration; ?></td>
    <td style="border:1px solid black;"><?php echo $expense; ?></td>
    <td style="border:1px solid black;"><?php echo $session; ?></td>
    <td style="border:1px solid black;"><?php echo $monthName; ?></td>
</tr>
<?php }
$sel_othr_list = mysqli_query($con,"select SUM(expense) as totlexpnse from dayBook where month='$chrge_months' && session='$chrge_sesion' && institute_id='$institut_ids'");
while($chrgs = mysqli_fetch_array($sel_othr_list)){
    $totlexpnse = $chrgs['totlexpnse'];
}
?>
<tr style="background-color:hsl(35,100%,80%);">
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;" class="fs-4 fw-bold"><?php if(!empty($totlexpnse)){ echo $totlexpnse; }else{ echo "0"; } ?></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
</tr>
<?php
}else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; }
?>
        
    </tbody>
</table>
    </div>
</div>
