<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("profile.php"); require_once("lib/attendance.php");
require_once("lib/fee.php"); require_once("lib/examination.php"); require_once("lib/time-table.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='exame-report'">  Exame Report</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> View Result</li>
  </ol>
</nav>
<?php
if(isset($_GET['id'])){
    $trms = $_GET['id'];
    
$sl_rsl = mysqli_query($con,"select * from results where class='$class' && section='$section' && session='$session' && roll_no='$roll_num' && instituteId='$instituteId'");
$result = mysqli_fetch_assoc($sl_rsl);
$student_name = $result['student_name'];
$father_name = $result['father_name'];
$student_img = $result['student_img'];
$class = $result['class'];
$sections = $result['section'];
$session = $result['session'];
$attendance = $result['attendance'];
$roll_no = $result['roll_no'];
$subject = $result['subject'];
$total_marks = $result['total_marks'];
$obtain_marks = $result['obtain_marks'];
$passing_marks = $result['passing_marks'];
$terms = $result['terms'];
$remarks = $result['remarks'];
$months = $result['months'];
$instituteId = $result['instituteId'];
$date = $result['date'];


$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_names = $rel['class_name'];

$sl_trms = mysqli_query($con,"select * from addTerms where instituteId='$instituteId' && termid='$trms'");
$tm = mysqli_fetch_assoc($sl_trms);
$term = $tm['term'];
}
?>
<div class="container-fluid">
<div class="row">
    <div class="col-12">
<table class="w-100">
<tr align="center" style='background:hsl(35, 100%, 80%);'>
        <th width="100"><img src="../portal-admins/institute-logos/<?php echo $logo; ?>" class="img-fluid"></th>
<th>
   <h3 class="text-uppercase fs-1 fw-bold"><?php echo $institute_name; ?></h3>
   <div><span class="text-capitalize fs-6" style="border-bottom:1px solid black;"><?php echo $campus; ?></span></div>
</th>
        <th width="100"><img src="../student_imgs/<?php if(empty($student_img)){ echo "users.jpg"; }elseif($student_img == "None"){ echo "users.jpg"; }elseif($student_img == "none"){ echo "users.jpg"; }else{ echo $student_img; } ?>" class="img-fluid"></th>    
</tr>
    <tr align="center" style='background:hsl(35, 100%, 80%);'>
        <th class="text-capitalize fs-5 fw-bold" colspan="3"><?php echo $term." result card ".$session;?></th>
    </tr>
</table> 
<table class="w-100">
    <tr style='background:hsl(35, 100%, 80%);'>
        <th style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase fw-bold">student name:</th>
        <td style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase"><?php echo $student_name; ?></td>
        <th style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase fw-bold">father name:</th>
        <td style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase"><?php echo $father_name; ?></td>
    </tr>
    <tr style='background:hsl(35, 100%, 80%);'>
        <th style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase fw-bold">Class:</th>
        <td style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase"><?php echo $class_names;  ?></td>
        <th style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase fw-bold">Section:</th>
        <td style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase"><?php echo $sections; ?></td>
    </tr>
    <tr style='background:hsl(35, 100%, 80%);'>
        <th style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase fw-bold">Roll#:</th>
        <td style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase"><?php echo $roll_no; ?></td>
        <th style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase fw-bold">Type:</th>
        <td style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase"><?php echo $term; ?></td>
    </tr>
</table>
<table class="table table-responsive table-striped w-100 mt-3">
    <tr style='background:hsl(35, 100%, 80%);' align="center">
        <th rowspan="2" style="font-size:1.2rem;">Subjects</th>
        <th colspan="12" style="font-size:1.2rem;" class="text-capitalize">Detail of Marks obtained by the candidate</th>
    </tr>
    <tr style='background:hsl(35, 100%, 80%);' align="center">
        <th style="font-size:1.2rem;">Total Marks</th>
        <th style="font-size:1.2rem;">Obt.Marks</th>
        <th style="font-size:1.2rem;">%age</th>
        <th style="font-size:1.2rem;" colspan="12">Grade / Remarks</th>
    </tr>
<?php
$sl_rslts = mysqli_query($con,"select * from results where class='$class' && section='$section' && session='$session' && roll_no='$roll_num' && instituteId='$instituteId' && terms='$trms'");
while($rstls = mysqli_fetch_assoc($sl_rslts)){
$marks = $rstls['marks'];
$total_marks = $rstls['total_marks'];
$subjecta = $rstls['subject'];
$prct = round($marks/$total_marks*100);
if($prct >= 90){ $remrks = "Outstanding"; }elseif($prct >= 80){ $remrks = "Excellent"; }elseif($prct >= 70){ $remrks = "Very Good"; }elseif($prct >= 60){ $remrks = "Good"; }elseif($prct >= 50){ $remrks = "Satisfactory"; }elseif($prct >= 40){ $grades = "Better"; }else{ $remrks = "Needs Improvement"; }
if($prct >= 90){ $grades = "A+"; }elseif($prct >= 80){ $grades = "A"; }elseif($prct >= 70){ $grades = "B"; }elseif($prct >= 60){ $grades = "C"; }elseif($prct >= 50){ $grades = "D"; }elseif($prct >= 40){ $grades = "E"; }else{ $grades = "F"; }
?>
<tr style='background:hsl(35, 100%, 80%);' align="center">
    <th style="text-align:left;" class="p-3 text-capitalize"><?php echo $subjecta; ?></th>
    <td class="p-3"><?php echo $total_marks; ?></td>
    <td class="p-3 toobtmrks"><?php echo $marks; ?></td>
    <td class="p-3 toobtmrks"><?php echo round($marks/$total_marks*100)."%"; ?></td>
    <th style="text-align:left;" class="p-3" colspan="9"><?php echo "(".$grades.")  ".$remrks; ?></th>
</tr>
<?php } ?>
    <tr style='background:hsl(35, 100%, 80%);' align="center">
<th>Total Marks</th>
<?php
$sl_rslts_sums = mysqli_query($con,"select SUM(total_marks) as totls from results where class='$class' && section='$section' && session='$session' && roll_no='$roll_num' && instituteId='$instituteId' && terms='$trms'");
while($tls = mysqli_fetch_assoc($sl_rslts_sums)){
$totls = $tls['totls'];
?>
<td><?php echo $totls; ?></td>
<?php } ?>
        <th>Obt.Marks</th>
<?php
$sl_rslts_sum = mysqli_query($con,"select SUM(marks) as obtn from results where class='$class' && section='$section' && session='$session' && roll_no='$roll_num' && instituteId='$instituteId' && terms='$trms'");
while($rotates = mysqli_fetch_assoc($sl_rslts_sum)){
$obtnmarks = $rotates['obtn'];
?>
<td><?php echo $obtnmarks; ?></td>
<?php
}
?>
        <th>%age</th>
<?php
$prctge = mysqli_query($con,"select SUM(marks) as perc from results where class='$class' && section='$section' && session='$session' && roll_no='$roll_num' && instituteId='$instituteId' && terms='$trms'");
while($pctg = mysqli_fetch_assoc($prctge)){
$pectage = $pctg['perc'];
?>
        <td><?php echo round($pectage/$totls*100)."%"; ?></td>
<?php } ?>
        <th>Grade</th>
<?php
$prctge = mysqli_query($con,"select SUM(marks) as perc from results where class='$class' && section='$section' && session='$session' && roll_no='$roll_num' && instituteId='$instituteId' && terms='$trms'");
while($pctg = mysqli_fetch_assoc($prctge)){
$pectage = $pctg['perc'];
$grde = round($pectage/$totls*100);
?>
<td>
<?php 
if($grde > 90){ echo "A+"; }elseif($grde > 80){ echo "A"; }elseif($grde > 70){ echo "B"; }elseif($grde > 60){ echo "C"; }elseif($grde > 50){ echo "D"; }elseif($grde > 40){ echo "E"; }else{ echo "F"; } 
?>
</td>
<?php } ?>
        <th>Remarks</th>
<?php
$prctge = mysqli_query($con,"select SUM(marks) as perc from results where class='$class' && section='$section' && session='$session' && roll_no='$roll_num' && instituteId='$instituteId' && terms='$trms'");
while($pctg = mysqli_fetch_assoc($prctge)){
$postns = $pctg['perc'];
$grdes = round($pectage/$totls*100);

?>
<td>
<?php 
if($grdes > 90){ echo "Outstanding"; }elseif($grdes > 80){ echo "Excellent"; }elseif($grdes > 70){ echo "V.Good"; }elseif($grdes > 60){ echo "Good"; }elseif($grdes > 50){ echo "Better"; }elseif($grdes > 40){ echo "Needs Improvement"; }else{ echo "Needs Improvement"; }
?>
</td>
<?php } ?>
    </tr>
<tr style='background:hsl(35, 100%, 80%);'>
    <th colspan="15" class="text-uppercase">Result Status: <span class="fw-normal">
<?php if($grde > 39){ echo "Pass"; }else{ echo "Fail"; }?>
    </span> </th>
</tr>
<?php if($userId == 662293){ ?>

<?php }else{ ?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td colspan="10">
<div class="p-1 text-capitalize fw-bold" style="font-size:1.2rem;border:2px solid black;"> teacher's comments
<div class="p-2"><hr>
</div>
</div>
    </td>
</tr>
<?php } ?>
</table>
<table class="w-100 mt-3" align="center">
    <tr align="center" style='background:hsl(35, 100%, 80%);'>
    <th colspan="2" style="border:1px solid black;" class="p-0 text-capitalize">Grading Formula</th>
    <th colspan="2" class="text-capitalize p-0"></th>
    <th colspan="6" style="border:1px solid black;" class="p-0 text-capitalize">Attendance</th>
</tr>
<?php
$sl_dys = mysqli_query($con,"select * from attandance where roll_no='$roll_num' && instituteId='$instituteId'");
$cnts = mysqli_num_rows($sl_dys);
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td class="p-0 px-3" style="font-size:0.8rem;border-left:1px solid black;">A+ = Outstanding (90-100)</td>
    <td class="p-0 px-3" style="font-size:0.8rem;border-right:1px solid black;">A = Excellent(80-90)</td>
    <td class="p-0" style="font-size:0.8rem;" colspan="2"></td>
    <td class="p-0 px-3" style="font-size:0.8rem;border-right:1px solid black;border-left:1px solid black;" colspan="6">Total Number of Working Days: <?php echo $cnts; ?></td>
</tr>
<?php
$sl_dyes = mysqli_query($con,"select * from attandance where roll_no='$roll_num' && instituteId='$instituteId' && status='P'");
$cntgs = mysqli_num_rows($sl_dyes);
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td class="p-0 px-3" style="font-size:0.8rem;border-left:1px solid black;">B = V.Good(70-80)</td>
    <td class="p-0 px-3" style="font-size:0.8rem;border-right:1px solid black;">C = Good(60-70)</td>
    <td class="p-0" style="font-size:0.8rem;" colspan="2"></td>
    <td class="p-0 px-3" style="font-size:0.8rem;border-right:1px solid black;border-left:1px solid black;" colspan="6">Total Presents: <?php echo $cntgs; ?></td>
</tr>
<?php
$sl_dyesed = mysqli_query($con,"select * from attandance where roll_no='$roll_num' && instituteId='$instituteId' && status='A'");
$ctgs = mysqli_num_rows($sl_dyesed);
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td class="p-0 px-3" style="font-size:0.8rem;border-left:1px solid black;border-bottom:1px solid black;">D = Better(50-40)</td>
    <td class="p-0 px-3" style="font-size:0.8rem;border-right:1px solid black;border-bottom:1px solid black;">E = Needs Improvement(40 and below)</td>
    <td class="p-0" style="font-size:0.8rem;" colspan="2"></td>
    <td class="p-0 px-3" style="font-size:0.8rem;border-bottom:1px solid black;border-right:1px solid black;border-left:1px solid black;" colspan="6">Total Absents: <?php echo $ctgs; ?></td>
</tr>
</table>
<br>
<div align="center">
    <div id="myChart" style="width:100%;height:300px;"></div>
</div>
<script>
google.charts.load('current',{packages:['corechart','bar']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Subject', 'Obtain Marks'],
<?php
$sl_rslts = mysqli_query($con,"select * from results where class='$class' && section='$section' && session='$session' && roll_no='$roll_num' && instituteId='$instituteId' && terms='$trms'");
while($rstls = mysqli_fetch_assoc($sl_rslts)){
$subjt = $rstls['subject'];
$mrks = $rstls['marks'];
?>
['<?php echo $subjt; ?>',<?php echo $mrks; ?>],
<?php
    } 
?>  
  
]);

// Set Options
const options = {
  title: '<?php echo $term; ?>',
//  chartArea: {top:70, bottom:80, left:'10%', right:'20%', 'width':'1000%' },
  titleTextStyle: {
      bold: true,
      italic: true,
      fontSize: 18,
  },
  legend: { position: 'top', maxLines: 3 },
  bar: { groupWidth: '30%' },
  isStacked: true,
};

// Draw
const chart = new google.visualization.ColumnChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>
<table class="w-100 mt-2">
    <tr style='background:hsl(35, 100%, 80%);'>
        <th>Principal Signature:</th>
        <td>______________________________________</td>
        <th>Teacher Signature:</th>
        <td>______________________________________</td>
    </tr>
</table>
<hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;">
<hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;">

<table class="w-100 fixed-bottom">
    <tr style='background:hsl(35, 100%, 80%);' align="center">
        <th colspan="15">
            Address: <span class="fw-normal"><?php if(!empty($mainaddress)){ echo $mainaddress; }else{ echo "Please Enter Your Address from Profile!"; } ?></span>
        </th>
    </tr>
    <tr style='background:hsl(35, 100%, 80%);' align="center">
        <th colspan="15">
            Cell: <span class="fw-normal"><?php if(!empty($cell)){ echo $cell; }else{ echo "Please Enter Your Cell from Profile!"; } ?></span>
        </th>
    </tr>
</table>
    </div>
</div>
</div>

<?php require_once("source/foot-section.php"); ?>