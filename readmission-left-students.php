<?php
include("functions/db.php");

if (isset($_GET['id'])){
 $ids = $_GET['id'];
 $duplicate = mysqli_query($con,"select * from addStudents where id ='$ids'");
    if(mysqli_num_rows($duplicate)>0){
    header("Location: left-students-manager");
    } else{  
 $sel = "insert into addStudents select * from leftStudents where id = '$ids'";
 $query = mysqli_query($con,$sel);
 if($query){
     $del = mysqli_query($con,"DELETE FROM leftStudents where id = '$ids'");
     header("Location: left-students-manager");
 } else {
     header("Location: left-students-manager");
 } 
    }
}
?>