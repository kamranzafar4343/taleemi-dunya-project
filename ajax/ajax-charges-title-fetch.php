<?php
require_once("../functions/db.php");

$acls=1; 

$chrg_inst_code = $_POST['chrg_inst_code'];

$sl_claseing = mysqli_query($con,"select * from addChargesTitle where instituteId='$chrg_inst_code' order by id desc");
$outputs = "";
if(mysqli_num_rows($sl_claseing)>0){
    $outputs = "<table class='table table-responsive table-striped w-100'>
    <tr class='bg-apna'><th>Sr#</td><th>Charges1</th><th>Charges2</th><th>Charges3</th><th>Charges4</th><th>Charges5</th><th>Charges6</th><th>Action</th></tr>";
    while($acls <= 1000000 && $resltcls = mysqli_fetch_array($sl_claseing)){
        $id = $resltcls['id'];
        $charges1 = $resltcls['charges1'];
        $charges2 = $resltcls['charges2'];
        $charges3 = $resltcls['charges3'];
        $charges4 = $resltcls['charges4'];
        $charges5 = $resltcls['charges5'];
        $charges6 = $resltcls['charges6'];
        
$outputs .= "<tr style='background:hsl(35, 100%, 80%);'><td style='border:1px solid hsl(25, 100%, 50%);'>".$acls++."</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$charges1</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$charges2</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$charges3</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$charges4</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$charges5</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$charges6</td><td style='border:1px solid hsl(25, 100%, 50%);'><a href='del-charges-name?id=".$id."'><i class='fa fa-trash-alt text-danger'></i></a></td></tr>";
    }
$outputs .= "</table>";

mysqli_close($con);
echo $outputs;
}else{
    echo "<div class='alert alert-danger text-capitalize'>record not found</div>";
}
?>