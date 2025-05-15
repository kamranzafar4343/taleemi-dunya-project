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

$sel_sbjrct = mysqli_query($con,"select * from finalResults where class='$apli_cls' && section='$sectns' && session='$aply_sesion' && term='$aply_trms' && instituteId='$inst_id'");
$rows = mysqli_fetch_assoc($sel_sbjrct);
$subject1 = $rows['subject1'];
$subject2 = $rows['subject2'];
$subject3 = $rows['subject3'];
$subject4 = $rows['subject4'];
$subject5 = $rows['subject5'];
$subject6 = $rows['subject6'];
$subject7 = $rows['subject7'];
$subject8 = $rows['subject8'];
$subject9 = $rows['subject9'];
$subject10 = $rows['subject10'];
$subject11 = $rows['subject11'];
$subject12 = $rows['subject12'];
$subject13 = $rows['subject13'];
$subject14 = $rows['subject14'];
$class = $rows['class'];
$section = $rows['section'];
$session = $rows['session'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_id' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$sel_exme = mysqli_query($con,"select * from finalResults where class='$apli_cls' && section='$sectns' && session='$aply_sesion' && term='$aply_trms' && instituteId='$inst_id'");
if(mysqli_num_rows($sel_exme)>0){
?>
<table class='w-100' style='background:hsl(35, 100%, 80%);'><thead>
    <tr>
        <th width="70"><img src="../portal-admins/institute-logos/<?php echo $logo; ?>" class="img-fluid"></th>
        <th colspan="24">
            <h1 class="text-center text-uppercase fs-1 fw-bold"><?php echo $institute_name; ?></h1>
            <div class="text-center text-uppercase"><?php echo $campus; ?></div>
        </th>
    </tr>
    <tr>
        <th colspan="25">
            <div class="text-capitalize text-center">
                <span class="text-decoration-underline fs-4 fw-bold">Position List <?php echo $term; ?></span>
            </div>
        </th>
    </tr>
    <tr align="center">
        <th colspan="4" class="border-apna">Class</th>
        <td colspan="4" class="border-apna text-capitalize"><?php echo $class_name; ?></td>
        <th colspan="4" class="border-apna">Section</th>
        <td colspan="4" class="border-apna text-uppercase"><?php echo $section; ?></td>
        <th colspan="4" class="border-apna">Session</th>
        <td colspan="4" class="border-apna"><?php echo $session; ?></td>
    </tr>
    <tr class="bg-apna" align="center">
        <th rowspan="2" class="border-apna">Sr#</th>
        <th rowspan="2" class="border-apna">Roll#</th>
        <th class="border-apna" rowspan="2">Student Name</th>
        <th class="border-apna" colspan="14">Subjects</th>
        <th rowspan="2" class="border-apna">T.Marks</th>
        <th rowspan="2" class="border-apna">Obtn.Marks</th>
        <th rowspan="2" class="border-apna">%age</th>
        <th rowspan="2" class="border-apna">Grade</th>
        <th rowspan="2" class="border-apna">Positions</th>
    </tr>
    <tr class="bg-apna" align="center">
        <th class="border-apna text-capitalize"><?php echo $subject1; ?></th>
        <th class="border-apna text-capitalize"><?php echo $subject2; ?></th>
        <th class="border-apna text-capitalize"><?php echo $subject3; ?></th>
        <th class="border-apna text-capitalize"><?php echo $subject4; ?></th>
        <th class="border-apna text-capitalize"><?php echo $subject5; ?></th>
        <th class="border-apna text-capitalize"><?php echo $subject6; ?></th>
        <th class="border-apna text-capitalize"><?php echo $subject7; ?></th>
        <th class="border-apna text-capitalize"><?php echo $subject8; ?></th>
        <th class="border-apna text-capitalize"><?php echo $subject9; ?></th>
        <th class="border-apna text-capitalize"><?php echo $subject10; ?></th>
        <th class="border-apna text-capitalize"><?php echo $subject11; ?></th>
        <th class="border-apna text-capitalize"><?php echo $subject12; ?></th>
        <th class="border-apna text-capitalize"><?php echo $subject13; ?></th>
        <th class="border-apna text-capitalize"><?php echo $subject14; ?></th>
    </tr>
    
    </thead><tbody>
<?php
while($rt <= 10000 && $relt = mysqli_fetch_array($sel_exme)){
$student_name = $relt['student_name'];
$student_img = $relt['stu_image'];
$roll_no = $relt['rollnumber'];

$total_marks1 = $relt['total_marks1'];
$total_marks2 = $relt['total_marks2'];
$total_marks3 = $relt['total_marks3'];
$total_marks4 = $relt['total_marks4'];
$total_marks5 = $relt['total_marks5'];
$total_marks6 = $relt['total_marks6'];
$total_marks7 = $relt['total_marks7'];
$total_marks8 = $relt['total_marks8'];
$total_marks9 = $relt['total_marks9'];
$total_marks10 = $relt['total_marks10'];
$total_marks11 = $relt['total_marks11'];
$total_marks12 = $relt['total_marks12'];
$total_marks13 = $relt['total_marks13'];
$total_marks14 = $relt['total_marks14'];
$obtain_marks1 = $relt['obtain_marks1'];
$obtain_marks2 = $relt['obtain_marks2'];
$obtain_marks3 = $relt['obtain_marks3'];
$obtain_marks4 = $relt['obtain_marks4'];
$obtain_marks5 = $relt['obtain_marks5'];
$obtain_marks6 = $relt['obtain_marks6'];
$obtain_marks7 = $relt['obtain_marks7'];
$obtain_marks8 = $relt['obtain_marks8'];
$obtain_marks9 = $relt['obtain_marks9'];
$obtain_marks10 = $relt['obtain_marks10'];
$obtain_marks11 = $relt['obtain_marks11'];
$obtain_marks12 = $relt['obtain_marks12'];
$obtain_marks13 = $relt['obtain_marks13'];
$obtain_marks14 = $relt['obtain_marks14'];
$percentage1 = $relt['percentage1'];
$percentage2 = $relt['percentage2'];
$percentage3 = $relt['percentage3'];
$percentage4 = $relt['percentage4'];
$percentage5 = $relt['percentage5'];
$percentage6 = $relt['percentage6'];
$percentage7 = $relt['percentage7'];
$percentage8 = $relt['percentage8'];
$percentage9 = $relt['percentage9'];
$percentage10 = $relt['percentage10'];
$percentage11 = $relt['percentage11'];
$percentage12 = $relt['percentage12'];
$percentage13 = $relt['percentage13'];
$percentage14 = $relt['percentage14'];
$remarks1 = $relt['remarks1'];
$remarks2 = $relt['remarks2'];
$remarks3 = $relt['remarks3'];
$remarks4 = $relt['remarks4'];
$remarks5 = $relt['remarks5'];
$remarks6 = $relt['remarks6'];
$remarks7 = $relt['remarks7'];
$remarks8 = $relt['remarks8'];
$remarks9 = $relt['remarks9'];
$remarks10 = $relt['remarks10'];
$remarks11 = $relt['remarks11'];
$remarks12 = $relt['remarks12'];
$remarks13 = $relt['remarks13'];
$remarks14 = $relt['remarks14'];
$sub_total = $relt['sub_total'];
$overall_obtained = $relt['overall_obtained'];
$overall_percentage = $relt['overall_percentage'];
$frmt = explode("%",$overall_percentage);
$frt = $frmt['0'];
$scnd = $frmt['1'];
$overall_grade = $relt['overall_grade'];
?>
<tr>
    <td class="border-apna"><?php echo $rt++; ?></td>
    <td class="border-apna"><?php echo $roll_no; ?></td>
    <td class="border-apna text-capitalize"><?php echo $student_name; ?></td>
    <td class="border-apna text-capitalize"><?php echo $obtain_marks1; ?></td>
    <td class="border-apna text-capitalize"><?php echo $obtain_marks2; ?></td>
    <td class="border-apna text-capitalize"><?php echo $obtain_marks3; ?></td>
    <td class="border-apna text-capitalize"><?php echo $obtain_marks4; ?></td>
    <td class="border-apna text-capitalize"><?php echo $obtain_marks5; ?></td>
    <td class="border-apna text-capitalize"><?php echo $obtain_marks6; ?></td>
    <td class="border-apna text-capitalize"><?php echo $obtain_marks7; ?></td>
    <td class="border-apna text-capitalize"><?php echo $obtain_marks8; ?></td>
    <td class="border-apna text-capitalize"><?php echo $obtain_marks9; ?></td>
    <td class="border-apna text-capitalize"><?php echo $obtain_marks10; ?></td>
    <td class="border-apna text-capitalize"><?php echo $obtain_marks11; ?></td>
    <td class="border-apna text-capitalize"><?php echo $obtain_marks12; ?></td>
    <td class="border-apna text-capitalize"><?php echo $obtain_marks13; ?></td>
    <td class="border-apna text-capitalize"><?php echo $obtain_marks14; ?></td>
    <td class="border-apna"><?php echo $sub_total; ?></td>
    <td class="border-apna"><?php echo $overall_obtained; ?></td>
    <td class="border-apna"><?php echo $overall_percentage; ?></td>
    <td class="border-apna"><?php echo $overall_grade; ?></td>
    <td class="border-apna">
<?php
if($frt >= 95){ echo "1st"; }elseif($frt >= 90){ echo "2nd"; }elseif($frt >= 85){ echo "3rd"; }elseif($frt >= 80){ echo "4th"; }else if($frt >= 75){ echo "5th"; }elseif($frt >= 70){ echo "6th"; }elseif($frt >= 65){ echo "7th"; }elseif($frt >= 60){ echo "8th"; }elseif($frt >= 55){ echo "9th"; }elseif($frt >= 50){ echo "10th"; }elseif($frt >= 45){ echo "11th"; }elseif($frt >= 40){ echo "12th"; }else{ echo "Fail"; }
?>
    </td>
</tr>
<?php } ?>
</tbody></table>
<?php
}else{
    echo "<div class='alert alert-danger'>There are no Record Found!</div>";
}

?>