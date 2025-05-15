<?php
require_once("../functions/db.php");

$schol_id = $_POST['schol_id'];
$ad_date = $_POST['ad_date'];
$registrn = $_POST['registrn'];
$rol_numbr = $_POST['rol_numbr'];

$class_one = $_POST['class_one'];

$sectin_one = $_POST['sectin_one'];

$aply_sesions = $_POST['aply_sesions'];
$st_imge = $_POST['st_imge'];
$stu_name = $_POST['stu_name'];
$bay_form = $_POST['bay_form'];
$aply_genders = $_POST['aply_genders'];
$date_birth = $_POST['date_birth'];
$relign = $_POST['relign'];
$cel = $_POST['cel'];
$crnt_addres = $_POST['crnt_addres'];
$cities = $_POST['cities'];
$distrct = $_POST['distrct'];
$twons = $_POST['twons'];
$fathr_name = $_POST['fathr_name'];
$cnics = $_POST['cnics'];
$fathr_pnone = $_POST['fathr_pnone'];
$home_contct = $_POST['home_contct'];
$occupatn = $_POST['occupatn'];
$qualifictn = $_POST['qualifictn'];
$refernces = $_POST['refernces'];
$month_feone = $_POST['month_feone'];
$discount_one = $_POST['discount_one'];
if(!empty($_POST['discntfe_one'])){ $discntfe_one = $_POST['discntfe_one']; }else{ $discntfe_one = "0"; }
$st_source = $_POST['st_source'];


$duplict = mysqli_query($con,"select * from addStudents where instituteId='$schol_id' && roll_num='$rol_numbr'");
if(mysqli_num_rows($duplict)>0){
    echo 11;
}else{
$insrt_comp = mysqli_query($con,"insert into addStudents(instituteId,admissionDate,familyId,roll_num,class,section,session,image,studentName,bForm,gender,dateOfBirth,religion,phone,homeAddress,city,district,town,fatherName,cnic,cell,whatsapp,occupation,qualification,remarks,monthlyFee,discount,totalFee,admissionFee,annualFund,books,uniform,stationary,others,totalAmount,mode_of_payment)values('$schol_id','$ad_date','$registrn','$rol_numbr','$class_one','$sectin_one','$aply_sesions','$st_imge','$stu_name','$bay_form','$aply_genders','$date_birth','$relign','$cel','$crnt_addres','$cities','$distrct','$twons','$fathr_name','$cnics','$fathr_pnone','$home_contct','$occupatn','$qualifictn','$refernces','$month_feone','$discount_one','$discntfe_one','0','0','0','0','0','0','$discntfe_one','$st_source')");
    
    if($insrt_comp == true){ echo 1;}else{ echo 0; }
}
?>