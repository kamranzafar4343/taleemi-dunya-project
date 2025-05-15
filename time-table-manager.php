<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#acad-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> view time table</li>
  </ol>
</nav>

<div class="container-fluid mt-4">
    <div class="row">
<?php
$a = 1;
$sl_time = mysqli_query($con,"select * from timeTable where instituteId='$userId'");
$count = mysqli_num_rows($sl_time);
if($count == 0){ echo "<div class='alert alert-danger text-capitalize'>there are no record.</div"; }
while($a <= 100000 && $result = mysqli_fetch_array($sl_time)){
    
    $id = $result['id'];
    $instituteId = $result['instituteId'];
?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 cl-xxl-3">
            <div class="card mb-3 bg-white text-center">
<a href="view-time-table?id=<?php echo $id; ?>" class="fs-4 fw-bold py-4 text-capitalize nav-links">view time table <?php echo $a++; ?></a>
            </div>
        </div>
<?php } ?>
    </div>
<div class="row mt-4">
    <div class="col text-center" style="width:100%;overflow:hidden;">
        <script type="text/javascript">
	atOptions = {
		'key' : '4b35b8604d3ef79cbbf7b5e1fd1d5934',
		'format' : 'iframe',
		'height' : 90,
		'width' : 728,
		'params' : {}
	};
	
</script>
    </div>
</div>
</div>
<?php require_once("source/foot-section.php"); ?>