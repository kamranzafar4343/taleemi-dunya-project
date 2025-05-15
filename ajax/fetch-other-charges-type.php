<?php
require_once("../functions/db.php");

$chrg_nme = $_POST['chrg_nme'];
$int_ieds = $_POST['int_ieds'];

$sel_chrges = mysqli_query($con,"select * from addOtherChargesDecieded where id='$chrg_nme'");
if(mysqli_num_rows($sel_chrges)){
    while($relts = mysqli_fetch_array($sel_chrges)){
$ids = $relts['id'];
$types = $relts['type'];
 echo "<option class='text-capitalize'>$types</option>";
    }
}else{ echo "<option value=''>There are no Record Found!</option>"; }

?>