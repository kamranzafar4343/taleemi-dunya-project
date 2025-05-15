<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#exame-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">award list</li>
  </ol>
</nav>
<?php
if(isset($_GET['cles'])){
    $cles = $_GET['cles'];
    $sectn = $_GET['sectn'];
    $sesin = $_GET['sesin'];
    $trm = $_GET['trm'];
    $insti = $_GET['insti'];
    
    $sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$cles'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$sl_trms = mysqli_query($con,"select * from addTerms where instituteId='$userId' && termid='$trm'");
$tm = mysqli_fetch_assoc($sl_trms);
$term = $tm['term'];

}

$sel_instit = mysqli_query($con,"select * from confirmSchools where institute_id='$insti'");
$schol = mysqli_fetch_assoc($sel_instit);
$institute_name = $schol['institute_name'];
$campus = $schol['campus'];
if(!empty($schol['logo'])){ $logo = $schol['logo']; }else{ $logo = "users.jpg"; }
?>
<div class="container-fluid">
    <div class="row datas">
        <div class="col">
<table class="table table-responsive w-100">
    <tr class="bg-apna">
<th width="60" colspan="2" style="border:1px solid hsl(25, 100%, 50%);">
    <img src="portal-admins/institute-logos/<?php echo $logo; ?>" style="width:100%;">
</th>
<th colspan="30" style="border:1px solid hsl(25, 100%, 50%);">
    <h4 class="fs-4 fw-bold text-uppercase text-center"><?php echo $institute_name." <span class='fs-6 fw-normal'>(".$campus.")</span>"; ?></h4>
    <h5 class="fs-5 fw-bold text-capitalize text-center">overall award list</h5>
</th>
    </tr>
    <tr style='background:hsl(35, 100%, 55%);'>
        <th colspan="8">
            Class/Section: <span class="text-uppercase fw-normal px-3" style="border-bottom:1px solid black;"><?php echo $class_name."/".$sectn; ?></span>
        </th>
        <th colspan="8">
            Examination: <span class="text-capitalize fw-normal px-3" style="border-bottom:1px solid black;"><?php echo $term." ".$sesin;?></span>
        </th>
        <th colspan="4">
            Session: <span class="text-capitalize fw-normal px-3" style="border-bottom:1px solid black;"><?php echo $sesin;?></span>
        </th>
    </tr>
<tr style='background:hsl(35, 100%, 60%);'>
        <th class="p-1" style="font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);">Sr#</th>
        <th class="p-1" style="font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);">Roll#</th>
        <th class="p-1" style="font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);">Student Name</th>
<?php
$snjet = mysqli_query($con,"select subject from results where class='$cles' && section='$sectn' && session='$sesin' && instituteId='$userId' && terms='$trm' group by subject");
while($subj = mysqli_fetch_array($snjet)){
$subject = $subj['subject'];
echo "<th style='font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);' class='p-1 text-capitalize'>$subject</th>";
}
?>
    <th class="p-1" style="font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);">Total Marks</th>
    <th class="p-1" style="font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);">Obt. Marks</th>
    <th class="p-1" style="font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);">%age</th>
    <th class="p-1" style="font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);">Grade</th>
    <th class="p-1" style="font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);">Remarks</th>
</tr>
<tr style='background:hsl(35, 100%, 70%);'>
        <th colspan="3" class="p-1" style="font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);"></th>
<?php
$sl_rslts = mysqli_query($con,"select total_marks from results where class='$cles' && section='$sectn' && session='$sesin' && instituteId='$userId' && terms='$trm' group by subject");
while($rstls = mysqli_fetch_array($sl_rslts)){
$total_marks = $rstls['total_marks'];
echo "<th class='text-capitalize p-0' style='font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);'>$total_marks</th>";
}
?>
<?php
$sl_rslts_totl = mysqli_query($con,"select total_marks from results where class='$cles' && section='$sectn' && session='$sesin' && instituteId='$userId' && terms='$trm' group by subject");
while($rot = mysqli_fetch_assoc($sl_rslts_totl)){
$total_markss += $rot['total_marks'];
}
?>
    <th class="p-1" style="font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);"><?php echo $total_markss; ?></th>
    <th colspan="5" class="p-1" style="font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);"></th>
</tr>
<?php
$a=1;
$sl_stud = mysqli_query($con,"select * from results where class='$cles' && section='$sectn' && session='$sesin' && instituteId='$userId' && terms='$trm' && subject='$subject'");
$tolsstu = mysqli_num_rows($sl_stud);
while($a <= 100000 && $stud = mysqli_fetch_array($sl_stud)){
    $student_name = $stud['student_name'];
    $father_name = $stud['father_name'];
    $class = $stud['class'];
    $section = $stud['section'];
    $attendance = $stud['attendance'];
    $roll_no = $stud['roll_no'];
    $subject = $stud['subject'];
    $total_marks = $stud['total_marks'];
    $marks = $stud['marks'];
    if($attendance == "P"){ $mrks=$marks; }elseif(empty($mrk['marks'])){ $mrks=$attendance; }else{ $mrks=$attendance; }

$obtned = mysqli_query($con,"select SUM(marks) as obtnd from results where roll_no='$roll_no' && class='$cles' && section='$sectn' && session='$sesin' && instituteId='$userId' && terms='$trm'");
$o_mrk = mysqli_fetch_assoc($obtned);
$obtd_maks = $o_mrk['obtnd'];

$pcrtge = round($obtd_maks/$total_markss*100);

if($pcrtge > 90){ $grde = "A+"; }elseif($pcrtge > 80){  $grde = "A+"; }elseif($pcrtge > 70){  $grde = "B"; }elseif($pcrtge > 60){  $grde = "C"; }elseif($pcrtge > 50){ $grde = "D"; }elseif($pcrtge > 40){ $grde = "E"; }else{ $grde = "F"; }

if($pcrtge > 90){ $postn = "1st"; }elseif($pcrtge > 80){  $postn = "2nd"; }elseif($pcrtge > 70){  $postn = "3rd"; }elseif($pcrtge > 60){  $postn = "4th"; }elseif($pcrtge > 50){ $postn = "5th"; }elseif($pcrtge > 40){ $postn = "6th"; }else{ $postn = "7th"; }

if($pcrtge > 90){ $remrks = "Outstanding"; }elseif($pcrtge > 80){  $remrks = "Excellent"; }elseif($pcrtge > 70){  $remrks = "V.Good"; }elseif($pcrtge > 60){  $remrks = "Good"; }elseif($pcrtge > 50){ $remrks = "Better"; }elseif($pcrtge > 40){ $remrks = "Needs Your Improvement"; }else{ $remrks = "Needs Your Improvement"; }

?>
<tr style='background:hsl(35, 100%, 80%);'>
    <th class="p-1" style="font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);"><?php echo $a++; ?></th>
    <td class="p-1" style="font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);"><?php echo $roll_no; ?></td>
    <td class="p-1 text-capitalize" style="font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);"><?php echo $student_name; ?></td>
<?php
$sl_rslts = mysqli_query($con,"select marks from results where roll_no='$roll_no' && class='$cles' && section='$sectn' && session='$sesin' && instituteId='$userId' && terms='$trm' group by subject");
while($rstls = mysqli_fetch_array($sl_rslts)){
$marks = $rstls['marks'];
echo "<td class='text-capitalize p-0' style='font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);'>$marks</td>";
}
?>
    <td class='p-1' style='font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);'><?php echo $total_markss; ?></td>
    <td class='p-1' style='font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);'><?php echo $obtd_maks;?></td>
    <td class='p-1' style='font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);'><?php echo $pcrtge."%"; ?></td>
    <td class='p-1' style='font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);'><?php echo $grde; ?></td>
    <td class='p-1' style='font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);'><?php echo $remrks; ?></td>
</tr>
<?php } ?>
<tr style='background:hsl(35, 100%, 80%);'>
    <th style='font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);' colspan="4">Total Students</th>
    <th style='font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);' colspan="4">Total Pass</th>
    <th style='font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);' colspan="4">Total Fail</th>
</tr>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style='font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);' colspan="4"><?php echo $tolsstu; ?></td>
    <td style='font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);' colspan="4">0</td>
    <td style='font-size:0.9rem;border:1px solid hsl(25, 100%, 50%);' colspan="4">0</td>
</tr>
</table>
        </div>
    </div>
            <div class="row mt-2">
                <div class="col">
            <div align='right' class='p-5'>
              <button class='btn btn-primary' id="btn_print"><i class="fa fa-print"></i> Print</button>
            </div>
                </div>
            </div>
</div>
<script type="text/javascript">
$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>
<?php require_once("source/foot-section.php"); ?>