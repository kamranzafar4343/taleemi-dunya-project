<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#accounts"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> daily expenses</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<?php
$monhts = date('m');
$yers = date('Y');
$ftchcolectns = mysqli_query($con,"select * from dayBook where institute_id='$userId' && month='$monhts' && session='$yers'");
$no_stdnt = mysqli_num_rows($ftchcolectns);
$sl_colectn = mysqli_query($con,"select SUM(expense) as totlsexpnse from dayBook where institute_id='$userId' && month='$monhts' && session='$yers'");
if(mysqli_num_rows($sl_colectn)>0){
    while($mnth = mysqli_fetch_array($sl_colectn)){
        $totlsexpnse = $mnth['totlsexpnse'];
    }
}else{ echo "Nill"; }
?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-3">
            <a href="#" target="_blank" class="nav-link">
<div class="card py-4" style="background-color:hsl(28,100%,50%);">
    <h5 class="text-uppercase fs-5 fw-bolder text-center">No. of Entries</h5>
    <div class="text-center fw-normal"><?php echo $no_stdnt; ?></div>
</div>
            </a>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-3">
            <a href="total-expense-list" target="_blank" class="nav-link">
<div class="card py-4" style="background-color:hsl(28,100%,60%);">
    <h5 class="text-uppercase fs-5 fw-bolder text-center">total expenses</h5>
    <div class="text-center fw-normal"><?php if(!empty($totlsexpnse)){ echo $totlsexpnse; }else{ echo "0"; } ?></div>
</div>
            </a>
        </div>
    </div>
<form id="frmcolct">
<div class="row">
<input type="hidden" value="<?php echo $userId; ?>" id="instutes">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="fs-6 text-capitalize text-white">Month</label>
        <select class="text-capitalize form-select monthes">
            <option class="text-capitalize" value="<?php echo date("m"); ?>"><?php echo date("M"); ?></option>
            <option class="text-capitalize" value="01">jan</option>
            <option class="text-capitalize" value="02">Feb</option>
            <option class="text-capitalize" value="03">mar</option>
            <option class="text-capitalize" value="04">apr</option>
            <option class="text-capitalize" value="05">may</option>
            <option class="text-capitalize" value="06">jun</option>
            <option class="text-capitalize" value="07">jul</option>
            <option class="text-capitalize" value="08">aug</option>
            <option class="text-capitalize" value="09">sep</option>
            <option class="text-capitalize" value="10">oct</option>
            <option class="text-capitalize" value="11">nov</option>
            <option class="text-capitalize" value="12">dec</option>
        </select>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="fs-6 text-capitalize text-white">session</label>
        <select class="form-select sesins">
<?php
$selct_sesn = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
if(mysqli_num_rows($selct_sesn)>0){
    while($sesin = mysqli_fetch_array($selct_sesn)){
$session = $sesin['session'];
echo "<option>$session</option>";
    }
}else{ echo "<option>No Session</option>"; }
?>
        </select>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3 mt-4">
        <div class="d-grid">
            <button class="allcolectns btn btn-apna text-uppercase"> <i class="fa-solid fa-arrow-rotate-right"></i> generate</button>
        </div>
    </div>
</div>
    </form>
<div class="row">
    <div class="col-12" align="right">
<button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
    </div>
</div>
    <div class="allinstcolectn datas"></div>
<script type="text/javascript">
$(document).ready(function(){
    $(".allcolectns").on('click',function(e){
e.preventDefault();
var colctId = $("#instutes").val();
var monthes = $(".monthes").val();
var sesins = $(".sesins").val();

    $.ajax({
url: 'ajax/fetch-daily-expense.php',
type: "POST",
data: {colg_id:colctId,aply_months:monthes,aply_sesions:sesins},
success: function(dats){
    $(".allinstcolectn").html(dats);
}
    });


    });
});
</script>
<script type="text/javascript">
$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>
</div>
<?php require_once("source/foot-section.php"); ?>