<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("profile.php"); require_once("lib/attendance.php");
require_once("lib/fee.php"); require_once("lib/examination.php"); require_once("lib/time-table.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">date sheet</li>
  </ol>
</nav>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col">
<div class="row">
<?php
$sl_sht = mysqli_query($con,"select classid,code,terms,create_date from dateSheet where instituteId='$instituteId' group by classid,code,terms,create_date");
$counts = mysqli_num_rows($sl_sht);
if($counts == 0){ echo "<div class='alert alert-success text-capitalize'>there are no record.</div>"; }
while($result = mysqli_fetch_array($sl_sht)){
    $classid = $result['classid'];
    $terms = $result['terms'];
    $code = $result['code'];
    $create_date = $result['create_date'];
$sl_clso = mysqli_query($con,"select * from addClass where id='$classid' && institute_id='$instituteId'");
$rst = mysqli_fetch_assoc($sl_clso);
?>    
    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
        <div class="card mb-3 text-center bg-white">
<a href="view-date-sheet?id=<?php echo $code; ?>" class="text-uppercase nav-links py-4">
    <?php echo $rst['class_name']." Date Sheet"; ?>
<h6 class="text-uppercase fs-6 fw-bold m-0 p-0"><?php echo $terms; ?></h6>
<div style="font-size:0.7rem;"><?php echo $create_date; ?></div>    
</a>
        </div>
    </div>
<?php } ?>    
</div>
        </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>