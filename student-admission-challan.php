<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> student admission challan</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<style>
.table, table, .table-responsive, .table tr, .table tr th, .table tr td{
    border:none;
    border-bottom:none;
    box-shadow:none;
}
</style>
<br>
<?php
if(isset($_GET['id'])){
    
    $ids = $_GET['id'];
    
$sl_rsl = mysqli_query($con,"select * from addStudents where instituteId='$userId' && id='$ids'");
$frm = mysqli_fetch_assoc($sl_rsl);

    $admissionDate = $frm['admissionDate'];
    $instituteId = $frm['instituteId'];
    $inquiryId = $frm['inquiryId'];
    $roll_num = $frm['roll_num'];
    $class = $frm['class'];
    $section = $frm['section'];
    $medium = $frm['medium'];
    $session = $frm['session'];
    $frmimage = $frm['image'];
    $studentName = $frm['studentName'];
    $bForm = $frm['bForm'];
    $gender = $frm['gender'];
    $dateOfBirth = $frm['dateOfBirth'];
    $religion = $frm['religion'];
    $phone = $frm['phone'];
    $living = $frm['living'];
    $homeAddress = $frm['homeAddress'];
    $city = $frm['city'];
    $district = $frm['district'];
    $town = $frm['town'];
    $fatherName = $frm['fatherName'];
    $cnic = $frm['cnic'];
    $frmcell = $frm['cell'];
    $whatsapp = $frm['whatsapp'];
    $occupation = $frm['occupation'];
    $qualification = $frm['qualification'];
    $facebook = $frm['facebook'];
    $gmail = $frm['gmail'];
    if(!empty($frm['totalFee'])){ $monthlyFee = $frm['totalFee']; }else{ $monthlyFee =  "0"; }
    if(!empty($frm['admissionFee'])){ $admissionFee = $frm['admissionFee']; }else{ $admissionFee = "0"; } 
    if(!empty($frm['annualFund'])){ $annualFund = $frm['annualFund']; }else{ $annualFund = "0"; }
    if(!empty($frm['books'])){ $books = $frm['books']; }else{ $books = "0"; }
    if(!empty($frm['uniform'])){ $uniform = $frm['uniform']; }else{ $uniform = "0"; }
    if(!empty($frm['stationary'])){ $stationary = $frm['stationary']; }else{ $stationary = "0"; }
    if(!empty($frm['others'])){ $others = $frm['others']; }else{ $others = "0"; }
    if(!empty($frm['totalAmount'])){ $totalAmount = $frm['totalAmount']; }else{ $totalAmount = "0";}
    $remarks = $frm['remarks'];
    $mode_of_payment = $frm['mode_of_payment'];
}

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<div class="container-fluid mt-4">
    <div class="row" id="bodies mt-3">
        <div class="col datas">
<div class="row">
    <div class="col mt-3">
<table class="table table-responsive w-100 bg-white">
    <tr align="center">
        <th width="50" style="font-size:1rem;padding:2px;">
<img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid">
        </th>
        <th colspan="4" style="font-size:1rem;padding:2px;">
            <h5 class="fs-5 fw-bold text-uppercase"><?php echo $instituteName; ?></h5>
            <div class="text-center text-capitalize" style="font-size:0.8rem;">Campus: <span class="fw-normal" style="font-size:0.8rem;"><?php echo $campus; ?></span></div>
        </th>
        <th style="font-size:1rem;padding:2px;border-left:dashed 1px black;"></th>
        <th width="50" style="font-size:1rem;padding:2px;">
<img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid">
        </th>
        <th colspan="4" style="font-size:1rem;padding:2px;">
            <h5 class="fs-5 fw-bold text-uppercase"><?php echo $instituteName; ?></h5>
            <div class="text-center text-capitalize" style="font-size:0.8rem;">Campus: <span class="fw-normal" style="font-size:0.8rem;"><?php echo $campus; ?></span></div>
        </th>
        <th style="font-size:1rem;padding:2px;border-left:dashed 1px black;"></th>
        <th width="50" style="font-size:1rem;padding:2px;">
<img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid">
        </th>
        <th colspan="4" style="font-size:1rem;padding:2px;">
            <h5 class="fs-5 fw-bold text-uppercase"><?php echo $instituteName; ?></h5>
            <div class="text-center text-capitalize" style="font-size:0.8rem;">Campus: <span class="fw-normal" style="font-size:0.8rem;"><?php echo $campus; ?></span></div>
        </th>
    </tr>
    <tr align="center">
        <th colspan="5" style="font-size:1rem;padding:2px;"><h6 class="fs-6 fw-bold text-uppercase p-3" style="border:solid 2px black;">new admission slip</h6></th>
        <th style="font-size:1rem;padding:2px;border-left:dashed 1px black;"></th>
        <th colspan="5" style="font-size:1rem;padding:2px;"><h6 class="fs-6 fw-bold text-uppercase p-3" style="border:solid 2px black;">new admission slip</h6></th>
        <th style="font-size:1rem;padding:2px;border-left:dashed 1px black;"></th>
        <th colspan="5" style="font-size:1rem;padding:2px;"><h6 class="fs-6 fw-bold text-uppercase p-3" style="border:solid 2px black;">new admission slip</h6></th>
    </tr>
    <tr align="center">
        <th colspan="5" style="font-size:1rem;padding:2px;"><div class="fw-normal text-capitalize p-3" style="border:double 6px black;font-size:0.7rem;"><span class="text-uppercase fw-bold" style="font-size:0.7rem;"><?php echo $studentName; ?></span> S/D/O <span class="text-uppercase fw-bold" style="font-size:0.7rem;"> <?php echo $fatherName; ?></span> is enrolled in class <span class="text-uppercase fw-bold" style="font-size:0.7rem;"> <?php echo $class_name; ?></span> Section <span class="text-uppercase fw-bold" style="font-size:0.7rem;"><?php echo $section; ?></span>. His/Her Roll No is <span class="text-uppercase fw-bold" style="font-size:0.7rem;"> <?php echo $roll_num; ?></span> in Academic session <span class="text-uppercase fw-bold" style="font-size:0.7rem;"> <?php echo $session; ?></span>.Thanks for being a part of <span class="text-uppercase fw-bold" style="font-size:0.7rem;"> <?php echo $instituteName; ?> </span>.</div></th>
        <th style="font-size:1rem;padding:2px;border-left:dashed 1px black;"></th>
        <th colspan="5" style="font-size:1rem;padding:2px;"><div class="fw-normal text-capitalize p-3" style="border:double 6px black;font-size:0.7rem;"><span class="text-uppercase fw-bold" style="font-size:0.7rem;"><?php echo $studentName; ?></span> S/D/O <span class="text-uppercase fw-bold" style="font-size:0.7rem;"> <?php echo $fatherName; ?></span> is enrolled in class <span class="text-uppercase fw-bold" style="font-size:0.7rem;"> <?php echo $class_name; ?></span> Section <span class="text-uppercase fw-bold" style="font-size:0.7rem;"><?php echo $section; ?></span>. His/Her Roll No is <span class="text-uppercase fw-bold" style="font-size:0.7rem;"> <?php echo $roll_num; ?></span> in Academic session <span class="text-uppercase fw-bold" style="font-size:0.7rem;"> <?php echo $session; ?></span>.Thanks for being a part of <span class="text-uppercase fw-bold" style="font-size:0.7rem;"> <?php echo $instituteName; ?> </span>.</div></th>
        <th style="font-size:1rem;padding:2px;border-left:dashed 1px black;"></th>
        <th colspan="5" style="font-size:1rem;padding:2px;"><div class="fw-normal text-capitalize p-3" style="border:double 6px black;font-size:0.7rem;"><span class="text-uppercase fw-bold" style="font-size:0.7rem;"><?php echo $studentName; ?></span> S/D/O <span class="text-uppercase fw-bold" style="font-size:0.7rem;"> <?php echo $fatherName; ?></span> is enrolled in class <span class="text-uppercase fw-bold" style="font-size:0.7rem;"> <?php echo $class_name; ?></span> Section <span class="text-uppercase fw-bold" style="font-size:0.7rem;"><?php echo $section; ?></span>. His/Her Roll No is <span class="text-uppercase fw-bold" style="font-size:0.7rem;"> <?php echo $roll_num; ?></span> in Academic session <span class="text-uppercase fw-bold" style="font-size:0.7rem;"> <?php echo $session; ?></span>.Thanks for being a part of <span class="text-uppercase fw-bold" style="font-size:0.7rem;"> <?php echo $instituteName; ?> </span>.</div></th>
    </tr>
    <tr>
        <th style="font-size:0.7rem;padding:2px;">Sr#</th>
        <th style="font-size:0.7rem;padding:2px;">Item's</th>
        <th style="font-size:0.7rem;padding:2px;">Qty</th>
        <th style="font-size:0.7rem;padding:2px;">Unit Price</th>
        <th style="font-size:0.7rem;padding:2px;">Amount</th>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">Sr#</th>
        <th style="font-size:0.7rem;padding:2px;">Item's</th>
        <th style="font-size:0.7rem;padding:2px;">Qty</th>
        <th style="font-size:0.7rem;padding:2px;">Unit Price</th>
        <th style="font-size:0.7rem;padding:2px;">Amount</th>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">Sr#</th>
        <th style="font-size:0.7rem;padding:2px;">Item's</th>
        <th style="font-size:0.7rem;padding:2px;">Qty</th>
        <th style="font-size:0.7rem;padding:2px;">Unit Price</th>
        <th style="font-size:0.7rem;padding:2px;">Amount</th>
    </tr>
    <tr>
        <th style="font-size:0.7rem;padding:2px;">1</th>
        <td style="font-size:0.7rem;padding:2px;">
<?php if($userId == "59467"){ echo "Annual Fee"; }else{ echo "Monthly Fee"; } ?>
        </td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $monthlyFee." (".$mode_of_payment.")"; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">1</th>
        <td style="font-size:0.7rem;padding:2px;">
<?php if($userId == "59467"){ echo "Annual Fee"; }else{ echo "Monthly Fee"; } ?>
        </td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $monthlyFee." (".$mode_of_payment.")"; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">1</th>
        <td style="font-size:0.7rem;padding:2px;">
<?php if($userId == "59467"){ echo "Annual Fee"; }else{ echo "Monthly Fee"; } ?>
        </td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $monthlyFee." (".$mode_of_payment.")"; ?></td>
    </tr>
<?php
$sl_titles = mysqli_query($con,"select * from addChargesTitle where instituteId='$instituteId' order by id desc limit 0,1");
$chrg = mysqli_fetch_array($sl_titles);
    
    $charges1 = $chrg['charges1'];
    $charges2 = $chrg['charges2'];
    $charges3 = $chrg['charges3'];
    $charges4 = $chrg['charges4'];
    $charges5 = $chrg['charges5'];
    $charges6 = $chrg['charges6'];
    $charges7 = $chrg['charges7'];
?>
    <tr>
        <th style="font-size:0.7rem;padding:2px;">2</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges1)){ echo $charges1; }else{ echo "admission fee"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $admissionFee; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">2</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges1)){ echo $charges1; }else{ echo "admission fee"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $admissionFee; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">2</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges1)){ echo $charges1; }else{ echo "admission fee"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $admissionFee; ?></td>
    </tr>      
     <tr>
        <th style="font-size:0.7rem;padding:2px;">3</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges2)){ echo $charges2; }else{ echo "annual fund"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $annualFund; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">3</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges2)){ echo $charges2; }else{ echo "annual fund"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $annualFund; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">3</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges2)){ echo $charges2; }else{ echo "annual fund"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $annualFund; ?></td>
    </tr>
    <tr>
        <th style="font-size:0.7rem;padding:2px;">4</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges3)){ echo $charges3; }else{ echo "books"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $books; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">4</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges3)){ echo $charges3; }else{ echo "books"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $books; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">4</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges3)){ echo $charges3; }else{ echo "books"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $books; ?></td>
    </tr>
     <tr>
        <th style="font-size:0.7rem;padding:2px;">5</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges4)){ echo $charges4; }else{ echo "uniform"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $uniform; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">5</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges4)){ echo $charges4; }else{ echo "uniform"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $uniform; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">5</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges4)){ echo $charges4; }else{ echo "uniform"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $uniform; ?></td>
    </tr>
     <tr>
        <th style="font-size:0.7rem;padding:2px;">6</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges5)){ echo $charges5; }else{ echo "stationary"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $stationary; ?> </td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">6</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges5)){ echo $charges5; }else{ echo "stationary"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $stationary; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">6</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges5)){ echo $charges5; }else{ echo "stationary"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $stationary; ?></td>
    </tr>
     <tr>
        <th style="font-size:0.7rem;padding:2px;">7</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges6)){ echo $charges6; }else{ echo "others"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $others; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">7</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges6)){ echo $charges6; }else{ echo "others"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $others; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">7</th>
        <td style="font-size:0.7rem;padding:2px;" class="text-capitalize"><?php if(!empty($charges6)){ echo $charges6; }else{ echo "others"; }?></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"><?php echo $others; ?></td>
    </tr>
     <tr>
        <th style="font-size:0.7rem;padding:2px;">8</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">8</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">8</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
    </tr>
     <tr>
        <th style="font-size:0.7rem;padding:2px;">9</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">9</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">9</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
    </tr>
     <tr>
        <th style="font-size:0.7rem;padding:2px;">10</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">10</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">10</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
    </tr>
     <tr>
        <th style="font-size:0.7rem;padding:2px;">11</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">11</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">11</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
    </tr>
     <tr>
        <th style="font-size:0.7rem;padding:2px;">12</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">12</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">12</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
    </tr>
     <tr>
        <th style="font-size:0.7rem;padding:2px;">13</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">13</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">13</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
    </tr>
     <tr>
        <th style="font-size:0.7rem;padding:2px;">14</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">14</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">14</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
    </tr>
     <tr>
        <th style="font-size:0.7rem;padding:2px;">15</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">15</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:0.7rem;padding:2px;">15</th>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
        <td style="font-size:0.7rem;padding:2px;"></td>
    </tr>
     <tr align="right">
        <th style="font-size:1rem;padding:2px;" class="fw-bold" colspan="3">Total Amount</th>
        <td style="font-size:1rem;padding:2px;" class="fw-bold" colspan="2"><?php echo $totalAmount; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:1rem;padding:2px;" class="fw-bold" colspan="3">Total Amount</th>
        <td style="font-size:1rem;padding:2px;" class="fw-bold" colspan="2"><?php echo $totalAmount; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <th style="font-size:1rem;padding:2px;" class="fw-bold" colspan="3">Total Amount</th>
        <td style="font-size:1rem;padding:2px;" class="fw-bold" colspan="2"><?php echo $totalAmount; ?></td>
    </tr>
    <tr>
        <td style="font-size:0.7rem;padding:2px;" colspan="5"><b>Note:</b> Dues must be paid before 10th of each month. Dues once paid are neither refundable nor adjustable in any case.</td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <td style="font-size:0.7rem;padding:2px;" colspan="5"><b>Note:</b> Dues must be paid before 10th of each month. Dues once paid are neither refundable nor adjustable in any case.</td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <td style="font-size:0.7rem;padding:2px;" colspan="5"><b>Note:</b> Dues must be paid before 10th of each month. Dues once paid are neither refundable nor adjustable in any case.</td>
    </tr>
    <tr>
        <td style="font-size:1rem;padding:2px;" class="fw-bold" colspan="3">Principal: ___________</td>
        <td style="font-size:1rem;padding:2px;" class="fw-bold" colspan="2">Admin: ___________</td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <td style="font-size:1rem;padding:2px;" class="fw-bold" colspan="3">Principal: ___________</td>
        <td style="font-size:1rem;padding:2px;" class="fw-bold" colspan="2">Admin: ___________</td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
        <td style="font-size:1rem;padding:2px;" class="fw-bold" colspan="3">Principal: ___________</td>
        <td style="font-size:1rem;padding:2px;" class="fw-bold" colspan="2">Admin: ___________</td>
    </tr>
    <tr style="background-color:hsl(0,0%,80%);">
<td style="font-size:0.7rem;padding:2px;" colspan="5"><b style="font-size:0.7rem;">Address:</b> <?php echo $mainaddress; ?> <b style="font-size:0.7rem;">Cell:</b> <?php echo $cell; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
<td style="font-size:0.7rem;padding:2px;" colspan="5"><b style="font-size:0.7rem;">Address:</b> <?php echo $mainaddress; ?> <b style="font-size:0.7rem;">Cell:</b> <?php echo $cell; ?></td>
        <th style="font-size:0.7rem;padding:2px;border-left:dashed 1px black;"></th>
<td style="font-size:0.7rem;padding:2px;" colspan="5"><b style="font-size:0.7rem;">Address:</b> <?php echo $mainaddress; ?> <b style="font-size:0.7rem;">Cell:</b> <?php echo $cell; ?></td>
    </tr>
</table>
    </div>

</div>
        </div>
    </div>
<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
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