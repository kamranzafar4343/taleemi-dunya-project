<?php
require_once("../functions/db.php");

$schol_code = $_POST['schol_code'];
$class_titles = $_POST['class_titles'];
$month_fee = $_POST['month_fee'];
$descnout = $_POST['descnout'];

$duplicate = mysqli_query($con,"select * from addFees where instituteId='$schol_code' && class_name='$class_titles'");
if(mysqli_num_rows($duplicate)>0){
    
}else{
$inst_clsed = mysqli_query($con,"insert into addFees(instituteId,class_name,month_fee,discount)values('$schol_code','$class_titles','$month_fee','$descnout')");
if($inst_clsed){ echo 1; }else{ echo 0; }
}

?>