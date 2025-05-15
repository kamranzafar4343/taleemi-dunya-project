<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#chlan-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='all-challan-print'">all challan print</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> print monthly challan type-II</li>
  </ol>
</nav>
<div class="container-fluid mt-4">
 <form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">class</label>
<select name="clse" class="form-select text-uppercase" id="cls">
    <option class="text-capitlaize" value="">---select class--</option>
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
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">class</label>
<select name="sectn" class="form-select text-capitalize" id="strngs">
    <option class="text-capitlaize" value="">---select section---</option>
</select>
    </div>
<script>
    /// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instutes').value;
 //   console.log(insti);
$.ajax({
   url:'ajax/class-strength.php',
   type:"POST",
   data:{ class_title:class_name,institute_code:insti },
   success: function(result){
       $('#strngs').html(result);
   }
    });
});
</script>
 <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <input type="hidden" value="<?php echo $userId; ?>" id="instutes">
        <input type="hidden" value="<?php echo $image; ?>" id="logos">
        <input type="hidden" value="<?php echo $instituteName; ?>" id="instnme">
        <input type="hidden" value="<?php echo $bank_account; ?>" id="bnkacnt">
        <label class="text-capitalize">session</label>
<select name="sesn" class="form-select text-capitalize sesn">
<?php
$cls_mnger = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $session = $clis['session'];
?>
    <option class="text-capitalize"><?php echo $session; ?></option>
<?php } ?>
</select>
</div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">month</label>
        <select class="text-capitalize form-select mnth" name="mnth">
    <option class="text-capitalize" value="<?php echo date("m"); ?>"><?php echo date("F"); ?></option>
            <option class="text-capitalize" value="01">jan</option>
            <option class="text-capitalize" value="02">feb</option>
            <option class="text-capitalize" value="03">march</option>
            <option class="text-capitalize" value="04">april</option>
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
    
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mt-4">
        <div class="d-grid">
            <button type="submit" class="btn btn-apna text-uppercase btngent"><i class="fas fa-redo"></i> Generate</button>
        </div>
    </div>    
</div>
    </form>
<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-success text-capitalize' id="btn_print"><i class="fa fa-print"></i> Print all challan</button>
</div>
    </div>
</div>
<div class="type-ii-challan"></div>
<script>
$(document).ready(function(){
    $(".btngent").on('click',function(e){
e.preventDefault();
var cls = $("#cls").val();
var strngs = $("#strngs").val();
var instutes = $("#instutes").val();
var sesn = $(".sesn").val();
var mnth = $(".mnth").val();
var logos = $("#logos").val();
var instnme = $("#instnme").val();
var bnkacnt = $("#bnkacnt").val();

if(cls == ""){
Swal.fire({
  position: "top-end",
  icon: "info",
  title: "Please Select Class",
  showConfirmButton: false,
  timer: 1500
});
}else if(strngs == ""){
Swal.fire({
  position: "top-end",
  icon: "info",
  title: "Please Select Section",
  showConfirmButton: false,
  timer: 1500
});
}else{
    $.ajax({
url: 'ajax/fetch-challan-ii.php',
type: "POST",
data: {aply_cles:cls,aply_sectn:strngs,inst_ids:instutes,aply_sesin:sesn,aply_mnths:mnth,inst_logo:logos,inst_names:instnme,inst_acnt:bnkacnt},
success: function(methds){ 
    $(".type-ii-challan").html(methds);
//    alert(methds);
}

    });
}
    });
});

///// Print Functions
$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script> 
 
 
</div>
<?php echo require_once("source/foot-section.php");?>