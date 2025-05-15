<?php
require_once("../functions/db.php");

$rols_no = $_POST['rols_no'];
$inst_ids = $_POST['inst_ids'];
$apl_sesions = $_POST['apl_sesions'];
$apl_trms = $_POST['apl_trms'];

$usr = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_ids'");
$row = mysqli_fetch_assoc($usr);
$mainid = $row['id'];
$userId = $row['institute_id'];
$instituteName = $row['institute_name'];
$campus = $row['campus'];
$image = $row['logo'];

$slct_stdnt = mysqli_query($con,"select * from addStudents where roll_num='$rols_no' && session='$apl_sesions' && instituteId='$inst_ids'");
$std = mysqli_fetch_assoc($slct_stdnt);
$class = $std['class'];
$section = $std['section'];
$studentName = $std['studentName'];
$fatherName = $std['fatherName'];
$stimage = $std['image'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<div class="row">
        <div class="col datas">
<table class="w-100" style="background:hsl(35, 100%, 80%);">
    <tr align="center">
        <th width="50"><img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid"></th>
        <th colspan="10">
<h4 class="fs-4 fw-bold text-uppercase"><?php echo $instituteName; ?></h4>
<div class="text-center text-capitalize fw-bold"><span class="fw-normal" style="border-bottom:1px solid black;"><?php echo $campus; ?></span></div>
        </th>
    </tr>
    <tr>
        <th colspan="2">Student Name</th>
        <td class="text-capitalize"><?php echo $studentName; ?></td>
        <th>Father Name</th>
        <td class="text-capitalize"><?php echo $fatherName; ?></td>
    </tr>
    <tr>
        <th colspan="2">Class</th>
        <td class="text-capitalize"><?php echo $class_name; ?></td>
        <th>Section</th>
        <td class="text-capitalize"><?php echo $section; ?></td>
    </tr>
    <tr align="center" class="bg-apna">
        <th>Sr.No</th>
        <th>Subject</th>
        <th>T.Marks</th>
        <th>Attendance</th>
        <th>Obtain Marks</th>
        <th>Passing Marks</th>
    </tr>
<form method="post" enctype="multipart/form-data">
<?php
$a=1; 
$sectcls = mysqli_query($con,"select * from addSubjects where institute_id='$inst_ids' && classid='$class'");
while($a <= 100 && $sj = mysqli_fetch_array($sectcls)){
    $subject_name = $sj['subject_name'];
?>    
<tr align="center" style="background:hsl(35, 100%, 80%);">
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $a++; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><input class="form-control" readonly id="obtns"  name="sbjt[]" type="text"value="<?php echo $subject_name; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><input class="form-control" id="obtns"  name="ttlmks[]" type="text" onkeypress="isInputNumber(event)" value="0"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><select class="form-select text-capitalize" name="atd[]"><option class="text-capitalize" value="P">present</option><option class="text-capitalize" value="A">absent</option><option class="text-capitalize" value="H">holiday</option><option class="text-capitalize" value="L">leave</option></select></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><input class="form-control" id="obtns" onchange="defineRemarks(this)" name="obtn[]" type="text" onkeypress="isInputNumber(event)" value="0"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><input class="form-control" id="obtns" name="pasmks[]" type="text" onkeypress="isInputNumber(event)" value="0"></td>
    <input type="hidden" value="<?php echo $inst_ids; ?>" name="instid">
    <input name="fathrnmes" type="hidden" value="<?php echo $fatherName; ?>">
    <input name="stnmes" type="hidden" value="<?php echo $studentName; ?>">
    <input name="trms" type="hidden" value="<?php echo $apl_trms; ?>">
    <input name="clsrm" type="hidden" value="<?php echo $class; ?>">
    <input name="sectns" type="hidden" value="<?php echo $section; ?>">
    <input name="rolno" type="hidden" value="<?php echo $rols_no; ?>">
    <input name="imges" type="hidden" value="<?php echo $stimage; ?>">
    <input name="sesions" type="hidden" value="<?php echo $apl_sesions; ?>">
</tr>
<?php } ?>
<tr align="right">
    <td colspan="12">
<button type="submit" class="btn btn-apna text-upercse" id="btnreslts"><i class="fa-regular fa-circle-check"></i> Enter Result </button>
    </td>
</tr>

</form>
</table>
        </div>
    </div>
<script>
$(document).ready(function(){
    $("#btnreslts").on('click',function(e){
e.preventDefault();

var stu = $("input[name='stnmes']").val();
var fathrnmes = $("input[name='fathrnmes']").val();
var snap = $("input[name='imges']").val();
var cles = $("input[name='clsrm']").val();
var secn = $("input[name='sectns']").val();
var sessin = $("input[name='sesions']").val();
var rolno = $("input[name='rolno']").val();
var trms = $("input[name='trms']").val();

var sbjt = [];
 $('input[name="sbjt[]"]').each(function(){
     sbjt.push(this.value);
 });
 
 var atd = [];
 $('select[name="atd[]"]').each(function(){
     atd.push(this.value);
 });
var ttlmks = [];
 $('input[name="ttlmks[]"]').each(function(){
     ttlmks.push(this.value);
 });

var obtn = [];
 $('input[name="obtn[]"]').each(function(){
     obtn.push(this.value);
 });
 
var pasmks = [];
 $('input[name="pasmks[]"]').each(function(){
     pasmks.push(this.value);
 });

var instid = $("input[name='instid']").val();

 $.ajax({
url: 'ajax/enter-result-individual-students.php',
type: "POST",
data: {st_name:stu,ft_name:fathrnmes,st_image:snap,st_cls:cles,st_sectn:secn,st_sesin:sessin,st_atednce:atd,st_rolnum:rolno,st_sbjct:sbjt,totl_mrks:ttlmks,st_mrks:obtn,pas_mrks:pasmks,trm_id:trms,institu_id:instid},
success: function(entrresults){
if(entrresults == 11){
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
  icon: "warning",
  title: "This Result Already Submited!"
});
}else if(entrresults == 1){
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
  title: "Result Successfully Submited!"
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
  title: "This Result is not Submited!"
});
    }
    
}
    });

    });
});
</script>