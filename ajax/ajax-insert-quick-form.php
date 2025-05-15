<?php
require_once("../functions/db.php");

 $insti_id = $_POST['insti_id'];
 $ad_date = date("j-m-Y");
 $student_id = $_POST['student_id'];
 $roll_no = $_POST['roll_no'];
 $aply_cls = strtolower(mysqli_real_escape_string($con,$_POST['aply_cls']));
 $cls_section = strtolower(mysqli_real_escape_string($con,$_POST['cls_section']));
 $medim = strtolower(mysqli_real_escape_string($con,$_POST['medim']));
 $schol_sesn = $_POST['schol_sesn'];
 $stimeges = $_POST['stimeg'];
 $user_names = strtolower(mysqli_real_escape_string($con,$_POST['user_names']));
 $bayfrm = $_POST['bayfrm'];
 $gynder = strtolower(mysqli_real_escape_string($con,$_POST['gynder']));
$date_of_birth = $_POST['date_of_birth'];
 $adres = strtolower(mysqli_real_escape_string($con,$_POST['adres']));
 $father_name = strtolower(mysqli_real_escape_string($con,$_POST['father_name']));
$contact = $_POST['contact'];
$remrks = strtolower(mysqli_real_escape_string($con,$_POST['remrks']));

if(!empty($_POST['fnal_fe'])){ $fnal_month_fee = $_POST['fnal_fe']; }else{ $fnal_month_fee = "0"; }
if(!empty($_POST['fe_disc'])){ $fe_disc = $_POST['fe_disc']; }else{ $fe_disc = "0"; }
if(!empty($_POST['rem_fee'])){ $rem_fee = $_POST['rem_fee']; }else{ $rem_fee = "0"; }
if(!empty($_POST['carg_one'])){ $carg_one = $_POST['carg_one']; }else{ $carg_one = "0"; }
if(!empty($_POST['carg_two'])){ $carg_two = $_POST['carg_two']; }else{ $carg_two = "0"; }
if(!empty($_POST['carg_three'])){ $carg_three = $_POST['carg_three']; }else{ $carg_three = "0"; }
if(!empty($_POST['carg_four'])){ $carg_four = $_POST['carg_four']; }else{ $carg_four = "0"; }
if(!empty($_POST['carge_five'])){ $carge_five = $_POST['carge_five']; }else{ $carge_five = "0"; }
if(!empty($_POST['carg_six'])){ $carg_six = $_POST['carg_six']; }else{ $carg_six = "0"; }
if(!empty($_POST['totl_amnt'])){ $totl_amnt = $_POST['totl_amnt']; }else{ $totl_amnt = "0"; }
$py_mods = $_POST['py_mods'];
$mnts = date("m");

$sel_schol = mysqli_query($con,"select * from confirmSchools where institute_id='$insti_id'");
$reslts = mysqli_fetch_assoc($sel_schol);
$strength = $reslts['strength'];

$block_stregth = mysqli_query($con,"select * from addStudents where instituteId='$insti_id'");
$num_strght = mysqli_num_rows($block_stregth);
if($num_strght < $strength){
//    $duplicate = mysqli_query($con,"select * from addStudents where instituteId='$insti_id' && cell='$contact' && session='$schol_sesn' && studentName='$user_names' && class='$aply_cls' && section='$cls_section'");

$inst_quck_frm = mysqli_query($con,"insert into addStudents (instituteId,admissionDate,familyId,roll_num,class,section,medium,session,image,studentName,bForm,gender,dateOfBirth,homeAddress,fatherName,cell,remarks,monthlyFee,discount,totalFee,admissionFee,annualFund,books,uniform,stationary,others,totalAmount,previous_session_fee,mode_of_payment) values ('$insti_id','$ad_date','$student_id','$roll_no','$aply_cls','$cls_section','$medim','$schol_sesn','$stimeges','$user_names','$bayfrm','$gynder','$date_of_birth','$adres','$father_name','$contact','$remrks','$fnal_month_fee','$fe_disc','$rem_fee','$carg_one','$carg_two','$carg_three','$carg_four','$carge_five','$carg_six','$totl_amnt','0','$py_mods')");



/*
if(mysqli_num_rows($duplicate)>0){
echo 11;
}else{
    
 $inst_quck_frm = mysqli_query($con,"insert into addStudents (instituteId,admissionDate,familyId,roll_num,class,section,medium,session,image,studentName,bForm,gender,dateOfBirth,homeAddress,fatherName,cell,remarks,monthlyFee,discount,totalFee,admissionFee,annualFund,books,uniform,stationary,others,totalAmount,previous_session_fee,mode_of_payment) values ('$insti_id','$ad_date','$student_id','$roll_no','$aply_cls','$cls_section','$medim','$schol_sesn','$stimeges','$user_names','$bayfrm','$gynder','$date_of_birth','$adres','$father_name','$contact','$remrks','$fnal_month_fee','$fe_disc','$rem_fee','$carg_one','$carg_two','$carg_three','$carg_four','$carge_five','$carg_six','$totl_amnt','0','$py_mods')");
 
 $inst_lmsprtl = mysqli_query($con,"insert into studentPortal (instituteId,admissionDate,familyId,roll_num,class,section,medium,session,image,studentName,bForm,gender,dateOfBirth,homeAddress,fatherName,cell,remarks,monthlyFee,discount,totalFee,admissionFee,annualFund,books,uniform,stationary,others,totalAmount,previous_session_fee,mode_of_payment) values ('$insti_id','$ad_date','$student_id','$roll_no','$aply_cls','$cls_section','$medim','$schol_sesn','$stimeges','$user_names','$bayfrm','$gynder','$date_of_birth','$adres','$father_name','$contact','$remrks','$fnal_month_fee','$fe_disc','$rem_fee','$carg_one','$carg_two','$carg_three','$carg_four','$carge_five','$carg_six','$totl_amnt','0','$py_mods')");

    }
*/
if($inst_quck_frm === true){ echo 1; }else{ echo 0; }
}else{
    echo 101;
}
?>