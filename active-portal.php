<?php
include("functions/db.php");

if (isset($_GET['id'])){
 $ids = $_GET['id'];
 $duplicate = mysqli_query($con,"select * from studentPortal where id ='$ids' && instituteId='$inst'");
    if(mysqli_num_rows($duplicate)>0){
    header("Location: overall-staff");
    } else{  
 $sel = "insert into studentPortal select * from addStudents where id = '$ids' && instituteId='$inst'";
 $query = mysqli_query($con,$sel);
 if($query){
     header("Location: lms-status");
 } else {
     header("Location: lms-status");
 } 
    }
}
?>