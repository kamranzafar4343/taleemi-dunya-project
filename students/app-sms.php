<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("profile.php"); require_once("lib/attendance.php");
require_once("lib/fee.php"); require_once("lib/examination.php"); require_once("lib/time-table.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> app sms</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-6 mb-4"></div>    
        <div class="col-6 mb-4">
<div class="row">
    <?php
$sl_sms = mysqli_query($con,"select * from sms where instituteId='$instituteId' && roll_num='$roll_num'");
if(mysqli_num_rows($sl_sms)>0){
    while($results= mysqli_fetch_array($sl_sms)){
$instituteId = $results['instituteId'];
$famlyId = $results['famlyId'];
$roll_num = $results['roll_num'];
$class = $results['class'];
$section = $results['section'];
$session = $results['session'];
$stu_img = $results['stu_img'];
$student_name = $results['student_name'];
$file_image = $results['file_image'];
$message = $results['message'];
$sms_date = $results['sms_date'];
$month = $results['month'];
?>
<div class="col-12 mb-4">
    <div class="card p-3" style='background-color:hsl(35,100%,50%);border:1px solid hsl(35,100%,40%);color:white;border-radius:5px;'><?php echo $message; ?></div>
</div>
<?php
    }
}else{ echo "<div class='alert text-capitalize' style='background-color:hsla(0,100%,15%,0.3);border:1px solid hsla(0,100%,15%,0.7);color:hsla(0,100%,50%,0.7);'>there are not message!</div>"; }
?>
</div>
        </div>    
    </div>
<form>
    <div class="row fixed-bottom bg-black p-3">
<div class="col-12">
    <div class="input-group">
      <textarea type="text" placeholder="Write Message..." rows="2" class="form-control me-3" style="font-size:1.3rem;"></textarea>
      <label for="img" class="pt-4 me-2">
          <i class="fa-regular fa-images text-warning fa-2x"></i>
        <input type="file" id="img" style="display:none;">
      </label>
      <button class="btn"><i class="fa-regular fa-share-from-square text-warning fa-2x"></i></button>
    </div>
</div>    
    </div>
</form>
</div>

<?php require_once("source/foot-section.php"); ?>