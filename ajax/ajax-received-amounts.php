<?php
require_once("../functions/db.php");

$vndr_id = $_POST['vndr_id'];
$inst_id = $_POST['inst_id'];
$rev_nme = $_POST['rev_nme'];
$tl_amnt = $_POST['tl_amnt'];
$recved = $_POST['recved'];
$rev_blce = $_POST['rev_blce'];
$tl_recv = $_POST['tl_recv'];
$monh = date("m");
$dte = date("j-m-Y");
$pymtid = rand(10,10000);
$yrs = date("Y");

$inst_inq = mysqli_query($con,"insert into stockAmountReceived(vendId,instituteId,vendr_name,total_amount,received,balance,total_received,month,date,paymentId,session)values('$vndr_id','$inst_id','$rev_nme','$tl_amnt','$recved','$rev_blce','$tl_recv','$monh','$dte','$pymtid','$yrs')");
if($inst_inq == true){ echo 1; }else{ echo 0; }
?>