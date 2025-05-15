<?php
require_once("../functions/db.php");

$asbj=1; 

$institue_sbjtid = $_POST['institue_sbjtid'];

$sl_sbjting = mysqli_query($con,"select * from addSubjects where institute_id='$institue_sbjtid' order by id desc limit 0,4");
$final_subjt = "";
if(mysqli_num_rows($sl_sbjting)>0){
    $final_subjt = "<table class='table table-responsive w-100'>
    <tr class='bg-apna'><th>Sr#</td><th>Class</th><th>Subject</th></tr>";
    while($asbj <= 1000000 && $resltsubjt = mysqli_fetch_array($sl_sbjting)){
        $institute_id = $resltsubjt['institute_id'];
        $subject_name = $resltsubjt['subject_name'];
        $classid = $resltsubjt['classid'];
$sl_clasid = mysqli_query($con,"select * from addClass where institute_id='$institue_sbjtid' && id='$classid'");
$clsidfetch = mysqli_fetch_assoc($sl_clasid);
$class_name = $clsidfetch['class_name'];
        
$final_subjt .= "<tr style='background:hsl(35, 100%, 80%);'><td style='border:1px solid hsl(25, 100%, 50%);'>".$asbj++."</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$class_name</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$subject_name</td></tr>";
    }
$final_subjt .= "</table>";

mysqli_close($con);
echo $final_subjt;
}else{
    echo "<div class='alert alert-danger text-capitalize'>record not found</div>";
}
?>