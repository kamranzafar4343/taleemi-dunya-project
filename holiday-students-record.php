<?php 
include("functions/db.php"); 
require('compose/autoload.php');


if (isset($_GET['id'])){
    
   $ids = $_GET['id'];
   $cls = $_GET['cls'];
   $sectin = $_GET['sectin'];
   $sesin = $_GET['sesin'];
   $dtes = $_GET['dtes'];

$sl_schol = mysqli_query($con,"select * from confirmSchools where institute_id='$ids'");
$rt = mysqli_fetch_assoc($sl_schol);
$institute_name = $rt['institute_name'];
$campus = $rt['campus'];
$logo = $rt['logo'];


$ai=1;
$selct_clas = mysqli_query($con,"select * from attandance where instituteId='$ids' && class='$cls' && section='$sectin' && session='$sesin' && status='H' && date='$dtes'");
if(mysqli_num_rows($selct_clas)>0){
$html = "<style>.tabls{ font-family:calibri;font-size:10px;width:100%; border-collapse: collapse; } .tabls tr th, .tabls tr td{ border:1px solid black;margin:0vh;padding:0vh;}</style><table class='tabls'><tr><th width='20' colspan='2' rowspan='2'><img src='portal-admins/institute-logos/$logo' style='width:2%;'></th><th colspan='8' style='font-size:1.5rem;text-transform:uppercase;'>$institute_name</th></tr><tr><th colspan='8' style='text-transforms:capitalize;'>$campus</th></tr><tr><th colspan='10'>Student Holiday Report $dtes</th></tr><tr><th>Sr#</th><th>Image</th><th>Roll#</th><th>Student Name</th><th>Class</th><th>Section</th><th>Session</th><th>B-Form</th><th>Status</th><th>Cell</th></tr>";
    while($ai <= 1000000 && $frms = mysqli_fetch_array($selct_clas)){
        $frmimage = $frms['student_img'];
if(!empty($frmimage)){ $imgs = $frmimage; }else{ $imgs = "users.jpg"; }
        $roll_no = $frms['roll_no'];
        $studentName = $frms['stu_name'];
        $class = $frms['class'];
        $section = $frms['section'];    
        $session = $frms['session'];        
        $status = $frms['status'];        

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$adstd = mysqli_query($con,"select * from addStudents where instituteId='$ids' && class='$class' && section='$section' && roll_num='$roll_no'");
$stdnt = mysqli_fetch_assoc($adstd);
    $bForm = $stdnt['bForm'];    
    $gender = $stdnt['gender'];    
    $fmcell = $stdnt['cell'];

$html .= "<tr><td>".$ai++."</td><td width='20'><img src='student_imgs/$imgs' style='width:1%;'></td><td>$roll_num</td><td style='text-transform:capitalize;'>$studentName</td><td style='text-transform:capitalize;'>$class_name</td><td style='text-transform:capitalize;'>$section</td><td>$session</td><td>$bForm</td><td style='text-transform:capitalize;'>$status</td><td>$fmcell</td></tr>";
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