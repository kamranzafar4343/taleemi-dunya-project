<?php
require_once("../functions/db.php");

$stats = $_POST['stats'];
$ids = $_POST['ids'];

$updt_atendnace = mysqli_query($con,"update attandance set status='$stats' where id='$ids'");

if($updt_atendnace ==  true){ echo 1; }else{ echo 0; }

?>