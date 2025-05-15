<?php
require_once("../functions/db.php");

$colg_id = $_POST['colg_id'];
$aply_months = $_POST['aply_months'];
$aply_sesions = $_POST['aply_sesions'];


$sel_schl = mysqli_query($con,"select * from confirmSchools where institute_id='$colg_id'");
$result = mysqli_fetch_assoc($sel_schl);
$institute_name = $result['institute_name'];
$campus = $result['campus'];
$logo = $result['logo'];
?>
<div class="row">
    <div class="col-12 ">
<table class="w-100">
    <thead>
        <tr style="background-color:hsl(35,100%,80%);">
            <th width="50">
                <img src="portal-admins/institute-logos/<?php echo $logo; ?>" class="img-fluid">
            </th>
            <th colspan="6">
<h4 class="fw-bolder fs-4 text-uppercase text-center p-0"><?php echo $institute_name; ?></h4>
<div class="text-center"><?php echo $campus; ?></div>
            </th>
        </tr>
        <tr class="bg-apna" align="center">
            <th style="border:1px solid black;">#</th>
            <th style="border:1px solid black;">ID#</th>
            <th style="border:1px solid black;">User</th>
            <th style="border:1px solid black;">Narration</th>
            <th style="border:1px solid black;">Expenses</th>
            <th style="border:1px solid black;">Role</th>
        </tr>
    </thead>
    <tbody>
<?php
$rt=1;
$sel_exps = mysqli_query($con,"select * from dayBook where institute_id='$colg_id' && month='$aply_months' && session='$aply_sesions'");
if(mysqli_num_rows($sel_exps)>0){
    while($rt <= 10000 && $epx = mysqli_fetch_array($sel_exps)){
$user_name = $epx['user_name'];
$user_id = $epx['user_id'];
$narration = $epx['narration'];
$expense = $epx['expense'];
$role = $epx['role'];
$date = $epx['date'];
?>
<tr style="background-color:hsl(35,100%,80%);">
    <td style="border:1px solid black;"><?php echo $rt++; ?></td>
    <td style="border:1px solid black;"><?php echo $user_id; ?></td>
    <td style="border:1px solid black;"><?php echo $user_name; ?></td>
    <td style="border:1px solid black;"><?php echo $narration; ?></td>
    <td style="border:1px solid black;"><?php echo $expense; ?></td>
    <td style="border:1px solid black;"><?php echo $role; ?></td>
</tr>
<?php
    }
}else{ echo "<tr style='background-color:hsl(35,100%,80%);'><td colspan='6' class='text-danger'>There are no Record Found!</td></tr>"; }
$sel_expsnes = mysqli_query($con,"select SUM(expense) as fulexpnse from dayBook where institute_id='$colg_id' && month='$aply_months' && session='$aply_sesions'");
while($expns = mysqli_fetch_array($sel_expsnes)){
    $fulexpnse = $expns['fulexpnse'];
}
?>

<tr style="background-color:hsl(29,100%,70%);">
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"><?php echo $fulexpnse; ?></td>
    <td style="border:1px solid black;"></td>
</tr>   
    </tbody>
    
</table>
    </div>
</div>