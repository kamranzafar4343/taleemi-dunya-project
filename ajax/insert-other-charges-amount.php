<?php
require_once("../functions/db.php");

$inst_ide = $_POST['inst_ide'];
$chrg_nme = $_POST['chrg_nme'];
$chrge_amt = $_POST['chrge_amt'];
$othr_type = $_POST['othr_type'];
$selct_cls = $_POST['selct_cls'];

$dup = mysqli_query($con,"select * from addOtherChargesDecieded where instituteId='$inst_ide' && charges_title='$chrg_nme' && class='$selct_cls'");
if(mysqli_num_rows($dup)>0){
    echo 11;
}else{
$inst_chrg = mysqli_query($con,"insert into addOtherChargesDecieded(instituteId,charges_title,charges_amount,type,class)values('$inst_ide','$chrg_nme','$chrge_amt','$othr_type','$selct_cls')");
if($inst_chrg == true){ echo 1; }else{ echo 0; }
}


?>