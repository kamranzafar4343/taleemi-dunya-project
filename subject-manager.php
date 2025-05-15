<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#acad-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Subject Manager</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
<?php
$cls_mnger = mysqli_query($con,"select * from addSubjects where institute_id='$userId'");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $subject_name = $clis['subject_name'];
    $classid = $clis['classid'];
$slcls = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$classid'");
$clrst = mysqli_fetch_assoc($slcls);
$class_name = $clrst['class_name'];
?>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
    <div class="card bg-white">
        <div class="d-flex">
            <div class="p-2 text-center flex-fill fs-6 text-capitalize fw-bold"><?php echo $subject_name; ?></div>
        </div>
        <div class="d-flex">
            <div class="p-2 text-center flex-fill fs-6 text-uppercase text-secondary"><?php if(!empty($class_name)){ echo $class_name; }else{ echo "Please Update Class Name"; } ?></div>
        </div>
        <div class="d-flex">
            <div class="p-2 flex-fill text-center"><a href="subject-edit?id=<?php echo $id; ?>"><i class="text-success fa fa-edit"></i></a></div>
            <div class="p-2 flex-fill text-center">
<?php
//758948
if($userId == "75894"){
echo '<a href="#"><i class="text-danger fa fa-trash"></i></a>';  
}else{
echo '<a href="subject-del?id='.$id.'"><i class="text-danger fa fa-trash-alt"></i></a>';
}
?>
            </div>
        </div>
    </div>
</div>

<?php } ?>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>