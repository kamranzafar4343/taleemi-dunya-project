<?php
require_once("../functions/db.php");

$aply_sesin = $_POST['aply_sesin'];
$instit_id = $_POST['instit_id'];
$aply_reasn = $_POST['aply_reasn'];
$aply_frmdte = strtotime($_POST['aply_frmdte']);
$aply_todte = strtotime($_POST['aply_todte']);
$dte_difrnce = $aply_todte-$aply_frmdte;
$nodys = round($dte_difrnce / (60 * 60 * 24));

for($i=1;$i<=$nodys;$i++){
    echo "Test".$i;
}
?>