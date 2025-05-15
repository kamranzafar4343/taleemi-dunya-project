<?php
require_once("../functions/db.php");

$schl_id = $_POST['schl_id'];
?>
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
<table class="bg-apna-body w-100" id="classstudents">
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
$sl_stud = mysqli_query($con,"select * from struckoffStudents where instituteId='$schl_id'");
$counts = mysqli_num_rows($sl_stud);
if($counts == 0){ echo "<div class='alert alert-danger text-uppercase'>there are no record here.</div>"; }
while($b <= 100000 && $rows = mysqli_fetch_array($sl_stud)){
$studntid = $rows['id'];
$instituteId = $rows['instituteId'];
$studentName = $rows['studentName'];
if(!empty($rows['image'])>0){ $frmimage = $rows['image']; }else{ $frmimage = "users.jpg"; }
$fatherName = $rows['fatherName'];
$class = $rows['class'];
$section = $rows['section'];
$session = $rows['session'];
$totalFee = $rows['totalFee'];
$roll_num = $rows['roll_num'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$schl_id' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<tr align="center">
    <td class="border-apna"><?php echo $b++; ?></td>
    <td class="border-apna" width="50"><img src="student_imgs/<?php echo $frmimage; ?>" class="img-fluid"></td>
    <td class="text-capitalize border-apna"><?php echo $studentName; ?></td>
    <td class="text-capitalize border-apna"><?php echo $fatherName; ?></td>
    <td class="text-uppercase border-apna"><?php echo $class_name; ?></td>
    <td class="text-uppercase border-apna"><?php echo $section; ?></td>
    <td class="border-apna"><?php echo $session; ?></td>
    <td class="border-apna"><?php echo $roll_num; ?></td>
    <td class="border-apna"><?php echo $totalFee; ?></td>
    <td class="border-apna"><a href="struck-off-student-print-form?id=<?php echo $studntid; ?>"><i class="fa-solid fa-table-columns"></i></a></td>
    <td class="border-apna"><a href="student-fee-history?id=<?php echo $roll_num; ?>" class="btn text-capitalize">
        <i class="fa-solid fa-clock-rotate-left"></i> fee</a>
    </td>
    <td class="border-apna"><a href="whatsapp-individual-sender?id=<?php echo $studntid; ?>"><i class="fa-brands fa-whatsapp text-success"></i></a></td>
    <td class="border-apna"><a href="readmission-struckoff-students?id=<?php echo $studntid; ?>" class="btn btn-success"><i class="fa-solid fa-user-plus"></i> </a></td>
</tr>
<?php } ?>
</tbody>
</form>

</table>

        </div>
    </div>
</div>