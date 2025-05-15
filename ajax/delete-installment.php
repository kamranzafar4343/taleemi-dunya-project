<?php
require_once("../functions/db.php");

$del_ids = $_POST['del_ids'];

$del_instl = mysqli_query($con,"DELETE FROM fee_collection where id='$del_ids'");
if($del_instl){ echo 1; }else{ echo 0; }
?>