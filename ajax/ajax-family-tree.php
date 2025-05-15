<?php
require_once("../functions/db.php");

$instfs = $_POST['instfs'];
$fmlys = $_POST['fmlys'];
$sesnfs = $_POST['sesnfs'];
$fm = 1;
$folish = "";
$sl_fmly = mysqli_query($con,"select * from addStudents where instituteId='$instfs' && familyId='$fmlys' && session='$sesnfs'");
$folish = "<table class='table table-responsive table-striped w-100 bg-white'><tr align='center' style='background-color:hsla(120,100%,50%,0.2);'><th colspan='7' style='padding:2px;'><h6 class='fs-6 fw-bold text-uppercase'>family tree</h6></th></tr><tr><th style='font-size:0.8rem;padding:2px;'>Sr#</th><th style='font-size:0.8rem;padding:2px;'>Image</th><th style='font-size:0.8rem;padding:2px;'>Name</th><th style='font-size:0.8rem;padding:2px;'>Class</th><th style='font-size:0.8rem;padding:2px;'>Section</th><th style='font-size:0.8rem;padding:2px;'>Session</th><th style='font-size:0.8rem;padding:2px;'>Fee</th></tr>";
if(mysqli_num_rows($sl_fmly)>0){
    while($fm <= 100000 && $rslt = mysqli_fetch_array($sl_fmly)){
        
        if(!empty($rslt['image'])){ $fmsimage = $rslt['image']; }else{ $fmsimage = "users.jpg"; }
        $studentName = $rslt['studentName'];
        $class = $rslt['class'];
        $section = $rslt['section'];
        $session = $rslt['session'];
        $totalFee = $rslt['totalFee'];
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instfs' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$folish .= "<tr><td style='font-size:0.8rem;padding:2px;'>".$fm++."</td><td style='font-size:0.8rem;padding:2px;' width='10'><img src='student_imgs/".$fmsimage."' class='img-fluid'></td><td style='font-size:0.8rem;padding:2px;' class='text-capitalize'>".$studentName."</td><td style='font-size:0.8rem;padding:2px;' class='text-uppercase'>".$class_name."</td><td style='font-size:0.8rem;padding:2px;' class='text-uppercase'>".$section."</td><td style='font-size:0.8rem;padding:2px;'>".$session."</td><td style='font-size:0.8rem;padding:2px;'>".$totalFee."</td></tr>";
    }
$folish .= "</table>";

mysqli_close($con);
echo $folish;    
}else{ echo "<div class='alert alert-danger text-capitalize'>there are no record found!</div>"; }

?>