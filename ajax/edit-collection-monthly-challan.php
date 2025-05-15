<?php
require_once("../functions/db.php");

$ins_ids = $_POST['ins_ids'];
$st_ieds = $_POST['st_ieds'];

$sel_fee = mysqli_query($con,"select * from fee_collection where id='$st_ieds' && instituteId='$ins_ids' order by id desc limit 0,1");
if(mysqli_num_rows($sel_fee)>0){
    while($rows=mysqli_fetch_array($sel_fee)){
$feid = $rows['id'];
$instituteId = $rows['instituteId'];
$student_imgs = $rows['student_imgs'];
$rollno = $rows['rollno'];
$session = $rows['session'];
$student_name = $rows['student_name'];
$father_name = $rows['father_name'];
$class = $rows['class'];
$section = $rows['section'];
$monthly_fee = $rows['monthly_fee'];
$discounts = $rows['discounts'];
$fine = $rows['fine'];
$previous_balance = $rows['previous_balance'];
$total_amount = $rows['total_amount'];
$receive_monthly = $rows['receive_monthly'];
$remaing_balance = $rows['remaing_balance'];
$fees_status = $rows['fees_status'];
$month = $rows['month'];
$dates = $rows['dates'];
$due_dates = $rows['due_dates'];
$monthName = date("M", mktime(0, 0, 0, $month, 10));


$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<div class="container-fluid">
    <div class="row bg-apna">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
            <h4 class="fs-4 fw-bold text-uppercase text-center py-2"> edit challan form month of "<?php echo $monthName; ?>"</h4>
<form method="post" enctype="multipart/form-data">
<div class="row py-3" style="background-color:hsl(0,0%,15%);">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
        <h6 class="fs-6 text-uppercase text-white bg-dark p-2 px-4">student information</h6>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">roll no#</label>
        <input id="ides" type="hidden" class="form-control" value="<?php echo $feid; ?>">
        <input readonly type="text" class="form-control" placeholder="00" value="<?php echo $rollno; ?>">
        <input id="rolno" type="hidden" class="form-control" placeholder="00" value="<?php echo $rollno; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">student name</label>
        <input readonly type="text" class="form-control" placeholder="Student Name" value="<?php echo $student_name; ?>">
        <input id="stunme" type="hidden" value="<?php echo $student_name; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">father name</label>
        <input readonly type="text" class="form-control text-capitalize" placeholder="Father Name" value="<?php echo $father_name; ?>">
        <input class="ftrnme" type="hidden" value="<?php echo $father_name; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">class</label>
        <input readonly type="text" class="form-control text-uppercase" placeholder="Class" value="<?php echo $class_name; ?>">
        <input id="clos" type="hidden" value="<?php echo $class; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">section</label>
        <input readonly type="text" class="form-control text-uppercase" placeholder="Section" value="<?php echo $section; ?>">
        <input id="soctn" type="hidden" value="<?php echo $section; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">session</label>
        <select class="form-select text-capitalize" id="sosins">
            <option><?php echo $session; ?></option>
<?php
$sl_selsesn = mysqli_query($con,"select * from addSession where institute_id='$ins_ids' order by id desc");
while($ses_reslt=mysqli_fetch_array($sl_selsesn)){
?>
            <option><?php echo $ses_reslt['session']; ?></option>
<?php } ?>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Month</label>
        <select class="form-select text-capitalize mnths">
            <option class="text-capitalize" value="<?php echo $month; ?>"><?php echo $monthName; ?></option>
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
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Due Date</label> <span class="text-white">(<?php echo $due_dates; ?>)</span>
        <input type="date" class="form-control dusdtes" value="<?php echo $due_dates; ?>">
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
        <h6 class="fs-6 text-uppercase text-white bg-dark p-2 px-4">monthly  fee submission</h6>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">monthly fee</label>
        <input readonly type="text" class="form-control" placeholder="00" autocomplete="off" onkeypress="isInputNumber(event)" value="<?php echo $monthly_fee; ?>">
        <input name="monthy" type="hidden" id="monthlyfee" onkeypress="isInputNumber(event)" value="<?php echo $monthly_fee; ?>">
    </div>
<?php
error_reporting (E_ALL ^ E_NOTICE);
$ids='';
$sel_fee = mysqli_query($con,"select remaing_balance from fee_collection where rollno='$rollno' ORDER BY id DESC limit 0,1");
$results = mysqli_fetch_assoc($sel_fee);
$remaing_balance = $results['remaing_balance'];
?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">previous balance</label>
        <input type="text" id="previ" class="form-control" placeholder="00" onkeypress="isInputNumber(event)" autocomplete="off" value="<?php if(empty($remaing_balance)){ echo "0"; }else{ echo $remaing_balance; } ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Discount</label>
        <input type="text" id="discunt" class="form-control" placeholder="00" onkeypress="isInputNumber(event)" autocomplete="off" value="<?php echo $discounts; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Fine</label>
        <input type="text" id="fins" class="form-control" placeholder="00" onkeypress="isInputNumber(event)" autocomplete="off" value="<?php echo $fine; ?>">
    </div>
<?php if(empty($student_imgs)){ }else{ ?>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3" align="center">
        <img src="student_imgs/<?php echo $student_imgs; ?>" class="img-fluid" style="width:10%;">
    </div>
<?php } ?>
<input value="<?php echo $instituteId; ?>" id="institue" type="hidden">
<input value="<?php echo $student_imgs; ?>" id="userimgs" type="hidden">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3" align="right">
        <button type="submit" id="btnpeid" class="text-uppercase btn btn-apna"><i class="fa-solid fa-retweet"></i> edit</button>
    </div>
</div>
</form>   
        </div>
    </div>
</div>

<?php
    }
}else{ echo "<div class='alert alert-danger text-capitlaize'>there are no record found!</div>"; }

?>
<script type="text/javascript">
function totalfee(){
var monthlyfees = document.getElementById("monthlyfee").value;
var pre = document.getElementById("previ").value;
var dic = document.getElementById("discunt").value;
var find = document.getElementById("fins").value;
var exactfee = monthlyfees * 1;
var exactprev = pre * 1;
var exactjrd = exactfee + exactprev;
var discot = dic * 1;
var discountsAmntFinl = exactjrd - discot;
var mFine = find * 1;
var finlAmnt = discountsAmntFinl + mFine;
document.getElementById("totlam").value = finlAmnt;
}
function curntbalnce(){
var recve = document.getElementById("recve").value;
var tols = document.getElementById("totlam").value;
var exactrecve = recve * 1;
var exacttotls = tols * 1;
var exactkulta = exacttotls - exactrecve;
document.getElementById("curntblnce").value = exactkulta;
}
$(document).ready(function(){
    $("#btnpeid").on('click',function(e){
e.preventDefault();
var ides = $("#ides").val();
var previ = $("#previ").val();
var discunt = $("#discunt").val();
var fins = $("#fins").val();
var mnths = $(".mnths").val();
var dusdtes = $(".dusdtes").val();
var sosins = $("#sosins").val();


$.ajax({
    url: 'ajax/monthly-update-challan.php',
    type: "POST",
    data: {fe_id:ides,previus:previ,disc:discunt,fnes:fins,evy_month:mnths,duesd_dates:dusdtes,aply_sesion:sosins},
    success: function(response){
if(response == 1){
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 1500,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
Toast.fire({
  icon: 'success',
  title: 'Update Challan Successfully!'
})
window.location.reload();
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
  title: 'Update Challan is not Perform!'
})
}
    }
    
});

    });
});
</script>