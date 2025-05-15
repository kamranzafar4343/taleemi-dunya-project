<?php
require_once("../functions/db.php");

$socil_imgs = $_POST['socil_imgs'];

$insrt_imgs = mysqli_query($con,"insert into socialPost(post_name)values('$socil_imgs')");
if($insrt_imgs === true){ echo 1; }else{ echo 0; }
?>