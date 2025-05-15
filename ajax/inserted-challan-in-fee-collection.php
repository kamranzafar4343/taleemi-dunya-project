<?php
require_once("../functions/db.php");

$frm_img = $_POST['frm_img'];
$fml_id = $_POST['fml_id'];
$rol_nm = $_POST['rol_nm'];
$yer = $_POST['yer'];
$st_nme = $_POST['st_nme'];
$fthr_nme = $_POST['fthr_nme'];
$apl_cls = $_POST['apl_cls'];
$sectn = $_POST['sectn'];
$month_fe = $_POST['month_fe'];
if(empty($_POST['blanc'])){ $blanc = "0"; }else{ $blanc = $_POST['blanc']; }
$Unpaid = 'Unpaid';
$manth = $_POST['manth'];
$chllan_status = "monthly";
$inst_ids = $_POST['inst_ids'];
$finl_due_date = $_POST['finl_due_date'];
$chln_date = date("d-m-Y");

$duplicty = mysqli_query($con,"select * from fee_collection where month='$manth' && challan_status='$chllan_status' && instituteId='$inst_ids' && class='$apl_cls' && section='$sectn' && session='$yer'");
if(mysqli_num_rows($duplicty)>0){
    echo 11;
}else{
foreach($frm_img as $key => $values){
   $inst_chlns = mysqli_query($con,"insert into fee_collection(student_imgs,familyId,rollno,session,student_name,father_name,class,section,monthly_fee,previous_balance,discounts,fine,total_amount,receive_monthly,remaing_balance,fees_status,month,challan_status,instituteId,dates,due_dates)values('".$values."','".$fml_id[$key]."','$rol_nm[$key]','$yer[$key]','$st_nme[$key]','$fthr_nme[$key]','$apl_cls[$key]','$sectn[$key]','$month_fe[$key]','0','0','0','0','0','0','$Unpaid','$manth','$chllan_status','$inst_ids','$chln_date','$finl_due_date')"); 
}
if($inst_chlns){ echo 1; }else{ echo 0; }
}
?>