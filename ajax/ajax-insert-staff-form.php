<?php
require_once("../functions/db.php");


    $instiidys = $_POST['instiidys'];
    $stfidys = $_POST['stfidys'];
    $jongdteys = $_POST['jongdteys'];
    $pstys = $_POST['pstys'];
    $stftpeys = $_POST['stftpeys'];
    $mritlys = $_POST['mritlys'];
    $stnmeys = $_POST['stnmeys'];
    $gndrys = $_POST['gndrys'];
    $fthrnmeys = $_POST['fthrnmeys'];
    $cncys = $_POST['cncys'];
    $dobys = $_POST['dobys'];
    $phneys = $_POST['phneys'];
    $celys = $_POST['celys'];
    $subys = $_POST['subys'];
    $areays = $_POST['areays'];
    $quays = $_POST['quays'];
    $slryys = $_POST['slryys'];
    $tmeinys = $_POST['tmeinys'];
    $tmeoutys = $_POST['tmeoutys'];
    $fbacys = $_POST['fbacys'];
    $gmlays = $_POST['gmlays'];
    $sessn = $_POST['ap_sesions'];
    $imgsys = $_POST['imgsys'];
    $monthes = date("m");


 $duplicate = mysqli_query($con,"select * from addStaff where instituteId='$instiidys' && staffName='$stnmeys' && phone='$phneys'");
if(mysqli_num_rows($duplicate)>0){
echo 11;
}else{
    move_uploaded_file($imgstmp,$pathes);
$inst_stf = mysqli_query($con,"insert into addStaff (instituteId,staffId,joiningDate,appliedPost,staffType,maritalStatus,staffName,gender,fatherName,cnic,dob,phone,cell,subject,location,qualification,salary,timeIn,timeOut,facebookAcount,gmailAcount,session,staffimage,month) values ('$instiidys','$stfidys','$jongdteys','$pstys','$stftpeys','$mritlys','$stnmeys','$gndrys','$fthrnmeys','$cncys','$dobys','$phneys','$celys','$subys','$areays','$quays','$slryys','$tmeinys','$tmeoutys','$fbacys','$gmlays','$sessn','$imgsys','$monthes')");
if($inst_stf){ echo 1; }else{ echo 0; }
}   
    
?>