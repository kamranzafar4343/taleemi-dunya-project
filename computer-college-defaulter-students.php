<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Defaulter Students</li>
  </ol>
</nav>
    </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <form class="dfltr">
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
<label class="fs-6 text-capitalize text-white">session</label> <span class="text-danger">*</span>
<select class="form-select" id="sesins">
<?php
$sl_selsesn = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
while($ses_reslt=mysqli_fetch_array($sl_selsesn)){
?>
    <option><?php echo $ses_reslt['session']; ?></option>
<?php } ?>
</select>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="fs-6 text-capitalize text-white">To Date</label> <span class="text-danger">*</span>
<input type="date" class="form-control endte">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3 mt-4">
<div class="d-grid">
    <button class="btn btn-apna text-uppercase fndbtn" type="submit"><i class="fa fa-search"></i> find</button>
</div>
    </div>
</div>
    </form>
<div class="fntbtns"></div>
<script>
$(document).ready(function(){
    $(".fndbtn").on('click',function(e){
        e.preventDefault();
var instutes = $("#instutes").val();
var cls = $("#cls").val();
var strngs = $("#strngs").val();
var sesins = $("#sesins").val();
var endte = $(".endte").val();

if(cls == ""){
Swal.fire({
  title: "Empty!",
  text: "Please Select Your Class!",
  icon: "warning"
});
}else if(strngs == ""){
Swal.fire({
  title: "Empty!",
  text: "Please Select Your Section!",
  icon: "warning"
}); 
}else if(endte == ""){
Swal.fire({
  title: "Empty!",
  text: "Please Select Date!",
  icon: "warning"
}); 
}else{
    $.ajax({
url: 'ajax/select-defaulter-students.php',
type: "POST",
data: {inst_ids:instutes,apl_clas:cls,apl_sectn:strngs,apl_sesin:sesins,ending_date:endte},
success: function(bolts){ $(".fntbtns").html(bolts); }
    });    
}

    });
});
</script>
    
</div>
<?php require_once("source/foot-section.php"); ?>