<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#fee"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Generate Individual challan Samester Wise</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
        <form id="frmst">
    <div class="row">
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 float-left">
    <label class="text-capitalize">roll no.</label>
    <div class="input-group">
        <input type="text" name="rols" class="form-control" placeholder="Enter the Roll No." autocomplete="off" onkeypress="isInputNumber(event)" required>
        <input type="hidden" name="instid" class="form-control" value="<?php echo $userId; ?>">
    </div>
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 float-left">
        <label class="text-capitalize">installment</label>
        <select class="form-select text-capitalize intalmt">
<?php for($i=1;$i<=50;$i++){
 echo '<option class="text-capitalize" value="'.$i.'">'.$i.' installment</option>';
} ?>
        </select>
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 float-left">
    <label class="text-capitalize">Session</label>
    <select class="form-select seions">
<?php
$sel_sesin = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
if(mysqli_num_rows($sel_sesin)>0){
    while($sesins = mysqli_fetch_array($sel_sesin)){
$session = $sesins['session'];
echo '<option>'.$session.'</option>'; 
    }
}else{ echo '<option>No Session.</option>';}
?>
    </select>
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mt-4">
    <div class="d-grid">
        <button class="btn btn-apna text-uppercase" type="submit" id="btngen"><i class="fa-solid fa-arrow-rotate-right"></i> generate</button>
    </div>
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mt-4">
    <button class="btn btn-success text-capitalize" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class="fa fa-search"></i> find roll#
    </button>
</div>
    </div>
            </form>
<script type="text/javascript">
$(document).ready(function(){
    $("#btngen").on('click',function(e){
e.preventDefault();
var rols = $("input[name='rols']").val(); 
var instid = $("input[name='instid']").val();
var intalmt = $(".intalmt").val();
var seions = $(".seions").val();
if(rols == ""){
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
  title: "Enter Student Roll#!"
});
}else{
$.ajax({
url: 'ajax/fetch-student-record-for-installment.php',
type: "POST",
data: {rol_no:rols,ins_id:instid,instlmnt:intalmt,aply_sesions:seions},
success: function(reslts){
$(".instalment-form").html(reslts);
}
    });
}
    });
});
</script>
<div class="instalment-form datas"></div>
    <div class="row">
        <div class="col">
    <div align='right' class='p-5'>
      <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
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
</div>
<?php require_once("source/foot-section.php"); ?>
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
    var instId = $("input[name='instid']").val();
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