<?php
include("functions/db.php");

if (isset($_GET['id'])){
 $ids = $_GET['id'];
 $duplicate = mysqli_query($con,"select * from studentPortal where instituteId='$ids'");
    if(mysqli_num_rows($duplicate)>0){
    header("Location: lms-status");
    } else{  
 $sel = "insert into studentPortal select * from addStudents where instituteId='$ids'";
 $query = mysqli_query($con,$sel);
 if($query){
     header("Location: lms-status");
 } else {
     header("Location: lms-status");
 } 
    }
}
?>