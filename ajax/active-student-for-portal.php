<?php
require_once("../functions/db.php");

$std_id = $_POST['std_id'];
$inst_id = $_POST['inst_id'];

 $duplicate = mysqli_query($con,"select * from studentPortal where id ='$std_id' && instituteId='$inst_id'");
    if(mysqli_num_rows($duplicate)>0){
    echo 11;
    } else{  
 $sel = "insert into studentPortal select * from addStudents where id = '$std_id' && instituteId='$inst_id'";
 $query = mysqli_query($con,$sel);
 if($query === true){
     echo 1;
 } else {
     echo 0;
 } 
    }

?>