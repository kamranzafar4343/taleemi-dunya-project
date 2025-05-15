<?php 
require_once("../functions/db.php");

$class_titles = strtolower($_POST['class_title']);
$institute_codes = $_POST['institute_code'];

$sl_sectin = mysqli_query($con,"select * from addSection where class='$class_titles' && institute_id='$institute_codes'");
$output = "<option class='text-capitalize' value=''>select section</option>";

while($sctns = mysqli_fetch_array($sl_sectin)){
    $section_names = $sctns['section_name'];
    $output.="<option>".$section_names."</option>";
}
echo $output;
?>