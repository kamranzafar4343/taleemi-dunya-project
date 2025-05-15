<?php
require_once("../functions/db.php");

$inst_id = $_POST['inst_id'];

$sel_schol = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_id'");
$rest = mysqli_fetch_assoc($sel_schol);
$institute_name = $rest['institute_name'];
$campus = $rest['campus'];
$logos = $rest['logo'];

$sel_sesins = mysqli_query($con,"select * from addSession where institute_id='$inst_id' order by id desc");
$sesin = mysqli_fetch_assoc($sel_sesins);
$session = $sesin['session'];

$mnths = date("m");

$t = 1;
$sl_clobalance = mysqli_query($con,"select * from closingBalance where instituteId='$inst_id' && session='$session' && month='$mnths'");
$closings = ""; 
if(mysqli_num_rows($sl_clobalance)>0){
    $closings = "<table class='w-100' style='background-color:hsl(35,100%,80%);'>
    <tr>
<th width='60'><img src='portal-admins/institute-logos/$logos' class='img-fluid'></th>
<th colspan='11'>
    <h4 class='text-uppercase text-center p-0 fs-4 fw-bolder'>$institute_name</h4>
    <h6 class='text-uppercase text-center p-0'>$campus</h6>
</th>
    </tr>
    <tr align='center'>
<th colspan='12' class='text-uppercase'>Closing Balance Monthly Report Session $session</th>
    </tr>
    <tr class='bg-apna'><th>Sr#</th><th>Closing Date</th><th>Cash.H.Over</th><th>T.Income</th><th>T.Expense</th><th>Paid Amount</th><th>Received</th><th>Balance</th><th>Month</th><th>Action</th></tr>";
    while($t <= 10000 && $result = mysqli_fetch_array($sl_clobalance)){
$ids = $result['id'];
$closing_date = $result['closing_date'];
$frmts = explode("-",$closing_date);
$dtes = $frmts['2'];
$mnth = $frmts['1'];
$yers = $frmts['0'];
$finl_dte = $dtes."-".$mnth."-".$yers;
$handed_cash = $result['handed_cash'];
$total_income = $result['total_income'];
$total_expense = $result['total_expense'];
$paid_amount = $result['paid_amount'];
$received = $result['received'];
$balance = $result['balance'];
$narrations = $result['narrations'];
$roles = $result['roles'];
$month = $result['month'];
$monthName = date('F', mktime(0, 0, 0,$month, 10));
$instituteId = $result['instituteId'];

$closings .= "<tr style='background:hsl(35, 100%, 80%);'><th style='border:1px solid hsl(25, 100%, 50%);'>".$t++."</th><td style='border:1px solid hsl(25, 100%, 50%);'>$finl_dte</td><td class='text-capitalize' style='border:1px solid hsl(25, 100%, 50%);'>$handed_cash</td><td style='border:1px solid hsl(25, 100%, 50%);'>$total_income</td><td style='border:1px solid hsl(25, 100%, 50%);'>$total_expense</td><td style='border:1px solid hsl(25, 100%, 50%);'>$paid_amount</td><td class='text-capitalize' style='border:1px solid hsl(25, 100%, 50%);'>$received</td><td class='text-capitalize' style='border:1px solid hsl(25, 100%, 50%);'>$balance</td><td class='text-capitalize' style='border:1px solid hsl(25, 100%, 50%);'>$monthName</td><td style='border:1px solid hsl(25, 100%, 50%);'><a href='del-cash-closing-history?id=$ids' class='btn'><i class='fa fa-trash-alt text-danger'></i></a></td></tr>";
    }
$closings .= "</table>";
mysqli_close($con);
echo $closings;

}else{ echo "<div class='text-capitalize alert alert-danger'>there are no record found!</div>"; }

?>