<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#exames"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Attendance sheet</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <form class="clsstufrm">
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">class</label>
<select name="clse" class="form-select text-uppercase" id="cls">
    <option class="text-capitlaize" value="">---select class--</option>
<?php
$cls_mnger = mysqli_query($con,"select * from addClass where institute_id='$userId'");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $class_name = $clis['class_name'];
?>
    <option class="text-capitalize" value="<?php echo $id; ?>"><?php echo $class_name; ?></option>
<?php } ?>
</select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">section</label>
<select name="sectn" class="form-select text-capitalize" id="strngs">
    <option class="text-capitlaize" value="">---select section---</option>
</select>
    </div>
<script>
    /// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instutes').value;
 //   console.log(insti);
$.ajax({
   url:'ajax/class-strength.php',
   type:"POST",
   data:{ class_title:class_name,institute_code:insti },
   success: function(result){
       $('#strngs').html(result);
   }
    });
});
    /// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instutes').value;
 //   console.log(insti);
$.ajax({
   url:'ajax/ajax-subject-list.php',
   type:"POST",
   data:{ class_title:class_name,institute_code:insti },
   success: function(result){
       $('#subjectss').html(result);
   }
    });
});
</script>
<div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">Subject</label>
<select name="subj" id="subjectss" class="form-select text-capitalize"><option class="text-capitalize">---select subject---</option></select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <input type="hidden" value="<?php echo $userId; ?>" name="inst" id="instutes">
        <label class="text-capitalize">session</label>
<select class="sesn form-select">
<?php
$cls_mnger = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $session = $clis['session'];
?>
    <option class="text-capitalize"><?php echo $session; ?></option>
<?php } ?>
</select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">Examination Type</label>
<select id="temss" name="temss" class="form-select text-capitalize">
<?php
$cls_tems = mysqli_query($con,"select * from addTerms where instituteId='$userId'");
$cntsi = mysqli_num_rows($cls_tems);
if($cntsi == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($terms = mysqli_fetch_array($cls_tems)){
    $id = $terms['id'];
    $termid = $terms['termid'];
    $term = $terms['term'];
?>
    <option class="text-capitalize" value="<?php echo $termid; ?>"><?php echo $term; ?></option>
<?php } ?>
</select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mt-4">
        <div class="d-grid">
            <button type="submit" class="btngen btn btn-apna text-uppercase"><i class="fas fa-redo"></i> Generate</button>
        </div>
    </div>    
</div>
    </form>
<br><br>
<script>
$(document).ready(function(){
    $('.btngen').on('click',function(e){
e.preventDefault();
var cls = $("#cls").val();
var strngs = $("#strngs").val();
var subjectss = $("#subjectss").val();
var instutes = $("#instutes").val();
var sesn = $(".sesn").val();
var temss = $("#temss").val();
var totlmrks = $("#totlmrks").val();
var pasmrks = $("#pasmrks").val();

if(cls == ""){
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
  title: "Please Select Class!"
});
}else if(strngs == ""){
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
  title: "Please Select Section!"
});
}else if(subjectss == ""){
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
  title: "Please Select Subject!"
});
}else if(sesn == ""){
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
  title: "Please Select Session!"
});
}else if(temss == ""){
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
  title: "Please Select Examination Type!"
});
}else{
    $.ajax({
url: 'ajax/show-exame-attendance-sheet.php',
type: "POST",
data: {aply_cls:cls,sectn:strngs,subjt:subjectss,inst_ids:instutes,aply_sesin:sesn,term:temss},
success: function(respond){
//    alert(respond);
    $(".fetch-students-for-result").html(respond);
}
    });
}

    });
});
</script>
<div class="fetch-students-for-result"></div>
<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
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