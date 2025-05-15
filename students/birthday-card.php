<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("profile.php"); require_once("lib/attendance.php");
require_once("lib/fee.php"); require_once("lib/examination.php"); require_once("lib/time-table.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Birthday Card</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
<?php
$sl_garly = mysqli_query($con,"select * from addStudents where instituteId='$instituteId' && roll_num='$roll_num'");
$cont = mysqli_num_rows($sl_garly);
if($cont == 0){ echo "<div class='alert alert-danger text-capitalize'>there are no record found.</div>"; }
while($result=mysqli_fetch_array($sl_garly)){
    $id = $result['id'];
    $instituteId = $result['instituteId'];
    $admissionDate = $result['admissionDate'];
    $inquiryId = $result['inquiryId'];
    $roll_num = $result['roll_num'];
    $class = $result['class'];
    $section = $result['section'];
    $medium = $result['medium'];
    $session = $result['session'];
    $image = $result['image'];
    $studentName = $result['studentName'];
    $bForm = $result['bForm'];
    $gender = $result['gender'];
    $dateOfBirth = $result['dateOfBirth'];
    $formt = explode('-',$dateOfBirth);
    $dtes = $formt['2'];
    $mnth = $formt['1'];
    $yers = $formt['0'];
    $birdy = $dtes."-".$mnth;
if($birdy == date("j-m")){
?>
<div class="col-6 col-md-4 col-sm-4 col-lg-3 col-xl-2 col-xxl-2 mb-3" align="center">
    <div class="card" align="center">
<a href="#"data-bs-toggle="modal" data-bs-target="#lect<?php echo $id; ?>" class="fs-1 text-white text-decoration-none">
    <?php echo $dtes."-".$mnth."-".$yers; ?>
</a>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="lect<?php echo $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background:transparent;border:none;">
      <div class="modal-body">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
<div class="row">
    <div class="col">

    </div>
</div>
      </div>
      
    </div>
  </div>
</div>

<?php 
}else{
 echo "<h1 class='text-center text-white text-uppercase fw-bold'>Now Not A Your Bithday!</h1>";    
    }
} 

?>
    </div>
</div>

<?php require_once("source/foot-section.php"); ?>