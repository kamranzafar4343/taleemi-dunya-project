<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("profile.php"); require_once("lib/attendance.php");
require_once("lib/fee.php"); require_once("lib/examination.php"); require_once("lib/time-table.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Monthly Fee history</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12 mb-3" align="center">
<table class="table table-responsive table-bordered w-100 bg-white">
    <tr>
        <th>Month</th>
        <th>Monthly Fee</th>
        <th>Balance</th>
        <th>Status</th>
    </tr>
<?php
$sl_garly = mysqli_query($con,"select * from fee_collection where instituteId='$instituteId' && rollno='$roll_num' order by id desc");
$cont = mysqli_num_rows($sl_garly);
if($cont == 0){ echo "<div class='alert alert-danger text-capitalize'>there are no record found.</div>"; }
while($result=mysqli_fetch_array($sl_garly)){
    $id = $result['id'];
    $instituteId = $result['instituteId'];
    $student_imgs = $result['student_imgs'];
    $student_name = $result['student_name'];
    $father_name = $result['father_name'];
    $month = $result['month'];
    $monthName = date("F", mktime(0, 0, 0, $month, 10));
    $section = $result['section'];
    $rollno = $result['rollno'];
    $session = $result['session'];
    $monthly_fee = $result['monthly_fee'];
    $previous_balance = $result['previous_balance'];
    $remaing_balance = $result['remaing_balance'];
    $fees_status = $result['fees_status'];
?>
    <tr>
        <td><?php echo $monthName; ?></td>
        <td><?php echo $monthly_fee; ?></td>
        <td><?php if(!empty($remaing_balance)){ echo $remaing_balance; }else{ echo "0"; } ?></td>
        <td><?php if($fees_status == 'paid'){ echo "<span class='text-uppercase text-success'>".$fees_status."</span>"; }else{ echo "<span class='text-uppercase text-danger'>".$fees_status."</span>"; } ?></td>
    </tr>
<?php } ?>
</table>
</div>
    </div>
</div>

<?php require_once("source/foot-section.php"); ?>