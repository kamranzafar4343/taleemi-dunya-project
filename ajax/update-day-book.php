<?php
require_once("../functions/db.php");

$day_rols = $_POST['day_rols'];
$day_dtes = $_POST['day_dtes'];
$day_id = $_POST['day_id'];

$updte = mysqli_query($con,"update dayBook set user_id='$day_rols',date='$day_dtes' where id='$day_id'");
if($updte === true){ echo 1; }else{ echo 0; }
?>