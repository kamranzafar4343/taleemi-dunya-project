<?php
require_once("../functions/db.php");

$asesn=1; 

$codesclgesesn = $_POST['codesclgesesn'];

$sl_sessn = mysqli_query($con,"select * from addSession where institute_id='$codesclgesesn' order by id desc limit 0,4");
$final_session = "";
if(mysqli_num_rows($sl_sessn)>0){
    $final_session = "<table class='table table-responsive w-100'>
    <tr class='bg-apna'><th style='border:1px solid hsl(25, 100%, 50%);'>Sr#</th><th style='border:1px solid hsl(25, 100%, 50%);'>Session</th><th style='border:1px solid hsl(25, 100%, 50%);'>Starting Date</th><th style='border:1px solid hsl(25, 100%, 50%);'>Ending Date</th></tr>";
    while($asesn <= 1000000 && $resltsesn = mysqli_fetch_array($sl_sessn)){
        $session = $resltsesn['session'];
        $starting_date = $resltsesn['starting_date'];
        $frmt = explode("-",$starting_date);
        $dte = $frmt['2']; $mnth = $frmt['1']; $yres = $frmt['0'];
        $stdte = $dte."-".$mnth."-".$yres;
        $ending_date = $resltsesn['ending_date'];
        $frmts = explode("-",$ending_date);
        $dtes = $frmts['2']; $mnths = $frmts['1']; $yre = $frmts['0'];
        $endte = $dtes."-".$mnths."-".$yre;
        
$final_session .= "<tr style='background:hsl(35, 100%, 80%);'><td style='border:1px solid hsl(25, 100%, 50%);'>".$asesn++."</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$session</td><td style='border:1px solid hsl(25, 100%, 50%);'>".$stdte."</td><td style='border:1px solid hsl(25, 100%, 50%);'>".$endte."</td></tr>";
    }
$final_session .= "</table>";

mysqli_close($con);
echo $final_session;
}else{
    echo "<div class='alert alert-danger text-capitalize'>record not found</div>";
}
?>