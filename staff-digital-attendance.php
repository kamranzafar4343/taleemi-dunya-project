<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<!-- JavaScript files-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
window.onload = function(){ live_search.focus() }


/// Live Serach
$(document).ready(function(){
        $("#live_search").on("keyup",function(){
            var inputs = $(this).val();
            // alert(input);
if(inputs != ""){
    $.ajax({
        url:"staff-live-search.php",
        method:"POST",
        data:{input_vlue:inputs},
        
        success:function(datas){
            $("#search-result").html(datas);
            $("#addForm").trigger("reset");
        }
    });
}else{
    $("#search-result").css("display","none");
}
        });
    });
</script>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#attendance"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"> <i class="fas fa-home"></i> home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> staff digital attendance</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="container-fluid">
  
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
            <div class="card mb-3 p-5 bg-apna">
<form id="addForm">  
    <input type="text" class="form-control" name="" autocomplete="off" required id="live_search" onkeypress="isInputNumber(event)">
</form>
<h4 class="fs-4 fw-bold text-uppercase text-center py-3">paste your card on device</h4>
<br><br>
<h4 class="fs-4 text-center"><?php echo date("F,j-m-Y"); ?></h4>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-9 col-xxl-9">
<div id="search-result"></div>
        </div>
    </div>

</div>
<?php require_once("source/foot-section.php"); ?>