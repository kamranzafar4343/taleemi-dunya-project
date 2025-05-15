 <?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb p-3">
    <li class="breadcrumb-item"><a class=" text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> dashboard</li>
  </ol>
</nav>
<style>
.custom-tooltip-class {
  --bs-tooltip-bg: var(--bd-primary);
  --bs-tooltip-color: var(--bs-white);
}
.bg-dashbaord-color{ background-color:hsl(0,0%,10%); border:1px solid black; }
.card-style{
    cursor:pointer;
    transition:0.2s;
}
.card-style:hover{
    transform:translateY(3px);
    box-shadow: 0px 0px 5px yellow;
}
.card{ 
    border:1px solid hsl(0,0%,10%); 
    box-shadow:0px 0px 2px black;
}
.card:hover{
    cursor:pointer;
    box-shadow:0px 0px 5px black;
    transform:translateY(5px);
}
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  border-radius: 10px;
  border:none;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: hsl(0,0%,40%); 
  border-radius: 10px;
  height:6rem;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: hsl(0,0%,60%); 
}
.mnthlyinqury, .mnthlystdnt, .mnthlystdatt, .mnthlycolctn, .mnthlynewfe, .mnthlydefltr, .mnthpdunpads, .sprtlmnthly, .mnthlystfrcrd, .mnthlyboks, .mnthinvtry, .stdnmnthlytattdnce, .mnthlylypyrl, .mnthlystafattdnce, .mnthlyexmes{ display:none; }

</style>
<script>
$(document).ready(function(){
/// Dialy Inquiry Report    
    $("#dalyinqury").on('click',function(){
$(".dalyinqry").show();
$(".mnthlyinqury").hide();
    });
/// Monthly Inquiry Report    
    $("#mnthlyinqury").on('click',function(){
$(".dalyinqry").hide();
$(".mnthlyinqury").show();
    });
/// Dialy Students Report    
    $("#dalystudnts").on('click',function(){
$(".dalystndt").show();
$(".mnthlystdnt").hide();
    });
/// Monthly Students Report    
    $("#mnthlystudnts").on('click',function(){
$(".dalystndt").hide();
$(".mnthlystdnt").show();
    });
/// Dialy Monthly Fee Report    
    $("#dlymnthfes").on('click',function(){
$(".dalycolctn").show();
$(".mnthlycolctn").hide();
    });
/// Monthly Monthly Fee Report    
    $("#mnthlymnthfes").on('click',function(){
$(".dalycolctn").hide();
$(".mnthlycolctn").show();
    });
/// Dialy New Admission Fee Report    
    $("#dalynewfee").on('click',function(){
$(".dalynewfe").show();
$(".mnthlynewfe").hide();
    });
/// Monthly New Admission Fee Report    
    $("#mnthlynewfee").on('click',function(){
$(".dalynewfe").hide();
$(".mnthlynewfe").show();
    });
/// Dialy Other Charges Report    
    $("#dlyothrchrges").on('click',function(){
$(".dailystdatt").show();
$(".mnthlystdatt").hide();
    });
/// Monthly Other Charges Report    
    $("#mnthlyothrchrges").on('click',function(){
$(".dailystdatt").hide();
$(".mnthlystdatt").show();
    });
/// Dialy Student Attendance Report    
    $("#dlystatdnce").on('click',function(){
$(".stdntattdnce").show();
$(".stdnmnthlytattdnce").hide();
    });
/// Monthly Student Attendance Report    
    $("#mnthlystatdnce").on('click',function(){
$(".stdntattdnce").hide();
$(".stdnmnthlytattdnce").show();
    });
/// Dialy Defualter Report    
    $("#dlydeflter").on('click',function(){
$(".dlydefltr").show();
$(".mnthlydefltr").hide();
    });
/// Monthly Defualter Report    
    $("#mnthlydeflter").on('click',function(){
$(".dlydefltr").hide();
$(".mnthlydefltr").show();
    });
/// Dialy Paid / Unpaid Report    
    $("#dlypdunpd").on('click',function(){
$(".dlypdunpads").show();
$(".mnthpdunpads").hide();
    });
/// Monthly Paid / Unpaid Report    
    $("#mnthlypdunpd").on('click',function(){
$(".dlypdunpads").hide();
$(".mnthpdunpads").show();
    });
/// Dialy Student Portal Report    
    $("#dlyprtl").on('click',function(){
$(".sprtldly").show();
$(".sprtlmnthly").hide();
    });
/// Monthly Student Portal Report    
    $("#monthlyprtl").on('click',function(){
$(".sprtldly").hide();
$(".sprtlmnthly").show();
    });
/// Dialy Payroll Report    
    $("#dlypy").on('click',function(){
$(".dlypyrl").show();
$(".mnthlylypyrl").hide();
    });
/// Monthly Payroll Report    
    $("#mnthlypy").on('click',function(){
$(".dlypyrl").hide();
$(".mnthlylypyrl").show();
    });
/// Dialy Staff Attendance Report    
    $("#dlystfatd").on('click',function(){
$(".dlystafattdnce").show();
$(".mnthlystafattdnce").hide();
    });
/// Monthly Staff Attendance Report    
    $("#mnlystfatd").on('click',function(){
$(".dlystafattdnce").hide();
$(".mnthlystafattdnce").show();
    });
/// Dialy Staff Record Report    
    $("#dlystfrcrd").on('click',function(){
$(".dlystfrcrd").show();
$(".mnthlystfrcrd").hide();
    });
/// Monthly Staff Record Report    
    $("#mnthlystfrcrd").on('click',function(){
$(".dlystfrcrd").hide();
$(".mnthlystfrcrd").show();
    });
/// Dialy Accounts Report    
    $("#dlyacnt").on('click',function(){
$(".dlybok").show();
$(".mnthlyboks").hide();
    });
/// Monthly Accounts Report    
    $("#mnthlyacnt").on('click',function(){
$(".dlybok").hide();
$(".mnthlyboks").show();
    });
/// Dialy Inventory Report    
    $("#dlyinvtry").on('click',function(){
$(".dlyinvtry").show();
$(".mnthinvtry").hide();
    });
/// Monthly Inventory Report    
    $("#mnthlyinvtry").on('click',function(){
$(".dlyinvtry").hide();
$(".mnthinvtry").show();
    });




});
</script>
<!----------Student Detail----------------->
<div class="container-fluid mt-4">
    <div class="row">
<div class="col-12 col-sm-12">
    <form id="stduform">
<div class="input-group">
    <input class="form-control text-warning" type="text" id="rls-nme" placeholder="Enter Student Name / Roll No.">
    <input class="form-control" type="hidden" id="instied" value="<?php echo $userId; ?>">
    <button type="submit" id="btn-serch" class="btn btn-apna text-uppercase"><i class="fa fa-search"></i> search</button>
    <button class="btn btn-dark"><a href="#"><i class="fa-regular fa-bell text-white" style="font-size:2rem;"></i></a></button>
</div>
    </form>
<div id="stu-prfle"></div>

<script>
$(document).ready(function(){
    $("#btn-serch").on('click',function(e){
        e.preventDefault();
var rolsnbr = $("#rls-nme").val();
var institueId = $("#instied").val();
//alert(rolsnbr);
if(rolsnbr == ""){
Swal.fire({ position: 'top-end', icon: 'info', title: 'Your Field is Empty', showConfirmButton: false, timer: 1500 });
}else{
    $.ajax({
    url: 'ajax/ajax-serchs-dash.php',
    type: "POST",
    data: {serch_vle:rolsnbr,instit_id:institueId},
    success: function(data){
    $("#stu-prfle").html(data);
//    $("#stduform").trigger("reset");

        
    }
}); 
}
    });
          });
</script>
<?php
$sl_selsesn = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc limit 1");
while($ses_reslt=mysqli_fetch_array($sl_selsesn)){
    $session = $ses_reslt['session'];
}
$crntdte = date("d-m-Y");
$crntmonth = date("m");
?>
        </div>
    </div>
<!-----Staart First Category Panel--------->
    <div class="row mt-2">
        <div class="col mb-3">
            <div class="card" style="background-color:hsl(0,0%,14%);">
<div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
    <h6 class="fs-6 fw-bold text-center text-white text-uppercase p-2"><i class="fa-solid fa-user"></i> Inquiry reports</h6>
</div>    
<div class="card-body py-0">
    <div class="d-flex">
<div class="p-1">
    <span id="dalyinqury" style="font-size:0.9rem;color:hsl(0,0%,80%);">Daily</span>
</div>
<div class="p-1">
    <span id="mnthlyinqury" style="font-size:0.9rem;color:hsl(0,0%,80%);">Total</span>
</div>
<div class="p-1">
    <span style="font-size:0.9rem;color:hsl(0,0%,80%);">Graph</span>
</div>
    </div>
<div class="dalyinqry">
<?php
$dlyinqstd = mysqli_query($con,"select * from studentInquiry where instituteId='$userId' && dates='$crntdte'");
$count_dlyinqstd = mysqli_num_rows($dlyinqstd);

$dlyinqstf = mysqli_query($con,"select * from staffInquiry where InstituteID='$userId' && dates='$crntdte'");
$count_dlyinqstf = mysqli_num_rows($dlyinqstd);
?>
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php echo $count_dlyinqstd; ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php echo $count_dlyinqstf; ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">student</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">staff</div>
    </div>
</div>
<?php
$totlinqstd = mysqli_query($con,"select * from studentInquiry where instituteId='$userId'");
$count_totlinqstd = mysqli_num_rows($totlinqstd);

$totlinqstf = mysqli_query($con,"select * from staffInquiry where InstituteID='$userId'");
$count_totlinqstf = mysqli_num_rows($totlinqstf);
?>
<div class="mnthlyinqury">
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php echo $count_totlinqstd; ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php echo $count_totlinqstf; ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">student</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">staff</div>
    </div>
</div>
    </div>    
            </div>
        </div>
        <div class="col mb-3">
            <div class="card" style="background-color:hsl(0,0%,14%);">
<div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
    <h6 class="fs-6 fw-bold text-center text-white text-uppercase p-2"><i class="fa-solid fa-user-plus"></i> student records</h6>
</div>    
<div class="card-body py-0">
    <div class="d-flex">
<div class="p-1">
    <span id="dalystudnts" style="font-size:0.9rem;color:hsl(0,0%,80%);">Daily</span>
</div>
<div class="p-1">
    <span id="mnthlystudnts" style="font-size:0.9rem;color:hsl(0,0%,80%);">Total</span>
</div>
<div class="p-1">
    <span style="font-size:0.9rem;color:hsl(0,0%,80%);">Graph</span>
</div>
    </div>
<div class="dalystndt">
<?php
$dlystdrcrd = mysqli_query($con,"select * from addStudents where instituteId='$userId' && admissionDate='$crntdte'");
$cntstdnt = mysqli_num_rows($dlystdrcrd);
$lftstdnt = mysqli_query($con,"select * from leftStudents where instituteId='$userId' && admissionDate='$crntdte'");
$cntleft = mysqli_num_rows($lftstdnt);
?>
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php echo $cntstdnt; ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php echo $cntleft; ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Total</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">Left</div>
    </div>
</div>
<?php
$totlstdrcrd = mysqli_query($con,"select * from addStudents where instituteId='$userId'");
$cntstdnt_totl = mysqli_num_rows($totlstdrcrd);
$lftstdnt_totl = mysqli_query($con,"select * from leftStudents where instituteId='$userId'");
$cntleft_totl = mysqli_num_rows($lftstdnt_totl);
?>
<div class="mnthlystdnt">
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php echo $cntstdnt_totl; ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php echo $cntleft_totl; ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Total</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">Left</div>
    </div>
</div>
    
</div>    
            </div>
        </div>
        
        <div class="col mb-3">
            <div class="card" style="background-color:hsl(0,0%,14%);">
<div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
    <h6 class="fs-6 fw-bold text-center text-white text-uppercase p-2"><i class="fa-solid fa-rupee-sign"></i> Monthly Fee</h6>
</div>    
<div class="card-body py-0">
    <div class="d-flex">
<div class="p-1">
    <span id="dlymnthfes" style="font-size:0.9rem;color:hsl(0,0%,80%);">Daily</span>
</div>
<div class="p-1">
    <span id="mnthlymnthfes" style="font-size:0.9rem;color:hsl(0,0%,80%);">Monthly</span>
</div>
<div class="p-1">
    <span style="font-size:0.9rem;color:hsl(0,0%,80%);">Graph</span>
</div>
    </div>
<div class="dalycolctn">
<?php
$dlyclctn = mysqli_query($con,"select SUM(receive_monthly) as mnthlyfe from fee_collection where instituteId='$userId' && receive_date='$crntdte'");
while($cltn = mysqli_fetch_array($dlyclctn)){
    $mnthlyfe = $cltn['mnthlyfe'];
}

$mnthlyclctns = mysqli_query($con,"select SUM(receive_monthly) as mnthlyfes from fee_collection where instituteId='$userId' && month='$crntmonth' && session='$session'");
while($mcltn = mysqli_fetch_array($mnthlyclctns)){
    $mnthlyfes = $mcltn['mnthlyfes'];
}

$totlclctn = mysqli_query($con,"select SUM(totalFee) as mnthfes from addStudents where instituteId='$userId'");
while($tols = mysqli_fetch_array($totlclctn)){
    $mnthfes = $tols['mnthfes'];
}
$pendings = $mnthfes - $mnthlyfe;
$mnth_pendngs = $mnthfes-$mnthlyfes
?>
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php if(!empty($mnthlyfe)){ echo round($mnthlyfe); }else{ echo "0"; }  ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php if(!empty($pendings)){ echo round($pendings); }else{ echo "0"; } ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Collection</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">pending</div>
    </div>    
</div>
<div class="mnthlycolctn">
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php if(!empty($mnthlyfes)){ echo round($mnthlyfes); }else{ echo "0"; } ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php if(!empty($mnth_pendngs)){ echo round($mnth_pendngs); }else{ echo "0"; } ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Collection</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">pending</div>
    </div>
</div>

</div>    
            </div>
        </div>
        <div class="col mb-3">
            <div class="card" style="background-color:hsl(0,0%,14%);">
<div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
    <h6 class="fs-6 fw-bold text-center text-white text-uppercase p-2"><i class="fa-solid fa-user-tag"></i> New AD. Fee</h6>
</div>    
<div class="card-body py-0">
    <div class="d-flex">
<div class="p-1">
    <span id="dalynewfee" style="font-size:0.9rem;color:hsl(0,0%,80%);">Daily</span>
</div>
<div class="p-1">
    <span id="mnthlynewfee" style="font-size:0.9rem;color:hsl(0,0%,80%);">Monthly</span>
</div>
<div class="p-1">
    <span style="font-size:0.9rem;color:hsl(0,0%,80%);">Graph</span>
</div>
    </div>
<div class="dalynewfe">
<?php
$nwadmsndly = mysqli_query($con,"select * from new_admission_collection where instituteId='$userId' && dates='$crntdte'");
$countnewdly = mysqli_num_rows($nwadmsndly);

$nwadmsnmnthly = mysqli_query($con,"select * from new_admission_collection where instituteId='$userId' && month='$crntmonth' && session='$session'");
$countnewmnthly = mysqli_num_rows($nwadmsnmnthly);

$nwadmsndlyamnt = mysqli_query($con,"select SUM(receive_amount) as recvngs from new_admission_collection where instituteId='$userId' && dates='$crntdte'");
while($nw = mysqli_fetch_array($nwadmsndlyamnt)){
    $recvngs = $nw['recvngs'];
}

$nwadmsnmnthlyamnt = mysqli_query($con,"select SUM(receive_amount) as mnthlyrecvngs from new_admission_collection where instituteId='$userId' && month='$crntmonth' && session='$session'");
while($nwmnthly = mysqli_fetch_array($nwadmsnmnthlyamnt)){
    $mnthlyrecvngs = $nwmnthly['mnthlyrecvngs'];
}
?>
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php echo $countnewdly; ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php if(!empty($recvngs)){ echo round($recvngs); }else{ echo "0"; } ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Strength</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">Received</div>
    </div>
</div>
<div class="mnthlynewfe">
<div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php echo $countnewmnthly; ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php if(!empty($mnthlyrecvngs)){ echo round($mnthlyrecvngs); }else{ echo "0"; } ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Strength</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">Received</div>
    </div>    
</div>

</div>    
            </div>
        </div>
        <div class="col mb-3">
            <div class="card" style="background-color:hsl(0,0%,14%);">
<div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
    <h6 class="fs-6 fw-bold text-center text-white text-uppercase p-2"><i class="fa-solid fa-coins"></i> Other Charges</h6>
</div>    
<div class="card-body py-0">
    <div class="d-flex">
<div class="p-1">
    <span id="dlyothrchrges" style="font-size:0.9rem;color:hsl(0,0%,80%);">Daily</span>
</div>
<div class="p-1">
    <span id="mnthlyothrchrges" style="font-size:0.9rem;color:hsl(0,0%,80%);">Monthly</span>
</div>
<div class="p-1">
    <span style="font-size:0.9rem;color:hsl(0,0%,80%);">Graph</span>
</div>
    </div>
    <div class="dailystdatt">
<?php
/*
$dlyevnt = mysqli_query($con,"select SUM(receive_amount) as evntchrges from otherChargesPaid where instituteId='$userId' && chrge_date='$crntdte' && type='2'");
while($evnt = mysqli_fetch_array($dlyevnt)){
    $evntchrges = $evnt['evntchrges'];
}
$dlyexme = mysqli_query($con,"select SUM(receive_amount) as exmechrges from otherChargesPaid where instituteId='$userId' && chrge_date='$crntdte' && type='4'");
while($eme = mysqli_fetch_array($dlyexme)){
    $exmechrges = $eme['exmechrges'];
}
$mnthlyevnt = mysqli_query($con,"select SUM(receive_amount) as mntlyevntchrges from otherChargesPaid where instituteId='$userId' && months='$crntmonth' && type='2' && session='$session'");
while($evntmnth = mysqli_fetch_array($mnthlyevnt)){
    $mntlyevntchrges = $evntmnth['mntlyevntchrges'];
}
$mnthlyexme = mysqli_query($con,"select SUM(receive_amount) as mntlyexmechrges from otherChargesPaid where instituteId='$userId' && months='$crntmonth' && type='4' && session='$session'");
while($ememnth = mysqli_fetch_array($mnthlyexme)){
    $mntlyexmechrges = $ememnth['mntlyexmechrges'];
}
*/
?>
<div class="d-flex">
    <div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php //if(!empty($evntchrges)){ echo round($evntchrges); }else{ echo "0"; } ?> 0</div>
    <div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php //if(!empty($exmechrges)){ echo round($exmechrges); }else{ echo "0"; }?> 0</div>
</div>
<div class="d-flex">
    <div class="flex-fill p-2 text-capitalize text-white text-center">event</div>
    <div class="flex-fill p-2 text-capitalize text-white text-center">exame</div>
</div>    
    </div>
    <div class="mnthlystdatt">
<div class="d-flex">
    <div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php //if(!empty($mntlyevntchrges)){ echo round($mntlyevntchrges); }else{ echo "0"; } ?></div>
    <div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php //if(!empty($mntlyexmechrges)){ echo round($mntlyexmechrges); }else{ echo "0"; } ?></div>
</div>
<div class="d-flex">
    <div class="flex-fill p-2 text-capitalize text-white text-center">event</div>
    <div class="flex-fill p-2 text-capitalize text-white text-center">exame</div>
</div>    
    </div>
</div>    
            </div>
        </div>
         
    </div>
<div class="row mb-4">
    <div class="col-5">
<div class="card" style="background-color:hsl(0,0%,14%);">
    <div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
        <h6 class="fs-6 fw-bold text-white text-uppercase p-2"><i class="fa-solid fa-coins"></i> Student attendance</h6>
    </div>    
    <div class="card-body py-0 mb-3">
        <div class="d-flex">
            <div class="p-1">
                <a href="#" class="text-decoration-none" id="dlystatdnce" style="font-size:0.9rem;color:hsl(0,0%,80%);">Daily</a>
            </div>
            <div class="p-1">
                <a href="#" class="text-decoration-none" id="mnthlystatdnce" style="font-size:0.9rem;color:hsl(0,0%,80%);">Monthly</a>
            </div>
        </div>
        <div class="stdntattdnce">
<canvas id="stdntattdnce" style="width:100%;">            
        </div>
        <div class="stdnmnthlytattdnce">
<canvas id="stdnmnthlytattdnce" style="width:100%;">            
        </div>
    </div>
</div>
    </div>
    <div class="col-3">
<div class="card" style="background-color:hsl(0,0%,14%);">
    <div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
        <h6 class="fs-6 fw-bold text-white text-uppercase p-2"> To Do List</h6>
    </div>    
    <div class="card-body py-0">
<form class="rmdnrFrm">
    <div class="row">
<div class="col mb-3">
    <label class="fs-6 text-capitalize">Description</label>
    <div class="input-group">
        <input type="hidden" value="<?php echo $userId; ?>" class="instutid">
        <input type="hidden" value="<?php echo $role; ?>" class="usrrol">
        <input type="hidden" value="<?php echo date("Y-m-d"); ?>" class="dtesrmder">
        <input type="hidden" value="<?php echo date("h:i:sa"); ?>" class="timss">
        <textarea class="form-control dscrptn" rows="1"></textarea>
        <button class="btn text-warning sendrmder" type="submit"><i class="fa-regular fa-share-from-square"></i></button>
    </div>
</div>
    </div>
</form>
<script>
function remindrData(){
    var instutid = $(".instutid").val();
    var usrrol = $(".usrrol").val();
$.ajax({
url: 'ajax/reminder-fetch-record-single.php',
type: "POST",
data: {inst_ds:instutid,rol_s:usrrol},
success: function(recordrem){
    $(".remindr-record").html(recordrem);

}
    });
}
remindrData();
$(document).ready(function(){
    $(".sendrmder").on('click',function(e){
e.preventDefault();
var instutid = $(".instutid").val();
var dtesrmder = $(".dtesrmder").val();
var timss = $(".timss").val();
var dscrptn = $(".dscrptn").val();
var usrrol = $(".usrrol").val();
if(dscrptn != ""){
    $.ajax({
url: 'ajax/reminder-inserted.php',
type: "POST",
data: {int_ids:instutid,rem_dte:dtesrmder,rem_time:timss,remks:dscrptn,rl_out:usrrol},
success: function(sndrdescptn){ 
if(sndrdescptn == 1){
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
  title: "To Do List Successfully Saved!"
});
remindrData();
$(".rmdnrFrm").trigger("reset");
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
  title: "Description is not Save!"
});
    }
    
}
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
  icon: "info",
  title: "Please Enter the Description!"
});
}
    });
});
</script>
<div class="remindr-record"></div>
    </div>           
</div>
    </div>
    <div class="col-4">
<div class="card" style="background-color:hsl(0,0%,14%);">
    <div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
        <h6 class="fs-6 fw-bold text-white text-uppercase p-2"> daily Summary</h6>
    </div>    
    <div class="card-body py-0">
<div class="row mt-2">
    <div class="col-6 mb-3 px-2 p-0">
        <div class="card">
<div class="card-body text-white text-center">
    Inquiry
<div class="text-center"><?php echo $count_dlyinqstd; ?></div>
</div>
        </div>
    </div>
    <div class="col-6 mb-3 px-2 p-0">
        <div class="card">
<div class="card-body text-white text-center">
    Students
<div class="text-center"><?php echo $count_dlyinqstf; ?></div>
</div>
        </div>
    </div>
    <div class="col-6 mb-3 px-2 p-0">
        <div class="card">
<div class="card-body text-white text-center">
    Student Attendance
<div class="text-center">0</div>
</div>
        </div>
    </div>
    <div class="col-6 mb-3 px-2 p-0">
        <div class="card">
<div class="card-body text-white text-center">
    Staff
<div class="text-center">0</div>
</div>
        </div>
    </div>
    <div class="col-6 mb-3 px-2 p-0">
        <div class="card">
<div class="card-body text-white text-center">
    Staff Attendance
<div class="text-center">0</div>
</div>
        </div>
    </div>
    <div class="col-6 mb-3 px-2 p-0">
        <div class="card">
<div class="card-body text-white text-center">
    Accounts
<div class="text-center">0</div>
</div>
        </div>
    </div>
</div>
        
    </div>
</div>  
    </div>
</div>
    
    <div class="row">
        
        <div class="col mb-3">
           <div class="card" style="background-color:hsl(0,0%,14%);">
<div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
    <h6 class="fs-6 fw-bold text-center text-white text-uppercase p-2"><i class="fa-solid fa-masks-theater"></i> Exames</h6>
</div>
<div class="card-body py-0">
    <div class="d-flex">
<?php 
$sel_trms = mysqli_query($con,"select * from addTerms where instituteId='$userId' order by id desc limit 0,3");
while($tms = mysqli_fetch_array($sel_trms)){
$termid = $tms['termid'];
$term = $tms['term'];
 } ?>
<div class="p-1">
    <span id="dlyexmes" style="font-size:0.9rem;color:hsl(0,0%,80%);">Daily</span>
</div>
<div class="p-1">
    <span id="mnthlyexames" style="font-size:0.9rem;color:hsl(0,0%,80%);">Monthly</span>
</div>
<div class="p-1">
    <span style="font-size:0.9rem;color:hsl(0,0%,80%);">Graph</span>
</div>
    </div>
<div class="dlyexmes">
<?php
$sel_pas = mysqli_query($con,"select * from finalResults where instituteId='$userId' && overall_status='Pass'");
$cntps = mysqli_num_rows($sel_pas);
$sel_fel = mysqli_query($con,"select * from finalResults where instituteId='$userId' && overall_status='Fail'");
$cntfal = mysqli_num_rows($sel_fel);
?>
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php echo $cntps; ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php echo $cntfal; ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Pass</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">Fail</div>
    </div>
</div>
<div class="mnthlyexmes">
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);">0</div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);">0</div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Pass</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">Fail</div>
    </div>
</div>
     
</div>    
            </div>
        </div>

        <div class="col mb-3">
           <div class="card" style="background-color:hsl(0,0%,14%);">
<div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
    <h6 class="fs-6 fw-bold text-center text-white text-uppercase p-2"><i class="fa-solid fa-masks-theater"></i> Defaulters</h6>
</div>    
<div class="card-body py-0">
    <div class="d-flex">
<div class="p-1">
    <span id="dlydeflter" style="font-size:0.9rem;color:hsl(0,0%,80%);">Daily</span>
</div>
<div class="p-1">
    <span id="mnthlydeflter" style="font-size:0.9rem;color:hsl(0,0%,80%);">Monthly</span>
</div>
<div class="p-1">
    <span style="font-size:0.9rem;color:hsl(0,0%,80%);">Graph</span>
</div>
    </div>
<div class="dlydefltr">
<?php
$slt_defltr = mysqli_query($con,"select * from fee_collection where instituteId='$userId' && dates='$crntdte' && fees_status='Unpaid'");
$cntfeflter = mysqli_num_rows($slt_defltr);

$slt_defltrmnth = mysqli_query($con,"select * from fee_collection where instituteId='$userId' && month='$crntmonth' && fees_status='Unpaid' && session='$session'");
$cntfefltermnth = mysqli_num_rows($slt_defltrmnth);

$dflter_amnt = mysqli_query($con,"select SUM(monthly_fee) as unpdamnt from fee_collection where instituteId='$userId' && dates='$crntdte' && fees_status='Unpaid'");
while($fes = mysqli_fetch_array($dflter_amnt)){
    $unpdamnt = $fes['unpdamnt'];
}

$dflter_amntmnth = mysqli_query($con,"select SUM(monthly_fee) as unpdamntmnth from fee_collection where instituteId='$userId' && month='$crntmonth' && fees_status='Unpaid' && session='$session'");
while($fesmnth = mysqli_fetch_array($dflter_amntmnth)){
    $unpdamntmnth = $fesmnth['unpdamntmnth'];
}
?>
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php echo $cntfeflter; ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php if(!empty($unpdamnt)){ echo round($unpdamnt); }else{ echo "0"; } ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Strength</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">amount</div>
    </div>
</div>
<div class="mnthlydefltr">
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php echo $cntfefltermnth; ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php if(!empty($unpdamntmnth)){ echo round($unpdamntmnth); }else{ echo "0"; } ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Strength</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">amount</div>
    </div>
</div>
     
</div>    
            </div>
        </div>
        <div class="col mb-3">
            <div class="card" style="background-color:hsl(0,0%,14%);">
<div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
    <h6 class="fs-6 fw-bold text-center text-white text-uppercase p-2"><i class="fa-solid fa-file-invoice-dollar"></i> Paid / Unpaid</h6>
</div>    
<div class="card-body py-0">
    <div class="d-flex">
<div class="p-1">
    <span id="dlypdunpd" style="font-size:0.9rem;color:hsl(0,0%,80%);">Daily</span>
</div>
<div class="p-1">
    <span id="mnthlypdunpd" style="font-size:0.9rem;color:hsl(0,0%,80%);">Monthly</span>
</div>
<div class="p-1">
    <span style="font-size:0.9rem;color:hsl(0,0%,80%);">Graph</span>
</div>
    </div>
<?php
$slt_pad = mysqli_query($con,"select SUM(receive_monthly) as dlyreceived from fee_collection where instituteId='$userId' && receive_date='$crntdte' && fees_status='paid'");
while($dlyrcvd = mysqli_fetch_array($slt_pad)){
    $dlyreceived = $dlyrcvd['dlyreceived'];
}
$unpd_amnts = mysqli_query($con,"select SUM(monthly_fee) as dlymnthlyfes from fee_collection where instituteId='$userId' && dates='$crntdte' && fees_status='Unpaid'");
while($dlyunpd = mysqli_fetch_array($unpd_amnts)){
    $dlymnthlyfes = $dlyunpd['dlymnthlyfes'];
}

$slt_padmnth = mysqli_query($con,"select SUM(receive_monthly) as mtslyreceived from fee_collection where instituteId='$userId' && month='$crntmonth' && session='$session' && fees_status='paid'");
while($mnthslyrcvd = mysqli_fetch_array($slt_padmnth)){
    $mtslyreceived = $mnthslyrcvd['mtslyreceived'];
}
$unpd_amntsmnth = mysqli_query($con,"select SUM(monthly_fee) as mtslymnthlyfes from fee_collection where instituteId='$userId' && month='$crntmonth' && session='$session' && fees_status='Unpaid'");
while($mntslyunpd = mysqli_fetch_array($unpd_amntsmnth)){
    $mtslymnthlyfes = $mntslyunpd['mtslymnthlyfes'];
}
?>
<div class="dlypdunpads">
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php if(!empty($dlyreceived)){ echo round($dlyreceived); }else{ echo "0"; } ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php if(!empty($dlymnthlyfes)){ echo round($dlymnthlyfes); }else{ echo "0"; } ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Paid</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">Unpaid</div>
    </div>
</div>
<div class="mnthpdunpads">
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php if(!empty($mtslyreceived)){ echo round($mtslyreceived); }else{ echo "0"; } ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php if(!empty($mtslymnthlyfes)){ echo round($mtslymnthlyfes); }else{ echo "0"; } ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Paid</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">Unpaid</div>
    </div>
</div>
     
</div>    
            </div>
        </div>
        <div class="col mb-3">
            <div class="card" style="background-color:hsl(0,0%,14%);">
<div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
    <h6 class="fs-6 fw-bold text-center text-white text-uppercase p-2"><i class="fa-solid fa-globe"></i> Student Portal</h6>
</div>    
<div class="card-body py-0">
    <div class="d-flex">
<div class="p-1">
    <span id="dlyprtl" style="font-size:0.9rem;color:hsl(0,0%,80%);">Daily</span>
</div>
<div class="p-1">
    <span id="monthlyprtl" style="font-size:0.9rem;color:hsl(0,0%,80%);">Monthly</span>
</div>
<div class="p-1">
    <span style="font-size:0.9rem;color:hsl(0,0%,80%);">Graph</span>
</div>
    </div>
<div class="sprtldly">
<?php
$sel_studntprtl = mysqli_query($con,"select * from studentPortal where instituteId='$userId' && admissionDate='$crntdte'");
$cntsstdnt = mysqli_num_rows($sel_studntprtl);
$sel_stfprtl = mysqli_query($con,"select * from staffPortal where instituteId='$userId' && joiningDate='$crntdte'");
$cntsstfs = mysqli_num_rows($sel_stfprtl);

$sel_stfprtlmnth = mysqli_query($con,"select * from staffPortal where instituteId='$userId' && month='$crntmonth' && session='$session'");
$cntsstfsmtnh = mysqli_num_rows($sel_stfprtlmnth);
?>
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php echo $cntsstdnt; ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php echo $cntsstfs; ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">student</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">staff</div>
    </div>
</div>
<div class="sprtlmnthly">
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);">125</div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php echo $cntsstfsmtnh; ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">student</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">staff</div>
    </div>
</div>
     
</div>    
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4 mb-3">
<div class="card" style="background-color:hsl(0,0%,14%);">
    <div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
        <h6 class="fs-6 fw-bold text-center text-white text-uppercase p-2"><i class="fa-solid fa-chart-column"></i> accounts</h6>
    </div>    
    <div class="card-body py-0 mb-5">
        <div class="d-flex">
<div class="p-1">
    <span id="dlyacnt" style="font-size:0.9rem;color:hsl(0,0%,80%);">Daily</span>
</div>
<div class="p-1">
    <span id="mnthlyacnt" style="font-size:0.9rem;color:hsl(0,0%,80%);">Monthly</span>
</div>
    </div>
<div class="dlybok">
    <canvas id="dalydaybok" style="width:100%;">
</div>
<div class="mnthlyboks">
    <canvas id="mntlydaybok" style="width:100%;">
</div>

    </div>    
</div>
        </div>
        <div class="col-8 mb-3">
    <div class="card" style="background-color:hsl(0,0%,14%);">
        <div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
        <h6 class="fs-6 fw-bold text-center text-white text-uppercase p-2">
            <i class="fa-solid fa-person-circle-check"></i> staff attendance
        </h6>
    </div>    
    <div class="card-body py-0 mb-3">
        <div class="d-flex">
    <div class="p-1">
        <span id="dlystfatd" style="font-size:0.9rem;color:hsl(0,0%,80%);">Daily</span>
    </div>
    <div class="p-1">
        <span id="mnlystfatd" style="font-size:0.9rem;color:hsl(0,0%,80%);">Monthly</span>
    </div>
        </div>
<div class="dlystafattdnce">
    <div id="stafatndce" style="width:100%;height:300px;"></div>
</div>
<div class="mnthlystafattdnce">
    <canvas id="mnthlystafattdnce" style="width:100%;">
</div>
    </div>    
</div>
        </div>
        
    </div>
    <div class="row">
        <div class="col mb-3">
            <div class="card" style="background-color:hsl(0,0%,14%);">
<div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
    <h6 class="fs-6 fw-bold text-center text-white text-uppercase p-2"><i class="fa-solid fa-person"></i> Staff record</h6>
</div>    
<div class="card-body py-0">
    <div class="d-flex">
<div class="p-1">
    <span id="dlystfrcrd" style="font-size:0.9rem;color:hsl(0,0%,80%);">Daily</span>
</div>
<div class="p-1">
    <span id="mnthlystfrcrd" style="font-size:0.9rem;color:hsl(0,0%,80%);">Monthly</span>
</div>
<div class="p-1">
    <span style="font-size:0.9rem;color:hsl(0,0%,80%);">Graph</span>
</div>
    </div>
<div class="dlystfrcrd">
<?php
$addStaff = mysqli_query($con,"select * from addStaff where instituteId='$userId' && joiningDate='$crntdte'");
$cntstafs = mysqli_num_rows($addStaff);
$lftstafs = mysqli_query($con,"select * from leftStaff where instituteId='$userId' && joiningDate='$crntdte'");
$cntlefts = mysqli_num_rows($lftstafs);

$addStaffmnths = mysqli_query($con,"select * from addStaff where instituteId='$userId' && month='$crntmonth' && session='$session'");
$cntstafsmtnhs = mysqli_num_rows($addStaffmnths);
$lftstafsmnths = mysqli_query($con,"select * from leftStaff where instituteId='$userId' && month='$crntmonth' && session='$session'");
$cntleftsmths = mysqli_num_rows($lftstafsmnths);
?>
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php echo $cntstafs; ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php echo $cntlefts; ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Total</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">Left</div>
    </div>
</div>
<div class="mnthlystfrcrd">
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php echo $cntstafsmtnhs; ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php echo $cntleftsmths; ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Total</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">Left</div>
    </div>
</div>
     
</div>    
            </div>
        </div>
        <div class="col mb-3">
            <div class="card" style="background-color:hsl(0,0%,14%);">
<div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
    <h6 class="fs-6 fw-bold text-center text-white text-uppercase p-2">
            <i class="fa-solid fa-money-bill-1-wave"></i> payroll
        </h6>
</div>    
<div class="card-body py-0">
    <div class="d-flex">
    <div class="p-1">
        <span id="dlypy" style="font-size:0.9rem;color:hsl(0,0%,80%);">Amount</span>
    </div>
    <div class="p-1">
        <span id="mnthlypy" style="font-size:0.9rem;color:hsl(0,0%,80%);">Strength</span>
    </div>
    <div class="p-1">
        <span style="font-size:0.9rem;color:hsl(0,0%,80%);">Graph</span>
    </div>
        </div>
        <div class="dlypyrl">
<?php
$sel_pyable_amnt = mysqli_query($con,"select SUM(salary) as totlsalres from addStaff where instituteId='$userId' && session='$session'");
while($tlslry = mysqli_fetch_array($sel_pyable_amnt)){
    $totlsalres = $tlslry['totlsalres'];
}
$sel_paids = mysqli_query($con,"select SUM(pay_amount) as padamnts  from payroll where instituteId='$userId' && month='$crntmonth' && session='$session'");
while($pdslry = mysqli_fetch_array($sel_paids)){
    $padamnts = $pdslry['padamnts'];
}
?>
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php echo round($totlsalres); ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php echo round($padamnts); ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Total</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">Paid</div>
    </div>
        </div>
<div class="mnthlylypyrl">
<?php
$sel_pyable = mysqli_query($con,"select * from addStaff where instituteId='$userId' && session='$session'");
$cntspybles = mysqli_num_rows($sel_pyable);
$sel_paids = mysqli_query($con,"select * from payroll where instituteId='$userId' && month='$crntmonth' && session='$session'");
$cntspaids = mysqli_num_rows($sel_paids);
?>
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);"><?php echo $cntspybles;  ?></div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);"><?php echo $cntspaids; ?></div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Payables</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">Paid</div>
    </div>
</div>

     
</div>    
            </div>
        </div>
        <div class="col mb-3">
            <div class="card" style="background-color:hsl(0,0%,14%);">
<div class="card-header p-1" style="background-color:hsl(0,0%,11%);">
    <h6 class="fs-6 fw-bold text-center text-white text-uppercase p-2"><i class="fa-solid fa-warehouse"></i> inventory</h6>
</div>    
<div class="card-body py-0">
    <div class="d-flex">
<div class="p-1">
    <span id="dlyinvtry" style="font-size:0.9rem;color:hsl(0,0%,80%);">Daily</span>
</div>
<div class="p-1">
    <span id="mnthlyinvtry" style="font-size:0.9rem;color:hsl(0,0%,80%);">Monthly</span>
</div>
<div class="p-1">
    <span style="font-size:0.9rem;color:hsl(0,0%,80%);">Graph</span>
</div>
    </div>
<div class="dlyinvtry">
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);">0</div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);">0</div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Total</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">Sale</div>
    </div>    
</div>
<div class="mnthinvtry">
    <div class="d-flex">
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,5%);">0</div>
<div class="flex-fill p-2 text-white text-center fs-3 fw-bold" style="background-color:hsl(0,0%,10%);">0</div>
    </div>
    <div class="d-flex">
<div class="flex-fill p-2 text-capitalize text-white text-center">Total</div>
<div class="flex-fill p-2 text-capitalize text-white text-center">Sale</div>
    </div>    
</div>
     
</div>    
            </div>
        </div>
    </div>
    
<!-------End First Category Panel--------->



</div>



<!-- Vendor JS Files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Template Main JS File -->
<script type="text/javascript">
 $('#student-fees .owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav:false,
    autoplay:true,
    autoplayTimeout:6000,
    responsiveClass:true,
    animateIn:'fadeIn',
    animateOut:'fadeOut',
    responsive:{
        0:{
            items:3
        },
        600:{
            items:4
        },
        1000:{
            items:5
        },
        1200:{
            items:8
        },
        1400:{
            items:8
        }
    }
});
 $('#student-fee .owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav:false,
    autoplay:true,
    autoplayTimeout:6000,
    responsiveClass:true,
    animateIn:'fadeIn',
    animateOut:'fadeOut',
    responsive:{
        0:{
            items:3
        },
        600:{
            items:4
        },
        1000:{
            items:5
        },
        1200:{
            items:8
        },
        1400:{
            items:8
        }
    }
});

</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
/// Student Attendance Report
<?php
$tdydate = date("Y-m-d");
$sel_attdncep = mysqli_query($con,"select * from attandance where instituteId='$userId' && date='$tdydate' && status='P'");
$cntp = mysqli_num_rows($sel_attdncep);
$sel_attdncea = mysqli_query($con,"select * from attandance where instituteId='$userId' && date='$tdydate' && status='A'");
$cnta = mysqli_num_rows($sel_attdncea);
$sel_attdncel = mysqli_query($con,"select * from attandance where instituteId='$userId' && date='$tdydate' && status='L'");
$cntl = mysqli_num_rows($sel_attdncel);
$sel_attdnceh = mysqli_query($con,"select * from attandance where instituteId='$userId' && date='$tdydate' && status='H'");
$cnth = mysqli_num_rows($sel_attdnceh);
?>
var xValues = ["Present","Absents","Leaves","Holidays"];
var yValues = [<?php echo $cntp; ?>,<?php echo $cnta; ?>,<?php echo $cntl; ?>,<?php echo $cnth; ?>];
var barColors = [
  "hsl(120,100%,40%)",
  "hsl(0,100%,50%)",
  "hsl(35,100%,50%)",
  "hsl(271, 100%, 57%)",
];
var barBorders = [
  "hsl(120,100%,40%)",
  "hsl(0,100%,50%)",
  "hsl(35,100%,50%)",
  "hsl(271, 100%, 57%)",
];
new Chart("stdntattdnce", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      borderColor: barBorders,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
    }
    
  }
});

/// Student Monthly Attendance Report
<?php
$sel_attdncepmnth = mysqli_query($con,"select * from attandance where instituteId='$userId' && month='$crntmonth' && status='P' && session='$session'");
$cntpmnth = mysqli_num_rows($sel_attdncepmnth);
$sel_attdnceamnth = mysqli_query($con,"select * from attandance where instituteId='$userId' && month='$crntmonth' && status='A' && session='$session'");
$cntamnth = mysqli_num_rows($sel_attdnceamnth);
$sel_attdncelmnth = mysqli_query($con,"select * from attandance where instituteId='$userId' && month='$crntmonth' && status='L' && session='$session'");
$cntlmnth = mysqli_num_rows($sel_attdncelmnth);
$sel_attdncehmnth = mysqli_query($con,"select * from attandance where instituteId='$userId' && month='$crntmonth' && status='H' && session='$session'");
$cnthmnth = mysqli_num_rows($sel_attdncehmnth);
?>
var xValues = ["Present","Absents","Leaves","Holidays"];
var yValues = [<?php if(!empty($cntpmnth)){ echo $cntpmnth; }else{ echo "1"; } ?>,<?php if(!empty($cntamnth)){ echo $cntamnth; }else{ echo "1"; } ?>,<?php if(!empty($cntlmnth)){ echo $cntlmnth; }else{ echo "1"; } ?>,<?php if(!empty($cnthmnth)){ echo $cnthmnth; }else{ echo "1"; } ?>];
var barColors = [
  "hsl(120,100%,40%)",
  "hsl(0,100%,50%)",
  "hsl(35,100%,50%)",
  "hsl(271, 100%, 57%)",
];
var barBorders = [
  "hsl(120,100%,40%)",
  "hsl(0,100%,50%)",
  "hsl(35,100%,50%)",
  "hsl(271, 100%, 57%)",
];
new Chart("stdnmnthlytattdnce", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      borderColor: barBorders,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
    }
    
  }
});
/// Staff Monthly Attendance
<?php
$sl_atdncepmnth = mysqli_query($con,"select * from staffAttendance where instituteId='$userId' && month='$crntmonth' && session='$session' && status='P'");
$contpmthnstaf = mysqli_num_rows($sl_atdncepmnth);
$sl_atdnceamnths = mysqli_query($con,"select * from staffAttendance where instituteId='$userId' && month='$crntmonth' && session='$session' && status='A'");
$contamnthstf = mysqli_num_rows($sl_atdnceamnths);
$sl_atdncelmnths = mysqli_query($con,"select * from staffAttendance where instituteId='$userId' && month='$crntmonth' && session='$session' && status='L'");
$contlmnthstf = mysqli_num_rows($sl_atdncelmnths);
$sl_atdncehmnths = mysqli_query($con,"select * from staffAttendance where instituteId='$userId' && month='$crntmonth' && session='$session' && status='H'");
$conthmnthstf = mysqli_num_rows($sl_atdncehmnths);
?>  
var xValues = ["Presents","Absents","Leaves","Holidays"];
var yValues = [<?php echo $contpmthnstaf; ?>,<?php echo $contamnthstf; ?>, <?php echo $contlmnthstf; ?>, <?php echo $conthmnthstf; ?>];
var barColors = [
  "hsl(140, 100%, 40%)",
  "hsl(0, 100%, 50%)",
  "hsl(255, 100%, 50%)",
  "hsl(320, 100%, 50%)",
];
var borders = [
  "hsl(140, 100%, 40%)",
  "hsl(0, 100%, 50%)",
  "hsl(255, 100%, 50%)",
  "hsl(320, 100%, 50%)",
];
new Chart("mnthlystafattdnce", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: barColors,
      borderColor: borders,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});
/// Staff Daily Attendance
<?php
$sl_atdncep = mysqli_query($con,"select * from staffAttendance where instituteId='$userId' && date='$tdydate' && status='P'");
$contp = mysqli_num_rows($sl_atdncep);
$sl_atdncea = mysqli_query($con,"select * from staffAttendance where instituteId='$userId' && date='$tdydate' && status='A'");
$conta = mysqli_num_rows($sl_atdncea);
$sl_atdncel = mysqli_query($con,"select * from staffAttendance where instituteId='$userId' && date='$tdydate' && status='L'");
$contl = mysqli_num_rows($sl_atdncel);
$sl_atdnceh = mysqli_query($con,"select * from staffAttendance where instituteId='$userId' && date='$tdydate' && status='H'");
$conth = mysqli_num_rows($sl_atdnceh);
?>
google.charts.load('current',{packages:['corechart','bar']});
google.charts.setOnLoadCallback(drawCharts);

function drawCharts() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Attendance', 'Staff Daily Attendance'],
['Presents',<?php if(!empty($contp)){echo $contp; }else{ echo "1"; } ?>],
['Absents',<?php if(!empty($conta)){echo $conta; }else{ echo "1"; } ?>],
['Leaved',<?php if(!empty($contl)){echo $contl; }else{ echo "1"; } ?>],
['Holidays',<?php if(!empty($conth)){echo $conth; }else{ echo "1"; } ?>],
]);

// Set Options
const options = {
//  title: 'Staff Attendance',
//  chartArea: {top:70, bottom:80, left:'10%', right:'20%', 'width':'1000%' },
  titleTextStyle: {
      bold: true,
      italic: true,
      fontSize: 18,
  },
  legend: { position: 'top', maxLines: 3 },
  bar: { groupWidth: '30%' },
  isStacked: true,
};

// Draw
const chart = new google.visualization.ColumnChart(document.getElementById('stafatndce'));
chart.draw(data, options);

}

</script>
<script>
/// Accounts Daily Report
<?php
$sel_incmes = mysqli_query($con,"select SUM(income) as dlyincome from dayBook where institute_id='$userId' && date='$crntdte'");
while($uncmes = mysqli_fetch_array($sel_incmes)){
    $dlyincome = $uncmes['dlyincome'];
}
$sel_expn = mysqli_query($con,"select SUM(expense) as dlyexpens from dayBook where institute_id='$userId' && date='$crntdte'");
while($exp = mysqli_fetch_array($sel_expn)){
    $dlyexpens = $exp['dlyexpens'];
}
?>
var xValues = ["Income","Expense"];
var yValues = [<?php if(!empty($dlyincome)){ echo $dlyincome; }else{ echo "1"; } ?>,<?php if(!empty($dlyexpens)){ echo $dlyexpens; }else{ echo "1"; } ?>];
var barColors = [
  "hsl(0,100%,40%)",
  "hsl(0,100%,60%)",
];
var barbrdrColors = [
  "hsl(0,100%,40%)",
  "hsl(0,100%,60%)",
];
new Chart("dalydaybok", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      borderColor: barbrdrColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
    }
    
  }
});

/// Accounts Monthly Report
<?php
$sel_incmesmnth = mysqli_query($con,"select SUM(income) as mnthlyincome from dayBook where institute_id='$userId' && month='$crntmonth' && session='$session'");
while($uncmesmnth = mysqli_fetch_array($sel_incmesmnth)){
    $mnthlyincome = $uncmesmnth['mnthlyincome'];
}
$sel_expnmnth = mysqli_query($con,"select SUM(expense) as mnthlyexpens from dayBook where institute_id='$userId' && month='$crntmonth' && session='$session'");
while($expmnth = mysqli_fetch_array($sel_expnmnth)){
    $mnthlyexpens = $expmnth['mnthlyexpens'];
}
?>
var xValues = ["Payables","Pendings"];
var yValues = [<?php if(!empty($mnthlyincome)){ echo $mnthlyincome; }else{ echo "1"; } ?>,<?php if(!empty($mnthlyexpens)){ echo $mnthlyexpens; }else{ echo "1"; } ?>];
var barColors = [
  "hsl(170,100%,40%)",
  "hsl(170,100%,60%)",
];
var barborderColors = [
  "hsl(170,100%,40%)",
  "hsl(170,100%,60%)",
];
new Chart("mntlydaybok", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      borderColor: barborderColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
    }
    
  }
});

</script>

</body>

</html>