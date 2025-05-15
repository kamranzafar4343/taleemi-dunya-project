<?php
require_once("../functions/db.php");

$apli_cls = $_POST['apli_cls'];
$sectns = $_POST['sectns'];
$inst_id = $_POST['inst_id'];
$aply_sesion = $_POST['aply_sesion'];
$aply_trms = $_POST['aply_trms'];


$rt=1;
$ranks=1;

$schols = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_id'");
$sel_schol = mysqli_fetch_assoc($schols);
$institute_name = $sel_schol['institute_name'];
$campus = $sel_schol['campus'];
$logo = $sel_schol['logo'];

$sel_trms = mysqli_query($con,"select * from addTerms where instituteId='$inst_id' && termid='$aply_trms'");
$feth = mysqli_fetch_assoc($sel_trms);
$term = $feth['term'];


$sel_mxvle = mysqli_query($con,"select * from finalResults where class='$apli_cls' && section='$sectns' && session='$aply_sesion' && term='$aply_trms' && instituteId='$inst_id'");
$max_values = array();
    while($reslts = mysqli_fetch_array($sel_mxvle)){
        $max_values[] = $reslts['overall_obtained'];
}

rsort($max_values);

$arrlength = count($max_values);
$rank = 1;
$prev_rank = $rank;

$sel_exme = mysqli_query($con,"select * from finalResults where class='$apli_cls' && section='$sectns' && session='$aply_sesion' && term='$aply_trms' && instituteId='$inst_id' group by student_name");
if(mysqli_num_rows($sel_exme)>0){
?>
<table class='w-100' style='background:hsl(35, 100%, 80%);'><thead>
    <tr>
        <th width="70"><img src="../portal-admins/institute-logos/<?php echo $logo; ?>" class="img-fluid"></th>
        <th colspan="11">
            <h1 class="text-center text-uppercase fs-1 fw-bold"><?php echo $institute_name; ?></h1>
            <div class="text-center text-uppercase"><?php echo $campus; ?></div>
        </th>
    </tr>
    <tr>
        <th colspan="12">
            <div class="text-capitalize text-center">
                <span class="text-decoration-underline fs-4 fw-bold">Position List <?php echo $term; ?></span>
            </div>
        </th>
    </tr>
    <tr class="bg-apna">
        <th class="border-apna">Sr#</th>
        <th class="border-apna">Positions</th>
    </tr></thead><tbody>
<?php
for($x = 0; $x < $arrlength; $x++) {
?>
<tr>
    <td class="border-apna"><?php echo $rt++; ?></td>
    <td class="border-apna">
<?php

    if ($x==0) {
         echo "Obtain Marks ".$max_values[$x]."- Position".($rank);
    }

   elseif ($max_values[$x] != $max_values[$x-1]) {
        $rank++;
        $prev_rank = $rank;
        echo "Obtain Marks ".$max_values[$x]."- Position".($rank);
   }

   else{
        $rank++;
        echo "Obtain Marks ".$max_values[$x]."- Position".($prev_rank);
    }

   echo "<br>";
?>
    </td>
</tr>
<?php
    }
?>
</tbody></table>
<?php }else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; } ?>