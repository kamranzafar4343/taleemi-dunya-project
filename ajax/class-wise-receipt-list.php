<?php
require_once("../functions/db.php");

$aply_cles = $_POST['aply_cles'];
$aply_sectn = $_POST['aply_sectn'];
$inst_ids = $_POST['inst_ids'];
$sesin_yers = $_POST['aply_sesin'];
$aply_mnths = $_POST['aply_mnths'];
$inst_logo = $_POST['inst_logo'];
$inst_names = $_POST['inst_names'];
$inst_acnt = $_POST['inst_acnt'];

$sel_inst = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_ids'");
$scol = mysqli_fetch_assoc($sel_inst);
$institute_id = $scol['institute_id'];
$institute_name = $scol['institute_name'];
$campus = $scol['campus'];
$cell = $scol['cell'];
$address = $scol['address'];
$account_detail = $scol['account_detail'];

 $stqry = mysqli_query($con,"select * from addStudents where instituteId='$inst_ids' && class='$aply_cles' && section='$aply_sectn' && session='$sesin_yers'");
while($stdnt=mysqli_fetch_assoc($stqry)){
    $admissionDate = $stdnt['admissionDate'];
    $familyId = $stdnt['familyId'];
    $roll_num = $stdnt['roll_num'];
    $class = $stdnt['class'];
    $section = $stdnt['section'];
    $medium = $stdnt['medium'];
    $session = $stdnt['session'];
    $stud_image = $stdnt['image'];
    $studentName = $stdnt['studentName'];
    $fatherName = $stdnt['fatherName'];
    $bForm = $stdnt['bForm'];
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
    <div class="row datas" style="height:500px;overflow:hidden;">
        <div class="col-12">
            <div class="card" style="border:none;">
<table class="w-100 bg-apna-body">
    <tr>
        <th width="50"><img src="portal-admins/institute-logos/<?php echo $inst_logo; ?>" class="img-fluid"></th>
        <th colspan="4">
            <h3 class="text-center fs-3 fw-bold m-0">
                <?php echo $institute_name; ?>
            </h3>
            <div class="text-center mb-3"><?php echo $campus; ?></div>
        </th>
        <th width="50"><img src="student_imgs/<?php if(empty($stud_image) || $stud_image == "None" || $stud_image == "none" || $stud_image == "NONE"){ echo "users.jpg"; }else{ echo $stud_image; } ?>" class="img-fluid"></th>
    </tr>
    <tr>
        <th class="text-center pb-3" colspan="6"><span class="px-4 py-1 text-uppercase" style="border:1px solid black;">Student portal slip</span></th>
    </tr>
</table>
<table class="w-100 bg-apna-body">
    <tr>
        <th>Student Name</th>
        <td class="text-capitalize"><?php echo $studentName; ?></td>
        <th>Father Name</th>
        <td class="text-capitalize"><?php echo $fatherName; ?></td>
        <th>Family#</th>
        <td><?php echo $familyId; ?></td>
    </tr>
    <tr>
        <th>Roll#</th>
        <td><?php echo $roll_num; ?></td>
        <th>Class/Sec</th>
        <td class="text-capitalize"><?php echo $class_name." (".$section.")"; ?></td>
        <th>Session</th>
        <td><?php echo $session; ?></td>
    </tr>
    <tr>
        <td colspan="6" style="font-size:16px;">
            <br>
            <b>Respected Parent's:</b><br><br>
            Your Child LMS Portal activated now. You can get all official alerts (SMS,Daily Diary, Attendance, Fee Record, Exame Reports, Syllabus etc) on Student Portal.<br><br>
            Login Now and Stay Updated.
            Thank You!<br><br>
        </td>
    </tr>
    <tr align="right">
        <td colspan="3" class="fs-5" align="left">
            <b class="fs-5">Username:</b> <?php echo $bForm; ?>
            <b class="fs-5">Password:</b> <?php echo $roll_num; ?>
        </td>
        <th colspan="3">____________________<br><b>Signature/Stamp</b></th>
    </tr>
    <tr>
        <td colspan="6" style="border:1px solid black;" class="p-2">
<b>Address:</b> <?php echo $mainaddress; ?> <b>Cell:</b> <?php echo $cell; ?>
        </td>
    </tr>
</table>
<hr style="border:2px dashed black;">
            </div>
        </div>
    </div>
<?php } ?>