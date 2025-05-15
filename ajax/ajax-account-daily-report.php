<?php
require_once("../functions/db.php");

$ac_inst_id = $_POST['ac_inst_id'];
$inst_name = $_POST['inst_name'];
$logap = $_POST['logap'];
$rols = $_POST['rols'];
$cmps_nme = $_POST['cmps_nme'];
$dtes = date("d-m-Y");

$it = 1;

$sl_incomes = mysqli_query($con,"select SUM(income) as incomes from dayBook where institute_id='$ac_inst_id' && date='$dtes' order by id desc");
while($incm = mysqli_fetch_array($sl_incomes)){
    $incomestotls = $incm['incomes'];
}

$sl_expnse = mysqli_query($con,"select SUM(expense) as expnsetotl from dayBook where institute_id='$ac_inst_id' && date='$dtes' order by id desc");
while($epx = mysqli_fetch_array($sl_expnse)){
    $expnsetotl = $epx['expnsetotl'];
}


$sl_types = mysqli_query($con,"select * from dayBook where institute_id='$ac_inst_id' && date='$dtes' order by id desc");
$fuls = "";
if(mysqli_num_rows($sl_types)>0){
    $fuls = "<table class='table table-responsive w-100'>
    <tr align='center' style='background:hsl(35, 100%, 80%);'><th colspan='2'><img src='portal-admins/institute-logos/$logap' class='img-fluid' style='width:30%;height:50px;'></th><th colspan='11' class='text-capitalize fs-4 fw-bold'>$inst_name<div class='text-capitalize' style='font-size:0.7rem;'>$cmps_nme</div></th></tr>
    <tr class='bg-apna'><th style='border:1px solid hsl(25, 100%, 50%);'>Sr#</td><th style='border:1px solid hsl(25, 100%, 50%);'>Date</th><th style='border:1px solid hsl(25, 100%, 50%);'>Day</th><th style='border:1px solid hsl(25, 100%, 50%);'>Image</th><th style='border:1px solid hsl(25, 100%, 50%);'>User</th><th style='border:1px solid hsl(25, 100%, 50%);'>Account Type</th><th style='border:1px solid hsl(25, 100%, 50%);'>Particular</th><th style='border:1px solid hsl(25, 100%, 50%);'>Income</th><th style='border:1px solid hsl(25, 100%, 50%);'>Expenses</th><th style='border:1px solid hsl(25, 100%, 50%);'>Month</th><th style='border:1px solid hsl(25, 100%, 50%);'>Session</th><th style='border:1px solid hsl(25, 100%, 50%);'>Role</th><th style='border:1px solid hsl(25, 100%, 50%);'>Action</th></tr>";
    while($it <= 10000 && $result = mysqli_fetch_array($sl_types)){
        $id = $result['id'];
        $user_name = $result['user_name'];
        if(empty($result['image']) || $result['image'] == 'None'){ $image = "users.jpg"; }else{ $image = $result['image']; }
        $account_type = $result['account_type'];
        $narration = $result['narration'];
        $income = $result['income'];
        $expense = $result['expense'];
        $roles = $result['role'];
        $session = $result['session'];
        $month = $result['month'];
        $monthName = date('F', mktime(0, 0, 0, $month, 10));
        $date = $result['date'];
        $frmts = explode("-",$date);
        $dete = $frmts['0'];
        $nameOfDay = date('l', strtotime($dete));
        
        $fuls .= "<tr style='background:hsl(35, 100%, 80%);'><td style='border:1px solid hsl(25, 100%, 50%);'>".$it++."</td><td style='border:1px solid hsl(25, 100%, 50%);'>".$date."</td><td style='border:1px solid hsl(25, 100%, 50%);'>$nameOfDay</td><td width='30' style='border:1px solid hsl(25, 100%, 50%);'><img src='student_imgs/$image' class='img-fluid'></td><td style='border:1px solid hsl(25, 100%, 50%);'>$user_name</td><td class='text-capitalize' style='border:1px solid hsl(25, 100%, 50%);'>".$account_type."</td><td class='text-capitalize' style='border:1px solid hsl(25, 100%, 50%);'>".$narration."</td><td style='border:1px solid hsl(25, 100%, 50%);'>".$income."</td><td style='border:1px solid hsl(25, 100%, 50%);'>".$expense."</td><td style='border:1px solid hsl(25, 100%, 50%);'>".$monthName."</td><td style='border:1px solid hsl(25, 100%, 50%);'>".$session."</td><td class='text-capitalize' style='border:1px solid hsl(25, 100%, 50%);'>$roles</td><td style='border:1px solid hsl(25, 100%, 50%);'><a href='del-dailydaybook-entry?id=".$id."'><i class='fa fa-trash-alt text-danger'></i></a></td></tr>";
    }
$fuls .= "<tr style='background:hsl(25, 100%, 80%);'><td class='text-capitalize' style='border:1px solid hsl(25, 100%, 50%);font-size:1.4rem;font-weight:bolder;' colspan='3'>Total Incomes</td><td style='border:1px solid hsl(25, 100%, 50%);font-size:1.4rem;font-weight:bolder;' colspan='3'>".$incomestotls."</td><td class='text-capitalize' style='border:1px solid hsl(25, 100%, 50%);font-size:1.4rem;font-weight:bolder;' colspan='3'>Total Expenses</td><td style='border:1px solid hsl(25, 100%, 50%);font-size:1.4rem;font-weight:bolder;' colspan='4'>".$expnsetotl."</td></tr>";
$fuls .= "<tr style='background:hsl(35, 100%, 80%);'></tr>";

$fuls .= "</table>";

mysqli_close($con);
echo $fuls; 
}else{
    echo "<table class='table table-responsive w-100'>
    <tr align='center' style='background:hsl(35, 100%, 80%);'><th colspan='2'><img src='portal-admins/institute-logos/$logap' class='img-fluid' style='width:30%;height:50px;'></th><th colspan='9' class='text-capitalize fs-4 fw-bold'>$inst_name<div class='text-capitalize' style='font-size:0.7rem;'>$cmps_nme</div></th></tr>
    <tr class='bg-apna'><th style='border:1px solid hsl(25, 100%, 50%);'>Sr#</td><th style='border:1px solid hsl(25, 100%, 50%);'>Date</th><th style='border:1px solid hsl(25, 100%, 50%);'>Day</th><th style='border:1px solid hsl(25, 100%, 50%);'>Image</th><th style='border:1px solid hsl(25, 100%, 50%);'>User</th><th style='border:1px solid hsl(25, 100%, 50%);'>Account Type</th><th style='border:1px solid hsl(25, 100%, 50%);'>Particular</th><th style='border:1px solid hsl(25, 100%, 50%);'>Income</th><th style='border:1px solid hsl(25, 100%, 50%);'>Expenses</th><th style='border:1px solid hsl(25, 100%, 50%);'>Role</th><th style='border:1px solid hsl(25, 100%, 50%);'>Action</th></tr>
    <tr style='background:hsl(35, 100%, 80%);'><td colspan='11'>There are Today Record not Found! $dtes</td></tr>
    ";
}

?>