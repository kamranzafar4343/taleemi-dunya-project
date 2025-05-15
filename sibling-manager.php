<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Sibling Manager</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <form id="clasFrm">
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
        <label class="text-capitalize fs-6">Father CNIC</label>
        <input type="text" class="form-control fcnc" id="instutes" placholder="xxxxx-xxxxxxx-x">
        <input type="hidden" value="<?php echo $userId; ?>" class="instid">
    </div>
    
<script>
 $(document).ready(function(){
    $("#classstudents").DataTable({
        columnDefs: [{
            "defaultContent": "-",
            "targets": "_all"
        }],
        bLengthChange: true,
        lengthMenu: [[10, 50, 100, -1], [10, 50, 100, "All"]],
        bFilter: true,
        bSort: true,
        bPaginate: true
    });
});
</script>
    
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mt-4">
        <div class="d-grid">
            <button id="btngenclas" type="submit" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> Generate</button>
        </div>
    </div>    
</div>
    </form>
<script type="text/javascript">
$(document).ready(function(){
    $("#btngenclas").on('click',function(e){
        e.preventDefault();
var fcnc = $(".fcnc").val();
var instid = $(".instid").val();
if(fcnc == ""){
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
  title: 'Please Enter Father CNIC!'
})
}else{

    $.ajax({
url: 'ajax/fetch-sibling-list.php',
type: "POST",
data: {fthr_cnic:fcnc,inst_ides:instid},
success: function(sblngs){
//alert(sblngs);
$(".class-wise-table-record").html(sblngs);
}
    });
 
}

    });
});
</script>
<br>
<div class="class-wise-table-record"></div>
<div class="row">
    <div class="col-12" align="right">
      <button class='btn btn-apna text-capitalize' id='btn_print'><i class='fa fa-print'></i> Print</button>  
    </div>
</div>
<script>
    $("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>
</div>
<?php require_once("source/foot-section.php"); ?>