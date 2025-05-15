<?php
require_once("../functions/db.php");

$inst_ids = $_POST['inst_ids'];
$trms = $_POST['trms'];
$aply_clas = $_POST['aply_clas'];
$sectn = $_POST['sectn'];
$aply_sesin = $_POST['aply_sesin'];
$moth = $_POST['moth'];

$sl_trms = mysqli_query($con,"select * from results where instituteId='$inst_ids' && terms='$trms' && class='$aply_clas' && section='$sectn' && session='$aply_sesin' group by terms");
if(mysqli_num_rows($sl_trms)>0){
$frm = "<div class='row'>";
    while($torms = mysqli_fetch_array($sl_trms)){
$class = $torms['class'];
$section = $torms['section'];
$session = $torms['session'];
$terms = $torms['terms'];
$instituteId = $torms['instituteId'];
$months = $torms['months'];
$resultId = $torms['resultId'];

$monthName = date('F', mktime(0, 0, 0, $months, 10));

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$sl_trms = mysqli_query($con,"select * from addTerms where instituteId='$inst_ids' && termid='$terms'");
$tm = mysqli_fetch_assoc($sl_trms);
$term = $tm['term'];

$frm .= "<div class='col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3'>
<div class='card text-center'>
    <a href='exame-award-list?cles=$class && sectn=$section && sesin=$session && trm=$terms && insti=$instituteId && mths=$months && rstid=$resultId' target='_blank' class='nav-links text-uppercase bg-white p-3 px-4' style='font-size:2rem;'>
<div class='text-secondary text-center' style='font-size:0.9rem;'>$monthName</div>
$term
<div class='text-secondary text-center' style='font-size:0.9rem;'>$class_name ($section)</div>
    </a>
</div>
</div>";
    }
$frm .= "</div>";
echo $frm;     
}else{ echo "<div class='alert alert-danger text-capitalize'>there are exame no found!</div>"; }
?>