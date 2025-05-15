<?php 
require_once("../functions/db.php");

$vend_nmes = $_POST['vend_nmes'];
$inst_code = $_POST['inst_code'];
$sl_vnfr = mysqli_query($con,"select * from addStock where vendor_id='$vend_nmes' && instituteId='$inst_code'");
while($relts = mysqli_fetch_array($sl_vnfr)){
$names = $relts['name'];
$total_price += $relts['total_price'];
 } 
 ?>
<form id="methd">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">Vendor Name</label>
            <input type="text" class="form-control text-capitalize" value="<?php echo $names; ?>" id="vndrNme">
            <input type="hidden" value="<?php echo $vend_nmes; ?>" id="vdnid">
            <input type="hidden" value="<?php echo $inst_code; ?>" id="instcde">
        </div>
            <input type="hidden" class="form-control" value="<?php echo $total_price; ?>" onkeypress="isInputNumber(event)" id="tamnt">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">Pay Amount</label>
            <input type="text" class="form-control ides" onkeypress="isInputNumber(event)" id="recevd"  onkeyup="remBalance()" onclick="remBalance()">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">Balance</label>
            <input type="text" class="form-control ids" onkeypress="isInputNumber(event)" id="tBlance">
        </div>
<?php
$sl_pymt = mysqli_query($con,"select * from stockPaidForm where instituteId='$inst_code' && vendId='$vend_nmes'");
while($rst = mysqli_fetch_assoc($sl_pymt)){
$received += $rst['received'];
}
?>
<input type="hidden" class="form-control" onkeypress="isInputNumber(event)" id="tRecve" value="<?php if(!empty($received)){ echo $received; }else{ echo "0"; } ?>">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 mt-4">
            <button type="submit" class="btn btn-apna text-uppercase" id="pdbtn"><i class="fa-solid fa-dollar-sign"></i> paid</button>
        </div>
    </div>
</form>
<script type="text/javascript">
//// one field value write equal to another field 
$(document).ready(function(){
    $(".ides").keyup(function(){
var stp = $(".ides").val();
if(parseInt($(".ids").val()) < parseInt($(".ides").val())){
$('.ides').val("");
}
    });
});

function remBalance(){
var toAmnt = parseInt(document.getElementById("tamnt").value);
var toRev = parseInt(document.getElementById("tRecve").value);
var reming = toAmnt - toRev;
document.getElementById("tBlance").value=reming;
}
$(document).ready(function(){
    $("#pdbtn").on('click',function(e){
e.preventDefault();
var vndNmes = $("#vndrNme").val();
var vdids = $("#vdnid").val();
var intCdes = $("#instcde").val();
var tAmnts = $("#tamnt").val();
var recvd = $("#recevd").val();
var tBlne = $("#tBlance").val();
var tRev = $("#tRecve").val();
if(recvd == ""){
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
  title: 'Please Fee Received!'
}) 
}else{
    $.ajax({
url: 'ajax/ajax-vendor-pay-payments.php',
type: "POST",
data: {vndr_names:vndNmes,vd_ide:vdids,inst_cdes:intCdes,totl_amnts:tAmnts,recvede:recvd,t_blcne:tBlne,totl_rev:tRev},
success: function(results){
if(results == 1){
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
  title: 'Payment Successfully Received!'
}) 
$("#methd").trigger("reset");
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
  title: 'Payment not Received!'
})   
    }
}
    });
}


    });
});
</script>