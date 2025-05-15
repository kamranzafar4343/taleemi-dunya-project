<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#attendance-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> update staff attendance</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-12 col-sm-6 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">Session</label>
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
    <div class="col-12 col-sm-6 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">date</label>
        <input type="date" class="form-control" name="st_date">
    </div>  
    
    <div class="col-12 col-sm-6 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <div class="d-grid mt-4">
            <button name="btn_gen" type="submit" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> Generate</button>
        </div>
    </div>    
</div>
    </form>
<br><br>
    <div class="row">
        <div class="col">
<table class="table table-responsive table-striped w-100">
    <tr align="center" class="bg-apna">
        <th style="border:1px solid hsl(25, 100%, 50%);">Sr.No</th>
        <th style="border:1px solid hsl(25, 100%, 50%);"><input type="checkbox" id="checkAll" title="Check / Uncheck All"></th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Date</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Image</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Staff Name</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Father Name</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Post</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Type</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Session</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">StaffID#</th>
        <th style="border:1px solid hsl(25, 100%, 50%);">Status</th>
    </tr>
<?php
$a = 1;
if(isset($_POST['btn_gen'])){

    $sesn = $_POST['sesn'];
    $inst = $_POST['inst'];
    $st_date = $_POST['st_date'];
    $frmt = explode("-",$st_date);
    $dat = intval($frmt['0']);
    $mnt = $frmt['1'];
    $yr = $frmt['2'];
    $sr_dte = $dat."-".$mnt."-".$yr;
   
$sl_clas = mysqli_query($con,"select * from staffAttendance where instituteId='$inst' && session='$sesn' && date='$sr_dte'");
$count = mysqli_num_rows($sl_clas);
if($count == 0){ echo "<div class='alert alert-danger text-uppercase'>there are no record here.</div>"; }
while($a <= 100000 && $result = mysqli_fetch_array($sl_clas)){
$ides = $result['id'];
$instituteId = $result['instituteId'];
$staff_name = $result['staff_name'];
$father_name = $result['father_name'];
$staffimages = $result['staffimages'];
$post = $result['post'];
$staffType = $result['staffType'];
$session = $result['session'];
$staff_id = $result['staff_id'];
$status = $result['status'];
$date = $result['date'];

?>
<form method="post" enctype="multipart/form-data">
<tr align="center" style='background:hsl(35, 100%, 80%);'>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $a++; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><input type='checkbox' name='update[]' value='<?= $ides ?>' ></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $date; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" width="50"><img class="img-fluid" src="staff_imgs/<?php if(!empty($staffimages)){ echo $staffimages; }else{ echo "users.jpg"; } ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $staff_name; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo  $father_name; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $post; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $staffType; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $session; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $staff_id; ?></td>
    <input type="hidden" value="<?php echo $st_date; ?>" id="stdte">
    <td style="border:1px solid hsl(25, 100%, 50%);">
<select class="form-select text-capitalize" name="stats_<?= $ides ?>">
    <option class="text-capitalize" value="P"><?php echo $status; ?></option>
    <option class="text-capitalize" value="P">present</option>
    <option class="text-capitalize" value="A">absent</option>
    <option class="text-capitalize" value="L">leave</option>
    <option class="text-capitalize" value="H">holiday</option>
</select>
    </td>
</tr>
<?php
    }    
}
?>
<tr align="right" style='background:hsl(35, 100%, 80%);'>
    <td colspan="11" style="border:1px solid hsl(25, 100%, 50%);"><button class="btn btn-apna text-uppercase" type="submit" name="but_promote"><i class="fa-solid fa-retweet"></i> update</button></td>
</tr>
</form>
</table>
    </div>
<?php

if(isset($_POST['but_promote'])){

  if(isset($_POST['update'])){
    foreach($_POST['update'] as $updateid){

      $stats = $_POST['stats_'.$updateid];


      if($stats !=''>0){
         $updateUser = "UPDATE staffAttendance SET status='".$stats."' WHERE id=".$updateid;
         $promt_clas = mysqli_query($con,$updateUser);
         if ($promt_clas){
echo "<script>const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Attendance Update Successfully!'
})</script>";
         }else {
echo "<script>const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Attendance is not Updated!'
})</script>";
         }
      }

    }
  }

}

?>
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

</div>
<?php require_once("source/foot-section.php"); ?>