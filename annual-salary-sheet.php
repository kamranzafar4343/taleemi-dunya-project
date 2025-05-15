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
    $staff_name = $salry['staffName'];
    $father_name = $salry['fatherName'];
    $staffimages = $salry['staffimage'];
    $post = $salry['appliedPost'];
    $staffType = $salry['staffType'];
    $session = $salry['session'];
    $staff_id = $salry['staffId'];
    $joiningDate = $salry['joiningDate'];
    $salary = $salry['salary'];
    $perday = $salary / 30;
?>
<div class="container-fluid mt-4">
    <div class="row" id="bodies">
        <div class="col datas">
<table class="table table-responsive w-100 bg-white">
        <tr align="center">
<th><img src="portal-admins/institute-logos/<?php if(!empty($image)){ echo $image; }else{ echo "TALEEMI PORTAL LOGO.png"; } ?>" class="img-fluid" style="width:100px;"></th>
<td>
    <h1 class="text-uppercase fs-1 fw-bold p-0"><?php echo $instituteName; ?></h1>
    <div class="text-capitalize"><b>Address:</b> <?php echo $mainaddress; ?> <b>Cell:</b> <?php echo $cell; ?></div>
</td>
<th><img src="staff_imgs/<?php if(!empty($staffimages)){ echo $staffimages; }else{ echo "users.jpg"; } ?>" class="card-img-top" style="width:40px;"></th>
        </tr>
        <tr>
            <th>Staff Name: <?php echo "<span class='text-decoration-underline'>".$staff_name."</span>"; ?></th>
            <th>Post: <?php echo "<span class='text-decoration-underline'>".$post."</span>"; ?></th>
            <th>Joining Date: <?php echo "<span class='text-decoration-underline'>".$joiningDate."</span>"; ?></th>
        </tr>
    </table>
    <table class="table table-responsive table-striped w-100 bg-white">
        <tr><th class="text-center text-uppercase fs-3 fw-bold" colspan="10">salary slip <span class="text-capitalize fs-6">session-<?php echo date("Y"); ?></span></th></tr>
        <tr>
            <th>Sr#</th>
            <th>Months</th>
            <th>Basic</th>
            <th>Presents</th>
            <th>Absents</th>
            <th>Leaves</th>
            <th>Half Leaves</th>
            <th>Deduction</th>
            <th>Net Salary</th>
            <th>Teacher Signature</th>
        </tr>
        <tr>
            <th>1</th>
            <th>Aug</th>
            <td><?php echo $salary; ?></td>
<?php
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='P' && instituteId='$userId' && month='08' && session='$sesin'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='A' && instituteId='$userId' && month='08' && session='$sesin'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='L' && instituteId='$userId' && month='08' && session='$sesin'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='H' && instituteId='$userId' && month='08'");
$countH = mysqli_num_rows($sl_statsq);
?>
            <td><?php if(empty($countP)){ echo "0"; }else{ echo $countP; }  ?></td>
            <td><?php if(empty($countA)){ echo "0"; }else{ echo $countA; }  ?></td>
            <td><?php if(empty($countL)){ echo "0"; }else{ echo $countL; }  ?></td>
            <td><?php if(empty($countH)){ echo "0"; }else{ echo $countH; }  ?></td>
            <td><?php echo round($perday * $countA); ?></td>
            <td><?php echo round($perday * $countP); ?></td>
            <td></td>
        </tr>
        <tr>
            <th>2</th>
            <th>Sep</th>
            <td><?php echo $salary; ?></td>
<?php
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='P' && instituteId='$userId' && month='09' && session='$sesin'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='A' && instituteId='$userId' && month='09' && session='$sesin'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='L' && instituteId='$userId' && month='09' && session='$sesin'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='H' && instituteId='$userId' && month='09' && session='$sesin'");
$countH = mysqli_num_rows($sl_statsq);
?>
            <td><?php if(empty($countP)){ echo "0"; }else{ echo $countP; }  ?></td>
            <td><?php if(empty($countA)){ echo "0"; }else{ echo $countA; }  ?></td>
            <td><?php if(empty($countL)){ echo "0"; }else{ echo $countL; }  ?></td>
            <td><?php if(empty($countH)){ echo "0"; }else{ echo $countH; }  ?></td>
            <td><?php echo round($perday * $countA); ?></td>
            <td><?php echo round($perday * $countP); ?></td>
            <td></td>
        </tr>
        <tr>
            <th>3</th>
            <th>Oct</th>
            <td><?php echo $salary; ?></td>
<?php
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='P' && instituteId='$userId' && month='10' && session='$sesin'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='A' && instituteId='$userId' && month='10' && session='$sesin'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='L' && instituteId='$userId' && month='10' && session='$sesin'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='H' && instituteId='$userId' && month='10' && session='$sesin'");
$countH = mysqli_num_rows($sl_statsq);
?>
            <td><?php if(empty($countP)){ echo "0"; }else{ echo $countP; }  ?></td>
            <td><?php if(empty($countA)){ echo "0"; }else{ echo $countA; }  ?></td>
            <td><?php if(empty($countL)){ echo "0"; }else{ echo $countL; }  ?></td>
            <td><?php if(empty($countH)){ echo "0"; }else{ echo $countH; }  ?></td>
            <td><?php echo round($perday * $countA); ?></td>
            <td><?php echo round($perday * $countP); ?></td>
            <td></td>
        </tr>
        <tr>
            <th>4</th>
            <th>Nov</th>
            <td><?php echo $salary; ?></td>
<?php
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='P' && instituteId='$userId' && month='11' && session='$sesin'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='A' && instituteId='$userId' && month='11' && session='$sesin'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='L' && instituteId='$userId' && month='11' && session='$sesin'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='H' && instituteId='$userId' && month='11' && session='$sesin'");
$countH = mysqli_num_rows($sl_statsq);
?>
           <td><?php if(empty($countP)){ echo "0"; }else{ echo $countP; }  ?></td>
            <td><?php if(empty($countA)){ echo "0"; }else{ echo $countA; }  ?></td>
            <td><?php if(empty($countL)){ echo "0"; }else{ echo $countL; }  ?></td>
            <td><?php if(empty($countH)){ echo "0"; }else{ echo $countH; }  ?></td>
            <td><?php echo round($perday * $countA); ?></td>
            <td><?php echo round($perday * $countP); ?></td>
            <td></td>
        </tr>
        <tr>
            <th>5</th>
            <th>Dec</th>
            <td><?php echo $salary; ?></td>
<?php
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='P' && instituteId='$userId' && month='12' && session='$sesin'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='A' && instituteId='$userId' && month='12' && session='$sesin'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='L' && instituteId='$userId' && month='12' && session='$sesin'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='H' && instituteId='$userId' && month='12' && session='$sesin'");
$countH = mysqli_num_rows($sl_statsq);
?>
            <td><?php if(empty($countP)){ echo "0"; }else{ echo $countP; }  ?></td>
            <td><?php if(empty($countA)){ echo "0"; }else{ echo $countA; }  ?></td>
            <td><?php if(empty($countL)){ echo "0"; }else{ echo $countL; }  ?></td>
            <td><?php if(empty($countH)){ echo "0"; }else{ echo $countH; }  ?></td>
            <td><?php echo round($perday * $countA); ?></td>
            <td><?php echo round($perday * $countP); ?></td>
            <td></td>
        </tr>
        <tr>
            <th>6</th>
            <th>Jan</th>
            <td><?php echo $salary; ?></td>
<?php
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='P' && instituteId='$userId' && month='01' && session='$sesin'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='A' && instituteId='$userId' && month='01' && session='$sesin'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='L' && instituteId='$userId' && month='01' && session='$sesin'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='H' && instituteId='$userId' && month='01' && session='$sesin'");
$countH = mysqli_num_rows($sl_statsq);
?>
            <td><?php if(empty($countP)){ echo "0"; }else{ echo $countP; }  ?></td>
            <td><?php if(empty($countA)){ echo "0"; }else{ echo $countA; }  ?></td>
            <td><?php if(empty($countL)){ echo "0"; }else{ echo $countL; }  ?></td>
            <td><?php if(empty($countH)){ echo "0"; }else{ echo $countH; }  ?></td>
            <td><?php echo round($perday * $countA); ?></td>
            <td><?php echo round($perday * $countP); ?></td>
            <td></td>
        </tr>
        <tr>
            <th>7</th>
            <th>Feb</th>
            <td><?php echo $salary; ?></td>
<?php
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='P' && instituteId='$userId' && month='02' && session='$sesin'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='A' && instituteId='$userId' && month='02' && session='$sesin'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='L' && instituteId='$userId' && month='02' && session='$sesin'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='H' && instituteId='$userId' && month='02' && session='$sesin'");
$countH = mysqli_num_rows($sl_statsq);
?>
            <td><?php if(empty($countP)){ echo "0"; }else{ echo $countP; }  ?></td>
            <td><?php if(empty($countA)){ echo "0"; }else{ echo $countA; }  ?></td>
            <td><?php if(empty($countL)){ echo "0"; }else{ echo $countL; }  ?></td>
            <td><?php if(empty($countH)){ echo "0"; }else{ echo $countH; }  ?></td>
            <td><?php echo round($perday * $countA); ?></td>
            <td><?php echo round($perday * $countP); ?></td>
            <td></td>
        </tr>
        <tr>
            <th>8</th>
            <th>March</th>
            <td><?php echo $salary; ?></td>
<?php
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='P' && instituteId='$userId' && month='03' && session='$sesin'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='A' && instituteId='$userId' && month='03' && session='$sesin'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='L' && instituteId='$userId' && month='03' && session='$sesin'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='H' && instituteId='$userId' && month='03' && session='$sesin'");
$countH = mysqli_num_rows($sl_statsq);
?>
            <td><?php if(empty($countP)){ echo "0"; }else{ echo $countP; }  ?></td>
            <td><?php if(empty($countA)){ echo "0"; }else{ echo $countA; }  ?></td>
            <td><?php if(empty($countL)){ echo "0"; }else{ echo $countL; }  ?></td>
            <td><?php if(empty($countH)){ echo "0"; }else{ echo $countH; }  ?></td>
            <td><?php echo round($perday * $countA); ?></td>
            <td><?php echo round($perday * $countP); ?></td>
            <td></td>
        </tr>
        <tr>
            <th>9</th>
            <th>April</th>
            <td><?php echo $salary; ?></td>
<?php
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='P' && instituteId='$userId' && month='04' && session='$sesin'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='A' && instituteId='$userId' && month='04' && session='$sesin'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='L' && instituteId='$userId' && month='04' && session='$sesin'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='H' && instituteId='$userId' && month='04' && session='$sesin'");
$countH = mysqli_num_rows($sl_statsq);
?>
            <td><?php if(empty($countP)){ echo "0"; }else{ echo $countP; }  ?></td>
            <td><?php if(empty($countA)){ echo "0"; }else{ echo $countA; }  ?></td>
            <td><?php if(empty($countL)){ echo "0"; }else{ echo $countL; }  ?></td>
            <td><?php if(empty($countH)){ echo "0"; }else{ echo $countH; }  ?></td>
            <td><?php echo round($perday * $countA); ?></td>
            <td><?php echo round($perday * $countP); ?></td>
            <td></td>
        </tr>
        <tr>
            <th>10</th>
            <th>May</th>
            <td><?php echo $salary; ?></td>
<?php
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='P' && instituteId='$userId' && month='05' && session='$sesin'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='A' && instituteId='$userId' && month='05' && session='$sesin'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='L' && instituteId='$userId' && month='05' && session='$sesin'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='H' && instituteId='$userId' && month='05' && session='$sesin'");
$countH = mysqli_num_rows($sl_statsq);
?>
            <td><?php if(empty($countP)){ echo "0"; }else{ echo $countP; }  ?></td>
            <td><?php if(empty($countA)){ echo "0"; }else{ echo $countA; }  ?></td>
            <td><?php if(empty($countL)){ echo "0"; }else{ echo $countL; }  ?></td>
            <td><?php if(empty($countH)){ echo "0"; }else{ echo $countH; }  ?></td>
            <td><?php echo round($perday * $countA); ?></td>
            <td><?php echo round($perday * $countP); ?></td>
            <td></td>
        </tr>
        <tr>
            <th>11</th>
            <th>June</th>
            <td><?php echo $salary; ?></td>
<?php
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='P' && instituteId='$userId' && month='06' && session='$sesin'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='A' && instituteId='$userId' && month='06' && session='$sesin'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='L' && instituteId='$userId' && month='06' && session='$sesin'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='H' && instituteId='$userId' && month='06' && session='$sesin'");
$countH = mysqli_num_rows($sl_statsq);
?>
            <td><?php if(empty($countP)){ echo "0"; }else{ echo $countP; }  ?></td>
            <td><?php if(empty($countA)){ echo "0"; }else{ echo $countA; }  ?></td>
            <td><?php if(empty($countL)){ echo "0"; }else{ echo $countL; }  ?></td>
            <td><?php if(empty($countH)){ echo "0"; }else{ echo $countH; }  ?></td>
            <td><?php echo round($perday * $countA); ?></td>
            <td><?php echo round($perday * $countP); ?></td>
            <td></td>
        </tr>
        <tr>
            <th>12</th>
            <th>July</th>
            <td><?php echo $salary; ?></td>
<?php
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='P' && instituteId='$userId' && month='07' && session='$sesin'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='A' && instituteId='$userId' && month='07' && session='$sesin'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='L' && instituteId='$userId' && month='07' && session='$sesin'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staff_id' && status='H' && instituteId='$userId' && month='07' && session='$sesin'");
$countH = mysqli_num_rows($sl_statsq);
?>
            <td><?php if(empty($countP)){ echo "0"; }else{ echo $countP; }  ?></td>
            <td><?php if(empty($countA)){ echo "0"; }else{ echo $countA; }  ?></td>
            <td><?php if(empty($countL)){ echo "0"; }else{ echo $countL; }  ?></td>
            <td><?php if(empty($countH)){ echo "0"; }else{ echo $countH; }  ?></td>
            <td><?php echo round($perday * $countA); ?></td>
            <td><?php echo round($perday * $countP); ?></td>
            <td></td>
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