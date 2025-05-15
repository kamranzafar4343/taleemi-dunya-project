<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#fee"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> monthly challan generate all students</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-6 col-sm-4 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize fs-6">Due Date</label>
        <input type="date" class="form-control" name="dusdtes">
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize fs-6">month</label>
        <select class="form-select text-capitlaize" name="mnths">
            <option class="text-capitalize" value="<?php echo date("m"); ?>"><?php echo date("F"); ?></option>
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
    <div class="col-6 col-sm-4 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <input type="hidden" value="<?php echo $userId; ?>" name="inst">
        <label class="text-capitalize fs-6">session</label>
<select name="sesn" class="form-select">
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
    
    <div class="col-6 col-sm-4 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mt-4">
        <div class="d-grid">
            <button name="btn_clas_gen" type="submit" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> Generate</button>
        </div>
    </div>    
</div>
    </form>
<br><br>
    <div class="row">
        <div class="col">

<table class="table table-responsive table-striped w-100">
    <tr class="bg-apna">
        <th style="border:1px solid hsl(25, 100%, 50%);">#</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Image</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Roll No.</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Session</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Student Name</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Father Name</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Class</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Section</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Fee</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Previous</th>
    </tr>
<?php
if(isset($_POST['btn_clas_gen'])){
    
    $mnths = $_POST['mnths'];
    $sesn = $_POST['sesn'];
    $inst = $_POST['inst'];
    $sectn = $_POST['sectn'];
    $dusdtes = $_POST['dusdtes'];


$sl_clas = mysqli_query($con,"select * from addStudents where session LIKE '%$sesn%' && instituteId LIKE '%$userId%'");
$ab = 1;
while($ab <= 10000000 && $rows = mysqli_fetch_assoc($sl_clas)){

$id = $rows['id'];
$instituteId = $rows['instituteId'];
$familyId = $rows['familyId'];
if(!empty($rows['image'])){ $student_img = $rows['image']; }else{ $student_img = "users.jpg"; }
$rollnum = $rows['roll_num'];
$session = $rows['session'];
$student_name = $rows['studentName'];
$father_name = $rows['fatherName'];
$class = $rows['class'];
$section = $rows['section'];
$actual_fee = $rows['totalFee'];
$previous_session_fee = $rows['previous_session_fee'];
$mode_of_payment = $rows['mode_of_payment'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?> 
<form method="post" enctype="multipart/form-data">
    <tr  style="background:hsl(35, 100%, 80%);">
        <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $ab++; ?></td>
        <td width="50" style="border:1px solid hsl(25, 100%, 50%);">
            <img src="student_imgs/<?php echo $student_img; ?>" class='img-fluid'>
            <input type="hidden" value="<?php echo $student_img; ?>" name="imgs[]">
        </td>

        <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $rollnum; ?><input type="hidden" value="<?php echo $rollnum; ?>" name="rlnumbr[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $session; ?><input type="hidden" value="<?php echo $session; ?>" name="sesin[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $student_name; ?><input type="hidden" value="<?php echo $student_name; ?>" name="sname[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $father_name; ?><input type="hidden" value="<?php echo $father_name; ?>" name="fname[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $class_name; ?><input type="hidden" value="<?php echo $class; ?>" name="clss[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $section; ?><input type="hidden" value="<?php echo $section; ?>" name="setn[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $actual_fee; ?><input type="hidden" value="<?php echo $actual_fee; ?>" name="mfee[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $previous_session_fee; ?><input value="<?php echo $previous_session_fee; ?>" name="prevbalance[]" type="hidden"></td>
        <input type="hidden" value="<?php echo $userId; ?>" name="instId[]">
        <input type="hidden" value="<?php echo $familyId; ?>" name="fmly[]">
        <input type="hidden" value="<?php echo $mnths; ?>" name="manths">
        <input type="hidden" value="<?php echo $dusdtes; ?>" name="dwedate">
    </tr>
<?php } ?>
<tr>
    <td colspan="10" align="right">
        <button type="submit" class="btn btn-apna text-uppercase" name="but_generate"> <i class="fa-solid fa-retweet"></i> All Challan Generate </button>
    </td>
</tr>
</form>
<?php } ?>
</table>

        </div>
<?php

if(isset($_POST['but_generate'])){
    
    $imgs =$_POST['imgs'];
	$fmly = $_POST['fmly'];
	$rlnumbr = $_POST['rlnumbr'];
	$sesin = $_POST['sesin'];
	$sname = $_POST['sname'];
	$fname = $_POST['fname'];
	$clss = $_POST['clss'];
	$setn = $_POST['setn'];
	$mfee = $_POST['mfee'];
	if(!empty($_POST['prevbalance'])){ $prevbalance = $_POST['prevbalance']; }else{ $prevbalance = "0";}
	$Unpaid = 'Unpaid';
    $mnth = $_POST['manths'];
    $chllan_status = "monthly";
    $instId = $_POST['instId'];
    $dwedate = $_POST['dwedate'];
    $chln_date = date("d-m-Y");

$duplicity = mysqli_query($con,"select * from fee_collection where month='$mnth' && challan_status='$chllan_status' && instituteId='$instId'");
if(mysqli_num_rows($duplicity)>0){
echo "<script>swal.fire('Sorry!','This Month Challan Already Generated.','info');</script>";
}else{
foreach ($imgs as $key => $value) {
  $inst_feea = mysqli_query($con,"insert into fee_collection (student_imgs,familyId,rollno,session,student_name,father_name,class,section,monthly_fee,previous_balance,discounts,total_amount,receive_monthly,remaing_balance,fees_status,month,challan_status,instituteId,remarks,dates,due_dates) values ('".$value."','".$fmly[$key]."','".$rlnumbr[$key]."','".$sesin[$key]."','".$sname[$key]."','".$fname[$key]."','".$clss[$key]."','".$setn[$key]."','".$mfee[$key]."','0','0','0','0','".$prevbalance[$key]."','$Unpaid','$mnth','$chllan_status','".$instId[$key]."','None','$chln_date','$dwedate')");    
  }    
if($inst_feea){ echo "<script>swal.fire('Good Job!','Successfully All Students Challan Generated.','success');</script>"; }else{ echo "<script>swal.fire('Oops!','All Students Challans is not Generate.','error');</script>"; }

    }
}

?>
    </div>
    </div>
<?php require_once("source/foot-section.php"); ?>