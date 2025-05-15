<?php
require_once("../functions/db.php");

$math = $_POST['math'];
$monthName = date('M', mktime(0, 0, 0,$math, 10));
$sch_id = $_POST['sch_id'];
$sesn = $_POST['sesn'];
$ints_nme = $_POST['ints_nme'];
$cps = $_POST['cps'];
$phn_cls = $_POST['phn_cls'];
$logs = $_POST['logs'];

$sl_srch = mysqli_query($con,"select * from dayBook where institute_id='$sch_id' && month='$math' && session='$sesn'");
?>
<div class="row">
    <div class="col-12 mb-3">
<table class="w-100">
    <tr style='background:hsl(35, 100%, 80%);'>
        <th width="50">
<img src="portal-admins/institute-logos/<?php echo $logs; ?>" style="width:100%;" class="img-fluid">
        </th>
        <th colspan="6">
<h4 class="text-uppercase text-center fs-4 fw-bold"><?php echo $ints_nme; ?><span class="text-capitalize fs-6" style="border-bottom:2px solid black;"> <?php echo $cps; ?></span>
</h4>
        </th>
    </tr>
    <tr align="center" class="bg-apna">
        <th colspan="8" class="fs-6 text-uppercase">Income Statement Month of (<?php echo $monthName.") ".$sesn; ?></th>
    </tr>
    <tr style="background-color:hsl(25,100%,80%);">
        <th>#</th>
        <th class="text-uppercase">Particular</th>
        <th class="text-uppercase">Income</th>
        <th class="text-uppercase">Expense</th>
    </tr>
<?php
$ic=1;
$sl_incmes = mysqli_query($con,"select * from dayBook where institute_id='$sch_id' && month='$math' && session='$sesn'");
if(mysqli_num_rows($sl_incmes)>0){
    while($ic <= 10000 && $incms = mysqli_fetch_array($sl_incmes)){
$account_type = $incms['account_type'];
$incomese = $incms['income'];
$expensese = $incms['expense'];
?>
    <tr style="background-color:hsl(35,100%,80%);">
        <td><?php echo $ic++; ?></td>
        <td><?php echo $account_type; ?></td>
        <td><?php echo $incomese; ?></td>
        <td><?php echo $expensese; ?></td>
    </tr>
<?php
    }
}else{ echo "<div class='alert alert-danger'>There no Record Found!</div>"; }

$adicome = mysqli_query($con,"select SUM(income) as incmes from dayBook where institute_id='$sch_id' && month='$math' && session='$sesn'");
while($inc = mysqli_fetch_array($adicome)){
    $incmes = $inc['incmes'];
}
$adexpnes = mysqli_query($con,"select SUM(expense) as expnse from dayBook where institute_id='$sch_id' && month='$math' && session='$sesn'");
while($exps = mysqli_fetch_array($adexpnes)){
    $expnse = $exps['expnse'];
}
$stats = $incmes-$expnse;

$fmrt = explode("-",$stats);
$d = $fmrt['0'];
$r = $fmrt['1'];
?>
    <tr style="background-color:hsl(25,100%,80%);">
        <td></td>
        <td></td>
        <td><?php echo $incmes; ?></td>
        <td><?php echo $expnse; ?></td>
    </tr>
    <tr align="center" style="background-color:hsl(35,100%,60%);">
        <th colspan="2">
<?php 
if($d == $stats){ 
    echo "<span class='text-success text-uppercase' style='font-size:2rem;'>profit</span>"; 
}elseif($r != $stats){ 
    echo "<span class='text-uppercase text-danger' style='font-size:2rem;'>loss</span>"; 
    }
?>
        </th>
        <th colspan="2">
<?php 
if($d == $stats){ 
    echo "<span class='text-success' style='font-size:2rem;'>".$d."</span>"; 
    }elseif($r != $stats){ 
        echo "<span class='text-danger' style='font-size:2rem;'>".$r."</span>"; 
} 
?>
        </th>
    </tr>
</table>
    </div>
</div>