<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("profile.php"); require_once("lib/attendance.php"); require_once("lib/examination.php"); require_once("lib/time-table.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> today attendance</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">    
<?php
$mnth = date("m");
$sl_attend = mysqli_query($con,"select * from staffAttendance where instituteId='$instituteId' && staff_id='$staffId' && month='$mnth'");
if(mysqli_num_rows($sl_attend)>0){
    while($result = mysqli_fetch_array($sl_attend)){
        $staff_name = $result['staff_name'];
if(!empty($result['staffimages'])){ $staffimages = $result['staffimages']; }else{ $staffimages = "users.jpg"; }
        $status = $result['status'];
if($status == "A"){
?>
<div class="col-12 p-2 alert alert-success" style="background-color:hsla(0, 100%, 40%,0.2);">
      <div class="d-flex">
          <div class="p-0">
<img src="../staff_imgs/<?php echo $staffimages; ?>" class="img-fluid" style="width:40px;height:40px;border-radius:50%;border:2px solid red;">
          </div>
          <div class="p-2 flex-fill text-uppercase mt-2 text-white"><?php echo $staff_name; ?></div>
          <div class="p-2 flex-fill text-capitalize mt-2"><?php if($status == "P"){ echo "<span class='text-warning text-capitalize'>present</span>"; }elseif($status == "A"){ echo "<span class='text-capitalize' style='color:hsl(0, 100%, 50%);'>absent</span>"; }elseif($status=="L"){ echo "<span class='text-warning text-capitalize'>leave</span>"; }else{ echo "<span class='text-primary text-capitalize'>Half leave</span>"; } ?></div>
      </div>
</div>
<?php }elseif($status == "P"){ ?>
<div class="col-12 p-2 alert alert-success" style="background-color:hsla(146, 100%, 40%,0.2);">
      <div class="d-flex">
          <div class="p-0">
<img src="../staff_imgs/<?php echo $staffimages; ?>" class="img-fluid" style="width:40px;height:40px;border-radius:50%;border:2px solid green;">
          </div>
          <div class="p-2 flex-fill text-uppercase mt-2 text-white"><?php echo $staff_name; ?></div>
          <div class="p-2 flex-fill text-capitalize mt-2"><?php if($status == "P"){ echo "<span class='text-capitalize' style='color:hsl(134, 82%, 46%);'>present</span>"; }elseif($status == "A"){ echo "<span class='text-danger text-capitalize'>absent</span>"; }elseif($status=="L"){ echo "<span class='text-warning text-capitalize'>leave</span>"; }else{ echo "<span class='text-primary text-capitalize'>H</span>"; } ?></div>
      </div>
</div>
<?php }elseif($status == "L"){ ?>
<div class="col-12 p-2 alert alert-warning" style="background-color:hsla(35, 85%, 44%,0.2);">
      <div class="d-flex">
          <div class="p-0">
<img src="../staff_imgs/<?php echo $staffimages; ?>" class="img-fluid" style="width:40px;height:40px;border-radius:50%;border:2px solid red;">
          </div>
          <div class="p-2 flex-fill text-uppercase mt-2 text-white"><?php echo $staff_name; ?></div>
          <div class="p-2 flex-fill text-capitalize mt-2"><?php if($status == "P"){ echo "<span class='text-warning text-capitalize'>present</span>"; }elseif($status == "A"){ echo "<span class='text-capitalize' style='color:hsl(0, 100%, 50%);'>absent</span>"; }elseif($status=="L"){ echo "<span class='text-warning text-capitalize'>leave</span>"; }else{ echo "<span class='text-primary text-capitalize'>Half leave</span>"; } ?></div>
      </div>
</div>
<?php }else{ ?>
<div class="col-12 alert" style="background-color:hsla(306, 87%, 50%,0.4);border:1px solid white;">
      <div class="d-flex">
          <div class="p-2" style="overflow:hidden;width:40px;height:40px;border-radius:50%;border:1px solid purple;">
<img src="../staff_imgs/<?php echo $staffimages; ?>" class="img-fluid">
          </div>
          <div class="p-2 flex-fill text-uppercase mt-2 text-white"><?php echo $staff_name; ?></div>
          <div class="p-2 flex-fill text-capitalize mt-2"><?php if($status == "P"){ echo "<span class='text-success text-capitalize'>present</span>"; }elseif($status == "A"){ echo "<span class='text-danger text-capitalize'>absent</span>"; }elseif($status=="L"){ echo "<span class='text-warning text-capitalize'>leave</span>"; }else{ echo "<span class='text-capitalize' style='color:white;'>Half Leave</span>"; } ?></div>
      </div>
</div>
<?php    
}
    }
}else{ echo "<div class='text-capitalize alert alert-danger'>there are no today attendance record!</div>"; }
?>

    </div>
</div>

<?php require_once("source/foot-section.php"); ?>