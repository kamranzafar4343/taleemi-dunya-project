<?php
require_once("../functions/db.php");

$staf_idps =$_POST['staf_idps'];
$attendance_ids =$_POST['attendance_ids'];

$updte_recrd = mysqli_query($con,"update staffAttendance set staff_id='$staf_idps' where id='$attendance_ids'");
if($updte_recrd === true){ echo 1; }else{ echo 0; }
?>