<?php
require_once("../functions/db.php");

$section_name = strtolower($_POST['section_name']);
$class_tile = strtolower($_POST['class_tile']);
$institute_codes = $_POST['institute_codes'];

$sl_sectin = mysqli_query($con,"select * from addSection where class='$class_tile' && section_name='$section_name' && institute_id='$institute_codes'");

while($sctns = mysqli_fetch_array($sl_sectin)){
    $class = $sctns['class'];
    $section_names = $sctns['section_name'];
    $strength = $sctns['strength'];

$sl_clos = mysqli_query($con,"select * from addStudents where instituteId='$institute_codes' && class='$class' && section='$section_names'");
$counts = mysqli_num_rows($sl_clos);

$blance = $strength - $counts;

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$institute_codes' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
    
    $output="<table><tr><td>1</td><td class='text-uppercase'>$class_name</td><td class='text-uppercase'>$section_names</td><td>$strength</td><td>$counts</td><td>$blance</td></tr></table>";
}
echo $output;

?>