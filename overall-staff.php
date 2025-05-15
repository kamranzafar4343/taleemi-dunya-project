<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#staff-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> staff manager</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<table class="table table-responsive table-striped w-100 pt-3" id="allstudents">
    <thead>
    <tr align="center" class="bg-apna">
        <th style="padding:3px;font-size:1rem;">Sr.No</th>
        <th style="padding:3px;font-size:1rem;">StaffID</th>
        <th style="padding:3px;font-size:1rem;">Image</th>
        <th style="padding:3px;font-size:1rem;">Staff Name</th>
        <th style="padding:3px;font-size:1rem;">Post</th>
        <th style="padding:3px;font-size:1rem;">Cell (Username)</th>
        <th style="padding:3px;font-size:1rem;">CNIC (Password)</th>
        <th style="padding:3px;font-size:1rem;">Session</th>
        <th style="padding:3px;font-size:1rem;">Resign</th>
        <th style="padding:3px;font-size:1rem;">Left</th>
        <th style="padding:3px;font-size:1rem;">App SMS</th>
        <th style="padding:3px;font-size:1rem;">SMS</th>
        <th style="padding:3px;font-size:1rem;">Whatsapp</th>
        <th style="padding:3px;font-size:1rem;">Edit</th>
        <th style="padding:3px;font-size:1rem;">Portal</th>
        <th style="padding:3px;font-size:1rem;">Del</th>
    </tr>
    </thead>
    <tbody>
<?php    
$b = 1;
$sl_stud = mysqli_query($con,"select * from addStaff where instituteId='$userId' order by id desc");
$counts = mysqli_num_rows($sl_stud);
if($counts == 0){ echo "<div class='alert alert-danger text-uppercase'>there are no record here.</div>"; }
while($b <= 100000 && $rows = mysqli_fetch_array($sl_stud)){
$stafid = $rows['id'];
$instituteId = $rows['instituteId'];
$staffName = $rows['staffName'];
$fatherName = $rows['fatherName'];
$appliedPost = $rows['appliedPost'];
$staffType = $rows['staffType'];
$session = $rows['session'];
$staffId = $rows['staffId'];
$staffimage = $rows['staffimage'];
$cells = $rows['cell'];
$cnics = $rows['cnic'];
?>
<tr align="center" style="background:hsl(35, 100%, 90%);">
    <td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><?php echo $b++; ?></td>
    <td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><input type="text" style="width:50px;" value="<?php echo $staffId; ?>" readonly></td>
    <td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" width="50"><img src="staff_imgs/<?php if(!empty($staffimage)){ echo $staffimage; }else{ echo "users.jpg"; } ?>" class="img-fluid"></td>
    <td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $staffName; ?></td>
    <td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $appliedPost; ?></td>
    <td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $cells; ?></td>
    <td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $cnics; ?></td>
    <td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><?php echo $session; ?></td>
    <td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><a href="staff-resign?id=<?php echo $stafid; ?>" class="text-decoration-none struck-off-back btn">Resign</a></td>
    <td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><a href="staff-left?id=<?php echo $stafid; ?>" class="text-decoration-none left-back btn">Left</a></td>
    <td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><a href="staff-app-sms-form?id=<?php echo $stafid; ?>"><i class="fa-regular fa-message text-danger"></i></a></td>
    <td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><a href="staff-sms-form?id=<?php echo $stafid; ?>"><i class="fa-regular fa-comments text-info"></i></a></td>
    <td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><a href="staff-whatsapp-form?id=<?php echo $stafid; ?>"><i class="fa-brands fa-whatsapp text-success"></i></a></td>
    <td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><a href="staff-edit?id=<?php echo $stafid; ?>"><i class="text-success fas fa-edit"></i></a></td>
<?php
$sl_prtls = mysqli_query($con,"select * from staffPortal where instituteId='$instituteId' && id='$stafid'");
    $chcks = mysqli_num_rows($sl_prtls);
    if($chcks<1){
?>
    <td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><a href="staff-active-portal?id=<?php echo $stafid; ?>"><i class="fa-regular fa-circle-check" style="color:hsl(306, 93%, 51%);"></i></a></td>
<?php }else { ?>
<td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><a href="staff-deactive-portal?id=<?php echo $stafid; ?>"><i class="fa-solid fa-circle-xmark text-secondary"></i></a></td>
<?php } ?>
    <td style="padding:3px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><a href="staff-del?id=<?php echo $stafid; ?>"><i class="text-danger fas fa-trash-alt"></i></a></td>
    <input type="hidden" value="<?php echo $userId; ?>" name="inst_id">
</tr>
<?php } ?>
</tbody>
</table>
        </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>