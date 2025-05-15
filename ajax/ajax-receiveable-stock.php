<?php
require_once("../functions/db.php");

$vnr_id = $_POST['vnr_id'];
$schl_id = $_POST['schl_id'];

$sl_recv = mysqli_query($con,"select * from dispatchStock where vendor_id='$vnr_id' && instituteId='$schl_id'");
if(mysqli_num_rows($sl_recv)>0){
    while($result = mysqli_fetch_array($sl_recv)){
$receiver_name = $result['receiver_name'];
$total_price += $result['total_price'];
    }
?>
<form id="frmRecv">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">Receiver Name</label>
            <input type="text" class="form-control text-capitalize" value="<?php echo $receiver_name; ?>" id="recvname">
            <input type="hidden" value="<?php echo $vnr_id; ?>" id="vnid">
            <input type="hidden" value="<?php echo $schl_id; ?>" id="inid">
        </div>
            <input type="hidden" class="form-control" value="<?php echo $total_price; ?>" id="totlamnt" onkeypress="isInputNumber(event)" autocomplete="off">

<?php
$sl_rec = mysqli_query($con,"select * from stockAmountReceived where vendId='$vnr_id' && instituteId='$schl_id'");
while($recvd = mysqli_fetch_array($sl_rec)){
    $received += $recvd['received'];
}
?>
<input type="hidden" class="form-control" id="ttlrecv" onkeypress="isInputNumber(event)" autocomplete="off" value="<?php if(!empty($received)){ echo $received; }else{ echo "0"; } ?>">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3" onkeypress="isInputNumber(event)" autocomplete="off">
            <label class="text-capitalize">Received</label>
            <input type="text" class="form-control ides" id="recvd" onkeypress="isInputNumber(event)" autocomplete="off" onclick="remAmount()" onkeyup="remAmount()">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">Balance</label>
            <input type="text" class="form-control ids" id="recvblnce" onkeypress="isInputNumber(event)" autocomplete="off">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 mt-4">
            <button class="btn btn-apna text-uppercase" type="submit" id="amntRecvBtn">amount receive</button>
        </div>
    </div>
</form>
<script>
//// one field value write equal to another field 
$(document).ready(function(){
    $(".ides").keyup(function(){
var stp = $(".ides").val();
if(parseInt($(".ids").val()) < parseInt($(".ides").val())){
$('.ides').val("");
}
    });
});
function remAmount(){
    var totalAmnt = parseInt($("#totlamnt").val());
    var totalRecv = parseInt($("#ttlrecv").val());
var balnce = totalAmnt - totalRecv;
$("#recvblnce").val(balnce);
}
$(document).ready(function(){
    $("#amntRecvBtn").on('click',function(e){
e.preventDefault();
var recvNme = $("#recvname").val();
var vndId = $("#vnid").val();
var insId = $("#inid").val();
var ttlAmnt = $("#totlamnt").val();
var totlRecv = $("#ttlrecv").val();
var reved = $("#recvd").val();
var revBlnce = $("#recvblnce").val();
if(reved == ""){
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
  title: 'Please Amount Received!'
})
}else{
$.ajax({
    url: 'ajax/ajax-received-amounts.php',
    type: "POST",
    data: {rev_nme:recvNme,vndr_id:vndId,inst_id:insId,tl_amnt:ttlAmnt,tl_recv:totlRecv,recved:reved,rev_blce:revBlnce},
    success: function(data){
if(data == 1){
    $("#frmRecv").trigger("reset");
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
  title: 'Amount Successfully Received!'
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
  title: 'Amount not Received!'
})
}
    }
});    
}
    });
});
</script>
<?php }else{ echo "<div class='text-capitalize alert alert-danger'>there are no record found!</div>"; } ?>