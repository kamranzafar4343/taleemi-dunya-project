<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#stock"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='stock-payable'">payables</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">Monthly payable Record</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
    <label class="text-capitalize">select month</label>
    <select class="form-select text-capitalize" id="mnths">
        <option class="text-capitalize" value="">---select month---</option>
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
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
    <label class="text-capitalize">select session</label>
    <select class="text-capitalize form-select" id="yers">
        <option class="text-capitalize" value="">---select session---</option>
<?php
$sl_sesn = mysqli_query($con,"select * from addSession where institute_id = '$userId' order by id desc");
if(mysqli_num_rows($sl_sesn)>0){
while($sesin = mysqli_fetch_array($sl_sesn)){
        $session  = $sesin['session'];
        
echo "<option>".$session."</option>";
    }
}else{ echo "<option class='text-capitalize' value=''>---Please Create Your Session!</option>"; }
?>
    </select>
    <input type="hidden" value="<?php echo $userId; ?>" id="insid">
    <input type="hidden" value="<?php echo $instituteName; ?>" id="instnme">
    <input type="hidden" value="<?php echo $campus; ?>" id="inscmps">
    <input type="hidden" value="<?php echo $image; ?>" id="inslog">
</div>

    </div>
<div id="gen-monthly-report" class="datas"></div>
<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
    </div>
</div>
</div>

<script>
$(document).ready(function(){
    $("#yers").on('change',function(){
var yr = this.value;
var manth = $("#mnths").val();
var instId = $("#insid").val();
var intNme = $("#instnme").val();
var instCmps = $("#inscmps").val();
var instLogo = $("#inslog").val();
if(yr == ""){
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
  title: 'Please Select Session!'
})
}else if(manth == ""){
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
  title: 'Please Select Month!'
})
}else{
    $.ajax({
url: 'ajax/generate-payable-monthly-report.php',
type: "POST",
data: {yer:yr,mnth:manth,inst_ids:instId,int_nmes:intNme,insti_camps:instCmps,inst_logos:instLogo},
success: function(datas){
    $("#gen-monthly-report").html(datas);
//console.log(datas);
}
    });
}
    });
});


$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>
<?php require_once("source/foot-section.php"); ?>