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
$vendr_id = rand(0,10000);
$inti_usr = $_POST['inti_usr'];

$duplic = mysqli_query($con,"select * from vendorAccount where instituteId='$inti_usr' && contacts='$cp_ctct' && vname='$vdr_nme'");
if(mysqli_num_rows($duplic)>0){
    
}else{
    $inst_prv = mysqli_query($con,"insert into vendorAccount(dates,type,items,vname,company_name,company_email,contacts,business_type,websites,reference,reference_phone,address,remarks,vids,instituteId)values('$v_dts','$v_act_tp','$vd_its','$vdr_nme','$cp_nme','$cp_mal','$cp_ctct','$cp_type','$cp_web','$refnc','$ref_phne','$cp_loc','$rmrkes','$vendr_id','$inti_usr')");
if($inst_prv == true){ echo 1; }else{ echo 0; }   
}
?>