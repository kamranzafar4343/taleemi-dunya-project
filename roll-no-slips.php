<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#exames"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> roll no slips</li>
  </ol>
</nav>
            </div>
        </div>
    </div>
</div>
<br>
<style>
.table, .table-responsive, .table tr th, .table tr td, .table tr{
    border:none;
    box-shadow:none;
    border-bottom:none;
}
</style>
<div class="container-fluid mt-4">
    <form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">class</label>
<select name="clse" class="form-select text-uppercase" id="cls">
    <option class="text-capitalize" value="">---select class---</option>
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
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">section</label>
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
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <input type="hidden" value="<?php echo $userId; ?>" name="inst" id="instutes">
        <label class="text-capitalize">session</label>
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
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">term / samester / month</label>
<select name="temss" class="form-select text-capitalize">
<?php
$cls_tems = mysqli_query($con,"select * from addTerms where instituteId='$userId'");
$cntsi = mysqli_num_rows($cls_tems);
if($cntsi == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($terms = mysqli_fetch_array($cls_tems)){
    $id = $terms['id'];
    $instituteId = $terms['instituteId'];
    $term = $terms['term'];
?>
    <option class="text-capitalize"><?php echo $term; ?></option>
<?php } ?>
</select>
    </div>
    
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mt-4">
        <div class="d-grid">
            <button name="btn_gen" type="submit" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> Generate</button>
        </div>
    </div>    
</div>
    </form>
    <div class="row" id="bodies mt-3">
        <div class="col datas">
<div class="row">
<?php
$a = 1;
if(isset($_POST['btn_gen'])){
    $clse = $_POST['clse'];
    $sesn = $_POST['sesn'];
    $inst = $_POST['inst'];
    $sectn = $_POST['sectn'];
    $temss = strtolower($_POST['temss']);
$sl_clas = mysqli_query($con,"select * from addStudents where instituteId LIKE '%$inst%' && class LIKE '%$clse%' && section LIKE '%$sectn%' && session LIKE '%$sesn%'");
$count = mysqli_num_rows($sl_clas);
if($count == 0){ echo "<div class='alert alert-danger text-uppercase'>there are no record here.</div>"; }
while($a <= 100000 && $result = mysqli_fetch_array($sl_clas)){
$instituteId = $result['instituteId'];
$familyId = $result['familyId'];
$studentName = $result['studentName'];
$frmimage = $result['image'];
$fatherName = $result['fatherName'];
$class = $result['class'];
$section = $result['section'];
$session = $result['session'];
$roll_num = $result['roll_num'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
    <div class="col-12 mt-3">
        <div style="height:15rem;overflow:hidden;border:2px solid black;background:hsl(35, 100%, 80%);">
<table class="w-100">
    <tr>
        <th width="50">
<div style="width:50px;height:50px;overflow:hidden;">
    <img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid">
</div>
        </th>
        <th colspan="2">
            <h4 class="fs-4 fw-bold text-capitalize text-center"><?php echo $instituteName; ?></h4>
        </th>
        <th width="50">
            <div style="width:50px;height:50px;overflow:hidden;">
<img src="student_imgs/<?php if(!empty($frmimage)){ echo $frmimage; }else{ echo "users.jpg"; } ?>" class="img-fluid">
            </div>
        </th>
    </tr>
    <tr>
        <th class="bg-apna" colspan="4">
<h6 class="fs-6 text-capitalize text-center p-0" style="border:1px dashed black;">
    Roll Number Slip For <?php echo "<span class='text-capitalize fs-6'>".$temss."</span>"." Exams ".$sesn; ?>
</h6>
        </th>
    </tr>
</table>
<table class="w-100">
    <tr>
        <th style="font-size:0.8rem;" class="fw-bold">Family ID#</th>
        <td style="font-size:0.8rem;"><?php echo $familyId; ?></td>
        <th style="font-size:0.8rem;" class="fw-bold">Roll#:</th>
        <td style="font-size:0.8rem;"><?php echo $roll_num; ?></td>
    </tr>
    <tr>
        <th style="font-size:0.8rem;" class="fw-bold">Student Name</th>
        <td style="font-size:0.8rem;" class="text-capitalize"><?php echo $studentName; ?></td>
        <th style="font-size:0.8rem;" class="fw-bold">Father Name</th>
        <td style="font-size:0.8rem;" class="text-capitalize"><?php echo $fatherName; ?></td>
    </tr>
    <tr>
        <th style="font-size:0.8rem;" class="fw-bold">Class</th>
        <td style="font-size:0.8rem;" class="text-capitalize"><?php echo $class_name; ?></td>
        <th style="font-size:0.8rem;" class="fw-bold">Section</th>
        <td style="font-size:0.8rem;" class="text-capitalize"><?php echo $section; ?></td>
    </tr>
    <tr>
        <th style="font-size:0.8rem;" colspan="4">Note:</th>
    </tr>
    <tr>
        <td style="font-size:0.7rem;" colspan="2">Bring this slip in the Exam.</td>
        <td style="font-size:0.7rem;" colspan="2">Please bring all necessary writing materials such as a pen, pencil etc.</td>
    </tr>
    <tr>
        <td style="font-size:0.7rem;" colspan="2">Give and take anything during exam is strictly prohibited.</td>
        <td style="font-size:0.7rem;" colspan="2">Appearance in the exam is not allowed without slip.</td>
    </tr>
    <tr align="center">
        <th class="text-uppercase" colspan="4" style="font-size:0.9rem;">wish you success in your <?php echo $temss; ?> exams</th>
    </tr>
    <tr align="center">
        <th colspan="6" style="font-size:0.8rem;border:1px solid black;">
            Address: <?php echo $mainaddress; ?> Cell: <?php echo $mainphones; ?>
        </th>
    </tr>
</table>
        </div>
    </div>
<?php
    }    
}
?>    
</div>
        </div>
    </div>
<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-apna' id="btn_print"><i class="fa fa-print"></i> Print</button>
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