<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#attendance-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> individual Student report</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <form class="formCntrl">
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">Roll#</label>
        <input class="form-control stfids" type="text" placeholder="00">    
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">Session</label>
        <input type="hidden" value="<?php echo $userId; ?>" id="instutes">
<select id="stsesins" class="form-select text-capitalize">
<?php
$cls_mnger = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
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
        <select class="form-select text-capitalize" id="mnths">
            <option value="<?php echo date("m"); ?>"><?php echo date("F"); ?></option>
            <option value="01">Jan</option>
            <option value="02">Feb</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">Jun</option>
            <option value="07">July</option>
            <option value="08">Aug</option>
            <option value="09">Sep</option>
            <option value="10">Oct</option>
            <option value="11">Nov</option>
            <option value="12">Dec</option>
        </select>
    </div>
    
    
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <div class="d-grid mt-4">
            <button id="btngent" type="submit" class="btn btn-apna text-uppercase">
<i class="fas fa-redo"></i> Generate
            </button>
        </div>
    </div>    
</div>
    </form>
<br><br>
<div class="staf-monthly-report datas"></div>
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
<script>
$(document).ready(function(){
    $("#btngent").on('click',function(e){
e.preventDefault();
var sesins = $("#stsesins").val();
var instutes = $("#instutes").val();
var mnths = $("#mnths").val();
var stfids = $(".stfids").val();

if(stfids == ""){
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
  title: "Please Enter Roll#!",
    }); 
}else{
$.ajax({
    url: 'ajax/student-individual-attendance-report.php',
    type: "POST",
    data: {aply_sesion:sesins,aply_instute:instutes,aply_mnths:mnths,aply_rollno:stfids},
    success: function(monthatednstaf){
 $(".staf-monthly-report").html(monthatednstaf);
//alert(monthatednstaf);
    }
});    
}

    });
});
</script>