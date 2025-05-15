<?php
require_once("../functions/db.php");

 

$serch_vle = $_POST['serch_vle'];
$instit_id = $_POST['instit_id'];
$monst = date("m");

$sl_pfl = mysqli_query($con,"select * from addStudents where studentName='$serch_vle' && instituteId='$instit_id'  || roll_num='$serch_vle' && instituteId='$instit_id'");

$acls = 1;
if(mysqli_num_rows($sl_pfl)>0){
?>
<div class="row">
    <div class="col-12 mb-3" style="height:10rem;overflow:scroll;">
<table class='w-100' style='background-color:hsl(35,100%,80%);'>
    <tr align='center'><th style='border:1px solid hsl(0,0%,0%);'>Sr#</th><th style='border:1px solid hsl(0,0%,0%);'>Image</th><th style='border:1px solid hsl(0,0%,0%);'>Student Name</th><th style='border:1px solid hsl(0,0%,0%);'>Father Name</th><th style='border:1px solid hsl(0,0%,0%);'>Class</th><th style='border:1px solid hsl(0,0%,0%);'>Section</th><th style='border:1px solid hsl(0,0%,0%);'>Session</th><th style='border:1px solid hsl(0,0%,0%);'>Monthly Fee</th><th style='border:1px solid hsl(0,0%,0%);'>History</th><th style='border:1px solid hsl(0,0%,0%);'>Attendance</th><th style='border:1px solid hsl(0,0%,0%);'>Result</th></tr>
<?php
while($acls <= 100000 && $pfl = mysqli_fetch_array($sl_pfl)){
    $roll_num = $pfl['roll_num'];
    $class = $pfl['class'];
    $section = $pfl['section'];
    $session = $pfl['session'];
    $image = $pfl['image'];
    $studentName = $pfl['studentName'];
    $fees_status = $pfl['fees_status'];
    $fatherName = $pfl['fatherName'];
    $totalFee = $pfl['totalFee'];
    $instituteId = $pfl['instituteId'];
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instit_id' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<tr>
    <td style='border:1px solid hsl(0,0%,0%);'><?php echo $acls++; ?></td>
    <td style="width:20px;height:10px;overflow:hidden;border:1px solid hsl(0,0%,0%);">
        <img src='student_imgs/<?php echo $image; ?>' class='img-fluid' style="border-radius:50%;width:20px;height:20px;">
    </td>
    <td style='border:1px solid hsl(0,0%,0%);' class='text-uppercase'><?php echo $studentName; ?></td>
    <td style='border:1px solid hsl(0,0%,0%);' class='text-uppercase'><?php echo $fatherName; ?></td>
    <td style='border:1px solid hsl(0,0%,0%);' class='text-uppercase'><?php echo $class_name; ?></td>
    <td style='border:1px solid hsl(0,0%,0%);' class='text-uppercase'><?php echo $section; ?></td>
    <td style='border:1px solid hsl(0,0%,0%);'><?php echo $session; ?></td>
    <td style='border:1px solid hsl(0,0%,0%);'><?php echo $totalFee; ?></td>
    <td style='border:1px solid hsl(0,0%,0%);'>
        <a href='individual-student-fee-history?rols=<?php echo $roll_num; ?>' target='_blank' class='btn btn-success'>Fee</a>
    </td>
    <td style='border:1px solid hsl(0,0%,0%);'>
        <a href='individual-attendance-report?rolid=<?php echo $roll_num; ?>' target='_blank' class='btn btn-info'>Report</a>
    </td>
    <td style='border:1px solid hsl(0,0%,0%);'>
        <a href='individual-results?rolids=<?php echo $roll_num; ?>' target='_blank' class='btn btn-warning'>Result</a>
    </td>
</tr>
<?php } ?>
</table>
    </div>
</div>
<?php }else{ echo "<script>Swal.fire({ position: 'top-end', icon: 'error', title: 'Result not Found!', showConfirmButton: false, timer: 1500 });</script>";
} ?>