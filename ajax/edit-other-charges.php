<?php
require_once("../functions/db.php");

$oth_ids = $_POST['oth_ids'];
$othr_title = $_POST['othr_title'];
$amounts = $_POST['amounts'];
$orgnl_typs = $_POST['orgnl_typs'];

$upte = mysqli_query($con,"update addOtherChargesDecieded set charges_title='$othr_title',charges_amount='$amounts',type='$orgnl_typs' where id='$oth_ids'");
if($upte === true){ echo 1; }else{ echo 0; }
?>