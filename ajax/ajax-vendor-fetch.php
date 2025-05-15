<?php
require_once("../functions/db.php");

$v_dts = $_POST['v_dts'];
$v_act_tp = $_POST['v_act_tp'];
$vd_its = $_POST['vd_its'];
$vdr_nme = $_POST['vdr_nme'];
$cp_nme = $_POST['cp_nme'];
$cp_mal = $_POST['cp_mal'];
$cp_ctct = $_POST['cp_ctct'];
$cp_type = $_POST['cp_type'];
$cp_web = $_POST['cp_web'];
$refnc = $_POST['refnc'];
$ref_phne = $_POST['ref_phne'];
$cp_loc = $_POST['cp_loc'];
$rmrkes = $_POST['rmrkes'];
$inti_usr = $_POST['inti_usr'];
$v_id = $_POST['vnder_id'];


$updt_prv = mysqli_query($con,"update vendorAccount set dates='$v_dts',type='$v_act_tp',items='$vd_its',vname='$vdr_nme',company_name='$cp_nme',company_email='$cp_mal',contacts='$cp_ctct',business_type='$cp_type',websites='$cp_web',reference='$refnc',reference_phone='$ref_phne',address='$cp_loc',remarks='$rmrkes' where id='$v_id'");
if($updt_prv == true){ echo 1; }else{ echo 0; }   

?>