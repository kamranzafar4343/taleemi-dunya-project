<?php
require_once("../functions/db.php");

$inst_ids = $_POST['inst_ids'];
$busn_type = $_POST['busn_type'];
$busn_items = $_POST['busn_items'];


$inst_itm = mysqli_query($con,"insert into items (institute_id,business_type,business_item) values ('$inst_ids','$busn_type','$busn_items')");
if($inst_itm){ echo 1; }else{ echo 0; }    
    
?>