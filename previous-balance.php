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
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Previous Balance</li>
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
<button type="submit" class="btn btn-success text-uppercase" data-bs-toggle="modal" data-bs-target="#adcsv">
    <i class="fas fa-plus"></i> Add CSV
</button>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3 mt-4">
<a href="source/previous-balance-add-in-taleemi-portal.xlsx" download class="text-uppercase px-5 py-2 nav-links bg-success text-white"> <i class="fa fa-download"></i> Export Previous Balance</a>
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
url: 'ajax/send-previous-balance.php',
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
<!-- Time Table Modal -->
<div class="modal fade" id="adcsv" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">Add CSV</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
        <label class="text-capitalize fs-6">Attach CSV File</label>
        <input type="file" class="form-control" accept=".csv" name="files">
        <input name="insti_id" class="form-control" type="hidden" value="<?php echo $userId; ?>">
    </div>
    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-4">
        <button type="submit" class="btn btn-apna text-uppercase" name="csv_btn">add csv</button>
    </div>
</div>
          </form>
<?php
if (isset($_POST['csv_btn'])){
    
    if ($_FILES['files']['name']){
        $filename = explode(".",$_FILES['files']['name']);
        if($filename[1]=="csv"){
            $handle = fopen($_FILES['files']['tmp_name'],"r");
            while($data = fgetcsv($handle)){
                
    $famly_id = mysqli_real_escape_string($con,$data[0]);
    $roll_nubr = mysqli_real_escape_string($con,$data[1]);
    $apl_sesion = mysqli_real_escape_string($con,$data[2]);
    $stu_name = mysqli_real_escape_string($con,$data[3]);
    $fther_nme = mysqli_real_escape_string($con,$data[4]);
    $apl_clas = mysqli_real_escape_string($con,$data[5]);
    $apl_sectn = mysqli_real_escape_string($con,$data[6]);
    $monthly_fee = mysqli_real_escape_string($con,$data[7]);
    $remng_balnce = mysqli_real_escape_string($con,$data[8]);
    $month_nme = date("m");
    $chlan_stats = mysqli_real_escape_string($con,$data[9]);
$insti_id = $_POST['insti_id'];
$dats = date("d-m-Y");

 $insert_blnce = mysqli_query($con,"insert into fee_collection(student_imgs,familyId,rollno,session,student_name,father_name,class,section,monthly_fee,previous_balance,discounts,fine,other_charges,total_amount,receive_monthly,remaing_balance,fees_status,month,challan_status,account_type,instituteId,remarks,dates,due_dates,receive_date)values('None','$famly_id','$roll_nubr','$apl_sesion','$stu_name','$fther_nme','$apl_clas','$apl_sectn','$monthly_fee','0','0','0','0','0','0','$remng_balnce','Unpaid','$month_nme','$chlan_stats','balance','$insti_id','previous balance amount','$dats','$dats','$dats')"); 
if($insert_blnce === true){ echo "<script>
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
  title: 'File Successfully Import!'
})
</script>"; }else{ echo "<script>
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
  title: 'CSV is not Import!'
})
</script>"; }


            }
            fclose($handle);
//echo "<script>swal('Good Job!', 'CSV File Successfully Submited!', 'success');</script>";
        }
    }
}
?>
      </div>
      
    </div>
  </div>
</div>