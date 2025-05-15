<?php
require_once("../functions/db.php");

$inst_ides = $_POST['inst_ides'];
$aply_month = $_POST['aply_month'];
$chose_manths = "0".$aply_month-1;
$sesion = $_POST['sesion'];

$sel_inst = mysqli_query($con,"select * from institute_collection where instituteId='$inst_ides' && months='$aply_month' && session='$sesion' order by id desc limit 0,1");
if(mysqli_num_rows($sel_inst)>0){
$reslts = mysqli_fetch_assoc($sel_inst);
$feid = $reslts['id'];
$joining_date = $reslts['joining_date'];
$de_activation_date = $reslts['deactive_date'];
$account_type = $reslts['account_type'];
$strength = $reslts['strength'];
$plan = $reslts['plan'];
$institute_name = $reslts['institute_name'];
$campus = $reslts['campus'];
$type = $reslts['type'];
$owner_name = $reslts['owner_name'];
$e_mail = $reslts['emails'];
$phone = $reslts['contact'];
$password = $reslts['password'];
$decieded_payment = $reslts['decieded_amount'];
$months = $reslts['months'];
$monthName = date('F', mktime(0, 0, 0, $months, 10));
$expiry_dates = $reslts['expiry_dates'];
$monthly_amounts = $reslts['monthly_amounts'];
$remaining_amount = $reslts['remaining_amount'];
$receive_amount = $reslts['receive_amount'];
$balance = $reslts['balance'];
$session = $reslts['session'];
$charges_date = $reslts['charges_date'];

?>
<form class="formColct">
<div class="row">
    <div class="col-12">
<h3 class="fs-3 fw-bolder text-uppercase text-center"><?php echo $institute_name; ?></h3>
    </div>
    <div class="col-12">
<h6 class="fs-6 fw-bolder text-uppercase bg-secondary p-2 text-white">user information</h6>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;"> joining Date</label>
        <input class="form-control" type="text" readonly value="<?php echo $joining_date; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;">Expiry Date</label>
        <input class="form-control" type="text" readonly value="<?php echo $de_activation_date; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;">Plan</label>
        <input class="form-control" type="text" readonly value="<?php echo $plan; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;">Package</label>
        <input class="form-control" type="text" readonly value="<?php echo $account_type; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;">Strength</label>
        <input class="form-control" type="text" readonly value="<?php echo $strength; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;">Owner Name</label>
        <input class="form-control" type="text" readonly value="<?php echo $owner_name; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;">Contact#</label>
        <input class="form-control" type="text" readonly value="<?php echo $phone; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;">Username</label>
        <input class="form-control" type="text" readonly value="<?php echo $e_mail; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;">Password</label>
        <input class="form-control" type="text" readonly value="<?php echo $password; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;">Decieded Amount</label>
        <input class="form-control" type="text" readonly value="<?php echo $decieded_payment; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;">Month</label>
        <input class="form-control" type="text" readonly value="<?php echo $monthName; ?>">
    </div>
    <div class="col-12 mb-3">
        <h6 class="text-uppercase bg-secondary text-white p-2 fs-6 fw-bolder">fee collection</h6>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;"> Charge Date</label>
        <input class="form-control chrgedats" type="date" value="<?php echo $charges_date; ?>">
        <input class="feesids" type="hidden" value="<?php echo $feid; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;"> Due Date</label>
        <input class="form-control dusdats" type="date" value="<?php echo $expiry_dates; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;">Installment Amount</label>
        <input class="form-control" readonly id="decid" type="text" onkeypress="isInputNumber(event)" value="<?php echo $monthly_amounts; ?>">
    </div>
<?php
error_reporting (E_ALL ^ E_NOTICE);
$ids='';
$sel_fee = mysqli_query($con,"select balance from institute_collection where instituteId='$inst_ides' && months='$chose_manths' && session='$sesion' order by id desc limit 0,1");
$results = mysqli_fetch_assoc($sel_fee);
$balances = $results['balance'];
?>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;">Remaining Amount</label>
        <input class="form-control" id="reming" type="text" onchange="subtrct()" onkeyup="subtrct()" onclick="subtrct()" onkeypress="isInputNumber(event)" value="<?php if(!empty($balances)){ echo $balances; }else{ echo "0"; } ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;">Receive Payment</label>
        <input class="form-control" id="rcve" type="text" onchange="subtrct()" onkeyup="subtrct()" onclick="subtrct()" onkeypress="isInputNumber(event)" value="<?php echo $receive_amount; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
        <label class="text-capitalize" style="font-size:0.8rem;">Balance</label>
        <input class="form-control" id="blnce" type="text" onkeypress="isInputNumber(event)" value="<?php echo $balance; ?>">
        <input class="form-control" id="instids" type="hidden" onkeypress="isInputNumber(event)" value="<?php echo $institute_id; ?>">
    </div>
    <div class="col-12 mb-3 mt-4" align="right">
        <button class="btn btn-success pdamnt" style="font-size:1rem;"><i class="fa fa-plus"></i> Paid Amount</button>
    </div>
</div>
</form>
<?php
}else{
    echo "<div class='alert alert-danger p-1'>There are no Record Found!</div>";
}
?>
<script>

function subtrct(){
var decided = parseInt(document.getElementById('decid').value);
var reming = parseInt(document.getElementById('reming').value);
var rcved = parseInt(document.getElementById('rcve').value);
var balnce = decided + reming - rcved;
document.getElementById('blnce').value=balnce;
}
$(document).ready(function(){
    $(".pdamnt").on('click',function(e){
e.preventDefault();
var feesids = $(".feesids").val();
var chrgedats = $(".chrgedats").val();
var dusdats = $(".dusdats").val();
var decid = $("#decid").val();
var reming = $("#reming").val();
var rcve = $("#rcve").val();
var blnce = $("#blnce").val();
var instids = $("#instids").val();
var mnths = $(".mnths").val();
    
if(decid == ""){
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
  title: "Please Fill the Decieded Amount!"
});
}else if(rcve == ""){
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
  title: "Please Fill the Received Amount!"
});
}else if(blnce == ""){
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
  title: "Please Fill the Balance Amount!"
});
}else{
    $.ajax({
url: 'ajax/insert-charges-collection.php',
type: "POST",
data: {decid_amnt:decid,recve_amnt:rcve,balnce_amnt:blnce,instit_ids:instids,chge_dtes:chrgedats,rem_amnt:reming,monthlyfee_id:feesids,expry_dating:dusdats},
success: function(mthods){
    if(mthods == 1){
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
  title: "Amount Collect Successfully!"
});
    }else if(mthods == 11){
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
  title: "This Month Amount is Already Collect!"
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
  title: "Amount is not Collect!"
});
    }
}
    });
}
    
    });
});
</script>