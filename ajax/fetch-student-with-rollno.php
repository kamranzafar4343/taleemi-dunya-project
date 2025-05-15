<?php
require_once("../functions/db.php");

$st_nme = $_POST['st_nme'];
$int_id = $_POST['int_ids'];

$as=1;
$fuls = "";
$sl_prl = mysqli_query($con,"select * from addStudents where studentName LIKE '%$st_nme%' && instituteId='$int_id'");
if(mysqli_num_rows($sl_prl)>0){
$fuls = "<table class='w-100 table table-responsive'><thead><tr class='bg-apna'><th>Sr#</th><th>Roll#</th><th>Student Name</th><th>Class</th><th>Section</th><th>Session</th></tr></thead><tbody>";
    while($as <= 100000 && $reslts = mysqli_fetch_array($sl_prl)){
$roll_num = $reslts['roll_num'];
$class = $reslts['class'];
$section = $reslts['section'];
$medium = $reslts['medium'];
$session = $reslts['session'];
$studentName = $reslts['studentName'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$int_id' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];


$fuls .= "<tr style='background:hsl(35, 100%, 80%);'><th style='border:1px solid hsl(25, 100%, 50%);'>".$as++."</th><td style='border:1px solid hsl(25, 100%, 50%);'><input readonly value='$roll_num' type='text' style='background-color:transparent;border:none;'/></td><td style='border:1px solid hsl(25, 100%, 50%);'>$studentName</td><td style='border:1px solid hsl(25, 100%, 50%);'>$class_name</td><td style='border:1px solid hsl(25, 100%, 50%);'>$section</td><td style='border:1px solid hsl(25, 100%, 50%);'>$session</td></tr>";
    }
$fuls .= "</tbody></table>";
echo $fuls;
}else{ echo "<div class='text-white'>There are no Record Found!</div>"; }
?>