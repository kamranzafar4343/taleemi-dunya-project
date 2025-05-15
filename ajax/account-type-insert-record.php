<?php
require_once("../functions/db.php");

$select_acnt_data = $_POST['select_acnt_data'];
$nretn_suit = $_POST['nretn_suit'];
$dte_tpngs = $_POST['dte_tpe'];
if(!empty($dte_tpngs)){
$frmt = explode("-",$dte_tpngs);
$datng = $frmt['2'];
$maths = $frmt['1'];
$saals = $frmt['0'];
$dte_tpe = $datng."-".$maths."-".$saals;    
}else{
$dte_tpe = date("j-m-Y");    
}
$inst_id = $_POST['inst_id'];
$rols_ot = $_POST['rols_ot'];
if(!empty($_POST['csh_in'])){ $csh_in = $_POST['csh_in']; }else{ $csh_in = "0"; }
if(!empty($_POST['csh_out'])){ $csh_out = $_POST['csh_out']; }else{ $csh_out = "0"; }


$inst_dys = mysqli_query($con,"insert into dayBook(user_name,image,user_id,institute_id,account_type,narration,income,expense,session,month,date,role)values('Direct Day Book Entry','','Nil','$inst_id','$select_acnt_data','$nretn_suit','$csh_in','$csh_out','$saals','$maths','$dte_tpe','$rols_ot')");

if($inst_dys === true){ echo 1; }else{ echo 0; }

?>