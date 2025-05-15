<?php
require_once("../functions/db.php");

$st_name = $_POST['st_name'];
$ft_name = $_POST['ft_name'];
$st_image = $_POST['st_image'];
$st_cls = $_POST['st_cls'];
$st_sectn = $_POST['st_sectn'];
$st_sesin = $_POST['st_sesin'];
$st_atednce = $_POST['st_atednce'];
$st_rolnum = $_POST['st_rolnum'];
$st_sbjct = $_POST['st_sbjct'];
$totl_mrks = $_POST['totl_mrks'];
if(!empty($_POST['st_mrks'])){ $st_mrks = $_POST['st_mrks']; }else{ $st_mrks = "0"; }
$pas_mrks = $_POST['pas_mrks'];
$trm_id = $_POST['trm_id'];
$mnt = date("m");
$institu_id = $_POST['institu_id'];
$dt = date("j-m-Y");
$rsltid = rand(10,100000);

$duplicate = mysqli_query($con,"select * from results where instituteId='$institu_id' && class='$st_cls' && section='$st_sectn' && session='$st_sesin' && terms='$trm_id' && subject='$st_sbjct'");
if(mysqli_num_rows($duplicate)>0){
    echo 11;
}else{
    foreach ($st_name as $key => $value) {
  $inst_rstls = mysqli_query($con,"insert into results(student_name,father_name,student_img,class,section,session,attendance,roll_no,subject,total_marks,marks,passing_marks,terms,months,remarks,instituteId,date,resultId)values('".$value."','$ft_name[$key]','$st_image[$key]','$st_cls','$st_sectn','$st_sesin','$st_atednce[$key]','$st_rolnum[$key]','$st_sbjct','$totl_mrks','$st_mrks[$key]','$pas_mrks','$trm_id','$mnt','Enter Exame Remarks','$institu_id','$dt','$rsltid')");    
  }
  if ($inst_rstls){ echo 1; }else{ echo 0; }
}
?>