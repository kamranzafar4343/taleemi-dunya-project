<?php
require_once("../functions/db.php");

$aply_sesin = $_POST['aply_sesin'];
$aply_clas = $_POST['aply_clas'];
$aply_sectin = $_POST['aply_sectin'];
$colg_id = $_POST['colg_id'];
$manths = $_POST['manths'];

$monthName = date("F", mktime(0, 0, 0, $manths, 10));

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$colg_id' && id='$aply_clas'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$sl_colt = mysqli_query($con,"select * from fee_collection where session='$aply_sesin' && class='$aply_clas' && section='$aply_sectin' && instituteId='$colg_id' && month='$manths'");

while($colct = mysqli_fetch_array($sl_colt)){
    $monthly_fee += $colct['monthly_fee'];
}
$sl_colts = mysqli_query($con,"select * from new_admission_collection where session='$aply_sesin' && class='$aply_clas' && section='$aply_sectin' && instituteId='$colg_id' && month='$manths'");
while($colct = mysqli_fetch_array($sl_colts)){
    $totalAmount += $colct['totalAmount'];
}

$total = $totalAmount + $monthly_fee;
if(!empty($total)){ $total = $total; }else{ $total = "0"; }
?>
<div class="row">
    <div class="col-12 mb-3">
<table class="table table-responsive w-100" id="allstudents">
    <thead>
        <tr class="bg-apna">
            <th>Sr#</th>
            <th>Class</th>
            <th>Section</th>
            <th>Session</th>
            <th>Month</th>
            <th>No.Of Students</th>
            <th>Total Collection</th>
        </tr>
    </thead>
    <tbody>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th style="border:1px solid hsl(25, 100%, 50%);">1</th>
            <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $class_name; ?></td>
            <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $aply_sectin; ?></td>
            <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $aply_sesin; ?></td>
            <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $monthName; ?></td>
            <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo mysqli_num_rows($sl_colt); ?></td>
            <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $total; ?></td>
        </tr>
    </tbody>
</table>
    </div>
</div>