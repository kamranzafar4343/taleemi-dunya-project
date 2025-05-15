<?php require_once("source/head-section.php"); require_once("source/navbar.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Annual Salary Report</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<br>
<?php

    $sl_pr = mysqli_query($con,"select * from staffAttendance where instituteId='$instituteId' && staff_id='$staffId'");
    $result = mysqli_fetch_assoc($sl_pr);
    
    $staff_name = $result['staff_name'];
    $father_name = $result['father_name'];
    if(!empty($result['staffimages'])){ $staffimages = $result['staffimages']; }else{ $staffimages = "users.jpg"; }
    $post = $result['post'];
    $staffType = $result['staffType'];
    $session = $result['session'];
    $staff_id = $result['staff_id'];
    $status = $result['status'];
    $date = $result['date'];
    $month = $result['month'];
    $att_time = $result['att_time'];
    $instituteId = $result['instituteId'];
    
$sl_slr = mysqli_query($con,"select * from addStaff where instituteId='$instituteId' && staffId='$staffId'");
    $salry = mysqli_fetch_assoc($sl_slr);
    $joiningDate = $salry['joiningDate'];
    $salary = $salry['salary'];
    $perday = $salary / 30;
?>
<div class="container-fluid mt-4">
    <div class="row" id="bodies">
        <div class="col datas">
<table class="table table-responsive w-100 bg-white">
        <tr>
            <th>Staff Name: <?php echo "<span class='text-decoration-underline'>".$staff_name."</span>"; ?></th>
            <th>Post: <?php echo "<span class='text-decoration-underline'>".$post."</span>"; ?></th>
            <th>Joining Date: <?php echo "<span class='text-decoration-underline'>".$joiningDate."</span>"; ?></th>
            <th width="50"><img src="../staff_imgs/<?php echo $staffimages; ?>" class="img-fluid"></th>
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
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='P' && instituteId='$instituteId' && month='08'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='A' && instituteId='$instituteId' && month='08'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='L' && instituteId='$instituteId' && month='08'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='H' && instituteId='$instituteId' && month='08'");
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
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='P' && instituteId='$instituteId' && month='09'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='A' && instituteId='$instituteId' && month='09'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='L' && instituteId='$userId' && month='09'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='H' && instituteId='$instituteId' && month='09'");
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
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='P' && instituteId='$instituteId' && month='10'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='A' && instituteId='$instituteId' && month='10'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='L' && instituteId='$instituteId' && month='10'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='H' && instituteId='$instituteId' && month='10'");
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
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='P' && instituteId='$instituteId' && month='11'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='A' && instituteId='$instituteId' && month='11'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='L' && instituteId='$instituteId' && month='11'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='H' && instituteId='$instituteId' && month='11'");
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
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='P' && instituteId='$instituteId' && month='12'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='A' && instituteId='$instituteId' && month='12'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='L' && instituteId='$instituteId' && month='12'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='H' && instituteId='$instituteId' && month='12'");
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
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='P' && instituteId='$instituteId' && month='01'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='A' && instituteId='$instituteId' && month='01'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='L' && instituteId='$instituteId' && month='01'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='H' && instituteId='$instituteId' && month='01'");
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
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='P' && instituteId='$instituteId' && month='02'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='A' && instituteId='$instituteId' && month='02'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='L' && instituteId='$instituteId' && month='02'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='H' && instituteId='$instituteId' && month='02'");
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
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='P' && instituteId='$instituteId' && month='03'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='A' && instituteId='$instituteId' && month='03'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='L' && instituteId='$instituteId' && month='03'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='H' && instituteId='$instituteId' && month='03'");
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
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='P' && instituteId='$instituteId' && month='04'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='A' && instituteId='$instituteId' && month='04'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='L' && instituteId='$instituteId' && month='04'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='H' && instituteId='$instituteId' && month='04'");
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
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='P' && instituteId='$instituteId' && month='05'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='A' && instituteId='$instituteId' && month='05'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='L' && instituteId='$instituteId' && month='05'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='H' && instituteId='$instituteId' && month='05'");
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
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='P' && instituteId='$instituteId' && month='06'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='A' && instituteId='$instituteId' && month='06'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='L' && instituteId='$instituteId' && month='06'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='H' && instituteId='$instituteId' && month='06'");
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
$sl_stats = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='P' && instituteId='$instituteId' && month='07'");
$countP = mysqli_num_rows($sl_stats);
$sl_statss = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='A' && instituteId='$instituteId' && month='07'");
$countA = mysqli_num_rows($sl_statss);
$sl_statse = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='L' && instituteId='$instituteId' && month='07'");
$countL = mysqli_num_rows($sl_statse);
$sl_statsq = mysqli_query($con,"select * from staffAttendance where staff_id='$staffId' && status='H' && instituteId='$instituteId' && month='07'");
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
    
</div>
<?php require_once("source/foot-section.php"); ?>