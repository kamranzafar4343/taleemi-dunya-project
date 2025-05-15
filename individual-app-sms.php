<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> individual app SMS</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<style>
.table, table, .table-responsive, .table tr, .table tr th, .table tr td{
    border:none;
    border-bottom:none;
    box-shadow:none;
}
</style>
<?php
if(isset($_GET['id'])){
    
    $ids = $_GET['id'];
    
$sl_rsl = mysqli_query($con,"select * from addStudents where instituteId='$userId' && id='$ids'");
$frm = mysqli_fetch_assoc($sl_rsl);

    $instituteId = $frm['instituteId'];
    $familyId = $frm['familyId'];
    $roll_num = $frm['roll_num'];
    $class = $frm['class'];
    $section = $frm['section'];
    $session = $frm['session'];
    $frmimage = $frm['image'];
    $studentName = $frm['studentName'];
}
?>
<div class="container-fluid">
    <div class="row" id="bodies mt-3">
        <div class="col datas">
<form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-12 mt-3 mb-3">
<label class="text-capitalize">attach file / image</label>
<input type="file" name="filimgs" class="form-control">
    </div>
    <div class="col-12 mb-3">
<label class="text-capitalize">message</label>
<textarea class="form-control" rows="8" placeholder="Write Message......." name="cntnt"></textarea>
<input type="hidden" value="<?php echo $instituteId; ?>" name="instud">
<input type="hidden" value="<?php echo $familyId; ?>" name="fmlies">
<input type="hidden" value="<?php echo $roll_num; ?>" name="rolnbrs">
<input type="hidden" value="<?php echo $class; ?>" name="cles">
<input type="hidden" value="<?php echo $section; ?>" name="sectn">
<input type="hidden" value="<?php echo $session; ?>" name="sesin">
<input type="hidden" value="<?php echo $frmimage; ?>" name="fmimgs">
<input type="hidden" value="<?php echo $studentName; ?>" name="stnme">
    </div>
    <div class="col-12 mt-4" align="right">
        <button type="submit" name="bins" class="btn btn-apna text-uppercase"><i class="fa-regular fa-paper-plane"></i> send</button>
    </div>
</div>    
</form>
<?php
if(isset($_POST['bins'])){
    
    $instud = $_POST['instud'];
    $fmlies = $_POST['fmlies'];
    $rolnbrs = $_POST['rolnbrs'];
    $cles = $_POST['cles'];
    $sectn = $_POST['sectn'];
    $sesin = $_POST['sesin'];
    $fmimgs = $_POST['fmimgs'];
    $stnme = $_POST['stnme'];
    
    $filimgs = $_FILES['filimgs']['name'];
    $filimgs_tmp = $_FILES['filimgs']['tmp_name'];
    $allow = array('png','pdf','doc','jpg');
	$ext = pathinfo($filimgs,PATHINFO_EXTENSION);
	$path = "student-sms-images/".$filimgs;
    $cntnt = mysqli_real_escape_string($con,$_POST['cntnt']);
    $dats = date("j-m-Y");
    $mnths = date("m");

move_uploaded_file($filimgs_tmp,$path);

$sl_alts = mysqli_query($con,"insert into sms(instituteId,famlyId,roll_num,class,section,session,stu_img,student_name,file_image,message,sms_date,month)values('$instud','$fmlies','$rolnbrs','$cles','$sectn','$sesin','$fmimgs','$stnme','$filimgs','$cntnt','$dats','$mnths')");

if($sl_alts){ echo "<script>const Toast = Swal.mixin({
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
  title: 'Message Successfully Sent!'
})</script>"; }else{ echo "<script>const Toast = Swal.mixin({
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
  title: 'Message not Sent!'
})</script>"; }


}
?>
        </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>