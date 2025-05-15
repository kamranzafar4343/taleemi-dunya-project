<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<style>
*{
    font-size:0.8rem;
    padding:0px;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<?php
if(isset($_GET['id'])){
    $ids=$_GET['id'];
$sl_reslt = mysqli_query($con,"select * from exameRecord where instituteId='$userId' && resultId='$ids'");
$rest = mysqli_fetch_assoc($sl_reslt);

$class = $rest['class'];
$section = $rest['section'];
$session = $rest['session'];
$terms = $rest['terms'];
$resultId = $rest['resultId'];
    
}
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#exames"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='enter-result'"> Enter Result</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> enter result <?php echo $terms; ?> </li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
     <div class="row">
         <div class="col-12 mb-3">
<h4 class="text-center fs-4 fw-bold text-uppercase text-white">result enter class <?php echo "(".$class_name.")"; ?>, section <?php echo "(".$section."), ".$session; ?> </h4>
         </div>
<div class="col-12 mb-3">
    <table class="table table-responsive w-100 bg-white">
<tr>
    <th>Sr#</th>
    <th>Roll No</th>
    <th>Student Name</th>
<?php
$sbjt = mysqli_query($con,"select * from addSubjects where institute_id='$userId' && classid='$class'");
$sbj_cnt = mysqli_num_rows($sbjt);
while($sb = mysqli_fetch_assoc($sbjt)){
$subject_name = $sb['subject_name'];
 echo "<th class='text-capitalize'>$subject_name</th>";
}
?>
<th>T.Marks</th>
<th>Obt.Marks</th>
<th>%age</th>
<th>Grade</th>
<th>Positions</th>
<th>Remarks</th>
</tr>
<?php
$r = 1;
$sl_entr = mysqli_query($con,"select * from exameRecord where instituteId='$userId' && resultId='$resultId'");
while($r <= 10000 && $ent = mysqli_fetch_array($sl_entr)){
    $student_name = $ent['student_name'];
    $father_name = $ent['father_name'];
    $student_img = $ent['student_img'];
    $class = $ent['class'];
    $section = $ent['section'];
    $session = $ent['session'];
    $attendance = $ent['attendance'];
    $roll_no = $ent['roll_no'];
    $subject1 = $ent['subject1'];
    $subject2 = $ent['subject2'];
    $subject3 = $ent['subject3'];
    $subject4 = $ent['subject4'];
    $subject5 = $ent['subject5'];
    $subject6 = $ent['subject6'];
    $subject7 = $ent['subject7'];
    $subject8 = $ent['subject8'];
    $subject9 = $ent['subject9'];
    $subject10 = $ent['subject10'];
    $subject11 = $ent['subject11'];
    $subject12 = $ent['subject12'];
    $subject13 = $ent['subject13'];
    $subject14 = $ent['subject14'];
    $subject15 = $ent['subject15'];
    $total_marks = $ent['total_marks'];
    $obtain_marks = $ent['obtain_marks'];
    $passing_marks = $ent['passing_marks'];
    $terms = $ent['terms'];
    $remarks = $ent['remarks'];
    $months = $ent['months'];
    $date = $ent['date'];
    $percentage = $ent['percentage'];
    $grade = $ent['grade'];
    $position = $ent['position'];
?>
<tr>
    <td><?php echo $r++; ?></td>
    <td><?php echo $roll_no; ?></td>
    <td class="text-capitalize"><?php echo $student_name; ?></td>
<?php if($sbj_cnt == 1){ ?>
<td><?php echo $subject1; ?></td>
<?php }elseif($sbj_cnt == 2){ ?>
<td><?php echo $subject1; ?></td>
<td><?php echo $subject2; ?></td>
<?php }elseif($sbj_cnt == 3){ ?>
<td><?php echo $subject1; ?></td>
<td><?php echo $subject2; ?></td>
<td><?php echo $subject3; ?></td>
<?php }elseif ($sbj_cnt == 4){ ?>
<td><?php echo $subject1; ?></td>
<td><?php echo $subject2; ?></td>
<td><?php echo $subject3; ?></td>
<td><?php echo $subject4; ?></td>
<?php }elseif ($sbj_cnt == 5){ ?>
<td><?php echo $subject1; ?></td>
<td><?php echo $subject2; ?></td>
<td><?php echo $subject3; ?></td>
<td><?php echo $subject4; ?></td>
<td><?php echo $subject5; ?></td>
<?php }elseif ($sbj_cnt == 6){ ?>
<td><?php echo $subject1; ?></td>
<td><?php echo $subject2; ?></td>
<td><?php echo $subject3; ?></td>
<td><?php echo $subject4; ?></td>
<td><?php echo $subject5; ?></td>
<td><?php echo $subject6; ?></td>
<?php }elseif ($sbj_cnt == 7){ ?>
<td><?php echo $subject1; ?></td>
<td><?php echo $subject2; ?></td>
<td><?php echo $subject3; ?></td>
<td><?php echo $subject4; ?></td>
<td><?php echo $subject5; ?></td>
<td><?php echo $subject6; ?></td>
<td><?php echo $subject7; ?></td>
<?php }elseif ($sbj_cnt == 8){ ?>
<td><?php echo $subject1; ?></td>
<td><?php echo $subject2; ?></td>
<td><?php echo $subject3; ?></td>
<td><?php echo $subject4; ?></td>
<td><?php echo $subject5; ?></td>
<td><?php echo $subject6; ?></td>
<td><?php echo $subject7; ?></td>
<td><?php echo $subject8; ?></td>
<?php }elseif ($sbj_cnt == 9){ ?>
<td><?php echo $subject1; ?></td>
<td><?php echo $subject2; ?></td>
<td><?php echo $subject3; ?></td>
<td><?php echo $subject4; ?></td>
<td><?php echo $subject5; ?></td>
<td><?php echo $subject6; ?></td>
<td><?php echo $subject7; ?></td>
<td><?php echo $subject8; ?></td>
<td><?php echo $subject9; ?></td>
<?php }elseif ($sbj_cnt == 10){ ?>
<td><?php echo $subject1; ?></td>
<td><?php echo $subject2; ?></td>
<td><?php echo $subject3; ?></td>
<td><?php echo $subject4; ?></td>
<td><?php echo $subject5; ?></td>
<td><?php echo $subject6; ?></td>
<td><?php echo $subject7; ?></td>
<td><?php echo $subject8; ?></td>
<td><?php echo $subject9; ?></td>
<td><?php echo $subject10; ?></td>
<?php }elseif ($sbj_cnt == 11){ ?>
<td><?php echo $subject1; ?></td>
<td><?php echo $subject2; ?></td>
<td><?php echo $subject3; ?></td>
<td><?php echo $subject4; ?></td>
<td><?php echo $subject5; ?></td>
<td><?php echo $subject6; ?></td>
<td><?php echo $subject7; ?></td>
<td><?php echo $subject8; ?></td>
<td><?php echo $subject9; ?></td>
<td><?php echo $subject10; ?></td>
<td><?php echo $subject11; ?></td>
<?php }elseif ($sbj_cnt == 12){ ?>
<td><?php echo $subject1; ?></td>
<td><?php echo $subject2; ?></td>
<td><?php echo $subject3; ?></td>
<td><?php echo $subject4; ?></td>
<td><?php echo $subject5; ?></td>
<td><?php echo $subject6; ?></td>
<td><?php echo $subject7; ?></td>
<td><?php echo $subject8; ?></td>
<td><?php echo $subject9; ?></td>
<td><?php echo $subject10; ?></td>
<td><?php echo $subject11; ?></td>
<td><?php echo $subject12; ?></td>
<?php }elseif ($sbj_cnt == 13){ ?>
<td><?php echo $subject1; ?></td>
<td><?php echo $subject2; ?></td>
<td><?php echo $subject3; ?></td>
<td><?php echo $subject4; ?></td>
<td><?php echo $subject5; ?></td>
<td><?php echo $subject6; ?></td>
<td><?php echo $subject7; ?></td>
<td><?php echo $subject8; ?></td>
<td><?php echo $subject9; ?></td>
<td><?php echo $subject10; ?></td>
<td><?php echo $subject11; ?></td>
<td><?php echo $subject12; ?></td>
<td><?php echo $subject13; ?></td>
<?php }elseif ($sbj_cnt == 14){ ?>
<td><?php echo $subject1; ?></td>
<td><?php echo $subject2; ?></td>
<td><?php echo $subject3; ?></td>
<td><?php echo $subject4; ?></td>
<td><?php echo $subject5; ?></td>
<td><?php echo $subject6; ?></td>
<td><?php echo $subject7; ?></td>
<td><?php echo $subject8; ?></td>
<td><?php echo $subject9; ?></td>
<td><?php echo $subject10; ?></td>
<td><?php echo $subject11; ?></td>
<td><?php echo $subject12; ?></td>
<td><?php echo $subject13; ?></td>
<td><?php echo $subject14; ?></td>
<?php }elseif ($sbj_cnt == 15){ ?>
<td><?php echo $subject1; ?></td>
<td><?php echo $subject2; ?></td>
<td><?php echo $subject3; ?></td>
<td><?php echo $subject4; ?></td>
<td><?php echo $subject5; ?></td>
<td><?php echo $subject6; ?></td>
<td><?php echo $subject7; ?></td>
<td><?php echo $subject8; ?></td>
<td><?php echo $subject9; ?></td>
<td><?php echo $subject10; ?></td>
<td><?php echo $subject11; ?></td>
<td><?php echo $subject12; ?></td>
<td><?php echo $subject13; ?></td>
<td><?php echo $subject14; ?></td>
<td><?php echo $subject15; ?></td>
<?php } ?>
<td><?php echo $total_marks; ?></td>
<td><?php echo $obtain_marks; ?></td>
<td><?php echo $percentage; ?></td>
<td><?php echo $grade; ?></td>
<td><?php echo $position; ?></td>
</tr>
<?php } ?>
    </table>
</div>
     </div>
</div>
<script>
function totalMarks(v){
    var index = $(v).parent().parent().index();
    
    var sujbOne = document.getElementsByName("sb1")[index].value;
    var sujbTwo = document.getElementsByName("sb2")[index].value;
    var sujb3 = parseFloat(document.getElementsByName("sb3")[index].value);
    var sujb4 = parseFloat(document.getElementsByName("sb4")[index].value);
    var sujb5 = parseFloat(document.getElementsByName("sb5")[index].value);
    var sujb6 = parseFloat(document.getElementsByName("sb6")[index].value);
    var sujb7 = parseFloat(document.getElementsByName("sb7")[index].value);
    var sujb8 = parseFloat(document.getElementsByName("sb8")[index].value);
    var sujb9 = parseFloat(document.getElementsByName("sb9")[index].value);
    var sbuj10 = parseFloat(document.getElementsByName("sb10")[index].value);
    var sbuj11 = parseFloat(document.getElementsByName("sb11")[index].value);
    var sbuj12 = parseFloat(document.getElementsByName("sb12")[index].value);
    var sbuj13 = parseFloat(document.getElementsByName("sb13")[index].value);
    var sbuj14 = parseFloat(document.getElementsByName("sb14")[index].value);
    var sbuj15 = parseFloat(document.getElementsByName("sb15")[index].value);
    
 var totMrks = sujbOne * sujbTwo;
    
    document.getElementsByName("totls")[index].value=totMrks;
    
}
</script>
<?php require_once("source/foot-section.php"); ?>