<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#studentportal"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> video lectures</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
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
<div class="container-fluid mt-4">
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
<select name="sectn" class="form-select text-capitalize" id="strngs"><option value="">---select section---</option></select>
    </div>
                <input type="hidden" value="<?php echo $userId; ?>" name="inst" id="instutes">
<script>
    /// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instutes').value;
//alert(class_name);

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
        <label class="text-capitalize fs-6">session</label>
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
<form method="post" enctype="multipart/form-data">
<table class="table table-responsive table-striped w-100 bg-white">
    <tr>
        <th colspan="2">Iframe Link Inserted</th>
        <td colspan="3"><input class="form-control" type="text" name="inpt" autocomplete="off"></td>
        <td colspan="3">
            <button class="btn btn-success text-uppercase" type="submit" name="btn_lect">
                <i class="fa-regular fa-paper-plane"></i> send lecture to selected student
            </button>
        </td>
    </tr>
    <tr align="center" class="bg-apna">
        <th>Sr.No</th>
        <th>Image</th>
        <th>Student Name</th>
        <th>Father Name</th>
        <th>Class</th>
        <th>Section</th>
        <th>Session</th>
        <th>Roll No.</th>
    </tr>
<?php
$a = 1;
if(isset($_POST['btn_gen'])){
    $clse = $_POST['clse'];
    $sesn = $_POST['sesn'];
    $inst = $_POST['inst'];
    $sectn = $_POST['sectn'];
$sl_clas = mysqli_query($con,"select * from addStudents where instituteId='$inst' && class='$clse' && section='$sectn' && session='$sesn'");
$count = mysqli_num_rows($sl_clas);
if($count == 0){ echo "<div class='alert alert-danger text-uppercase'>there are no record here.</div>"; }
while($a <= 100000 && $result = mysqli_fetch_array($sl_clas)){
$stid = $result['id'];
$instituteId = $result['instituteId'];
$studentName = $result['studentName'];
if(!empty($result['image'])){ $fmimage = $result['image']; }else{ $fmimage = "users.jpg"; }
$fatherName = $result['fatherName'];
$class = $result['class'];
$section = $result['section'];
$session = $result['session'];
$roll_num = $result['roll_num'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>

<tr align="center" style="background-color:hsl(30,100%,80%);">
    <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $a++; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' width="50"><img src="student_imgs/<?php echo $fmimage; ?>" class="img-fluid"><input type="hidden" value="<?php echo $fmimage; ?>" name="stimge[]"></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-capitalize"><?php echo $studentName; ?><input type="hidden" value="<?php echo $studentName; ?>" name="st_nme[]"></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-capitalize"><?php echo $fatherName; ?><input type="hidden" value="<?php echo $fatherName; ?>" name="fnme[]"></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-uppercase"><?php echo $class_name; ?><input type="hidden" value="<?php echo $class; ?>" name="cles[]"></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-uppercase"><?php echo $section; ?><input type="hidden" value="<?php echo $section; ?>" name="sctn[]"></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $session; ?><input type="hidden" value="<?php echo $session; ?>" name="sesns[]"></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $roll_num; ?><input type="hidden" value="<?php echo $roll_num; ?>" name="rlnmbr[]"></td>   
    <input type="hidden" value="<?php echo $userId; ?>" name="inst_id">
</tr>
<?php    
    }
}
 ?>
</table>
</form>
<?php
if(isset($_POST['btn_lect'])){
    
    $st_nme = $_POST['st_nme'];
    $fnme = $_POST['fnme'];
    $cles = $_POST['cles'];
    $sctn = $_POST['sctn'];
    $sesns = $_POST['sesns'];
    $rlnmbr = $_POST['rlnmbr'];
    $inpt = $_POST['inpt'];
    $inst_id = $_POST['inst_id'];
    $dil_dat = date("j-m-Y");

foreach ($st_nme as $key => $value) {
  $inst_lectres = mysqli_query($con,"insert into lectures (student_name,father_name,class,section,session,roll_number,links,instituteId,deliver_date) values ('".$value."','".$fnme[$key]."','".$cles[$key]."','".$sctn[$key]."','".$sesns[$key]."','".$rlnmbr[$key]."','$inpt','$inst_id','$dil_dat')"); }
if($inst_lectres){ echo "<script>swal.fire('Good Jod!', 'Lecture Send Successfully', 'success');</script>"; }else{ echo "<script>swal.fire('Oh Sorry!', 'Lecture is not Send', 'error');</script>"; }

}
?>
        </div>
    </div>    
</div>
<?php require_once("source/foot-section.php"); ?>