<?php
require_once("../functions/db.php");

 $frmeds = $_POST['frmeds'];
 $mntheds = $_POST['mntheds'];
 $rcveds = $_POST['rcveds'];
 $bleds = $_POST['bleds'];
 if(!empty($_POST['staused'])){ $staused = $_POST['staused']; }else{ $staused = $_POST['ststolded']; }
 

$updt_cheg = mysqli_query($con,"update schoolCollection set received='$rcveds',balance='$bleds',status='$staused' where id='$frmeds'");
if($updt_cheg == true){ echo 1; }else{ echo 0; }
?>