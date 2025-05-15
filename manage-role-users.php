<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#assignrols"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Asign Role Manager</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
<?php
$cls_mnger = mysqli_query($con,"select * from confirmSchools where institute_id='$userId' order by id desc");
if(mysqli_num_rows($cls_mnger)>0){
  while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $userId = $clis['institute_id'];
    $user = $clis['owner_name'];
    $instituteName = $clis['institute_name'];
    $email = $clis['e_mail'];
    $cell = $clis['cell'];
    $password = $clis['password'];
    $image = $clis['logo'];
    $role = $clis['assign_role'];
if($role === 'director'){  }else{
?>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3">
    <div class="card bg-white">
        <img src="portal-admins/institute-logos/<?php echo $image; ?>" class="card-img-top">
        <div class="card-body">
<div class="d-flex">
    <div class="p-2 text-center flex-fill fs-4 text-capitalize fw-bold"><?php echo $user."<br><span class='fs-6 fw-normal'>(".$role.")<span>"; ?></div>
    <div class="p-2 flex-fill text-center"><a href="role-del?id=<?php echo $id; ?>"><i class="text-danger fa fa-trash-alt fa-2x"></i></a></div>
</div>
<div class="d-flex">
    <div class="p-2 text-center flex-fill fw-bold">Username</div>
    <div class="p-2 text-center flex-fill"><input value="<?php echo $email; ?>" type="text" readonly/></div>
</div>
<div class="d-flex">
    <div class="p-2 text-center flex-fill fw-bold">Password</div>
    <div class="p-2 text-center flex-fill"><?php echo $password; ?></div>
</div>
        </div>  
    </div>
</div>

<?php 
}
    }  
}else{ echo "<div class='alert alert-danger text-capitalize'>there are no user asign!</div>"; }
?>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>