<?php
require_once("../functions/db.php");

$attdence_id = $_POST['attdence_id'];

$det_atd = mysqli_query($con,"delete from staffAttendance where id='$attdence_id'");
if($det_atd === true){ echo 1; }else{ echo 0; }
?>