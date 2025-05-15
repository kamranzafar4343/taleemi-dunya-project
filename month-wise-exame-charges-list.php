<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#accounts"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> month wise exame charges list </li>
  </ol>
</nav>
<div class="container-fluid mt-4">
    <form class="mnthlyform">
<div class="row">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
<label class="text-capitalize">month</label>
<select class="text-capitalize form-select mnths">
    <option class="text-capitalize" value="01">jan</option>
    <option class="text-capitalize" value="02">feb</option>
    <option class="text-capitalize" value="03">mar</option>
    <option class="text-capitalize" value="04">apr</option>
    <option class="text-capitalize" value="05">may</option>
    <option class="text-capitalize" value="06">jun</option>
    <option class="text-capitalize" value="07">july</option>
    <option class="text-capitalize" value="08">aug</option>
    <option class="text-capitalize" value="09">sep</option>
    <option class="text-capitalize" value="10">oct</option>
    <option class="text-capitalize" value="11">nov</option>
    <option class="text-capitalize" value="12">dec</option>
</select>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
<label class="text-capitalize">session</label>
<input type="hidden" class="instids" value="<?php echo $userId; ?>">
<select class="text-capitalize form-select sesin">
<?php
$sel_sesn = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
while($seins = mysqli_fetch_array($sel_sesn)){
    $session = $seins['session'];
echo '<option class="text-capitalize">'.$session.'</option>';
    }
?>
</select>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3 mt-4">
<button class="btn btn-apna text-capitalize grntbtn"><i class="fa-regular fa-square-check"></i> Generate</button>
    </div>
</div>
    </form>
<div class="fetch-other-charges-list"></div>
</div>
<?php require_once("source/foot-section.php"); ?>
<script>
$(document).ready(function(){
    $(".grntbtn").on('click',function(e){
e.preventDefault();
var mnths = $(".mnths").val();
var sesin = $(".sesin").val();
var instids = $(".instids").val();

$.ajax({
    url: 'ajax/month-wise-exame-charges-list.php',
    type: "POST",
    data: {chrge_months:mnths,chrge_sesion:sesin,institut_ids:instids},
    success:function(othrschres){
$(".fetch-other-charges-list").html(othrschres);
    }
});

    });
});
</script>