<?php
require_once("../functions/db.php");

$sch_cdes = $_POST['sch_cdes'];
$amnt_nme = $_POST['amnt_nme'];

$sl_chrgnm = mysqli_query($con,"select * from addOtherChargesDecieded where instituteId='$sch_cdes' && id='$amnt_nme'");
if(mysqli_num_rows($sl_chrgnm)>0){
    while($rt = mysqli_fetch_array($sl_chrgnm)){
$charges_amount = $rt['charges_amount'];
$fled = "<label class='text-capitalize text-black fw-bold'>amount</label><input class='form-control chrgnme1' value='$charges_amount' type='text' onkeypress='isInputNumber(event)'>";
    }
echo $fled;
}else{ echo "<label class='text-capitalize text-black fw-bold'>amount</label><input class='form-control chrgnme1' type='text' value='0'>"; }

?>