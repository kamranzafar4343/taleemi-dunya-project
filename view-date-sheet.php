<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#exame-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='date-sheet-manager'">date sheet manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> view Date Sheet</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<br>
<?php
if(isset($_GET['id'])){
    $ids = $_GET['id'];
$sl_dtsht = mysqli_query($con,"select * from dateSheet where instituteId='$userId' && code='$ids'");    
$rest = mysqli_fetch_assoc($sl_dtsht);
$code = $rest['code'];
$classid = $rest['classid'];
$section = $rest['section'];
$terms = $rest['terms'];
$session = $rest['session'];
}    
?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-apna' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
        </div>
    </div> 
    <div class="row datas" style="padding:0rem 0.8rem 0rem 0.8rem;">
        <div class="col" style="height:1050px;overflow:hidden;border:double 8px black;">
<div class="row p-5" style="background:hsl(0,0%,15%);">
    <div class="col">
    <table class="table table-responsive w-100"  style='background:hsl(35, 100%, 60%);'>
        <tr align="center">
            <th width="70"><img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid" style="width:100px;"></th>
            <th class="fs-4 fw-bold text-uppercase">
                <?php echo $instituteName; ?>
<div class="fw-bold fs-6"> <?php echo $campus; ?></div>
<div style="font-size:0.8rem;" class="text-capitalize"><b style="font-size:0.8rem;">Address:</b> <?php echo $mainaddress; ?></div>
            </th>
        </tr>
    </table>
    <div class="col" style='background:hsl(35, 100%, 70%);'>
        <div class="d-flex">
            <div class="flex-fill text-center"><span class="text-uppercase fs-6 fw-bold">date sheet <?php echo $terms;?></span></div>
        </div><br>
        <div class="d-flex">
            <div class="flex-fill p-2 text-center text-capitalize fw-bold" style="border:1px solid black;">class:</div>
<?php
$sl_cl = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$classid'");
$ro = mysqli_fetch_assoc($sl_cl);
$class_name = $ro['class_name'];
?>
            <div class="flex-fill p-1 text-center text-uppercase" style="border:1px solid black;"><?php echo $class_name; ?></div>
            <div class="flex-fill p-1 text-center text-capitalize fw-bold" style="border:1px solid black;">section:</div>
            <div class="flex-fill p-1 text-center text-uppercase" style="border:1px solid black;"><?php echo $section; ?></div>
            <div class="flex-fill p-1 text-center text-capitalize fw-bold" style="border:1px solid black;">session:</div>
            <div class="flex-fill p-1 text-center text-capitalize" style="border:1px solid black;"><?php echo $session; ?></div>
        </div>
<br>
<style>
.tble-border, .tble-border tr th, .tble-border tr td{ border:1px dashed black;}
</style>
<table class="w-100 tble-border">
    <tr style='background:hsl(35, 100%, 50%);'>
        <th style="padding:5px;font-size:0.7rem;border:1px dashed black;">Day</th>
        <th style="padding:5px;font-size:0.7rem;border:1px dashed black;">Date</th>
        <th style="padding:5px;font-size:0.7rem;border:1px dashed black;">Paper</th>
        <th style="padding:5px;font-size:0.7rem;border:1px dashed black;">Syllabus</th>
    </tr>
<?php
$sl_dtshet = mysqli_query($con,"select * from dateSheet where instituteId='$userId' && code='$code'");
while($shet = mysqli_fetch_array($sl_dtshet)){
$day = $shet['day'];
$date = $shet['date'];
$formt = explode("-",$date);
$dt = $formt['2'];
$mont = $formt['1'];
$yer = $formt['0'];
$fnl_dt = $dt."-".$mont."-".$yer; 
$subject = $shet['subject'];
$syllabus = $shet['syllabus'];
$session = $shet['session'];
if($subject == ""){ }else{
?>
<tr>
    <td style="padding:5px;font-size:0.7rem;border:1px dashed black;" class="text-capitalize"><?php echo $day; ?></td>
    <td style="padding:5px;font-size:0.7rem;border:1px dashed black;"><?php echo $fnl_dt; ?></td>
    <td style="padding:5px;font-size:0.7rem;border:1px dashed black;" class="text-capitalize"><?php echo $subject; ?></td>
    <td style="padding:5px;font-size:0.7rem;border:1px dashed black;" class="text-capitalize"><?php echo $syllabus; ?></td>
</tr>
<?php } } ?>
</table>
<br>
<h6 class="fw-bold fs-6 text-uppercase text-decoration-underline">instructions:</h6><br>
<ul>
    <li style="padding:0px;font-size:0.7rem;">There will be no change in Paper schedule (Except Holidays)</li>
    <li style="padding:0px;font-size:0.7rem;">Presence in <span style="padding:0px;font-size:0.7rem;"class="text-uppercase fw-bold"><?php echo $terms; ?></span> exams is compulsory.</li>
    <li style="padding:0px;font-size:0.7rem;">Students must bring their own stationary during the examination borrowing of stationary will not be allowed.</li>
    <li style="padding:0px;font-size:0.7rem;">Any students found using unfair means will be disqualified for that examination and awarded zero marks.</li>
<?php if($userId == 154995){ }else{ ?>
    <li style="padding:0px;font-size:0.7rem;">Holiday during exams will not be off day. Students will come in school for preparation of next paper.</li>
<?php } ?>
</ul>
<br>
<h6 class="text-center fs-6 fw-bold">BEST OF LUCK FOR YOUR BETTER RESULT</h6>

<table class="w-100">
    <tr><th colspan="2"></th></tr>
    <tr>
        <th class="p-0" style="font-size:0.8rem;">Student Signature: __________________</th>
            <th class="p-0" style="font-size:0.8rem;">Parent's Signature: __________________</th>
    </tr>
    <tr><th colspan="2"></th></tr>
</table>


    </div>
        </div>
</div>


        </div>
    </div>
   
    
</div>

<script type="text/javascript">
$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>
<?php require_once("source/foot-section.php"); ?>