<?php
require_once("../functions/db.php");

$staff_idps = $_POST['staff_idps'];
$apl_oldstaffid = $_POST['apl_oldstaffid'];

$updtebyid = mysqli_query($con,"update staffAttendance set staff_id='$staff_idps' where staff_id='$apl_oldstaffid'");
if($updtebyid === true){ echo 1; }else{ echo 0; }
?>