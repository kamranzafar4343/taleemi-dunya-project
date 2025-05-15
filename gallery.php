<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#studentportal"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">student gallery</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
        <div class="row">
    <form method="post" enctype="multipart/form-data">
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3 mb-3">
                <input class="form-control" name="instiid" value="<?php echo $userId; ?>" type="hidden">
                <label class="text-capitalize">image</label>
<div class="input-group">
    <input class="form-control" type="file" name="imgs" required accept=".png,.jpg,.jpeg">
    <button name="btn_grly" type="submit" class="btn btn-apna text-uppercase"><i class="fa-solid fa-share"></i> share</button>
</div>
            </div>
</form>
        </div>
<?php
if(isset($_POST['btn_grly'])){
    
    $instiid = $_POST['instiid'];
    
    $uimgs = $_FILES['imgs']['name'];
    $uimgs_tmp = $_FILES['imgs']['tmp_name'];
    $allow = array('png','jpg', 'jpeg');
    $ext = strtolower(pathinfo($uimgs,PATHINFO_EXTENSION));
    $path = "student-gallery/".$uimgs;

if(!in_array($ext,$allow)){
echo "<script>swal.fire('Sorry!','Only Allowed the PNG, JPG and JPEG Files.','info');</script>";
}else{
move_uploaded_file($uimgs_tmp,$path);
$inst_students = mysqli_query($con,"insert into studentGallery (instituteId,files) values ('$instiid','$uimgs')");
if($inst_students){ echo "<script>swal.fire('Good Job!','Gallery Share to Students Successfully.','success');</script>"; }else{ echo "<script>swal.fire('Oops!','Gallery is not Share to Students.','error');</script>"; }    
        }
}
?>
</div>

<br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
<h4 class="fs-4 fw-bold text-uppercase border-bottom border-white text-white">gallery manager</h4>
        </div>
<?php
$sl_img = mysqli_query($con,"select * from studentGallery where instituteId='$userId'");
$count = mysqli_num_rows($sl_img);
if($count == 0){
    echo "<div class='alert alert-danger text-capitalize'>there are record not found.</div>";
}
while($rows = mysqli_fetch_array($sl_img)){
    $id = $rows['id'];
    $files = $rows['files'];
?>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xl-2 mb-3">
            <div class="card bg-apna">
                <img src="student-gallery/<?php echo $files; ?>" class="card-img-top">
                <div class="card-body" style='background:hsl(35, 100%, 80%);'>
<div class="d-flex">
    <div class="flex-fill p-2 text-center"><a href="#"><i class="fa fa-edit text-success"></i></a></div>
    <div class="flex-fill p-2 text-center"><a href="delete-student-gallery?id=<?php echo $id; ?>"><i class="fa fa-trash-alt text-danger"></i></a></div>
</div>
                </div>
            </div>
        </div>
<?php } ?>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>