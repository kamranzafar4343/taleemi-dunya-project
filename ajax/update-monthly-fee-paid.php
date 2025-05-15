<?php
require_once("../functions/db.php");

$fe_ids = $_POST['fe_id'];
$previus = $_POST['previus'];
$disc = $_POST['disc'];
$fnes = $_POST['fnes'];
$othrs_chrges = $_POST['othrs_chrges'];
$tl_amnt = $_POST['tl_amnt'];
$recives = $_POST['recives'];
$crt_blnce = $_POST['crt_blnce'];
$statuses = $_POST['statuses'];
$act_types = $_POST['act_types'];
$contents = $_POST['contents'];
$dotes = $_POST['clct_dats'];
if(!empty($_POST['clct_dats'])){
$frmt = explode("-",$dotes);
$datng = $frmt['2'];
$manth = $frmt['1'];
$yeras = $frmt['0'];
$dts = $datng."-".$manth."-".$yeras;
}else{
$dts = date("d-m-Y");    
}

$colg_ids = $_POST['colg_ids'];
$col_rols = $_POST['col_rols'];
$col_st_id = $_POST['col_st_id'];
$colg_sname = $_POST['colg_sname'];
$col_ft_name = $_POST['col_ft_name'];
$colg_cls = $_POST['colg_cls'];
$colg_sectn = $_POST['colg_sectn'];
$colg_sesin = $_POST['colg_sesin'];
$Colg_st_img = $_POST['Colg_st_img'];
$user_indentity = $_POST['user_indentity'];
$due_dates = $_POST['due_dates'];
$chrge_month = $_POST['chrge_month'];
$month_name = $_POST['month_name'];
$mnths = date("m");

if($colg_ids == "63404"){
    $updte_py = mysqli_query($con,"update fee_collection set receive_monthly='$crt_blnce',remaing_balance='$previus',fees_status='$statuses',remarks='$contents' where id='$fe_ids'");
    if($updte_py === true){ echo 1; }else{ echo 0; }
}else{
$updte_py = mysqli_query($con,"update fee_collection set receive_monthly='$crt_blnce',remaing_balance='$previus',fees_status='$statuses',remarks='$contents' where id='$fe_ids'");

 $inst_acnt = mysqli_query($con,"insert into dayBook (user_name,image,user_id,institute_id,account_type,narration,income,expense,session,month,date,role) values('$colg_sname','$Colg_st_img','$col_rols','$colg_ids','fee collection','Challan of $month_name- Last Amout Submit $recives','$previus','0','$colg_sesin','$mnths','$dts','$user_indentity')");

if($updte_py && $inst_acnt == true){ echo 1; }else{ echo 0; }
 }
?>