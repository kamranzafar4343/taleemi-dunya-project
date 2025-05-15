<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#acad-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'">Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='session-manager'">session manager</a></li>
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
    $sel_inqury = mysqli_query($con,"select * from addSession where institute_id='$userId' && id='$ides'");
    $inqry = mysqli_fetch_assoc($sel_inqury);
    $institute_id = $inqry['institute_id'];
    $session = $inqry['session'];
}
?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<form method="post" enctype="multipart/form-data">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
        <label class="text-capitalize text-white">update session</label>
        <input name="sesins" class="form-control" type="text" placeholder="Create Session" onkeypress="isInputNumber(event)" maxlength="4" value="<?php echo $session; ?>">
        <input name="instidss" class="form-control" type="hidden" value="<?php echo $userId; ?>">
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
        <div class="d-grid">
            <button name="updte_sessn" class="text-uppercase btn btn-apna" type="submit"><i class="fa fa-redo"></i> update</button>
        </div>    
    </div>
</form> 
        </div>
<?php
if(isset($_POST['updte_sessn'])){
 
 $instidss = $_POST['instidss'];   
 $sesins = $_POST['sesins'];

 
 $updte_sesn = mysqli_query($con,"update addSession set session='$sesins' where id='$ides'");
 if($updte_sesn){ 
     echo "<script>swal.fire(Session Successfully Update!');</script>"; 
    header("location: session-manager");     
 }else{ echo "<script>swal.fire('Ooops!','Session is not Update.','error');</script>"; }
    
}
?>
    </div>
</div>

<?php require_once("source/foot-section.php"); ?>