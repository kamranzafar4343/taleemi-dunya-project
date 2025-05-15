<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("profile.php"); require_once("lib/attendance.php"); require_once("lib/examination.php"); require_once("lib/time-table.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> alerts</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
<?php
$sl_garly = mysqli_query($con,"select * from teacherAlerts where instituteId='$instituteId' && staffId='$staffId'");
$cont = mysqli_num_rows($sl_garly);
if($cont == 0){ echo "<div class='alert alert-danger text-capitalize'>there are no record found.</div>"; }
while($result=mysqli_fetch_array($sl_garly)){
    $id = $result['id'];
    $image_alert = $result['image_alert'];
    $message = $result['message'];
?>
<div class="col-6 col-md-4 col-sm-4 col-lg-3 col-xl-2 col-xxl-2 mb-3" align="center">
    <div class="card" align="center">
<a href="#"data-bs-toggle="modal" data-bs-target="#alts<?php echo $id; ?>" class="nav-link">
    <div class="card-body text-white text-capitalize"><?php echo $message; ?></div>
</a>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="alts<?php echo $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
<div class="row">
    <div class="col p-2">
<div class="card-body text-white text-capitalize fs-5"><?php echo $message; ?></div>
    </div>
</div>
      </div>
      
    </div>
  </div>
</div>

<?php } ?>
    </div>
</div>

<?php require_once("source/foot-section.php"); ?>