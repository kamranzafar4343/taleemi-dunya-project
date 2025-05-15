<?php
require_once("../functions/db.php");

$tm_ins = $_POST['tm_ins'];
$tm_ot = $_POST['tm_ot'];
$scl_iedes = $_POST['scl_iedes'];

$inst_tms = mysqli_query($con,"insert into schoolTiming(time_in,time_out,instituteId)values('$tm_ins','$tm_ot','$scl_iedes')");
if($inst_tms == true){ echo 1; }else{ echo 0; }

?>