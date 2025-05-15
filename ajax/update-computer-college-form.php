<?php
require_once("../functions/db.php");

if(!empty($_POST['ad_date'])){ $ad_date = $_POST['ad_date']; }else{ $ad_date = $_POST['admisn_datold']; }
$registrn = $_POST['registrn'];
$rol_numbr = $_POST['rol_numbr'];
$class_one = $_POST['class_one'];
$sectin_one = $_POST['sectin_one'];
$aply_sesions = $_POST['aply_sesions'];
if(!empty($_POST['st_imge'])){ $st_imge = $_POST['st_imge']; }else{ $st_imge = $_POST['st_oldimg']; }
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
$stu_id = $_POST['stu_id'];

$insrt_comp = mysqli_query($con,"UPDATE addStudents SET admissionDate='$ad_date',familyId='$registrn',roll_num='$rol_numbr',class='$class_one',section='$sectin_one',session='$aply_sesions',image='$st_imge',studentName='$stu_name',bForm='$bay_form',gender='$aply_genders',dateOfBirth='$date_birth',religion='$relign',phone='$cel',homeAddress='$crnt_addres',city='$cities',district='$distrct',town='$twons',fatherName='$fathr_name',cnic='$cnics',cell='$fathr_pnone',whatsapp='$home_contct',occupation='$occupatn',qualification='$qualifictn',remarks='$refernces',monthlyFee='$month_feone',discount='$discount_one',totalFee='$discntfe_one',mode_of_payment='$st_source' where id='$stu_id'");
if($insrt_comp == true){ echo 1;}else{ echo 0; }
?>