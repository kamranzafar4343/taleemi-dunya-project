<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#chlan-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> student wise installments</li>
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
            <input type="text" id="rols" class="form-control" placeholder="Enter the Roll No." autocomplete="off" onkeypress="isInputNumber(event)" required>
            <input type="hidden" id="instid" class="form-control" value="<?php echo $userId; ?>">
        </div>
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
        <button class="btn btn-apna text-uppercase" type="submit" id="btngentr"><i class="fa-solid fa-arrow-rotate-right"></i> generate</button>
    </div>
</div>
    </div>
            </form>
<script type="text/javascript">
$(document).ready(function(){
    $("#btngentr").on('click',function(e){
e.preventDefault();
var rols = $("#rols").val(); 
var instid = $("#instid").val();
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
url: 'ajax/student-challans-for-installment.php',
type: "POST",
data: {rol_no:rols,ins_id:instid,apl_sesins:seions},
success: function(reslts){
    $(".instalment-form").html(reslts);
            }
    });
}
    });
});
</script>
<div class="row mt-4">
    <div class="col">
<div class="instalment-form"></div>
    </div>
</div>
    
</div>

<?php require_once("source/foot-section.php"); ?>