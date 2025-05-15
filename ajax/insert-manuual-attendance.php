<?php
require_once("../functions/db.php");

$mark_studnt = $_POST['mark_studnt'];
$mrk_image = $_POST['mrk_image'];
$mark_fathr = $_POST['mark_fathr'];
$mrk_clas = $_POST['mrk_clas'];
$mrk_sectn = $_POST['mrk_sectn'];
$mrk_sesions = $_POST['mrk_sesions'];
$mrk_rolnumbr = $_POST['mrk_rolnumbr'];
$mrk_status = $_POST['mrk_status'];
$mrk_dates = $_POST['mrk_dates'];
$mnt = date("m");
date_default_timezone_set("Asia/Karachi");
$tme = date("h:i:s a");
$mrk_schol = $_POST['mrk_schol'];

$duplicate = mysqli_query($con,"select * from attandance where instituteId='$mrk_schol' && class='$mrk_clas' && section='$mrk_sectn' && session='$mrk_sesions' && date='$mrk_dates'");
if(mysqli_num_rows($duplicate)>0){
    echo 11;
}else{
    foreach ($mark_studnt as $key => $value) {
  $inst_atte = mysqli_query($con,"insert into attandance (stu_name,student_img,father_name,class,section,session,roll_no,status,date,month,att_time,instituteId) values ('".$value."','".$mrk_image[$key]."','".$mark_fathr[$key]."','$mrk_clas','$mrk_sectn','$mrk_sesions','".$mrk_rolnumbr[$key]."','".$mrk_status[$key]."','$mrk_dates','$mnt','".$tme[$key]."','$mrk_schol')");    
  }
  if ($inst_atte){ echo 1; }else{ echo 0; }
}

?>