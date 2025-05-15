<?php
require_once("../functions/db.php");

$institut_ids = $_POST['institut_ids'];
$chrge_months = $_POST['chrge_months'];
$chrge_sesion = $_POST['chrge_sesion'];

$sel_cnfm = mysqli_query($con,"select * from confirmSchools where institute_id='$institut_ids'");
$results = mysqli_fetch_array($sel_cnfm);
$institute_name = $results['institute_name'];
$campus = $results['campus'];
$logo = $results['logo'];
$phone = $results['phone'];
$cell = $results['cell'];
$address = $results['address'];

$est = 1;
$sel_psts = mysqli_query($con,"select * from fee_collection where instituteId='$institut_ids' && month='$chrge_months' && fees_status='paid' order by receive_date asc");
if(mysqli_num_rows($sel_psts)>0){
?>
<div class="row">
    <div class="col mb-3">
<table class="w-100">
    <thead>
        <tr style="background-color:hsl(35,100%,80%);">
            <th width="50">
                <img src="portal-admins/institute-logos/<?php echo $logo; ?>" class="img-fluid">
            </th>
            <th colspan="9">
                <h4 class="fs-4 fw-bolder text-center p-0"><?php echo $institute_name; ?></h4>
                <div class="text-center"><?php echo $campus; ?></div>
            </th>
        </tr>
        <tr style="background-color:hsl(35,100%,80%);">
            <th colspan="9"><div class="text-center text-capitalize">Month Wise collection receive list </div></th>
        </tr>
        <tr class="bg-apna">
            <th>#</th>
            <th>Date</th>
            <th>Roll#</th>
            <th>Student Name</th>
            <th>Father Name</th>
            <th>Class</th>
            <th>Section</th>
            <th>Session</th>
            <th>Receive Amounts</th>
        </tr>
    </thead>
    <tbody>
<?php
    while($est <= 10000 && $recv = mysqli_fetch_array($sel_psts)){
        $rollno = $recv['rollno'];
        $student_name = $recv['student_name'];
        $father_name = $recv['father_name'];
        $class = $recv['class'];
        $section = $recv['section'];
        $session = $recv['session'];
        $receive_monthly = $recv['receive_monthly'];
        $receive_date = $recv['receive_date'];
        
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$institut_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<tr style="background-color:hsl(35,100%,80%);">
    <td style="border:1px solid black;"><?php echo $est++; ?></td>
    <td style="border:1px solid black;"><?php echo $receive_date; ?></td>
    <td style="border:1px solid black;"><?php echo $rollno; ?></td>
    <td style="border:1px solid black;" class="text-capitalize"><?php echo $student_name; ?></td>
    <td style="border:1px solid black;" class="text-capitalize"><?php echo $father_name; ?></td>
    <td style="border:1px solid black;" class="text-capitalize"><?php echo $class_name; ?></td>
    <td style="border:1px solid black;" class="text-capitalize"><?php echo $section; ?></td>
    <td style="border:1px solid black;" ><?php echo $session; ?></td>
    <td style="border:1px solid black;"><?php echo $receive_monthly; ?></td>
</tr>
<?php 
} 
$sel_recvngs = mysqli_query($con,"select SUM(receive_monthly) as monthlyrecve from fee_collection where instituteId='$institut_ids' && month='$chrge_months'");
while($mnthl = mysqli_fetch_array($sel_recvngs)){
    $monthlyrecve = $mnthl['monthlyrecve'];
}
?>
<tr style="background-color:hsl(35,100%,80%);">
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;" ></td>
    <td style="border:1px solid black;" ></td>
    <td style="border:1px solid black;" class="fs-4 fw-bolder"><?php if(!empty($monthlyrecve)){ echo $monthlyrecve; }else{ echo "0"; } ?></td>
</tr>
<?php
}else{ echo "<div class='alert alert-danger'>There are no Event Charges Record Found!</div>"; }
?>    
    </tbody>
</table>
    </div>
</div>