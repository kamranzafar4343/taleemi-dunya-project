<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("profile.php"); require_once("lib/attendance.php");
require_once("lib/fee.php"); require_once("lib/examination.php"); require_once("lib/time-table.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> monthly attendance</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">    
<?php
$mt = date("m");
$sl_attend = mysqli_query($con,"select * from attandance where instituteId='$instituteId' && roll_no='$roll_num' && month='$mt'");
if(mysqli_num_rows($sl_attend)>0){
    while($result = mysqli_fetch_array($sl_attend)){
        $stu_name = $result['stu_name'];
        if(!empty($result['student_img'])){ $student_imgs = $result['student_img']; }else{ $student_imgs = "users.jpg"; }
        $status = $result['status'];
        $dates = $result['date'];
if($status == "A"){
?>
<div class="col-12 p-2 alert alert-success" style="background-color:hsla(0, 100%, 40%,0.2);">
      <div class="d-flex">
          <div class="p-0">
<img src="../student_imgs/<?php echo $student_imgs; ?>" class="img-fluid" style="width:40px;height:40px;border-radius:50%;border:2px solid red;">
          </div>
          <div class="p-2 flex-fill text-uppercase mt-2 text-white"><?php echo $stu_name; ?></div>
          <div class="p-2 flex-fill text-uppercase mt-2 text-white"><?php echo $dates; ?></div>
          <div class="p-2 flex-fill text-capitalize mt-2"><?php if($status == "P"){ echo "<span class='text-warning text-capitalize'>present</span>"; }elseif($status == "A"){ echo "<span class='text-capitalize' style='color:hsl(0, 100%, 50%);'>absent</span>"; }elseif($status=="L"){ echo "<span class='text-warning text-capitalize'>leave</span>"; }else{ echo "<span class='text-primary text-capitalize'>Half leave</span>"; } ?></div>
      </div>
</div>
<?php }elseif($status == "P"){ ?>
<div class="col-12 p-2 alert alert-success" style="background-color:hsla(146, 100%, 40%,0.2);">
      <div class="d-flex">
          <div class="p-0">
<img src="../student_imgs/<?php echo $student_imgs; ?>" class="img-fluid" style="width:40px;height:40px;border-radius:50%;border:2px solid green;">
          </div>
          <div class="p-2 flex-fill text-uppercase mt-2 text-white"><?php echo $stu_name; ?></div>
          <div class="p-2 flex-fill text-uppercase mt-2 text-white"><?php echo $dates; ?></div>
          <div class="p-2 flex-fill text-capitalize mt-2"><?php if($status == "P"){ echo "<span class='text-capitalize' style='color:hsl(134, 82%, 46%);'>present</span>"; }elseif($status == "A"){ echo "<span class='text-danger text-capitalize'>absent</span>"; }elseif($status=="L"){ echo "<span class='text-warning text-capitalize'>leave</span>"; }else{ echo "<span class='text-primary text-capitalize'>H</span>"; } ?></div>
      </div>
</div>
<?php }elseif($status == "L"){ ?>
<div class="col-12 p-2 alert alert-warning" style="background-color:hsla(35, 85%, 44%,0.2);">
      <div class="d-flex">
          <div class="p-0">
<img src="../student_imgs/<?php echo $student_imgs; ?>" class="img-fluid" style="width:40px;height:40px;border-radius:50%;border:2px solid red;">
          </div>
          <div class="p-2 flex-fill text-uppercase mt-2 text-white"><?php echo $stu_name; ?></div>
          <div class="p-2 flex-fill text-uppercase mt-2 text-white"><?php echo $dates; ?></div>
          <div class="p-2 flex-fill text-capitalize mt-2"><?php if($status == "P"){ echo "<span class='text-warning text-capitalize'>present</span>"; }elseif($status == "A"){ echo "<span class='text-capitalize' style='color:hsl(0, 100%, 50%);'>absent</span>"; }elseif($status=="L"){ echo "<span class='text-warning text-capitalize'>leave</span>"; }else{ echo "<span class='text-primary text-capitalize'>Half leave</span>"; } ?></div>
      </div>
</div>
<?php }else{ ?>
<div class="col-12 alert" style="background-color:hsla(306, 87%, 50%,0.4);border:1px solid white;">
      <div class="d-flex">
          <div class="p-2" style="overflow:hidden;width:40px;height:40px;border-radius:50%;border:1px solid purple;">
<img src="../student_imgs/<?php echo $student_imgs; ?>" class="img-fluid">
          </div>
          <div class="p-2 flex-fill text-uppercase mt-2 text-white"><?php echo $stu_name; ?></div>
          <div class="p-2 flex-fill text-uppercase mt-2 text-white"><?php echo $dates; ?></div>
          <div class="p-2 flex-fill text-capitalize mt-2"><?php if($status == "P"){ echo "<span class='text-success text-capitalize'>present</span>"; }elseif($status == "A"){ echo "<span class='text-danger text-capitalize'>absent</span>"; }elseif($status=="L"){ echo "<span class='text-warning text-capitalize'>leave</span>"; }else{ echo "<span class='text-capitalize' style='color:white;'>Half Leave</span>"; } ?></div>
      </div>
</div>
<?php    
}
    }
}else{ echo "<div class='text-capitalize alert alert-danger'>there are no monthly attendance record!</div>"; }
?>

    </div>
</div>

<?php require_once("source/foot-section.php"); ?>