<?php
include("functions/db.php");

if (isset($_GET['id'])){
 $ids = $_GET['id'];
 $duplicate = mysqli_query($con,"select * from resignStaff where id ='$ids'");
    if(mysqli_num_rows($duplicate)>0){
    header("Location: overall-staff");
    } else{  
 $sel = "insert into resignStaff select * from addStaff where id = '$ids'";
 $query = mysqli_query($con,$sel);
 if($query){
     $del = mysqli_query($con,"DELETE FROM addStaff where id = '$ids'");
     header("Location: overall-staff");
 } else {
     header("Location: overall-staff");
 } 
    }
}
?>