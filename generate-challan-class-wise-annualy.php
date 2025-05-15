<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#fee"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">generate challan class wise annualy</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
        <label class="text-capitalize fs-6">class</label>
<select name="clse" class="form-select text-uppercase" id="cls">
    <option class="text-capitalize">---select class---</option>
<?php
$cls_mnger = mysqli_query($con,"select * from addClass where institute_id='$userId'");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $class_name = $clis['class_name'];
?>
    <option class="text-capitalize" value="<?php echo $id; ?>"><?php echo $class_name; ?></option>
<?php } ?>
</select>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
                <label class="text-capitalize fs-6">section</label>
<select name="sectn" class="form-select text-capitalize" id="strngs"><option value=" ">---select section---</option></select>
    </div>
<script>
    /// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instutes').value;
//    console.log(class_name);
 
$.ajax({
   url:'ajax/class-strength.php',
   type:"POST",
   data:{ class_title:class_name,institute_code:insti },
   success: function(result){
       $('#strngs').html(result);
      //console.log(result);
   }
    });
});
</script>
    <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
        <input type="hidden" value="<?php echo $userId; ?>" name="inst" id="instutes">
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
    
    <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mt-4">
        <div class="d-grid">
            <button name="btn_clas_gen" type="submit" class="btn btn-apna text-uppercase"><i class="fa-solid fa-repeat"></i> Generate</button>
        </div>
    </div>    
</div>
    </form>
<br><br>
    <div class="row">
        <div class="col">

<table class="table table-responsive w-100">
    <tr class="bg-apna">
        <th>#</th>
        <th>Image</th>
        <th>Roll No.</th>
        <th>Session</th>
        <th>Student Name</th>
        <th>Father Name</th>
        <th>Class</th>
        <th>Section</th>
        <th>Fee</th>
    </tr>
<?php
if(isset($_POST['btn_clas_gen'])){
    
    $clse = $_POST['clse'];
    $sesn = $_POST['sesn'];
    $inst = $_POST['inst'];
    $sectn = $_POST['sectn'];


$sl_clas = mysqli_query($con,"select * from addStudents where class LIKE '%$clse%' && section LIKE '%$sectn%' && session LIKE '%$sesn%' && instituteId LIKE '%$userId%'");
$ab = 1;
while($ab <= 10000000 && $rows = mysqli_fetch_assoc($sl_clas)){

$id = $rows['id'];
$instituteId = $rows['instituteId'];
$familyId = $rows['familyId'];
$student_img = $rows['image'];
$rollnum = $rows['roll_num'];
$session = $rows['session'];
$student_name = $rows['studentName'];
$father_name = $rows['fatherName'];
$class = $rows['class'];
$section = $rows['section'];
$actual_fee = $rows['totalFee'];
$previous_session_fee = $result['previous_session_fee'];
$mode_of_payment = $result['mode_of_payment'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?> 
<form method="post" enctype="multipart/form-data">
    <tr style="background:hsl(35, 100%, 80%);">
        <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $ab++; ?></td>
        <td style="border:1px solid hsl(25, 100%, 50%);" width="50"><img src="student_imgs/<?php if(!empty($student_img)){ echo $student_img; }else{ echo "users.jpg"; } ?>" class='img-fluid'><input type="hidden" value="<?php echo $student_img; ?>" name="imgs[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $rollnum; ?><input type="hidden" value="<?php echo $rollnum; ?>" name="rlnumbr[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $session; ?><input type="hidden" value="<?php echo $session; ?>" name="sesin[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $student_name; ?><input type="hidden" value="<?php echo $student_name; ?>" name="sname[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $father_name; ?><input type="hidden" value="<?php echo $father_name; ?>" name="fname[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $class_name; ?><input type="hidden" value="<?php echo $class; ?>" name="clss[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $section; ?><input type="hidden" value="<?php echo $section; ?>" name="setn[]"></td>
        <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $actual_fee; ?><input type="hidden" value="<?php echo $actual_fee; ?>" name="mfee[]"></td>
        <input type="hidden" value="<?php echo $userId; ?>" name="instId[]">
        <input type="hidden" value="<?php echo $familyId; ?>" name="fmly[]">
            <input value="<?php echo $previous_session_fee; ?>" name="prevbalance[]" type="hidden">
    </tr>
<?php } ?>
<tr>
    <td colspan="10" align="right">
        <button type="submit" class="btn btn-apna" name="but_generate"> <i class="fa-solid fa-arrows-rotate"></i> Generate Challan</button>
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
    $mnth = date("m");
    $chllan_status = "annualy";
    $instId = $_POST['instId'];
    $chln_date = date("j-m-Y");

$duplicity = mysqli_query($con,"select * from fee_collection where rollno = '$rlnumbr' && instituteId='$instId' && month='$mnth'");
if(mysqli_num_rows($duplicity) == 0){

foreach ($imgs as $key => $value) {
  $inst_feea = mysqli_query($con,"insert into fee_collection (student_imgs,familyId,rollno,session,student_name,father_name,class,section,monthly_fee,previous_balance,discounts,total_amount,receive_monthly,remaing_balance,fees_status,month,challan_status,instituteId,remarks,dates) values ('".$value."','".$fmly[$key]."','".$rlnumbr[$key]."','".$sesin[$key]."','".$sname[$key]."','".$fname[$key]."','".$clss[$key]."','".$setn[$key]."','".$mfee[$key]."','0','0','0','0','".$prevbalance[$key]."','$Unpaid','$mnth','$chllan_status','".$instId[$key]."','None','$chln_date')");    
  }    
if($inst_feea){ echo "<script>swal.fire('Good Job!','Successfully Month Wise Generated Challan.','');</script>"; }else{ echo "<script>swal.fire('Oops!','Month Wise Challan is not Generated.','error');</script>"; }
}else{
echo "<script>swal.fire('Sorry!','Challan Already Generated.','info');</script>";
    }
}

?>
    </div>
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
	
</script>
    </div>
</div>
</div>

<?php require_once("source/foot-section.php"); ?>