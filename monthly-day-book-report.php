<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#account-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">monthly day book report</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <form class="bokfrm">
        <div class="row">
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <lable class="fs-6 text-capitalize text-white">Month</lable>
                <select class="form-select text-capitalize mnths">
                    <option class="text-capitalize" value="<?php echo date("m"); ?>"> <?php echo date("M"); ?></option>
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
                <input type="hidden" class="form-control inst" value="<?php echo $userId; ?>">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <label class="fs-6 text-capitalize text-whtie">session</label>
                <select class="form-select sesions">
<?php
$sl_selsesn = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
while($ses_reslt=mysqli_fetch_array($sl_selsesn)){
?>
    <option><?php echo $ses_reslt['session']; ?></option>
<?php } ?>
                </select>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-4">
<div class="d-grid">
    <button type="submit" class="btn btn-apna text-uppercase gnrte">generate</button>
</div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-4">
<div class="d-grid">
      <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
            </div>
        </div>
    </form>
</div><br>
<div class="monthly-report-day-book"></div>

<?php require_once("source/foot-section.php"); ?>
<script>
$(document).ready(function(){
$("#btn_print").on('click',function(e){
    e.preventDefault();
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});

    $(".gnrte").on('click',function(e){
e.preventDefault();
var mnths = $(".mnths").val();
var sesions = $(".sesions").val();
var inst = $(".inst").val();

$.ajax({
    url: 'ajax/generate-monthly-day-book-report.php',
    type: "POST",
    data: {aply_month:mnths,aply_sesin:sesions,aply_institute:inst},
    success: function(rport){ $(".monthly-report-day-book").html(rport); }
});


    });
});
</script>