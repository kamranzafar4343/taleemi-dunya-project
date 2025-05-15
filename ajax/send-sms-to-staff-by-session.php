<?php
require_once("../functions/db.php");

$instided = $_POST['instided'];
$stfided = $_POST['stfided'];
$psted = $_POST['psted'];
$stftypeed = $_POST['stftypeed'];
$snameed = $_POST['snameed'];
$stfimgsed = $_POST['stfimgsed'];
$fils_img = $_POST['fils_img'];
$contntes = mysqli_real_escape_string($con,$_POST['contntes']);
$date = date("j-m-Y");
$mnths = date("m");

foreach($snameed as $key => $values){
$inst_sms = mysqli_query($con,"insert into staffSms(instituteId,staffId,post,staff_type,staff_name,staff_imgs,file_image,message,sms_date,month)values('".$instided[$key]."','".$stfided[$key]."','".$psted[$key]."','".$stftypeed[$key]."','".$snameed[$key]."','".$stfimgsed[$key]."','$fils_img','$contntes','$date','$mnths')");
}
if($inst_sms == true){ echo 1; }else{ echo 0; }
?>