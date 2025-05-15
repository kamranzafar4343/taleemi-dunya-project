<?php
require_once("../functions/db.php");

$rol_nbr = $_POST['rol_nbr'];
$inst_id = $_POST['inst_id'];
$user_role = $_POST['user_role'];
$chose_month = $_POST['chose_month'];
$monthName = date("F", strtotime($chose_month));
$aply_sesins = $_POST['aply_sesins'];

$cnfrm_schol = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_id'");
$schl = mysqli_fetch_assoc($cnfrm_schol);
$institute_name = $schl['institute_name'];
$campus = $schl['campus'];
$logos = $schl['logo'];
$schl_cell = $schl['cell'];

$selct_chrges = mysqli_query($con,"select * from otherChargesPaid where instituteId='$inst_id' && months='$chose_month' && roll_number='$rol_nbr' && session='$aply_sesins'");
$rows = mysqli_fetch_array($selct_chrges);

$student_name = $rows['student_name'];
$class = $rows['class'];
$section = $rows['section'];
$roll_number = $rows['roll_number'];
$chrge_date = $rows['chrge_date'];
$receiptNo = $rows['receiptNo'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_id' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col datas">
            <table class="bg-apna-body w-100">
<tr align="center">
    <th width="40">
        <img src="portal-admins/institute-logos/<?php echo $logos; ?>" class="img-fluid">
    </th>
    <th colspan="3" class="fs-3 text-uppercase fw-bold"><?php echo $institute_name; ?></th>
</tr>
<tr align="center">
    <th colspan="6">Month Wise Other Charges Slip</th>
</tr>
<tr>
    <th style="border:1px solid hsl(0,0%,0%);" class="text-capitalize" colspan="2">Student Name</th>
    <td style="border:1px solid hsl(0,0%,0%);" class="text-capitalize"><?php echo $student_name; ?></td>
    <th style="border:1px solid hsl(0,0%,0%);" class="text-capitalize">Class / Section</th>
    <td style="border:1px solid hsl(0,0%,0%);" class="text-capitalize"><?php echo $class_name." / ".$section; ?></td>
</tr>
<tr>
    <th style="border:1px solid hsl(0,0%,0%);" class="text-capitalize" colspan="2">Month</th>
    <td style="border:1px solid hsl(0,0%,0%);" class="text-capitalize"><?php echo $monthName; ?></td>
    <th style="border:1px solid hsl(0,0%,0%);" class="text-capitalize">Roll#</th>
    <td style="border:1px solid hsl(0,0%,0%);" class="text-capitalize"><?php echo $roll_number; ?></td>
</tr>
<tr>
    <th>#</th>
    <th>Charges Title</th>
    <th>Amount</th>
    <th>Received</th>
    <th>Balance</th>
</tr>
<?php
$as=1;
$selct_chrgs = mysqli_query($con,"select * from otherChargesPaid where instituteId='$inst_id' && months='$chose_month' && roll_number='$rol_nbr' && session='$aply_sesins'");
if(mysqli_num_rows($selct_chrgs)>0){
    while($as <= 100000 && $ows = mysqli_fetch_array($selct_chrgs)){
        $charges_name = $ows['charges_name'];
        $total_amount = $ows['total_amount'];
        $receive_amount = $ows['receive_amount'];
        $grandTotal = $ows['grandTotal'];
?>
<tr>
    <th><?php echo $as++; ?></th>
    <td><?php echo $charges_name; ?></td>
    <td><?php echo $total_amount; ?></td>
    <td><?php echo $receive_amount; ?></td>
    <td><?php echo $total_amount-$receive_amount; ?></td>
</tr>
<?php
    }
$rcved=mysqli_query($con,"select SUM(receive_amount) as rcevd from otherChargesPaid where instituteId='$inst_id' && months='$chose_month' && roll_number='$rol_nbr' && session='$aply_sesins'");
while($rvd = mysqli_fetch_array($rcved)){
    $rcevd = $rvd['rcevd'];
}
$totlsamnt=mysqli_query($con,"select SUM(total_amount) as totlsamunt from otherChargesPaid where instituteId='$inst_id' && months='$chose_month' && roll_number='$rol_nbr' && session='$aply_sesins'");
while($totles = mysqli_fetch_array($totlsamnt)){
    $totlsamunt = $totles['totlsamunt'];
}
?>
<tr>
    <th style="border:1px solid hsl(0,0%,0%);" colspan="2">Total Receive Amount</th>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $rcevd; ?></td>
    <th style="border:1px solid hsl(0,0%,0%);">Total Balance</th>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $totlsamunt-$rcevd; ?></td>
</tr>
<?php
}else{
    echo "<div class='alert alert-danger'>There are no Record Found!</div>";
}
?>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3" align="right">
    <button class='btn btn-success text-capitalize' id="btn_print"><i class="fa fa-print"></i> Print</button>
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