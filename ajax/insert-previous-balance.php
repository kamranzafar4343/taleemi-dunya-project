<?php
require_once("../functions/db.php");

$stu_img = $_POST['stu_img'];
$famly_id = $_POST['famly_id'];
$roll_nubr = $_POST['roll_nubr'];
$apl_sesion = $_POST['apl_sesion'];
$stu_name = $_POST['stu_name'];
$fther_nme = $_POST['fther_nme'];
$apl_clas = $_POST['apl_clas'];
$apl_sectn = $_POST['apl_sectn'];
$monthly_fee = $_POST['monthly_fee'];
$prev_balnce = $_POST['prev_balnce'];
$dicunt = $_POST['dicunt'];
$apl_fine = $_POST['apl_fine'];
$othr_chargs = $_POST['othr_chargs'];
$total_amunt = $_POST['total_amunt'];
$recvd_amnt = $_POST['recvd_amnt'];
$remng_balnce = $_POST['remng_balnce'];
$fee_stetus = $_POST['fee_stetus'];
$month_nme = $_POST['month_nme'];
$chlan_stats = $_POST['chlan_stats'];
$accnt_type = $_POST['accnt_type'];
$institute_ids = $_POST['institute_ids'];
$apl_remrks = $_POST['apl_remrks'];
$issue_dte = $_POST['issue_dte'];
$dwe_dte = $_POST['dwe_dte'];
$recv_dtes = $_POST['recv_dtes'];


$dup = mysqli_query($con,"select * from fee_collection where instituteId='$institute_ids' && rollno='$roll_nubr' && account_type='$accnt_type'");
if(mysqli_num_rows($dup)>0){
    echo 11; 
}else{
$insert_blance = mysqli_query($con,"insert into fee_collection(student_imgs,familyId,rollno,session,student_name,father_name,class,section,monthly_fee,previous_balance,discounts,fine,other_charges,total_amount,receive_monthly,remaing_balance,fees_status,month,challan_status,account_type,instituteId,remarks,dates,due_dates,receive_date)values('$stu_img','$famly_id','$roll_nubr','$apl_sesion','$stu_name','$fther_nme','$apl_clas','$apl_sectn','$monthly_fee','$prev_balnce','$dicunt','$apl_fine','$othr_chargs','$total_amunt','$recvd_amnt','$remng_balnce','$fee_stetus','$month_nme','$chlan_stats','$accnt_type','$institute_ids','$apl_remrks','$issue_dte','$dwe_dte','$recv_dtes')");
if($insert_blance === true){ echo 1; }else{ echo 0; }
}
?>