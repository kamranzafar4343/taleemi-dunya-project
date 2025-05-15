<?php
require_once("../functions/db.php");

$del_id = $_POST['del_id'];

$rmvedcolct = mysqli_query($con,"DELETE FROM institute_collection WHERE id = '$del_id'");
if($rmvedcolct === true){ echo 1; }else{ echo 0; }
?>