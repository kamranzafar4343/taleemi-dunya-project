<?php
require_once("../functions/db.php");

$dels_id = $_POST['dels_id'];

$delngs = mysqli_query($con,"DELETE FROM dayBook where id = '$dels_id'");
if($delngs === true){ echo 1; }else{ echo 0; }
?>