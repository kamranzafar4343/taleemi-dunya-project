<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("profile.php"); require_once("lib/attendance.php");
require_once("lib/fee.php"); require_once("lib/examination.php"); require_once("lib/time-table.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> alerts</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
<?php
$sl_garly = mysqli_query($con,"select * from studentAlerts where instituteId='$instituteId' && $roll_num='$staffId'");
$cont = mysqli_num_rows($sl_garly);
if($cont == 0){ echo "<div class='alert alert-danger text-capitalize'>there are no record found.</div>"; }
while($result=mysqli_fetch_array($sl_garly)){
    $id = $result['id'];
    $links = $result['links'];
?>
<div class="col mb-3" align="center">
    <div class="card bg-white" align="center">
<div class="alert alert-warning alert-dismissible fade show text-capitalize fs-5" role="alert"><?php echo $links; ?> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>
    </div>
</div>
<?php } ?>
    </div>
</div>

<?php require_once("source/foot-section.php"); ?>