<?php
require_once("../functions/db.php");

$fthr_cnic = $_POST['fthr_cnic'];
$inst_ides = $_POST['inst_ides'];

$fl = "";

$crm_schl = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_ides'");
$result = mysqli_fetch_assoc($crm_schl);
$institute_name = $result['institute_name'];
$campus = $result['campus'];
$logo = $result['logo'];

$sel_sblng = mysqli_query($con,"select * from addStudents where instituteId='$inst_ides' && cnic='$fthr_cnic'");
if(mysqli_num_rows($sel_sblng)>0){
?>
<div class='row datas'><div class='col'>
            <table class='w-100 bg-apna-body'>
                <thead>
<tr>
    <th width="50">
<img src="portal-admins/institute-logos/<?php echo $logo; ?>" class="img-fluid">
    </th>
    <th colspan="10"><h4 class="text-center fs-4 fw-bold text-uppercase"><?php echo $institute_name; ?></h4></th>
</tr>
<tr class='bg-apna'>
    <th class="border-apna">Sr#</th>
    <th class="border-apna">Image</th>
    <th class="border-apna">Roll#</th>
    <th class="border-apna">FamilyID</th>
    <th class="border-apna">Student Name</th>
    <th class="border-apna">Class</th>
    <th class="border-apna">Section</th>
    <th class="border-apna">Session</th>
    <th class="border-apna">Cell</th>
    <th class="border-apna">Edit</th>
    <th class="border-apna">Delete</th>
</tr>
                </thead>
            </tbody>
<?php
$as=1;
    while($as <= 10000 && $reslts = mysqli_fetch_array($sel_sblng)){
$stid = $reslts['id'];
$frmimgs = $reslts['image'];
$familyId = $reslts['familyId'];
$roll_num = $reslts['roll_num'];
$class = $reslts['class'];
$section = $reslts['section'];
$session = $reslts['session'];
$studentName = $reslts['studentName'];
$fatherName = $reslts['fatherName'];
$frmcel = $reslts['cell'];
$cnic = $reslts['cnic'];
$totalFee = $reslts['totalFee'];
$totalAmount = $reslts['totalAmount'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_ides' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<tr>
    <td class="border-apna"><?php echo $as++; ?></td>
    <td class="border-apna" width='30'>
        <img src='student_imgs/<?php echo $frmimgs; ?>' class='img-fluid'>
    </td>
    <td class="border-apna">
        <input value='<?php echo $roll_num; ?>' readonly style='width:100%;'>
    </td>
    <td class="border-apna">
        <input value='<?php echo $familyId; ?>' readonly style='width:100%;'>
    </td>
    <td class='text-capitalize border-apna'><?php echo $studentName; ?></td>
    <td class='text-uppercase border-apna'><?php echo $class_name; ?></td>
    <td class='text-uppercase border-apna'><?php echo $section; ?></td>
    <td class="border-apna"><?php echo $session; ?></td>
    <td class="border-apna"><?php echo $frmcel; ?></td>
    <td class="border-apna">
        <a href='admission-form-edit?id=<?php echo $stid; ?>' class='btn'><i class='text-success fas fa-edit'></i></a>
    </td>
    <td class="border-apna">
        <a href='admission-form-del?id=<?php echo $stid; ?>' class='btn'><i class='text-danger fas fa-trash-alt'></i></a>
    </td>
</tr>
<?php
    }
?>
    </tbody>
</table>
    </div>
</div>
<?php
}else{
    echo "<div class='alert alert-danger p-1'>There are no CNIC Record Found! </div>"; 
}
?>