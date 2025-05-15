<?php
require_once("../functions/db.php");

$aply_cls = $_POST['aply_cls'];
$sectn = $_POST['sectn'];
$aply_sesin = $_POST['aply_sesin'];
$inst_ids = $_POST['inst_ids'];
$subjt = $_POST['subjt'];
$term = $_POST['term'];

$usr = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_ids'");
$row = mysqli_fetch_assoc($usr);
$mainid = $row['id'];
$userId = $row['institute_id'];
$instituteName = $row['institute_name'];
$campus = $row['campus'];
$image = $row['logo'];
$at=1;

$sl_clsdetal = mysqli_query($con,"select * from addStudents where class='$aply_cls' && section='$sectn' && session='$aply_sesin' && instituteId='$inst_ids'");
$qry = mysqli_fetch_assoc($sl_clsdetal);
$class = $qry['class'];
$section = $qry['section'];
$session = $qry['session'];

$sl_clsp = mysqli_query($con,"select * from addClass where institute_id='$inst_ids' && id='$class'");
$rels = mysqli_fetch_assoc($sl_clsp);
$class_name = $rels['class_name'];

$seltrms = mysqli_query($con,"select * from addTerms where instituteId='$inst_ids' && termid='$term'");
$toms = mysqli_fetch_assoc($seltrms);
$term_name = $toms['term'];

$sl_clas = mysqli_query($con,"select * from addStudents where class='$aply_cls' && section='$sectn' && session='$aply_sesin' && instituteId='$inst_ids'");
if(mysqli_num_rows($sl_clas)>0){
?>
<div class="row">
        <div class="col datas">
<table class="w-100" style="background:hsl(35, 100%, 80%);">
    <tr align="center">
        <th width="50"><img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid"></th>
        <th colspan="6">
<h4 class="fs-4 fw-bold text-uppercase"><?php echo $instituteName; ?></h4>
<div class="text-center text-capitalize fw-bold"><span class="fw-normal" style="border-bottom:1px solid black;"><?php echo $campus; ?></span></div>
        </th>
    </tr>
    <tr align="center">
        <th colspan="7" class="text-uppercase fw-bold" style="border:1px solid hsl(0,0%,0%);">Attendance sheet</th>
    </tr>
    <tr>
        <th colspan="1">Class:</th>
        <td colspan="1"><?php echo $class_name." "."(".$section.")"; ?></td>
        <th colspan="1">Exame Type:</th>
        <td colspan="1"><?php echo $term_name; ?></td>
        <th colspan="2">Session</th>
        <td colspan="1"><?php echo $session; ?></td>
    </tr>
    <tr>
        <th colspan="1">T.Date:</th>
        <td colspan="1">____________________</td>
        <th colspan="1">Total Marks:</th>
        <td colspan="1">____________________</td>
        <th colspan="2">Subject</th>
        <td colspan="1"><?php echo $subjt; ?></td>
    </tr>
    <tr align="center" class="bg-apna">
        <th style="border:1px solid hsl(0,0%,0%);">Sr.No</th>
        <th style="border:1px solid hsl(0,0%,0%);">Roll#</th>
        <th style="border:1px solid hsl(0,0%,0%);">Student Name</th>
        <th style="border:1px solid hsl(0,0%,0%);">Father Name</th>
        <th style="border:1px solid hsl(0,0%,0%);">Attendance</th>
        <th style="border:1px solid hsl(0,0%,0%);">ST.Sig.</th>
        <th style="border:1px solid hsl(0,0%,0%);">Obtain Marks</th>
    </tr>
<?php
   while($at <= 100000 && $resulting = mysqli_fetch_array($sl_clas)){
$instituteId = $resulting['instituteId'];
$studentName = $resulting['studentName'];
$frmimage = $resulting['image'];
$fatherName = $resulting['fatherName'];
$class = $resulting['class'];
$section = $resulting['section'];
$session = $resulting['session'];
$roll_num = $resulting['roll_num'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<tr align="center">
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $at++; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $roll_num; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);" class="text-capitalize"><?php echo $studentName; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);" class="text-capitalize"><?php echo $fatherName; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"></td>
    <td style="border:1px solid hsl(0,0%,0%);"></td>
    <td style="border:1px solid hsl(0,0%,0%);"></td>
</tr>
<?php } ?>
<tr>
    <th colspan="2">Total Test:</th>
    <td colspan="1">____________________</td>
    <th colspan="2">Test Signature:</th>
    <td colspan="2">____________________</td>
</tr>
<tr>
    <th colspan="2">Receiving Date:</th>
    <td colspan="1">____________________</td>
    <th colspan="2">Admin Signature:</th>
    <td colspan="2">____________________</td>
</tr>
</table>
        </div>
    </div>
<?php
}else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; }
?>