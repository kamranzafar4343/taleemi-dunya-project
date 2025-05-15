<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("profile.php"); require_once("lib/attendance.php");
require_once("lib/fee.php"); require_once("lib/examination.php"); require_once("lib/time-table.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> daily diary</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
<?php
$sl_garly = mysqli_query($con,"select * from dailydairy where instituteId='$instituteId' && roll_number='$roll_num'");
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
    $files = $result['files'];
    $frmt = explode(".",$links);
    $nme = $frmt['0'];
    $ext = $frmt['1'];
?>
<div class="col-6 col-md-4 col-sm-4 col-lg-3 col-xl-2 col-xxl-2 mb-3" align="center">
    <div class="card" align="center">
<?php if($ext == "pdf"){ ?>
<a href="#"data-bs-toggle="modal" data-bs-target="#pdfs<?php echo $id; ?>" class="nav-link">
    <embed src="../daily-diary/<?php echo $files; ?>" width="100%" style="height:200px;overflow:hidden;"  type="application/pdf" frameBorder="0" scrolling="auto"/>
    <div class="card-text text-capitalize bg-apna py-2"><?php echo $nme; ?></div>
</a>
<?php 
}else{ 
if(empty($links)){
?>
<a href="#"data-bs-toggle="modal" data-bs-target="#imgs<?php echo $id; ?>" class="nav-link">
    <img src="../daily-diary/<?php echo $files; ?>" class="img-fluid" width="100%" style="height:200px;overflow:hidden;">
</a>
<?php
}elseif(empty($files)){
?>
<a href="#"data-bs-toggle="modal" data-bs-target="#txts<?php echo $id; ?>" class="nav-link">
    <div class="card-text text-capitalize bg-apna py-2"><?php echo $nme; ?></div>
</a>
<?php }else{ ?>
<a href="#"data-bs-toggle="modal" data-bs-target="#lect<?php echo $id; ?>" class="nav-link">
    <img src="../daily-diary/<?php echo $files; ?>" class="img-fluid" width="100%" style="height:200px;overflow:hidden;">
    <div class="card-text text-capitalize bg-apna py-2"><?php echo $nme; ?></div>
</a>
<?php } } ?>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="pdfs<?php echo $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" style="background:transparent;border:none;">
      <div class="modal-body">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
<div class="row">
    <div class="col">
<embed src="../daily-dairy/<?php echo $files; ?>" width="100%" style="overflow:hidden;"  type="application/pdf" frameBorder="0" scrolling="auto"/>
    </div>
</div>
      </div>
      
    </div>
  </div>
</div>

<!-- Text Modal -->
<div class="modal fade" id="txts<?php echo $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" style="background:transparent;border:none;">
      <div class="modal-body">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
<div class="row">
    <div class="col">
<div class="text-capitalize bg-apna py-2"><?php echo $nme; ?></div>
    </div>
</div>
      </div>
      
    </div>
  </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imgs<?php echo $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" style="background:transparent;border:none;">
      <div class="modal-body">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
<div class="row">
    <div class="col">
<img src="../daily-diary/<?php echo $files; ?>" class="img-fluid">
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