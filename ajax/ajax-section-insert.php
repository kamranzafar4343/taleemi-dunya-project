<?php
require_once("../functions/db.php");




$school_code = $_POST['school_code'];   
 $section_class = $_POST['section_class'];
 $sectn_title = mysqli_real_escape_string($con,$_POST['sectn_title']);
 $section_numbr = $_POST['section_numbr'];

$duplicate = mysqli_query($con,"select * from addSection where institute_id='$school_code' && class='$section_class' && section_name='$sectn_title'");
if(mysqli_num_rows($duplicate)>0){
    echo "<script>alert('This Section is Already Added.');</script>";
}else{ 
 $insrt_sectn = mysqli_query($con,"insert into addSection (institute_id,class,section_name,strength) values ('$school_code','$section_class','$sectn_title','$section_numbr')");
 if($insrt_sectn){ echo 1; }else{ echo 0; }
    }
?>