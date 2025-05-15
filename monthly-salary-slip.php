<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#staff-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='salary-sheet'"> salary sheet</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Monthly Slip</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<br>
<?php
if(isset($_GET['id'])){
    $ids = $_GET['id'];
    $mnth = $_GET['mnth'];
    $monthName = date('F', mktime(0, 0, 0, $mnth, 10));
    $sesin = $_GET['sesin'];
    $sl_pr = mysqli_query($con,"select * from staffAttendance where instituteId='$userId' && staff_id='$ids'");
    $result = mysqli_fetch_assoc($sl_pr);
    
    
    $status = $result['status'];
    $date = $result['date'];
    $month = $result['month'];
    $att_time = $result['att_time'];
    $instituteId = $result['instituteId'];
}

$sl_slr = mysqli_query($con,"select * from addStaff where instituteId='$userId' && staffId='$ids'");
$salry = mysqli_fetch_assoc($sl_slr);
$staffimage = $salry['staffimage'];
$staffId = $salry['staffId'];
$appliedPost = $salry['appliedPost'];
$staffType = $salry['staffType'];
$staffName = $salry['staffName'];
$fatherName = $salry['fatherName'];
$salary = $salry['salary'];
$perday = $salary / 30;
?>
<div class="container-fluid mt-4">
    <div class="row" id="bodies">
        <div class="col datas">
<table class="table table-responsive w-100 bg-white">
        <tr align="center">
<th width="100"><img src="portal-admins/institute-logos/<?php if(!empty($image)){ echo $image; }else{ echo "TALEEMI PORTAL LOGO.png"; } ?>" class="img-fluid"></th>
<td>
    <h1 class="text-uppercase fs-1 fw-bold p-0"><?php echo $instituteName; ?></h1>
    <div class="text-capitalize"><b>Address:</b> <?php echo $mainaddress; ?> <b>Cell:</b> <?php echo $cell; ?></div>
</td>
<th width="100"><img src="staff_imgs/<?php if(!empty($staffimage)){ echo $staffimage; }else{ echo "users.jpg"; } ?>" class="card-img-top" style="width:100%;"></th>
        </tr>
    </table>
<table class="table table-responsive w-100 bg-white">
        <tr>
            <th class="text-capitalize">ID#</th>
            <td class="text-capitalize"><?php echo $staffId; ?></td>
            <th class="text-capitalize">Type</th>
            <td class="text-capitalize"><?php echo $staffType; ?></td>
        </tr>
        <tr>
            <th class="text-capitalize">Month</th>
            <td class="text-capitalize"><?php echo $monthName."-".$sesin; ?></td>
            <th class="text-capitalize">Post</th>
            <td class="text-capitalize"><?php echo $appliedPost; ?></td>
        </tr>
        <tr>
            <th class="text-capitalize">Employee Name</th>
            <td class="text-capitalize"><?php echo $staffName; ?></td>
            <th class="text-capitalize">Father Name</th>
            <td class="text-capitalize"><?php echo $fatherName; ?></td>
        </tr>   
<?php
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='P' && instituteId='$userId' && month='$mnth' && session='$sesin'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='A' && instituteId='$userId' && month='$mnth' && session='$sesin'");
$countA = mysqli_num_rows($sl_statss);
?>
        <tr>
            <th class="text-capitalize">Total Presents</th>
            <td class="text-capitalize"><?php if(empty($countP)){ echo "0"; }else{ echo $countP; } ?></td>
            <th class="text-capitalize">Total Absents</th>
            <td class="text-capitalize"><?php if(empty($countA)){ echo "0"; }else{ echo $countA; } ?></td>
        </tr>
<?php
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='L' && instituteId='$userId' && month='$mnth' && session='$sesin'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='H' && instituteId='$userId' && month='$mnth' && session='$sesin'");
$countH = mysqli_num_rows($sl_statsq);
?>
        <tr>
            <th class="text-capitalize">Total Leaves</th>
            <td class="text-capitalize"><?php if(empty($countL)){ echo "0"; }else{ echo $countL; } ?></td>
            <th class="text-capitalize">Total Half Leaves</th>
            <td class="text-capitalize"><?php if(empty($countH)){ echo "0"; }else{ echo $countH; } ?></td>
        </tr>
        <tr>
            <th class="text-capitalize">Basic Salary</th>
            <td class="text-capitalize"><?php echo $salary; ?></td>
            <th class="text-capitlaize">Deduction</th>
            <th class="text-capitlaize"><?php echo round($perday * $countA); ?></th>
        </tr>
        <tr algin="center">
            <th class="text-capitlaize fs-2 text-center text-danger fw-bold" colspan="2">Net Salary</th>
            <th class="text-capitlaize fs-2 fw-bold text-center text-success" colspan="2"><?php echo "Rs/-".round($perday * $countP); ?></th>
        </tr>
    </table>
    <br><br>
<table class="table table-responsive w-100 bg-white">
        <tr align="center">
<th width="100"><img src="portal-admins/institute-logos/<?php if(!empty($image)){ echo $image; }else{ echo "TALEEMI PORTAL LOGO.png"; } ?>" class="img-fluid"></th>
<td>
    <h1 class="text-uppercase fs-1 fw-bold p-0"><?php echo $instituteName; ?></h1>
    <div class="text-capitalize"><b>Address:</b> <?php echo $mainaddress; ?> <b>Cell:</b> <?php echo $cell; ?></div>
</td>
<th width="100"><img src="staff_imgs/<?php if(!empty($staffimage)){ echo $staffimage; }else{ echo "users.jpg"; } ?>" class="card-img-top" style="width:100%;"></th>
        </tr>
    </table>
    <table class="table table-responsive w-100 bg-white">
        <tr>
            <th class="text-capitalize">ID#</th>
            <td class="text-capitalize"><?php echo $staffId; ?></td>
            <th class="text-capitalize">Type</th>
            <td class="text-capitalize"><?php echo $staffType; ?></td>
        </tr>
        <tr>
            <th class="text-capitalize">Month</th>
            <td class="text-capitalize"><?php echo $monthName."-".$sesin; ?></td>
            <th class="text-capitalize">Post</th>
            <td class="text-capitalize"><?php echo $appliedPost; ?></td>
        </tr>
        <tr>
            <th class="text-capitalize">Employee Name</th>
            <td class="text-capitalize"><?php echo $staffName; ?></td>
            <th class="text-capitalize">Father Name</th>
            <td class="text-capitalize"><?php echo $fatherName; ?></td>
        </tr>   
<?php
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='P' && instituteId='$userId' && month='$mnth' && session='$sesin'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='A' && instituteId='$userId' && month='$mnth' && session='$sesin'");
$countA = mysqli_num_rows($sl_statss);
?>
        <tr>
            <th class="text-capitalize">Total Presents</th>
            <td class="text-capitalize"><?php if(empty($countP)){ echo "0"; }else{ echo $countP; } ?></td>
            <th class="text-capitalize">Total Absents</th>
            <td class="text-capitalize"><?php if(empty($countA)){ echo "0"; }else{ echo $countA; } ?></td>
        </tr>
<?php
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='L' && instituteId='$userId' && month='$mnth' && session='$sesin'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='H' && instituteId='$userId' && month='$mnth' && session='$sesin'");
$countH = mysqli_num_rows($sl_statsq);
?>
        <tr>
            <th class="text-capitalize">Total Leaves</th>
            <td class="text-capitalize"><?php if(empty($countL)){ echo "0"; }else{ echo $countL; } ?></td>
            <th class="text-capitalize">Total Half Leaves</th>
            <td class="text-capitalize"><?php if(empty($countH)){ echo "0"; }else{ echo $countH; } ?></td>
        </tr>
        <tr>
            <th class="text-capitalize">Basic Salary</th>
            <td class="text-capitalize"><?php echo $salary; ?></td>
            <th class="text-capitlaize">Deduction</th>
            <th class="text-capitlaize"><?php echo round($perday * $countA); ?></th>
        </tr>
        <tr algin="center">
            <th class="text-capitlaize fs-2 text-center text-danger fw-bold" colspan="2">Net Salary</th>
            <th class="text-capitlaize fs-2 fw-bold text-center text-success" colspan="2"><?php echo "Rs/-".round($perday * $countP); ?></th>
        </tr>
    </table>
        </div>
    </div>
<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-apna' id="btn_print"><i class="fa fa-print"></i> Print</button>
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