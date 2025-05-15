<?php
require_once("../functions/db.php");

$ids = $_POST['ids'];

$del_othr = mysqli_query($con,"delete from addOtherChargesDecieded where id='$ids'");
if($del_othr === true){ echo 1; }else{ echo 0; }
?>