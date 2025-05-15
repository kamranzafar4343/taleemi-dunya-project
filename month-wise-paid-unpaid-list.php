<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#accounts"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Monthly Paid / Unpaid List</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <form id="frmcolct">
<div class="row">
<input type="hidden" value="<?php echo $userId; ?>" id="instutes">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="fs-6 text-capitalize text-white">session</label>
<select class="form-select" id="sesinp">
<?php
$sl_selsesn = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
while($ses_reslt=mysqli_fetch_array($sl_selsesn)){
?>
    <option><?php echo $ses_reslt['session']; ?></option>
<?php } ?>
</select>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="fs-6 text-capitalize text-white">month</label>
<select class="form-select text-capitalize" id="mnths">
    <option value="<?php echo date("m"); ?>" class="text-capitalize"><?php echo date("M"); ?></option>
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
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize text-white fs-6">status</label>
        <select class="form-select text-capitalize staus">
            <option class="text-capitalize" value="paid">paid</option>
            <option class="text-capitalize" value="Unpaid">Unpaid</option>
        </select>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3 mt-4">
        <div class="d-grid">
            <button class="clasbtn btn btn-apna text-uppercase"> <i class="fa-solid fa-arrow-rotate-right"></i> generate</button>
        </div>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3 mt-4">
        <div class="d-grid">
  <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</div>
    </form>
<script type="text/javascript">
$(document).ready(function(){
    $(".clasbtn").on('click',function(e){
e.preventDefault();
var colctId = $("#instutes").val();
var sesin = $("#sesinp").val();
var mnths = $("#mnths").val();
var staus = $(".staus").val();


$.ajax({
url: 'ajax/fetch-month-wise-paid-unpaid-list.php',
type: "POST",
data: {colg_id:colctId,aply_sesin:sesin,manths:mnths,aply_status:staus},
success: function(dats){
    $(".instcolectn").html(dats);
}
    });

    });
});
</script>
<div class="instcolectn datas"></div>
<div class="row">
    <div class="col">

    </div>
</div>
<script type="text/javascript">
$("#btn_print").click(function(e){
e.preventDefault();
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>
</div>
<?php require_once("source/foot-section.php"); ?>