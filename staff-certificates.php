<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#e-certificates"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> e-certificates</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
<h4 class="fs-4 fw-bold text-uppercase mb-3 mt-3 text-white" style="border-bottom:2px dashed white;">staff certificates</h4>
<?php
$sl_st = mysqli_query($con,"select * from addStaff where instituteId='$userId'");
$cont = mysqli_num_rows($sl_st);
if($cont == 0){
    echo "<div class='text-capitalize text-white'>folder is empty...</div>";
}
while($result=mysqli_fetch_array($sl_st)){
    
    $id = $result['id'];
    $appliedPost = $result['appliedPost'];
    $staffType = $result['staffType'];
    $staffName = $result['staffName'];
?>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
    <div class="card hovr bg-apna">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-fill p-2 text-center fs-4 fw-bold text-capitalize">
                    <?php echo $staffName; ?>
                </div>
            </div>
            <div class="d-flex" style="background:hsl(35, 100%, 80%);">
<div class="p-2 text-center flex-fill"><a href="experience-letter?id=<?php echo $id; ?>" target="_blank" title="Experience Letter">
    <i class="fa-solid fa-envelope-open-text fa-2x" style="color:hsl(192, 100%, 50%);"></i>
</a></div>
<div class="p-2 text-center flex-fill"><a href="teacher-of-month?id=<?php echo $id; ?>" target="_blank" title="Teacher of Month">
    <i class="fa-solid fa-person-burst fa-2x" style="color:hsl(93, 100%, 50%);"></i>
</a></div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>