<?php
require_once("../functions/db.php");

$st_nme = $_POST['st_nme'];
$fathr_nme = $_POST['fathr_nme'];
$staf_imgs = $_POST['staf_imgs'];
$stf_post = $_POST['stf_post'];
$stf_tpes = $_POST['stf_tpes'];
$sesins = $_POST['sesins'];
$stf_ids = $_POST['stf_ids'];
$mesge = $_POST['mesge'];
$inst_id = $_POST['inst_id'];
$updte_id = $_POST['updte_id'];
$delve_date = date("j-m-Y");


    foreach ($st_nme as $key => $value) {
  $inst_alrts = mysqli_query($con,"insert into teacherAlerts (staff_name,father_name,staff_image,post,type,session,staffId,message,instituteId,delivery_date) values ('".$value."','".$fathr_nme[$key]."','".$staf_imgs[$key]."','".$stf_post[$key]."','".$stf_tpes[$key]."','".$sesins[$key]."','".$stf_ids[$key]."','$mesge','$inst_id','$delve_date')"); }
if($inst_alrts == true){ echo 1; }else{ echo 0; }
?>