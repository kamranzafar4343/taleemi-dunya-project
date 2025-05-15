<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#assignrols"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> assign roles</li>
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
    <div class="row bg-apna">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<h4 class="text-uppercase text-center mb-2">assign roles</h4>
<form method="post" enctype="multipart/form-data">
<div class="row" style="background:hsl(0,0%,15%);">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white fs-6">select Role</label>
<select class="form-control text-capitalize" name="rls">
    <option class="text-capitalize">principal</option>
    <option class="text-capitalize">admin</option>
    <option class="text-capitalize">receptionist</option>
    <option class="text-capitalize">Accountant</option>
</select>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white fs-6">e-mail</label> <span class="text-warning">*</span>
<input name="mals" class="form-control" type="email" autocomplete="off" required>
    </div>
<input name="asin_id" class="form-control" type="hidden" onkeypress="isInputNumber(event)" value="<?php echo $userId; ?>">
<input name="compny" class="form-control text-capitalize" type="hidden" value="<?php echo $instituteName; ?>">
<input name="sname" class="form-control text-capitalize" type="hidden" value="<?php echo $user; ?>">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white fs-6">Password</label> <span class="text-warning">*</span>
<input name="pss" class="form-control" type="password" autocomplete="off" required>
    </div>
<input name="phne" class="form-control" required type="hidden" onkeypress="isInputNumber(event)"  value="<?php echo $cell; ?>"maxlength="11" autocomplete="off">
    <input name="logs" class="form-control" type="hidden" value="<?php echo $image; ?>">
    
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3 mt-4">
<button class="btn btn-apna text-capitalize" name="btn_prfle" type="submit"><i class="fa-regular fa-square-plus"></i> create</button>
    </div>
    
    
</div>
</form>
        </div>
<?php
if(isset($_POST['btn_prfle'])){
     
    $asin_id = $_POST['asin_id'];
    $sname = strtolower($_POST['sname']);
    $compny = $_POST['compny'];
    $mals = $_POST['mals'];
    $phne = $_POST['phne'];
    $logs = $_POST['logs'];
    $rls = strtolower($_POST['rls']);
    $pas = $_POST['pss'];
   

$updt_pass = mysqli_query($con,"insert into confirmSchools (institute_id,owner_name,institute_name,e_mail,cell,logo,assign_role,password) values ('$asin_id','$sname','$compny','$mals','$phne','$logs','$rls','$pas')");
if($updt_pass){ echo "<script>swal.fire('Good Job!','New User Profile Successfully Create.','success');</script>"; }else{ echo "<script>swal.fire('Oops!','New User Profile not Create. Please Try Again.','error');</script>"; }
        
}
?>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>