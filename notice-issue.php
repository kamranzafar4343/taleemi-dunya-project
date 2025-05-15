<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#teacherportal"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> teacher notices</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                <input class="form-control" name="instid" value="<?php echo $userId; ?>" type="hidden">
                <label class="text-capitalize">message for all staff</label>
                <textarea class="form-control" name="notce" rows="15" placeholder="Write Notice For All Students...."></textarea>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3" align="right">
                <button name="btn_ntc" type="submit" class="btn btn-apna text-uppercase"><i class="fa-solid fa-share"></i> share</button>
            </div>
        </div>
    </form>
<?php
if(isset($_POST['btn_ntc'])){
    $instid = $_POST['instid'];
    $notce = mysqli_real_escape_string($con,$_POST['notce']);
    $dte = date("j-m-Y");
    
$inst_notc = mysqli_query($con,"insert into staffNotices (instituteId,messages,dates) values ('$instid','$notce','$dte')");
if($inst_notc){ echo '<script>
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "Message Successfully Sent!"
});
</script>'; }else{ echo '<script>
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "error",
  title: "Message is not Sent!"
});
</script>'; }    
}
?>    
</div><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
<h4 class="fs-4 fw-bold text-uppercase text-white border-bottom border-white mb-4">notice manager</h4>
        </div>
<?php
$sl_ntic = mysqli_query($con,"select * from staffNotices where instituteId='$userId'");
if(mysqli_num_rows($sl_ntic)>0){}else{ echo "<div class='alert alert-danger text-capitalize'>there are no notices!</div>"; }
while($resuls = mysqli_fetch_array($sl_ntic)){
    $id = $resuls['id'];
    $messages = $resuls['messages'];
?>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xl-6 mb-3">
            <a href="delete-notices?id=<?php echo $id; ?>" class="nav-link">
<div class="card p-3" style="background:hsl(35, 100%, 80%);">
    <?php echo $messages; ?>
</div>
            </a>
        </div>
<?php } ?>
    </div>
</div>
<br>
<?php require_once("source/foot-section.php"); ?>