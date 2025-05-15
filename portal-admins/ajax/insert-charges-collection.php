<?php
require_once("../functions/db.php");

$monthlyfee_id = $_POST['monthlyfee_id'];
$chge_dtes = $_POST['chge_dtes'];
$expry_dating = $_POST['expry_dating'];
$decid_amnt = $_POST['decid_amnt'];
$rem_amnt = $_POST['rem_amnt'];
$recve_amnt = $_POST['recve_amnt'];
$balnce_amnt = $_POST['balnce_amnt'];
if($_POST['balnce_amnt'] == 0){ $feetype = "paid"; }elseif($_POST['balnce_amnt'] > 0){ $feetype = "balance"; }else{ $feetype = "unpaid"; }

$updtes = mysqli_query($con,"update institute_collection set charges_date='$chge_dtes',expiry_dates='$expry_dating',remaining_amount='$rem_amnt',receive_amount='$recve_amnt',balance='$balnce_amnt',fee_type='$feetype' where id='$monthlyfee_id'");
if($updtes == true){ echo 1; }else{ echo 0; }   
?>