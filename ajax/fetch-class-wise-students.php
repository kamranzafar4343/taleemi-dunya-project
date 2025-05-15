<?php
require_once("../functions/db.php");

$cles = $_POST['cles'];
$sectn = $_POST['sectn'];
$sesin = $_POST['sesin'];
$inst_ids = $_POST['inst_ids'];
$as=1;
$fl = "";


$usr = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_ids'");
$row = mysqli_fetch_assoc($usr);
$strength = $row['strength'];

$sl_clas = mysqli_query($con,"select * from addStudents where instituteId='$inst_ids' && class='$cles' && section='$sectn' && session='$sesin'");
if(mysqli_num_rows($sl_clas)>0){
?>

<div class='row mt-3 mb-4'>
    <div class='col-2 offset-10'>
        <div class='input-group'>
<a href='class-wise-student-lists-xls?id=<?php echo $inst_ids; ?> && cls=<?php echo $cles; ?> && sesin=<?php echo $sesin; ?> && sectin=<?php echo $sectn; ?>' class='btn btn-success text-uppercase'>
    <i class='fa-regular fa-file-excel'></i> xls
</a>
<a href='class-wise-student-lists-pdf?id=<?php echo $inst_ids; ?> && cls=<?php echo $cles; ?> && sesin=<?php echo $sesin; ?> && sectin=<?php echo $sectn; ?>' target='_blank' class='btn btn-danger text-capitalize'>
    <i class='fa-solid fa-file-pdf'></i> PDF
</a>
        </div>
    </div>
</div>
<div class='row datas'>
    <div class='col'>
        <table class='w-100 bg-apna-body'>
            <thead>
                <tr class='bg-apna'>
                    <th class="border-apna">Sr#</th>
                    <th class="border-apna">AD.Date</th>
                    <th class="border-apna">Image</th>
                    <th class="border-apna">Roll#</th>
                    <th class="border-apna">FamilyID</th>
                    <th class="border-apna">Student Name</th>
                    <th class="border-apna">Father Name</th>
                    <th class="border-apna">Class</th>
                    <th class="border-apna">Section</th>
                    <th class="border-apna">Session</th>
                    <th class="border-apna">Cell</th>
                    <th class="border-apna">Struck Off</th>
                    <th class="border-apna">Left</th>
                    <th class="border-apna">Challan</th>
                    <th class="border-apna">Form</th>
                    <th class="border-apna">App SMS</th>
                    <th class="border-apna">SMS</th>
                    <th class="border-apna">Whatsapp</th>
                    <th class="border-apna">Edit</th>
                    <th class="border-apna">Delete</th>
                </tr>
            </thead>
            </tbody>
<?php
while($as <= 100000 && $result = mysqli_fetch_array($sl_clas)){
$stid = $result['id'];
$admissionDate = $result['admissionDate'];
if(!empty($result['image'])){ $frmimage = $result['image']; }else{ $frmimage = "users.jpg";}
$roll_num = $result['roll_num'];
$familyId = $result['familyId'];
$studentName = $result['studentName'];
$fatherName = $result['fatherName'];
$class = $result['class'];
$section = $result['section'];
$session = $result['session'];
$frmcel = $result['cell'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<tr>
    <td class="border-apna"><?php echo $as++; ?></td>
    <td class="border-apna"><?php echo $admissionDate; ?></td>
    <td width='30'>
        <img src='student_imgs/<?php if(empty($frmimage) || $frmimage== "None" || $frmimage == "none" || $frmimage == "NONE"){ echo "users.jpg"; }else{ echo $frmimage; } ?>' class='img-fluid'>
    </td>
    <td class="border-apna">
        <input value='<?php echo $roll_num; ?>' readonly style='width:100%;'>
    </td>
    <td class="border-apna">
        <input value='<?php echo $familyId; ?>' readonly style='width:100%;'>
    </td>
    <td class='text-capitalize border-apna'><?php echo $studentName; ?></td>
    <td class='text-capitalize border-apna'><?php echo $fatherName; ?></td>
    <td class='text-uppercase border-apna'><?php echo $class_name; ?></td>
    <td class='text-uppercase border-apna'><?php echo $section; ?></td>
    <td class="border-apna"><?php echo $session; ?></td>
    <td class="border-apna"><?php echo $frmcel; ?></td>
    <td class="border-apna"><a href='student-struck-off?id=<?php echo $stid; ?>' class='nav-link' style='color:hsl(261, 100%, 50%)'>Struck</a></td>
    <td class="border-apna"><a href='student-left?id=<?php echo $stid; ?>' class='nav-link' style='color:hsl(310,100%,50%);'>Left</a></td>
    <td class="border-apna"><a href='student-admission-challan?id=<?php echo $stid; ?>' target='_blank' class='btn'><i class='fa-solid fa-file-invoice'></i></a></td>
    <td class="border-apna"><a class='btn' href='student-print-form?id=<?php echo $stid; ?>' title='Student New Admission Form'><i class='fa-solid fa-table-columns text-primary'></i></a></td>
    <td class="border-apna"><a class='btn' href='individual-app-sms?id=<?php echo $stid; ?>' title='Send App SMS'><i class='fa-regular fa-message text-danger'></i></a></td>
    <td class="border-apna"><a class='btn' href='sms-send-individual?id=<?php echo $stid; ?>'><i class='fa-regular fa-comments text-info'></i></a></td>
    <td class="border-apna"><a href='whatsapp-individual-sender?id=<?php echo $stid; ?>' class='btn'><i class='fa-brands fa-whatsapp text-success'></i></a></td>
    <td class="border-apna">
<?php if($inst_ids == 705834){ ?>
<a href='computer-form-edit?id=<?php echo $stid; ?>' target="_blank" class='btn'><i class='text-success fas fa-edit'></i></a>
<?php }else{ ?>
<a href='admission-form-edit?id=<?php echo $stid; ?>' target="_blank" class='btn'><i class='text-success fas fa-edit'></i></a>
<?php } ?>
    </td>
    <td class="border-apna">
<?php if($inst_ids == "758948"){ echo "<a href='#' class='btn'><i class='text-danger fas fa-trash'></i></a>"; }else{ ?>
        <a href='admission-form-del?id=<?php echo $stid; ?>' class='btn'><i class='text-danger fas fa-trash-alt'></i></a>
<?php } ?>
    </td>
</tr>
<?php } ?>
</tbody></table></div></div>
<?php }else{ echo "<div class='alert alert-danger text-capitalize'>there are no class student found!</div>"; } ?>