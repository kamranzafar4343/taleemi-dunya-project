<?php
require_once("../functions/db.php");

$apl_satffname = $_POST['apl_satffname'];
$apl_fathrnme = $_POST['apl_fathrnme'];
$apl_image = $_POST['apl_image'];
$apl_post = $_POST['apl_post'];
$apl_type = $_POST['apl_type'];
$apl_sesion = $_POST['apl_sesion'];
$apl_staffid = $_POST['apl_staffid'];
$apl_attendance = $_POST['apl_attendance'];

$apl_startdate = $_POST['apl_startdate'];
$frmt = explode("-",$apl_startdate);
$datg = $frmt['2'];
$months = $frmt['1'];
$years = $frmt['0'];

$arangedate = $datg."-".$months."-".$years;
$months;
date_default_timezone_set("Asia/Karachi");

$apl_timein = $_POST['apl_timein'];
$apl_timeout = $_POST['apl_timeout'];
$apl_instid = $_POST['apl_instid'];


$duplicate = mysqli_query($con,"select * from staffAttendance where date='$apl_startdate' && instituteId='$apl_instid'");
if(mysqli_num_rows($duplicate)>0){
    echo 11;
}else{
foreach ($apl_satffname as $key => $value) {
  $inst_atte = mysqli_query($con,"insert into staffAttendance (staff_name,father_name,staffimages,post,staffType,session,staff_id,status,date,month,att_time,time_out,instituteId) values ('".$value."','".$apl_fathrnme[$key]."','".$apl_image[$key]."','".$apl_post[$key]."','".$apl_type[$key]."','$apl_sesion','".$apl_staffid[$key]."','".$apl_attendance[$key]."','$apl_startdate','$months','$apl_timein[$key]','$apl_timeout[$key]','$apl_instid')");    
  }
if ($inst_atte){ echo 1; }else{ echo 0; }
}
?>