<?php 
require_once("../functions/db.php");

$class_titles = strtolower($_POST['class_titles']);
$institute_codes = $_POST['institute_codes'];

$sl_sectin = mysqli_query($con,"select * from addFees where class_name='$class_titles' && instituteId='$institute_codes'");
$output = "<option class='text-capitalize' value='0'>select Monthly / Course Fee</option>";

while($sctns = mysqli_fetch_array($sl_sectin)){
    $month_fee = $sctns['month_fee'];
    $output.="<option>".$month_fee."</option>";
}
echo $output;

?>