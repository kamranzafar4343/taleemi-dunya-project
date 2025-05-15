<?php
include("../functions/db.php");

 $pro_ids = $_POST['pro_ids'];
 
 $duplicate = mysqli_query($con,"select * from leftStudents where id ='$pro_ids'");
    if(mysqli_num_rows($duplicate)>0){
echo 11;
    } else{  
 $sel = "insert into leftStudents select * from addStudents where id = '$pro_ids'";
 $query = mysqli_query($con,$sel);
 if($query){
     $del = mysqli_query($con,"DELETE FROM addStudents where id = '$pro_ids'");
echo 1;
 } else {
echo 0;
 } 
    }
?>