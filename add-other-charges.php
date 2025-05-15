<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<script>
    window.onload = function(){ serch_vls.focus() }
</script>
<div class="container-fluid mb-3">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#clection"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> add other charges</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <form class="chrgFrm">
    <div class="row">
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fs-6">class</label>
            <select class="form-select text-capitalize lclcls">
<?php
$slcls = mysqli_query($con,"select * from addClass where institute_id='$userId'");
if(mysqli_num_rows($slcls)>0){
    while($rsult = mysqli_fetch_array($slcls)){
$id = $rsult['id'];
$class_name = $rsult['class_name'];
?>
<option value="<?php echo $id; ?>" class="text-capitalize"><?php echo $class_name; ?></option>
<?php
    }
}else{ echo "<div class='alert alert-danger'>There are no Class Found!</div>"; }
?>
            </select>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <label class="text-capitalize fs-6">other charges name</label>
            <input type="text" class="form-control chrtitle" placeholder="Enter Other Charges Name">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <label class="text-capitalize fs-6">other charges Amount</label>
            <input type="text" class="form-control chrgamnt" onkeypress="isInputNumber(event)" placeholder="00.00">
            <input type="hidden" class="form-control" id="institue" value="<?php echo $userId; ?>">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <label class="text-capitalize fs-6">type</label>
            <select class="form-select text-capitalize typs">
<option class="text-capitalize" value="">---select type---</option>
<option class="text-capitalize" value="1">monthly charges</option>
<option class="text-capitalize" value="2">event charges</option>
<option class="text-capitalize" value="3">Inventory</option>
<option class="text-capitalize" value="4">exam charges</option>
<option class="text-capitalize" value="5">Late Fee Fine</option>
            </select>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mt-4">
<div class="d-grid">
    <button type="submit" class="btn btn-apna text-uppercase adchrgebtn"><i class="fa-solid fa-plus"></i> add</button>
</div>
        </div>
    </div>
</form>
<div class="edit-othrs"></div>
<div class="row">
    <div class="col mb-3">
<div class="other-charges-table"></div>
    </div>
</div>

</div>

<?php require_once("source/foot-section.php"); ?>
<script>
function otherTable(){
    var colgIdes = $("#institue").val();
if(colgIdes == ""){
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
  title: 'Please Contact With Developer!'
})
}else{
$.ajax({
    url: 'ajax/fetch-otherchrgesamount.php',
    type: "POST",
    data: {colge_cde:colgIdes},
    success: function(chrgdata){
$(".other-charges-table").html(chrgdata);
    }
});
}
    }
otherTable();
$(document).ready(function(){
    $(".adchrgebtn").on('click',function(e){
e.preventDefault();
var chrTitles = $(".chrtitle").val();
var chrgAmnts = $(".chrgamnt").val();
var typs = $(".typs").val();
var instIds = $("#institue").val();
var lclcls = $(".lclcls").val();

if(typs == ""){
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
  title: 'Please Select Types!'
})    
}else if(chrTitles == ""){
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
  title: 'Enter Your Other Charges Title'
})
}else if(chrgAmnts == ""){
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
  title: 'Enter Your Other Charges Amount'
})
}else if(instIds == ""){
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
  title: 'Please Contact Your Developer'
})
}else{
    $.ajax({
url: 'ajax/insert-other-charges-amount.php',
type: "POST",
data: {chrg_nme:chrTitles,chrge_amt:chrgAmnts,inst_ide:instIds,othr_type:typs,selct_cls:lclcls},
success: function(chrgeresult){
if(chrgeresult == 11){
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
  title: 'This Charges Already Inserted!'
})    
}else if(chrgeresult == 1){
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
  title: 'Add Other Charges Successfully Entered!'
})
$(".chrgFrm").trigger("reset");
otherTable();
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
  title: 'Add Other Charges is not Entered!'
})
    }
}
    });
}
    });
});
Toast.fire({
  icon: 'warning',
  title: 'Please Contact Your Developer!'
})



</script>