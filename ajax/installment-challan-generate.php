<?php
require_once("../functions/db.php");

$stu_img = $_POST['stu_img'];
$famly_id = $_POST['famly_id'];
$rol_num = $_POST['rol_num'];
$sesins = $_POST['sesins'];
$stu_nme = $_POST['stu_nme'];
$fathr_nme = $_POST['fathr_nme'];
$cles = $_POST['cles'];
$sectn = $_POST['sectn'];
$monthly = $_POST['amnt'];
$prev = "0";
$discnt = "0";
$fnes = "0";
$totlamnt = "0";
$recve = "0";
$remng = "0";
$fee_stats = "Unpaid";
$chln_stats = "installment";
$inst_ids = $_POST['inst_ids'];
$mnths = $_POST['aply_months'];
$due_dates = $_POST['due_dates'];
$dtes = $_POST['isueing_date'];


 foreach($monthly as $key => $value){
$inst_chlrn = mysqli_query($con,"insert into fee_collection(student_imgs,familyId,rollno,session,student_name,father_name,class,section,monthly_fee,previous_balance,discounts,fine,total_amount,receive_monthly,remaing_balance,fees_status,month,challan_status,instituteId,dates,due_dates)values('$stu_img','$famly_id','$rol_num','$sesins','$stu_nme','$fathr_nme','$cles','$sectn','".$value."','$prev','$discnt','$fnes','$totlamnt','$recve','$remng','$fee_stats','$mnths[$key]','$chln_stats','$inst_ids','$dtes[$key]','$due_dates[$key]')");
}
if($inst_chlrn === true){ echo 1; }else{ echo 0; }
?>