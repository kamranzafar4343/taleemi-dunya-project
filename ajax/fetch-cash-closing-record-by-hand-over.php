<?php
require_once("../functions/db.php");

$inst_ids = $_POST['inst_ids'];
$aply_mnths = $_POST['aply_mnths'];
$aply_sesins = $_POST['aply_sesins'];
$aply_hand = $_POST['aply_hand'];
$monthName = date('F', mktime(0, 0, 0, $aply_mnths, 10));

$sel_colg = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_ids'");
$schl = mysqli_fetch_assoc($sel_colg);
$institute_name = $schl['institute_name'];
$campus = $schl['campus'];
$logos = $schl['logo'];

$sel_clsg = mysqli_query($con,"select * from closingBalance where instituteId='$inst_ids' && month='$aply_mnths' && session='$aply_sesins' && handed_cash='$aply_hand' order by closing_date asc");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col mb-3">
<table class="w-100" style="background-color:hsl(35,100%,80%);">
    <thead>
        <tr>
            <th width="60">
                <img src='portal-admins/institute-logos/<?php echo $logos; ?>' class="img-fluid">
            </th>
            <th colspan="8">
<h4 class="p-0 text-uppercase fs-4 fw-bolder text-center"><?php echo $institute_name; ?></h4>
<h6 class="p-0 text-uppercase fs-6 fw-bolder text-center"><?php echo $campus; ?></h6>
            </th>
        </tr>
        <tr align="center">
<th class="text-uppercase" colspan="9">Cash Closing Monthly Report "<?php echo $aply_hand; ?>" Month (<?php echo $monthName; ?>) Session (<?php echo $aply_sesins; ?>)</th>
        </tr>
        <tr align="center">
            <th style="border:1px solid black;">#</th>
            <th style="border:1px solid black;">Date</th>
            <th style="border:1px solid black;">T.Income</th>
            <th style="border:1px solid black;">T.Expense</th>
            <th style="border:1px solid black;">Payable</th>
            <th style="border:1px solid black;">Received</th>
            <th style="border:1px solid black;">Balance</th>
            <th style="border:1px solid black;">Narration</th>
            <th style="border:1px solid black;">Role</th>
        </tr>
    </thead>
    <tbody>
<?php
$r=1;
if(mysqli_num_rows($sel_clsg)>0){
    while($r <= 10000 && $results = mysqli_fetch_array($sel_clsg)){
$closing_date = $results['closing_date'];
$frmts = explode("-",$closing_date);
$dtes = $frmts['2'];
$mnt = $frmts['1'];
$yer = $frmts['0'];
$cash_date = $dtes."/".$mnt."/".$yer;
$handed_cash = $results['handed_cash'];
$total_income = $results['total_income'];
$total_expense = $results['total_expense'];
$paid_amount = $results['paid_amount'];
$received = $results['received'];
$balance = $results['balance'];
$narrations = $results['narrations'];
$roles = $results['roles'];
?>
<tr>
    <td style="border:1px solid black;"><?php echo $r++; ?></td>
    <td style="border:1px solid black;"><?php echo $cash_date; ?></td>
    <td style="border:1px solid black;"><?php echo $total_income; ?></td>
    <td style="border:1px solid black;"><?php echo $total_expense; ?></td>
    <td style="border:1px solid black;"><?php echo $paid_amount; ?></td>
    <td style="border:1px solid black;"><?php echo $received; ?></td>
    <td style="border:1px solid black;"><?php echo $balance; ?></td>
    <td style="border:1px solid black;"><?php echo $narrations; ?></td>
    <td style="border:1px solid black;" class="text-capitalize"><?php echo $roles; ?></td>
</tr>
<?php
    }
}else{ echo "<tr><td colspan='9'>There are no Record Found!</td></tr>"; } 
?>
    </tbody>
</table>
        </div>
    </div>
</div>
