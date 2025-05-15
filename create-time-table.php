<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#timetble"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'">Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">Add Periods</li>
  </ol>
</nav>
<style>
.time-property{ display:none; }
</style>
<div class="container-fluid mt-3">
    <div class="row">
<div class="col-12 mb-3">
    <button class="btn btn-danger text-capitalize tmtblebtn" type="submit">
        <i class="fa-solid fa-clock-rotate-left"></i> Time Table
    </button>
    <button class="btn btn-info text-capitalize prdbtn" type="submit">
        <i class="fa-solid fa-clock"></i> period
    </button>
</div>
    </div>
    <div class="row mb-4 prids">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<h4 class="text-warning text-capitalize fw-bolder">institute period division</h4>
<div class="text-muted">Following are the periods saved in the system.</div>
        </div> 
    </div>
<form>
    <div class="row prids">
        <div class="col-6 col-md-4 mb-3">
            <div class="input-group">
                <button class="btn btn-light"><i class="fa-solid fa-magnifying-glass"></i></button>
                <input type="text" class="form-control" placeholder="Search">
                <button class="btn btn-apna text-capitalize">
search <i class="fa-solid fa-angles-right"></i>
                </button>
            </div>
        </div>
        <div class="col-6 col-md-2 mb-3">
            <button class="btn btn-success text-capitalize adnw" type="submit">
                <i class="fa-regular fa-clock"></i> add new
            </button>
        </div>
    </div>
</form>
<div class="period-manager prids"></div>
<form>
    <div class="row time-property">
<div class="col-4 col-md-3 mb-3">
    <label class="text-capitalize fs-6">class</label>
    <div class="input-group">
<select class="form-select text-capitalize loadcls">
        <option class="text-capitalize" value="">---select class---</option>
<?php
$prds_clas = mysqli_query($con,"select * from addClass where institute_id='$userId'");
if(mysqli_num_rows($prds_clas)>0){
    while($clse=mysqli_fetch_array($prds_clas)){
$idps = $clse['id'];
$class_name = $clse['class_name'];
echo "<option value='$idps' class='text-capitalize'>$class_name</option>";
    }
}else{ echo "<option>Please Add Class!</option>"; }
?>      
</select>
<button class="btn btn-apna text-uppercase loadtablebtn">load <i class="fa-solid fa-angles-right"></i></button>
    </div>
</div>
<div id="form45"></div>
    </div>
</form>
</div>
<?php require_once("source/foot-section.php"); ?>
<script>
//// Load Time Table
$(document).ready(function(){
    $(".loadtablebtn").on('click',function(e){
e.preventDefault();
var instits = $('.instit').val();
var loadcls = $('.loadcls').val();
if(loadcls == ""){
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
  title: "Please Select Class!"
});
}else{
$.ajax({
url: 'ajax/fetch-time-tables-by-class.php',
type: "POST",
data: {institu_ids:instits,load_clases:loadcls},
success: function(lodclserom){ $("#form45").html(lodclserom); }
    });   
}
    });
});
/// Show and Hide Time Table and Periods / Auto Load the Priod Manager
$(document).ready(function(){
    $(".tmtblebtn").on('click',function(e){
e.preventDefault();
$(".time-property").show();
$(".prids").hide();
    });
    $(".prdbtn").on('click',function(e){
e.preventDefault();
$(".time-property").hide();
$(".prids").show();
    });
    $('.adnw').on('click',function(e){
e.preventDefault();
$("#perods").modal('show');
    });
});
function fetchPeriods(){
$(document).ready(function(){
    var instit = $('.instit').val();
$.ajax({
    url: 'ajax/fetch-period-record.php',
    type: "POST",
    data: {inst_ids:instit},
    success: function(tbles){
$(".period-manager").html(tbles);
    }
    });
});
    }
fetchPeriods();
</script>

<!-- Modal -->
<div class="modal fade" id="perods" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5 text-capitalize" id="staticBackdropLabel">study period information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
            <label class="text-capitalize text-white">class</label>
            <select class="form-select text-capitalize cls">
                <option class="text-capitalize" value="">---select class---</option>
<?php
$prds_clas = mysqli_query($con,"select * from addClass where institute_id='$userId'");
if(mysqli_num_rows($prds_clas)>0){
    while($clse=mysqli_fetch_array($prds_clas)){
$idps = $clse['id'];
$class_name = $clse['class_name'];
echo "<option value='$idps' class='text-capitalize'>$class_name</option>";
    }
}else{ echo "<option>Please Add Class!</option>"; }
?>
            </select>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
            <label class="text-capitalize text-white">select number</label>
            <select class="form-select text-capitalize nmbr">
                <option class="text-capitalize" value="">---select number---</option>
                <?php for($i=1;$i<=15;$i++){ echo "<option>$i</option>"; } ?>
            </select>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
            <label class="text-capitalize text-white">start time</label>
            <input type="time" class="form-control strttme">
            <input type="hidden" class="form-control instit" value="<?php echo $userId; ?>">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
            <label class="text-capitalize text-white">end time</label>
            <input type="time" class="form-control endtmes">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
            <label class="text-capitalize text-white">type</label>
            <select class="form-select text-capitalize tpes">
                <option class="text-capitalize" value="">---select type---</option>
                <option class="text-capitalize">study period</option>
                <option class="text-capitalize">break</option>
                <option class="text-capitalize">prayer time</option>
            </select>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3 mt-4">
            <div class="d-grid">
                <button class="btn btn-apna text-uppercase adprds" type="submit"> <i class="fa-solid fa-plus"></i> add</button>
            </div>
        </div>
    </div>
</form>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    $(".adprds").on('click',function(e){
e.preventDefault();
var instit = $(".instit").val();
var cls = $(".cls").val();
var nmbr = $(".nmbr").val();
var strttme = $(".strttme").val();
var endtmes = $(".endtmes").val();
var tpes = $(".tpes").val();

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
      title: "Please Select Your Class!"
    });
}else if(nmbr == ""){
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
  title: "Please Select Your Period No!"
});
}else if(strttme == ""){
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
  title: "Please Select Start Time!"
});
}else if(endtmes == ""){
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
  title: "Please Select Period End Time!"
});
}else if(tpes == ""){
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
  title: "Please Select Period Type!"
});
}else{
    $.ajax({
url: 'ajax/insert-periods-class-wise.php',
type: "POST",
data: {perd_instid:instit,perd_cls:cls,perd_nmbr:nmbr,perd_start:strttme,perd_end:endtmes,perd_tpes:tpes},
success: function(prids){
    if(prids == 11){
Swal.fire({
  title: "Try Again!",
  text: "This Period is Already Submited!",
  icon: "warning"
});        
    }else if(prids == 1){
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
  title: "Period Timing Successfully Create!"
});
fetchPeriods();
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
  title: "Period Timing is not Create!"
});
    }
}
    });
}
    });
});
</script>