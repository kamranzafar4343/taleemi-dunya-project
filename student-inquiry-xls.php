<?php 
include("functions/db.php"); 

if (isset($_GET['id'])){
   $ids = $_GET['id'];
   $yrs = date("Y");
   $instnme = $_GET['instnme'];
   $cpms = $_GET['cpms'];
   $logs = $_GET['logs'];

$selct_clas = mysqli_query($con,"select * from studentInquiry where instituteId='$ids'");

$html = "<style>.tabls{ font-family:calibri;font-size:12px;width:100%; border-collapse: collapse; } .tabls tr th, .tabls tr td{ border:1px solid black;margin:0vh;padding:0vh;}</style><table class='tabls'><tr><th colspan='12' style='font-size:3rem;text-transform:uppercase;'>$instnme</th></tr><tr><th colspan='12' style='text-transforms:capitalize;'>$cpms</th></tr><tr><th colspan='12'>Student Inquiry List $yrs</th><tr><th>Date</th><th>Student Name</th><th>Class</th><th>Section</th><th>Session</th><th>Gender</th><th>Cell#</th><th>Whatsapp#</th><th>Status</th><th>Fee</th><th>Address</th></tr>";
    while($frms = mysqli_fetch_array($selct_clas)){
        
        $dates = $frms['dates'];
        $studentName = $frms['studentName'];
        $class = $frms['class'];
        $section = $frms['section'];    
        $session = $frms['session'];    
        $bForm = $frms['bForm'];
        $gender = $frms['gender'];    
        $fmphone = $frms['phone'];    
        $fmcell = $frms['cell'];    
        $location = $frms['location'];    
        $totalFee = $frms['totalFee'];    
        $status = $frms['status'];    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$html .= "<tr><td>$dates</td><td>$studentName</td><td class='text-uppercase'>$class_name</td><td class='text-uppercase'>$section</td><td>$session</td><td>$gender</td><td>$fmcell</td><td>$fmphone</td><td>$status</td><td>$totalFee</td><td>$location</td></tr>";
    }
$html .="</table>";
header('Content-Type:application/xls');
header('Content-Desposition:attachment;filename=inquiry.xls');
echo $html;
                    }
?>