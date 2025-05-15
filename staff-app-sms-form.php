<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#staff-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='overall-staff'"> staff manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> individual app SMS</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_GET['id'])){
    
    $ids = $_GET['id'];
    
$sl_rsl = mysqli_query($con,"select * from addStaff where instituteId='$userId' && id='$ids'");
$frm = mysqli_fetch_assoc($sl_rsl);

    $staffName = $frm['staffName'];
    $fatherName = $frm['fatherName'];
    $staffimage = $frm['staffimage'];
    $appliedPost = $frm['appliedPost'];
    $staffType = $frm['staffType'];
    $session = $frm['session'];
    $staffId = $frm['staffId'];
    $instituteId = $frm['instituteId'];
    $frmdate = date("j-m-Y");
}
?>
<div class="container-fluid mt-4">
<form enctype="multipart/form-data" method="post">
<div class="row">
    <input type="hidden" value="<?php echo $staffName; ?>" name="stnme">
    <input type="hidden" value="<?php echo $fatherName; ?>" name="ftnme">
    <input type="hidden" value="<?php echo $staffimage; ?>" name="stimg">
    <input type="hidden" value="<?php echo $appliedPost; ?>" name="aplypst">
    <input type="hidden" value="<?php echo $staffType; ?>" name="stftpe">
    <input type="hidden" value="<?php echo $session; ?>" name="sesin">
    <input type="hidden" value="<?php echo $staffId; ?>" name="stfids">
    <input type="hidden" value="<?php echo $instituteId; ?>" name="instid">
    <input type="hidden" value="<?php echo $frmdate; ?>" name="frmdte">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">image file</label>
        <input type="file" class="form-control" name="files">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Class</label>
        <select class="text-capitalize form-control" name="clsp">
            <option class="text-capitalize" value=" "></option>
<?php
$sl_slt = mysqli_query($con,"select * from addClass where institute_id='$userId' order by id desc");
while($rslts = mysqli_fetch_array($sl_slt)){
    $class_name = $rslts['class_name'];
?>
    <option class="text-capitalize"><?php echo $class_name; ?></option>
<?php } ?>
        </select>
    </div>
    <div class="col-12 mb-3">
<label class="text-capitalize">Message</label>
<textarea class="form-control" rows="10" placeholder="Write Message....." name="conts"></textarea>  
    </div>
    <div class="col-12" align="right">
<button type="submit" name="sms_form" class="btn btn-danger text-capitalize"><i class="fa-regular fa-message"></i> Send on APP SMS</button>
    </div>
</div>
</form>
<?php
if(isset($_POST['sms_form'])){

$stnme = $_POST['stnme'];
$ftnme = $_POST['ftnme'];
$stimg = $_POST['stimg'];
$aplypst = $_POST['aplypst'];
$stftpe = $_POST['stftpe'];
$sesin = $_POST['sesin'];
$clsp = $_POST['clsp'];
$stfids = $_POST['stfids'];

$files = $_FILES['files']['name'];
$filestmp = $_FILES['files']['tmp_name'];
$paths = "teacher-alerts-shoots/".$files;
move_uploaded_file($filestmp,$paths);

$conts = $_POST['conts'];
$instid = $_POST['instid'];
$frmdte = $_POST['frmdte'];


$inst_alts = mysqli_query($con,"insert into teacherAlerts (staff_name,father_name,staff_image,post,type,session,class,staffId,image_alert,message,instituteId,delivery_date) values ('$stnme','$ftnme','$stimg','$aplypst','$stftpe','$sesin','$clsp','$stfids','$files','$conts','$instid','$frmdte')");

if($inst_alts){ 
echo "<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Send Message Successfully!'
})
</script>";
}else{ 

echo "<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: 'Message not Send!'
})
</script>";
    
}
   
}
?>
</div>
<?php require_once("source/foot-section.php"); ?>