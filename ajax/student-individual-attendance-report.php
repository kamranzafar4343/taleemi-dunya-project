<?php
require_once("../functions/db.php");

$aply_sesion = $_POST['aply_sesion'];
$aply_instute = $_POST['aply_instute'];
$aply_mnths = $_POST['aply_mnths'];
$aply_rollno = $_POST['aply_rollno'];

$instids = mysqli_query($con,"select * from confirmSchools where institute_id='$aply_instute'");
$rslts = mysqli_fetch_assoc($instids);
$institute_name = $rslts['institute_name'];
$campus = $rslts['campus'];
$logo = $rslts['logo'];

$selct_stdnt = mysqli_query($con,"select * from addStudents where instituteId='$aply_instute' && roll_num='$aply_rollno' && session='$aply_sesion'");
if(mysqli_num_rows($selct_stdnt)>0){
    $results = mysqli_fetch_assoc($selct_stdnt);
$roll_num = $results['roll_num'];
$class = $results['class'];
$section = $results['section'];
$session = $results['session'];
$frmimage = $results['image'];
$studentName = $results['studentName'];
$fatherName = $results['fatherName'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$aply_instute' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<div class="row">
    <div class="col-12 mb-3">
<table class="w-100" style="background-color:hsl(35,100%,80%);">
    <tr>
        <th width="50">
<img class="img-fluid" src="portal-admins/institute-logos/<?php echo $logo; ?>">
        </th>
        <th colspan="4">
<h4 class="text-uppercase text-center fs-4 fw-bolder"><?php echo $institute_name; ?></h4>
<h6 class="text-uppercase text-center fs-6 fw-bold"><?php echo $campus; ?></h6>
        </th>
        <th width="50">
<img class="img-fluid" src="student_imgs/<?php if(empty($frmimage) || $frmimage == "None" || $frmimage == "NONE" || $frmimage == "none"){ echo "users.jpg"; }else{ echo $frmimage; } ?>">
        </th>
    </tr>
    <tr>
        <th colspan="6"><h6 class="text-capitalize text-center fs-6">student individual monthly report</h6></th>
    </tr>
    <tr>
<th style="border:1px solid black;">St.Name</th>
<td style="border:1px solid black;" class="text-capitalize"><?php echo $studentName; ?></td>
<th style="border:1px solid black;">Father Name</th>
<td style="border:1px solid black;" class="text-capitalize"><?php echo $fatherName; ?></td>
<th style="border:1px solid black;">Roll#</th>
<td style="border:1px solid black;"><?php echo $roll_num; ?></td>
    </tr>
    <tr>
<th style="border:1px solid black;">Class</th>
<td style="border:1px solid black;" class="text-capitalize"><?php echo $class_name; ?></td>
<th style="border:1px solid black;">Section</th>
<td style="border:1px solid black;" class="text-capitalize"><?php echo $section; ?></td>
<th style="border:1px solid black;">Session</th>
<td style="border:1px solid black;"><?php echo $session; ?></td>
    </tr>
    <tr align="center" class="bg-apna">
<th style="border:1px dashed black;">#</th>
<th style="border:1px dashed black;">Date</th>
<th style="border:1px dashed black;">Status</th>
<th style="border:1px dashed black;">Time</th>
<th style="border:1px dashed black;">Month</th>
<th style="border:1px dashed black;">Session</th>
    </tr>
<?php
$rst=1;
$sel_atd = mysqli_query($con,"select * from attandance where instituteId='$aply_instute' && month='$aply_mnths' && session='$aply_sesion' && roll_no='$aply_rollno'");
while($rst <= 10000 && $atdnc = mysqli_fetch_array($sel_atd)){
    $date = $atdnc['date'];
    $status = $atdnc['status'];
    $att_time = $atdnc['att_time'];
    $month = $atdnc['month'];
    $monthName = date("F", mktime(0, 0, 0, $month, 10));
    $session = $atdnc['session'];
?>
<tr>
    <td style="border:1px dashed black;"><?php echo $rst++; ?></td>
    <td style="border:1px dashed black;"><?php echo $date; ?></td>
    <td style="border:1px dashed black;"><?php echo $status; ?></td>
    <td style="border:1px dashed black;"><?php echo $att_time; ?></td>
    <td style="border:1px dashed black;"><?php echo $monthName; ?></td>
    <td style="border:1px dashed black;"><?php echo $session; ?></td>
</tr>
<?php } ?>
</table>
    </div>
</div>
<?php }else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; } ?>