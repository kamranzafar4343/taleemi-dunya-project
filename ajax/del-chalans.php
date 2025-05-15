<?php 
require_once("../functions/db.php");

$chl_id = $_POST['chl_id'];

$del_chln = mysqli_query($con,"delete from fee_collection where id='$chl_id'");
if($del_chln){ echo 1; }else{ echo 0; }
?>