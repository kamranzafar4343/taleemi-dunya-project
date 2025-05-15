<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#accounts"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Day Book</li>
  </ol>
</nav>
<script>
$(document).ready(function(){
function dailyAccounts(){
    
    var acInstId = $("#acinstid").val();
    var instName = $("#instname").val();
    var logas = $("#logs").val();
    var ruls = $("#rul").val();
    var comps = $("#cmps").val();
    $.ajax({
        url: 'ajax/ajax-account-daily-report.php',
        type: "POST",
        data:{ac_inst_id:acInstId,inst_name:instName,logap:logas,rols:ruls,cmps_nme:comps},
        success: function(resultmngr){
            $("#daily-collection-list").html(resultmngr);
        }
    });
    }
dailyAccounts();
});
</script>

<!-- Modal -->
<div class="modal fade" id="ac-type" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ac-type" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ac-type">Add Account Type</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form id="frmtype">
    <div class="row">
        <div class="col mb-3">
            <label class="text-capitalize">Type Name</label>
<div class="input-group">
    <input type="hidden" id="schlid"  value="<?php echo $userId; ?>" class="form-control">
    <input type="hidden" id="colid"  value="<?php echo $userId; ?>">
    <input type="hidden" id="colids"  value="<?php echo $userId; ?>">
    <input type="text" id="txttype" class="form-control">
    <button id="btntype" type="submit" class="btn btn-apna text-uppercase"><i class="fa-solid fa-plus"></i> add</button>
</div>
        </div>
    </div>
</form>
<div id="acctype-mngr"></div>
      </div>
<script>
$(document).ready(function(){
function loadAccountmangr(){
    
    var clgIds = $("#colids").val();
    $.ajax({
        url: 'ajax/ajax-account-type-manager.php',
        type: "POST",
        data:{instut_ids:clgIds},
        success: function(result){
            $("#acctype-mngr").html(result);
        }
    });
}
loadAccountmangr();
function loadAccounts(){
    
    var clgId = $("#colid").val();
    $.ajax({
        url: 'ajax/ajax-account-type-fetch.php',
        type: "POST",
        data:{instut_id:clgId},
        success: function(result){
            $("#select-acnt-data").html(result);
        }
    });
}
    
loadAccounts();
    
    $("#btntype").on('click',function(e){
e.preventDefault();
var schId = $("#schlid").val();
var types = $("#txttype").val();
$.ajax({
    url: 'ajax/add-account-type.php',
    type: "POST",
    data: {sch_id:schId,acc_type:types},
    success:function(typeresult){
        //console.log(typeresult);
if(typeresult == 1){

loadAccounts();
loadAccountmangr();
 $("#frmtype").trigger("reset");
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
  icon: 'success',
  title: 'Account Type successfully Submited!'
})
}else{
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
  icon: 'error',
  title: 'Account Type is not Add!'
})
}
    }
    
});
    });
});
</script>      
    </div>
  </div>
</div>


<div class="container-fluid mt-4">
    <div class="row">
<div class="col-12 mb-3">
    <div class="d-flex">
        <div class="flex-fill">
            <h4 class="text-capitalize fs-4 fw-bold text-white" style="border-bottom:2px dashed white;">daily collection</h4>
        </div>
        <div class="px-3">
<button class="btn btn-success text-uppercase" data-bs-toggle="modal" data-bs-target="#ac-type">
    <i class="fa-solid fa-plus"></i> add account type
</button>
        </div>
    </div>
</div>
    </div>
<form id="actypeForm">
    <div class="row">
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3 mt-4">
            <label class="text-capitalize fs-6">Date</label>
            <input type="date" class="form-control" id="dte">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3 mt-4">
            <label class="text-capitalize fs-6">account type</label>
            <select class="form-select text-capitalize" id="select-acnt-data">
                <option value="" class="text-capitalize">---Select Account Type---</option>
            </select>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3 mt-4">
<label class="text-capitalize fs-6">Narration</label>
<input type="text" class="form-control nretn">
<input type="hidden" value="<?php echo $userId; ?>" id="inst_id">
<input type="hidden" value="<?php echo $role; ?>" id="rls">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3 mt-4">
<label class="text-capitalize fs-6">Income (In)</label>
<input type="text" class="form-control" id="cshin" onkeypress="isInputNumber(event)">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3 mt-4">
<label class="text-capitalize fs-6">Expense (Out)</label>
<input type="text" class="form-control" id="cshout" onkeypress="isInputNumber(event)">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mt-5">
<button id="btn-recrd" type="submit" class="btn btn-apna text-uppercase"> <i class="fa-regular fa-square-check"></i> submit</button>
        </div>
    </div>
</form>
<script>
$(document).ready(function(){
    $("#btn-recrd").on('click',function(e){
e.preventDefault();
var selectAcntData = $("#select-acnt-data").val();
var nretnSuit = $(".nretn").val();
var dteTpe = $("#dte").val();
var instId = $("#inst_id").val();
var cshIn = $("#cshin").val();
var cshOut = $("#cshout").val();
var rolOut = $("#rls").val();

if(cshIn == "" && cshOut == ""){
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 5000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'info',
  title: 'Your Income or Expense Fields Empty! Please Fill the one Field.'
})
}else{
$.ajax({
    url:'ajax/account-type-insert-record.php',
    type:"POST",
    data:{select_acnt_data:selectAcntData,nretn_suit:nretnSuit,dte_tpe:dteTpe,inst_id:instId,csh_in:cshIn,csh_out:cshOut,rols_ot:rolOut},
    success:function(acdata){
if(acdata == 1){
$("#actypeForm").trigger("reset");
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 5000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Day Book Enter Successfully Submited!'
})  
window.location.reload();
}else{
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 5000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: 'Day Book Entry is not Submited!'
})    
}
    }
});
}

    });
});
</script> 
<input type="hidden" id="acinstid"  value="<?php echo $userId; ?>">
<input type="hidden" id="instname"  value="<?php echo $instituteName; ?>">
<input type="hidden" id="logs"  value="<?php echo $image; ?>">
<input type="hidden" id="rul"  value="<?php echo $role; ?>">
<input type="hidden" id="cmps"  value="<?php echo $campus; ?>">
<div class="row">
    <div class="col mb-3 datas">
<div id="daily-collection-list"></div>
    </div>
</div>
<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-apna' id="btn_print"><i class="fa fa-print"></i> Print</button>
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