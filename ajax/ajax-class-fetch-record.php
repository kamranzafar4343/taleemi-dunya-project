<?php
require_once("../functions/db.php");

$acls=1; 

$colgcod = $_POST['colgcod'];

$sl_claseing = mysqli_query($con,"select * from addClass where institute_id='$colgcod' order by id desc limit 0,4");
$outputs = "";
if(mysqli_num_rows($sl_claseing)>0){
    $outputs = "<table class='table table-responsive w-100'>
    <tr class='bg-apna'><th>Sr#</td><th>Class</th><th>Duration</th></tr>";
    while($acls <= 1000000 && $resltcls = mysqli_fetch_array($sl_claseing)){
        $class_name = $resltcls['class_name'];
        $duration = $resltcls['duration'];
        
$outputs .= "<tr style='background:hsl(35, 100%, 80%);'><td style='border:1px solid hsl(25, 100%, 50%);'>".$acls++."</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$class_name</td><td class='text-capitalize' style='border:1px solid hsl(25, 100%, 50%);'>$duration</td></tr>";
    }
$outputs .= "</table>";

mysqli_close($con);
echo $outputs;
}else{
    echo "<div class='alert alert-danger text-capitalize'>record not found</div>";
}
?>