<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#accounts"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'">Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='payroll'">payroll</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> staff payroll form</li>
  </ol>
</nav>
<?php
if(isset($_GET['id'])){
    $ide = $_GET['id'];
    $month = $_GET['month'];
    $sesin = $_GET['sesin'];
    $stfid = $_GET['stfid'];
    
$sl_schol = mysqli_query($con,"select * from confirmSchools where institute_id='$userId'");
$schl = mysqli_fetch_assoc($sl_schol);

$institute_id = $schl['institute_id'];
$institute_name = $schl['institute_name'];
$campus = $schl['campus'];
$logo = $schl['logo'];

}
?>
<div class="container-fluid">
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mb-3">
<?php
$sl_pyrl = mysqli_query($con,"select * from addStaff where id='$ide' && instituteId='$institute_id'");
$rest = mysqli_fetch_assoc($sl_pyrl);
$instituteId = $rest['instituteId'];        
$staffId = $rest['staffId'];        
$staffName = $rest['staffName'];        
$fatherName = $rest['fatherName'];        
if(!empty($rest['staffimage'])){ $staffimage = $rest['staffimage']; }else{ $staffimage = "users.jpg";}        
$post = $rest['appliedPost'];        
$staffType = $rest['staffType'];
$session = $rest['session'];
$salary = $rest['salary'];
$prdy = round($salary/30);
$session = $rest['session'];

$sl_at = mysqli_query($con,"select * from staffAttendance where instituteId='$instituteId' && session='$sesin' && staff_id='$stfid' && month='$month' && status='P'");
$cntp = mysqli_num_rows($sl_at);
$sl_att = mysqli_query($con,"select * from staffAttendance where instituteId='$instituteId' && session='$sesin' && staff_id='$stfid' && month='$month' && status='A'");
$cnta = mysqli_num_rows($sl_att);
$sl_atted = mysqli_query($con,"select * from staffAttendance where instituteId='$instituteId' && session='$sesin' && staff_id='$stfid' && month='$month' && status='L'");
$cntl = mysqli_num_rows($sl_atted);
$sl_attedn = mysqli_query($con,"select * from staffAttendance where instituteId='$instituteId' && session='$sesin' && staff_id='$stfid' && month='$month' && status='H'");
$cnth = mysqli_num_rows($sl_attedn);

?>
<form clas="payform">
<div class="row" style="background-color:hsl(0,0%,15%);border:1px solid hsl(36, 100%, 46%);">
    <h4 class="fw-bold text-center text-uppercase py-1 bg-apna">payroll of month "<?php echo date('F', mktime(0, 0, 0, $month, 10)); ?>"</h4>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
        <label class="text-capitalize">Staff ID#</label>
        <input type="text" class="form-control" value="<?php echo $staffId; ?>" name="stfid">
        <input type="hidden" class="form-control" value="<?php echo date("j-m-Y"); ?>" name="py_dte">
        <input type="hidden" class="form-control" value="<?php echo $instituteId; ?>" name="isntids">
        <input type="hidden" class="form-control" value="<?php echo $session; ?>" name="sesn">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Staff Name</label>
        <input type="text" class="form-control" value="<?php echo $staffName; ?>" name="snme">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Staff Type</label>
        <input type="text" class="form-control" value="<?php echo $staffType; ?>" name="stf_tpe">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Post</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="pst" value="<?php echo $post; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Salary</label>
        <input type="text" class="form-control" value="<?php echo $salary; ?>" name="slry">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Presents</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="prest" value="<?php echo $cntp+4; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Absents</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="absnt" value="<?php echo $cnta; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Leave</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="leve" value="<?php echo $cntl; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Half Leave</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="hf_leve" value="<?php echo $cnth; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Per Day Salary</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="pr_dy_slry" value="<?php echo $prdy; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Advance Salary</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" id="adv_slry" name="adv_slry" value="0">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Bonus</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" id="bons" name="bons" value="0">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Net Salary</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="net_slray" id="net_slray" value="<?php echo $cntp*$prdy; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Final Net Salary</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="net_slry" id="net_slry" onload="netSalary()" onclick="netSalary()" onkeyup="netSalary()">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Pay Amount</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" onkeyup="remainingBalance()" onclick="remainingBalance()" id="pay_amnt" name="pay_amnt" value="0">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">remaining payable</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" id="rem_pyable" name="rem_pyable" value="0">
    </div>
<script>
function netSalary(){
var fulSlry = document.getElementById('net_slray').value;
var advance = document.getElementById('adv_slry').value;
var buns = document.getElementById('bons').value;

var fuls = fulSlry - advance;
var dedctSlry = fuls * 1;
var bpns = buns * 1;
var finl = dedctSlry + bpns; 
document.getElementById('net_slry').value=finl;
}
function remainingBalance(){
var nets = document.getElementById('net_slry').value;
var pad = document.getElementById('pay_amnt').value;
var remBlnce = nets - pad;
document.getElementById('rem_pyable').value=remBlnce;
    }
</script>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Month</label>
        <input type="text" class="form-control" value="<?php echo date('F', mktime(0, 0, 0, $month, 10)); ?>">
        <input type="hidden" class="form-control" value="<?php echo $staffimage; ?>" name="stfimg">
        <input type="hidden" class="form-control" value="<?php echo $fatherName; ?>" name="fthrnme">
        <input type="hidden" class="form-control" value="<?php echo $month; ?>" id="strtmonth">
        <input type="hidden" class="form-control" value="<?php echo $month; ?>" name="manth">
        <input type="hidden" class="form-control" value="<?php echo $role; ?>" name="usrrol">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3 mt-4" align="right">
        <button class="btn btn-apna text-uppercase btnslary" type="submit"> <i class="fa-regular fa-circle-check"></i> paid</button>
    </div>
</div>
</form>
    </div>
<script>
$(document).ready(function(){
    $(".btnslary").on('click',function(e){
e.preventDefault();
var snme = $('input[name="snme"]').val();
var stftpe = $('input[name="stf_tpe"]').val();
var pst = $('input[name="pst"]').val();
var stfimg = $('input[name="stfimg"]').val();
var slry = $('input[name="slry"]').val();
var prest = $('input[name="prest"]').val();
var absnt = $('input[name="absnt"]').val();
var leve = $('input[name="leve"]').val();
var hfleve = $('input[name="hf_leve"]').val();
var prdyslry = $('input[name="pr_dy_slry"]').val();
var advslry = $('input[name="adv_slry"]').val();
var bonas = $('input[name="bons"]').val();
var netslray = $('input[name="net_slray"]').val();
var fnetslry = $('input[name="net_slry"]').val();
var monthes = $('#strtmonth').val();
var payamnt = $('input[name="pay_amnt"]').val();
var rempyable = $('input[name="rem_pyable"]').val();
var stfid = $('input[name="stfid"]').val();
var isntids = $('input[name="isntids"]').val();
var sesn = $('input[name="sesn"]').val();
var pydte = $('input[name="py_dte"]').val();
var usrrol = $('input[name="usrrol"]').val();


if(fnetslry == ""){
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
  title: 'Please Click on Final Net Salary Tab!'
})
}else{ 
    $.ajax({
url: 'ajax/staff-salaries-paid.php',
type: "POST",
data: {snmeed:snme,stftpeed:stftpe,psted:pst,stfimged:stfimg,slryed:slry,prested:prest,absnted:absnt,leveed:leve,hfleveed:hfleve,prdyslryed:prdyslry,advslryed:advslry,buns:bonas,netslrayed:netslray,fnetslryed:fnetslry,monthesed:monthes,payamnted:payamnt,rempyableed:rempyable,stfided:stfid,isntidsed:isntids,sesned:sesn,pydteed:pydte,user_role:usrrol},
success: function(datas){ 
if(datas == 11){
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
  icon: 'warning',
  title: 'This Month Salary '+snme+' staff is Already Paid'
})
}else if(datas == 1){
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
  title: snme+' Staff Salary Successfully Paid!'
})
feeHistory();
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
  title: 'Salary is not Paid!'
})
    } 
}
    });
}

    });
});
function feeHistory(){
 var stfNme = $('input[name="snme"]').val();
 var fthrnme = $('input[name="fthrnme"]').val();
 var stfid = $('input[name="stfid"]').val();
 var stfTpe = $('input[name="stf_tpe"]').val();
 var pst = $('input[name="pst"]').val();
 var sesn = $('input[name="sesn"]').val();
 var stfimg = $('input[name="stfimg"]').val();
 var isntids = $('input[name="isntids"]').val();

$.ajax({
    url: 'ajax/fetch-payroll-history.php',
    type: "POST",
    data: {staf_nme:stfNme,f_name:fthrnme,staf_id:stfid,staf_typ:stfTpe,stf_post:pst,stf_sesin:sesn,staf_imgs:stfimg,colg_id:isntids},
    success: function(methods){
$("#stafffeeshistories").html(methods);
//alert(methods);
    }
});

    }
feeHistory();

</script>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mb-3">
<div id="stafffeeshistories"></div>
        </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>
<script>
$(document).ready(function(){
    $("#btnemp").on('click',function(e){
e.preventDefault();
var sesin = $(".sesin").val();
var instids = $("#instids").val();

if(stfid == ""){
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
  title: 'Please Enter Staff ID!'
})
}else{
    $.ajax({
url: 'ajax/fetch-staff-payroll.php',
type: "POST",
data: {inst_sesion:sesin,ins_ids:instids},
success: function(results){
    $(".staff-payrol").html(results);
}
    });
}


    });
});
</script>