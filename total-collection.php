<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#accounts"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Monthly Total Collection</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<!----fetch-class-wise-total-collection.php------ File Remove in Ajax folder------->
<?php
$sl_selsesn = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc limit 1");
while($ses_reslt=mysqli_fetch_array($sl_selsesn)){
    $session = $ses_reslt['session'];
}
$sl_totlstudnt = mysqli_query($con,"select * from addStudents where instituteId='$userId' && session='$session'");
$counts = mysqli_num_rows($sl_totlstudnt);
$sl_fess = mysqli_query($con,"select SUM(totalFee) as totlmonthfee from addStudents where instituteId='$userId' && session='$session'");
while($fes = mysqli_fetch_array($sl_fess)){
$totlmonthfee = $fes['totlmonthfee'];
    }

?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 mb-3">
            <h4 class="text-white text-uppercase fs-4 fw-bolder">month of <?php echo date("F"); ?> Session <?php echo $session; ?> Total fee status</h4>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-3">
<div class="card py-4" style="background-color:hsl(28,100%,50%);">
    <h5 class="text-uppercase fs-5 fw-bolder text-center">total No. Student</h5>
    <div class="text-center"><?php echo $counts; ?></div>
</div>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-3">
<div class="card py-4" style="background-color:hsl(28,100%,60%);">
    <h5 class="text-uppercase fs-5 fw-bolder text-center">total Fees (<?php echo date("M"); ?>)</h5>
    <div class="text-center"><?php echo $totlmonthfee;  ?></div>
</div>
        </div>
    </div>
<form id="frmcolct">
<div class="row">
<input type="hidden" value="<?php echo $userId; ?>" id="instutes">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="fs-6 text-capitalize text-white">class</label> <span class="text-danger">*</span>
<select class="form-select text-capitalize" id="cls">
    <option value="" class="text-capitalize">---select class---</option>
<?php
$cls_mnger = mysqli_query($con,"select * from addClass where institute_id='$userId'");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $class_name = $clis['class_name'];
?>
    <option class="text-capitalize" value="<?php echo $id; ?>"><?php echo $class_name; ?></option>
<?php } ?>
</select>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="fs-6 text-capitalize text-white">Section</label> <span class="text-danger">*</span>
<select class="form-select text-capitalize" id="strngs"><option value="">---select section---</option></select>
    </div>
<script type="text/javascript">
/// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instutes').value;
//    console.log(class_name);
 
$.ajax({
   url:'ajax/class-strength.php',
   type:"POST",
   data:{ class_title:class_name,institute_code:insti },
   success: function(result){
       $('#strngs').html(result);
      //console.log(result);
   }
    });
});
</script>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="fs-6 text-capitalize text-white">Session</label> <span class="text-danger">*</span>
<select class="form-select sesinss">
<?php
$sl_selsesn = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
while($ses_reslt=mysqli_fetch_array($sl_selsesn)){
?>
    <option><?php echo $ses_reslt['session']; ?></option>
<?php } ?>
</select>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3 mt-4">
        <div class="d-grid">
            <button class="allcolectns btn btn-apna text-uppercase"> <i class="fa-solid fa-arrow-rotate-right"></i> generate</button>
        </div>
    </div>
</div>
    </form>
<div class="row">
    <div class="col-12" align="right">
<button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
    </div>
</div>
    <div class="allinstcolectn datas"></div>
<script type="text/javascript">
$(document).ready(function(){
    $(".allcolectns").on('click',function(e){
e.preventDefault();
var colctId = $("#instutes").val();
var cls = $("#cls").val();
var strngs = $("#strngs").val();
var sesns = $(".sesinss").val();

if(cls == ""){
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
  title: "Please Select Class!"
});
}else if(strngs == ""){
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
  title: "Please Select Section!"
});
}else{
    $.ajax({
url: 'ajax/fetch-monthly-institute-collection.php',
type: "POST",
data: {colg_id:colctId,aply_sesin:sesns,aply_clas:cls,aply_sectin:strngs},
success: function(dats){ $(".allinstcolectn").html(dats); }
    });
}
    });
});


$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>
</div>
<?php require_once("source/foot-section.php"); ?>