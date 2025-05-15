<?php 
require_once("../functions/db.php");

$busins_type = strtolower($_POST['busins_type']);
$instite_code = $_POST['instite_code'];

$sl_sectin = mysqli_query($con,"select * from items where business_type='$busins_type' && institute_id='$instite_code'");
$output = "<option class='text-capitalize' value=' '>---select business items---</option>";

while($sctns = mysqli_fetch_array($sl_sectin)){
    $business_item = $sctns['business_item'];
    $output.="<option>".$business_item."</option>";
}
echo $output;
?>