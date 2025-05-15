<?php
require_once("../functions/db.php");

$acls=1; 

$sectn_colge_code = $_POST['sectn_colge_code'];

$sl_claseing = mysqli_query($con,"select * from addSection where institute_id='$sectn_colge_code' order by id desc limit 0,4");
$finals = "";
if(mysqli_num_rows($sl_claseing)>0){
    $finals = "<table class='table table-responsive w-100'>
    <tr class='bg-apna'><th>Sr#</td><th>Class</th><th>Section</th><th>Strength</th></tr>";
    while($acls <= 1000000 && $resltsectn = mysqli_fetch_array($sl_claseing)){
        $class = $resltsectn['class'];
        $section_name = $resltsectn['section_name'];
        $strength = $resltsectn['strength'];

$sl_clsnme = mysqli_query($con,"select * from addClass where institute_id='$sectn_colge_code' && id='$class'");
$rst = mysqli_fetch_assoc($sl_clsnme);
$class_name = $rst['class_name'];

$finals .= "<tr style='background:hsl(35, 100%, 80%);'><td style='border:1px solid hsl(25, 100%, 50%);'>".$acls++."</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$class_name</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$section_name</td><td style='border:1px solid hsl(25, 100%, 50%);'>$strength</td></tr>";
    }
$finals .= "</table>";

mysqli_close($con);
echo $finals;
}else{
    echo "<div class='alert alert-danger text-capitalize'>record not found</div>";
}
?>