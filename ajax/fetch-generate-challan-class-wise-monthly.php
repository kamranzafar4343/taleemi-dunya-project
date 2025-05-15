<?php
require_once("../functions/db.php");

$cless = $_POST['cless'];
$sectn = $_POST['sectn'];
$sesns = $_POST['sesns'];
$inst_id = $_POST['inst_id'];
$mnths = $_POST['mnths'];
$dues_dates = $_POST['dues_dates'];
$at = 1;
$fuls = "";

$sel_chlns = mysqli_query($con,"select * from addStudents where class='$cless' && section='$sectn' && session='$sesns' && instituteId='$inst_id'");
if(mysqli_num_rows($sel_chlns)>0){
$fuls = '<table class="table table-responsive w-100"><tr class="bg-apna" align="center"><th style="border:1px solid hsl(25, 100%, 50%);">#</th><th style="border:1px solid hsl(25, 100%, 50%);">Image</th><th style="border:1px solid hsl(25, 100%, 50%);">Roll No.</th><th style="border:1px solid hsl(25, 100%, 50%);">Session</th><th style="border:1px solid hsl(25, 100%, 50%);">Student Name</th><th style="border:1px solid hsl(25, 100%, 50%);">Father Name</th><th style="border:1px solid hsl(25, 100%, 50%);">Class</th><th style="border:1px solid hsl(25, 100%, 50%);">Section</th><th style="border:1px solid hsl(25, 100%, 50%);">Fee</th><th style="border:1px solid hsl(25, 100%, 50%);">Previous</th></tr>';
while($at <= 100000 && $rows = mysqli_fetch_array($sel_chlns)){
    
    $id = $rows['id'];
$instituteId = $rows['instituteId'];
$familyId = $rows['familyId'];
if(!empty($rows['image'])){ $student_img = $rows['image']; }else{ $student_img = "users.jpg"; }
$rollnum = $rows['roll_num'];
$session = $rows['session'];
$student_name = $rows['studentName'];
$father_name = $rows['fatherName'];
$class = $rows['class'];
$section = $rows['section'];
$actual_fee = $rows['totalFee'];
$previous_session_fee = $rows['previous_session_fee'];
$mode_of_payment = $rows['mode_of_payment'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
    
    $fuls .= '<form class="clngentfrm">
    <tr style="background:hsl(35, 100%, 80%);">
        <td style="border:1px solid hsl(25, 100%, 50%);">'.$at++.'</td>
        <td style="border:1px solid hsl(25, 100%, 50%);" width="50"><img src="student_imgs/'.$student_img.'" class="img-fluid"><input type="hidden" value="'.$student_img.'" name="imgs[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);">'.$rollnum.'<input type="hidden" value="'.$rollnum.'" name="rlnumbr[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);">'.$session.'<input type="hidden" value="'.$session.'" name="sesin[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize">'.$student_name.'<input type="hidden" value="'.$student_name.'" name="sname[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize">'.$father_name.'<input type="hidden" value="'.$father_name.'" name="fname[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase">'.$class_name.'<input type="hidden" value="'.$class.'" name="clss[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase">'.$section.'<input type="hidden" value="'.$section.'" name="setn[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);">'.$actual_fee.'<input type="hidden" value="'.$actual_fee.'" name="mfee[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);">'.$previous_session_fee.'<input value="'.$previous_session_fee.'" name="prevbalance[]" type="hidden"></td>
        <input type="hidden" value="'.$instituteId.'" name="instId">
        <input type="hidden" value="'.$familyId.'" name="fmly[]">
        <input value="'.$mnths.'" name="monh" type="hidden">
        <input value="'.$dues_dates.'" name="dusdtes" type="hidden">
    </tr>';
}
$fuls .= '<tr>
    <td colspan="10" align="right">
        <button type="submit" class="btn btn-apna butgenrte"> <i class="fa-solid fa-arrows-rotate"></i> Generate Challan</button>
    </td>
</tr></form></table>';
echo $fuls;
}else{ echo "<div class='alert alert-danger text-capitalize'>there are no result found!</div>"; }
?>

<script>
$(document).ready(function(){
    $(".butgenrte").on('click',function(e){
e.preventDefault();

var instId = $('input[name="instId"]').val();

var imgs = [];
 $('input[name="imgs[]"]').each(function(){
     imgs.push(this.value);
 });
 
var fmly = [];
 $('input[name="fmly[]"]').each(function(){
     fmly.push(this.value);
 });
 
 var rlnumbr = [];
 $('input[name="rlnumbr[]"]').each(function(){
     rlnumbr.push(this.value);
 });
 var sesin = [];
 $('input[name="sesin[]"]').each(function(){
     sesin.push(this.value);
 });
 var sname = [];
 $('input[name="sname[]"]').each(function(){
     sname.push(this.value);
 });
 var fname = [];
 $('input[name="fname[]"]').each(function(){
     fname.push(this.value);
 });
 var clss = [];
 $('input[name="clss[]"]').each(function(){
     clss.push(this.value);
 });
 var setn = [];
 $('input[name="setn[]"]').each(function(){
     setn.push(this.value);
 });
 var mfee = [];
 $('input[name="mfee[]"]').each(function(){
     mfee.push(this.value);
 });
 var prevbalance = [];
 $('input[name="prevbalance[]"]').each(function(){
     prevbalance.push(this.value);
 });
 var monhs = $('input[name="monh"]').val();
 var dusdtegs = $('input[name="dusdtes"]').val();
 

$.ajax({
    url: 'ajax/inserted-challan-in-fee-collection.php',
    type: "POST",
    data: {inst_ids:instId,frm_img:imgs,fml_id:fmly,rol_nm:rlnumbr,yer:sesin,st_nme:sname,fthr_nme:fname,apl_cls:clss,sectn:setn,month_fe:mfee,blanc:prevbalance,manth:monhs,finl_due_date:dusdtegs},
    success: function(results){
if(results == 11){
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'info',
  title: 'Already Challan Generate!'
})
}else if(results == 1){
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Challan Successfully Generated!'
})
}else{
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: 'Challan is not Generated!'
})
}
    }
});
 
 
 
    });
});
</script>


