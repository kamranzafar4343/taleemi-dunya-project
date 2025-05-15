<?php
include("functions/db.php");

if (isset($_GET['id'])){
 $ids = $_GET['id'];
 $inst = $_GET['inst'];
   
 $duplicate = mysqli_query($con,"select * from addStudents where id ='$ids'");
    if(mysqli_num_rows($duplicate)>0){
    header("Location: struck-off-manager");
    } else{  
 $sel = "insert into addStudents select * from struckoffStudents where id = '$ids'";
 $query = mysqli_query($con,$sel);
 if($query){
     $del = mysqli_query($con,"DELETE FROM struckoffStudents where id = '$ids'");
     header("Location: struck-off-manager");
 } else {
     header("Location: struck-off-manager");
 } 
    }
}
?>