<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#settings"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> reset password</li>
  </ol>
</nav>
<script>
function passwrdFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<h4 class="text-uppercase text-center text-white mb-5">Reset Password</h4>
<form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 col-xxl-4">
<label class="text-capitalize text-white">Change password</label>
<div class="input-group">
<input type="password" name="pass" class="form-control" id="myInput" placeholder="Password" required autocomplete="off" value="<?php echo $password; ?>">
<button name="btn_pass" class="btn btn-apna text-capitalize" type="submit"><i class="fa fa-redo"></i> Reset password</button>
</div>
    </div>
    <div class="col-12 col-sm-6 col-3 col-lg-3 col-xxl-3 mt-5">
        <input type="checkbox" onclick="passwrdFunction()">
        <label class="text-capitalize text-white"> Show Password</label>
    </div>
</div>
</form>
        </div>
<?php
if(isset($_POST['btn_pass'])){
     
   $pass = $_POST['pass'];
   
$duplicate = mysqli_query($con,"select * from confirmSchools where institute_id='$userId' && password='$pass'");
if(mysqli_num_rows($duplicate)>0){
    echo "<script>swal.fire('Sorry!','This Password Already Used. Please Change the Password.','info');</script>";
}else{
$inst_pass = mysqli_query($con,"update confirmSchools set password='$pass' where id='$mainid'");
if($inst_pass){ echo "<script>swal.fire('Good Job!','Password Successfully Reset.','success');</script>"; }else{ echo "<script>swal.fire('Oops!','Your Password Wrong. Please Try Again.','error');</script>"; }
    }
    
}
?>
        
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>