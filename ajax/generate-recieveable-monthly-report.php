<?php
require_once("../functions/db.php");

$yer = $_POST['yer'];
$mnth = $_POST['mnth'];
$inst_ids = $_POST['inst_ids'];
$int_nmes = $_POST['int_nmes'];
$insti_camps = $_POST['insti_camps'];
$inst_logos = $_POST['inst_logos'];

$sl_invo = mysqli_query($con,"select * from stockAmountReceived where session='$yer' && month='$mnth' && instituteId='$inst_ids'");
if(mysqli_num_rows($sl_invo)>0){
while($results = mysqli_fetch_array($sl_invo)){
$vendr_name = $results['vendr_name'];
$total_amount = $results['total_amount'];
$received = $results['received'];
$balance = $results['balance'];
$total_received = $results['total_received'];
$month = $results['month'];
$monthName = date('F', mktime(0, 0, 0, $month, 10));
$date = $results['date'];
$session = $results['session'];
    }
?>
<div class="row">
    <div class="col">
<table class="w-100 bg-apna">
    <tr align="center">
        <th width="50" rowspan="2" class="p-0"><img src="portal-admins/institute-logos/<?php echo $inst_logos; ?>" class="img-fluid"></th>
        <th class="p-0 text-uppercase text-center" colspan="7"><h4 class="fs-4 fw-bold text-uppercase text-center"><?php echo $int_nmes; ?></h4></th>
    </tr>
    <tr align="center"><th colspan="7" class="p-0 text-uppercase text-center"><h6><?php echo $insti_camps; ?></h6></th></tr>
    <tr><td colspan="7" class="p-2"></td></tr>
    <tr>
        <th style="font-size:0.7rem;" class="p-0" colspan="2">Month</th>
        <td style="font-size:0.7rem;" class="p-0"><?php echo $monthName; ?></td>
        <th style="font-size:0.7rem;" class="p-0">Date:</th>
        <td style="font-size:0.7rem;" class="p-0"><?php echo $date; ?></td>
    </tr>
    <tr><td colspan="7" class="p-2"><h6 class="text-center fs-6 fw-bold text-uppercase">receiveable record</h6></td></tr>
    <tr align="center" style='background:hsl(35, 100%, 70%);'>
        <th style="border:1px solid hsl(25, 100%, 50%);font-size:0.7rem;" class="p-0">Sr#</th>
        <th style="border:1px solid hsl(25, 100%, 50%);font-size:0.7rem;" class="p-0">Date</th>
        <th style="border:1px solid hsl(25, 100%, 50%);font-size:0.7rem;" class="p-0">Receiver Name</th>
        <th style="border:1px solid hsl(25, 100%, 50%);font-size:0.7rem;" class="p-0">T.Amount</th>
        <th style="border:1px solid hsl(25, 100%, 50%);font-size:0.7rem;" class="p-0">T.Received</th>
        <th style="border:1px solid hsl(25, 100%, 50%);font-size:0.7rem;" class="p-0">Received</th>
        <th style="border:1px solid hsl(25, 100%, 50%);font-size:0.7rem;" class="p-0">Balance</th>
    </tr>
    <?php
$dt = 1; 
$ordsl = mysqli_query($con,"select * from stockAmountReceived where session='$yer' && month='$mnth' && instituteId='$inst_ids'");
while($dt <= 100 && $result = mysqli_fetch_array($ordsl)){
$vendr_name = $result['vendr_name'];
$total_amount = $result['total_amount'];
$total_received = $result['total_received'];
$total_receiveds += $result['total_received'];
$received = $result['received'];
$receiveds += $result['received'];
$balance = $result['balance'];
$balances += $result['balance'];
$month = $result['month'];
$date = $result['date'];
?>
    <tr style='background:hsl(35, 100%, 80%);'>
        <th style="border:1px solid hsl(25, 100%, 50%);" class="p-0"><?php echo $dt++; ?></th>
        <td style="border:1px solid hsl(25, 100%, 50%);font-size:0.7rem;" class="p-0 text-capitalize"><?php echo $date; ?></td>
        <td style="border:1px solid hsl(25, 100%, 50%);font-size:0.7rem;" class="p-0 text-capitalize"><?php echo $vendr_name; ?></td>
        <td style="border:1px solid hsl(25, 100%, 50%);font-size:0.7rem;" class="p-0 text-capitalize"><?php echo $total_amount; ?></td>
        <td style="border:1px solid hsl(25, 100%, 50%);text-align:center;font-size:0.7rem;" class="p-0"><?php echo $total_received; ?></td>
        <td style="border:1px solid hsl(25, 100%, 50%);text-align:center;font-size:0.7rem;" class="py-1 p-0"><?php echo $received; ?></td>
        <td style="border:1px solid hsl(25, 100%, 50%);text-align:center;font-size:0.7rem;" class="py-1 p-0"><?php echo $balance; ?></td>
    </tr>
<?php } ?>
<tr style='background:hsl(35, 100%, 80%);'>
    <th class="p-0"></th>
    <td style="0.7rem;" class="p-0 text-capitalize"></td>
    <td style="font-size:0.7rem;" class="p-0 text-capitalize"></td>
    <td style="font-size:0.7rem;" class="p-0 text-capitalize"></td>
    <th style="border:1px solid hsl(25, 100%, 50%);text-align:center;font-size:0.7rem;" class="p-0"><?php echo $total_receiveds; ?></th>
    <th style="border:1px solid hsl(25, 100%, 50%);text-align:center;font-size:0.7rem;" class="py-1 p-0"><?php echo $receiveds; ?></th>
    <th style="border:1px solid hsl(25, 100%, 50%);text-align:center;font-size:0.7rem;" class="py-1 p-0"><?php echo $balances; ?></th>
</tr>
</table>
    </div>
</div>

<?php
}else{ echo "<div class='alert alert-danger text-capitalize'>there are no record found!</div>"; }
?>