<?php
require_once("../functions/db.php");

$admison_id = $_POST['admison_id'];

$delt = mysqli_query($con,"DELETE FROM new_admission_collection where id = '$admison_id'");
if($delt == true){ echo 1; }else{ echo 0;}

?>