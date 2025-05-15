<?php
require_once("../functions/db.php");

$aply_cls = $_POST['aply_cls'];
$sectns = $_POST['sectns'];
$aply_sesin = $_POST['aply_sesin'];
$subjts = $_POST['subjts'];
$inst_ides = $_POST['inst_ides'];
$aply_trms = $_POST['aply_trms'];

$sel_imgs = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_ides'");
$frmt = mysqli_fetch_assoc($sel_imgs);
$institute_name = $frmt['institute_name'];
$logos = $frmt['logo'];
$campus = $frmt['campus'];

$aw=1;

$sel_stdnt = mysqli_query($con,"select * from results where class='$aply_cls' && section='$sectns' && session='$aply_sesin' && subject='$subjts' && terms='$aply_trms' && instituteId='$inst_ides'");
if(mysqli_num_rows($sel_stdnt)>0){
?>
<div class="row">
        <div class="col">
<table class="table table-responsive w-100">
    <tr align="center" style="background:hsl(35, 100%, 80%);">
        <th width="70"><img src="portal-admins/institute-logos/<?php echo $logos; ?>" class="img-fluid"></th>
        <th colspan="11">
<h4 class="fs-4 fw-bold text-uppercase"><?php echo $institute_name; ?></h4>
<div class="text-center text-capitalize fw-bold"><span class="fw-normal" style="border-bottom:1px solid black;"><?php echo $campus; ?></span></div>
        </th>
    </tr>
    <tr align="center" class="bg-apna">
        <th>Sr.No</th>
        <th><input type="checkbox" id="select_all"></th>
        <th>Image</th>
        <th>Roll#</th>
        <th>Student Name</th>
        <th>Class</th>
        <th>Section</th>
        <th>Session</th>
        <th>Subjects</th>
        <th>Attendance</th>
        <th>Marks</th>
        <th>Edit</th>
    </tr>
<?php
   while($aw <= 10000 && $rslts = mysqli_fetch_array($sel_stdnt)){
$ids = $rslts['id'];
$instituteId = $rslts['instituteId'];
$student_name = $rslts['student_name'];
$student_img = $rslts['student_img'];
$father_name = $rslts['father_name'];
$class = $rslts['class'];
$section = $rslts['section'];
$session = $rslts['session'];
$roll_no = $rslts['roll_no'];
$subject = $rslts['subject'];
$total_marks = $rslts['total_marks'];
$attendance = $rslts['attendance'];
$marks = $rslts['marks'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<form method="post" enctype="multipart/form-data">
<tr align="center" style="background:hsl(35, 100%, 80%);">
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $aw++; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><input type="checkbox" class="emp_checkbox" data-emp-id="<?php echo $ids; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" width="50">
<img class="img-fluid" src="student_imgs/<?php if(!empty($student_img)){ echo $student_img; }else{ echo "users.jpg"; } ?>">
    </td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $roll_no; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $student_name; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $class_name; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $section; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $session; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $subject; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $attendance; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><input class="form-control" id="obtns" onchange="defineRemarks(this)" name="obtn[]" type="text" onkeypress="isInputNumber(event)" value="<?php echo $marks; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><a href="#" class="btn updtebtn" rowid="<?php echo $ids; ?>"><i class="fa fa-edit text-success"></i></a></td>
</tr>
<?php } ?>
</form>
</table>
 </div>
    </div>
<?php
}else{ echo "<div class='alert alert-success'>There are no Record Found!</div>"; }
?>
<script>
$(document).on('click','.updtebtn',function(){

var ids = $(this).attr("rowid");

$.ajax({
    url: 'ajax/update-results.php',
    type: "POST",
    data:{st_id:ids},
    success: function(datas){
$(".updte-reslts").html(datas);
    }
    
});
    });
</script>
