<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#accounts"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> profit & loss</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
<form id="prftForm">
    <div class="row">
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
    <label class="text-capitalize">month</label>
    <select class="form-select text-capitalize mnth">
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
<input type="hidden" value="<?php echo $userId; ?>" class="colegid">
<input type="hidden" value="<?php echo $instituteName; ?>" class="instnme">
<input type="hidden" value="<?php echo $campus; ?>" class="cmps">
<input type="hidden" value="<?php echo $cell; ?>" class="phnecels">
<input type="hidden" value="<?php echo $image; ?>" class="lgos">
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
    <label class="text-capitalize fs-6">session</label>
    <select class="form-select sesin">
<?php
$sl_sesn = mysqli_query($con,"select * from addSession where institute_id='$userId'");
if(mysqli_num_rows($sl_sesn)>0){
while($seison = mysqli_fetch_array($sl_sesn)){
$session = $seison['session'];
echo "<option>$session</option>";
    }
}else{ echo "<option class='text-capitalize'>there are no session.</option>"; }
?>
    </select>
    
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 mt-4">
    <button type="submit" class="btn btn-apna text-capitalize gentbtn"><i class="fa-solid fa-rotate"></i> generate</button>
</div>
    </div>
</form>
<script>
$(document).ready(function(){
    $(".gentbtn").on('click',function(e){
e.preventDefault();
var mths = $(".mnth").val();
var schlids = $(".colegid").val();
var sesns = $(".sesin").val();
var intNme = $(".instnme").val();
var cmpas = $(".cmps").val();
var phnCels = $(".phnecels").val();
var imges = $(".lgos").val();

$.ajax({
    url: 'ajax/search-profit-and-loss.php',
    type: "POST",
    data: {math:mths,sch_id:schlids,sesn:sesns,ints_nme:intNme,cps:cmpas,phn_cls:phnCels,logs:imges},
    success: function(resets){
$("#proft-lost").html(resets);
    }
});

    });
});
</script>
<div id="proft-lost"></div>
    </div>
<?php require_once("source/foot-section.php"); ?>