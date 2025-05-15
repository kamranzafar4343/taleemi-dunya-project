<?php 
include("functions/db.php"); 
require('compose/autoload.php');


if (isset($_GET['id'])){
    
   $ids = $_GET['id'];
   $cls = $_GET['cls'];
   $sectin = $_GET['sectin'];
   $sesin = date("Y");

$sl_schol = mysqli_query($con,"select * from confirmSchools where institute_id='$ids'");
$rt = mysqli_fetch_assoc($sl_schol);
$institute_name = $rt['institute_name'];
$campus = $rt['campus'];
$logo = $rt['logo'];


$ai=1;
$selct_clas = mysqli_query($con,"select * from addStudents where instituteId='$ids'");
if(mysqli_num_rows($selct_clas)>0){
$html = "<style>.tabls{ font-family:calibri;font-size:9px;width:100%; border-collapse: collapse; } .tabls tr th, .tabls tr td{ border:1px solid black;margin:0vh;padding:0vh;}</style><table class='tabls'><tr><th width='20' colspan='2' rowspan='3'><img src='portal-admins/institute-logos/$logo' style='width:5%;'></th><th colspan='10' style='font-size:3rem;'>$institute_name</th></tr><tr><th colspan='10' style='text-transforms:capitalize;font-size:1.5rem;'>$campus</th></tr><tr><th colspan='10' style='text-transforms:capitalize;font-size:1.3rem;'>All Students Record is Current Session $sesin</th></tr><tr><th>Sr#</th><th>Ad.Date</th><th>Family#</th><th>Roll#</th><th>Student Name</th><th width='100'>Father Name</th><th>Class</th><th>Section</th><th>B-Form</th><th>Gender</th><th>Cell</th><th>Fee</th></tr>";
    while($ai <= 1000000 && $frms = mysqli_fetch_array($selct_clas)){
        $frmimage = $frms['image'];
if(!empty($frmimage)){ $imgs = $frmimage; }else{ $imgs = "users.jpg"; }
        $admissionDate = $frms['admissionDate'];
        $familyId = $frms['familyId'];
        $roll_num = $frms['roll_num'];
        $studentName = $frms['studentName'];
        $fatherName = $frms['fatherName'];
        $class = $frms['class'];
        $section = $frms['section'];    
        $session = $frms['session'];    
        $bForm = $frms['bForm'];    
        $gender = $frms['gender'];    
        $fmcell = $frms['cell'];    
        $totalFee = $frms['totalFee'];    
        
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$html .= "<tr><td>".$ai++."</td><td>$admissionDate</td><td>$familyId</td><td>$roll_num</td><td style='text-transform:capitalize;'>$studentName</td><td style='text-transform:capitalize;'>$fatherName</td><td style='text-transform:capitalize;'>$class_name</td><td style='text-transform:capitalize;'>$section</td><td>$bForm</td><td style='text-transform:capitalize;'>$gender</td><td>$fmcell</td><td>$totalFee</td></tr>";
    }
$html .= "</table>";
}else{
    $html = "Student Record is not Exist.";    
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file=time().'.pdf';
$mpdf->output($file,'I');
    }
?>