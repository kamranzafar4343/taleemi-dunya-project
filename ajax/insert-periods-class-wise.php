<?php
require_once("../functions/db.php");

$perd_instid = $_POST['perd_instid'];
$perd_cls = $_POST['perd_cls'];
$perd_nmbr = $_POST['perd_nmbr'];
$perd_start = $_POST['perd_start'];
$perd_end = $_POST['perd_end'];
$perd_tpes = $_POST['perd_tpes'];

$dupl = mysqli_query($con,"select * from addPeriods where instituteId='$perd_instid' && class='$perd_cls' && period_no='$perd_nmbr'");
if(mysqli_num_rows($dupl)>0){
    echo 11;
}else{
    $inst_prids = mysqli_query($con,"insert into addPeriods(instituteId,class,period_no,start_time,end_time,period_type)values('$perd_instid','$perd_cls','$perd_nmbr','$perd_start','$perd_end','$perd_tpes')");
    if($inst_prids == true){ echo 1; }else{ echo 0; }   
}
?>