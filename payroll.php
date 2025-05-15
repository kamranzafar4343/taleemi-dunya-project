<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#accounts"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'">Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> payroll</li>
  </ol>
</nav>
<div class="container-fluid">
<form class="stfShetFrm">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
            <label class="text-capitalize">Month</label>
            <select class="text-capitalize form-select mnths">
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
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
    <label class="text-capitalize">Session</label>
    <select class="form-select text-capitlaize sesindsd">
<?php
$sl_ses = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
while($rsl = mysqli_fetch_array($sl_ses)){
    $session = $rsl['session'];
?>
<option><?php echo $session; ?></option>
<?php } ?>
    </select>
        </div>
        <input type="hidden" value="<?php echo $userId; ?>" id="instids">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mt-4">
    <button class="btn btn-apna text-uppercase" type="submit" id="btnemp"><i class="fa fa-search"></i> search</button>
        </div>
    </div>
</form>
<br>
<div class="staff-payrol"></div>
</div>
<?php require_once("source/foot-section.php"); ?>
<script>
$(document).ready(function(){
    $("#btnemp").on('click',function(e){
e.preventDefault();
var mnthes = $(".mnths").val();
var sesin = $(".sesindsd").val();
var instids = $("#instids").val();

if(stfid == ""){
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
  title: 'Please Enter Staff ID!'
})
}else{
    $.ajax({
url: 'ajax/fetch-staff-payroll.php',
type: "POST",
data: {inst_sesion:sesin,ins_ids:instids,manth:mnthes},
success: function(results){
    $(".staff-payrol").html(results);
}
    });
}



/*
if(stfid == ""){
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
  title: 'Please Enter Staff ID!'
})
}else{
    
    $.ajax({
url: 'ajax/fetch-payroll-form.php',
type: "POST",
data: {staffs_id:stfid,inst_mnth:mnts,inst_sesion:sesin,ins_ids:instids},
success: function(results){
    $(".payrolform").html(results);
}
    });
    
}
*/
    });
});
</script>