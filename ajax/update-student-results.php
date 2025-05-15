<?php
require_once("../functions/db.php");

$stats = $_POST['stats'];
$ids = $_POST['ids'];
$updt_mrks = $_POST['updt_mrks'];
$rol_nubr = $_POST['rol_nubr'];


$updt_atendnace = mysqli_query($con,"update results set attendance='$stats',marks='$updt_mrks',roll_no='$rol_nubr' where id='$ids'");

if($updt_atendnace ==  true){ echo 1; }else{ echo 0; }

?>