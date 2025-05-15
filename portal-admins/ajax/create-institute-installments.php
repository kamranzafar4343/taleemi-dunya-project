<?php
require_once("../functions/db.php");

$institute_ids = $_POST['institute_ids'];
$aply_instlmnt = $_POST['aply_instlmnt'];

$sel_inst = mysqli_query($con,"select * from confirmSchools where institute_id='$institute_ids'");
$ressult = mysqli_fetch_assoc($sel_inst);
$institute_id = $ressult['institute_id'];
$joining_date = $ressult['joining_date'];
$de_activation_date = $ressult['de_activation_date'];
$account_type = $ressult['account_type'];
$strength = $ressult['strength'];
$plan = $ressult['plan'];
$institute_name = $ressult['institute_name'];
$campus = $ressult['campus'];
$type = $ressult['type'];
$owner_name = $ressult['owner_name'];
$e_mail = $ressult['e_mail'];
$cell = $ressult['cell'];
$logo = $ressult['logo'];
$password = $ressult['password'];
$decieded_payment = $ressult['decieded_payment'];
?>
<form>
<div class="row">
    <input type="hidden" class="instids" value="<?php echo $institute_id; ?>">
    <input type="hidden" class="jongdte" value="<?php echo $joining_date; ?>">
    <input type="hidden" class="exprydate" value="<?php echo $de_activation_date; ?>">
    <input type="hidden" class="acntype" value="<?php echo $account_type; ?>">
    <input type="hidden" class="strenght" value="<?php echo $strength; ?>">
    <input type="hidden" class="plen" value="<?php echo $plan; ?>">
    <input type="hidden" class="instnme" value="<?php echo $institute_name; ?>">
    <input type="hidden" class="cmps" value="<?php echo $campus; ?>">
    <input type="hidden" class="typs" value="<?php echo $type; ?>">
    <input type="hidden" class="ownrnme" value="<?php echo $owner_name; ?>">
    <input type="hidden" class="emils" value="<?php echo $e_mail; ?>">
    <input type="hidden" class="phnes" value="<?php echo $cell; ?>">
    <input type="hidden" class="imgs" value="<?php echo $logo; ?>">
    <input type="hidden" class="paswrd" value="<?php echo $password; ?>">
    <input type="hidden" class="decidedamnt" value="<?php echo $decieded_payment; ?>">
    <div class="col mb-3">
<div class="card p-3" style="background-color:hsl(0,0%,70%);">
    <div class="text-center fs-6 fw-bolder text-uppercase">Institute Name</div>
    <div class="text-center text-capitalize" style="font-size:0.9rem;"><?php echo $institute_name; ?></div>
</div>
    </div>
    <div class="col mb-3">
<div class="card p-3" style="background-color:hsl(0,0%,75%);">
    <div class="text-center fs-6 fw-bolder text-uppercase">Joining Date</div>
    <div class="text-center text-capitalize" style="font-size:0.9rem;"><?php echo $joining_date; ?></div>
</div>
    </div>
    <div class="col mb-3">
<div class="card p-3" style="background-color:hsl(0,0%,80%);">
    <div class="text-center fs-6 fw-bolder text-uppercase">Decided Payment</div>
    <div class="text-center" style="font-size:0.9rem;"><?php echo $decieded_payment; ?></div>
</div>
    </div>
    <div class="col mb-3">
<div class="card p-3" style="background-color:hsl(0,0%,85%);">
    <div class="text-center fs-6 fw-bolder text-uppercase">Plan</div>
    <div class="text-center text-capitalize" style="font-size:0.9rem;"><?php echo $plan; ?></div>
</div>
    </div>
    <div class="col-12 mb-3">
<table class="table table-responsive table-striped table-bordered w-100">
    <tr>
        <th>#</th>
        <th>Month</th>
        <th>Expiry Date</th>
        <th>Installment Amount</th>
    </tr>
<?php
$sel_instits = mysqli_query($con,"select * from confirmSchools where institute_id='$institute_ids'");
$amnts = mysqli_fetch_assoc($sel_instits);
    $decieded_payment = $amnts['decieded_payment'];
    $fnalamnt = round($decieded_payment/$aply_instlmnt);
    
for($i=1;$i<=$aply_instlmnt;$i++){
?>
    <tr>
        <td><?php echo $i; ?></td>
        <td>
<select class="text-capitalize form-select dd1">
    <option class="text-capitalize" value="<?php echo date("m"); ?>"><?php echo date("M"); ?></option>
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
        </td>
        <td>
<input type="date" class="form-control" name="exprydtes[]">
        </td>
        <td>
<input type="text" class="form-control" name="instlamnt[]" value="<?php echo $fnalamnt; ?>">
        </td>
    </tr>
<?php 
    }
?>
<tr align="right">
    <td colspan="4">
        <button class="btn btn-primary text-capitalize cretebtn" type="submit">create</button>
    </td>
</tr>
</table>
    </div>
</div>
</form>
<script>
$(document).ready(function(){
    $(".cretebtn").on('click',function(e){
e.preventDefault();

var instids = $(".instids").val();
var jongdte = $(".jongdte").val();
var exprydate = $(".exprydate").val();
var acntype = $(".acntype").val();
var strenght = $(".strenght").val();
var plen = $(".plen").val();
var instnme = $(".instnme").val();
var cmps = $(".cmps").val();
var typs = $(".typs").val();
var ownrnme = $(".ownrnme").val();
var emils = $(".emils").val();
var phnes = $(".phnes").val();
var imgs = $(".imgs").val();
var paswrd = $(".paswrd").val();
var decidedamnt = $(".decidedamnt").val();

var dd1 = [];
 $('select.dd1').each(function(){
     dd1.push(this.value);
 });
var exprydtes = [];
 $('input[name="exprydtes[]"]').each(function(){
     exprydtes.push(this.value);
 });
 var instlamnt = [];
 $('input[name="instlamnt[]"]').each(function(){
     instlamnt.push(this.value);
 });

if(exprydate == ""){
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
  title: "Please Update De-activaton Date!"
    });
}else{
$.ajax({
    url: 'ajax/create-installments.php',
    type: "POST",
    data: {institu_id:instids,joiing_dates:jongdte,expry_dtes:exprydate,acount_types:acntype,tadaad:strenght,mansooba:plen,schol_name:instnme,khana:cmps,qisam:typs,malikkanam:ownrnme,usrnme:emils,rabta:phnes,tasveer:imgs,tala:paswrd,kul_raqam:decidedamnt,mnth_name:dd1,expy_date:exprydtes,mahana_raqam:instlamnt},
    success: function(murder){
if(murder == 1){
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
  title: "Installment Successfully Create!"
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
  title: "Installment is not Created!"
}); 
}
    }
});    
}




    });
    
});
</script>