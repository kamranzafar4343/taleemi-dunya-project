<?php
require_once("functions/db.php");

if(isset($_GET['id'])){
    $ids = $_GET['id'];
$sl_schol = mysqli_query($con,"select * from confirmSchools where id='$ids'");
$result = mysqli_fetch_assoc($sl_schol);
$institute_id = $result['institute_id'];
$invDte = date("j-m-Y");
$invMont = date("m");
$invYer = date("Y");
$owner_name = $result['owner_name'];
$institute_name = $result['institute_name'];
$campus = $result['campus'];
$account_type = $result['account_type'];
$strength = $result['strength'];
$plan = $result['plan'];
$decieded_payment = $result['decieded_payment'];


$inst = mysqli_query($con,"insert into schoolCollection(instituteId,date,month,year,owner,institute,campus,type,strength,plan,charges,received,balance,status) value('$institute_id','$invDte','$invMont','$invYer','$owner_name','$institute_name','$campus','$account_type','$strength','$plan','$decieded_payment','0','0','unpaid')");
if($inst){ header("location: generate-invoice-annualy"); }else{ header("location: generate-invoice-annualy"); }
}

?>