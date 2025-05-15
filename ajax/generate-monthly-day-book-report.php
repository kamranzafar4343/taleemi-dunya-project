<?php
require_once("../functions/db.php");

$aply_institute = $_POST['aply_institute'];
$aply_sesin = $_POST['aply_sesin'];
$aply_month = $_POST['aply_month'];

$monthName = date('F', mktime(0, 0, 0, $aply_month, 10));

$sel_schl = mysqli_query($con,"select * from confirmSchools where institute_id='$aply_institute'");
$scl = mysqli_fetch_assoc($sel_schl);
$institute_name = $scl['institute_name'];
$campus = $scl['campus'];
$cell = $scl['cell'];
$logo = $scl['logo'];
$address = $scl['address'];


$selct_dyboksum = mysqli_query($con,"select SUM(income) as totlincms from dayBook where institute_id='$aply_institute' && session='$aply_sesin' && month='$aply_month' order by date asc");
while($inm=mysqli_fetch_array($selct_dyboksum)){
    $totlincms = $inm['totlincms'];
}
$selct_dyboksubtrct = mysqli_query($con,"select SUM(expense) as totlexpnse from dayBook where institute_id='$aply_institute' && session='$aply_sesin' && month='$aply_month' order by date asc");
while($expns=mysqli_fetch_array($selct_dyboksubtrct)){
    $totlexpnse = $expns['totlexpnse'];
}
$selct_dybok = mysqli_query($con,"select * from dayBook where institute_id='$aply_institute' && session='$aply_sesin' && month='$aply_month' order by date asc");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3 datas">
<table class="w-100" style="background-color:hsl(35,100%,80%);">
    <thead>
        <tr>
            <th width="50">
                <img src="portal-admins/institute-logos/<?php echo $logo; ?>" class="img-fluid">
            </th>
            <th colspan="7">
                <h4 class="p-0 text-center text-uppercase fs-4 fw-bolder"><?php echo $institute_name; ?></h4>
                <div class="text-center"><?php echo $campus; ?></div>
            </th>
        </tr>
        <tr align="center"><th colspan="8" class="text-uppercase">Day Book Monthly (<?php echo $monthName; ?>) Report Session <?php echo $aply_sesin; ?></th></tr>
        <tr align="center">
            <th style="border:1px solid black;">#</th>
            <th style="border:1px solid black;">Date</th>
            <th style="border:1px solid black;">Month</th>
            <th style="border:1px solid black;">User ID</th>
            <th style="border:1px solid black;">Username</th>
            <th style="border:1px solid black;">Type</th>
            <th style="border:1px solid black;">Narration</th>
            <th style="border:1px solid black;">Income</th>
            <th style="border:1px solid black;">Expense</th>
        </tr>
    </thead>
    <tbody>
<?php
$st=1;
if(mysqli_num_rows($selct_dybok)>0){
    while($st <= 10000 && $dy = mysqli_fetch_array($selct_dybok)){

$dates = $dy['date'];
$months = $dy['month'];
$user_id = $dy['user_id'];
$user_name = $dy['user_name'];
$account_type = $dy['account_type'];
$narration = $dy['narration'];
$income = $dy['income'];
$expense = $dy['expense'];
$monthNames = date('F', mktime(0, 0, 0, $months, 10));
?>
<tr>
    <td style="border:1px solid black;"><?php echo $st++; ?></td>
    <td style="border:1px solid black;"><?php echo $dates; ?></td>
    <td style="border:1px solid black;"><?php echo $monthNames; ?></td>
    <td style="border:1px solid black;"><?php echo $user_id; ?></td>
    <td style="border:1px solid black;" class="text-capitalize"><?php echo $user_name; ?></td>
    <td style="border:1px solid black;" class="text-capitalize"><?php echo $account_type; ?></td>
    <td style="border:1px solid black;"><?php echo $narration; ?></td>
    <td style="border:1px solid black;"><?php echo $income; ?></td>
    <td style="border:1px solid black;"><?php echo $expense; ?></td>
</tr>
<?php
}
}else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; }
?>
<tr align="center">
    <th colspan="2" style="font-size:1.4rem;">Total Income</th>
    <td colspan="2" style="font-size:1.4rem;"><?php echo $totlincms; ?></td>
    <th colspan="2" style="font-size:1.4rem;">Total Expense</th>
    <td colspan="2" style="font-size:1.4rem;"><?php echo $totlexpnse; ?></td>
</tr>
    </tbody>
</table>
        </div>
    </div>
</div>