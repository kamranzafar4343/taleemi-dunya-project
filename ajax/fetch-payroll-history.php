<?php
require_once("../functions/db.php");

$staf_nme = $_POST['staf_nme'];
$f_name = $_POST['f_name'];
$staf_id = $_POST['staf_id'];
$staf_typ = $_POST['staf_typ'];
$stf_post = $_POST['stf_post'];
$stf_sesin = $_POST['stf_sesin'];


if(!empty($_POST['staf_imgs'])){ $staf_imgs = $_POST['staf_imgs']; }else{ $staf_imgs = "users.jpg"; }
$colg_id = $_POST['colg_id'];

$sl_prf = mysqli_query($con,"select * from confirmSchools where institute_id='$colg_id'");
$rslt = mysqli_fetch_assoc($sl_prf);
$institute_name = $rslt['institute_name'];
$campus = $rslt['campus'];
$logo = $rslt['logo'];

?>
<table class="w-100 fe-colct" style="background-color:hsl(35,100%,80%);">
    <tr align="center">
        <th width="50">
<img src="portal-admins/institute-logos/<?php echo $logo; ?>" class="img-fluid">
        </th>
        <th colspan="6">
            <h4 class="fs-4 fw-bold text-uppercase"><?php echo $institute_name; ?></h4>
            <div class="text-center text-capitalize fw-bold">Campus: <span class="fw-normal"><?php echo $campus; ?></span></div>
        </th>
        <th width="50" colspan="2">
<img src="staff_imgs/<?php echo $staf_imgs; ?>" class="img-fluid" style="width:50%;height:50px;">
        </th>
    </tr>
<tr><th colspan="10"><h6 class="fs-6 fw-bold text-center text-uppercase">pay history</h6></th></tr>
    <tr align="center">
        <th style="border:1px solid hsl(0,0%,0%);" colspan="2">St.Name:</th>
        <td style="border:1px solid hsl(0,0%,0%);" class="text-capitalize"><?php echo $staf_nme; ?></td>
        <th style="border:1px solid hsl(0,0%,0%);" colspan="2">F.Name:</th>
        <td style="border:1px solid hsl(0,0%,0%);" class="text-capitalize"><?php echo $f_name; ?></td>
        <th style="border:1px solid hsl(0,0%,0%);">ID#:</th>
        <td style="border:1px solid hsl(0,0%,0%);" colspan="2"><?php echo $staf_id; ?></td>
    </tr>
    <tr align="center">
        <th style="border:1px solid hsl(0,0%,0%);" colspan="2">Type:</th>
        <td style="border:1px solid hsl(0,0%,0%);" class="text-uppercase"><?php echo $staf_typ; ?></td>
        <th style="border:1px solid hsl(0,0%,0%);" colspan="2">Post:</th>
        <td style="border:1px solid hsl(0,0%,0%);" class="text-uppercase"><?php echo $stf_post; ?></td>
        <th style="border:1px solid hsl(0,0%,0%);">Session:</th>
        <td style="border:1px solid hsl(0,0%,0%);" colspan="2"><?php echo $stf_sesin; ?></td>
    </tr>
    <tr>
        <th style="border:1px solid hsl(0,0%,0%);">Sr.No</th>
        <th style="border:1px solid hsl(0,0%,0%);">Salary Date</th>
        <th style="border:1px solid hsl(0,0%,0%);">Salary</th>
        <th style="border:1px solid hsl(0,0%,0%);">Bonus</th>
        <th style="border:1px solid hsl(0,0%,0%);">Net</th>
        <th style="border:1px solid hsl(0,0%,0%);">Paid</th>
        <th style="border:1px solid hsl(0,0%,0%);">Remain</th>
        <th style="border:1px solid hsl(0,0%,0%);">Month</th>
    </tr>
<?php
$rt=1;
$sl_feng = mysqli_query($con,"select * from payroll where staff_id='$staf_id' && instituteId='$colg_id' order by id desc");
while($rt <= 100000 && $reslt = mysqli_fetch_array($sl_feng)){
$salary = $reslt['salary'];
$salary_date = $reslt['salary_date'];
$bonus = $reslt['bonus'];
$fint_net_salary = $reslt['fint_net_salary'];
$pay_amount = $reslt['pay_amount'];
$remaing_payable = $reslt['remaing_payable'];
$month = $reslt['month'];
$monthName = date("F", mktime(0, 0, 0, $month, 10));
?>
    <tr>
        <td style="border:1px solid hsl(0,0%,0%);"><?php echo $rt; ?></td>
        <td style="border:1px solid hsl(0,0%,0%);"><?php echo $salary_date; ?></td>
        <td style="border:1px solid hsl(0,0%,0%);"><?php echo $salary; ?></td>
        <td style="border:1px solid hsl(0,0%,0%);"><?php echo $bonus; ?></td>
        <td style="border:1px solid hsl(0,0%,0%);"><?php echo $fint_net_salary; ?></td>
        <td style="border:1px solid hsl(0,0%,0%);"><?php echo $pay_amount; ?></td>
        <td style="border:1px solid hsl(0,0%,0%);"><?php echo $remaing_payable; ?></td>
        <td style="border:1px solid hsl(0,0%,0%);"><?php echo $monthName; ?></td>
    </tr>
<?php } ?>
</table>