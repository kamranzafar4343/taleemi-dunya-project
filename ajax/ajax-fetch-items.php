<?php
require_once("../functions/db.php");

$instu_ids = $_POST['instu_ids'];
$abs = 1;
$sl_itm = mysqli_query($con,"select * from items where institute_id='$instu_ids' order by id desc");
$fuls = "";
if(mysqli_num_rows($sl_itm)){
$fuls = "<table class='table table-responsive table-striped w-100'><tr class='bg-apna' style='padding:0rem;font-size:0.8rem;border:1px solid hsl(25, 100%, 50%);' align='center'><th style='padding:0rem;font-size:0.8rem;border:1px solid hsl(25, 100%, 50%);'>SR#</th><th style='padding:0rem;font-size:0.8rem;border:1px solid hsl(25, 100%, 50%);'>Business Type</th><th style='padding:0rem;font-size:0.8rem;border:1px solid hsl(25, 100%, 50%);'>Business Item</th><th style='padding:0rem;font-size:0.8rem;border:1px solid hsl(25, 100%, 50%);'>DELETE</th></tr>";
    while($abs <= 100000 && $itms = mysqli_fetch_array($sl_itm)){

$ids = $itms['id'];
$business_type = $itms['business_type'];
$business_item = $itms['business_item'];

$fuls .= "<tr style='padding:0rem;font-size:0.8rem;border:1px solid hsl(25,100%,50%);background:hsl(35,100%,80%);' align='center'><td style='padding:0rem;font-size:0.8rem;border:1px solid hsl(25,100%,50%);'>".$abs++."</td><td class='text-capitalize' style='padding:0rem;font-size:0.8rem;border:1px solid hsl(25,100%,50%);' align='left'>".$business_type."</td><td class='text-capitalize' style='padding:0rem;font-size:0.8rem;border:1px solid hsl(25,100%,50%);' align='left'>".$business_item."</td><td style='padding:0rem;font-size:0.8rem;border:1px solid hsl(25,100%,50%);'><a href='item-del?id=".$ids."'><i class='fa-solid fa-trash-alt text-danger'></i></a></td></tr>";
    }
$fuls .= "</table>";
mysqli_close($con);
echo $fuls; 
}else{ echo "<div class='alert alert-danger text-capitalize'>there are no found record!</div>"; }
?>