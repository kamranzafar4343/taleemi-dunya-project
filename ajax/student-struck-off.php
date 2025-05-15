<?php
include("../functions/db.php");

$pro_id = $_POST['pro_id'];

$selctprod = mysqli_query($con,"select * from addStudents where id='$pro_id'");
$studnt = mysqli_fetch_assoc($selctprod);
$instituteId = $studnt['instituteId'];


 $duplicate = mysqli_query($con,"select * from struckoffStudents where id ='$pro_id' && instituteId='$instituteId'");
    if(mysqli_num_rows($duplicate)>0){
echo 11;
    } else{  
 $selstck = "insert into struckoffStudents select * from addStudents where id = '$pro_id' && instituteId='$instituteId'";
 $query = mysqli_query($con,$selstck);
 if($query === true){
     $del = mysqli_query($con,"DELETE FROM addStudents where id = '$pro_id' && instituteId='$instituteId'");
     echo 1;
 } else {
     echo 0;
 } 
    }
?>