<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<script>
    window.onload = function(){ serch_vls.focus() }
</script>
<div class="container-fluid mb-3">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#clection"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> fee collection</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <form class="colctFrm">
    <div class="row">
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fs-6">enter student roll#</label>
    <input type="text" id="serch_vls" class="form-control" required placeholder="Enter Roll No# Search" autocomplete="off">
    <input type="hidden" id="institue" class="form-control" required value="<?php echo $userId; ?>">
    <input type="hidden" id="usrrols" class="form-control" required value="<?php echo $role; ?>">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fs-6">Month</label>
            <select class="text-capitalize form-select mnths">
                <option class="text-capitalize" value="<?php echo date("m"); ?>"><?php echo date("M"); ?></option>
                <option class="text-capitalize" value="01">Jan</option>
                <option class="text-capitalize" value="02">Feb</option>
                <option class="text-capitalize" value="03">Mar</option>
                <option class="text-capitalize" value="04">apr</option>
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
        <label class="text-capitalize">Session</label>
        <select class="form-select text-capitalize sesoins">
<?php
$sel_sesns = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
while($sens = mysqli_fetch_array($sel_sesns)){
$session = $sens['session'];    
?>
    <option><?php echo $session; ?></option>
<?php } ?>
        </select>
    </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3 mt-4">
<button type="submit" id="searchbtn" class="btn btn-apna text-uppercase"><i class="fas fa-search"></i> search</button>
<button class="btn btn-success text-capitalize" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <i class="fa fa-search"></i> find roll#
</button>
        </div>
    </div>
    </form>    
    </div>
<br>
</div>
<div class="paid-form"></div>
<?php require_once("source/foot-section.php"); ?>
<script>
$(document).ready(function(){
    $("#searchbtn").on('click',function(e){
e.preventDefault();

var serch_vls = $("#serch_vls").val();
var institue = $("#institue").val();
var usrrols = $("#usrrols").val();
var mnths = $(".mnths").val();
var sesoins = $(".sesoins").val();

if(serch_vls == ""){
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
  title: 'Please Enter Roll#'
})
}else{
    $.ajax({
url: 'ajax/fetch-monthly-charges-form.php',
type: "POST",
data: {rol_nbr:serch_vls,inst_id:institue,user_role:usrrols,chose_month:mnths,aply_sesins:sesoins},
success: function(datas){
$(".paid-form").html(datas);
}
    });
}


    });
});
</script>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Find Roll#</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form>
    <div class="row">
<div class="col-12">
    <label class="text-capitalize">type student name</label>
    <input class="form-control stnme" type="text" placeholder="Enter Student Name">
</div>
    </div>
</form>
<div class="row mt-4">
    <div class="col">
<div id="searchresult"></div>
    </div>
</div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    $(".stnme").on('keyup',function(e){
    var stuNme = $(this).val();
    var instId = $("#institue").val();
if(stuNme != ""){
        $.ajax({
url: 'ajax/fetch-student-with-rollno.php',
type: "POST",
data: {st_nme:stuNme,int_ids:instId},
success: function(rows){
    $("#searchresult").html(rows);
    $("#searchresult").css('display','block');
}
    });
}else{
    $("#searchresult").css('display','none');
}    
    });
});
</script>