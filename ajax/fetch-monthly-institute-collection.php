<?php
require_once("../functions/db.php");

$colg_id = $_POST['colg_id'];
$aply_clas = $_POST['aply_clas'];
$aply_sectin = $_POST['aply_sectin'];
$aply_sesin = $_POST['aply_sesin'];

$selct_schol = mysqli_query($con,"select * from confirmSchools where institute_id='$colg_id'");
$schl = mysqli_fetch_assoc($selct_schol);
$institute_name = $schl['institute_name'];
$campus = $schl['campus'];
$logos = $schl['logo'];

$sl_colt = mysqli_query($con,"select * from addStudents where instituteId='$colg_id' && class='$aply_clas' && section='$aply_sectin' && session='$aply_sesin'");
?>
<div class="row">
    <div class="col-12 mb-3">
<table class="table table-responsive w-100" id="allstudents">
    <thead>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th width="50">
<img class="img-fluid" src="portal-admins/institute-logos/<?php echo $logos; ?>">
            </th>
            <th colspan="10">
<h3 class="fs-3 fw-bolder text-uppercase text-center"><?php echo $institute_name; ?></h3>
<div class="text-center"><?php echo $campus; ?></div>
            </th>
        </tr>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th colspan="11" class="text-uppercase fs-6 fw-bold text-center" style="border:1px solid hsl(25, 100%, 50%);">
Student Admission Form Record Month of "<?php echo date("F"); ?>" Session (<?php echo $aply_sesin; ?>)
            </th>
        </tr>
        <tr class="bg-apna">
            <th>#</th>
            <th>Date</th>
            <th>Roll#</th>
            <th>Image</th>
            <th>Student Name</th>
            <th>Class</th>
            <th>Section</th>
            <th>Session</th>
            <th>M.Fee</th>
            <th>Disc.</th>
            <th>Final Fee</th>
        </tr>
    </thead>
    <tbody>
<?php
if(mysqli_num_rows($sl_colt)>0){
$tr=1;
while($tr <= 100000 && $colct = mysqli_fetch_array($sl_colt)){
    
    $dates = $colct['admissionDate'];
    $rollno = $colct['roll_num'];
    $student_imgs = $colct['image'];
    $student_name = $colct['studentName'];
    $class = $colct['class'];
    $section = $colct['section'];
    $session = $colct['session'];
    $monthly_fee = $colct['monthlyFee'];
    $discount = $colct['discount'];
    $totalFee = $colct['totalFee'];
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$colg_id' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
    
$sl_mfe = mysqli_query($con,"select SUM(totalFee) as monthfes from addStudents where instituteId='$colg_id' && class='$aply_clas' && section='$aply_sectin' && session='$aply_sesin'"); 
while($rslts = mysqli_fetch_array($sl_mfe)){
    $monthfes = $rslts['monthfes'];
}    
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <th style="border:1px solid hsl(25, 100%, 50%);"><?php echo $tr++; ?></th>
    <th style="border:1px solid hsl(25, 100%, 50%);"><?php echo $dates; ?></th>
    <th style="border:1px solid hsl(25, 100%, 50%);"><?php echo $rollno; ?></th>
    <td style="border:1px solid hsl(25, 100%, 50%);" width="30">
        <img src="student_imgs/<?php if(empty($student_imgs) || $student_imgs === "None" || $student_imgs === "none"){ echo "users.jpg"; }else { echo $student_imgs; } ?>" class="img-fluid">
    </td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $student_name; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $class_name; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $section; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $session; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $monthly_fee; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $discount; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $totalFee; ?></td>
</tr>
<?php }
}else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; } 
?>
<tr style='background:hsl(35, 100%, 80%);' align="center">
    <td colspan="6" style="border:1px solid hsl(25, 100%, 50%);font-size:1.5rem;font-weight:bolder;">Total Fees</td>
    <td colspan="5" style="border:1px solid hsl(25, 100%, 50%);font-size:1.5rem;font-weight:bolder;"><?php echo $monthfes; ?></td>
</tr>
    </tbody>
</table>
    </div>
</div>