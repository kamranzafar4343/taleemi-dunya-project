<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#acad-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Section Manager</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
<?php
$cls_mnger = mysqli_query($con,"select * from addSection where institute_id='$userId'");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $class = $clis['class'];
    $section_name = $clis['section_name'];
    $strength = $clis['strength'];

$sl_clm = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rest = mysqli_fetch_assoc($sl_clm); if(!empty($rest['class_name'])){ $class_name = $rest['class_name']; }else{ $class_name = "Please Class Update."; }
?>
<div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3">
    <div class="card bg-white">
        <div class="d-flex">
            <div class="p-2 text-center flex-fill fs-6 text-uppercase fw-bold">Class Name</div>
            <div class="p-2 text-center flex-fill fs-6 text-uppercase fw-bold">Section</div>
            <div class="p-2 text-center flex-fill fs-6 fw-bold"> Capacity</div>
        </div>
        <div class="d-flex">
            <div class="p-2 text-center flex-fill fs-6 text-uppercase"><?php echo $class_name; ?></div>
            <div class="p-2 text-center flex-fill fs-6 text-uppercase"><?php echo $section_name; ?></div>
            <div class="p-2 text-center flex-fill fs-6"><?php echo $strength; ?></div>
        </div>
        <div class="d-flex">
            <div class="p-2 flex-fill text-center"><a href="section-edit?id=<?php echo $id; ?>"><i class="text-success fa fa-edit"></i></a></div>
            <div class="p-2 flex-fill text-center">
<?php
    if($userId == "758948"){ echo '<a href="#"><i class="text-danger fa fa-trash"></i></a>'; }else{ echo '<a href="section-del?id='.$id.'"><i class="text-danger fa fa-trash-alt"></i></a>'; }
?>

            </div>
        </div>
    </div>
</div>

<?php } ?>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>