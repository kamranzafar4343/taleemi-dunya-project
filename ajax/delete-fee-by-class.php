<?php
require_once("../functions/db.php");

$ids = $_POST['ids'];

$dl = mysqli_query($con,"delete from addFees where id='$ids'");
if($dl == true){ echo 1; }else{ echo 0; }
?>