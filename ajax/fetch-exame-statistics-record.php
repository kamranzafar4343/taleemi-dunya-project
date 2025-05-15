<?php
require_once("../functions/db.php");

$aply_sesion = $_POST['aply_sesion'];
$aply_trms = $_POST['aply_trms'];
$inst_id = $_POST['inst_id'];

$schols = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_id'");
$sel_schol = mysqli_fetch_assoc($schols);
$institute_name = $sel_schol['institute_name'];
$campus = $sel_schol['campus'];
$logo = $sel_schol['logo'];

$sel_exme = mysqli_query($con,"select * from results where session='$aply_sesion' && terms='$aply_trms' && instituteId='$inst_id'");
$cnt = mysqli_num_rows($sel_exme);

$sel_exmep = mysqli_query($con,"select * from results where session='$aply_sesion' && terms='$aply_trms' && instituteId='$inst_id' && attendance='P'");
$cntp = mysqli_num_rows($sel_exmep);

$sel_exmea = mysqli_query($con,"select * from results where session='$aply_sesion' && terms='$aply_trms' && instituteId='$inst_id' && attendance='A'");
$cnta = mysqli_num_rows($sel_exmea);
?>
<div class="container-fluid">
    <div class="row">
<div class="col">
    <div class="card mb-3 py-4" style="background:hsl(28,100%,40%);">
<h4 class="text-center text-capitalize fs-4 fw-bold">total students</h4>
<h1 class="text-center fs-1 fw-bold"><?php echo $cnt; ?></h1>
    </div>
</div>
<div class="col">
    <div class="card mb-3 py-4" style="background:hsl(28,100%,45%);">
<h4 class="text-center text-capitalize fs-4 fw-bold">total Presents</h4>
<h1 class="text-center fs-1 fw-bold"><?php echo $cntp; ?></h1>
    </div>
</div>
<div class="col">
    <div class="card mb-3 py-4" style="background:hsl(28,100%,50%);">
<h4 class="text-center text-capitalize fs-4 fw-bold">total Absents</h4>
<h1 class="text-center fs-1 fw-bold"><?php echo $cnta; ?></h1>
    </div>
</div>
    </div>
</div>