<?php
require_once("../functions/db.php");

$bill_id = $_POST['bill_id'];
$joing_date = $_POST['joing_date'];
$dactivtn_dte = $_POST['dactivtn_dte'];
$plans = $_POST['plans'];
$decid_amnt = $_POST['decid_amnt'];
$rcv_amnt = $_POST['rcv_amnt'];
$blnce = $_POST['blnce'];
$mnths = $_POST['mnths'];
$charg_date = $_POST['charg_date'];
$fee_tpe = $_POST['fee_tpe'];
$institu_name = $_POST['institu_name'];

$updt_bling = mysqli_query($con,"UPDATE institute_collection SET joining_date = '$joing_date', deactive_date='$dactivtn_dte', plan='$plans', months='$mnths', monthly_amounts='$decid_amnt', receive_amount='$rcv_amnt',balance='$blnce',charges_date='$charg_date', fee_type='$fee_tpe' WHERE id='$bill_id';");
if($updt_bling === true){ echo 1; }else{ echo 0; }
?>