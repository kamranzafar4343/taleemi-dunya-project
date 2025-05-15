<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#acad-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'">Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='terms-manager'">term manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">session update</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_GET['id'])){
    $ides = $_GET['id'];
    $sel_inqury = mysqli_query($con,"select * from addTerms where instituteId='$userId' && id='$ides'");
    $inqry = mysqli_fetch_assoc($sel_inqury);
    $instituteId = $inqry['instituteId'];
    $termid = $inqry['termid'];
    $term = $inqry['term'];
    $session = $inqry['session'];
}
?>
<div class="container-fluid mt-4">
<form method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize text-white">update session</label>
        <input name="sesins" class="form-control" type="text" placeholder="Change Term" value="<?php echo $term; ?>" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" autocomplete="off">
        <input name="instidss" class="form-control" type="hidden" value="<?php echo $userId; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mt-4">
        <div class="d-grid">
            <button name="updte_sessn" class="text-uppercase btn btn-apna" type="submit"><i class="fa fa-redo"></i> update</button>
        </div>    
    </div>
    </div>
</form>
<?php
if(isset($_POST['updte_sessn'])){
 
 $instidss = $_POST['instidss'];   
 $termos = $_POST['sesins'];

 
 $updte_sesn = mysqli_query($con,"update addTerms set term='$termos' where id='$ides'");
 if($updte_sesn){ 
     echo "<script>swal.fire(Term / Samester and Month Successfully Update!');</script>"; 
    header("location: terms-manager");     
 }else{ echo "<script>swal.fire('Ooops!','Term / Samester and Month is not Update.','error');</script>"; }
    
}
?>
</div>

<?php require_once("source/foot-section.php"); ?>