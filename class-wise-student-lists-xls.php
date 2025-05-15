<?php 
include("functions/db.php"); 

if (isset($_GET['id'])){
    
   $ids = $_GET['id'];
   $cls = $_GET['cls'];
   $sectin = $_GET['sectin'];
   $sesin = $_GET['sesin'];
   

$selct_clas = mysqli_query($con,"select * from addStudents where instituteId='$ids' && class='$cls' && section='$sectin' && session='$sesin'");

$html = "<table><tr><th>Roll#</th><th>Student Name</th><th>Class</th><th>Section</th><th>Session</th><th>B-Form</th><th>Gender</th><th>Cell</th></tr>";
    while($frms = mysqli_fetch_array($selct_clas)){
        
        $roll_num = $frms['roll_num'];
        $studentName = $frms['studentName'];
        $class = $frms['class'];
        $section = $frms['section'];    
        $session = $frms['session'];    
        $bForm = $frms['bForm'];    
        $gender = $frms['gender'];    
        $fmcell = $frms['cell'];    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$html .= "<tr></td><td>$roll_num</td><td>$studentName</td><td class='text-uppercase'>$class_name</td><td class='text-uppercase'>$section</td><td>$session</td><td>$bForm</td><td>$gender</td><td>$fmcell</td></tr>";
    }
$html .="</table>";
header('Content-Type:application/xlsx');
header('Content-Desposition:attachment;filename=all-student-record.xlsx');
echo $html;
                    }
?>