<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#fee"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Generate Individual challan annualy</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">

    <div class="row">

<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 float-left">
    <form method="post" enctype="multipart/form-data">
        <label class="text-capitalize">roll no.</label>
        <div class="input-group">
            <input type="text" name="rols" class="form-control" placeholder="Enter the Roll No." autocomplete="off" onkeypress="isInputNumber(event)" required>
            <input type="hidden" name="instid" class="form-control" value="<?php echo $userId; ?>">
            <button name="btn_st" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> generate</button>
        </div>
    </form>
</div>
<?php
if(isset($_POST['btn_st'])){
    
    $rols = $_POST['rols'];
    $instid = $_POST['instid'];
$srch_stu = mysqli_query($con,"select * from addStudents where roll_num LIKE '%$rols%' && instituteId LIKE '%$instid%'");
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
            <input value="<?php echo $familyId; ?>" name="fmly" type="hidden">
            <input value="<?php echo $previous_session_fee; ?>" name="prevbalance" type="hidden">
            <div class="card-body" style="background-color:hsl(0,0%,15%);">
    <div class="d-flex">
        <div class="flex-fill p-2 text-center text-capitalize text-warning fw-bold">Roll No.</div>
        <div class="flex-fill p-2 text-center text-capitalize text-warning fw-bold">Session</div>
        <div class="flex-fill p-2 text-center text-capitalize text-warning fw-bold">Class</div>
        <div class="flex-fill p-2 text-center text-capitalize text-warning fw-bold">Section</div>
    </div>
    <div class="d-flex">
        <div class="flex-fill p-2 text-center text-capitalize text-white"><?php echo $rollnum; ?><input type="hidden" value="<?php echo $rollnum; ?>" name="rlsnmbr"></div>
        <div class="flex-fill p-2 text-center text-capitalize text-white"><?php echo $session; ?><input type="hidden" value="<?php echo $session; ?>" name="sssn"></div>
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
$fmly = $_POST['fmly'];
$rlsnmbr = $_POST['rlsnmbr'];
$sssn = $_POST['sssn'];
$snme = $_POST['snme'];
$fnme = $_POST['fnme'];
$cles = $_POST['cles'];
$setns = $_POST['setns'];
$mfes = $_POST['mfes'];
if(!empty($_POST['prevbalance'])){ $prevbalance = $_POST['prevbalance']; }else{ $prevbalance = "0";}
$Unpaid = 'Unpaid';
$mnth = date("m");
$chlan_status = "annualy";
$instutid = $_POST['instutid'];
$chln_date = date("j-m-Y");


$duplic = mysqli_query($con,"select * from fee_collection where rollno='$rlsnmbr' && month='$mnth' && instituteId='$instutid'");
if(mysqli_num_rows($duplic)>0){
    echo "<script>swal.fire('Sorry!','Student Challan Already Generated.','info');</script>";
}else{
$inst_chlan = mysqli_query($con,"insert into fee_collection (student_imgs,familyId,rollno,session,student_name,father_name,class,section,monthly_fee,previous_balance,discounts,total_amount,receive_monthly,remaing_balance,fees_status,month,challan_status,instituteId,remarks,dates) values ('$imgs','$fmly','$rlsnmbr','$sssn','$snme','$fnme','$cles','$setns','$mfes','0','0','0','0','$prevbalance','$Unpaid','$mnth','$chlan_status','$instutid','None','$chln_date')");
if($inst_chlan){ echo "<script>swal.fire('Good Job!','Student Challan Successfully Generated.','success');</script>"; }else{ echo "<script>swal.fire('Ooops!','Student Challan is not Generated.','error');</script>"; }    
    }
}
?>        
    </div>

<br><br>
<div class="row mt-4">
    <div class="col text-center" style="width:100%;overflow:hidden;">
        <script type="text/javascript">
	atOptions = {
		'key' : '4b35b8604d3ef79cbbf7b5e1fd1d5934',
		'format' : 'iframe',
		'height' : 90,
		'width' : 728,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="//www.highcpmcreativeformat.com/4b35b8604d3ef79cbbf7b5e1fd1d5934/invoke.js"></scr' + 'ipt>');
</script>
    </div>
</div>   
</div>

<?php require_once("source/foot-section.php"); ?>