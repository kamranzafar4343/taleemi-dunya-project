<?php
require_once("../functions/db.php");

$int_ids = $_POST['int_ids'];
$rem_dte = $_POST['rem_dte'];
$rem_time = $_POST['rem_time'];
$remks = $_POST['remks'];
$rl_out = $_POST['rl_out'];

$inst_qry = mysqli_query($con,"insert into reminders(instituteId,dates,times,contents,user_role)values('$int_ids','$rem_dte','$rem_time','$remks','$rl_out')");
if($inst_qry ==  true){ echo 1; }else{ echo 0; }
?>