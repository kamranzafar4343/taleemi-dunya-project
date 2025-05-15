<?php
require_once("../functions/db.php");

$inst_ids = $_POST['inst_ids'];
$sesins = $_POST['sesins'];

$sl_stf = mysqli_query($con,"select * from addStaff where instituteId='$inst_ids' && session='$sesins'");

$fuls = "";

if(mysqli_num_rows($sl_stf)>0){
$fuls = '<form class="alrtfrm"><table class="table table-responsive w-100">
    <tr>
        <td colspan="3"><input class="form-control" type="text" name="tct"></td>
        <td colspan="2"><button type="submit" id="btnalert" class="btn btn-success text-uppercase"> <i class="fa-regular fa-paper-plane"></i> send alert to selected staff</button></td>
    </tr>
    <tr align="center" class="bg-apna">
        <th>Sr.No</th>
        <th><input type="checkbox" id="checkAll" title="Check / Uncheck All"></th>
        <th>Image</th>
        <th>Staff Name</th>
        <th>Father Name</th>
        <th>Post</th>
        <th>Type</th>
        <th>Session</th>
        <th>Cell</th>
        <th>Staff ID</th>
    </tr>';
while($result = mysqli_fetch_array($sl_stf)){
    $stid = $result['id'];
    $instituteId = $result['instituteId'];
    $staffName = $result['staffName'];
    if(!empty($result['staffimage'])){ $staffimage = $result['staffimage']; }else{ $staffimage = "users.jpg"; }
    $fatherName = $result['fatherName'];
    $appliedPost = $result['appliedPost'];
    $staffType = $result['staffType'];
    $session = $result['session'];
    $cell = $result['cell'];
    $staffId = $result['staffId'];
    
$fuls .= '<tr align="center" style="background:hsl(35, 100%, 80%);">
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$a++.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><input type="checkbox" name="update[]" value="'.$staffId.'" ></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" width="50"><img src="staff_imgs/'.$staffimage.'" class="img-fluid"><input type="hidden" value="'.$staffimage.'" name="stfimg[]"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$staffName.'<input type="hidden" value="'.$staffName.'" name="snme[]"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$fatherName.'<input type="hidden" value="'.$fatherName.'" name="fnme[]"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$appliedPost.'<input type="hidden" value="'.$appliedPost.'" name="pst[]"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$staffType.'<input type="hidden" value="'.$staffType.'" name="tpe[]"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$session.'<input type="hidden" value="'.$session.'" name="sesn[]"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$cell.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$staffId.'<input type="hidden" value="'.$staffId.'" name="stfid[]"></td>   
    <input type="hidden" value="'.$inst_ids.'" name="instid">
</tr>';    
    }
$fuls .= '</table></form>';
echo $fuls;
}else{ echo "<div class='alert alert-danger text-capitalize'>there are no record found!</div>"; }
?>
<script>
$(document).ready(function(){
    $("#btnalert").on('click',function(e){
e.preventDefault();
var tct = $('input[name="tct"]').val();
var instIds = $('input[name="instid"]').val();

var update = [];
 $('input[name="update[]"]').each(function(){
     update.push(this.value);
 });
  var stfimg = [];
 $('input[name="stfimg[]"]').each(function(){
     stfimg.push(this.value);
 });
  var snme = [];
 $('input[name="snme[]"]').each(function(){
     snme.push(this.value);
 });
  var fnme = [];
 $('input[name="fnme[]"]').each(function(){
     fnme.push(this.value);
 });
  var pst = [];
 $('input[name="pst[]"]').each(function(){
     pst.push(this.value);
 }); 
 var tpe = [];
 $('input[name="tpe[]"]').each(function(){
     tpe.push(this.value);
 });
 var sesn = [];
 $('input[name="sesn[]"]').each(function(){
     sesn.push(this.value);
 });
 var stfid = [];
 $('input[name="stfid[]"]').each(function(){
     stfid.push(this.value);
 });
 
if(tct == ""){
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
  title: "Please Enter Your Message!"
});
}else{
$.ajax({
    url: 'ajax/send-staff-alert.php',
    type: "POST",
    data: {mesge:tct,inst_id:instIds,updte_id:update,staf_imgs:stfimg,st_nme:snme,fathr_nme:fnme,stf_post:pst,stf_tpes:tpe,sesins:sesn,stf_ids:stfid},
    success: function(respnse){
if(respnse == 1){
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
  title: "Alerts Successfully Sent!"
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
  title: "Alerts is not Sent!"
});
}
    }
});
}
    });
});


$(document).ready(function(){

  // Check/Uncheck ALl
  $('#checkAll').change(function(){
    if($(this).is(':checked')){
      $('input[name="update[]"]').prop('checked',true);
    }else{
      $('input[name="update[]"]').each(function(){
         $(this).prop('checked',false);
      });
    }
  });

  // Checkbox click
  $('input[name="update[]"]').click(function(){
    var total_checkboxes = $('input[name="update[]"]').length;
    var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

    if(total_checkboxes_checked == total_checkboxes){
       $('#checkAll').prop('checked',true);
    }else{
       $('#checkAll').prop('checked',false);
    }
  });
});
</script>
