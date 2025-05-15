<?php
require_once("../functions/db.php");

$scholsesn_code = $_POST['scholsesn_code'];
$sessn_titles = $_POST['sessn_titles'];
$strt_dats = $_POST['strt_dats'];
$end_dats = $_POST['end_dats'];

$fixd = mysqli_query($con,"select * from addSession where institute_id='$scholsesn_code'");
$counts = mysqli_num_rows($fixd);

/* if($counts < 1){ }else{ echo 101; } */

$duplicate = mysqli_query($con,"select * from addSession where institute_id='$scholsesn_code' && session='$sessn_titles'");
if(mysqli_num_rows($duplicate)>0){
    echo 11;
}else{
$inst_clsed = mysqli_query($con,"insert into addSession(institute_id,session,starting_date,ending_date)values('$scholsesn_code','$sessn_titles','$strt_dats','$end_dats')");
if($inst_clsed){ echo 1; }else{ echo 0; }
    }


?>