<?php
require_once("../functions/db.php");

$aply_cles = $_POST['aply_cles'];
$aply_sectin = $_POST['aply_sectin'];
$aply_inst = $_POST['aply_inst'];
$aply_sesin = $_POST['aply_sesin'];
$aply_months = $_POST['aply_months'];

$selct_schol = mysqli_query($con,"select * from confirmSchools where institute_id='$aply_inst'");
$schl = mysqli_fetch_assoc($selct_schol);
$institute_name = $schl['institute_name'];
$campus = $schl['campus'];
$logos = $schl['logo'];

$tr=1;
$sel_atendnc = mysqli_query($con,"select * from attandance where instituteId='$aply_inst' && class='$aply_cles' && section='$aply_sectin' && session='$aply_sesin' && month='$aply_months' group by roll_no");
if(mysqli_num_rows($sel_atendnc)>0){
?>
<div class="row">
    <div class="col-12 mb-3">
<table class="w-100" style='background:hsl(35, 100%, 80%);'>
    <tr>
            <th width="50">
<img class="img-fluid" src="portal-admins/institute-logos/<?php echo $logos; ?>">
            </th>
            <th colspan="10">
<h3 class="fs-3 fw-bolder text-uppercase text-center"><?php echo $institute_name; ?></h3>
<div class="text-center"><?php echo $campus; ?></div>
            </th>
        </tr>
        <tr align="center">
            <th colspan="12" style="text-decoration:underline;">Monthly Attendance Report</th>
        </tr>
    <tr class="bg-apna">
        <th>#</th>
        <th width="50">Image</th>
        <th>Roll#</th>
        <th>Student Name</th>
        <th>Class</th>
        <th>Section</th>
        <th>Presents</th>
        <th>Absents</th>
        <th>Leaves</th>
        <th>Holidays</th>
    </tr>
<?php
while($tr <= 100000 && $clps = mysqli_fetch_array($sel_atendnc)){
    
    $student_img = $clps['student_img'];
    $roll_no = $clps['roll_no'];
    $stu_name = $clps['stu_name'];
    $class = $clps['class'];
    $section = $clps['section'];
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$aply_inst' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
    
$att_p = mysqli_query($con,"select * from attandance where instituteId='$aply_inst' && class='$aply_cles' && section='$aply_sectin' && session='$aply_sesin' && month='$aply_months' && status='P' && roll_no='$roll_no'");
$count_p = mysqli_num_rows($att_p);

$att_a = mysqli_query($con,"select * from attandance where instituteId='$aply_inst' && class='$aply_cles' && section='$aply_sectin' && session='$aply_sesin' && month='$aply_months' && status='A' && roll_no='$roll_no'");
$count_a = mysqli_num_rows($att_a);

$att_l = mysqli_query($con,"select * from attandance where instituteId='$aply_inst' && class='$aply_cles' && section='$aply_sectin' && session='$aply_sesin' && month='$aply_months' && status='L' && roll_no='$roll_no'");
$count_l = mysqli_num_rows($att_l);

$att_h = mysqli_query($con,"select * from attandance where instituteId='$aply_inst' && class='$aply_cles' && section='$aply_sectin' && session='$aply_sesin' && month='$aply_months' && status='H' && roll_no='$roll_no'");
$count_h = mysqli_num_rows($att_h);
?>
<tr style="background-color:hsl(35,100%,80%);">
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $tr++; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);" width="50">
        <img src="student_imgs/<?php echo $student_img; ?>" class="img-fluid">
    </td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $roll_no; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);" class="text-capitalize"><?php echo $stu_name; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);" class="text-capitalize"><?php echo $class_name; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);" class="text-capitalize"><?php echo $section; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $count_p; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $count_a; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $count_l; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $count_h; ?></td>
</tr>
<?php } ?>
</table>
    </div>
</div>
<?php
}else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; }
?>