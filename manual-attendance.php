<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#attendance"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> manual attendance</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
<div class="col-12 col-sm-12 col-md-9">
        <form class="mrkatFrm">
<div class="row">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">date</label>
        <input type="date" class="form-control mattdence">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">class</label>
<select class="form-select text-uppercase" id="cls">
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
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
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
</script>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <input type="hidden" value="<?php echo $userId; ?>" name="inst" id="instutes">
        <label class="text-capitalize">session</label>
<select class="form-select text-capitalize sesinsps">
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

    
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mt-4">
        <div class="d-grid">
            <button id="gnrtatendce" type="submit" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> Generate</button>
        </div>
    </div>    
</div>
    </form>
<br><br>
<div id="attendancesheet"></div>
</div>
    <div class="col-12 col-sm-12 col-md-3">
<div class="card bg-apna">
    <div class="card-header"><h5 class="text-uppercase fs-5 fw-bolder">recent activity</h5></div>
    <div class="card-body" style="background-color:hsl(35,100%,80%);height:60rem;overflow:scroll;">
<table class="w-100">
    <?php
$sel_atendcne = mysqli_query($con,"select * from attandance where instituteId='$userId' group by date,class,section order by date desc");
if(mysqli_num_rows($sel_atendcne)>0){
    while($result = mysqli_fetch_array($sel_atendcne)){
$idat = $result['id'];
$date = $result['date'];
$class = $result['class'];
$section = $result['section'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
    <tr align="center" style="background-color:hsl(25,100%,90%);">
        <td style="border:4px solid hsl(35,100%,80%);"><a href='#' class='nav-link p-3 m-2'><?php echo $date; ?></a></td>
        <td style="border:4px solid hsl(35,100%,80%);" class="text-capitalize"><?php echo $class_name; ?></td>
        <td style="border:4px solid hsl(35,100%,80%);" class="text-capitalize"><?php echo $section; ?></td>
        <td style="border:4px solid hsl(35,100%,80%);">
<a href='today-attendance' class='nav-link p-3 m-2' target="_blank">
    <i class="fa-solid fa-screwdriver-wrench text-success"></i>
</a>
        </td>
    </tr>
<?php
    }
}else{ echo "<div>There are no Record Found!</div>"; }
?>
</table>
    </div>
</div>
    </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>
<script>
$(document).ready(function(){
    $("#gnrtatendce").on('click',function(e){
e.preventDefault();
var mattdence = $(".mattdence").val();
var cls = $("#cls").val();
var strngs = $("#strngs").val();
var instutes = $("#instutes").val();
var sesn = $(".sesinsps").val();

if(mattdence == ""){
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
  title: "Please Select Date!"
});
}else if(cls == ""){
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
  icon: "warning",
  title: "Please Select Section!"
});
}else{
    $.ajax({
url: 'ajax/fetch-attendance-sheet.php',
type: "POST",
data: {mrk_dats:mattdence,aply_cles:cls,aply_sectns:strngs,attnd_inst:instutes,aply_sesions:sesn},
success: function(shets){
    $("#attendancesheet").html(shets);
}
    });
}
    });
});
</script>