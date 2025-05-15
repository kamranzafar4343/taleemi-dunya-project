<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#acad-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> class Manager</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
<?php
$cls_mnger = mysqli_query($con,"select * from addSession where institute_id='$userId'");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $session = $clis['session'];
    $starting_date = $clis['starting_date'];
    $ending_date = $clis['ending_date'];
?>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
    <div class="card bg-white">
            <div class="p-0 text-center fs-5 text-capitalize fw-bold"><?php echo $session; ?></div>
        <div class="d-flex p-0">
            <div class="text-center flex-fill fs-6 text-capitalize text-secondary">from</div>
            <div class="text-center flex-fill fs-6 text-capitalize text-secondary">to</div>
        </div>
        <div class="d-flex p-0">
            <div class="text-center flex-fill fs-6 text-capitalize text-secondary"><?php echo $starting_date; ?></div>
            <div class="text-center flex-fill fs-6 text-capitalize text-secondary"><?php echo $ending_date; ?></div>
        </div>
        
        <div class="d-flex">
            <div class="p-2 flex-fill text-center"><a href="session-edit?id=<?php echo $id; ?>"><i class="text-success fa fa-edit"></i></a></div>
            <div class="p-2 flex-fill text-center">
<?php
if($userId == "75"){
echo '<a href="#"><i class="text-danger fa fa-trash"></i></a>';  
}else{
echo '<a href="session-del?id='.$id.'"><i class="text-danger fa fa-trash-alt"></i></a>';
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