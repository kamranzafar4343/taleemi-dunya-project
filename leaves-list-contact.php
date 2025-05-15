<?php 
include("functions/db.php"); 

if (isset($_GET['id'])){
    
   $ids = $_GET['id'];
   $cls = $_GET['cls'];
   $sectin = $_GET['sectin'];
   $sesin = $_GET['sesin'];
   $dtes = $_GET['dtes'];
   
$selct_clas = mysqli_query($con,"select * from attandance where instituteId='$ids' && class='$cls' && section='$sectin' && session='$sesin' && status='L' && date='$dtes'");

$html = "<style>.tabls{ font-family:calibri;font-size:10px;width:100%; border-collapse: collapse; } .tabls tr th, .tabls tr td{ border:1px solid black;margin:0vh;padding:0vh;}</style><table class='tabls'><tr align='center'><th colspan='10'>Student Attendance Leave Report $dtes</th></tr><tr><th>Sr#</th><th>Roll#</th><th>Student Name</th><th>Class</th><th>Section</th><th>Session</th><th>B-Form</th><th>Status</th><th>Cell</th></tr>";
    while($frms = mysqli_fetch_array($selct_clas)){
        
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

$html .= "<tr><td>".$ai++."</td><td>$roll_no</td><td style='text-transform:capitalize;'>$studentName</td><td style='text-transform:capitalize;'>$class_name</td><td style='text-transform:capitalize;'>$section</td><td>$session</td><td>$bForm</td><td style='text-transform:capitalize;'>$status</td><td>$fmcell</td></tr>";
    }
$html .="</table>";
 
header('Content-Type:application/xls');  
header('Content-Disposition: attachment; filename=studentsRecord.xls');

echo $html;
                    }
?>