<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("profile.php"); require_once("lib/attendance.php");
require_once("lib/fee.php"); require_once("lib/examination.php"); require_once("lib/time-table.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Video Lectures</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
<?php
$sl_garly = mysqli_query($con,"select * from lectures where instituteId='$instituteId' && roll_number='$roll_num'");
$cont = mysqli_num_rows($sl_garly);
if($cont == 0){ echo "<div class='alert alert-danger text-capitalize'>there are no record found.</div>"; }
while($result=mysqli_fetch_array($sl_garly)){
    $id = $result['id'];
    $student_name = $result['student_name'];
    $father_name = $result['father_name'];
    $class = $result['class'];
    $section = $result['section'];
    $session = $result['session'];
    $roll_number = $result['roll_number'];
    $links = $result['links'];
    $instituteId = $result['instituteId'];
    $deliver_date = $result['deliver_date'];
?>
<div class="col-6 col-md-4 col-sm-4 col-lg-3 col-xl-2 col-xxl-2 mb-3" align="center" style="overflow:hidden;border:1px solid orange;">
    <a href="#"data-bs-toggle="modal" data-bs-target="#lect<?php echo $id; ?>">
        <div class="card" align="center" style="border:none;">
        <?php echo $links; ?>    
            <div class="card-img-overlay"></div>
        </div>
    </a>
</div>

<!-- Modal -->
<div class="modal fade" id="lect<?php echo $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" style="background:transparent;border:none;">
      <div class="modal-body">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
<div class="row">
    <div class="col">
<?php echo $links; ?>
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