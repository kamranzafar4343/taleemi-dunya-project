<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#stock"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='stock-out'"> dispatch stock</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> dispatch history</li>
  </ol>
</nav>
<div class="container-fluid mt-4">
<div class="row">
    
<?php
$a = 1;
$sl_stk = mysqli_query($con,"select * from vendorAccount where instituteId='$userId'");
if(mysqli_num_rows($sl_stk)>0){
    while($a <= 1000000 && $skreslt = mysqli_fetch_array($sl_stk)){
$vname = $skreslt['vname'];
$vids = $skreslt['vids'];
?>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xl-2">
    <div class="card mb-3 text-center">
        <a href="show-history?id=<?php echo $vids; ?>" class="nav-links text-uppercase bg-white p-3 px-4"><?php echo $vname; ?></a>
    </div>
</div>
<?php
    }
}else{ echo "<div class='alert alert-danger text-capitlaize'></div>"; }
?>
</div>
    
</div>

<?php require_once("source/foot-section.php"); ?>