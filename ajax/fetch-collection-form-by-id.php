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
</script>
<?php
require_once("../functions/db.php");

$ins_ids = $_POST['ins_ids'];
$st_ieds = $_POST['st_ieds'];
$month_fes = $_POST['month_fes'];
if($month_fes < 10){ $month_fessng = "0".$month_fes-1; }else{ $month_fessng = $_POST['month_fes']; }
$sesin_aply = $_POST['sesin_aply'];

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
$monthName = date("F", mktime(0, 0, 0, $month, 10));


$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$mnth = date("m");
if($month > 9){ 
    $mnthes = $month-1; 
    $mnths = "0".$mnthes;
}elseif($month >= 10){ $mnths = $mnth; }

if($mnths == 00){ $mnths = 12;}

$lst_chlns = mysqli_query($con,"select * from fee_collection where rollno='$rollno' && instituteId='$instituteId' && month='$mnths' && session='$session'");
$chlns = mysqli_fetch_assoc($lst_chlns);
$monthly_fees = $chlns['monthly_fee'];
$fees_statuss = $chlns['fees_status'];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mb-3">
<form method="post" enctype="multipart/form-data">
<div class="row py-3" style="background-color:hsl(0,0%,25%);">
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
        <input readonly type="text" class="form-control" placeholder="Session" value="<?php echo $session; ?>">
        <input id="sosn" type="hidden" value="<?php echo $session; ?>">
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
        <h6 class="fs-6 text-uppercase text-white bg-dark p-2 px-4">monthly  fee submission</h6>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Receiving Date</label>
        <input type="date" class="form-control clctdtes" value="<?php echo $dates; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Session</label>
        <select class="form-select text-capitalize sesins">
            <option><?php echo $session; ?></option>
<?php
$sel_sesn = mysqli_query($con,"select * from addSession where institute_id='$instituteId' order by id desc");
while($sen = mysqli_fetch_array($sel_sesn)){
$new_session = $sen['session'];    
?>
    <option><?php echo $new_session; ?></option>
<?php } ?>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Account Type</label>
        <select class="form-select text-capitalize" id="acttype">
            <option class="text-capitalize">Cash</option>
            <option class="text-capitalize">Bank</option>
            <option class="text-capitalize">JazzCash</option>
            <option class="text-capitalize">easyPaisa</option>
            <option class="text-capitalize">Upaisa</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">monthly fee</label>
        <input readonly type="text" class="form-control" placeholder="00" autocomplete="off" onkeypress="isInputNumber(event)" value="<?php if($fees_statuss == "Unpaid"){echo $lstmnth = $monthly_fee+$monthly_fees+$latfefund; }elseif($fees_statuss == "unpaid"){ echo $lstmnth = $monthly_fee+$monthly_fees+$latfefund; }else{ echo $monthly_fee; } ?>">
        <input name="monthy" type="hidden" id="monthlyfee" onkeypress="isInputNumber(event)" value="<?php if($fees_statuss == "Unpaid"){echo $lstmnth = $monthly_fee+$monthly_fees+$latfefund; }elseif($fees_statuss == "unpaid"){ echo $lstmnth = $monthly_fee+$monthly_fees+$latfefund; }else{ echo $monthly_fee; } ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">balance</label>
        <input type="text" id="previ" class="form-control" placeholder="00" onkeypress="isInputNumber(event)" autocomplete="off" value="<?php if(empty($remaing_balance)){ echo "0"; }else{ echo $remaing_balance; } ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">total amount</label>
        <input type="text" id="totlam" onkeyup="totalfee()" onclick="totalfee()" class="form-control ids" placeholder="00" onkeypress="isInputNumber(event)" autocomplete="off" value="0">
    </div>
<script>
$(document).ready(function(){
    $("#previ").on('click',function(){
 var previ = $(this).val();
 document.getElementById('totlam').value = previ;
    });
});
</script>    
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">received</label>
        <input type="text" id="recve" class="form-control" placeholder="00" onkeypress="isInputNumber(event)" autocomplete="off" value="<?php echo $receive_monthly; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Rec. Rem balance</label>
        <input type="text" id="curntblnce" onclick="curntbalnce()" onkeyup="curntbalnce()" class="form-control" placeholder="00" onkeypress="isInputNumber(event)" autocomplete="off" value="0">
    </div>
<script>
$(document).ready(function(){
    $("#recve").on('click',function(){
 var recve = $(this).val();
 document.getElementById('curntblnce').value = recve;
    });
});
</script>    
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Fee Status</label> <span class="text-capitalize text-warning">(<?php echo $fees_status; ?>)</span>
        <select class="form-select text-capitalize" id="stets">
            <option class="text-capitalize"><?php echo $fees_status; ?></option>
            <option class="text-capitalize">paid</option>
            <option class="text-capitalize">balance</option>
            <option class="text-capitalize">unpaid</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Reminder</label>
        <input id="remks" class="form-control" type="text" placeholder="Write Message.......">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-4 col-xxl-4 mb-3">
        <label class="text-capitalize">Due Date</label> <span class="text-white"><?php echo $due_dates; ?></span>
        <input class="form-control dusdte" type="date" value="<?php echo $due_dates; ?>">
    </div>
<?php if(empty($student_imgs)){ }else{ ?>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3" align="center">
        <img src="student_imgs/<?php echo $student_imgs; ?>" class="img-fluid" style="width:10%;">
    </div>
<?php } ?>
<input value="<?php echo $instituteId; ?>" id="institue" type="hidden">
<input value="<?php echo $student_imgs; ?>" id="userimgs" type="hidden">
<input value="<?php echo $month; ?>" class="months" type="hidden">
<input value="<?php echo $monthName; ?>" class="monthnme" type="hidden">

    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3" align="right">
        <button type="submit" id="btnpeid" class="text-uppercase btn btn-apna"><i class="fa-regular fa-square-check"></i> paid</button>
    </div>

</div>
</form>   
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mb-3">
<div class="student-fee-history"></div>       
        </div>
    </div>
</div>

<?php
    }
}else{ echo "<div class='alert alert-danger text-capitlaize'>there are no record found!</div>"; }

?>
<script type="text/javascript">
function feeHistory(){
var institue = $("#institue").val();
var rolno = $("#rolno").val();
var stIds = $("#ides").val();
var stunme = $("#stunme").val();
var fthrnme = $(".ftrnme").val();
var clos = $("#clos").val();
var soctn = $("#soctn").val();
var sosn = $("#sosn").val();
var userimgs = $("#userimgs").val();

$.ajax({
    url: 'ajax/fetch-monthly-charges-history.php',
    type: "POST",
    data: {schol_id:institue,st_rol:rolno,stu_id:stIds,sname:stunme,fname:fthrnme,cles:clos,sectn:soctn,sesin:sosn,st_imge:userimgs},
    success: function(methods){
$(".student-fee-history").html(methods);
    }
});

}
feeHistory();


function totalfee(){
var pre = document.getElementById("previ").value;
document.getElementById("totlam").value = pre;
}
/*
function curntbalnce(){
var recve = document.getElementById("recve").value;
var tols = document.getElementById("totlam").value;
var exactrecve = recve * 1;
var exacttotls = tols * 1;
var exactkulta = exacttotls + exactrecve;
document.getElementById("curntblnce").value = exactkulta;
}
*/
$(document).ready(function(){
    $("#btnpeid").on('click',function(e){
e.preventDefault();
var ides = $("#ides").val();
var acttype = $("#acttype").val();
var previ = $("#previ").val();
var totlam = $("#totlam").val();
var recve = $("#recve").val();
var curntblnce = $("#curntblnce").val();
var stets = $("#stets").val();
var remks = $("#remks").val();

var insTitues = $("#institue").val();
var rolsNo = $("#rolno").val();
var stuIds = $("#ides").val();
var stnmes = $("#stunme").val();
var fhrNames = $(".ftrnme").val();
var cleses = $("#clos").val();
var sectned = $("#soctn").val();
var sosned = $(".sesins").val();
var usrImges = $("#userimgs").val();
var clctdtes = $(".clctdtes").val();
var dusdte = $(".dusdte").val();
var monthlyfee = $("#monthlyfee").val();
var months = $(".months").val();
var monthnme = $(".monthnme").val();

$.ajax({
    url: 'ajax/update-monthly-fee-paid.php',
    type: "POST",
    data: {fe_id:ides,act_types:acttype,previus:previ,tl_amnt:totlam,recives:recve,crt_blnce:curntblnce,statuses:stets,contents:remks,colg_ids:insTitues,col_rols:rolsNo,col_st_id:stuIds,colg_sname:stnmes,col_ft_name:fhrNames,colg_cls:cleses,colg_sectn:sectned,colg_sesin:sosned,Colg_st_img:usrImges,clct_dats:clctdtes,due_dates:dusdte,month_fes:monthlyfee,chrge_month:months,month_name:monthnme},
    success: function(response){


if(response == 1){
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
  title: 'Monthly Charge Successfully Paid!'
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
  icon: 'success',
  title: 'Monthly Charges is not Pay!'
})
}

    }
    
});

    });
});
</script>