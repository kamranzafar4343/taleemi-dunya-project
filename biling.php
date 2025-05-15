<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Biling</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 mb-3">
<table class="w-100">
    <thead>
        <tr style="background-color:hsl(35,100%,80%);" align="center">
            <th colspan="9" class="fs-3 fw-bolder text-capitalize"><?php echo $instituteName; ?></th>
        </tr>
        <tr class="bg-apna">
            <th>#</th>
            <th>Joining Date</th>
            <th>Expiry Date</th>
            <th>Month</th>
            <th>Total Amount</th>
            <th>Remaining Amounts</th>
            <th>Receiving Amounts</th>
            <th>Balance</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
<?php
$rs=1;
$sel_colctn = mysqli_query($con,"select * from institute_collection where instituteId='$userId' order by id desc");
if(mysqli_num_rows($sel_colctn)>0){
    while($rs <= 100 && $reslts = mysqli_fetch_array($sel_colctn)){
$charges_date = $reslts['charges_date'];
$deactive_date = $reslts['deactive_date'];
$months = $reslts['months'];
$monthName = date("M", mktime(0, 0, 0, $months, 10));
$session = $reslts['session'];
$monthly_amounts = $reslts['monthly_amounts'];
$remaining_amount = $reslts['remaining_amount'];
$receive_amount = $reslts['receive_amount'];
$balance = $reslts['balance'];
$fee_type = $reslts['fee_type'];

$selct_scol = mysqli_query($con,"select * from confirmSchools where institute_id='$userId' order by institute_id asc");
$rows = mysqli_fetch_assoc($selct_scol);
$joining_date = $rows['joining_date'];
?>
<tr style="background-color:hsl(35, 100%, 80%);">
    <td style="border:1px solid hsl(25,100%,50%);"><?php echo $rs++; ?></td>
    <td style="border:1px solid hsl(25,100%,50%);"><?php echo $joining_date; ?></td>
    <td style="border:1px solid hsl(25,100%,50%);"><?php echo $deactive_date; ?></td>
    <td style="border:1px solid hsl(25,100%,50%);"><?php echo $monthName; ?></td>
    <td style="border:1px solid hsl(25,100%,50%);"><?php echo $monthly_amounts; ?></td>
    <td style="border:1px solid hsl(25,100%,50%);"><?php echo $remaining_amount; ?></td>
    <td style="border:1px solid hsl(25,100%,50%);"><?php echo $receive_amount; ?></td>
    <td style="border:1px solid hsl(25,100%,50%);"><?php echo $balance; ?></td>
    <td style="border:1px solid hsl(25,100%,50%);" class="text-capitalize"><?php echo $fee_type; ?></td>
</tr>
<?php
    }
}else{ echo "<div class='alert alert-danger p-2'>There are no Payment History Found!</div>"; }
?>
    </tbody>
</table>
        </div>
    </div>
    

</div>
<?php require_once("source/foot-section.php"); ?>