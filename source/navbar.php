<nav class="navbar navbar-expand-lg mb-3 px-3" style="background-color:hsl(0,0%,8%);">
  <div class="container-fluid">
    <a class="navbar-brand text-uppercase fw-bold fs-4 text-warning" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid" style="width:30px;overflow:hidden;background:white;"> <?php echo $instituteName; ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars text-white"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-bars"></i> Menu</a>
  <ul class="dropdown-menu">
<?php if($role == 'director'){ ?>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#add-inquiry"><img src="icons/inquiry.webp" class="card-img-top" style="width:10%;"> Inquiry</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#inquiry-manager"><img src="icons/inquiry-manager.webp" class="card-img-top" style="width:10%;"> inquiry manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#add-students"><img src="icons/students.webp" class="card-img-top" style="width:10%;"> students</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"> <img src="icons/student-manager.webp" class="card-img-top" style="width:10%;"> students manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="javascript:void()" onclick="location.href='add-staffs'"> <img src="icons/staff.webp" class="card-img-top" style="width:10%;"> staff</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#staff-manager"> <img src="icons/staff-manager.webp" class="card-img-top" style="width:10%;"> staff manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#attendance"> <img src="icons/attendance.webp" class="card-img-top" style="width:10%;"> attendance</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#attendance-manager"> <img src="icons/attendance-manager.webp" class="card-img-top" style="width:10%;"> attendance manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#fee"> <img src="icons/challan.webp" class="card-img-top" style="width:10%;"> generate challan</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#chlan-manager"> <img src="icons/challan-manager.webp" class="card-img-top" style="width:10%;"> challan manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#clection"> <img src="icons/fee.webp" class="card-img-top" style="width:10%;"> collection</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#academics">  <img src="icons/academics.webp" class="card-img-top" style="width:10%;"> academics</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#acad-manager"><img src="icons/academic-manager.webp" class="card-img-top" style="width:10%;"> academic manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#exames"> <img src="icons/exames.webp" class="card-img-top" style="width:10%;"> exames</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#exame-manager"> <img src="icons/exameManager.webp" class="card-img-top" style="width:10%;"> exame manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#accounts"> <img src="icons/account.webp" class="card-img-top" style="width:10%;"> accounts</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#account-manager"> <img src="icons/account-manager.webp" class="card-img-top" style="width:10%;"> account manager</a></li>
<?php }elseif($role == 'admin'){ ?>
<li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#add-inquiry"><img src="icons/inquiry.webp" class="card-img-top" style="width:10%;"> Inquiry</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#inquiry-manager"><img src="icons/inquiry-manager.webp" class="card-img-top" style="width:10%;"> inquiry manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#add-students"><img src="icons/students.webp" class="card-img-top" style="width:10%;"> students</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"> <img src="icons/student-manager.webp" class="card-img-top" style="width:10%;"> students manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="javascript:void()" onclick="location.href='add-staffs'"> <img src="icons/staff.webp" class="card-img-top" style="width:10%;"> staff</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#staff-manager"> <img src="icons/staff-manager.webp" class="card-img-top" style="width:10%;"> staff manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#attendance"> <img src="icons/attendance.webp" class="card-img-top" style="width:10%;"> attendance</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#attendance-manager"> <img src="icons/attendance-manager.webp" class="card-img-top" style="width:10%;"> attendance manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#fee"> <img src="icons/challan.webp" class="card-img-top" style="width:10%;"> generate challan</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#academics">  <img src="icons/academics.webp" class="card-img-top" style="width:10%;"> academics</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#acad-manager"><img src="icons/academic-manager.webp" class="card-img-top" style="width:10%;"> academic manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#exames"> <img src="icons/exames.webp" class="card-img-top" style="width:10%;"> exames</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#exame-manager"> <img src="icons/exameManager.webp" class="card-img-top" style="width:10%;"> exame manager</a></li>
<?php }elseif($role == 'principal'){ ?>
<li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#add-inquiry"><img src="icons/inquiry.webp" class="card-img-top" style="width:10%;"> Inquiry</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#inquiry-manager"><img src="icons/inquiry-manager.webp" class="card-img-top" style="width:10%;"> inquiry manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#add-students"><img src="icons/students.webp" class="card-img-top" style="width:10%;"> students</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"> <img src="icons/student-manager.webp" class="card-img-top" style="width:10%;"> students manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="javascript:void()" onclick="location.href='add-staffs'"> <img src="icons/staff.webp" class="card-img-top" style="width:10%;"> staff</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#staff-manager"> <img src="icons/staff-manager.webp" class="card-img-top" style="width:10%;"> staff manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#attendance"> <img src="icons/attendance.webp" class="card-img-top" style="width:10%;"> attendance</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#attendance-manager"> <img src="icons/attendance-manager.webp" class="card-img-top" style="width:10%;"> attendance manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#fee"> <img src="icons/challan.webp" class="card-img-top" style="width:10%;"> generate challan</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#academics">  <img src="icons/academics.webp" class="card-img-top" style="width:10%;"> academics</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#acad-manager"><img src="icons/academic-manager.webp" class="card-img-top" style="width:10%;"> academic manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#exames"> <img src="icons/exames.webp" class="card-img-top" style="width:10%;"> exames</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#exame-manager"> <img src="icons/exameManager.webp" class="card-img-top" style="width:10%;"> exame manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#e-certificates"> <img src="icons/certificate.webp" class="card-img-top" style="width:10%;"> e-certificates</a></li>
<li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#reminder"> <img src="icons/reminder.webp" class="card-img-top" style="width:10%;"> reminder</a></li>
<li><a class="dropdown-item text-capitalize" href="javascript:void()" onclick="location.href='call-log'"> <img src="icons/call-log.webp" class="card-img-top" style="width:10%;"> call log</a></li>
<?php }elseif($role == 'accountant'){ ?>
<li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#fee"> <img src="icons/challan.webp" class="card-img-top" style="width:10%;"> generate challan</a></li>
<li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#chlan-manager"> <img src="icons/challan-manager.webp" class="card-img-top" style="width:10%;"> challan manager</a></li>
<li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#clection"> <img src="icons/fee.webp" class="card-img-top" style="width:10%;"> collection</a></li>
<li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#accounts"> <img src="icons/account.webp" class="card-img-top" style="width:10%;"> accounts</a></li>
<li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#account-manager"> <img src="icons/account-manager.webp" class="card-img-top" style="width:10%;"> account manager</a></li>
<li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#stock"> <img src="icons/stock.webp" class="card-img-top" style="width:10%;"> stock</a></li>
<?php }elseif($role == 'receptionist'){ ?>
<li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#add-inquiry"><img src="icons/inquiry.webp" class="card-img-top" style="width:10%;"> Inquiry</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#inquiry-manager"><img src="icons/inquiry-manager.webp" class="card-img-top" style="width:10%;"> inquiry manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#add-students"><img src="icons/students.webp" class="card-img-top" style="width:10%;"> students</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"> <img src="icons/student-manager.webp" class="card-img-top" style="width:10%;"> students manager</a></li>
    <li><a class="dropdown-item text-capitalize" href="javascript:void()" onclick="location.href='add-staffs'"> <img src="icons/staff.webp" class="card-img-top" style="width:10%;"> staff</a></li>
    <li><a class="dropdown-item text-capitalize" href="#" data-bs-toggle="modal" data-bs-target="#staff-manager"> <img src="icons/staff-manager.webp" class="card-img-top" style="width:10%;"> staff manager</a></li>
<?php } ?>
  </ul>
</li>
        
      </ul>
<?php 
$sel_pckge = mysqli_query($con,"select * from institute_collection where instituteId='$userId' order by id desc");
$pkg = mysqli_fetch_array($sel_pckge);
$deactive_date = $pkg['deactive_date'];
?>
      <div class="d-flex">
          <ul class="navbar-nav">
<li class="nav-item me-3 mt-3">
  <a href="#" class="nav-link" title="Expiry Date" style="color:rgb(255, 148, 28)">
Exp.Date: <?php echo $deactive_date; ?>
  </a>
</li>
<li class="nav-item me-3 mt-3">
    <div id="MyClockDisplay" class="clock fs-6 text-decoration-none text-white" onload="showTime()"></div>
    <div class="text-decoration-none text-white" style="font-size:0.9rem;"><?php echo date("l,d,M-Y"); ?></div>
</li>
<script>
   function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();
</script>
<li class="nav-item dropdown me-3 mt-3">
  <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <?php echo "<span class='text-capitalize text-warning'>".$role." a/c</span>"; ?></a>
  <ul class="dropdown-menu">
<?php if($role == 'director'){
if($email == 'demoadmin@gmail.com'){ }else{
?>
<li><a class="dropdown-item" href="javascript:void()" onclick="location.href='create-profile'"><i class="fa-regular fa-circle-user"></i> Profile</a></li>
<?php } }else{ ?><li><a class="dropdown-item" href="javascript:void()" onclick="location.href='change-password'"><i class="fa-solid fa-unlock-keyhole"></i> Reset Password</a></li><?php } ?>
    <li><a class="dropdown-item" href="javascript:void()" onclick="location.href='account-information'"><i class="fa fa-user"></i> Account Information</a></li>
    <li><a class="dropdown-item" href="javascript:void()" onclick="location.href='biling'"><i class="fa-solid fa-store"></i> Marketplace</a></li>
    <li><a class="dropdown-item" href="javascript:void()" onclick="location.href='biling'"><i class="fa-solid fa-money-bills"></i> Biling</a></li>
    <li><a class="dropdown-item" href="https://wa.me/923357963004?text=Help Line No: 923357963004 - Timing: 11:00 AM to 05:00 PM" target="_blank"><i class="fa-solid fa-phone"></i> Contact Us</a></li>
    <li><a class="dropdown-item" href="javascript:void()" onclick="location.href='logout'"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
  </ul>
</li>
<li class="nav-item mt-3">
  <a href="javascript:void()" onclick="location.href='company-notifications'" class="nav-link" title="Notifications" style="color:rgb(255, 148, 28);">
      <i class="fa-regular fa-bell" style="font-size:1.5rem;"></i>
  </a>
</li>
          </ul>
        
      </div>
    </div>
  </div>
</nav>
<?php
$sel_alsts = mysqli_query($con,"select * from mainAlerts where id='1'");
$shws = mysqli_fetch_assoc($sel_alsts);
$content = $shws['content'];
    if(empty($content)){ }else{
?>
<div class="alert alert-danger alert-dismissible fade show fs-4" role="alert">
  <?php echo $content; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>