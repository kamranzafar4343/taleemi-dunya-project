<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> promote students</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col mb-3">
<h4 class="fs-4 fw-bold text-uppercase text-center text-warning"><?php echo $_REQUEST['msg']; ?></h4>
        </div>
    </div>
    <form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
        <label class="text-capitalize fs-6">class</label>
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
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="fs-6 text-capitalize text-white">Section</label>
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
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
        <input type="hidden" value="<?php echo $userId; ?>" name="inst" id="instutes">
                <label class="text-capitalize fs-6">session</label>
<select name="sesn" class="form-select">
<?php
$cls_mnger = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
$cnts = mysqli_num_rows($cls_mnger);
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $session = $clis['session'];
?>
    <option class="text-capitalize"><?php echo $session; ?></option>
<?php } ?>
</select>
    </div>
    
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mt-4">
        <div class="d-grid">
            <button name="btn_gen" type="submit" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> Generate</button>
        </div>
    </div>    
</div>
    </form>
<br><br>
    <div class="row">
        <div class="col">
<form method="post" enctype="multipart/form-data" action="promote">
<table class="w-100 bg-apna-body">
    <tr align="center" class="bg-apna">
        <th class="border-apna">Sr.No</th>
        <th class="border-apna"><input type="checkbox" id="checkAll" title="Check / Uncheck All"></th>
        <th class="border-apna">A.D</th>
        <th class="border-apna">Image</th>
        <th class="border-apna">Student Name</th>
        <th class="border-apna">Father Name</th>
        <th class="border-apna">Family ID#</th>
        <th class="border-apna">Class</th>
        <th class="border-apna">Section</th>
        <th class="border-apna">Session</th>
        <th class="border-apna">Roll No.</th>
        <th class="border-apna">Fee</th>
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
$stid = $result['id'];
$instituteId = $result['instituteId'];
$familyId = $result['familyId'];
$admissionDate = $result['admissionDate'];
$studentName = $result['studentName'];
$frmimage = $result['image'];
$fatherName = $result['fatherName'];
$class = $result['class'];
$section = $result['section'];
$session = $result['session'];
$roll_num = $result['roll_num'];
$totalFee = $result['totalFee'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<tr align="center">
    <td class="border-apna"><?php echo $a++; ?></td>
    <td class="border-apna"><input type='checkbox' name='update[]' value='<?php echo $stid; ?>' ></td>
    <td class="border-apna"><?php echo $admissionDate; ?></td>
<?php
if(!empty($frmimage)){ ?>
    <td class="border-apna" width="50"><img src="student_imgs/<?php echo $frmimage; ?>" class="img-fluid"></td>
<?php } else { ?>
<td class="border-apna" width="50"><img src="student_imgs/users.jpg" class="img-fluid"></td>
<?php } ?>
    <td class="text-capitalize border-apna"><?php echo $studentName; ?></td>
    <td class="text-capitalize border-apna"><?php echo $fatherName; ?></td>
    <td class="border-apna"><input type="text" value="<?php echo $familyId; ?>" readonly style="width:60px;"></td>
    <td class="text-uppercase border-apna">
<div class="input-group">
    <span class="px-2"><?php echo $class_name; ?></span>
</div>  
    </td>
    <td class="text-uppercase border-apna">
<div class="input-group">
    <span class="px-2"><?php echo $section; ?></span>
</div>
    </td>
    <td class="border-apna"><?php echo $session; ?></td>
    <td class="border-apna"><input type="text" readonly value="<?php echo $roll_num; ?>" style="width:60px;"></td>
    <td class="border-apna"><input type="text" readonly value="<?php echo $totalFee; ?>" style="width:60px;"></td>
    <input type="hidden" value="<?php echo $userId; ?>" name="inst_id">
</tr>
<?php    
    }
}
?>
<tr align="right"><td colspan="13"><button type="submit" class="btn btn-apna text-uppercase" name="btn_edit"><i class="fa-regular fa-pen-to-square"></i> promote students</button></td></tr>
</table>
</form>
<script>
$(document).ready(function(){

  // Check/Uncheck ALl
  $('#checkAll').change(function(){
    if($(this).is(':checked')){
      $('input[name="update[]"]').prop('checked',true);
    }else{
      $('input[name="update[]"]').each(function(){
         $(this).prop('checked',false);
      });
    }
  });

  // Checkbox click
  $('input[name="update[]"]').click(function(){
    var total_checkboxes = $('input[name="update[]"]').length;
    var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

    if(total_checkboxes_checked == total_checkboxes){
       $('#checkAll').prop('checked',true);
    }else{
       $('#checkAll').prop('checked',false);
    }
  });
});
</script>
        </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>