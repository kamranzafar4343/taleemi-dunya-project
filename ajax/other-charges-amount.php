<?php
require_once("../functions/db.php");

$stud_nme = $_POST['stu_nme'];
$aply_class = $_POST['aply_class'];
$aply_section = $_POST['aply_section'];
$rol_nbr = $_POST['rol_nbr'];
$chargs_name = $_POST['chargs_name'];
$real_amnt = $_POST['real_amnt'];
$recvd_amnt = $_POST['recvd_amnt'];
$totl_amount = $_POST['totl_amount'];
$chrge_mnth = $_POST['chrge_mnth'];
$aply_session = $_POST['aply_session'];
$institu_id = $_POST['institu_id'];
$dstngs = date("d-m-Y");
$slipno = rand(10,98923);


foreach($chargs_name as $index => $val) {
  $insrt_othrChrges = mysqli_query($con,"insert into otherChargesPaid(student_name,class,section,roll_number,charges_name,total_amount,receive_amount,grandTotal,months,session,instituteId,chrge_date,receiptNo)values('$stud_nme','$aply_class','$aply_section','$rol_nbr','".$val."','".$real_amnt[$index]."','".$recvd_amnt[$index]."','$totl_amount','$chrge_mnth','$aply_session','$institu_id','$dstngs','$slipno')");
}
if($insrt_othrChrges === true){ echo 1; }else{ echo 0; }


?>