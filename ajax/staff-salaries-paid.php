<?php
require_once("../functions/db.php");

$staff_nme = $_POST['snmeed'];
$naratin = "Salary Paid of ".$staff_nme;
$staff_tpe = $_POST['stftpeed'];
$stf_pst = $_POST['psted'];
$staf_imgs = $_POST['stfimged'];
$staf_slry = $_POST['slryed'];
$staf_presents = $_POST['prested'];
$st_absents = $_POST['absnted'];
$st_leve = $_POST['leveed'];
$stf_holiday = $_POST['hfleveed'];
$pr_day_salary = $_POST['prdyslryed'];
$advacne_salry = $_POST['advslryed'];
$buns = $_POST['buns'];
$net_salry = $_POST['netslrayed'];
$final_nt_salry = $_POST['fnetslryed'];
$curnt_month = $_POST['monthesed'];
$salary_pay = $_POST['payamnted'];
$balnce = $_POST['rempyableed'];
$staff_ids = $_POST['stfided'];
$inst_id = $_POST['isntidsed'];
$sessin = $_POST['sesned'];
$paymnt_date = $_POST['pydteed'];
$user_role = $_POST['user_role'];


$duplicty = mysqli_query($con,"select * from payroll where staff_id='$staff_ids' && instituteId='$inst_id' && month='$curnt_month' && session='$sessin'");
if(mysqli_num_rows($duplicty)>0){
echo 11;
}else{
    
$dollar = mysqli_query($con,"insert into payroll (staff_name,staff_type,apply_post,staff_image,salary,presents,absents,leaved,half_leave,per_day_salary,advance_salary,bonus,net_salary,fint_net_salary,month,pay_amount,remaing_payable,staff_id,instituteId,session,salary_date) values ('$staff_nme','$staff_tpe','$stf_pst','$staf_imgs','$staf_slry','$staf_presents','$st_absents','$st_leve','$stf_holiday','$pr_day_salary','$advacne_salry','$buns','$net_salry','$final_nt_salry','$curnt_month','$salary_pay','$balnce','$staff_ids','$inst_id','$sessin','$paymnt_date')");
$inst_acnt = mysqli_query($con,"insert into dayBook (user_name,image,user_id,institute_id,account_type,narration,income,expense,session,month,date,role) values('$staff_nme','$staf_imgs','$staff_ids','$inst_id','Paid Salary','$naratin','0','$salary_pay','$sessin','$curnt_month','$paymnt_date','$user_role')");
if($dollar === true && $inst_acnt === true){ echo 1; }else{ echo 0; }
    }

?>