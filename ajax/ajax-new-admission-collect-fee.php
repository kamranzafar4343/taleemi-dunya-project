<?php
require_once("../functions/db.php");

$instu_id = $_POST['instu_id'];
$dtes = $_POST['paid_date'];
$frts = explode("-",$dtes);
$dted = $frts['2'];
$mont = $frts['1'];
$yers = $frts['0'];
$datst = $dted."-".$mont."-".$yers;
if($datst === "--" ){ $dt = date("d-m-Y"); }else{ $dt = $datst; }
$user_id = $_POST['user_id'];
$rol_noe = $_POST['rol_noe'];
$clesed = $_POST['clesed'];
$sectned = $_POST['sectned'];
$sesined = $_POST['sesined'];
$imgeed = $_POST['imgeed'];
$snameed = $_POST['snameed'];
$fnameed = $_POST['fnameed'];
if(!empty($_POST['admisn_fee'])){ $admisn_fee = $_POST['admisn_fee']; }else{ $admisn_fee = "0"; }
if(!empty($_POST['anual_fnd'])){ $anual_fnd = $_POST['anual_fnd']; }else{ $anual_fnd = "0"; }
if(!empty($_POST['book'])){ $book = $_POST['book']; }else{ $book = "0"; }
if(!empty($_POST['unifrm'])){ $unifrm = $_POST['unifrm']; }else{ $unifrm = "0"; }
if(!empty($_POST['statonry'])){ $statonry = $_POST['statonry']; }else{ $statonry = "0"; }
if(!empty($_POST['othars'])){ $othars = $_POST['othars']; }else{ $othars = "0"; }
if(!empty($_POST['totlFeesed'])){ $totlFeesed = $_POST['totlFeesed']; }else{ $totlFeesed = "0"; }
if(!empty($_POST['recvdeded'])){ $recvdeded = $_POST['recvdeded']; }else{ $recvdeded = "0"; }
if(!empty($_POST['remgFeesed'])){ $remgFeesed = $_POST['remgFeesed']; }else{ $remgFeesed = "0"; }
if(!empty($_POST['recvFeesed'])){ $recvFeesed = $_POST['recvFeesed']; }else{ $recvFeesed = "0"; }

if(!empty($mont)){ $mnt = $mont; }else{ $mnt = date("m"); }

$sel_stu = mysqli_query($con,"select * from addStudents where instituteId='$instu_id' && roll_num='$rol_noe'");
$qry = mysqli_fetch_assoc($sel_stu);

$frmimage = $qry['image'];
$familyId = $qry['familyId'];
$roll_num = $qry['roll_num'];
$session = $qry['session'];
$studentName = $qry['studentName'];
$fatherName = $qry['fatherName'];
$class = $qry['class'];
$section = $qry['section'];
$totalFee = $qry['totalFee'];
$mode_of_payment = $qry['mode_of_payment'];
$instituteId = $qry['instituteId'];

$inster_ne_fe = mysqli_query($con,"insert into new_admission_collection (instituteId,dates,familyId,roll_num,class,section,session,image,studentName,fatherName,admission_fee,annual_fund,books,unifrom,stationary,others,totalAmount,receive_amount,balance_amuont,total_collect_fee,month) values('$instu_id','$dt','$user_id','$rol_noe','$clesed','$sectned','$sesined','$imgeed','$snameed','$fnameed','$admisn_fee','$anual_fnd','$book','$unifrm','$statonry','$othars','$totlFeesed','$recvdeded','$remgFeesed','$recvFeesed','$mnt')");

$inst_chlns = mysqli_query($con,"insert into fee_collection(student_imgs,familyId,rollno,session,student_name,father_name,class,section,monthly_fee,previous_balance,discounts,fine,total_amount,receive_monthly,remaing_balance,fees_status,month,challan_status,instituteId,remarks,dates,receive_date)values('$frmimage','$familyId','$roll_num','$session','$studentName','$fatherName','$class','$section','$totalFee','0','0','0','0','$recvdeded','$remgFeesed','paid','$mnt','$mode_of_payment','$instituteId','New Admission Charges','$dt','$dt')");

$inst_daybook = mysqli_query($con,"insert into dayBook(user_name,image,user_id,institute_id,class,section,account_type,narration,income,expense,session,month,date)values('$snameed','$imgeed','$rol_noe','$instu_id','$class','$section','Fee Collection','New Admission Collection','$recvdeded','0','$sesined','$mnt','$dt')");

if($inster_ne_fe === true && $inst_daybook === true && $inst_chlns === true){ echo 1; }else{ echo 0; }

?>