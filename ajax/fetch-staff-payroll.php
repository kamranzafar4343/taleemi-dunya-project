<?php
require_once("../functions/db.php");


$ins_ids = $_POST['ins_ids'];
$inst_sesion = $_POST['inst_sesion'];
$manth = $_POST['manth'];

$sl_stf = mysqli_query($con,"select * from addStaff where instituteId='$ins_ids' && session='$inst_sesion'");
$fuls = "";
$as = 1;
if(mysqli_num_rows($sl_stf)>0){
$fuls = "<table class='table table-striped w-100'><tr class='bg-apna'><th>Sr#</th><th>ID#</th><th>Image</th><th>Staff Name</th><th>Post</th><th>Type</th><th>Salary</th><th>Payroll</th></tr>";    
while($as <= 100000 && $reslts = mysqli_fetch_array($sl_stf)){
$ids = $reslts['id'];
$staffId = $reslts['staffId'];
$appliedPost = $reslts['appliedPost'];
$staffType = $reslts['staffType'];
$staffName = $reslts['staffName'];
$gender = $reslts['gender'];
$fatherName = $reslts['fatherName'];
$cnic = $reslts['cnic'];
$dob = $reslts['dob'];
$phone = $reslts['phone'];
$cell = $reslts['cell'];
$subject = $reslts['subject'];
$session = $reslts['session'];
$salary = $reslts['salary'];
$dob = $reslts['dob'];
if(!empty($reslts['staffimage'])){ $staffimage = $reslts['staffimage']; }else{ $staffimage = "users.jpg"; }
$fuls .= "<tr style='background:hsl(35, 100%, 80%);'><td style='border:1px solid hsl(25, 100%, 50%);'>".$as++."</td><td style='border:1px solid hsl(25, 100%, 50%);'>$staffId</td><td width='30' style='border:1px solid hsl(25, 100%, 50%);'><img src='staff_imgs/$staffimage' class='img-fluid'></td><td class='text-capitalize' style='border:1px solid hsl(25, 100%, 50%);'>$staffName</td><td style='border:1px solid hsl(25, 100%, 50%);'>$appliedPost</td><td style='border:1px solid hsl(25, 100%, 50%);'>$staffType</td><td style='border:1px solid hsl(25, 100%, 50%);'>$salary</td><td style='border:1px solid hsl(25, 100%, 50%);'><a href='staff-payroll-form?id=$ids && month=$manth && sesin=$session && stfid=$staffId' target='_blank' class='btn btn-success text-uppercase fw-bold'><i class='fa-solid fa-file-invoice'></i> form</a></td></tr>";
    }
$fuls .= "</table>";
echo $fuls; 
}else{ echo "<div class='alert alert-danger text-capitalize'> there are no staff record!</div>"; }

?>