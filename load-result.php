<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#exames"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='create-result'"> create result</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> load result</li>
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
if(isset($_GET['id'])){
    $ids = $_GET['id'];
    $trms = $_GET['trms'];
    $clase = $_GET['clase'];
    $sectin = $_GET['sectin'];
    $seisn = $_GET['seisn'];
    
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
<form class="rsltsFrm">
    <div class="row">
        <div class="col">
<div class="row">
    <div class="col-12">
<table class="w-100">
    <tr align="center" style='background:hsl(35, 100%, 80%);'>
        <th width="100"><img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid"></th>
<th>
   <h3 class="text-uppercase fs-1 fw-bold"><?php echo $instituteName; ?></h3>
   <div><span class="text-capitalize fs-6" style="border-bottom:1px solid black;"><?php echo $campus; ?></span></div>
</th>
        <th width="50"><img src="student_imgs/<?php if(!empty($student_img)){ echo $student_img; }else{ echo "users.jpg"; } ?>" class="img-fluid"></th>    
    </tr>
    <tr align="center" style='background:hsl(35, 100%, 80%);'>
        <th>Session</th>
        <th>
            <input value="<?php echo $session; ?>" type="text" readonly class="form-control resltsesin">
        </th>
        <th class="text-capitalize fs-5 fw-bold">
            <input value="<?php echo $trms; ?>" type="hidden" readonly class="form-control trmtype">
            <input value="<?php echo $userId; ?>" type="hidden" readonly class="form-control scholid">
            <input value="<?php echo $student_img; ?>" type="hidden" readonly class="form-control stuimg">
            <input value="<?php echo $class; ?>" type="hidden" readonly class="form-control regclas">
        </th>
    </tr>
</table> 
<table class="w-100">
    <tr style='background:hsl(35, 100%, 80%);'>
        <th style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase fw-bold">student name:</th>
        <td style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase"><input readonly type="text" class="form-control stunme" value="<?php echo $student_name; ?>"></td>
        <th style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase fw-bold">father name:</th>
        <td style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase"><input readonly type="text" class="form-control fnames" value="<?php echo $father_name; ?>"></td>
    </tr>
    <tr style='background:hsl(35, 100%, 80%);'>
        <th style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase fw-bold">Class:</th>
        <td style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase"><input readonly type="text" class="form-control" value="<?php echo $class_names; ?>"></td>
        <th style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase fw-bold">Section:</th>
        <td style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase"><input readonly type="text" class="form-control regsectn" value="<?php echo $sections; ?>"></td>
    </tr>
    <tr style='background:hsl(35, 100%, 80%);'>
        <th style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase fw-bold">Roll#:</th>
        <td style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase"><input readonly type="text" class="form-control usrid" value="<?php echo $roll_no; ?>"></td>
        <th style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase fw-bold">Type:</th>
        <td style="border:1px solid black;font-size:0.8rem;" class="p-2 text-uppercase"><input readonly type="text" class="form-control" value="<?php echo $term; ?>"></td>
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
    <th style="text-align:left;" class="p-3 text-capitalize"><input name="reglsubj[]" class="form-control" type="text" readonly value="<?php echo $subjecta; ?>"></th>
    <td class="p-3"><input name="ovralmrks[]" class="form-control" type="text" readonly value="<?php echo $total_marks; ?>"></td>
    <td class="p-3 toobtmrks"><input name="obtmrks[]" class="form-control" type="text" readonly value="<?php echo $marks; ?>"></td>
    <td class="p-3 toobtmrks"><input name="prectg[]" class="form-control" type="text" readonly value="<?php echo round($marks/$total_marks*100)."%"; ?>"></td>
    <th style="text-align:left;" class="p-3" colspan="9"><input name="grdremrks[]" class="form-control" type="text" readyonly value="<?php echo "(".$grades.")  ".$remrks; ?>"></th>
</tr>
<?php } ?>
    <tr style='background:hsl(35, 100%, 80%);' align="center">
<th>Total Marks</th>
<?php
$sl_rslts_sums = mysqli_query($con,"select SUM(total_marks) as totls from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
while($tls = mysqli_fetch_assoc($sl_rslts_sums)){
$totls = $tls['totls'];
?>
<td><input type="text" class="form-control stutotlmrks" readonly value="<?php echo $totls; ?>"></td>
<?php } ?>
        <th>Obt.Marks</th>
<?php
$sl_rslts_sum = mysqli_query($con,"select SUM(marks) as obtn from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
while($rotates = mysqli_fetch_assoc($sl_rslts_sum)){
$obtnmarks = $rotates['obtn'];
?>
<td>
    <input type="text" class="form-control stuobtnedmrks" readonly value="<?php echo $obtnmarks; ?>">
</td>
<?php
}
?>
        <th>%age</th>
<?php
$prctge = mysqli_query($con,"select SUM(marks) as perc from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
while($pctg = mysqli_fetch_assoc($prctge)){
$pectage = $pctg['perc'];
?>
        <td>
    <input type="text" class="form-control stuperctge" readonly value="<?php echo round($pectage/$totls*100)."%"; ?>">
        </td>
<?php } ?>
        <th>Grade</th>
<?php
$prctge = mysqli_query($con,"select SUM(marks) as perc from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
while($pctg = mysqli_fetch_assoc($prctge)){
$pectage = $pctg['perc'];
$grde = round($pectage/$totls*100);
?>
<td>
    <input type="text" class="form-control stugrade" readonly value="<?php 
if($grde > 90){ echo "A+"; }elseif($grde > 80){ echo "A"; }elseif($grde > 70){ echo "B"; }elseif($grde > 60){ echo "C"; }elseif($grde > 50){ echo "D"; }elseif($grde > 40){ echo "E"; }else{ echo "F"; } 
?>">
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
    <input type="text" class="form-control sturemrks" readonly value="<?php 
if($grdes > 90){ echo "Outstanding"; }elseif($grdes > 80){ echo "Excellent"; }elseif($grdes > 70){ echo "V.Good"; }elseif($grdes > 60){ echo "Good"; }elseif($grdes > 50){ echo "Better"; }elseif($grdes > 40){ echo "Needs Improvement"; }else{ echo "Needs Improvement"; }
?>">
</td>
<?php } ?>
    </tr>
<tr style='background:hsl(35, 100%, 80%);'>
    <th colspan="15" class="text-uppercase">Result Status: <span class="fw-normal">
    <input type="text" class="form-control rsltstats" readonly value="<?php if($grde > 39){ echo "Pass"; }else{ echo "Fail"; }?>">
    </span> </th>
</tr>
<tr align="center">
    <th colspan="10">
<div class="d-grid">
    <button class="btn btn-apna text-uppercase crtreslts">create result <i class="fa-solid fa-angles-right"></i></button>
</div>
    </th>
</tr>
</table>
    </div>
</div>
        </div>
    </div>
        </form>
</div>
<?php require_once("source/foot-section.php"); ?>
<script>
$(document).ready(function(){
    $(".crtreslts").on('click',function(e){
e.preventDefault();

var trmtype = $(".trmtype").val();
var scholid = $(".scholid").val();
var resltsesin = $(".resltsesin").val();
var stuimg = $(".stuimg").val();
var stunme = $(".stunme").val();
var fnames = $(".fnames").val();
var regclas = $(".regclas").val();
var regsectn = $(".regsectn").val();
var usrid = $(".usrid").val();

var reglsubj = [];
 $('input[name="reglsubj[]"]').each(function(){
     reglsubj.push(this.value);
 });
 
var ovralmrks = [];
 $('input[name="ovralmrks[]"]').each(function(){
     ovralmrks.push(this.value);
 });

var obtmrks = [];
 $('input[name="obtmrks[]"]').each(function(){
     obtmrks.push(this.value);
 });
 
var prectg = [];
 $('input[name="prectg[]"]').each(function(){
     prectg.push(this.value);
 });
 
var grdremrks = [];
 $('input[name="grdremrks[]"]').each(function(){
     grdremrks.push(this.value);
 });
var stutotlmrks = $(".stutotlmrks").val();
var stuobtnedmrks = $(".stuobtnedmrks").val();
var stuperctge = $(".stuperctge").val();
var stugrade = $(".stugrade").val();
var sturemrks = $(".sturemrks").val();
var rsltstats = $(".rsltstats").val();

$.ajax({
    url: 'ajax/insert-result-record-by-student.php',
    type: "POST",
    data: {test_term:trmtype,insti_ids:scholid,sesion:resltsesin,snaps:stuimg,student_name:stunme,fathr_nme:fnames,aply_clas:regclas,sectin:regsectn,rolnbr:usrid,subjcts:reglsubj,totl_mrks:ovralmrks,obtnd_mrked:obtmrks,perctges:prectg,grdes:grdremrks,totl_marks:stutotlmrks,obtnd_mrks:stuobtnedmrks,ovral_perctg:stuperctge,ovral_grades:stugrade,ovral_remarks:sturemrks,ovral_status:rsltstats},
    success: function(creteresults){
//alert(creteresults);
if(creteresults == 1){
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "Result Successfully Create!"
});
}else if(creteresults == 11){
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "info",
  title: "This Student Result Already Create!"
});
}else{
    const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "error",
  title: "Result not Create!"
});
}
    }
});

    });
});
</script>