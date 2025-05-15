<?php
require_once("../functions/db.php");
$vn_nams = $_POST['vn_nams'];
$inst_ids = $_POST['inst_ids'];
$ac = 1;
$sl_vnfr = mysqli_query($con,"select * from vendorAccount where instituteId LIKE '%$inst_ids%' && vname LIKE '%$vn_nams%'");
if(mysqli_num_rows($sl_vnfr)){
?>
<table class="table table-responsive table-striped w-100" style="background-color:hsla(60,100%,60%,0.3);">
<?php
    while($ac <= 10000 && $srch = mysqli_fetch_array($sl_vnfr)){
$ides = $srch['id'];
$dates = $srch['dates'];
$frmt = explode("-",$dates);
$dt = $frmt['2'];
$mnt = $frmt['1'];
$yr = $frmt['0'];
$fldte = $dt."-".$mnt."-".$yr;
$vids = $srch['vids'];
$type = $srch['type'];
$business_type = $srch['business_type'];
$items = $srch['items'];
$vname = $srch['vname'];
$contacts = $srch['contacts'];
?>
<tr>
    <th style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><?php echo $ac++; ?></th>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" width="90"><?php echo $fldte; ?></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><?php echo $vids; ?></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $type; ?></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $business_type; ?></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $items; ?></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $vname; ?></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><?php echo $contacts; ?></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" align="center"><a href="vendor-whatsapp?id=<?php echo $ides; ?>"><i class="fa-brands fa-whatsapp text-success"></i></a></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" align="center"><a href="vendor-deed?id=<?php echo $ides; ?>"><i class="fa-regular fa-handshake text-danger"></i></a></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" align="center"><a href="vendor-card?id=<?php echo $ides; ?>"><i class="fa-regular fa-address-card" style="color:hsl(110,100%,40%);"></i></a></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" align="center"><a href="vendor-black-list?id=<?php echo $ides; ?>"><i class="fa-solid fa-ban text-black"></i></a></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" align="center"><a href="vendor-edit?id=<?php echo $ides; ?>"><i class="fa fa-edit text-success"></i></a></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" align="center"><a href="vendor-del?id=<?php echo $ides; ?>"><i class="fa fa-trash-alt text-danger"></i></a></td>
</tr>
<?php  } ?>
</table>
<?php
}else{ echo "<div class='text-capitalize'>there are no record found!</div>"; }

?>