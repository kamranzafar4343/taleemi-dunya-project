<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#account-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> payroll manager</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<table class="table table-responsive w-100 pt-3" id="allstudents">
<thead>
    <tr align="center" class="bg-apna">
        <th>Sr.No</th>
        <th>StaffID</th>
        <th>Image</th>
        <th>Staff Name</th>
        <th>Post</th>
        <th>Type</th>
        <th>Session</th>
        <th>Advance Salary</th>
        <th>Bonus</th>
        <th>Month</th>
        <th>Net Salary</th>
        <th>Paid</th>
        <th>Edit</th>
        <th>Del</th>
    </tr>
</thead>
<tbody>
<?php    
$b = 1;

$sl_stud = mysqli_query($con,"select * from payroll where instituteId='$userId'");
$counts = mysqli_num_rows($sl_stud);
if($counts == 0){ echo "<div class='alert alert-danger text-uppercase'>there are no record here.</div>"; }
while($b <= 100000 && $rows = mysqli_fetch_array($sl_stud)){
$stafid = $rows['id'];
$instituteId = $rows['instituteId'];
$staff_name = $rows['staff_name'];
$staff_type = $rows['staff_type'];
$apply_post = $rows['apply_post'];
$staffType = $rows['staffType'];
$salary = $rows['salary'];
$presents = $rows['presents'];
$absents = $rows['absents'];
$leaved = $rows['leaved'];
$half_leave = $rows['half_leave'];
$per_day_salary = $rows['per_day_salary'];
$advance_salary = $rows['advance_salary'];
$bonus = $rows['bonus'];
$net_salary = $rows['net_salary'];
$month = $rows['month'];
$pay_amount = $rows['pay_amount'];
$remaing_payable = $rows['remaing_payable'];
$staff_id = $rows['staff_id'];
$instituteId = $rows['instituteId'];
$session = $rows['session'];
$salary_date = $rows['salary_date'];
if(!empty($rows['staff_image'])){ $staff_image = $rows['staff_image']; }else{ $staff_image = "users.jpg"; }
?>
<tr align="center" style="background:hsl(35, 100%, 80%);">
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $b++; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $staff_id; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" width="20"><img src="staff_imgs/<?php echo $staff_image; ?>" class="img-fluid" style="width:50%;"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $staff_name; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $apply_post; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $staffType; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $session; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $advance_salary; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $bonus; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $net_salary; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo date('F', mktime(0, 0, 0, $month, 10)); ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $pay_amount; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><a href="payroll-edit?id=<?php echo $stafid; ?>"><i class="text-success fas fa-edit"></i></a></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><a href="payroll-del?id=<?php echo $stafid; ?>"><i class="text-danger fas fa-trash-alt"></i></a></td>
    <input type="hidden" value="<?php echo $userId; ?>" name="inst_id">
</tr>
<?php } ?>
</tbody>
</table>
        </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>