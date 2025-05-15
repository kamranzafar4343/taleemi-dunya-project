<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#acad-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='time-table-manager'"> Time Table Manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> time table manager</li>
  </ol>
</nav>

<div class="container-fluid mt-4">
    <div class="row datas">
<?php
if(isset($_GET['id'])){
    $idse = $_GET['id'];
    $sl_time = mysqli_query($con,"select * from timeTable where instituteId='$userId' && id='$idse'");
    $result = mysqli_fetch_assoc($sl_time);
    
    $id = $result['id'];
    $instituteId = $result['instituteId'];
    $periods1 = $result['periods1'];
    $periods2 = $result['periods2'];
    $periods3 = $result['periods3'];
    $periods4 = $result['periods4'];
    $periods5 = $result['periods5'];
    $periods6 = $result['periods6'];
    $periods7 = $result['periods7'];
    $periods8 = $result['periods8'];
    $periods9 = $result['periods9'];
    $monP1 = $result['monP1'];
    $monP2 = $result['monP2'];
    $monP3 = $result['monP3'];
    $monP4 = $result['monP4'];
    $monP5 = $result['monP5'];
    $monP6 = $result['monP6'];
    $monP7 = $result['monP7'];
    $monP8 = $result['monP8'];
    $monP9 = $result['monP9'];
    $tueP1 = $result['tueP1'];
    $tueP2 = $result['tueP2'];
    $tueP3 = $result['tueP3'];
    $tueP4 = $result['tueP4'];
    $tueP5 = $result['tueP5'];
    $tueP6 = $result['tueP6'];
    $tueP7 = $result['tueP7'];
    $tueP8 = $result['tueP8'];
    $tueP9 = $result['tueP9'];
    $wedP1 = $result['wedP1'];
    $wedP2 = $result['wedP2'];
    $wedP3 = $result['wedP3'];
    $wedP4 = $result['wedP4'];
    $wedP5 = $result['wedP5'];
    $wedP6 = $result['wedP6'];
    $wedP7 = $result['wedP7'];
    $wedP8 = $result['wedP8'];
    $wedP9 = $result['wedP9'];
    $thurP1 = $result['thurP1'];
    $thurP2 = $result['thurP2'];
    $thurP3 = $result['thurP3'];
    $thurP4 = $result['thurP4'];
    $thurP5 = $result['thurP5'];
    $thurP6 = $result['thurP6'];
    $thurP7 = $result['thurP7'];
    $thurP8 = $result['thurP8'];
    $thurP9 = $result['thurP9'];
    $friP1 = $result['friP1'];
    $friP2 = $result['friP2'];
    $friP3 = $result['friP3'];
    $friP4 = $result['friP4'];
    $friP5 = $result['friP5'];
    $friP6 = $result['friP6'];
    $friP7 = $result['friP7'];
    $friP8 = $result['friP8'];
    $friP9 = $result['friP9'];
    $satP1 = $result['satP1'];
    $satP2 = $result['satP2'];
    $satP3 = $result['satP3'];
    $satP4 = $result['satP4'];
    $satP5 = $result['satP5'];
    $satP6 = $result['satP6'];
    $satP7 = $result['satP7'];
    $satP8 = $result['satP8'];
    $satP9 = $result['satP9'];
}
?>
<div class="col" id="data">
    <table class="table table-reponsive table-striped w-100 bg-white" style="border:none;border-bottom:none;">
    <tr align="center">
        <th rowspan="2" class="fs-6 fw-bold text-center">Days</th>
        <th colspan="9" class="fs-6 fw-bold text-center">Periods</th>
    </tr>
    <tr>
        <td><?php echo $periods1; ?></td>
        <td><?php echo $periods2; ?></td>
        <td><?php echo $periods3; ?></td>
        <td><?php echo $periods4; ?></td>
        <td><?php echo $periods5; ?></td>
        <td><?php echo $periods6; ?></td>
        <td><?php echo $periods7; ?></td>
        <td><?php echo $periods8; ?></td>
<?php if($periods9 == "to"){ }else{ ?>
        <td><?php echo $periods9; ?></td>
<?php } ?>
    </tr>
    <tr>
        <th class="text-capitalize fw-bold">monday</th>
        <td><?php echo $monP1; ?></td>
        <td><?php echo $monP2; ?></td>
        <td><?php echo $monP3; ?></td>
        <td><?php echo $monP4; ?></td>
        <td><?php echo $monP5; ?></td>
        <td><?php echo $monP6; ?></td>
        <td><?php echo $monP7; ?></td>
        <td><?php echo $monP8; ?></td>
<?php if($periods9 == "to"){ }else{ ?>
        <td><?php echo $monP9; ?></td>
<?php } ?>
    </tr>
    <tr>
        <th class="text-capitalize fw-bold">tuesday</th>
        <td><?php echo $tueP1; ?></td>
        <td><?php echo $tueP2; ?></td>
        <td><?php echo $tueP3; ?></td>
        <td><?php echo $tueP4; ?></td>
        <td><?php echo $tueP5; ?></td>
        <td><?php echo $tueP6; ?></td>
        <td><?php echo $tueP7; ?></td>
        <td><?php echo $tueP8; ?></td>
<?php if($periods9 == "to"){ }else{ ?>
        <td><?php echo $tueP9; ?></td>
<?php } ?>
    </tr>
    <tr>
        <th class="text-capitalize fw-bold">wednesday</th>
        <td><?php echo $wedP1; ?></td>
        <td><?php echo $wedP2; ?></td>
        <td><?php echo $wedP3; ?></td>
        <td><?php echo $wedP4; ?></td>
        <td><?php echo $wedP5; ?></td>
        <td><?php echo $wedP6; ?></td>
        <td><?php echo $wedP7; ?></td>
        <td><?php echo $wedP8; ?></td>
<?php if($periods9 == "to"){ }else{ ?>
        <td><?php echo $wedP9; ?></td>
<?php } ?>
    </tr>
    <tr>
        <th class="text-capitalize fw-bold">thursday</th>
        <td><?php echo $thurP1; ?></td>
        <td><?php echo $thurP2; ?></td>
        <td><?php echo $thurP3; ?></td>
        <td><?php echo $thurP4; ?></td>
        <td><?php echo $thurP5; ?></td>
        <td><?php echo $thurP6; ?></td>
        <td><?php echo $thurP7; ?></td>
        <td><?php echo $thurP8; ?></td>
<?php if($periods9 == "to"){ }else{ ?>
        <td><?php echo $thurP9; ?></td>
<?php } ?>
    </tr>
    <tr>
        <th class="text-capitalize fw-bold">friday</th>
        <td><?php echo $friP1; ?></td>
        <td><?php echo $friP2; ?></td>
        <td><?php echo $friP3; ?></td>
        <td><?php echo $friP4; ?></td>
        <td><?php echo $friP5; ?></td>
        <td><?php echo $friP6; ?></td>
        <td><?php echo $friP7; ?></td>
        <td><?php echo $friP8; ?></td>
<?php if($periods9 == "to"){ }else{ ?>
        <td><?php echo $friP9; ?></td>
<?php } ?>
    </tr>
    <tr>
        <th class="text-capitalize fw-bold">saturday</th>
        <td><?php echo $satP1; ?></td>
        <td><?php echo $satP2; ?></td>
        <td><?php echo $satP3; ?></td>
        <td><?php echo $satP4; ?></td>
        <td><?php echo $satP5; ?></td>
        <td><?php echo $satP6; ?></td>
        <td><?php echo $satP7; ?></td>
        <td><?php echo $satP8; ?></td>
<?php if($periods9 == "to"){ }else{ ?>
        <td><?php echo $satP9; ?></td>
<?php } ?>
        <input type="hidden" value="<?php echo $userId; ?>" name="instis">
    </tr>
</table>
</div>
    </div>
    <div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
    </div>
</div>
</div>


<script type="text/javascript">
$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>



<?php require_once("source/foot-section.php"); ?>