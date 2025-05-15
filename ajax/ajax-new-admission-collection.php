<?php
require_once("../functions/db.php");


    
$search_bar = $_POST['search_btn'];
$insti_id = $_POST['insti_id'];

$sel_fee = mysqli_query($con,"select * from addStudents where instituteId='$insti_id' && roll_num='$search_bar'");
if(mysqli_num_rows($sel_fee)>0){

while($rows=mysqli_fetch_assoc($sel_fee)){

$feid = $rows['id'];
$instituteId = $rows['instituteId'];
$dt = date("j-m-Y");
$familyId = $rows['familyId'];
$roll_num = $rows['roll_num'];
$class = $rows['class'];
$section = $rows['section'];
$session = $rows['session'];
$frmimage = $rows['image'];
$studentName = $rows['studentName'];
$fatherName = $rows['fatherName'];
$totalFee = $rows['totalFee'];
$admissionFee = $rows['admissionFee'];
$annualFund = $rows['annualFund'];
$books = $rows['books'];
$uniform = $rows['uniform'];
$stationary = $rows['stationary'];
$others = $rows['others'];
$totalAmount = $rows['totalAmount'];
$monthName = date("F", mktime(0, 0, 0, $month, 10));

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];


error_reporting (E_ALL ^ E_NOTICE);
$ids='';
$sel_fee = mysqli_query($con,"select receive_amount from new_admission_collection where roll_num='$roll_num' && instituteId='$instituteId'");
while($results = mysqli_fetch_assoc($sel_fee)){
$receive_amount += $results['receive_amount'];
}
if($receive_amount != ''){  $finlyFee = $totalAmount - $receive_amount; }else{ $finlyFee = $totalAmount - 0; }

?>
<form id="collectForm">
    <div class="row">
        <div class="col-6 mb-3">
<div class="card bg-apna mb-3">
    <div class="card-header"><h4 class="fs-4 fw-bold text-capitalize"><span style="color:hsl(120,100%,70%);" class="fs-4 fw-bold"><?php echo $studentName; ?></span> New Admission Collection</h4>
    </div>
    <div class="card-body" style="background-color:hsl(0,0%,15%);">
 <div class="row">       
        <div class="col-10 mb-3">
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Date</label>
        <input class="form-control chrgedate" type="date">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Class</label>
        <input class="form-control text-uppercase" type="text" value="<?php echo $class_name; ?>" readonly>
        <input id="cles" class="form-control" type="hidden" value="<?php echo $class; ?>">
        <input id="user-id" class="form-control" type="hidden" value="<?php echo $feid; ?>">
        <input id="instu-id" class="form-control" type="hidden" value="<?php echo $instituteId; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
        <label class="text-capitalize">Section</label>
        <input class="form-control text-uppercase" type="text" value="<?php echo $section; ?>" readonly>
        <input id="sectn" class="form-control" type="hidden" value="<?php echo $section; ?>">
    </div>
</div>
        </div>
        <div class="col-2 mb-3">
            <div class="card bg-white" style="height:60px;overflow:hidden;">
<?php if(!empty($frmimage)){ ?>
<img src="student_imgs/<?php echo $frmimage; ?>" class="card-img-top">
<?php }else{ ?>
<img src="student_imgs/users.jpg" class="card-img-top">
<?php } ?>
            </div>
        </div>
</div>
<div class="row">
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Roll No#</label>
        <input class="form-control" type="text" value="<?php echo $roll_num; ?>" readonly>
        <input id="rolno" class="form-control" type="hidden" value="<?php echo $roll_num; ?>">
        <input id="imge" class="form-control" type="hidden" value="<?php echo $frmimage; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">father Name</label>
        <input class="form-control text-capitalize" type="text" value="<?php echo $fatherName; ?>" readonly>
        <input id="sname" class="form-control" type="hidden" value="<?php echo $studentName; ?>">
        <input id="fname" class="form-control" type="hidden" value="<?php echo $fatherName; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">monthly fee</label>
        <input class="form-control" type="text" value="<?php echo $totalFee; ?>" readonly>
        <input id="mothly-fee" class="form-control" type="hidden" value="<?php echo $totalFee; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Session</label>
        <input class="form-control" type="text" value="<?php echo $session; ?>" readonly>
        <input id="fe-sesin" class="form-control" type="hidden" value="<?php echo $session; ?>">
    </div>
<?php
$sl_titles = mysqli_query($con,"select * from addChargesTitle where instituteId='$userId' order by id desc limit 0,1");
while($chrgtitle = mysqli_fetch_array($sl_titles)){
    
    $charges1 = $chrgtitle['charges1'];
    $charges2 = $chrgtitle['charges2'];
    $charges3 = $chrgtitle['charges3'];
    $charges4 = $chrgtitle['charges4'];
    $charges5 = $chrgtitle['charges5'];
    $charges6 = $chrgtitle['charges6'];
}
?>
    <div class="col-12 mb-3">
        <h5 class="fs-5 fw-bold text-capitalize text-white" style="border-bottom:2px dashed white;">other charges</h5>
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize"><?php if(!empty($charges1)){ echo $charges1; }else{ echo "admission fee"; }?></label>
        <input class="form-control admsnfe" type="text" value="<?php echo $admissionFee; ?>" readonly>
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize"><?php if(!empty($charges2)){ echo $charges2; }else{ echo "annual fund"; }?></label>
        <input class="form-control anualfund" type="text" value="<?php echo $annualFund; ?>" readonly>
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize"><?php if(!empty($charges3)){ echo $charges3; }else{ echo "books"; }?></label>
        <input class="form-control boks" type="text" value="<?php echo $books; ?>" readonly>
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize"><?php if(!empty($charges4)){ echo $charges4; }else{ echo "uniform"; }?></label>
        <input class="form-control unfrm" type="text" value="<?php echo $uniform; ?>" readonly>
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize"><?php if(!empty($charges5)){ echo $charges5; }else{ echo "stationary"; }?></label>
        <input class="form-control statnry" type="text" value="<?php echo $stationary; ?>" readonly>
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize"><?php if(!empty($charges6)){ echo $charges6; }else{ echo "others"; }?></label>
        <input class="form-control othrs" type="text" value="<?php echo $others; ?>" readonly>
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Total Amount</label>
        <input class="form-control" type="text" value="<?php echo $finlyFee; ?>" onkeypress="isInputNumber(event)" readonly>
        <input id="totl-fee" class="form-control" type="hidden" value="<?php echo $finlyFee; ?>" onkeypress="isInputNumber(event)">
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Received</label>
        <input id="recd" class="form-control" type="text" onclick="remAmount()" onkeyup="remAmount()" onkeypress="isInputNumber(event)">
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Remaining Amount</label>
        <input id="rem-fee" class="form-control" type="text" onkeypress="isInputNumber(event)">
    </div>

    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Total Received</label>
        <input id="total-rec-fee" class="form-control" type="text" onkeypress="isInputNumber(event)" value="<?php echo $receive_amount; ?>">
    </div>
    <div class="col-12 mb-3 mt-4" align="right">
        <button id="save-btn-fees"class="btn btn-apna text-uppercase"><i class="fa fa-save"></i> save</button>
    </div>
</div>
    </div>
</div>
        </div>
        <div class="col-6 mb-3">
<div class="card bg-apna">
    <h4 class="p-2 fs-4 fw-bolder text-capitalize">new admission collection history</h4>
    <div class="card-body" style="background-color:hsla(0,0%,15%,1);">
        <div class="row">
<div class="col-12">
    <table class="table table-reponsive w-100">
        <thead>
            <tr style='background:hsl(35, 100%, 80%);'>
<th style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'>Sr#</th>
<th style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'>Date</th>
<th style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'>Roll#</th>
<th style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'>St.Name</th>
<th style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'><?php if(!empty($charges1)){ echo $charges1; }else{ echo "AD.Fee"; }?></th>
<th style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'><?php if(!empty($charges2)){ echo $charges2; }else{ echo "A.Fund"; }?></th>
<th style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'>Receive</th>
<th style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'>Remaing</th>
<th style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'>T.Collect</th>
<th style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'>Action</th>
            </tr>
        </thead>
        <tbody>
<?php
$tr=1;
$sel_rol = mysqli_query($con,"select * from new_admission_collection where instituteId='$insti_id' && roll_num='$search_bar'");
if(mysqli_num_rows($sel_rol)>0){
    while($tr <= 1000000 && $reslts=mysqli_fetch_array($sel_rol)){
$id = $reslts['id'];
$dates = $reslts['dates'];
$roll_num = $reslts['roll_num'];
$studentName = $reslts['studentName'];
$admission_fee = $reslts['admission_fee'];
$annual_fund = $reslts['annual_fund'];
$receive_amount = $reslts['receive_amount'];
$balance_amuont = $reslts['balance_amuont'];
$total_collect_fee = $reslts['total_collect_fee'];
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'><?php echo $tr++; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'><?php echo $dates; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'><?php echo $roll_num; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'><?php echo $studentName; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'><?php echo $admission_fee; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'><?php echo $annual_fund; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'><?php echo $receive_amount; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'><?php echo $balance_amuont; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'><?php echo $total_collect_fee; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'><a href="#" class="deladmnsin" rowid="<?php echo $id; ?>"><i class="fa fa-trash-alt text-danger"></i></a></td>
</tr>
<?php
    }
}else{ echo "<td colspan='10' class='text-white' style='border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;'>There are no History Found!</td>"; }
?>
            
        </tbody>
    </table>
</div>
        </div>
    </div>
</div>
        </div>
    </div>
</form>
<script>
$(document).ready(function(){
    $(".deladmnsin").on('click',function(e){
e.preventDefault();
var adsnid = $(this).attr("rowid");
$.ajax({
    url: 'ajax/delete-new-admission-collection.php',
    type: "POST",
    data: {admison_id:adsnid},
    success: function(mthods){
if(mthods == 1){
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
  title: 'New Admission Collection Successfully Submited!.'
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
  title: 'New Admission Collection Delete!.'
})
    }
    }
});
    });
});
function remAmount(){
    var totlFees = document.getElementById("totl-fee").value;
    var recde = document.getElementById("recd").value;
var one = totlFees * 1;
var two = recde * 1;
var three = one - two;
document.getElementById("rem-fee").value = three;
}


$(document).ready(function(){
    $("#save-btn-fees").on('click',function(e){
        e.preventDefault();

var instuId = $("#instu-id").val();
var userId = $("#user-id").val();
var rolno = $("#rolno").val();
var cles = $("#cles").val();
var sectn = $("#sectn").val();
var feSesin = $("#fe-sesin").val();
var imge = $("#imge").val();
var sname = $("#sname").val();
var fname = $("#fname").val();
var admsnfe = $(".admsnfe").val();
var anualfund = $(".anualfund").val();
var boks = $(".boks").val();
var unfrm = $(".unfrm").val();
var statnry = $(".statnry").val();
var othrs = $(".othrs").val();
var totlFees = $("#totl-fee").val();
var recvded = $("#recd").val();
var remgFees = $("#rem-fee").val();
var recvFees = $("#total-rec-fee").val();
var chrgedate = $(".chrgedate").val();


if(recvded == ""){
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
  title: 'Before Submited Form Fill the Receive Fee Field.'
})
}else{
$.ajax({
    url: 'ajax/ajax-new-admission-collect-fee.php',
    type: "POST",
    data: {instu_id:instuId,user_id:userId,rol_noe:rolno,clesed:cles,sectned:sectn,sesined:feSesin,imgeed:imge,snameed:sname,fnameed:fname,totlFeesed:totlFees,recvdeded:recvded,remgFeesed:remgFees,recvFeesed:recvFees,admisn_fee:admsnfe,anual_fnd:anualfund,book:boks,unifrm:unfrm,statonry:statnry,othars:othrs,paid_date:chrgedate},
    success: function(results){
//    console.log(results);
        
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
  title: 'Fee Successfully Received.'
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
  title: 'Fee is not Charge'
})
}


    }
});
    
}


    });
});



</script>


<?php
}
}else{ echo "<div class='alert alert-danger text-capitalize'>record not found</div>"; }
?>