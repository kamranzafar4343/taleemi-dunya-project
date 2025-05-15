<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#fee"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> generate challan class wise monthly</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-9">
<form class="chlnsfrms">
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">class</label>
<select class="form-select text-uppercase" id="cls">
    <option class="text-uppercase" value="">---select class---</option>
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
    <option class="text-uppercase" value="<?php echo $id; ?>"><?php echo $class_name; ?></option>
<?php } ?>
</select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">section</label>
<select class="form-select text-uppercase" id="strngs"><option value=" ">---select section---</option></select>
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
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <input type="hidden" value="<?php echo $userId; ?>" name="inst" id="instutes">
        <label class="text-capitalize">session</label>
<select id="sesn" class="form-select text-capitalize">
<?php
$cls_mnger = mysqli_query($con,"select * from addSession where institute_id='$userId'");
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
        <label class="text-capitalize">month</label>
        <select class="form-select text-capitalize" id="mnt">
            <option class="text-capitalize" value="<?php echo date("m"); ?>"><?php echo date("F"); ?></option>
            <option class="text-capitalize" value="01">jan</option>
            <option class="text-capitalize" value="02">feb</option>
            <option class="text-capitalize" value="03">march</option>
            <option class="text-capitalize" value="04">april</option>
            <option class="text-capitalize" value="05">may</option>
            <option class="text-capitalize" value="06">june</option>
            <option class="text-capitalize" value="07">july</option>
            <option class="text-capitalize" value="08">aug</option>
            <option class="text-capitalize" value="09">sep</option>
            <option class="text-capitalize" value="10">oct</option>
            <option class="text-capitalize" value="11">nov</option>
            <option class="text-capitalize" value="12">dec</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Due Date</label>
        <input type="date" class="form-control duedtes">
    </div>
    
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mt-4">
        <div class="d-grid">
            <button id="btnclasgen" type="submit" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> Generate</button>
        </div>
    </div>    
</div>
    </form><br><br>
<div class="challan-class-wise-monthly"></div>     
<script>
$(document).ready(function(){
    $("#btnclasgen").on('click',function(e){
e.preventDefault();
var cls = $("#cls").val();
var strngs = $("#strngs").val();
var instutes = $("#instutes").val();
var sesn = $("#sesn").val();
var mnt = $("#mnt").val();
var duedtes = $(".duedtes").val();

if(duedtes == ""){
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
  title: 'Please Select Due Date!'
})    
}else if(cls == ""){
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
  title: 'Please Select Class!'
})
}else if(strngs == ""){
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
  title: 'Please Select Section!'
})
}else{
    $.ajax({
url: 'ajax/fetch-generate-challan-class-wise-monthly.php',
type: "POST",
data: {cless:cls,sectn:strngs,inst_id:instutes,sesns:sesn,mnths:mnt,dues_dates:duedtes},
success: function(results){
    $(".challan-class-wise-monthly").html(results);
}
    });
}


    });
});
</script>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
<div class="card bg-apna">
    <div class="card-header"><h5 class="fs-5 fw-bolder text-uppercase">recent activity</h5></div>
    <div class="card-body" style="background-color:hsl(35,100%,80%);height:60rem;overflow:scroll;">
<table class="w-100">
<?php
/*
$sel_clhn = mysqli_query($con,"select * from fee_collection where instituteId='$userId' group by class,section,session,month");
if(mysqli_num_rows($sel_clhn)>0){
    while($results = mysqli_fetch_array($sel_clhn)){
$class = $results['class'];
$section = $results['section'];
$session = $results['session'];
$month = $results['month'];
$monthName = date('F', mktime(0, 0, 0, $month, 10));

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
    <tr align="center" style="background-color:hsl(25,100%,90%);border:2px solid hsl(35,100%,80%);">
        <td class="p-2 text-capitalize"><?php echo $class_name; ?></td>
        <td class="p-2 text-capitalize"><?php echo $section; ?></td>
        <td class="p-2"><?php echo $session; ?></td>
        <td class="p-2 text-capitalize"><?php echo $monthName; ?></td>
        <td class="p-2"><a href="challan-manager" target="_blank"><i class="fa-solid fa-screwdriver-wrench text-success"></i></a></td>
    </tr>
<?php 
    }
}else{ echo "<div>There are no Record Found!</div>"; }
*/
?>
</table>
    </div>
</div>
        </div>
    </div>

</div>

<?php require_once("source/foot-section.php"); ?>