<?php
include("functions/db.php");

if(isset($_GET['id'])){

 $pro_ids = $_GET['id'];
 
 $duplicate = mysqli_query($con,"select * from leftStudents where id ='$pro_ids'");
    if(mysqli_num_rows($duplicate)>0){
header("location: class-wis-student-lists");
    } else{  
 $sel = "insert into leftStudents select * from addStudents where id = '$pro_ids'";
 $query = mysqli_query($con,$sel);
 if($query){
     $del = mysqli_query($con,"DELETE FROM addStudents where id = '$pro_ids'");
header("location: class-wis-student-lists");
 } else {
header("location: class-wis-student-lists");
 } 
    }
    
    
}
?>