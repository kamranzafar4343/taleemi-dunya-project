<?php
require_once("../functions/db.php");


 $instu_code = $_POST['instu_code'];

$sl_srch_fe = mysqli_query($con,"select * from schoolCollection where instituteId LIKE '%$instu_code%' order by id desc limit 0,1");
if(mysqli_num_rows($sl_srch_fe)>0){
while($fess = mysqli_fetch_assoc($sl_srch_fe)){
    $id = $fess['id'];
    $owner = $fess['owner'];
    $institute = $fess['institute'];
    $campus = $fess['campus'];
    $type = $fess['type'];
    $strength = $fess['strength'];
    $plan = $fess['plan'];
    $charges = $fess['charges'];
    $received = $fess['received'];
    $balance = $fess['balance'];
    $status = $fess['status'];
?>
<form id="fesubmit">
    <div class="row">
        <h4 class="fs-4 fw-bold text-uppercase my-4 text-center" style="color:hsl(220,80%,30%);">fee collection</h4>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">ower name</label>
            <input type="text" class="form-control" value="<?php echo $owner; ?>" readonly>
            <input type="hidden" class="form-control" value="<?php echo $id; ?>" id="frmid">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">Institute name</label>
            <input type="text" class="form-control" value="<?php echo $institute; ?>" readonly>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">campus</label>
            <input type="text" class="form-control" value="<?php echo $campus; ?>" readonly>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">account type</label>
            <input type="text" class="form-control" value="<?php echo $type; ?>" readonly>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">strength</label>
            <input type="text" class="form-control" value="<?php echo $strength; ?>" readonly>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">plan</label>
            <input type="text" class="form-control" value="<?php echo $plan; ?>" readonly>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">charges</label>
            <input type="text" class="form-control" value="<?php echo $charges; ?>" id="mnthly">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">Received</label>
            <input type="text" class="form-control" value="<?php echo $received; ?>" id="rcved" onclick="feee()" onkeyup="feee()">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">Balance</label>
            <input type="text" class="form-control" value="<?php echo $balance; ?>" id="blnc">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">status</label><span class="text-success text-uppercase"> <?php echo "(".$status.")"; ?></span>
            <select class="form-select text-capitalize" id="ststs">
                <option class="text-capitalize" value="">---select status---</option>
                <option class="text-capitalize" value="paid">paid</option>
                <option class="text-capitalize" value="unpaid">unpaid</option>
                <option class="text-capitalize" value="pending">pending</option>
            </select>
            <input type="hidden" value="<?php echo $status; ?>" id="ststsold">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-8 col-xxl-8 mb-3 mt-4" align="right">
<?php
if($status == "paid"){ echo "<button class='btn btn-success' disabled> <i class='bi bi-plus-lg'></i> Paid</button>"; }elseif($status == 'unpaid' || $status == 'pending'){
?>
<button class="btn btn-success text-capitalize" type="submit" id="btn-fees"><i class="bi bi-plus-lg"></i> Paid</button>
<?php } ?>
        </div>
        
 <script>
function feee(){
    var manthly = document.getElementById('mnthly').value * 1;
    var rceved = document.getElementById('rcved').value * 1;
    var balnce = manthly - rceved; 
document.getElementById('blnc').value=balnce;    
}

//// one field value write equal to another field 
$(document).ready(function(){
    $("#rcved").keyup(function(){
var stp = $("#mnthly").val();
if(parseInt($("#mnthly").val()) < parseInt($("#rcved").val())){
$('#rcved').val("");
}
    });
$("#btn-fees").click(function(e){
    e.preventDefault();
var frmids = $("#frmid").val();
var mnthles = $("#mnthly").val();
var rcvees = $("#rcved").val();
var blnes = $("#blnc").val();
var staus = $("#ststs").val();
var ststold = $("#ststsold").val();
if(rcvees == ""){
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
        url: '../ajax/ajax-payment-received.php',
        type: "POST",
        data: {frmeds:frmids,mntheds:mnthles,rcveds:rcvees,bleds:blnes,staused:staus,ststolded:ststold,},
        success: function(result){ if(result == 1){
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
  title: 'Charges Successfully Paid!'
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
  title: 'Charges not Paid!'
})
        } }
    });
}
    });
});
 </script>       
        
    </div>
</form>
<?php
    }
}else{ echo "<div class='alert alert-danger text-capitalize'>there are no record found!</div>"; }

?>