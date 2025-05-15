
<!-- Modal -->
<div class="modal fade" id="attendance" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase">attendace</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<div class="row">
    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-3">
        <div class="card mb-3 text-center">
            <a href="#" class="text-uppercase p-3 bg-white nav-links" data-bs-toggle="modal" data-bs-target="#student-attendance">Student Attendance</a>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-3">
        <div class="card mb-3 text-center">
            <a href="#" class="text-uppercase p-3 bg-white nav-links" data-bs-toggle="modal" data-bs-target="#staff-attendance">Staff attendance</a>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-3">
        <div class="card mb-3 text-center">
            <a href="#" class="text-uppercase p-3 bg-white nav-links" data-bs-toggle="modal" data-bs-target="#holidays">Add Holidays</a>
        </div>
    </div>
</div>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="student-attendance" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase">student attendace</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<div class="row">
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-3">
        <div class="card mb-3 text-center">
            <a href="javascript:void()" onclick="location.href='manual-attendance'" class="text-uppercase p-3 bg-white nav-links">student manual attendance</a>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-3">
        <div class="card mb-3 text-center">
            <a href="javascript:void()" onclick="location.href='digital-attendance'" class="text-uppercase p-3 bg-white nav-links">student digital attendance</a>
        </div>
    </div>
</div>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="staff-attendance" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase">staff attendace</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<div class="row">
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-3">
        <div class="card mb-3 text-center">
            <a href="javascript:void()" onclick="location.href='staff-manual-attendance'" class="text-uppercase p-3 bg-white nav-links">staff manual attendance</a>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-3">
        <div class="card mb-3 text-center">
            <a href="javascript:void()" onclick="location.href='staff-digital-attendance'" class="text-uppercase p-3 bg-white nav-links">staff digital attendance</a>
        </div>
    </div>
</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="holidays" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase">add holidays</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form id="holiForm">
    <div class="row">
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fs-6">from</label>
            <input type="date" class="form-control frmdte">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fs-6">to</label>
            <input type="date" class="form-control tomdte">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fs-6">session</label>
            <select class="form-select text-capitalize sesin">
<?php
$sl_sesin = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
while($sesn = mysqli_fetch_array($sl_sesin)){
    $id = $sesn['id'];
    $session = $sesn['session'];
?>
    <option class="text-capitalize"><?php echo $session; ?></option>
<?php } ?>
            </select>
        </div>
         <input id="colgid" class="form-control" type="hidden" value="<?php echo $userId; ?>">
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fs-6">holiday reasons</label>
            <select class="form-select text-capitalize resn">
                <option class="text-capitalize" value="">---select reason---</option>
                <option class="text-capitalize">National Holidays</option>
                <option class="text-capitalize">Islamic Holidays</option>
                <option class="text-capitalize">conditional Holidays</option>
                <option class="text-capitalize">Winter Holidays</option>
                <option class="text-capitalize">Summer Holidays</option>
            </select>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3 mt-4">
<div class="d-grid">
    <button type="submit" class="btn btn-apna text-uppercase holdybtn"> <i class="fa-regular fa-calendar-plus"></i> Add</button>
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
$(".holdybtn").on('click',function(e){
    e.preventDefault();
var sesion = $(".sesin").val();
var colgeId = $("#colgid").val();
var reson = $(".resn").val();
var fmDte = $(".frmdte").val();
var tomdte = $(".tomdte").val();
if(reson == ""){
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
  title: "Please Select Holiday Reasons!"
});
}else if(fmDte == ""){
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
  title: "Please Select From Date!"
});
}else if(tomdte == ""){
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
  title: "Please Select To Date!"
});
}else{
    $.ajax({
url: 'ajax/marke-holidays.php',
type: "POST",
data: {aply_sesin:sesion,instit_id:colgeId,aply_reasn:reson,aply_frmdte:fmDte,aply_todte:tomdte},
success: function(atdnceholdys){ alert(atdnceholdys); }
    });
}
});        
    });
</script>
