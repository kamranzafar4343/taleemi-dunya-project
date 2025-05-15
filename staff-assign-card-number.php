<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<script>
    window.onload = function(){ vlues.focus() }
</script>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#add-students"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='alifile'"> ali file</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='staff-assign-card'"> staff assign card</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">  card number assigned </li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_GET['id'])){
    $ids = $_GET['id'];
    $sel_crd = mysqli_query($con,"select * from addStaff where id='$ids' && instituteId='$userId'");
    $row = mysqli_fetch_assoc($sel_crd);
    $staffName = $row['staffName'];
    $digitalCard = $row['digitalCard'];
}
?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
<form method="post" enctype="multipart/form-data">
    <div class="input-group">
        <input name="crd" class="form-control" id="vlues" type="text" autocomplete="off" value="<?php echo $digitalCard; ?>" onkeypress="isInputNumber(event)">
        <button name="btn_card" class="btn btn-apna text-capitalize" type="submit">assign card</button>
    </div>
</form>
<?php
if(isset($_POST['btn_card'])){
    $crd = $_POST['crd'];
    
$duplicate = mysqli_query($con,"select * from addStaff where digitalCard='$crd'");
if(mysqli_num_rows($duplicate)>0){
    echo "<script>swal.fire('Carefully Read!','This Card Already Assigned.','info');</script>";
}else{
$sl_crd = mysqli_query($con,"update addStaff set digitalCard='$crd' where id='$ids'");
if($sl_crd){ echo "<script>swal.fire('Good Job!','Card Assign Successfully.','success');</script>"; }else{ "<script>swal.fire('Oops!','Card is not Assign.','error');</script>"; }    
}

}
?>
        </div>
    </div>
</div>