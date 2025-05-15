<?php
require_once("../functions/db.php");

$instit_ides = $_POST['instit_ides'];
$aply_cls = $_POST['aply_cls'];
$aply_sectns = $_POST['aply_sectns'];
$aply_days = $_POST['aply_days'];
$perid_no = $_POST['perid_no'];
$aply_sbjct = $_POST['aply_sbjct'];
$aply_techrs = $_POST['aply_techrs'];

$duplict = mysqli_query($con,"select * from asignPeriods where instituteId='$instit_ides' && class='$aply_cls' && period_no='$perid_no' && days_no='$aply_days'");
if(mysqli_num_rows($duplict)>0){
    echo 11;
}else{
$sel_asgn = mysqli_query($con,"insert into asignPeriods(instituteId,class,section,days_no,period_no,subject,teachers)values('$instit_ides','$aply_cls','$aply_sectns','$aply_days','$perid_no','$aply_sbjct','$aply_techrs')");
if($sel_asgn == true){ echo 1; }else{ echo 0; }
    }
?>