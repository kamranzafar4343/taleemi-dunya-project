<?php
require_once("../functions/db.php");

$instute_id = $_POST['instute_id'];
$term_ids = $_POST['term_ids'];
$sesions_term = $_POST['sesions_term'];
$term_titles = mysqli_real_escape_string($con,$_POST['term_titles']);



$duplicate = mysqli_query($con,"select * from addTerms where instituteId='$instute_id' && term='$term_titles' && session='$sesions_term'");
if(mysqli_num_rows($duplicate)>0){
    
}else{ 
 $inst_trms = mysqli_query($con,"insert into addTerms (termid,term,instituteId,session) values ('$term_ids','$term_titles','$instute_id','$sesions_term')");
 if($inst_trms){ echo 1; }else{ echo 0; }
    }

?>