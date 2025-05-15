<?php 
require_once("../functions/db.php");

$class_titles = $_POST['class_title'];
$institute_codes = $_POST['institute_code'];

$sl_sectin = mysqli_query($con,"select * from addSubjects where classid='$class_titles' && institute_id='$institute_codes'");
$output = "<option class='text-capitalize'>select subject</option>";

while($sctns = mysqli_fetch_array($sl_sectin)){
    $section_names = $sctns['subject_name'];
    $output.="<option>".$section_names."</option>";
}
echo $output;
?>