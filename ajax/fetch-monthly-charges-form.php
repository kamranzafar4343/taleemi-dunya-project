<?php
require_once("../functions/db.php");

$rol_nbr = $_POST['rol_nbr'];
$inst_id = $_POST['inst_id'];
$user_role = $_POST['user_role'];
$chose_month = $_POST['chose_month'];
$aply_sesins = $_POST['aply_sesins'];

$sel_fee = mysqli_query($con,"select * from fee_collection where rollno='$rol_nbr' && instituteId='$inst_id' && month='$chose_month' && session='$aply_sesins' order by id desc limit 0,1");
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
$challan_status = $rows['challan_status'];
$due_dates = $rows['due_dates'];
$monthName = date("M", mktime(0, 0, 0, $month, 10));

$frmtg = explode("-",$due_dates);

$datngs = $frmtg['2'];
$manths = $frmtg['1'];
$salls = $frmtg['0'];

$dwedate = $datngs."-".$manths."-".$salls;

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$mnth = date("m");
if($month <= 9){ 
    $mnthes = $month-1; 
    $mnths = "0".$mnthes;
}elseif($month >= 10){ 
    $mnthes = $month-1;
    $mnths = $mnthes; 
}

if($mnths == 00){ $mnths = 12;}

$lst_chlns = mysqli_query($con,"select * from fee_collection where rollno='$rollno' && instituteId='$instituteId' && month='$mnths' && session='$session'");
$chlns = mysqli_fetch_assoc($lst_chlns);
$monthly_fees = $chlns['monthly_fee'];
$fees_statuss = $chlns['fees_status'];

$sel_latfe = mysqli_query($con,"select SUM(charges_amount) as latfefund from addOtherChargesDecieded where instituteId='$instituteId' && type='5'");
while($fnds = mysqli_fetch_array($sel_latfe)){ 
    if(!empty($fnds['latfefund'])){ $latfefund = $fnds['latfefund']; }else{ $latfefund = "0"; }
}
$latedtes = date("d");
if($latedtes > $datngs){ $latefines =  $latfefund; }else{ $latefines = $fine; }
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mb-3">
            <div class="row bg-apna" style="border:1px solid hsl(25, 100%, 50%);">
<div class="col-12">
<h6 class="fs-5 text-uppercase py-1 fw-bold text-center"> "<?php echo $student_name." ".$challan_status; ?>" fee submission <?php echo "(".$monthName.")"; ?></h6>
<form method="post" enctype="multipart/form-data">
<div class="row py-3" style="background-color:hsl(0,0%,15%);">
        <input id="ides" type="hidden" class="form-control" value="<?php echo $feid; ?>">
        <input id="rolno" type="hidden" class="form-control" placeholder="00" value="<?php echo $rollno; ?>">
        <input id="stunme" type="hidden" value="<?php echo $student_name; ?>">
        <input class="ftrnme" type="hidden" value="<?php echo $father_name; ?>">
        <input id="clos" type="hidden" value="<?php echo $class; ?>">
        <input id="soctn" type="hidden" value="<?php echo $section; ?>">
        <input type="hidden" class="apsesins" value="<?php echo $aply_sesins; ?>">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Receiving Date</label>
        <input class="form-control chgdtes" type="date" value="<?php echo date("j-m-Y"); ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Session</label>
        <select class="form-select text-capitalize sesins">
<?php
$sel_sesn = mysqli_query($con,"select * from addSession where institute_id='$inst_id' order by id desc");
while($sen = mysqli_fetch_array($sel_sesn)){
$session = $sen['session'];    
?>
    <option><?php echo $session; ?></option>
<?php } ?>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Account Type</label>
<?php if($inst_id == 495785){ ?>
<select class="form-select text-capitalize" id="acttype">
    <option class="text-capitalize">Bank</option>
    <option class="text-capitalize">Cash</option>
    <option class="text-capitalize">JazzCash</option>
    <option class="text-capitalize">easyPaisa</option>
    <option class="text-capitalize">Upaisa</option>
</select>
<?php }else{ ?>
<select class="form-select text-capitalize" id="acttype">
    <option class="text-capitalize">Cash</option>
    <option class="text-capitalize">Bank</option>
    <option class="text-capitalize">JazzCash</option>
    <option class="text-capitalize">easyPaisa</option>
    <option class="text-capitalize">Upaisa</option>
</select>
<?php }?>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize"> monthly fee</label>
        <input readonly type="text" class="form-control" placeholder="00" autocomplete="off" onkeypress="isInputNumber(event)" value="<?php if($fees_statuss == "Unpaid"){echo $lstmnth = $monthly_fee+$monthly_fees+$latfefund; }elseif($fees_statuss == "unpaid"){ echo $lstmnth = $monthly_fee+$monthly_fees+$latfefund; }else{ echo $monthly_fee; } ?>">
        <input name="monthy" type="hidden" id="monthlyfee" onkeypress="isInputNumber(event)" value="<?php if($fees_statuss == "Unpaid"){echo $lstmnth = $monthly_fee+$monthly_fees+$latfefund; }elseif($fees_statuss == "unpaid"){ echo $lstmnth = $monthly_fee+$monthly_fees+$latfefund; }else{ echo $monthly_fee; } ?>">
    </div>
<?php
error_reporting (E_ALL ^ E_NOTICE);
$ids='';
$sel_fee = mysqli_query($con,"select remaing_balance from fee_collection where rollno='$rollno' && instituteId='$inst_id' && month='$mnths' && session='$aply_sesins' limit 1");
$results = mysqli_fetch_assoc($sel_fee);
$remaing_balance = $results['remaing_balance'];
?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">balance</label> <span class="text-capitalize text-white" style="font-size:0.7rem;">( last month )</span>
        <input type="text" id="previ" class="form-control" placeholder="00" onkeypress="isInputNumber(event)" onkeyup="totalfee()" onchange="totalfee()" onblur="totalfee()" onclick="totalfee()" autocomplete="off" value="<?php if(empty($remaing_balance)){ echo "0"; }else{ echo $remaing_balance; } ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Discount</label> <span class="text-capitalize text-white" style="font-size:0.7rem;">( Rs )</span>
        <input type="text" id="discunt" class="form-control" placeholder="00" onkeypress="isInputNumber(event)" onkeyup="totalfee()" onchange="totalfee()" onblur="totalfee()" onclick="totalfee()" autocomplete="off" value="<?php echo $discounts; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Fine</label> <span class="text-capitalize text-white" style="font-size:0.7rem;">( Rs )</span>
        <input type="text" id="fins" class="form-control" placeholder="00" value="<?php echo $latefines; ?>" onkeypress="isInputNumber(event)" onkeyup="totalfee()" onchange="totalfee()" onblur="totalfee()" onclick="totalfee()" autocomplete="off">
    </div>
<?php
$sl_othrchrgs = mysqli_query($con,"select SUM(charges_amount) as chrgsamnt from addOtherChargesDecieded where instituteId='$instituteId' && type='1' && class='$class'");
while($chr = mysqli_fetch_array($sl_othrchrgs)){
    $chrgsamnt = $chr['chrgsamnt'];
}
?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Monthly O.Charges</label>
        <input id="othrs" class="form-control" value="<?php if(!empty($chrgsamnt)){ echo $chrgsamnt; }else{ echo "0"; } ?>" onkeypress="isInputNumber(event)" onkeyup="totalfee()" onchange="totalfee()" onblur="totalfee()" onclick="totalfee()">
    </div>
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
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">total amount</label>
        <input type="text" id="totlam" onkeyup="totalfee()" onchange="totalfee()" onblur="totalfee()" onclick="totalfee()" class="form-control ids" placeholder="00" onkeypress="isInputNumber(event)" autocomplete="off" value="<?php echo $total_amount; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">received</label>
        <input type="text" id="recve" class="form-control ides" onclick="curntbalnce()" onblur="curntbalnce()" onchange="curntbalnce()" onkeyup="curntbalnce()" placeholder="00" value="0" onkeypress="isInputNumber(event)" autocomplete="off">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">current balance</label>
        <input type="text" id="curntblnce" onclick="curntbalnce()" onblur="curntbalnce()" onchange="curntbalnce()" onkeyup="curntbalnce()" class="form-control" placeholder="00" onkeypress="isInputNumber(event)" autocomplete="off" value="0">
    </div>
<?php if($fees_status == "paid" || $fees_status == "balance"){ ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Fee Status</label>
        <input id="stets" type="text" class="form-control" placeholder="Fee Status" autocomplete="off" value="<?php echo $fees_status; ?>">
    </div>
<?php }else{ ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Fee Status</label>
        <select class="form-select text-capitalize" id="stets">
            <option class="text-capitalize">paid</option>
            <option class="text-capitalize">balance</option>
            <option class="text-capitalize">unpaid</option>
        </select>
    </div>
<?php } ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-6 col-xxl-6 mb-3">
        <label class="text-capitalize">Reminder</label>
        <input id="remks" class="form-control" type="text" placeholder="Write Message.......">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-6 col-xxl-6 mb-3">
        <label class="text-capitalize">Due Date</label> <span class="text-white">(<?php echo $due_dates; ?>)</span>
        <input class="form-control dusdte" type="date" value="<?php echo $due_dates; ?>">
    </div>
<?php
$selct_othrs = mysqli_query($con,"select * from addOtherChargesDecieded where instituteId='$instituteId' && type='1'");
while($chrges = mysqli_fetch_array($selct_othrs)){
    $charges_amount = $chrges['charges_amount'];
}
?>
<input value="<?php echo $chose_month; ?>" id="selctmonth" type="hidden">
<input value="<?php echo $instituteId; ?>" id="institue" type="hidden">
<input value="<?php echo $student_imgs; ?>" id="userimgs" type="hidden">
<input value="<?php echo $user_role; ?>" id="adminrol" type="hidden">
<?php if($fees_status == "paid"){ ?>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3" align="right">
        <button type="submit" id="btnpeid" class="text-uppercase btn btn-apna" disabled><i class="fa-regular fa-square-check"></i> paid fee</button>
    </div>
<?php }else{ ?>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3" align="right">
        <button type="submit" id="btnpeid" class="text-uppercase btn btn-apna"><i class="fa-regular fa-square-check"></i> paid fee</button>
    </div>
<?php } ?>
</div>
</form>
    <div class="d-grid">
        <button class="btn btn-apna text-uppercase" data-bs-toggle="modal" data-bs-target="#revothrcharges<?php echo $feid; ?>"><i class="fa-solid fa-plus"></i> receive other charges</button>
    </div>
</div>
            </div>
        </div>
<!------Receive Other Charges Modal----------->
<!-- Modal -->
<div class="modal fade" id="revothrcharges<?php echo $feid; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="revothrcharges" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="revothrcharges"><?php echo $student_name; ?> Receive other Charges</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form>
    <div class="row">
            <input type="hidden" class="stnme" value="<?php echo $student_name; ?>">
    <input type="hidden" class="rolnmbr" value="<?php echo $rollno; ?>">
    <input type="hidden" class="chrgmnth" value="<?php echo date('m'); ?>">
<?php
$sl_chrge = mysqli_query($con,"select * from addOtherChargesDecieded where instituteId='$inst_id'");
if(mysqli_num_rows($sl_chrge)>0){
    while($chr = mysqli_fetch_array($sl_chrge)){
        $idt = $chr['id'];
        $charges_title = $chr['charges_title'];
        $charges_amount = $chr['charges_amount'];
        $types = $chr['type'];
if($types == 1 || $types == 5){ }else{
    ?>
<div class="col-12 col-md-4 col-lg-3 mb-3">
    <div class="input-group">
<label class="fs-6 text-capitalize me-5 fw-bold"><?php echo $charges_title; ?></label>
<label class="fs-6 text-capitalize fw-bold">Paid</label>
    </div>
    <input class="form-control" name="chgsnme[]" type="hidden" value="<?php echo $charges_title; ?>">
<div class="input-group">
    <input class="form-control" name="orgnlamnt[]" readonly type="text" onkeypress="isInputNumber(event)" value="<?php echo $charges_amount; ?>">
    <input class="form-control" name="rcveamnt[]" type="text" onkeypress="isInputNumber(event)" value="0">
</div>
    
</div>
<?php
}
    }
}else{ echo "<option value=''>There are no Add Other Charges.</option>"; }
$sl_othrchrges = mysqli_query($con,"select SUM(charges_amount) as othrtotl from addOtherChargesDecieded where instituteId='$inst_id' && class='$class' && type='4'");
while($thr = mysqli_fetch_array($sl_othrchrges)){
    $othrtotl = $thr['othrtotl'];
}
$sl_othrchrges3 = mysqli_query($con,"select SUM(charges_amount) as othrtotl3 from addOtherChargesDecieded where instituteId='$inst_id' && class='$class' && type='3'");
while($thr3 = mysqli_fetch_array($sl_othrchrges3)){
    $othrtotl3 = $thr3['othrtotl3'];
}
$sl_othrchrges2 = mysqli_query($con,"select SUM(charges_amount) as othrtotl2 from addOtherChargesDecieded where instituteId='$inst_id' && class='$class' && type='2'");
while($thr2 = mysqli_fetch_array($sl_othrchrges2)){
    $othrtotl2 = $thr2['othrtotl2'];
}
?>

<input type="hidden" value="<?php echo $inst_id; ?>" id="inid">
<input type="hidden" value="<?php echo $session; ?>" id="sessins">
<input type="hidden" value="<?php echo $class; ?>" id="clases">
<input type="hidden" value="<?php echo $section; ?>" id="sectns">
<div class="col-12 col-md-4 col-lg-3 mb-3">
    <label class="text-capitalize fs-6">Total Amount</label>
    <input type="text" class="form-control" id="totlsamnt" onkeypress="isInputNumber(event)" value="<?php echo $othrtotl+$othrtotl3+$othrtotl2; ?>">
</div>
<div class="col-12 col-md-4 col-lg-3 mb-3 mt-4">
    <button class="btn btn-apna text-uppercase revcebtn"><i class="fa-brands fa-amazon-pay"></i> Paid</button>
</div>
<div class="col-12 col-md-4 col-lg-3 mb-3 mt-4">
    <a href="other-charges-manager" class="btn btn-success"><i class="fa-solid fa-gear"></i> Manager</a>
</div>
    </div>
</form>
<script>
$(document).ready(function(){
    $(".revcebtn").on('click',function(e){
e.preventDefault();
var orgnlamnt = [];
 $('input[name="orgnlamnt[]"]').each(function(){
     orgnlamnt.push(this.value);
 });
var rcveamnt = [];
 $('input[name="rcveamnt[]"]').each(function(){
     rcveamnt.push(this.value);
 });
 var chgsnme = [];
 $('input[name="chgsnme[]"]').each(function(){
     chgsnme.push(this.value);
 });
var stnme = $(".stnme").val();
var rolnmbr = $(".rolnmbr").val();
var chrgmnth = $(".chrgmnth").val();
var inid = $("#inid").val();
var totlsamnt = $("#totlsamnt").val();
var sessins = $("#sessins").val();
var clases = $("#clases").val();
var sectns = $("#sectns").val();

$.ajax({
    url: 'ajax/other-charges-amount.php',
    type: "POST",
    data: {real_amnt:orgnlamnt,recvd_amnt:rcveamnt,chargs_name:chgsnme,stu_nme:stnme,rol_nbr:rolnmbr,chrge_mnth:chrgmnth,institu_id:inid,totl_amount:totlsamnt,aply_session:sessins,aply_class:clases,aply_section:sectns},
    success: function(othrchrges){
//alert(othrchrges);
if(othrchrges == 1){
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
  title: 'Other Charges Successfully Paid!'
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
  title: 'Other Charges is not Paid!'
})
        }
    }
});
    });
});
</script>
      </div>
<script>
function recveAmont(){
var amnt = parseInt(document.getElementById('totlsamnt').value);
var rcveamnts = parseInt(document.getElementById('rcveamnts').value);
var balnce = amnt - rcveamnts;
document.getElementById('blnces').value = balnce;
    }
</script>
    </div>
  </div>
</div>



        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mb-3 datas">
<div class="student-fee-history"></div>       
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <a href="load-all-history?rolsnmbr=<?php echo $rollno; ?> && institute=<?php echo $inst_id; ?>" target="_blank" class='btn btn-danger'><i class="fa-solid fa-file-waveform"></i> Load History</a>
  <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
    </div>
</div>  
<?php
    }
}else{ echo "<div class='alert alert-danger text-capitlaize'>there are no record found!</div>"; }

?>
<script type="text/javascript">
$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>
<script type="text/javascript">
function feeHistory(){
var institue = $("#institue").val();
var rolno = $("#rolno").val();
var stIds = $("#ides").val();
var stunme = $("#stunme").val();
var fthrnme = $(".ftrnme").val();
var clos = $("#clos").val();
var soctn = $("#soctn").val();
var sosn = $(".apsesins").val();
var userimgs = $("#userimgs").val();

$.ajax({
    url: 'ajax/fetch-monthly-charges-history.php',
    type: "POST",
    data: {schol_id:institue,st_rol:rolno,stu_id:stIds,sname:stunme,fname:fthrnme,cles:clos,sectn:soctn,sesin:sosn,st_imge:userimgs},
    success: function(histrry){
$(".student-fee-history").html(histrry);
//alert(histrry);
    }
});

}
feeHistory();
function totalfee(){
var monthlyfees = document.getElementById("monthlyfee").value;
var pre = document.getElementById("previ").value;
var dic = document.getElementById("discunt").value;
var find = document.getElementById("fins").value;
var othrchrges = parseInt(document.getElementById("othrs").value);
var exactfee = monthlyfees * 1;
var exactprev = pre * 1;
var exactjrd = exactfee + exactprev;
var discot = dic * 1;
var discountsAmntFinl = exactjrd - discot;
var mFine = find * 1;
var finlAmnt = discountsAmntFinl + mFine + othrchrges;
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
var acttype = $("#acttype").val();
var previ = $("#previ").val();
var discunt = $("#discunt").val();
var fins = $("#fins").val();
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
var adminrol = $("#adminrol").val();
var chgdtes = $(".chgdtes").val();
var dusdte = $(".dusdte").val();
var othrs = $("#othrs").val();
var selctmonth = $("#selctmonth").val();
var monthlyfee = $("#monthlyfee").val();

$.ajax({
    url: 'ajax/monthly-fee-paid.php',
    type: "POST",
    data: {fe_id:ides,act_types:acttype,previus:previ,disc:discunt,fnes:fins,tl_amnt:totlam,recives:recve,crt_blnce:curntblnce,statuses:stets,contents:remks,colg_ids:insTitues,col_rols:rolsNo,col_st_id:stuIds,colg_sname:stnmes,col_ft_name:fhrNames,colg_cls:cleses,colg_sectn:sectned,colg_sesin:sosned,Colg_st_img:usrImges,user_indentity:adminrol,clct_dats:chgdtes,due_dates:dusdte,othrs_chrges:othrs,chrge_month:selctmonth,month_fes:monthlyfee},
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
<script>
$(document).on('click','.trshalts',function(e){
e.preventDefault();
var ides = $(this).attr("rowid");

$.ajax({
    url: 'ajax/del-chalans.php',
    type: "POST",
    data: {chl_id:ides},
    success: function(losting){ 
if(losting == 1){
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
  title: "Challan Successfully Delete!"
});
feeHistory();
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
  title: "Challan is no Delete!"
});
}
    }
});

});
</script>