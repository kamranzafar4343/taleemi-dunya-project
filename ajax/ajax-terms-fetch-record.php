<?php
require_once("../functions/db.php");

$smst=1; 

$colgecodesmster = $_POST['colgecodesmster'];

$sl_terms = mysqli_query($con,"select * from addTerms where instituteId='$colgecodesmster' order by id desc limit 0,4");
$final_terms = "";
if(mysqli_num_rows($sl_terms)>0){
    $final_terms = "<table class='table table-responsive w-100'>
    <tr class='bg-apna'><th>Sr#</td><th>TermID#</th><th>Term</th><th>Session</th></tr>";
    while($smst <= 1000000 && $terms_reslt = mysqli_fetch_array($sl_terms)){
        $termid = $terms_reslt['termid'];
        $term = $terms_reslt['term'];
        $session = $terms_reslt['session'];
        
$final_terms .= "<tr style='background:hsl(35, 100%, 80%);'><td style='border:1px solid hsl(25, 100%, 50%);'>".$smst++."</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$termid</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$term</td><td style='border:1px solid hsl(25, 100%, 50%);'>$session</td></tr>";
    }
$final_terms .= "</table>";

mysqli_close($con);
echo $final_terms;
}else{
    echo "<div class='alert alert-danger text-capitalize'>record not found</div>";
}
?>