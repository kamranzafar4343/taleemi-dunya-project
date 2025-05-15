<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#chlan-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> all challan print</li>
  </ol>
</nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mb-3">
            <div class="card mb-3 text-center">
                <a href="javascript:void()" onclick="location.href='print-monthly-challan-pdf-i'" class="nav-links text-uppercase bg-white p-3 px-4">Print All Montyly challn type-I</a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mb-3">
            <div class="card mb-3 text-center">
                <a href="javascript:void()" onclick="location.href='print-monthly-challan-pdf-ii'" class="nav-links text-uppercase bg-white p-3 px-4">Print All Montyly challn type-II</a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mb-3">
            <div class="card mb-3 text-center">
                <a href="javascript:void()" onclick="location.href='print-monthly-challan-pdf-iii'" class="nav-links text-uppercase bg-white p-3 px-4">Print All Montyly challn type-III</a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mb-3">
            <div class="card mb-3 text-center">
                <a href="javascript:void()" onclick="location.href='print-monthly-challan-pdf-iv'" class="nav-links text-uppercase bg-white p-3 px-4">Print All Montyly challn type-IV</a>
            </div>
        </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>