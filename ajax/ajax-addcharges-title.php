<?php
require_once("../functions/db.php");

$schol_code_charges = $_POST['schol_code_charges'];
$chrge_one = mysqli_real_escape_string($con,$_POST['chrge_one']);
$chrge_two = mysqli_real_escape_string($con,$_POST['chrge_two']);
$chrge_three = mysqli_real_escape_string($con,$_POST['chrge_three']);
$chrge_four = mysqli_real_escape_string($con,$_POST['chrge_four']);
$chrge_five = mysqli_real_escape_string($con,$_POST['chrge_five']);
$chrge_six = mysqli_real_escape_string($con,$_POST['chrge_six']);


$duplicate = mysqli_query($con,"select * from addChargesTitle where instituteId='$schol_code_charges' && charges1='$chrge_one' && charges2='$chrge_two' && charges3='$chrge_three' && charges4='$chrge_four' && charges5='$chrge_five' && charges6='$chrge_six'");
if(mysqli_num_rows($duplicate)>0){
    
}else{
$inst_clsed = mysqli_query($con,"insert into addChargesTitle(instituteId,charges1,charges2,charges3,charges4,charges5,charges6)values('$schol_code_charges','$chrge_one','$chrge_two','$chrge_three','$chrge_four','$chrge_five','$chrge_six')");
if($inst_clsed){ echo 1; }else{ echo 0; }
}


?>