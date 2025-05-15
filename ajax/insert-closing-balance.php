<?php
require_once("../functions/db.php");

$close_dte = $_POST['close_dte'];
$csh_hand = $_POST['csh_hand'];
$to_income = $_POST['to_income'];
$to_expnse = $_POST['to_expnse'];
$pad_amnt = $_POST['pad_amnt'];
$recv_amnt = $_POST['recv_amnt'];
$rem_blnce = $_POST['rem_blnce'];
$nartion = $_POST['nartion'];
$ruls = $_POST['ruls'];
$mnth = date("m");
$col_id = $_POST['col_id'];

$sel_sesins = mysqli_query($con,"select * from addSession where institute_id='$col_id' order by id desc");
$sesin = mysqli_fetch_assoc($sel_sesins);
$session = $sesin['session'];

$duplict = mysqli_query($con,"select * from closingBalance where instituteId='$col_id' && closing_date='$close_dte'");
if(mysqli_num_rows($duplict)>0){
    echo 11;
}else{
 $inst_clos = mysqli_query($con,"insert into closingBalance(closing_date,handed_cash,total_income,total_expense,paid_amount,received,balance,narrations,roles,month,session,instituteId)values('$close_dte','$csh_hand','$to_income','$to_expnse','$pad_amnt','$recv_amnt','$rem_blnce','$nartion','$ruls','$mnth','$session','$col_id')");
if($inst_clos  === true){ echo 1 ; }else{ echo 0; }   
}

?>