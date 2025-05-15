<?php
require_once("../functions/db.php");

$apl_status =$_POST['apl_status'];
$apl_timein =$_POST['apl_timein'];
$apl_tmeout =$_POST['apl_tmeout'];
$attendance_ids =$_POST['attendance_ids'];

$updte_recrd = mysqli_query($con,"update staffAttendance set status='$apl_status',att_time='$apl_timein',time_out='$apl_tmeout' where id='$attendance_ids'");
if($updte_recrd === true){ echo 1; }else{ echo 0; }
?>