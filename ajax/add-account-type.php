<?php
require_once("../functions/db.php");

$sch_id = $_POST['sch_id'];
$acc_type = $_POST['acc_type'];

$duplic = mysqli_query($con,"select * from accounts_type where instituteId='$sch_id' && type_name='$acc_type'");
if(mysqli_num_rows($duplic)>0){
    
}else{
$inst_typ = mysqli_query($con,"insert into accounts_type(instituteId,type_name)values('$sch_id','$acc_type')");
if($inst_typ){ echo 1; }else{ echo 0; }   
}
?>