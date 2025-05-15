<?php
require_once("../functions/db.php");

$rol_nbr = $_POST['rol_nbr'];
$inst_id = $_POST['inst_id'];
$user_role = $_POST['user_role'];
$chose_month = $_POST['chose_month'];
$monthName = date('F', mktime(0, 0, 0, $chose_month, 10));
$aply_sesins = $_POST['aply_sesins'];

$sel_fee = mysqli_query($con,"select * from addStudents where roll_num='$rol_nbr' && instituteId='$inst_id' && session='$aply_sesins' order by id desc limit 0,1");
if(mysqli_num_rows($sel_fee)>0){
    while($rows=mysqli_fetch_array($sel_fee)){
$feid = $rows['id'];
$instituteId = $rows['instituteId'];
$student_imgs = $rows['image'];
$familyId = $rows['familyId'];
$rollno = $rows['roll_num'];
$session = $rows['session'];
$student_name = $rows['studentName'];
$father_name = $rows['fatherName'];
$class = $rows['class'];
$section = $rows['section'];
$mode_of_payment = $rows['mode_of_payment'];

$sel_Fe = mysqli_query($con,"select * from fee_collection where instituteId='$instituteId' && rollno='$rollno' && account_type='balance'");
$blcne = mysqli_fetch_assoc($sel_Fe);
$remaing_balance = $blcne['remaing_balance'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-3">
            <div class="row bg-apna" style="border:1px solid hsl(25, 100%, 50%);">
<div class="col-12">
<h6 class="fs-5 text-uppercase py-1 fw-bold text-center"> "<?php echo $student_name; ?>" previous balance <?php echo "(".$monthName.")"; ?></h6>
<form method="post" enctype="multipart/form-data">
<div class="row py-3" style="background-color:hsl(0,0%,15%);">

<input type="hidden" class="stimg" value="<?php if(empty($student_imgs) OR $student_imgs == "None" OR $student_imgs == "none"){ echo "users.jpg"; }else{ echo $student_imgs; }?>">
<input type="hidden" class="fmlyid" value="<?php echo $familyId; ?>">
<input type="hidden" class="rolnos" value="<?php echo $rollno; ?>">
<input type="hidden" class="stnme" value="<?php echo $student_name; ?>">
<input type="hidden" class="fnme" value="<?php echo $father_name; ?>">
<input type="hidden" class="cles" value="<?php echo $class; ?>">
<input type="hidden" class="sectn" value="<?php echo $section; ?>">
<input type="hidden" class="mnthfee" value="0">
<input type="hidden" class="preblnce" value="0">
<input type="hidden" class="dicnt" value="0">
<input type="hidden" class="fines" value="0">
<input type="hidden" class="othrchrges" value="0">
<input type="hidden" class="totlamnt" value="0">
<input type="hidden" class="recveamnt" value="0">
<input type="hidden" class="festats" value="Unpaid">
<input type="hidden" class="mnths" value="<?php echo $chose_month; ?>">
<input type="hidden" class="acntype" value="balance">
<input type="hidden" class="instieds" value="<?php echo $inst_id; ?>">
<input type="hidden" class="rmrks" value="previous balance amount">
<input type="hidden" class="isuedtes" value="<?php echo date("d-m-Y"); ?>">
<input type="hidden" class="duedtes" value="<?php echo date("d-m-Y"); ?>">
<input type="hidden" class="recvedate" value="<?php echo date("d-m-Y"); ?>">
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize fs-6">Session</label>
        <select class="form-select text-capitalize sesins">
<?php
$sel_sesns = mysqli_query($con,"select * from addSession where institute_id='$inst_id' order by id desc");
while($sens = mysqli_fetch_array($sel_sesns)){
$session = $sens['session'];    
?>
    <option><?php echo $session; ?></option>
<?php } ?>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize fs-6">challan status</label>
        <select class="form-select text-capitalize chlnstats">
            <option class="text-capitalize" value="monthly">monthly</option>
            <option class="text-capitalize" value="installment">installment</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize fs-6">remaining balance</label> <span class="text-warning"><?php if(!empty($remaing_balance)){ echo "(".$remaing_balance.")"; }else{ echo "";}?></span>
        <input type="text" class="form-control remblnce" placeholder="00" onkeypress="isInputNumber(event)" autocomplete="off">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3 mt-4">
        <div class="d-grid pag-3">
            <button type="submit" class="btn btn-apna text-uppercase adblncebtn"> <i class="fa-regular fa-square-plus"></i> add balance</button>            
        </div>
    </div>
</div>
</form>
</div>
            </div>
        </div>
        
    </div>
</div>
<?php
    }
}else{ echo "<div class='alert alert-danger text-capitlaize'>there are no record found!</div>"; }
?>
<script>
$(document).ready(function(){
    $(".adblncebtn").on('click',function(e){
e.preventDefault();

var stimg = $(".stimg").val();
var fmlyid = $(".fmlyid").val();
var rolnos = $(".rolnos").val();
var sesins = $(".sesins").val();
var stnme = $(".stnme").val();
var fnme = $(".fnme").val();
var cles = $(".cles").val();
var sectn = $(".sectn").val();
var mnthfee = $(".mnthfee").val();
var preblnce = $(".preblnce").val();
var dicnt = $(".dicnt").val();
var fines = $(".fines").val();
var othrchrges = $(".othrchrges").val();
var totlamnt = $(".totlamnt").val();
var recveamnt = $(".recveamnt").val();
var remblnce = $(".remblnce").val();
var festats = $(".festats").val();
var mnths = $(".mnths").val();
var chlnstats = $(".chlnstats").val();
var acntype = $(".acntype").val();
var instieds = $(".instieds").val();
var rmrks = $(".rmrks").val();
var isuedtes = $(".isuedtes").val();
var duedtes = $(".duedtes").val();
var recvedate = $(".recvedate").val();

if(remblnce == ""){
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
  title: "Please Enter Previous Balance!"
});
}else{
    $.ajax({
url: 'ajax/insert-previous-balance.php',
type: "POST",
data: {stu_img:stimg,famly_id:fmlyid,roll_nubr:rolnos,apl_sesion:sesins,stu_name:stnme,fther_nme:fnme,apl_clas:cles,apl_sectn:sectn,monthly_fee:mnthfee,prev_balnce:preblnce,dicunt:dicnt,apl_fine:fines,othr_chargs:othrchrges,total_amunt:totlamnt,recvd_amnt:recveamnt,remng_balnce:remblnce,fee_stetus:festats,month_nme:mnths,chlan_stats:chlnstats,accnt_type:acntype,institute_ids:instieds,apl_remrks:rmrks,issue_dte:isuedtes,dwe_dte:duedtes,recv_dtes:recvedate},
success: function(blance){ 
if(blance == 11){
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
  icon: "warning",
  title: "This Student Previous Balance Already Added!"
});
}else if(blance == 1){
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
  icon: "success",
  title: "Previous Balance is Successfully Added!"
});
}else{
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
  icon: "error",
  title: "This Student Previous Balance is not Add!"
});
    }
}
    });
}
    });
});
</script>