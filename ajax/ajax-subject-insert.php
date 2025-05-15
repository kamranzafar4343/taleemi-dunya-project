<?php
require_once("../functions/db.php");

$subject_titles = mysqli_real_escape_string($con,$_POST['subject_titles']);
$institutes_id = $_POST['institutes_id'];
$sbjcls_id = $_POST['sbjcls_id'];


$duplicate = mysqli_query($con,"select * from addSubjects where institute_id='$institutes_id' && subject_name='$subject_titles' && classid='$sbjcls_id'");
if(mysqli_num_rows($duplicate)>0){

}else{ 
 $inst_sbjb = mysqli_query($con,"insert into addSubjects (institute_id,subject_name,classid) values ('$institutes_id','$subject_titles','$sbjcls_id')");
 if($inst_sbjb){ echo 1; }else{ echo 0; }
    }

?>