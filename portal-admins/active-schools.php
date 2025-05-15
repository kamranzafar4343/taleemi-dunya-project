<?php
include("functions/db.php");

if (isset($_GET['id'])){
 $ids = $_GET['id'];
 $duplicate = mysqli_query($con,"select * from confirmSchools where id ='$ids'");
    if(mysqli_num_rows($duplicate)>0){
    header("Location: user-manager");
    } else{  
 $sel = "insert into confirmSchools select * from addSchools where id = '$ids'";
 $query = mysqli_query($con,$sel);
 if($query){
     header("Location: user-manager");
 } else {
     header("Location: user-manager");
 } 
    }
}
?>