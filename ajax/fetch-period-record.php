<?php
require_once("../functions/db.php");

$inst_ids = $_POST['inst_ids'];

$sel_prds = mysqli_query($con,"select * from addPeriods where instituteId='$inst_ids'");
if(mysqli_num_rows($sel_prds)>0){
?>
<div class="row">
    <div class="col mb-3">
        <table class="table w-100 bg-apna">
            <thead>
                <tr>
<th>#</th>
<th>Class</th>
<th>Period#</th>
<th>Start Time</th>
<th>End Time</th>
<th>Type</th>
<th>Action Buttons</th>
                </tr>
            </thead>
            <tbody>
<?php
$tr=1;
while($tr <= 10000 && $rslts = mysqli_fetch_array($sel_prds)){
    $id = $rslts['id'];
    $instituteId = $rslts['instituteId'];
    $class = $rslts['class'];
    $period_no = $rslts['period_no'];
    $start_time = $rslts['start_time'];
    $end_time = $rslts['end_time'];
    $period_type = $rslts['period_type'];
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<tr style="background-color:hsl(35,100%,80%);">
    <td style="border:1px solid black;"><?php echo $tr++; ?></td>
    <td style="border:1px solid black;" class="text-capitalize"><?php echo $class_name; ?></td>
    <td style="border:1px solid black;"><?php echo "Period ".$period_no; ?></td>
    <td style="border:1px solid black;"><?php echo $start_time; ?></td>
    <td style="border:1px solid black;"><?php echo $end_time; ?></td>
    <td style="border:1px solid black;" class="text-capitalize"><?php echo $period_type; ?></td>
    <td style="border:1px solid black;">
        <a href="#" class="btn"><i class="fa fa-edit text-success"></i></a>
        <a href="#" class="btn"><i class="fa fa-trash-alt text-danger"></i></a>
    </td>
</tr>
<?php } ?>
</tbody>
        </table>
    </div>
</div>
<?php }else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; } ?>