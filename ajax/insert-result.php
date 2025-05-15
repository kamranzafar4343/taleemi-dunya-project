<?php
require_once("../functions/db.php");

$aply_cls = $_POST['aply_cls'];
$sectn = $_POST['sectn'];
$aply_sesin = $_POST['aply_sesin'];
$inst_ids = $_POST['inst_ids'];
$subjt = $_POST['subjt'];
$term = $_POST['term'];
$totl_mrks = $_POST['totl_mrks'];
$pas_marks = $_POST['pas_marks'];

$usr = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_ids'");
$row = mysqli_fetch_assoc($usr);
$mainid = $row['id'];
$userId = $row['institute_id'];
$instituteName = $row['institute_name'];
$campus = $row['campus'];
$image = $row['logo'];

$sl_clas = mysqli_query($con,"select * from addStudents where class='$aply_cls' && section='$sectn' && session='$aply_sesin' && instituteId='$inst_ids'");
if(mysqli_num_rows($sl_clas)>0){
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
    <tr align="center" class="bg-apna">
        <th>Sr.No</th>
        <th>Image</th>
        <th>Roll#</th>
        <th>Student Name</th>
        <th>Class</th>
        <th>Section</th>
        <th>Session</th>
        <th>Subject</th>
        <th>T.Marks</th>
        <th>Attendance</th>
        <th>Obtain Marks</th>
    </tr>
<?php
$at=1;
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
<form method="post" enctype="multipart/form-data">
<tr align="center" style="background:hsl(35, 100%, 80%);">
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $at++; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" width="50"><img class="img-fluid" src="student_imgs/<?php if(empty($frmimage) || $frmimage=="None"){ echo "users.jpg"; }else{ echo $frmimage; } ?>"><input name="snap[]" type="hidden" value="<?php echo $frmimage; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $roll_num; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $studentName; ?><input name="stu[]" type="hidden" value="<?php echo $studentName; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $class_name; ?><input name="cles" type="hidden" value="<?php echo $class; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $section; ?><input name="secn" type="hidden" value="<?php echo $section; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $session; ?><input name="sessin" type="hidden" value="<?php echo $session; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $subjt; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $totl_mrks; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><select class="form-select text-capitalize" name="atd[]"><option class="text-capitalize" value="P">present</option><option class="text-capitalize" value="A">absent</option><option class="text-capitalize" value="H">holiday</option><option class="text-capitalize" value="L">leave</option></select></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><input class="form-control" id="obtns" onchange="defineRemarks(this)" name="obtn[]" type="text" onkeypress="isInputNumber(event)" value="0"></td>
    <input type="hidden" value="<?php echo $inst_ids; ?>" name="instid">
    <input name="fathrnmes[]" type="hidden" value="<?php echo $fatherName; ?>">
    <input name="sbjt" type="hidden" value="<?php echo $subjt; ?>">
    <input name="trms" type="hidden" value="<?php echo $term; ?>">
    <input name="pasmks" type="hidden" value="<?php echo $pas_marks; ?>">
    <input name="ttlmks" type="hidden" value="<?php echo $totl_mrks; ?>">
    <input name="rolno[]" type="hidden" value="<?php echo $roll_num; ?>">
</tr>
<?php } ?>
<tr align="right">
    <td colspan="12"><button type="submit" class="btn btn-apna text-upercse" id="btnreslts"><i class="fa-regular fa-circle-check"></i> Enter Result </button></td>
</tr>

</form>
</table>
        </div>
    </div>
<?php
}else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; }
?>
<script>
$(document).ready(function(){
    $("#btnreslts").on('click',function(e){
e.preventDefault();

 var stu = [];
 $('input[name="stu[]"]').each(function(){
     stu.push(this.value);
 });
 
  var fathrnmes = [];
 $('input[name="fathrnmes[]"]').each(function(){
     fathrnmes.push(this.value);
 });
 
 var snap = [];
 $('input[name="snap[]"]').each(function(){
     snap.push(this.value);
 });

var cles = $("input[name='cles']").val();
var secn = $("input[name='secn']").val();
var sessin = $("input[name='sessin']").val();
 
 var atd = [];
 $('select[name="atd[]"]').each(function(){
     atd.push(this.value);
 });
 
 var rolno = [];
 $('input[name="rolno[]"]').each(function(){
     rolno.push(this.value);
 });
var sbjt = $("input[name='sbjt']").val();
var ttlmks = $("input[name='ttlmks']").val(); 

 var obtn = [];
 $('input[name="obtn[]"]').each(function(){
     obtn.push(this.value);
 });
var pasmks = $("input[name='pasmks']").val(); 
var trms = $("input[name='trms']").val();
var instid = $("input[name='instid']").val();

 $.ajax({
url: 'ajax/enter-result-by-subject.php',
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