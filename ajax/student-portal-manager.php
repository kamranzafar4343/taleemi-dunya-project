<?php
require_once("../functions/db.php");
$user_ids = $_POST['user_ids'];

$sel_schl = mysqli_query($con,"select * from confirmSchools where institute_id='$user_ids'");
$scl = mysqli_fetch_assoc($sel_schl);
$institute_name = $scl['institute_name'];
$campus = $scl['campus'];
$logos = $scl['logo'];
$address = $scl['address'];
?>
<script>
 $(document).ready(function(){
    $("#classstudents").DataTable({
        columnDefs: [{
            "defaultContent": "-",
            "targets": "_all"
        }],
        bLengthChange: true,
        lengthMenu: [[10, 50, 100, -1], [10, 50, 100, "All"]],
        bFilter: true,
        bSort: true,
        bPaginate: true
    });
});
</script>
<div class="col datas">
<table class="table table-responsive w-100 pt-3" style='background:hsl(35, 100%, 80%);' id="classstudents">
    <thead>
        <tr>
            <th><img src="portal-admins/institute-logos/<?php echo $logos; ?>" class="img-fluid" style="width:100%;"></th>
            <th colspan="9" class="fs-2 text-center"><?php echo $institute_name; ?></th>
        </tr>
        <tr class="bg-apna">
            <th width="10">Sr#</th>
            <th>Image</th>
            <th>Student Name</th>
            <th>Father Name</th>
            <th>Class</th>
            <th>Section</th>
            <th>Session</th>
            <th>B-Form (Username)</th>
            <th>Roll# (Password)</th>
            <th>Receipts</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
<?php
$st = 1;
$sl_studnt = mysqli_query($con,"select * from addStudents where instituteId='$user_ids'");
if(mysqli_num_rows($sl_studnt)>0){
    while($st <= 1000000 && $result= mysqli_fetch_array($sl_studnt)){
$stid = $result['id'];
$roll_num = $result['roll_num'];
$class = $result['class'];
$section = $result['section'];
$session = $result['session'];
$frmimage = $result['image'];
$studentName = $result['studentName'];
$bForm = $result['bForm'];
$fatherName = $result['fatherName'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$user_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<tr>
    <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $st++; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' width="40"><img src="student_imgs/<?php if(!empty($frmimage)){ echo $frmimage; }else{ echo "users.jpg"; } ?>" class="img-fluid"></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-capitalize"><?php echo $studentName; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-capitalize"><?php echo $fatherName; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-uppercase"><?php echo $class_name; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-uppercase"><?php echo $section; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class=""><?php echo $session; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class=""><input type="text" readonly value="<?php echo $bForm; ?>" style="width:120px;"></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class=""><input type="text" readonly value="<?php echo $roll_num; ?>" style="width:60px;"></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'>
        <a href="lms-receipt?id=<?php echo $stid; ?>" target="_blank" class="btn"><i class="fa-solid fa-receipt text-success fa-2x"></i></a>
    </td>
    <input type="hidden" value="<?php echo $user_ids; ?>" class="scid">
    <td style='border:1px solid hsl(25, 100%, 50%);'>
<?php
$sl_prtlas = mysqli_query($con,"select * from studentPortal where instituteId='$user_ids' && id='$stid' && roll_num='$roll_num' && bForm='$bForm'");
if(mysqli_num_rows($sl_prtlas)>0){
    echo "<a href='deactive-portal?id=".$stid."' class='btn btn-danger text-capitalize'><i class='fa-regular fa-circle-xmark'></i> deactive</a>";
}else{
    echo "<button type='submit' id='stdprtl' rowid='$stid' class='btn btn-success text-capitalize'><i class='fa-regular fa-circle-check'></i> active</button>";
}
?>
    </td>
</tr>
<?php
    }
}else{ echo "<div class='alert alert-danger text-capitalize'>there are no record found!</div>"; }
?>
    </tbody>
</table>
        </div>