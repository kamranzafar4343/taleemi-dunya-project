<?php
require_once("../functions/db.php");

$rc_chrg = $_POST['rc_chrg'];
$inst_idps = $_POST['inst_idps'];

$sel_chrges = mysqli_query($con,"select * from addOtherChargesDecieded where id='$rc_chrg'");
if(mysqli_num_rows($sel_chrges)){
    while($relts = mysqli_fetch_array($sel_chrges)){
$ids = $relts['id'];
$charges_amount = $relts['charges_amount'];
 echo "<option class='text-capitalize'>$charges_amount</option>";
    }
}else{ echo "<option value=''>There are no Record Found!</option>"; }

?>