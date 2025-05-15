<?php
include("functions/db.php");

if (isset($_GET['id'])){
 $ids = $_GET['id'];
 $duplicate = mysqli_query($con,"select * from addStaff where id ='$ids'");
    if(mysqli_num_rows($duplicate)>0){
    header("Location: resign-staff-manager");
    } else{  
 $sel = "insert into addStaff select * from resignStaff where id = '$ids'";
 $query = mysqli_query($con,$sel);
 if($query){
     $del = mysqli_query($con,"DELETE FROM resignStaff where id = '$ids'");
     header("Location: resign-staff-manager");
 } else {
     header("Location: resign-staff-manager");
 } 
    }
}
?>