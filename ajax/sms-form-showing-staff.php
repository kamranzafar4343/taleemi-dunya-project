<?php
require("../functions/db.php");

$inst_id = $_POST['inst_id'];
$calas = $_POST['calas'];
$sctins = $_POST['sctins'];
$sesions = $_POST['sesions'];

$sl_stu = mysqli_query($con,"select * from addStaff where instituteId='$inst_id' && session='$sesions'");
$fs = "";
if(mysqli_num_rows($sl_stu)>0){
    $fs = '<form id="smsFrm"><div class="row">';
    while($results = mysqli_fetch_assoc($sl_stu)){

$instituteId = $results['instituteId'];
$staffId = $results['staffId'];
$appliedPost = $results['appliedPost'];
$staffType = $results['staffType'];
$staffName = $results['staffName'];
$staffimage = $results['staffimage'];

$fs .= '<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xx-2 mb-3"><input type="hidden" value="'.$instituteId.'" class="form-control" name="instid[]"><input type="hidden" value="'.$staffId.'" class="form-control" name="stfid[]"><input type="hidden" value="'.$appliedPost.'" class="form-control" name="pst[]"><input type="hidden" value="'.$staffType.'" class="form-control" name="stftype[]"><input type="hidden" value="'.$staffName.'" class="form-control" name="sname[]"><input type="hidden" value="'.$staffimage.'" class="form-control" name="stfimgs[]"></div>';
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
 
 var stfid = [];
 $('input[name="stfid[]"]').each(function(){
     stfid.push(this.value);
 });
 
  var pst = [];
 $('input[name="pst[]"]').each(function(){
     pst.push(this.value);
 });
 
 var stftype = [];
 $('input[name="stftype[]"]').each(function(){
     stftype.push(this.value);
 });
 var sname = [];
 $('input[name="sname[]"]').each(function(){
     sname.push(this.value);
 });
 var stfimgs = [];
 $('input[name="stfimgs[]"]').each(function(){
     stfimgs.push(this.value);
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
url: 'ajax/send-sms-to-staff-by-session.php',
type: "POST",
data: {instided:instid,stfided:stfid,psted:pst,stftypeed:stftype,snameed:sname,stfimgsed:stfimgs,fils_img:filees,contntes:contnt},
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