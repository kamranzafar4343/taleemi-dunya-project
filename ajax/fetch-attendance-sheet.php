<?php
require_once("../functions/db.php");

$mrk_dats = $_POST['mrk_dats'];
$aply_cles = $_POST['aply_cles'];
$aply_sectns = $_POST['aply_sectns'];
$attnd_inst = $_POST['attnd_inst'];
$aply_sesions = $_POST['aply_sesions'];

$a = 1;

$sl_atendce = mysqli_query($con,"select * from addStudents where instituteId='$attnd_inst' && class='$aply_cles' && section='$aply_sectns' && session='$aply_sesions'");
if(mysqli_num_rows($sl_atendce)>0){
?>
<table class="table table-responsive w-100 pt-3">
    <thead>
    <tr align="center" class="bg-apna">
        <th>Sr.No</th>
        <th>Image</th>
        <th>Student Name</th>
        <th>Father Name</th>
        <th>Class</th>
        <th>Section</th>
        <th>Session</th>
        <th>Roll No.</th>
        <th>Mark Attendance</th>
    </tr>
</thead>
<tbody>
<?php
    while($a <= 100000 && $result = mysqli_fetch_array($sl_atendce)){
$instituteId = $result['instituteId'];
$studentName = $result['studentName'];
$image = $result['image'];
$fatherName = $result['fatherName'];
$class = $result['class'];
$section = $result['section'];
$session = $result['session'];
$roll_num = $result['roll_num'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$attnd_inst' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<form class="cntrs">
<tr align="center" style="background:hsl(35, 100%, 80%);">
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $a++; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" width="50"><img class="img-fluid" src="student_imgs/<?php if(!empty($image)){ echo $image; }else{ echo "users.jpg"; } ?>"><input name="snap[]" type="hidden" value="<?php echo $image; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $studentName; ?><input name="stu[]" type="hidden" value="<?php echo $studentName; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo  $fatherName; ?><input name="fath[]" type="hidden" value="<?php echo $fatherName; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $class_name; ?><input id="cles" type="hidden" value="<?php echo $class; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $section; ?><input id="secn" type="hidden" value="<?php echo $section; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $session; ?><input id="sessin" type="hidden" value="<?php echo $session; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $roll_num; ?><input name="rolno[]" type="hidden" value="<?php echo $roll_num; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><select class="text-capitalize form-select satus" name="st[]"><option class="text-capitalize" value="P">Present</option><option class="text-capitalize" value="A">Absent</option><option class="text-capitalize" value="L">Leave</option><option class="text-capitalize" value="H">Holiday</option></select></td>
    <input type="hidden" value="<?php echo $attnd_inst; ?>" id="instideps">
    <input type="hidden" value="<?php echo $mrk_dats; ?>" id="mrkattd">
</tr>
<?php } ?>
<tr align="right">
    <td colspan="12"><button type="submit" class="btn btn-apna text-upercse" id="btnmarkattdnce"><i class="fa-regular fa-circle-check"></i> Mark Attendance</button></td>
</tr>
</form>
    </tbody>
</table>
<?php }else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; } ?>
<script>
$(document).ready(function(){
    $("#btnmarkattdnce").on('click',function(e){
e.preventDefault();

var stu = [];
 $('input[name="stu[]"]').each(function(){
     stu.push(this.value);
 });

var snap = [];
 $('input[name="snap[]"]').each(function(){
     snap.push(this.value);
 });

 
 var fath = [];
 $('input[name="fath[]"]').each(function(){
     fath.push(this.value);
 });

var cles = $("#cles").val();
var secn = $("#secn").val();
var sessin = $("#sessin").val();

var rolno = [];
 $('input[name="rolno[]"]').each(function(){
     rolno.push(this.value);
 });

 var st = [];
 $('select[name="st[]"] :selected').each(function(){
     st.push(this.value);
 });

var mrkattd = $("#mrkattd").val(); 
var instideps = $("#instideps").val();

$.ajax({
    url: 'ajax/insert-manuual-attendance.php',
    type: "POST",
    data:{mark_studnt:stu,mrk_image:snap,mark_fathr:fath,mrk_clas:cles,mrk_sectn:secn,mrk_sesions:sessin,mrk_rolnumbr:rolno,mrk_status:st,mrk_dates:mrkattd,mrk_schol:instideps},
    success:function(atendresult){ 
if(atendresult == 11){
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
  title: "Your This Day Attendance Already Marked!"
});
}else if(atendresult == 1){
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
  title: "Attendance Successfaully Marked!"
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
  title: "Attendance is not Marked!"
});
}
    }
});



    });
});
</script>