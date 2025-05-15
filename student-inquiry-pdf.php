<?php 
include("functions/db.php"); 
require('compose/autoload.php');


if (isset($_GET['id'])){
   $ids = $_GET['id'];
   $instnme = $_GET['instnme'];
   $cpms = $_GET['cpms'];
   $logs = $_GET['logs'];
   $yrs = date("Y");

$ai=1;
$selct_clas = mysqli_query($con,"select * from studentInquiry where instituteId='$ids'");
if(mysqli_num_rows($selct_clas)>0){
$html = "<style>.tabls{ font-family:calibri;font-size:10px;width:100%; border-collapse: collapse; } .tabls tr th, .tabls tr td{ border:1px solid black;margin:0vh;padding:0vh;}</style><table class='tabls'><tr><th width='30' rowspan='2'><img src='portal-admins/institute-logos/$logs' style='width:10%;'></th><th colspan='11' style='font-size:3rem;text-transform:uppercase;'>$instnme</th></tr><tr><th colspan='11' style='text-transforms:capitalize;'>$cpms</th></tr><tr><th colspan='12'>Student Inquiry List $yrs</th></tr><tr><th>Sr#</th><th>Student Name</th><th>Class</th><th>Section</th><th>Session</th><th>Gender</th><th>Cell</th><th>Whatsapp#</th><th>Fee</th><th>Status</th><th>Month</th><th>Address</th></tr>";
    while($ai <= 1000000 && $frms = mysqli_fetch_array($selct_clas)){

        $studentName = $frms['studentName'];
        $class = $frms['class'];
        $section = $frms['section'];
        $session = $frms['session'];
        $gender = $frms['gender'];
        $fmphone = $frms['phone'];
        $fmcell = $frms['cell'];
        $totalFee = $frms['totalFee'];
        $otherTotal = $frms['otherTotal'];
        $month = $frms['month'];
        $status = $frms['status'];
        $location = $frms['location'];
        
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$html .= "<tr><td>".$ai++."</td><td>$studentName</td><td class='text-uppercase'>$class_name</td><td class='text-uppercase'>$section</td><td>$session</td><td>$gender</td><td>$fmcell</td><td>$fmphone</td><td>$totalFee</td><td>$status</td><td>$month</td><td>$location</td></tr>";
    }
$html .= "</table>";
}else{
    $html = "Student Inquiry Record is not Exist.";    
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file=time().'.pdf';
$mpdf->output($file,'I');
    }
?>