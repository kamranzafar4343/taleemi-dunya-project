<?php
require_once("../functions/db.php");

$strt_dtes = $_POST['strt_dtes'];
$frmt = explode("-",$strt_dtes);
$dtes = $frmt['2'];
$mnths = $frmt['1'];
$monthName = date('F', mktime(0, 0, 0, $mnths, 10));
$yer = $frmt['0'];
$apldte = $dtes.",".$monthName."-".$yer;
$sesins = $_POST['sesins'];
$inst_id = $_POST['inst_id'];
$a=1;
$instids = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_id'");
$rslts = mysqli_fetch_assoc($instids);
$institute_name = $rslts['institute_name'];
$campus = $rslts['campus'];
$logo = $rslts['logo'];

$select_class = mysqli_query($con,"select * from addSection where institute_id='$inst_id'");
if(mysqli_num_rows($select_class)>0){
?>
<div class="row">
    <div class="col-12 mb-3">
<table class="w-100" style="background-color:hsl(35,100%,80%);">
    <tr>
        <th width="50">
<img class="img-fluid" src="portal-admins/institute-logos/<?php echo $logo; ?>">
        </th>
        <th colspan="8">
<h4 class="text-uppercase text-center fs-4 fw-bolder"><?php echo $institute_name; ?></h4>
<h6 class="text-uppercase text-center fs-6 fw-bold"><?php echo $campus; ?></h6>
        </th>
    </tr>
        <tr align="center">
        <th colspan="8">
<h6 class="text-capitalize text-center"><?php echo $apldte; ?> school roster</h6>
        </th>
    </tr>
    <tr class="bg-apna" align="center">
        <th style="border:1px solid hsl(0,0%,0%);">#</th>
        <th style="border:1px solid hsl(0,0%,0%);">Class</th>
        <th style="border:1px solid hsl(0,0%,0%);">Section</th>
        <th style="border:1px solid hsl(0,0%,0%);">Presents</th>
        <th style="border:1px solid hsl(0,0%,0%);">Absents</th>
        <th style="border:1px solid hsl(0,0%,0%);">Leaves</th>
        <th style="border:1px solid hsl(0,0%,0%);">Holidays</th>
    </tr>
<?php
    while($a <= 10000 && $result= mysqli_fetch_array($select_class)){
$class = $result['class'];
$section_name = $result['section_name'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_id' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$sel_attdp = mysqli_query($con,"select * from attandance where instituteId='$inst_id' && date='$strt_dtes' && class='$class' && section='$section_name' && status='P'");
$attp = mysqli_num_rows($sel_attdp);
$sel_attda = mysqli_query($con,"select * from attandance where instituteId='$inst_id' && date='$strt_dtes' && class='$class' && section='$section_name' && status='A'");
$atta = mysqli_num_rows($sel_attda);
$sel_attdl = mysqli_query($con,"select * from attandance where instituteId='$inst_id' && date='$strt_dtes' && class='$class' && section='$section_name' && status='L'");
$attl = mysqli_num_rows($sel_attdl);
$sel_attdh = mysqli_query($con,"select * from attandance where instituteId='$inst_id' && date='$strt_dtes' && class='$class' && section='$section_name' && status='H'");
$atth = mysqli_num_rows($sel_attdh);

?>
<tr>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $a++; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);" class="text-capitalize"><?php echo $class_name; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);" class="text-capitalize"><?php echo $section_name; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $attp; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $atta; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $attl; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $atth; ?></td>
</tr>
<?php } ?>
</table>
    </div>
</div>
<?php }else{ echo "<div class='alert alert-danger'>Please Create the Class and Section!</div>"; } ?>