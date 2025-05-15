<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#settings"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'">Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> update profile</li>
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
<h4 class="text-uppercase text-center text-white mb-5">create profile</h4>
<form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">Activation Date</label>
<input class="form-control" type="text" onkeypress="isInputNumber(event)" value="<?php echo $joining_date; ?>" readonly>
    </div>
    <div class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">User ID</label>
<input class="form-control" type="text" onkeypress="isInputNumber(event)" value="<?php echo $userId; ?>" readonly>
    </div>
        <div class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">Client Name</label>
<input name="sname" class="form-control text-capitalize" type="text" value="<?php echo $user; ?>">
    </div>
    <div class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">Company / Institute Name</label>
<input name="compny" class="form-control text-capitalize" type="text" value="<?php echo $instituteName; ?>">
    </div>
    <div class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">Campus name</label>
<input name="cmps" class="form-control text-capitalize" type="text" value="<?php echo $campus; ?>">
    </div>
    <div class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">e-mail</label>
<input name="mals" class="form-control" type="email" value="<?php echo $email; ?>">
    </div>
    <div class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">cell</label>
<input name="phne" class="form-control" type="text" onkeypress="isInputNumber(event)" value="<?php echo $cell; ?>">
    </div>
    <div class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">Bank Account#</label>
<input name="bnk" class="form-control" type="text" value="<?php echo $bank_account; ?>">
    </div>
    <div class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">Address</label>
<input name="adres" class="form-control" type="text" value="<?php echo $mainaddress; ?>">
    </div>
    <div class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">logo</label>
<input name="logs" class="form-control" type="file" accept=".jpg,.png,.jpeg">
<input name="logs_old" class="form-control" type="hidden" value="<?php echo $image; ?>">
    </div>
    <div class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3 mt-4">
<button class="btn btn-apna text-capitalize" name="btn_prfle" type="submit"><i class="fa fa-redo"></i> update</button>
    </div>
    
    
</div>
</form>
        </div>
<?php
if(isset($_POST['btn_prfle'])){
     
   $mnid = $_POST['mnid'];
   $sname = $_POST['sname'];
   $compny = $_POST['compny'];
   $cmps = $_POST['cmps'];
   $mals = $_POST['mals'];
   $phne = $_POST['phne'];
   $bnk = $_POST['bnk'];
   $adres = $_POST['adres'];
   if(empty($_FILES['logs']['name'])){
   $logs = $_POST['logs_old']; 
   }else{ 
   $logs = $_FILES['logs']['name'];
   $logs_tmp = $_FILES['logs']['tmp_name'];
   $allow = array('png','jpg', 'jpeg');
   $ext = pathinfo($logs,PATHINFO_EXTENSION);
   $path = "portal-admins/institute-logos/".$logs;
   unlink("portal-admins/institute-logos/$logs");
   move_uploaded_file($logs_tmp,$path);
       }
   

$updt_pass = mysqli_query($con,"update confirmSchools set owner_name='$sname',institute_name='$compny',campus='$cmps',e_mail='$mals',cell='$phne',logo='$logs',address='$adres',account_detail='$bnk' where id='$mainid'");
if($updt_pass){ echo "<script>swal.fire('Good Job!','Profile Successfully Reset.','success');</script>"; }else{ echo "<script>swal.fire('Oops!','Profile not Reset. Please Try Again.','error');</script>"; }    
    
}
?>
        
    </div>
<div class="row mt-3">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
        <div class="card bg-white">
<?php if($image == 'ready.png'){ ?> 
<img src="portal-admins/institute-logos/ready.png" class="card-img-top">
<?php }else{ ?> <img src="portal-admins/institute-logos/<?php echo $image; ?>" class="card-img-top"> <?php } ?>            
            
        </div>
    </div>
</div>
</div>
<?php require_once("source/foot-section.php"); ?>