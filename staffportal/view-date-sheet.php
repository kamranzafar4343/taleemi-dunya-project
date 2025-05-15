<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("profile.php"); require_once("lib/attendance.php"); require_once("lib/examination.php"); require_once("lib/time-table.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='date-sheet'"> date sheet</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">view date sheet</li>
  </ol>
</nav>
<br>
<?php
$sl_inst = mysqli_query($con,"select * from confirmSchools where institute_id='$instituteId'");
if(mysqli_num_rows($sl_inst)>0){
    $rst = mysqli_fetch_assoc($sl_inst);
$institute_name = $rst['institute_name'];
$campus = $rst['campus'];
$logo = $rst['logo'];
$instcel = $rst['cell'];
$ofceaddress = $rst['address'];
$account_detail = $rst['account_detail'];
}
if(isset($_GET['id'])){
    $ids = $_GET['id'];
$sl_dtsht = mysqli_query($con,"select * from dateSheet where instituteId='$instituteId' && code='$ids'");    
$rest = mysqli_fetch_assoc($sl_dtsht);
$code = $rest['code'];
$classid = $rest['classid'];
$section = $rest['section'];
$terms = $rest['terms'];
$session = $rest['session'];
}    
?>
<div class="container-fluid mt-4">
    <div class="row datas" style="border:double 8px black;">
        <div class="col">
<div class="row bg-white p-5">
    <div class="col p-3">
    <table class="table table-responsive w-100 table-striped">
        <tr align="center">
            <th width="70"><img src="../portal-admins/institute-logos/<?php echo $logo; ?>" class="img-fluid" style="width:100px;"></th>
            <th class="fs-4 fw-bold text-uppercase" colspan="4"><?php echo $institute_name; ?>
<div class="fw-bold fs-6"> <?php echo $campus; ?></div>
<div style="font-size:0.8rem;" class="text-capitalize"><b style="font-size:0.8rem;">Address:</b> <?php echo $ofceaddress; ?></div>
            </th>
        </tr>
    </table>
    <div class="col">
        <div class="d-flex">
            <div class="flex-fill text-center"><span class="text-uppercase fs-6 fw-bold">date sheet <?php echo $terms;?></span></div>
        </div><br>
        <div class="d-flex">
            <div class="flex-fill p-2 text-center text-capitalize fw-bold" style="border:1px solid black;">class:</div>
<?php
$sl_cl = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$classid'");
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
    <tr>
        <th style="padding:5px;font-size:0.7rem;">Day</th>
        <th style="padding:5px;font-size:0.7rem;">Date</th>
        <th style="padding:5px;font-size:0.7rem;">Paper</th>
        <th style="padding:5px;font-size:0.7rem;">Syllabus</th>
    </tr>
<?php
$sl_dtshet = mysqli_query($con,"select * from dateSheet where instituteId='$instituteId' && code='$code'");
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
if($syllabus == "none"){ }else{
?>
<tr>
    <td style="padding:5px;font-size:0.7rem;" class="text-capitalize"><?php echo $day; ?></td>
    <td style="padding:5px;font-size:0.7rem;"><?php echo $fnl_dt; ?></td>
    <td style="padding:5px;font-size:0.7rem;" class="text-capitalize"><?php echo $subject; ?></td>
    <td style="padding:5px;font-size:0.7rem;" class="text-capitalize"><?php echo $syllabus; ?></td>
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
    <li style="padding:0px;font-size:0.7rem;">Holiday during exams will not be off day. Students will come in school for preparation of next paper.</li>
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
    <tr>
        <th class="p-0" style="font-size:0.8rem;"></th>
        <th class="p-0" style="font-size:0.8rem;">
            Regards: <?php //echo $user; ?>
        </th>
    </tr>
</table>


    </div>
        </div>
</div>


        </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>