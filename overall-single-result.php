<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#exame-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='result-card'"> all result cards</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Single Result Card</li>
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
<div class="container-fluid">
    <form class="trmsForm">
    <div class="row">
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">class</label>
<select name="clse" class="form-select text-uppercase" id="cls">
    <option class="text-capitalize" value="">---select class---</option>
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
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">section</label>
        <select class="form-select text-capitalize" id="strngs"><option value="">---select section---</option></select>
    </div>
<script>
/// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instutes').value;
//    console.log(class_name);
 
$.ajax({
   url:'ajax/class-strength.php',
   type:"POST",
   data:{ class_title:class_name,institute_code:insti },
   success: function(result){
       $('#strngs').html(result);
      //console.log(result);
   }
    });
});
</script>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
            <input value="<?php echo $userId; ?>" type="hidden" class="instes" id="instutes">
<label class="text-capitalize">Term</label>
<select class="text-capitalize form-select trms">
    <option class="text-capitalize" value="">---select Term---</option>
<?php
$sel_trms = mysqli_query($con,"select * from addTerms where instituteId='$userId'");
if(mysqli_num_rows($sel_trms)>0){
    while($trmes=mysqli_fetch_array($sel_trms)){
$termid = $trmes['termid'];
$term = $trmes['term'];
echo "<option value='$termid' class='text-capitalize'>$term</option>";
    }
}else{ echo "<option value=''>There are no Term.</option>"; }
?>
</select>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
<label class="text-capitalize">Session</label>
<select class="text-capitalize form-select sesins">
<?php
$sel_seisn = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
if(mysqli_num_rows($sel_seisn)>0){
    while($sein = mysqli_fetch_array($sel_seisn)){
        $session = $sein['session'];
echo "<option>$session</option>";
    }
}else{
    echo "<option value=''>There are no Session.</option>";
}
?>
</select>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3 mt-4">
<div class="d-grid">
    <button class="btn btn-apna text-uppercase siglebtn"><i class="fa-solid fa-fan"></i> generate</button>
</div>
        </div>
    </div>
    </form>
<div class="row">
    <div class="col-12" align="right">
        <button class='btn btn-apna' id="btn_print"><i class="fa fa-print"></i> Print</button>
    </div>
</div>
<div class="view-result-cards datas"></div>
<script>
///fetch-results-by-terms.php Check the Extra or not
$(document).ready(function(){
    $(".siglebtn").on('click',function(e){
e.preventDefault();
var cls = $("#cls").val();
var strngs = $("#strngs").val();
var trms = $(".trms").val();
var sesins = $(".sesins").val();
var instes = $(".instes").val();
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
}else if(trms == ''){
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
  title: "Please Select Term!"
}); 
}else{
    $.ajax({
url: 'ajax/fetch-results-by-terms.php',
type: "POST",
data: {aply_trms:trms,aply_sesin:sesins,inst_ids:instes,aply_cls:cls,aply_sectn:strngs},
success: function(methds){ $(".view-result-cards").html(methds); }
    });
}
    });
});
</script>
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