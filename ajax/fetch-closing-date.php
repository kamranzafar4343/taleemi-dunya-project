<?php
require_once("../functions/db.php");

$asing_role = $_POST['asing_role'];
$clsing_date = $_POST['clsing_date'];
$inst_ids = $_POST['inst_ids'];
$frmt = explode("-",$clsing_date);
$dtes = $frmt['2'];
$mnths = $frmt['1'];
$yers = $frmt['0'];
$clsingdate = $dtes."-".$mnths."-".$yers;

$sel_dybok = mysqli_query($con,"select SUM(income) as totlincme from dayBook where institute_id='$inst_ids' && date='$clsingdate'");
while($incm = mysqli_fetch_array($sel_dybok)){
    $totlincme = $incm['totlincme'];
}
$sel_dybokexp = mysqli_query($con,"select SUM(expense) as totlexpense from dayBook where institute_id='$inst_ids' && date='$clsingdate'");
while($expsn = mysqli_fetch_array($sel_dybokexp)){
    $totlexpense = $expsn['totlexpense'];
}
?>
<div class="row">
    <input type="hidden" value="<?php echo $inst_ids; ?>" id="instds">
    <input type="hidden" value="<?php echo $clsingdate; ?>" class="closdte">
    <input type="hidden" value="<?php echo $asing_role; ?>" id="ruls">
     <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">cash handed over</label>
            <select class="text-capitalize form-select cshhended">
                <option class="text-capitalize">to owner</option>
                <option class="text-capitalize">to partner</option>
                <option class="text-capitalize">to bank</option>
            </select>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">Today Income</label>
            <input type="text" class="form-control tincom" readonly onkeypress="isInputNumber(event)" id="incm" value="<?php if(!empty($totlincme)){ echo $totlincme; }else{ echo "0"; } ?>">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">Today Expense</label>
            <input type="text" class="form-control texpns" readonly onkeypress="isInputNumber(event)" class="<?php if(!empty($totlexpense)){ echo $totlexpense; }else{ echo "0"; } ?>">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">Paid Amount</label>
            <input type="text" class="form-control paiamnt" id="pdamnt" readonly onkeypress="isInputNumber(event)" value="<?php echo $totlincme-$totlexpense; ?>">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">Received</label>
            <input type="text" class="form-control recvd" id="recveamnt" onkeypress="isInputNumber(event)" onkeychange="blnceAmount()" onblur="blnceAmount()" onkeyup="blnceAmount()" onclick="blnceAmount()" value="0">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">balance</label>
            <input type="text" readonly class="form-control blnce" id="blnceamnt" onkeypress="isInputNumber(event)">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">Narration</label>
            <input type="text" class="form-control nartn">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mb-3 mt-4">
<div class="d-grid">
    <button type="submit" class="btn btn-apna text-uppercase cashclosebtn"><i class="fa-regular fa-circle-stop"></i> cash close</button>
</div>
        </div>
</div>
<div class="row">
    <div class="col mb-3 datas">
<div id="daily-collection-list"></div>
    </div>
</div>
<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
    </div>
</div>
<script>
$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});   
$(document).ready(function(){
    function loadHistory(){
var schId = $("#instds").val();
$.ajax({
url: 'ajax/closing-cash_history.php',
type: "POST",
data: {inst_id:schId},
success: function(result){
    $("#daily-collection-list").html(result);
}
});
    }
loadHistory();
});

function blnceAmount(){
    var pdamnt = parseInt(document.getElementById("pdamnt").value);
    var recveamnt = parseInt(document.getElementById("recveamnt").value);
    blcned = pdamnt-recveamnt;
document.getElementById("blnceamnt").value = blcned;     
}
$(document).ready(function(){
     $(".cashclosebtn").on('click',function(e){
e.preventDefault();
var closDate = $(".closdte").val();
var cshHnded = $(".cshhended").val();
var toIncom = $(".tincom").val();
var toExpns = $(".texpns").val();
var paidAmnt = $(".paiamnt").val();
var recvd = $(".recvd").val();
var blnce = $(".blnce").val();
var nartin = $(".nartn").val();
var colgId = $("#instds").val();
var rls = $("#ruls").val();

if(closDate == ""){
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
  title: 'Please Select Date!'
})
}else if(cshHnded == ""){
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
  title: 'Please Select Cash Handed Over!'
})
}else{
    $.ajax({
url: 'ajax/insert-closing-balance.php',
type: "POST",
data: {close_dte:closDate,csh_hand:cshHnded,to_income:toIncom,to_expnse:toExpns,pad_amnt:paidAmnt,nartion:nartin,col_id:colgId,ruls:rls,recv_amnt:recvd,rem_blnce:blnce},
success: function(data){
if(data == 1){
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
  title: 'Cash Close Successfully'
})
loadHistory();
$("#closForm").trigger("reset");
}else if(data == 11){
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
  title: 'Today Closing Cash Already Added!'
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
  title: 'Cash is not Close!'
})      
    }
}
    });
}

    });
});
</script>