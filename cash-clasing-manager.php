<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#account-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> cash closing manager</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <form class="cntfld">
    <div class="row">
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <input type="hidden" value="<?php echo $userId; ?>" class="instids">
<label class="fs-6 text-capitalize">Month</label>
<select class="form-select text-capitalize mnths">
    <option class="text-capitalize" value="<?php echo date("m"); ?>"><?php echo date("M"); ?></option>
    <option class="text-capitalize" value="01">jan</option>
    <option class="text-capitalize" value="02">feb</option>
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
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
<label class="fs-6 text-capitalize">session</label>
 <select class="form-select text-capitalize" id="sesins">
<?php
$sel_sesins = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
if(mysqli_num_rows($sel_sesins)>0){
    while($sesin = mysqli_fetch_array($sel_sesins)){
$session = $sesin['session'];
echo "<option>$session</option>"; 
    }
}else{ echo "<option value=''>Session Not Found!</option>"; }
?>
    </select>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
            <label class="fs-6 text-capitalize">Cash Hand Over</label>
            <select class="text-capitalize form-select cshhended">
                <option class="text-capitalize">to owner</option>
                <option class="text-capitalize">to partner</option>
                <option class="text-capitalize">to bank</option>
            </select>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mt-4">
<div class="d-grid">
    <button class="btn btn-apna text-uppercase gntbtn" type="submit">generate</button>
</div>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mt-4">
<div class="d-grid">
      <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
        </div>
    </div>
    </form>
<br>
<?php
$selct_sesins = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
$seins = mysqli_fetch_assoc($selct_sesins);
$session = $seins['session'];
$mnths = date("m"); 

$sel_incmeownr = mysqli_query($con,"select SUM(total_income) as totlincmeownr from closingBalance where instituteId='$userId' && month='$mnths' && session='$session' && handed_cash='to owner'");
while($tolclctownr = mysqli_fetch_array($sel_incmeownr)){
    $totlincmeownr = $tolclctownr['totlincmeownr'];
}
$sel_incmeprtnr = mysqli_query($con,"select SUM(total_income) as totlincmeprtnr from closingBalance where instituteId='$userId' && month='$mnths' && session='$session' && handed_cash='to partner'");
while($tolclctprtnr = mysqli_fetch_array($sel_incmeprtnr)){
    $totlincmeprtnr = $tolclctprtnr['totlincmeprtnr'];
}
$sel_incmebnk = mysqli_query($con,"select SUM(total_income) as totlincmebnk from closingBalance where instituteId='$userId' && month='$mnths' && session='$session' && handed_cash='to bank'");
while($tolclctbnk = mysqli_fetch_array($sel_incmebnk)){
    $totlincmebnk = $tolclctbnk['totlincmebnk'];
}
$sel_incme = mysqli_query($con,"select SUM(total_income) as totlincme from closingBalance where instituteId='$userId' && month='$mnths' && session='$session'");
while($tolclct = mysqli_fetch_array($sel_incme)){
    $totlincme = $tolclct['totlincme'];
}
?>
    <div class="row">
<h4 class="fs-4 text-capitalize fw-bolder mb-3 text-white">cash closing income detail</h4>
        <div class="col mb-3">
            <div class="card p-3" style="background-color:hsl(35,100%,80%);">
    <h5 class="text-uppercase fs-5 fw-bolder text-center">To Owner</h5>
    <h6 class="text-center"><?php if(!empty($totlincmeownr)){ echo $totlincmeownr; }else{ echo "0"; } ?></h6>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card p-3" style="background-color:hsl(35,100%,70%);">
    <h5 class="text-uppercase fs-5 fw-bolder text-center">To partner</h5>
    <h6 class="text-center"><?php if(!empty($totlincmeprtnr)){ echo $totlincmeprtnr; }else{ echo "0"; } ?></h6>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card p-3" style="background-color:hsl(35,100%,60%);">
    <h5 class="text-uppercase fs-5 fw-bolder text-center">To bank</h5>
    <h6 class="text-center"><?php if(!empty($totlincmebnk)){ echo $totlincmebnk; }else{ echo "0"; } ?></h6>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card p-3" style="background-color:hsl(35,100%,50%);">
    <h5 class="text-uppercase fs-5 fw-bolder text-center">Total collection</h5>
    <h6 class="text-center"><?php echo $totlincme; ?></h6>
            </div>
        </div>
    </div>
<?php
$sel_expeownr = mysqli_query($con,"select SUM(total_expense) as totlexpnseownr from closingBalance where instituteId='$userId' && month='$mnths' && session='$session' && handed_cash='to owner'");
while($toexpownr = mysqli_fetch_array($sel_expeownr)){
    $totlexpnseownr = $toexpownr['totlexpnseownr'];
}
$sel_expenprtnr = mysqli_query($con,"select SUM(total_expense) as totlexpnsprtnr from closingBalance where instituteId='$userId' && month='$mnths' && session='$session' && handed_cash='to partner'");
while($toexpprntr = mysqli_fetch_array($sel_expenprtnr)){
    $totlexpnsprtnr = $toexpprntr['totlexpnsprtnr'];
}
$sel_expensbnk = mysqli_query($con,"select SUM(total_expense) as totlexpnsebnk from closingBalance where instituteId='$userId' && month='$mnths' && session='$session' && handed_cash='to bank'");
while($toexpbnk = mysqli_fetch_array($sel_expensbnk)){
    $totlexpnsebnk = $toexpbnk['totlexpnsebnk'];
}
$sel_expens = mysqli_query($con,"select SUM(total_expense) as totlexpnse from closingBalance where instituteId='$userId' && month='$mnths' && session='$session'");
while($toexp = mysqli_fetch_array($sel_expens)){
    $totlexpnse = $toexp['totlexpnse'];
}
?>
    <div class="row">
<h4 class="fs-4 text-capitalize fw-bolder mb-3 text-white">cash closing expense detail</h4>
        <div class="col mb-3">
            <div class="card p-3" style="background-color:hsl(25,100%,50%);">
    <h5 class="text-uppercase fs-5 fw-bolder text-center">To Owner</h5>
    <h6 class="text-center"><?php if(!empty($totlexpnseownr)){ echo $totlexpnseownr; }else{ echo "0"; } ?></h6>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card p-3" style="background-color:hsl(25,100%,60%);">
    <h5 class="text-uppercase fs-5 fw-bolder text-center">To partner</h5>
    <h6 class="text-center"><?php if(!empty($totlexpnsprtnr)){ echo $totlexpnsprtnr; }else{ echo "0"; } ?></h6>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card p-3" style="background-color:hsl(25,100%,70%);">
    <h5 class="text-uppercase fs-5 fw-bolder text-center">To bank</h5>
    <h6 class="text-center"><?php if(!empty($totlexpnsebnk)){ echo $totlexpnsebnk; }else{ echo "0"; } ?></h6>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card p-3" style="background-color:hsl(25,100%,80%);">
    <h5 class="text-uppercase fs-5 fw-bolder text-center">Total Expenses</h5>
    <h6 class="text-center"><?php if(!empty($totlexpnse)){ echo $totlexpnse; }else{ echo "0"; } ?></h6>
            </div>
        </div>
    </div>
<div class="view-cash-clsing-report datas"></div>
</div>
<?php require_once("source/foot-section.php"); ?>
<script>
$(document).ready(function(){
    $(".gntbtn").on('click',function(e){
e.preventDefault();
var instids = $(".instids").val();
var mnths = $(".mnths").val();
var sesins = $("#sesins").val();
var cshhended = $(".cshhended").val();

$.ajax({
    url: 'ajax/fetch-cash-closing-record-by-hand-over.php',
    type: "POST",
    data: {inst_ids:instids,aply_mnths:mnths,aply_sesins:sesins,aply_hand:cshhended},
    success: function(albrt){ $(".view-cash-clsing-report").html(albrt); }
});
    });
    
$("#btn_print").click(function(e){
e.preventDefault();
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
    
});
</script>