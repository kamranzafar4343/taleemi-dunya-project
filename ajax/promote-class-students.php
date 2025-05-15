<?php
require_once("../functions/db.php");

$aply_instids = $_POST['aply_instids'];
$aply_clss = $_POST['aply_clss'];
$aply_sectns = $_POST['aply_sectns'];
$aply_sesins = $_POST['aply_sesins'];
$old_clases = $_POST['old_clases'];
$old_sectins = $_POST['old_sectins'];
$old_sesionss = $_POST['old_sesionss'];

$updtequry = mysqli_query($con,"UPDATE addStudents SET class='$aply_clss', section='$aply_sectns', session='$aply_sesins' where instituteId='$aply_instids' && class='$old_clases' && section='$old_sectins' && session='$old_sesionss'");
if($updtequry === true){ echo 1; }else{ echo 0; }

?>