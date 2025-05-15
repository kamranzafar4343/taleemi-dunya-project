<?php
include("functions/db.php");

if (isset($_GET['id'])){
 $ids = $_GET['id'];
 $duplicate = mysqli_query($con,"select * from blackListVendors where id ='$ids'");
    if(mysqli_num_rows($duplicate)>0){
    header("Location: create-vendor-account");
    } else{  
 $sel = "insert into blackListVendors select * from vendorAccount where id = '$ids'";
 $query = mysqli_query($con,$sel);
 if($query){
     $del = mysqli_query($con,"DELETE FROM vendorAccount where id = '$ids'");
     header("Location: create-vendor-account");
 } else {
     header("Location: create-vendor-account");
 } 
    }
}
?>