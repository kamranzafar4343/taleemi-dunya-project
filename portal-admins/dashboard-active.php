<?php
include("functions/db.php");

if (isset($_GET['id'])){
 $ids = $_GET['id'];
 $duplicate = mysqli_query($con,"select * from dashboard_schools where id ='$ids'");
    if(mysqli_num_rows($duplicate)>0){
    header("Location: school-records");
    } else{  
 $sel = "insert into dashboard_schools select * from confirmSchools where id = '$ids'";
 $query = mysqli_query($con,$sel);
 if($query){
     header("Location: school-records");
 } else {
     header("Location: school-records");
 } 
    }
}
?>