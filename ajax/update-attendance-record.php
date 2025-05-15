<?php
require_once("../functions/db.php");

$stats = $_POST['stats'];
$times_ins = $_POST['times_ins'];
$time_outs = $_POST['time_outs'];
$ids = $_POST['ids'];


$updt_atendnace = mysqli_query($con,"update staffAttendance set status='$stats',att_time='$times_ins',time_out='$time_outs' where id='$ids'");

if($updt_atendnace ==  true){ echo 1; }else{ echo 0; }

?>