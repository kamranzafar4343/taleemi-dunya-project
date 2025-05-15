<?php
require_once("../functions/db.php");

$m_fes = strtolower($_POST['month_fe']);
$class_tutrle = strtolower($_POST['classes_title']);
$instp_code = $_POST['schols_code'];


$sl_sectin = mysqli_query($con,"select * from addFees where class_name='$class_tutrle' && month_fee='$m_fes' && instituteId='$instp_code'");
$output = "<option class='text-capitalize' value='0'>select discount</option>";
while($sctns = mysqli_fetch_array($sl_sectin)){
    $discount = $sctns['discount'];
$output.="<option>".$discount."</option>";

}
echo $output;
?>