<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#add-students"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='alifile'"> ali file</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> staff assign card</li>
  </ol>
</nav>              
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<table class="table table-responsive table-striped w-100 bg-white">
    <thead>
        <tr>
            <th>Joining Date</th>
            <th>Staff ID</th>
            <th>Staff Name</th>
            <th>Applied Post</th>
            <th>Phone</th>
            <th>Subject</th>
            <th>Qualification</th>
            <th>Salary</th>
            <th>Time IN</th>
            <th>Time OUT</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
<?php
$sl_inqy = mysqli_query($con,"select * from addStaff where instituteId='$userId' order by id desc");
$cnt = mysqli_num_rows($sl_inqy);
if($cnt == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($result = mysqli_fetch_array($sl_inqy)){
    $id = $result['id'];
    $joiningDate = $result['joiningDate'];
    $staffId = $result['staffId'];
    $staffName = $result['staffName'];
    $appliedPost = $result['appliedPost'];
    $phone = $result['phone'];
    $subject = $result['subject'];
    $qualification = $result['qualification'];
    $salary = $result['salary'];
    $timeIn = $result['timeIn'];
    $timeOut = $result['timeOut'];
?>
<tr>
    <td><?php echo $joiningDate; ?></td>
    <td><?php echo $staffId; ?></td>
    <td><?php echo $staffName; ?></td>
    <td><?php echo $appliedPost; ?></td>
    <td><?php echo $phone; ?></td>
    <td><?php echo $subject; ?></td>
    <td><?php echo $qualification; ?></td>
    <td><?php echo $salary; ?></td>
    <td><?php echo $timeIn; ?></td>
    <td><?php echo $timeOut; ?></td>
    <td><a href="staff-assign-card-number?id=<?php echo $id; ?>"><i class="fa-regular fa-id-card fa-2x"></i></a></td>
</tr>
<?php } ?>
    </tbody>
</table>
        </div>
    </div>
</div>