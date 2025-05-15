<?php
require("../functions/db.php");

$inst_id = $_POST['inst_id'];
$calas = $_POST['calas'];
$sctins = $_POST['sctins'];
$sesions = $_POST['sesions'];

$sl_stu = mysqli_query($con,"select * from addStudents where instituteId='$inst_id' && class='$calas' && section='$sctins' && session='$sesions'");
$fs = "";
if(mysqli_num_rows($sl_stu)>0){
    $fs = '<form id="smsFrm"><div class="row">';
    while($results = mysqli_fetch_assoc($sl_stu)){

$instituteId = $results['instituteId'];
$familyId = $results['familyId'];
$roll_num = $results['roll_num'];
$class = $results['class'];
$section = $results['section'];
$session = $results['session'];
$image = $results['image'];
$studentName = $results['studentName'];

$fs .= '<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xx-2 mb-3"><input type="hidden" value="'.$instituteId.'" class="form-control" name="instid[]"><input type="hidden" value="'.$familyId.'" class="form-control" name="fmly[]"><input type="hidden" value="'.$roll_num.'" class="form-control" name="rolnm[]"><input type="hidden" value="'.$class.'" class="form-control" name="cles[]"><input type="hidden" value="'.$section.'" class="form-control" name="setn[]"><input type="hidden" value="'.$session.'" class="form-control" name="sesin[]"><input type="hidden" value="'.$image.'" class="form-control" name="imeg[]"><input type="hidden" value="'.$studentName.'" class="form-control" name="stnme[]"></div>';
    }
echo $fs;
?>
<div class="col-12 mb-3">
    <input type="file" accept=".jpg,.pdf,.png,.jpeg,.doc,.docx" class="form-control" id="files">
</div>
<div class="col-12 mb-3">
    <textarea class="form-control" rows="10" id="contnt"></textarea>
</div>
<div class="col-12 mb-3">
    <div class="d-grid">
        <button type="submit" class="btn btn-apna text-uppercase" id="sendsmsbtn"><i class="fa-regular fa-share-from-square"></i> send</button>
    </div>
</div>
</div>
</form>
<script>
$(document).ready(function(){
    $("#sendsmsbtn").on('click',function(e){
e.preventDefault();
 var instid = [];
 $('input[name="instid[]"]').each(function(){
     instid.push(this.value);
 });
 
 var fmly = [];
 $('input[name="fmly[]"]').each(function(){
     fmly.push(this.value);
 });
 
  var rolnm = [];
 $('input[name="rolnm[]"]').each(function(){
     rolnm.push(this.value);
 });
 
 var cles = [];
 $('input[name="cles[]"]').each(function(){
     cles.push(this.value);
 });
 var setn = [];
 $('input[name="setn[]"]').each(function(){
     setn.push(this.value);
 });
 var sesin = [];
 $('input[name="sesin[]"]').each(function(){
     sesin.push(this.value);
 });
 
 var imeg = [];
 $('input[name="imeg[]"]').each(function(){
     imeg.push(this.value);
 });
 
  var stnme = [];
 $('input[name="stnme[]"]').each(function(){
     stnme.push(this.value);
 });

var filees = $("#files").val().replace(/C:\\fakepath\\/i, '');
var contnt = $("#contnt").val();

if(contnt == ""){
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
  icon: 'warning',
  title: 'Please Enter Your Message!'
})
}else{
$.ajax({
url: 'ajax/send-sms-to-students-by-class.php',
type: "POST",
data: {instides:instid,fmlyes:fmly,rolnmes:rolnm,cleses:cles,setnes:setn,sesines:sesin,imeges:imeg,stnmees:stnme,fils_img:filees,contntes:contnt},
success: function(classsmssenddata){
 if(classsmssenddata == 1){
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
  title: 'Message Successfully Send!'
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
  title: 'Message not Sent!'
})
 }   
}
    });
}
 
    });
});
</script>
<?php
}else{
    echo "<div class='alert alert-success text-capitalize'>there are no any student available in this class!</div>";
}
?>