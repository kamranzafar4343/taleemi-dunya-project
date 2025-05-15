<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='dashboard'"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> results</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<style>
.table, table, .table-responsive, .table tr, .table tr th, .table tr td{
    border:none;
    border-bottom:none;
    box-shadow:none;
}
</style>
<br>
<?php
if(isset($_GET['rolids'])){
    $ids = $_GET['rolids'];
    $trms = $_GET['trms'];
    $clase = $_GET['clase'];
    $sectin = $_GET['sectin'];
    $seisn = $_GET['seisn'];
$sl_rslts = mysqli_query($con,"select * from results where roll_no='$ids' && instituteId='$userId' order by id desc limit 1");
$shw = mysqli_fetch_assoc($sl_rslts);
$student_names = $shw['student_name'];
$father_names = $shw['father_name'];
$student_imgses = $shw['student_img'];
$clase = $shw['class'];
$sectin = $shw['section'];
$seisn = $shw['session'];
$ids = $shw['roll_no'];
$trms = $shw['terms'];
    
$sl_clsips = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$clase'");
$relts = mysqli_fetch_assoc($sl_clsips);
$class_nameses = $relts['class_name'];    
    
$sl_rsl = mysqli_query($con,"select * from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId'");
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

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_names = $rel['class_name'];

$sl_trms = mysqli_query($con,"select * from addTerms where instituteId='$userId' && termid='$trms'");
$tm = mysqli_fetch_assoc($sl_trms);
$term = $tm['term'];
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
<div class="row">
    <div class="col-12 datas">
<table class="w-100">
<?php if($userId == 662293){ ?>
    <tr align="center" style='background:hsl(35, 100%, 80%);'>
        <th width="100"><img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid"></th>
<th>
   <h3 class="text-uppercase fs-2 fw-bold"><?php echo $instituteName; ?></h3>
   <div><span class="text-capitalize fs-6" style="border-bottom:1px solid black;"><?php echo $campus; ?></span></div>
</th>
        <th width="50"><img src="student_imgs/<?php if(!empty($student_imgses)){ echo $student_imgses; }else{ echo "users.jpg"; } ?>" class="img-fluid"></th>    
    </tr>
<?php }else{ ?>
<tr align="center" style='background:hsl(35, 100%, 80%);'>
        <th width="50"><img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid"></th>
<th>
   <h3 class="text-uppercase fs-3 fw-bold"><?php echo $instituteName; ?></h3>
   <div><span class="text-capitalize fs-6" style="border-bottom:1px solid black;"><?php echo $campus; ?></span></div>
</th>
        <th width="50"><img src="student_imgs/<?php if(!empty($student_imgses)){ echo $student_imgses; }else{ echo "users.jpg"; } ?>" class="img-fluid"></th>    
    </tr>
<?php } ?>
    <tr align="center" style='background:hsl(35, 100%, 80%);'>
        <th class="text-capitalize fs-4 fw-bold" colspan="3"><?php echo $term." result card ".$session;?></th>
    </tr>
</table> 
<table class="w-100">
    <tr style='background:hsl(35, 100%, 80%);'>
        <th style="border:1px solid black;" class="p-1 text-uppercase fw-bold">student name:</th>
        <td style="border:1px solid black;" class="p-1 text-uppercase"><?php echo $student_names; ?></td>
        <th style="border:1px solid black;" class="p-1 text-uppercase fw-bold">father name:</th>
        <td style="border:1px solid black;" class="p-1 text-uppercase"><?php echo $father_names; ?></td>
    </tr>
    <tr style='background:hsl(35, 100%, 80%);'>
        <th style="border:1px solid black;" class="p-1 text-uppercase fw-bold">Class:</th>
        <td style="border:1px solid black;" class="p-1 text-uppercase"><?php echo $class_nameses;  ?></td>
        <th style="border:1px solid black;" class="p-1 text-uppercase fw-bold">Section:</th>
        <td style="border:1px solid black;" class="p-1 text-uppercase"><?php echo $sectin; ?></td>
    </tr>
    <tr style='background:hsl(35, 100%, 80%);'>
        <th style="border:1px solid black;" class="p-1 text-uppercase fw-bold">Session:</th>
        <td style="border:1px solid black;" class="p-1 text-uppercase"><?php echo $seisn; ?></td>
        <th style="border:1px solid black;" class="p-1 text-uppercase fw-bold">Type:</th>
        <td style="border:1px solid black;" class="p-1 text-uppercase"><?php echo $term; ?></td>
    </tr>
</table>
<br>
<table class="table table-responsive table-striped table-bordered w-100">
    <tr style='background:hsl(35, 100%, 80%);' align="center">
        <th rowspan="2">Subjects</th>
        <th colspan="12" >Detail of Marks obtained by the candidate</th>
    </tr>
    <tr style='background:hsl(35, 100%, 80%);' align="center">
        <th>Total Marks</th>
        <th>Obtained Marks</th>
        <th>%age</th>
        <th colspan="12">Grade / Remarks</th>
    </tr>
<?php
$sl_rslts = mysqli_query($con,"select * from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
while($rstls = mysqli_fetch_assoc($sl_rslts)){
$marks = $rstls['marks'];
$total_marks = $rstls['total_marks'];
$subjecta = $rstls['subject'];
$prct = round($marks/$total_marks*100);
if($prct >= 90){ $remrks = "Outstanding"; }elseif($prct >= 80){ $remrks = "Excellent"; }elseif($prct >= 70){ $remrks = "Very Good"; }elseif($prct >= 60){ $remrks = "Good"; }elseif($prct >= 50){ $remrks = "Satisfactory"; }elseif($prct >= 40){ $grades = "Better"; }else{ $remrks = "Needs Improvement"; }
if($prct >= 90){ $grades = "A+"; }elseif($prct >= 80){ $grades = "A"; }elseif($prct >= 70){ $grades = "B"; }elseif($prct >= 60){ $grades = "C"; }elseif($prct >= 50){ $grades = "D"; }elseif($prct >= 40){ $grades = "E"; }else{ $grades = "F"; }
?>
<tr style='background:hsl(35, 100%, 80%);' align="center">
    <th class="p-1 text-capitalize" style="text-align:left;"><?php echo $subjecta; ?></th>
    <td class="p-1"><?php echo $total_marks; ?></td>
    <td class="p-1 toobtmrks"><?php echo $marks; ?></td>
    <td class="p-1 toobtmrks"><?php echo round($marks/$total_marks*100)."%"; ?></td>
    <th class="p-1" colspan="9" style="text-align:left;"><?php echo "(".$grades.")  ".$remrks; ?></th>
</tr>
<?php } ?>

    <tr style='background:hsl(35, 100%, 80%);'>
<th>Total Marks</th>
<?php
$sl_rslts_sums = mysqli_query($con,"select SUM(total_marks) as totls from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
while($tls = mysqli_fetch_assoc($sl_rslts_sums)){
$totls = $tls['totls'];
?>
<td><?php echo $totls; ?></td>
<?php } ?>
        <th>Obt.Marks</th>
<?php
$sl_rslts_sum = mysqli_query($con,"select SUM(marks) as obtn from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
while($rotates = mysqli_fetch_assoc($sl_rslts_sum)){
$obtnmarks = $rotates['obtn'];
?>
<td><?php echo $obtnmarks; ?></td>
<?php
}
?>
        <th>%age</th>
<?php
$prctge = mysqli_query($con,"select SUM(marks) as perc from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
while($pctg = mysqli_fetch_assoc($prctge)){
$pectage = $pctg['perc'];
?>
        <td><?php echo round($pectage/$totls*100)."%"; ?></td>
<?php } ?>
        <th>Grade</th>
<?php
$prctge = mysqli_query($con,"select SUM(marks) as perc from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
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
$prctge = mysqli_query($con,"select SUM(marks) as perc from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
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
    <th colspan="15" class="fs-5 text-uppercase">Result Status: <span class="fw-normal">
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
<table class="w-100">
    <tr align="center" style='background:hsl(35, 100%, 80%);'>
    <th colspan="2" style="border:1px solid black;" class="p-0 text-capitalize">Grading Formula</th>
    <th colspan="2" class="text-capitalize p-0"></th>
    <th colspan="6" style="border:1px solid black;" class="p-0 text-capitalize">Attendance</th>
</tr>
<?php
$sl_dys = mysqli_query($con,"select * from attandance where instituteId='$userId' && roll_no='$ids'");
$cnts = mysqli_num_rows($sl_dys);
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td class="p-0 px-3" style="font-size:0.8rem;border-left:1px solid black;">A+ = Outstanding (90-100)</td>
    <td class="p-0 px-3" style="font-size:0.8rem;border-right:1px solid black;">A = Excellent(80-90)</td>
    <td class="p-0" style="font-size:0.8rem;" colspan="2"></td>
    <td class="p-0 px-3" style="font-size:0.8rem;border-right:1px solid black;border-left:1px solid black;" colspan="6">Total Number of Working Days: <?php echo $cnts; ?></td>
</tr>
<?php
$sl_dyes = mysqli_query($con,"select * from attandance where instituteId='$userId' && status='P' && roll_no='$ids'");
$cntgs = mysqli_num_rows($sl_dyes);
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td class="p-0 px-3" style="font-size:0.8rem;border-left:1px solid black;">B = V.Good(70-80)</td>
    <td class="p-0 px-3" style="font-size:0.8rem;border-right:1px solid black;">C = Good(60-70)</td>
    <td class="p-0" style="font-size:0.8rem;" colspan="2"></td>
    <td class="p-0 px-3" style="font-size:0.8rem;border-right:1px solid black;border-left:1px solid black;" colspan="6">Total Presents: <?php echo $cntgs; ?></td>
</tr>
<?php
$sl_dyesed = mysqli_query($con,"select * from attandance where instituteId='$userId' && status='A' && roll_no='$ids'");
$ctgs = mysqli_num_rows($sl_dyesed);
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td class="p-0 px-3" style="font-size:0.8rem;border-left:1px solid black;border-bottom:1px solid black;">D = Better(50-40)</td>
    <td class="p-0 px-3" style="font-size:0.8rem;border-right:1px solid black;border-bottom:1px solid black;">E = Needs Improvement(40 and below)</td>
    <td class="p-0" style="font-size:0.8rem;" colspan="2"></td>
    <td class="p-0 px-3" style="font-size:0.8rem;border-bottom:1px solid black;border-right:1px solid black;border-left:1px solid black;" colspan="6">Total Absents: <?php echo $ctgs; ?></td>
</tr>
<tr>
    <td colspan="9">
<div id="myChart" style="width:100%;height:300px;"></div>

    </td>
</tr>
</table>
<hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;">
<hr style="border:none;"><hr style="border:none;"><hr style="border:none;"><hr style="border:none;">

<table class="w-100 fixed-bottom">
    <tr style='background:hsl(35, 100%, 80%);'>
        <th colspan="15">
            Address: <span class="fw-normal"><?php if(!empty($mainaddress)){ echo $mainaddress; }else{ echo "Please Enter Your Address from Profile!"; } ?></span>
        </th>
    </tr>
    <tr style='background:hsl(35, 100%, 80%);'>
        <th colspan="15">
            Cell: <span class="fw-normal"><?php if(!empty($cell)){ echo $cell; }else{ echo "Please Enter Your Cell from Profile!"; } ?></span>
        </th>
    </tr>
</table>
    </div>
<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Examination', 'Mhl'],
<?php
$sl_rslts = mysqli_query($con,"select * from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
while($rstls = mysqli_fetch_assoc($sl_rslts)){
$marks = $rstls['marks'];
$total_marks = $rstls['total_marks'];
$subjecta = $rstls['subject'];
$prct = round($marks/$total_marks*100);
if($prct >= 90){ $remrks = "Outstanding"; }elseif($prct >= 80){ $remrks = "Excellent"; }elseif($prct >= 70){ $remrks = "Very Good"; }elseif($prct >= 60){ $remrks = "Good"; }elseif($prct >= 50){ $remrks = "Satisfactory"; }elseif($prct >= 40){ $grades = "Better"; }else{ $remrks = "Needs Improvement"; }
if($prct >= 90){ $grades = "A+"; }elseif($prct >= 80){ $grades = "A"; }elseif($prct >= 70){ $grades = "B"; }elseif($prct >= 60){ $grades = "C"; }elseif($prct >= 50){ $grades = "D"; }elseif($prct >= 40){ $grades = "E"; }else{ $grades = "F"; }
?>
  ['<?php echo $subjecta; ?>',<?php echo $prct; ?>],
<?php } ?>
]);

// Set Options
const options = {
  title:'<?php echo $term; ?>'
};

// Draw
const chart = new google.visualization.BarChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>
<div class="col-12" align='right'>
  <button class='btn btn-apna' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
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