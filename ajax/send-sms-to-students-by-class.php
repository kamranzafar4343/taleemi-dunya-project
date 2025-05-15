<?php
require_once("../functions/db.php");

$instides = $_POST['instides'];
$fmlyes = $_POST['fmlyes'];
$rolnmes = $_POST['rolnmes'];
$cleses = $_POST['cleses'];
$setnes = $_POST['setnes'];
$sesines = $_POST['sesines'];
$imeges = $_POST['imeges'];
$stnmees = $_POST['stnmees'];
$fils_img = $_POST['fils_img'];
$contntes = mysqli_real_escape_string($con,$_POST['contntes']);
$date = date("j-m-Y");
$mnths = date("m");

foreach($stnmees as $key => $values){
$inst_sms = mysqli_query($con,"insert into sms(instituteId,famlyId,roll_num,class,section,session,stu_img,student_name,file_image,message,sms_date,month)values('".$instides[$key]."','".$fmlyes[$key]."','".$rolnmes[$key]."','".$cleses[$key]."','".$setnes[$key]."','".$sesines[$key]."','".$imeges[$key]."','".$stnmees[$key]."','$fils_img','$contntes','$date','$mnths')");
}
if($inst_sms == true){ echo 1; }else{ echo 0; }
?>