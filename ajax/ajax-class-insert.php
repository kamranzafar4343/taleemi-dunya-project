<?php
require_once("../functions/db.php");

$schol_code = $_POST['schol_code'];
$class_titles = mysqli_real_escape_string($con,$_POST['class_titles']);
$duratin = mysqli_real_escape_string($con,$_POST['duratin']);


$duplicate = mysqli_query($con,"select * from addClass where institute_id='$schol_code' && class_name='$class_titles'");
if(mysqli_num_rows($duplicate)>0){
    
}else{
$inst_clsed = mysqli_query($con,"insert into addClass(institute_id,class_name,duration)values('$schol_code','$class_titles','$duratin')");
if($inst_clsed){ echo 1; }else{ echo 0; }
}

?>