<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#fee"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Generate monthly Individual challan</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
<form method="post" enctype="multipart/form-data">
    <div class="row">
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
    <label class="text-capitalize">roll no.</label>
    <input type="text" name="rols" class="form-control" placeholder="Enter the Roll No." autocomplete="off">
    <input type="hidden" name="instid" class="form-control" value="<?php echo $userId; ?>">
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
    <label class="text-capitalize">Due Date</label>
    <input type="date" name="duedts" class="form-control">
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">Month</label>
<select class="text-capitalize form-select" name="mnths">
    <option class="text-capitalize" value="<?php echo date("m"); ?>"><?php echo date("M"); ?></option>
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
<div class="col-12 col-sm-6 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">session</label>
<select class="form-select text-capitalize" name="sesn">
<?php
$cls_mnger = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $session = $clis['session'];
?>
    <option class="text-capitalize"><?php echo $session; ?></option>
<?php } ?>
</select>
    </div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mt-4">
    <button name="btn_st" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> generate</button>
</div>
    </div>
</form>
<?php
if(isset($_POST['btn_st'])){
    
    $rols = $_POST['rols'];
    $instid = $_POST['instid'];
    $mnths = $_POST['mnths'];
    $duedts = $_POST['duedts'];
    $sesn = $_POST['sesn'];
$srch_stu = mysqli_query($con,"select * from addStudents where roll_num='$rols' && instituteId='$instid'");
$counts = mysqli_num_rows($srch_stu);
if($counts == 0){ echo "<div class='alert alert-danger text-uppercase'>required roll no is not available in record.</div>"; }

$result = mysqli_fetch_assoc($srch_stu);

$instituteId = $result['instituteId'];
$familyId = $result['familyId'];
if(!empty($result['image'])){ $student_img = $result['image']; }else{ $student_img = "users.jpg"; }
$rollnum = $result['roll_num'];
$session = $result['session'];
$student_name = $result['studentName'];
$father_name = $result['fatherName'];
$class = $result['class'];
$section = $result['section'];
$actual_fee = $result['totalFee'];
$previous_session_fee = $result['previous_session_fee'];
$mode_of_payment = $result['mode_of_payment'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mt-4 floa-left">
<form method="post" enctype="multipart/form-data">
        <div class="card bg-apna">
            <img src="student_imgs/<?php echo $student_img; ?>" class="card-img-top" style="width:100%;height:200px;">
            <input value="<?php echo $student_img; ?>" name="imgs" type="hidden">
            <input value="<?php echo $instituteId; ?>" name="instutid" type="hidden">
            <input value="<?php echo $familyId; ?>" name="fmlyid" type="hidden">
            <input value="<?php echo $mnths; ?>" name="mahs" type="hidden">
            <input value="<?php echo $previous_session_fee; ?>" name="prevbalance" type="hidden">
            <input value="<?php echo $duedts; ?>" name="dwedates" type="hidden">
            <div class="card-body" style="background-color:hsl(0,0%,15%);">
    <div class="d-flex">
        <div class="flex-fill p-2 text-center text-capitalize text-warning fw-bold">Roll No.</div>
        <div class="flex-fill p-2 text-center text-capitalize text-warning fw-bold">Session</div>
        <div class="flex-fill p-2 text-center text-capitalize text-warning fw-bold">Class</div>
        <div class="flex-fill p-2 text-center text-capitalize text-warning fw-bold">Section</div>
    </div>
    <div class="d-flex">
        <div class="flex-fill p-2 text-center text-capitalize text-white"><?php echo $rollnum; ?><input type="hidden" value="<?php echo $rollnum; ?>" name="rlsnmbr"></div>
        <div class="flex-fill p-2 text-center text-capitalize text-white"><?php echo $session; ?><input type="hidden" value="<?php echo $sesn; ?>" name="sssn"></div>
        <div class="flex-fill p-2 text-center text-uppercase text-white"><?php echo $class_name; ?><input type="hidden" value="<?php echo $class; ?>" name="cles"></div>
        <div class="flex-fill p-2 text-center text-uppercase text-white"><?php echo $section; ?><input type="hidden" value="<?php echo $section; ?>" name="setns"></div>
    </div>
    <div class="d-flex">
        <div class="flex-fill p-2 text-center text-capitalize text-warning fw-bold">Student Name</div>
        <div class="flex-fill p-2 text-center text-capitalize text-warning fw-bold">Father name</div>
        <div class="flex-fill p-2 text-center text-capitalize text-warning fw-bold">monthly fee</div>
    </div>
    <div class="d-flex">
        <div class="flex-fill p-2 text-center text-capitalize text-white"><?php echo $student_name; ?><input type="hidden" value="<?php echo $student_name; ?>" name="snme"></div>
        <div class="flex-fill p-2 text-center text-capitalize text-white"><?php echo $father_name; ?><input type="hidden" value="<?php echo $father_name; ?>" name="fnme"></div>
        <div class="flex-fill p-2 text-center text-capitalize text-white"><?php echo $actual_fee; ?><input type="hidden" value="<?php echo $actual_fee; ?>" name="mfes"></div>
    </div>
    <div class="d-flex">
        <div class="flex-fill p-2 text-center text-capitalize text-white">
    <div class="d-grid">
        <button class="btn btn-apna text-uppercase" type="submit" name="btn_genrte">generate challan</button>    
    </div>
        </div>
    </div>
            </div>
        </div>
</form>
    </div>
<?php } 

if(isset($_POST['btn_genrte'])){

$imgs = $_POST['imgs'];
$fmlyid = $_POST['fmlyid'];
$rlsnmbr = $_POST['rlsnmbr'];
$sssn = $_POST['sssn'];
$snme = $_POST['snme'];
$fnme = $_POST['fnme'];
$cles = $_POST['cles'];
$setns = $_POST['setns'];
$mfes = $_POST['mfes'];
if(!empty($_POST['prevbalance'])){ $prevbalance = $_POST['prevbalance']; }else{ $prevbalance = "0";}
$Unpaid = 'Unpaid';
$mnth = $_POST['mahs'];
$chlan_status = "monthly";
$instutid = $_POST['instutid'];
$dwedates = $_POST['dwedates'];
$chln_date = date("d-m-Y");

$duplic = mysqli_query($con,"select * from fee_collection where rollno='$rlsnmbr' && month='$mnth' && instituteId='$instutid'");
if(mysqli_num_rows($duplic)>0){
    echo "<script>swal.fire('Sorry!','Student Challan Already Generated.','info');</script>";
}else{
$inst_chlan = mysqli_query($con,"insert into fee_collection(student_imgs,familyId,rollno,session,student_name,father_name,class,section,monthly_fee,previous_balance,discounts,fine,total_amount,receive_monthly,remaing_balance,fees_status,month,challan_status,instituteId,remarks,dates,due_dates) values('$imgs','$fmlyid','$rlsnmbr','$sssn','$snme','$fnme','$cles','$setns','$mfes','0','0','0','0','0','$prevbalance','$Unpaid','$mnth','$chlan_status','$instutid','None','$chln_date','$dwedates')");
if($inst_chlan){ echo "<script>swal.fire('Good Job!','Student Challan Successfully Generated.','success');</script>"; }else{ echo "<script>swal.fire('Ooops!','Student Challan is not Generated.','error');</script>"; }    
    }
}
?>        
</div>

<?php require_once("source/foot-section.php"); ?>