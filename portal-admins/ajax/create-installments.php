<?php
require_once("../functions/db.php");

$institu_id = $_POST['institu_id'];
$joiing_dates = $_POST['joiing_dates'];
$expry_dtes = $_POST['expry_dtes'];
$acount_types = $_POST['acount_types'];
$tadaad = $_POST['tadaad'];
$mansooba = $_POST['mansooba'];
$schol_name = $_POST['schol_name'];
$khana = $_POST['khana'];
$qisam = $_POST['qisam'];
$malikkanam = $_POST['malikkanam'];
$usrnme = $_POST['usrnme'];
$rabta = $_POST['rabta'];
$tasveer = $_POST['tasveer'];
$tala = $_POST['tala'];
$kul_raqam = $_POST['kul_raqam'];
$mnth_name = $_POST["mnth_name"];
$expy_date = $_POST["expy_date"];
$mahana_raqam = $_POST["mahana_raqam"];
$yers = date("Y");

foreach($mnth_name as $key => $value){
    $instlmnts = mysqli_query($con,"insert into institute_collection(instituteId,joining_date,deactive_date,account_type,strength,plan,institute_name,campus,type,owner_name,emails,contact,logos,password,decieded_amount,months,expiry_dates,monthly_amounts,remaining_amount,receive_amount,balance,session,charges_date,fee_type)values('$institu_id','$joiing_dates','$expry_dtes','$acount_types','$tadaad','$mansooba','$schol_name','$khana','$qisam','$malikkanam','$usrnme','$rabta','$tasveer','$tala','$kul_raqam','$value','$expy_date[$key]','$mahana_raqam[$key]','0','0','0','$yers','','unpaid')");
        }
if($instlmnts == true){ echo 1; }else{ echo 0; }
?>