<?php
require_once("../functions/db.php");

$asesn=1; 

$instut_ids = $_POST['instut_ids'];

$sl_sessn = mysqli_query($con,"select * from accounts_type where instituteId='$instut_ids' order by id desc limit 0,2");
$final_session = "";
if(mysqli_num_rows($sl_sessn)>0){
    $final_session = "<table class='table table-responsive table-striped w-100'>
    <tr class='bg-apna'><th>Sr#</td><th>Type</th><th>Action</th></tr>";
    while($asesn <= 1000000 && $resltsesn = mysqli_fetch_array($sl_sessn)){
        $id = $resltsesn['id'];
        $type_name = $resltsesn['type_name'];
        
$final_session .= "<tr style='background:hsl(35, 100%, 80%);'><td style='border:1px solid hsl(25, 100%, 50%);'>".$asesn++."</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$type_name</td><td style='border:1px solid hsl(25, 100%, 50%);'><a href='account-del?id=".$id."'><i class='fa fa-trash-alt text-danger'></i></a></td></tr>";
    }
$final_session .= "</table>";

mysqli_close($con);
echo $final_session;
}else{
    echo "<div class='alert alert-danger text-capitalize'>record not found</div>";
}
?>