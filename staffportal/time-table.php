<?php require_once("source/head-section.php"); require_once("source/navbar.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> time table</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">

<?php
$sl_garly = mysqli_query($con,"select * from timeTable where instituteId='$instituteId' order by id desc limit 0,1");
$cont = mysqli_num_rows($sl_garly);
if($cont == 0){ echo "<div class='alert alert-danger text-capitalize'>there are no record found.</div>"; }
$result=mysqli_fetch_array($sl_garly);
$id = $result['id']; $periods1 = $result['periods1']; $periods2 = $result['periods2']; $periods3 = $result['periods3']; $periods4 = $result['periods4']; $periods5 = $result['periods5']; $periods6 = $result['periods6']; $periods7 = $result['periods7']; $periods8 = $result['periods8']; $periods9 = $result['periods9']; $monP1 = $result['monP1']; $monP2 = $result['monP2']; $monP3 = $result['monP3']; $monP4 = $result['monP4']; $monP5 = $result['monP5']; $monP6 = $result['monP6']; $monP7 = $result['monP7']; $monP8 = $result['monP8']; $monP9 = $result['monP9']; $tueP1 = $result['tueP1']; $tueP2 = $result['tueP2']; $tueP3 = $result['tueP3']; $tueP4 = $result['tueP4']; $tueP5 = $result['tueP5']; $tueP6 = $result['tueP6']; $tueP7 = $result['tueP7']; $tueP8 = $result['tueP8']; $tueP9 = $result['tueP9']; $wedP1 = $result['wedP1']; $wedP2 = $result['wedP2']; $wedP3 = $result['wedP3']; $wedP4 = $result['wedP4']; $wedP5 = $result['wedP5']; $wedP6 = $result['wedP6']; $wedP7 = $result['wedP7']; $wedP8 = $result['wedP8']; $wedP9 = $result['wedP9']; $wedP10 = $result['wedP10']; $thurP1 = $result['thurP1']; $thurP2 = $result['thurP2']; $thurP3 = $result['thurP3']; $thurP4 = $result['thurP4']; $thurP5 = $result['thurP5']; $thurP6 = $result['thurP6']; $thurP7 = $result['thurP7']; $thurP8 = $result['thurP8']; $thurP9 = $result['thurP9']; $friP1 = $result['friP1']; $friP2 = $result['friP2']; $friP3 = $result['friP3']; $friP4 = $result['friP4']; $friP5 = $result['friP5']; $friP6 = $result['friP6']; $friP7 = $result['friP7']; $friP8 = $result['friP8']; $friP9 = $result['friP9']; $satP1 = $result['satP1']; $satP2 = $result['satP2']; $satP3 = $result['satP3']; $satP4 = $result['satP4']; $satP5 = $result['satP5']; $satP6 = $result['satP6']; $satP7 = $result['satP7']; $satP8 = $result['satP8']; $satP9 = $result['satP9'];
    ?>
<table class="table table-responsive table-striped w-100 bg-white">
<tr align="center">
    <th rowspan="2" class="fs-4 fw-bold text-uppercase">Days</th>
    <th colspan="9" class="fs-4 fw-bold text-uppercase">Periods</th>
</tr>
<tr align="center">
    <th><?php echo $periods1; ?></th>
    <th><?php echo $periods2; ?></th>
    <th><?php echo $periods3; ?></th>
    <th><?php echo $periods4; ?></th>
    <th><?php echo $periods5; ?></th>
<?php if($periods6 === 'to'){ }else { ?>    
    <th><?php echo $periods6; ?></th>
<?php } ?>
<?php if($periods7 === 'to'){ }else { ?>
    <th><?php echo $periods7; ?></th>
<?php } ?>
<?php if($periods8 === 'to'){ }else { ?>
    <th><?php echo $periods8; ?></th>
<?php } ?>
<?php if($periods9 === 'to'){ }else { ?> 
    <th><?php echo $periods9; ?></th>
<?php } ?>
</tr>
<tr align="center">
    <th>Monday</th>
<?php if(empty($monP1)){ echo "<td></td>"; }else { ?>
    <td><?php echo $monP1; ?></td>
<?php } ?>
<?php if(empty($monP2)){ echo "<td></td>"; }else { ?>
    <td><?php echo $monP2; ?></td>
<?php } ?>
<?php if(empty($monP3)){ echo "<td></td>"; }else { ?>
    <td><?php echo $monP3; ?></td>
<?php } ?>
<?php if(empty($monP4)){ echo "<td></td>"; }else { ?>
    <td><?php echo $monP4; ?></td>
<?php } ?>
<?php if(empty($monP5)){ echo "<td></td>"; }else { ?>
    <td><?php echo $monP5; ?></td>
<?php } ?>
<?php if(empty($monP6)){ echo "<td></td>"; }else { ?>
    <td><?php echo $monP6; ?></td>
<?php } ?>
<?php if(empty($monP7)){ echo "<td></td>"; }else { ?>
    <td><?php echo $monP7; ?></td>
<?php } ?>
<?php if(empty($monP8)){ }else { ?>
    <td><?php echo $monP8; ?></td>
<?php } ?>   
<?php if(empty($monP9)){ }else { ?>
    <td><?php echo $monP9; ?></td>
<?php } ?>
</tr>
<tr align="center">
    <th>Tuesday</th>
<?php if(empty($tueP1)){ echo "<td></td>"; }else { ?>
    <td><?php echo $tueP1; ?></td>
<?php } ?>
<?php if(empty($tueP2)){ echo "<td></td>"; }else { ?>
    <td><?php echo $tueP2; ?></td>
<?php } ?>
<?php if(empty($tueP3)){ echo "<td></td>"; }else { ?>
    <td><?php echo $tueP3; ?></td>
<?php } ?>
<?php if(empty($tueP4)){ echo "<td></td>"; }else { ?>
    <td><?php echo $tueP4; ?></td>
<?php } ?>
<?php if(empty($tueP5)){ echo "<td></td>"; }else { ?>
    <td><?php echo $tueP5; ?></td>
<?php } ?>
<?php if(empty($tueP6)){ echo "<td></td>"; }else { ?>
    <td><?php echo $tueP6; ?></td>
<?php } ?>
<?php if(empty($tueP7)){ echo "<td></td>"; }else { ?>
    <td><?php echo $tueP7; ?></td>
<?php } ?>
<?php if(empty($tueP8)){ echo "<td></td>"; }else { ?>
    <td><?php echo $tueP8; ?></td>
<?php } ?>
<?php if(empty($tueP9)){ }else { ?>
    <td><?php echo $tueP9; ?></td>
<?php } ?>
</tr>
<tr align="center">
    <th>Wednesday</th>
<?php if(empty($wedP1)){ echo "<td></td>"; }else { ?>
    <td><?php echo $wedP1; ?></td>
<?php } ?>
<?php if(empty($wedP2)){ echo "<td></td>"; }else { ?>
    <td><?php echo $wedP2; ?></td>
<?php } ?>
<?php if(empty($wedP3)){ echo "<td></td>"; }else { ?>
    <td><?php echo $wedP3; ?></td>
<?php } ?>
<?php if(empty($wedP4)){ echo "<td></td>"; }else { ?>
    <td><?php echo $wedP4; ?></td>
<?php } ?>
<?php if(empty($wedP5)){ echo "<td></td>"; }else { ?>
    <td><?php echo $wedP5; ?></td>
<?php } ?>
<?php if(empty($wedP6)){ echo "<td></td>"; }else { ?>
    <td><?php echo $wedP6; ?></td>
<?php } ?>
<?php if(empty($wedP7)){ echo "<td></td>"; }else { ?>
    <td><?php echo $wedP7; ?></td>
<?php } ?>
<?php if(empty($wedP8)){ }else { ?>
    <td><?php echo $wedP8; ?></td>
<?php } ?>
<?php if(empty($wedP9)){ }else { ?>
    <td><?php echo $wedP9; ?></td>
<?php } ?>
</tr>
<tr align="center">
    <th>Thursday</th>
<?php if(empty($thurP1)){ echo "<td></td>"; }else { ?>
    <td><?php echo $thurP1; ?></td>
<?php } ?>
<?php if(empty($thurP2)){ echo "<td></td>"; }else { ?>
    <td><?php echo $thurP2; ?></td>
<?php } ?>
<?php if(empty($thurP3)){ echo "<td></td>"; }else { ?>
    <td><?php echo $thurP3; ?></td>
<?php } ?>
<?php if(empty($thurP4)){ echo "<td></td>"; }else { ?>
    <td><?php echo $thurP4; ?></td>
<?php } ?>
<?php if(empty($thurP5)){ echo "<td></td>"; }else { ?>
    <td><?php echo $thurP5; ?></td>
<?php } ?>
<?php if(empty($thurP6)){ echo "<td></td>"; }else { ?>
    <td><?php echo $thurP6; ?></td>
<?php } ?>
<?php if(empty($thurP7)){ echo "<td></td>"; }else { ?>
    <td><?php echo $thurP7; ?></td>
<?php } ?>
<?php if(empty($thurP8)){ }else { ?>
    <td><?php echo $thurP8; ?></td>
<?php } ?>
<?php if(empty($thurP9)){ }else { ?>
    <td><?php echo $thurP9; ?></td>
<?php } ?>
</tr>
<tr align="center">
    <th>Friday</th>
<?php if(empty($friP1)){ echo "<td></td>"; }else { ?>
    <td><?php echo $friP1; ?></td>
<?php } ?>
<?php if(empty($friP2)){ echo "<td></td>"; }else { ?>
    <td><?php echo $friP2; ?></td>
<?php } ?>
<?php if(empty($friP3)){ echo "<td></td>"; }else { ?>
    <td><?php echo $friP3; ?></td>
<?php } ?>
<?php if(empty($friP4)){ echo "<td></td>"; }else { ?>
    <td><?php echo $friP4; ?></td>
<?php } ?>
<?php if(empty($friP5)){ echo "<td></td>"; }else { ?>
    <td><?php echo $friP5; ?></td>
<?php } ?>
<?php if(empty($friP6)){ echo "<td></td>"; }else { ?>
    <td><?php echo $friP6; ?></td>
<?php } ?>
<?php if(empty($friP7)){ echo "<td></td>"; }else { ?>
    <td><?php echo $friP7; ?></td>
<?php } ?>
<?php if(empty($friP8)){ }else { ?>
    <td><?php echo $friP8; ?></td>
<?php } ?>
<?php if(empty($friP9)){ }else { ?>
    <td><?php echo $friP9; ?></td>
<?php } ?>
</tr>
<tr align="center">
    <th>Saturday</th>
<?php if(empty($satP1)){ echo "<td></td>"; }else { ?>
    <td><?php echo $satP1; ?></td>
<?php } ?>
<?php if(empty($satP2)){ echo "<td></td>"; }else { ?>
    <td><?php echo $satP2; ?></td>
<?php } ?>
<?php if(empty($satP3)){ echo "<td></td>"; }else { ?>
    <td><?php echo $satP3; ?></td>
<?php } ?>
<?php if(empty($satP4)){ echo "<td></td>"; }else { ?>
    <td><?php echo $satP4; ?></td>
<?php } ?>
<?php if(empty($satP5)){ echo "<td></td>"; }else { ?>
    <td><?php echo $satP5; ?></td>
<?php } ?>
<?php if(empty($satP6)){ echo "<td></td>"; }else { ?>
    <td><?php echo $satP6; ?></td>
<?php } ?>
<?php if(empty($satP7)){ echo "<td></td>"; }else { ?>
    <td><?php echo $satP7; ?></td>
<?php } ?>
<?php if(empty($satP8)){ }else { ?>
    <td><?php echo $satP8; ?></td>
<?php } ?>
<?php if(empty($satP9)){ }else { ?>
    <td><?php echo $satP9; ?></td>
<?php } ?>
</tr>
</table>
        </div>
    </div>
</div>

<?php require_once("source/foot-section.php"); ?>