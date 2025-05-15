<?php
require_once("../functions/db.php");

$colIdsfmly = $_POST['colIdsfmly'];
$adDtefmly = $_POST['adDtefmly'];
$fmyIDfmly = $_POST['fmyIDfmly'];
$rolNmbrfmly = $_POST['rolNmbrfmly'];
$clsffmly = $_POST['clsffmly'];
$stRngsfmly = $_POST['stRngsfmly'];
$mdumfmly = $_POST['mdumfmly'];
$sesnsfmly = $_POST['sesnsfmly'];
$fileNmefmly = $_POST['fileNmefmly'];
$sNmefmly = $_POST['sNmefmly'];
$bfrmfmly = $_POST['bfrmfmly'];
$gnDerfmly = $_POST['gnDerfmly'];
$dofbthfmly = $_POST['dofbthfmly'];
$rlgnsfmly = $_POST['rlgnsfmly'];
$phnesfmly = $_POST['phnesfmly'];
$lvngfmly = $_POST['lvngfmly'];
$hadresfmly = $_POST['hadresfmly'];
$ctisfmly = $_POST['ctisfmly'];
$distcfmly = $_POST['distcfmly'];
$twnfmly = $_POST['twnfmly'];
$fnmefmly = $_POST['fnmefmly'];
$cncnofmly = $_POST['cncnofmly'];
$selsfmly = $_POST['selsfmly'];
$whtsapfmly = $_POST['whtsapfmly'];
$ocptnfmly = $_POST['ocptnfmly'];
$qulfmly = $_POST['qulfmly'];
$fbActfmly = $_POST['fbActfmly'];
$gmlActfmly = $_POST['gmlActfmly'];
if(!empty($_POST['mothFeefmly'])){ $mothFeefmly = $_POST['mothFeefmly']; }else{ $mothFeefmly = "0";}
if(!empty($_POST['Discntfmly'])){ $Discntfmly = $_POST['Discntfmly']; }else{ $Discntfmly = "0";}
if(!empty($_POST['paidFeefmly'])){ $paidFeefmly = $_POST['paidFeefmly']; }else{ $paidFeefmly = "0";}
if(!empty($_POST['admFeefmly'])){ $admFeefmly = $_POST['admFeefmly']; }else{ $admFeefmly = "0";}
if(!empty($_POST['anulFeefmly'])){ $anulFeefmly = $_POST['anulFeefmly']; }else{ $anulFeefmly = "0";}
if(!empty($_POST['bokesfmly'])){ $bokesfmly = $_POST['bokesfmly']; }else{ $bokesfmly = "0";}
if(!empty($_POST['unfremfmly'])){ $unfremfmly = $_POST['unfremfmly']; }else{ $unfremfmly = "0";}
if(!empty($_POST['Stnoryfmly'])){ $Stnoryfmly = $_POST['Stnoryfmly']; }else{ $Stnoryfmly = "0";}
if(!empty($_POST['othorsfmly'])){ $othorsfmly = $_POST['othorsfmly']; }else{ $othorsfmly = "0";}
if(!empty($_POST['OthrTotlfmly'])){ $OthrTotlfmly = $_POST['OthrTotlfmly']; }else{ $OthrTotlfmly = "0";}



$inst_sbling_frm = mysqli_query($con,"insert into addStudents (instituteId,admissionDate,familyId,roll_num,class,section,medium,session,image,studentName,bForm,gender,dateOfBirth,religion,phone,living,homeAddress,city,district,town,fatherName,cnic,cell,whatsapp,occupation,qualification,facebook,gmail,monthlyFee,discount,totalFee,admissionFee,annualFund,books,uniform,stationary,others,totalAmount) values ('$colIdsfmly','$adDtefmly','$fmyIDfmly','$rolNmbrfmly','$clsffmly','$stRngsfmly','$mdumfmly','$sesnsfmly','$fileNmefmly','$sNmefmly','$bfrmfmly','$gnDerfmly','$dofbthfmly','$rlgnsfmly','$phnesfmly','$lvngfmly','$hadresfmly','$ctisfmly','$distcfmly','$twnfmly','$fnmefmly','$cncnofmly','$selsfmly','$whtsapfmly','$ocptnfmly','$qulfmly','$fbActfmly','$gmlActfmly','$mothFeefmly','$Discntfmly','$paidFeefmly','$admFeefmly','$anulFeefmly','$bokesfmly','$unfremfmly','$Stnoryfmly','$othorsfmly','$OthrTotlfmly')");

if($inst_sbling_frm){ echo 1; }else{ echo 0; }
    
   
   
?>