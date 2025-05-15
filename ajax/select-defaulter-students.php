<?php
require_once("../functions/db.php");

$inst_ids = $_POST['inst_ids'];
$apl_clas = $_POST['apl_clas'];
$apl_sectn = $_POST['apl_sectn'];
$apl_sesin = $_POST['apl_sesin'];
$ending_date = $_POST['ending_date'];


$selct_schol = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_ids'");
$schl = mysqli_fetch_assoc($selct_schol);
$institute_name = $schl['institute_name'];
$campus = $schl['campus'];
$logos = $schl['logo'];


$sl_studnts = mysqli_query($con,"select * from fee_collection where session='$apl_sesin' && class='$apl_clas' && section='$apl_sectn' && instituteId='$inst_ids' && fees_status='Unpaid'");
$clrs = mysqli_fetch_assoc($sl_studnts);
$familyId = $clrs['familyId'];
$studentName = $clrs['student_name'];
$frmimage = $clrs['image'];
$fatherName = $clrs['father_name'];
$class = $clrs['class'];
$section = $clrs['section'];
$session = $clrs['session'];
$rollno = $clrs['rollno'];
$monthly_fee = $clrs['monthly_fee'];
$month = $clrs['month'];
$monthName = date("M", mktime(0, 0, 0, $month, 10));

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

?>
<div class="row">
        <div class="col datas">
<table class="bg-apna-body w-100">
    <thead>
        <tr>
            <th width="50">
<img class="img-fluid" src="portal-admins/institute-logos/<?php echo $logos; ?>" style="width:100%;">
            </th>
            <th colspan="17">
<h3 class="fs-3 fw-bolder text-uppercase text-center"><?php echo $institute_name; ?></h3>
<div class="text-center"><?php echo $campus; ?></div>
            </th>
        </tr>
        <tr align="center"><th colspan="14" class="border-apna">Defaulter List Till <?php echo $ending_date; ?></th></tr>
        <tr>
            <th>Session</th>
            <td colspan="3" class="text-capitalize"><?php echo $class_name; ?></td>
            <th>Section</th>
            <td class="text-capitalize"><?php echo $section; ?></td>
            <th>Month</th>
            <td class="text-capitalize"><?php echo $monthName; ?></td>
            <th colspan="2">Session</th>
            <td colspan="2"><?php echo $session; ?></td>
        </tr>
        <tr align="center" class="bg-apna">
            <th class="border-apna">#</th>
            <th class="border-apna">Date</th>
            <th class="border-apna">Roll#</th>
            <th class="border-apna">Image</th>
            <th class="border-apna">Name</th>
            <th class="border-apna">Father Name</th>
            <th class="border-apna">Joining Date</th>
            <th class="border-apna">Contact#1</th>
            <th class="border-apna">Contact#2</th>
            <th class="border-apna">Fee Package</th>
            <th class="border-apna">Installment</th>
            <th class="border-apna">Due Date</th>
            <th class="border-apna">Status</th>
        </tr>
    </thead>
    <tbody>
<?php    
$b = 1;
$sl_stud = mysqli_query($con,"select * from fee_collection where session='$apl_sesin' && class='$apl_clas' && section='$apl_sectn' && instituteId='$inst_ids' && fees_status='Unpaid' && due_dates <= '$ending_date'");
$counts = mysqli_num_rows($sl_stud);
if($counts == 0){ echo "<div class='alert alert-danger text-uppercase'>there are no record here.</div>"; }
while($b <= 100000 && $rows = mysqli_fetch_array($sl_stud)){
$studntid = $rows['id'];
$instituteId = $rows['instituteId'];
$familyId = $rows['familyId'];
$studentName = $rows['student_name'];
$frmimage = $rows['image'];
$fatherName = $rows['father_name'];
$class = $rows['class'];
$section = $rows['section'];
$session = $rows['session'];
$rollno = $rows['rollno'];
$monthly_fee = $rows['monthly_fee'];
$dates = $rows['dates'];
$frmt = explode("-",$dates);
$dats = $frmt['2'];
$mnhts = $frmt['1'];
$saal = $frmt['0'];
$dudte = $dats."-".$mnhts."-".$saal;

$due_dates = $rows['due_dates'];
$fees_status = $rows['fees_status'];
$month = $rows['month'];
$monthName = date("M", mktime(0, 0, 0, $month, 10));

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$sl_studnts = mysqli_query($con,"select * from addStudents where instituteId='$inst_ids' && roll_num='$rollno'");
$rest = mysqli_fetch_assoc($sl_studnts);
$phones = $rest['phone'];
$fcells = $rest['cell'];
$whatsapps = $rest['whatsapp'];
$admissionDates = $rest['admissionDate'];
$totalFee = $rest['totalFee'];
?>
<tr align="center">
    <td class="border-apna"><?php echo $b++; ?></td>
        <td class="border-apna"><?php echo $dudte; ?></td>
        <td class="border-apna"><input value="<?php echo $rollno; ?>" type="text" readonly style="width:50px;font-size:0.8rem;"></td>
        <?php
if(!empty($frmimage)){ ?>
    <td class="border-apna" width="20"><img src="student_imgs/<?php echo $frmimage; ?>" class="img-fluid" style="width:70%;"></td>
<?php } else { ?>
<td width="20"><img src="student_imgs/users.jpg" class="img-fluid" style="width:70%;"></td>
<?php } ?>
    <td class="border-apna text-capitalize"><?php echo $studentName; ?></td>
    <td class="border-apna text-capitalize"><?php echo $fatherName; ?></td>
    <td class="border-apna"><?php echo $admissionDates; ?></td>
    <td class="border-apna"><?php echo $phones; ?></td>
    <td class="border-apna"><?php echo $fcells; ?></td>
    <td class="border-apna"><?php echo $totalFee; ?></td>
    <td class="border-apna"><?php echo $monthly_fee; ?></td>
    <td class="border-apna"><?php echo $due_dates; ?></td>
    <td class="border-apna"><?php echo $fees_status; ?></td>
</tr>
<?php } ?>
 </tbody>
</table>

        </div>
    </div>
<div class="row mt-3">
    <div class="col-12" align="right">
<div class='input-group'>
  <button class='btn btn-primary text-capitalize' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
    </div>
</div>
<script type="text/javascript">
$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>