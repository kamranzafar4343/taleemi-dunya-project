<?php
require_once("../functions/db.php");

$aply_dates = $_POST['aply_dates'];
$aply_inst = $_POST['aply_inst'];
$aply_sesion = $_POST['aply_sesion'];
$a=1;
$sl_clas = mysqli_query($con,"select * from addStaff where instituteId='$aply_inst' && session='$aply_sesion'");
?>
<div class="row">
        <div class="col">
<table class="w-100 bg-apna-body">
    <tr align="center" class="bg-apna">
        <th class="border-apna">Sr.No</th>
        <th class="border-apna">StaffID</th>
        <th class="border-apna">Image</th>
        <th class="border-apna">Student Name</th>
        <th class="border-apna">Father Name</th>
        <th class="border-apna">Post</th>
        <th class="border-apna">Type</th>
        <th class="border-apna">Session</th>
        <th class="border-apna">Attendance</th>
        <th class="border-apna">Time In</th>
        <th class="border-apna">Time Out</th>
    </tr>
<?php
if(mysqli_num_rows($sl_clas)>0){
    while($a <= 100000 && $result = mysqli_fetch_array($sl_clas)){
        $instituteId = $result['instituteId'];
        $staffId = $result['staffId'];
        $staffName = $result['staffName'];
        $fatherName = $result['fatherName'];
        $appliedPost = $result['appliedPost'];
        $staffType = $result['staffType'];
        $session = $result['session'];
        $staffimage = $result['staffimage'];
?>
<form class="cntrs">
<tr align="center">
    <td class="border-apna"><?php echo $a++; ?></td>
    <td class="border-apna"><?php echo $staffId; ?><input name="stfid[]" type="hidden" value="<?php echo $staffId; ?>"></td>
    <td class="border-apna" width="20"><img src="staff_imgs/<?php if(!empty($staffimage)){ echo $staffimage; }else{ echo "users.jpg";} ?>" class="img-fluid"><input name="imges[]" type="hidden" value="<?php echo $staffimage; ?>"></td>
    <td class="text-capitalize border-apna"><?php echo $staffName; ?><input name="staf[]" type="hidden" value="<?php echo $staffName; ?>"></td>
    <td class="text-capitalize border-apna"><?php echo $fatherName; ?><input name="fath[]" type="hidden" value="<?php echo $fatherName; ?>"></td>
    <td class="border-apna"><?php echo $appliedPost; ?><input name="psts[]" type="hidden" value="<?php echo $appliedPost; ?>"></td>
    <td class="border-apna"><?php echo $staffType; ?><input name="tpes[]" type="hidden" value="<?php echo $staffType; ?>"></td>
    <td class="border-apna"><?php echo $session; ?><input class="sessin" type="hidden" value="<?php echo $aply_sesion; ?>"></td>
    <td class="border-apna"><select class="text-capitalize form-control" name="attdnce[]"><option value="P">Present</option><option value="A">Absent</option><option value="L">Leave</option><option value="H">Holiday</option></select></td>
    <td class="border-apna"><input name="tmings[]" type="time" class="form-control"></td> 
    <td class="border-apna"><input name="tmingout[]" type="time" class="form-control"></td> 
    <input type="hidden" value="<?php echo $aply_inst; ?>" class="inst_id">
    <input type="hidden" value="<?php echo $aply_dates; ?>" class="str_dte">
</tr>
<?php } ?>
<tr align="right">
    <td colspan="12"><button type="submit" class="btn btn-apna text-uppercase" id="btnattd"><i class="fa-regular fa-circle-check"></i> Mark Attendance</button></td>
</tr>

</form>
<?php
}else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; }
?>
</table>
        </div>
    </div>
<script>
$(document).ready(function(){
    $("#btnattd").on('click',function(e){
e.preventDefault();

var stfid = [];
 $('input[name="stfid[]"]').each(function(){
     stfid.push(this.value);
 });


var imges = [];
 $('input[name="imges[]"]').each(function(){
     imges.push(this.value);
 });
 
 var staf = [];
 $('input[name="staf[]"]').each(function(){
     staf.push(this.value);
 });
 
 var fath = [];
 $('input[name="fath[]"]').each(function(){
     fath.push(this.value);
 });
 
 var psts = [];
 $('input[name="psts[]"]').each(function(){
     psts.push(this.value);
 });
 
 var tpes = [];
 $('input[name="tpes[]"]').each(function(){
     tpes.push(this.value);
 });
 
  var attdnce = [];
 $('select[name="attdnce[]"] :selected').each(function(){
         attdnce.push(this.value);
 });
 
 var tmings = [];
 $('input[name="tmings[]"]').each(function(){
     tmings.push(this.value);
 });
 
 var tmingout = [];
 $('input[name="tmingout[]"]').each(function(){
     tmingout.push(this.value);
 });

var sessin = $(".sessin").val();
var inst_id = $(".inst_id").val();
var str_dte = $(".str_dte").val();

$.ajax({
    url: 'ajax/staff-attendance-mark.php',
    type: "POST",
    data: {apl_staffid:stfid,apl_image:imges,apl_satffname:staf,apl_fathrnme:fath,apl_post:psts,apl_type:tpes,apl_attendance:attdnce,apl_timein:tmings,apl_timeout:tmingout,apl_sesion:sessin,apl_instid:inst_id,apl_startdate:str_dte},
    success: function(marked){
if(marked == 11){
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
  title: "Today Attendance Already Marked!"
});
}else if(marked == 1){
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
  title: "Atttendance is Successfully Mark!"
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
  title: "Attendance is no Marked!"
});
}
    }
});

    });
});
</script>