<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> left student manager</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<script>
     $(document).ready(function(){
    $("#classstudents").DataTable({
        columnDefs: [{
            "defaultContent": "-",
            "targets": "_all"
        }],
        bLengthChange: true,
        lengthMenu: [[10, 50, 100, -1], [10, 50, 100, "All"]],
        bFilter: true,
        bSort: true,
        bPaginate: true
    });
});
</script>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col">
<table class="w-100 bg-apna-body" id="classstudents">
<thead>
    <tr align="center" class="bg-apna">
        <th class="border-apna">Sr.No</th>
        <th class="border-apna">Image</th>
        <th class="border-apna">Student Name</th>
        <th class="border-apna">Father Name</th>
        <th class="border-apna">Class</th>
        <th class="border-apna">Section</th>
        <th class="border-apna">Session</th>
        <th class="border-apna">Roll No.</th>
        <th class="border-apna">Monthly Fee</th>
        <th class="border-apna">Form</th>
        <th class="border-apna">History</th>
        <th class="border-apna">Whatsapp</th>
        <th class="border-apna">Action</th>
    </tr>
</thead>
<tbody>
<?php    
$b = 1;
$sl_stud = mysqli_query($con,"select * from leftStudents where instituteId='$userId'");
$counts = mysqli_num_rows($sl_stud);
if($counts == 0){ echo "<div class='alert alert-danger text-uppercase'>there are no record here.</div>"; }
while($b <= 100000 && $rows = mysqli_fetch_array($sl_stud)){
$studntid = $rows['id'];
$instituteId = $rows['instituteId'];
$studentName = $rows['studentName'];
if(!empty($rows['image'])>0){ $fmimage = $rows['image']; }else{ $fmimage = "users.jpg"; }
$fatherName = $rows['fatherName'];
$class = $rows['class'];
$section = $rows['section'];
$session = $rows['session'];
$roll_num = $rows['roll_num'];
$totalFee = $rows['totalFee'];
?>
<tr align="center">
    <td class="border-apna"><?php echo $b++; ?></td>
    <td class="border-apna" width="50"><img src="student_imgs/<?php echo $fmimage; ?>" class="img-fluid"></td>
    <td class="text-capitalize border-apna"><?php echo $studentName; ?></td>
    <td class="text-capitalize border-apna"><?php echo $fatherName; ?></td>
    <td class="text-uppercase border-apna"><?php echo $class; ?></td>
    <td class="text-uppercase border-apna"><?php echo $section; ?></td>
    <td class="border-apna"><?php echo $session; ?></td>
    <td class="border-apna"><?php echo $roll_num; ?></td>
    <td class="border-apna"><?php echo $totalFee; ?></td>
    <td class="border-apna"><a href="left-student-print-form?id=<?php echo $studntid; ?>"><i class="fa-solid fa-table-columns"></i></a></td>
    <td class="border-apna"><a href="left-student-fee-history?id=<?php echo $roll_num; ?>" class="btn text-capitalize"><i class="fa-solid fa-clock-rotate-left"></i> fee</a></td>
    <td class="border-apna"><a href="whatsapp-individual-sender?id=<?php echo $studntid; ?>"><i class="fa-brands fa-whatsapp text-success"></i></a></td>
    <td class="border-apna"><a href="readmission-left-students?id=<?php echo $studntid; ?>" class="btn btn-success"><i class="fa-solid fa-user-plus"></i></a></td>
    <input type="hidden" value="<?php echo $userId; ?>" name="inst_id">
</tr>
<?php } ?>
</tbody>
</table>

        </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>