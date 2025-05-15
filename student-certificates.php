<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#e-certificates"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Student Certificates</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
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
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
        <select name="sectn" class="form-select text-capitalize" id="strngs"><option value="" class="text-capitalize">---select section---</option></select>
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
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
        <input type="hidden" value="<?php echo $userId; ?>" name="inst" id="instutes">
<select name="sesn" class="form-select text-capitalize">
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
    
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
        <div class="d-grid">
            <button name="btn_gen" type="submit" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> Generate</button>
        </div>
    </div>    
</div>
    </form>
<br><br>
    <div class="row">
        <div class="col">
<table class="table table-responsive w-100">
    <tr align="center" class="bg-apna">
        <th>Sr.No</th>
        <th>Image</th>
        <th>Student Name</th>
        <th>Class</th>
        <th>Section</th>
        <th>Session</th>
        <th>Roll No.</th>
        <th>M.C</th>
        <th>L.C</th>
        <th>S.O.M</th>
        <th>C.C</th>
    </tr>
<?php
$a = 1;
if(isset($_POST['btn_gen'])){
    $clse = $_POST['clse'];
    $sesn = $_POST['sesn'];
    $inst = $_POST['inst'];
    $sectn = $_POST['sectn'];
$sl_clas = mysqli_query($con,"select * from addStudents where instituteId LIKE '%$inst%' && class LIKE '%$clse%' && section LIKE '%$sectn%' && session LIKE '%$sesn%'");
$count = mysqli_num_rows($sl_clas);
if($count == 0){ echo "<div class='alert alert-danger text-uppercase'>there are no record here.</div>"; }
while($a <= 100000 && $result = mysqli_fetch_array($sl_clas)){
$id = $result['id'];
    $admissionDate = $result['admissionDate'];
    $inquiryId = $result['inquiryId'];
    $roll_num = $result['roll_num'];
    $class = $result['class'];
    $section = $result['section'];
    $medium = $result['medium'];
    $session = $result['session'];
    $fmimage = $result['image'];
    $studentName = $result['studentName'];
    $gender = $result['gender'];
    $dateOfBirth = $result['dateOfBirth'];
    $phone = $result['phone'];
    $homeAddress = $result['homeAddress'];
    $fatherName = $result['fatherName'];
    $cnic = $result['cnic'];
    $cell = $result['cell'];
?>
<tr align="center" style='background:hsl(35, 100%, 80%);'>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $a++; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" width="50"><img class="img-fluid" src="student_imgs/<?php if(!empty($fmimage)){ echo $fmimage; }else{ echo "users.jpg"; } ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $studentName; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $class; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $section; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $session; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $roll_num; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><a href="mother-certificate?id=<?php echo $id; ?>" target="_blank" title="Mother Certificate" class="btn"><i class="fa-solid fa-person-breastfeeding" style="color:hsl(348, 100%, 50%);"></i></a></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><a href="leaving-certificate?id=<?php echo $id; ?>" target="_blank" title="Leaving Certificate" class="btn"><i class="fa-solid fa-person-through-window" style="color:hsl(290,100%,50%);"></i></a></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><a href="month-of-student-certificate?id=<?php echo $id; ?>" target="_blank" title="Student of Month" class="btn"><i class="fa-solid fa-trophy" style="color:hsl(250,100%,50%);"></i></a></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><a href="completion-certificate?id=<?php echo $id; ?>" target="_blank" title="Completion Certificate"><i class="fa-solid fa-flag-checkered text-success"></i></a></td>
</tr>
<?php
    }    
}
?>


</table>

        </div>
    </div>    
</div>
<?php require_once("source/foot-section.php"); ?>