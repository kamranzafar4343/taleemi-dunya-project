<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php");require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#exame-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='result-manager'">result manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Edit result card</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<br>
<?php
if(isset($_GET['id'])){
    $ids = $_GET['id'];
    $sel_rst = mysqli_query($con,"select * from finalResults where instituteId='$userId' && id='$ids'");
$result = mysqli_fetch_assoc($sel_rst);
$rollnumber = $result['rollnumber'];
$stu_image = $result['stu_image'];
$student_name = $result['student_name'];
$father_name = $result['father_name'];
$class = $result['class'];
$section = $result['section'];
$session = $result['session'];
$term = $result['term'];
$subject1 = $result['subject1'];
$subject2 = $result['subject2'];
$subject3 = $result['subject3'];
$subject4 = $result['subject4'];
$subject5 = $result['subject5'];
$subject6 = $result['subject6'];
$subject7 = $result['subject7'];
$subject8 = $result['subject8'];
$subject9 = $result['subject9'];
$subject10 = $result['subject10'];
$subject11 = $result['subject11'];
$subject12 = $result['subject12'];
$subject13 = $result['subject13'];
$subject14 = $result['subject14'];
$total_marks1 = $result['total_marks1'];
$total_marks2 = $result['total_marks2'];
$total_marks3 = $result['total_marks3'];
$total_marks4 = $result['total_marks4'];
$total_marks5 = $result['total_marks5'];
$total_marks6 = $result['total_marks6'];
$total_marks7 = $result['total_marks7'];
$total_marks8 = $result['total_marks8'];
$total_marks9 = $result['total_marks9'];
$total_marks10 = $result['total_marks10'];
$total_marks11 = $result['total_marks11'];
$total_marks12 = $result['total_marks12'];
$total_marks13 = $result['total_marks13'];
$total_marks14 = $result['total_marks14'];
$obtain_marks1 = $result['obtain_marks1'];
$obtain_marks2 = $result['obtain_marks2'];
$obtain_marks3 = $result['obtain_marks3'];
$obtain_marks4 = $result['obtain_marks4'];
$obtain_marks5 = $result['obtain_marks5'];
$obtain_marks6 = $result['obtain_marks6'];
$obtain_marks7 = $result['obtain_marks7'];
$obtain_marks8 = $result['obtain_marks8'];
$obtain_marks9 = $result['obtain_marks9'];
$obtain_marks10 = $result['obtain_marks10'];
$obtain_marks11 = $result['obtain_marks11'];
$obtain_marks12 = $result['obtain_marks12'];
$obtain_marks13 = $result['obtain_marks13'];
$obtain_marks14 = $result['obtain_marks14'];
$percentage1 = $result['percentage1'];
$percentage2 = $result['percentage2'];
$percentage3 = $result['percentage3'];
$percentage4 = $result['percentage4'];
$percentage5 = $result['percentage5'];
$percentage6 = $result['percentage6'];
$percentage7 = $result['percentage7'];
$percentage8 = $result['percentage8'];
$percentage9 = $result['percentage9'];
$percentage10 = $result['percentage10'];
$percentage11 = $result['percentage11'];
$percentage12 = $result['percentage12'];
$percentage13 = $result['percentage13'];
$percentage14 = $result['percentage14'];
$remarks1 = $result['remarks1'];
$remarks2 = $result['remarks2'];
$remarks3 = $result['remarks3'];
$remarks4 = $result['remarks4'];
$remarks5 = $result['remarks5'];
$remarks6 = $result['remarks6'];
$remarks7 = $result['remarks7'];
$remarks8 = $result['remarks8'];
$remarks9 = $result['remarks9'];
$remarks10 = $result['remarks10'];
$remarks11 = $result['remarks11'];
$remarks12 = $result['remarks12'];
$remarks13 = $result['remarks13'];
$remarks14 = $result['remarks14'];
$sub_total = $result['sub_total'];
$overall_obtained = $result['overall_obtained'];
$overall_percentage = $result['overall_percentage'];
$overall_grade = $result['overall_grade'];
$overall_remarks = $result['overall_remarks'];
$overall_status = $result['overall_status'];
$positions = $result['positions'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_names = $rel['class_name'];

$sl_trms = mysqli_query($con,"select * from addTerms where instituteId='$userId' && termid='$term'");
$tm = mysqli_fetch_assoc($sl_trms);
$term = $tm['term'];

}
?>
<div class="container-fluid mt-1">
    <div class="row">
<div class="col-12 mb-3">
    <h4 class="text-center text-uppercase bg-apna fw-bolder py-1">edit result card</h4>
</div>
<div class="col-12 mb-3">
    <form class="rsltcrds">
    <table class="w-100" style="background:hsl(35,100%,80%);">
<tr>
    <th>Student Name</th>
    <td colspan="4">
        <input type="text" class="form-control" readonly value="<?php echo $student_name; ?>">
        <input type="hidden" class="studntid" value="<?php echo $ids; ?>">
    </td>
    <th>Father Name</th>
    <td colspan="4"><input type="text" class="form-control" readonly value="<?php echo $father_name; ?>"></td>
</tr>
<tr>
    <th>Class</th>
    <td colspan="4">
<?php if(!empty($class_names)){ ?>
<input type="text" class="form-control" readonly value="<?php echo $class_names; ?>">
<?php }else{ ?>
<select class="form-select text-capitalize" id="cles">
    <option value="">select class</option>
<?php
$cls_mnger = mysqli_query($con,"select * from addClass where institute_id='$userId'");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $class_name = $clis['class_name'];
?>
    <option class="text-capitalize" value="<?php echo $id; ?>"><?php echo $class_name; ?></option>
<?php } ?>
</select>
<?php } ?>
    </td>
    <th>Section</th>
    <td colspan="4">
<input type="text" class="form-control" readonly value="<?php echo $section; ?>">
    </td>
</tr>
<tr>
    <th>Roll#</th>
    <td colspan="4">
<input type="text" class="form-control" readonly value="<?php echo $rollnumber; ?>">
    </td>
    <th>Type</th>
    <td colspan="4">
<input type="text" class="form-control" readonly value="<?php echo $term; ?>">
    </td>
</tr>
<tr align="center">
    <th rowspan="2" style="font-size:1.2rem;">Subjects</th>
    <th colspan="8" style="font-size:1.2rem;">Detail of Marks Obtained by Candidate</th>
</tr>
<tr>
    <th style="border:1px solid black;">Total Marks</th>
    <th style="border:1px solid black;">Obt.Marks</th>
    <th style="border:1px solid black;">%age</th>
    <th style="border:1px solid black;" colspan="6">Grade / Remarks</th>
</tr>
<tr>
    <td style="border:1px solid black;"><input name="subjt1" type="text" value="<?php echo $subject1; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="totlmrks1" onkeypress="isInputNumber(event)" type="text" value="<?php echo $total_marks1; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="obtnmrks1" onkeypress="isInputNumber(event)"type="text" value="<?php echo $obtain_marks1; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="perctge1" onkeypress="isInputNumber(event)" type="text" value="<?php echo $percentage1; ?>" class="form-control"></td>
    <td style="border:1px solid black;" colspan="6"><input name="rmrks1" type="text" value="<?php echo $remarks1; ?>" class="form-control"></td>
</tr>
<tr>
    <td style="border:1px solid black;"><input name="subjt2" type="text" value="<?php echo $subject2; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="totlmrks2" onkeypress="isInputNumber(event)"type="text" value="<?php echo $total_marks2; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="obtnmrks2" onkeypress="isInputNumber(event)" type="text" value="<?php echo $obtain_marks2; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="perctge2" onkeypress="isInputNumber(event)" type="text" value="<?php echo $percentage2; ?>" class="form-control"></td>
    <td style="border:1px solid black;" colspan="6"><input name="rmrks2" type="text" value="<?php echo $remarks2; ?>" class="form-control"></td>
</tr>
<tr>
    <td style="border:1px solid black;"><input name="subjt3" type="text" value="<?php echo $subject3; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="totlmrks3" onkeypress="isInputNumber(event)"  type="text" value="<?php echo $total_marks3; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="obtnmrks3" onkeypress="isInputNumber(event)" type="text" value="<?php echo $obtain_marks3; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="perctge3" onkeypress="isInputNumber(event)" type="text" value="<?php echo $percentage3; ?>" class="form-control"></td>
    <td style="border:1px solid black;" colspan="6"><input name="rmrks3" type="text" value="<?php echo $remarks3; ?>" class="form-control"></td>
</tr>
<tr>
    <td style="border:1px solid black;"><input name="subjt4" type="text" value="<?php echo $subject4; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="totlmrks4" onkeypress="isInputNumber(event)" type="text" value="<?php echo $total_marks4; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="obtnmrks4" onkeypress="isInputNumber(event)" type="text" value="<?php echo $obtain_marks4; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="perctge4" onkeypress="isInputNumber(event)" type="text" value="<?php echo $percentage4; ?>" class="form-control"></td>
    <td style="border:1px solid black;" colspan="6"><input name="rmrks4" type="text" value="<?php echo $remarks4; ?>" class="form-control"></td>
</tr>
<tr>
    <td style="border:1px solid black;"><input name="subjt5" type="text" value="<?php echo $subject5; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="totlmrks5" onkeypress="isInputNumber(event)" type="text" value="<?php echo $total_marks5; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="obtnmrks5" onkeypress="isInputNumber(event)" type="text" value="<?php echo $obtain_marks5; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="perctge5" onkeypress="isInputNumber(event)" type="text" value="<?php echo $percentage5; ?>" class="form-control"></td>
    <td style="border:1px solid black;" colspan="6"><input name="rmrks5" type="text" value="<?php echo $remarks5; ?>" class="form-control"></td>
</tr>
<tr>
    <td style="border:1px solid black;"><input name="subjt6" type="text" value="<?php echo $subject6; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="totlmrks6" onkeypress="isInputNumber(event)" type="text" value="<?php echo $total_marks6; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="obtnmrks6" onkeypress="isInputNumber(event)" type="text" value="<?php echo $obtain_marks6; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="perctge6" onkeypress="isInputNumber(event)" type="text" value="<?php echo $percentage6; ?>" class="form-control"></td>
    <td style="border:1px solid black;" colspan="6"><input name="rmrks6" type="text" value="<?php echo $remarks6; ?>" class="form-control"></td>
</tr>
<tr>
    <td style="border:1px solid black;"><input name="subjt7" type="text" value="<?php echo $subject7; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="totlmrks7" onkeypress="isInputNumber(event)" type="text" value="<?php echo $total_marks7; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="obtnmrks7" onkeypress="isInputNumber(event)" type="text" value="<?php echo $obtain_marks7; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="perctge7" onkeypress="isInputNumber(event)" type="text" value="<?php echo $percentage7; ?>" class="form-control"></td>
    <td style="border:1px solid black;" colspan="6"><input name="rmrks7" type="text" value="<?php echo $remarks7; ?>" class="form-control"></td>
</tr>
<tr>
    <td style="border:1px solid black;"><input name="subjt8" type="text" value="<?php echo $subject8; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="totlmrks8" onkeypress="isInputNumber(event)" type="text" value="<?php echo $total_marks8; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="obtnmrks8" onkeypress="isInputNumber(event)" type="text" value="<?php echo $obtain_marks8; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="perctge8" onkeypress="isInputNumber(event)" type="text" value="<?php echo $percentage8; ?>" class="form-control"></td>
    <td style="border:1px solid black;" colspan="6"><input name="rmrks8" type="text" value="<?php echo $remarks8; ?>" class="form-control"></td>
</tr>
<tr>
    <td style="border:1px solid black;"><input name="subjt9" type="text" value="<?php echo $subject9; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="totlmrks9" onkeypress="isInputNumber(event)" type="text" value="<?php echo $total_marks9; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="obtnmrks9" onkeypress="isInputNumber(event)" type="text" value="<?php echo $obtain_marks9; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="perctge9" onkeypress="isInputNumber(event)" type="text" value="<?php echo $percentage9; ?>" class="form-control"></td>
    <td style="border:1px solid black;" colspan="6"><input name="rmrks9" type="text" value="<?php echo $remarks9; ?>" class="form-control"></td>
</tr>
<tr>
    <td style="border:1px solid black;"><input name="subjt10" type="text" value="<?php echo $subject10; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="totlmrks10" onkeypress="isInputNumber(event)" type="text" value="<?php echo $total_marks10; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="obtnmrks10" onkeypress="isInputNumber(event)" type="text" value="<?php echo $obtain_marks10; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="perctge10" onkeypress="isInputNumber(event)" type="text" value="<?php echo $percentage10; ?>" class="form-control"></td>
    <td style="border:1px solid black;" colspan="6"><input name="rmrks10" type="text" value="<?php echo $remarks10; ?>" class="form-control"></td>
</tr>
<tr>
    <td style="border:1px solid black;"><input name="subjt11" type="text" value="<?php echo $subject11; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="totlmrks11" onkeypress="isInputNumber(event)" type="text" value="<?php echo $total_marks11; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="obtnmrks11" onkeypress="isInputNumber(event)" type="text" value="<?php echo $obtain_marks11; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="perctge11" onkeypress="isInputNumber(event)" type="text" value="<?php echo $percentage11; ?>" class="form-control"></td>
    <td style="border:1px solid black;" colspan="6"><input name="rmrks11" type="text" value="<?php echo $remarks11; ?>" class="form-control"></td>
</tr>
<tr>
    <td style="border:1px solid black;"><input name="subjt12" type="text" value="<?php echo $subject12; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="totlmrks12" onkeypress="isInputNumber(event)" type="text" value="<?php echo $total_marks12; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="obtnmrks12" onkeypress="isInputNumber(event)" type="text" value="<?php echo $obtain_marks12; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="perctge12" onkeypress="isInputNumber(event)" type="text" value="<?php echo $percentage12; ?>" class="form-control"></td>
    <td style="border:1px solid black;" colspan="6"><input name="rmrks12" type="text" value="<?php echo $remarks12; ?>" class="form-control"></td>
</tr>
<tr>
    <td style="border:1px solid black;"><input name="subjt13" type="text" value="<?php echo $subject13; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="totlmrks13" onkeypress="isInputNumber(event)" type="text" value="<?php echo $total_marks13; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="obtnmrks13" onkeypress="isInputNumber(event)" type="text" value="<?php echo $obtain_marks13; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="perctge13" onkeypress="isInputNumber(event)" type="text" value="<?php echo $percentage13; ?>" class="form-control"></td>
    <td style="border:1px solid black;" colspan="6"><input name="rmrks13" type="text" value="<?php echo $remarks13; ?>" class="form-control"></td>
</tr>
<tr>
    <td style="border:1px solid black;"><input name="subjt14" type="text" value="<?php echo $subject14; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="totlmrks14" onkeypress="isInputNumber(event)" type="text" value="<?php echo $total_marks14; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="obtnmrks14" onkeypress="isInputNumber(event)" type="text" value="<?php echo $obtain_marks14; ?>" class="form-control"></td>
    <td style="border:1px solid black;"><input name="perctge14" onkeypress="isInputNumber(event)" type="text" value="<?php echo $percentage14; ?>" class="form-control"></td>
    <td style="border:1px solid black;" colspan="6"><input name="rmrks14" type="text" value="<?php echo $remarks14; ?>" class="form-control"></td>
</tr>
<tr>
    <th>T.Marks</th>
    <td><input name="ovraltotal" type="text" onkeypress="isInputNumber(event)" class="form-control" value="<?php echo $sub_total; ?>"></td>
    <th>Obtn.Marks</th>
    <td><input name="ovralobtn" type="text" onkeypress="isInputNumber(event)" class="form-control" value="<?php echo $overall_obtained; ?>"></td>
    <th>%age</th>
    <td><input name="ovralperctge" type="text" onkeypress="isInputNumber(event)" class="form-control" value="<?php echo $overall_percentage; ?>"></td>
    <th>Grade</th>
    <td><input name="ovralgrde" type="text" onkeypress="isInputNumber(event)" class="form-control" value="<?php echo $overall_grade; ?>"></td>
    <th>Positions</th>
    <td><input name="ovralpostn" type="text" onkeypress="isInputNumber(event)" class="form-control" value="<?php echo $positions;  ?>"></td>
</tr>
<tr>
    <th>Status</th>
    <td colspan="9"><input name="pasfalsatus" type="text" class="form-control" value="<?php echo $overall_status; ?>"></td>
</tr>
<tr>
    <th colspan="10">
<div class="d-grid">
    <button type="submit" class="btn btn-apna text-uppercase updtbtn"> update result</button>
</div>
    </th>
</tr>
    </table>
</form>
</div>
<script>
$(document).ready(function(){
    $(".updtbtn").on('click',function(e){
e.preventDefault();
var subjt1 = $('input[name="subjt1"]').val();
var subjt2 = $('input[name="subjt2"]').val();
var subjt3 = $('input[name="subjt3"]').val();
var subjt4 = $('input[name="subjt4"]').val();
var subjt5 = $('input[name="subjt5"]').val();
var subjt6 = $('input[name="subjt6"]').val();
var subjt7 = $('input[name="subjt7"]').val();
var subjt8 = $('input[name="subjt8"]').val();
var subjt9 = $('input[name="subjt9"]').val();
var subjt10 = $('input[name="subjt10"]').val();
var subjt11 = $('input[name="subjt11"]').val();
var subjt12 = $('input[name="subjt12"]').val();
var subjt13 = $('input[name="subjt13"]').val();
var subjt14 = $('input[name="subjt14"]').val();
var totlmrks1 = $('input[name="totlmrks1"]').val();
var totlmrks2 = $('input[name="totlmrks2"]').val();
var totlmrks3 = $('input[name="totlmrks3"]').val();
var totlmrks4 = $('input[name="totlmrks4"]').val();
var totlmrks5 = $('input[name="totlmrks5"]').val();
var totlmrks6 = $('input[name="totlmrks6"]').val();
var totlmrks7 = $('input[name="totlmrks7"]').val();
var totlmrks8 = $('input[name="totlmrks8"]').val();
var totlmrks9 = $('input[name="totlmrks9"]').val();
var totlmrks10 = $('input[name="totlmrks10"]').val();
var totlmrks11 = $('input[name="totlmrks11"]').val();
var totlmrks12 = $('input[name="totlmrks12"]').val();
var totlmrks13 = $('input[name="totlmrks13"]').val();
var totlmrks14 = $('input[name="totlmrks14"]').val();
var obtnmrks1 = $('input[name="obtnmrks1"]').val();
var obtnmrks2 = $('input[name="obtnmrks2"]').val();
var obtnmrks3 = $('input[name="obtnmrks3"]').val();
var obtnmrks4 = $('input[name="obtnmrks4"]').val();
var obtnmrks5 = $('input[name="obtnmrks5"]').val();
var obtnmrks6 = $('input[name="obtnmrks6"]').val();
var obtnmrks7 = $('input[name="obtnmrks7"]').val();
var obtnmrks8 = $('input[name="obtnmrks8"]').val();
var obtnmrks9 = $('input[name="obtnmrks9"]').val();
var obtnmrks10 = $('input[name="obtnmrks10"]').val();
var obtnmrks11 = $('input[name="obtnmrks11"]').val();
var obtnmrks12 = $('input[name="obtnmrks12"]').val();
var obtnmrks13 = $('input[name="obtnmrks13"]').val();
var obtnmrks14 = $('input[name="obtnmrks14"]').val();
var perctge1 = $('input[name="perctge1"]').val();
var perctge2 = $('input[name="perctge2"]').val();
var perctge3 = $('input[name="perctge3"]').val();
var perctge4 = $('input[name="perctge4"]').val();
var perctge5 = $('input[name="perctge5"]').val();
var perctge6 = $('input[name="perctge6"]').val();
var perctge7 = $('input[name="perctge7"]').val();
var perctge8 = $('input[name="perctge8"]').val();
var perctge9 = $('input[name="perctge9"]').val();
var perctge10 = $('input[name="perctge10"]').val();
var perctge11 = $('input[name="perctge11"]').val();
var perctge12 = $('input[name="perctge12"]').val();
var perctge13 = $('input[name="perctge13"]').val();
var perctge14 = $('input[name="perctge14"]').val();
var rmrks1 = $('input[name="rmrks1"]').val();
var rmrks2 = $('input[name="rmrks2"]').val();
var rmrks3 = $('input[name="rmrks3"]').val();
var rmrks4 = $('input[name="rmrks4"]').val();
var rmrks5 = $('input[name="rmrks5"]').val();
var rmrks6 = $('input[name="rmrks6"]').val();
var rmrks7 = $('input[name="rmrks7"]').val();
var rmrks8 = $('input[name="rmrks8"]').val();
var rmrks9 = $('input[name="rmrks9"]').val();
var rmrks10 = $('input[name="rmrks10"]').val();
var rmrks11 = $('input[name="rmrks11"]').val();
var rmrks12 = $('input[name="rmrks12"]').val();
var rmrks13 = $('input[name="rmrks13"]').val();
var rmrks14 = $('input[name="rmrks14"]').val();
var ovraltotal = $('input[name="ovraltotal"]').val();
var ovralobtn = $('input[name="ovralobtn"]').val();
var ovralperctge = $('input[name="ovralperctge"]').val();
var ovralgrde = $('input[name="ovralgrde"]').val();
var ovralpostn = $('input[name="ovralpostn"]').val();
var pasfalsatus = $('input[name="pasfalsatus"]').val();
var studntid = $(".studntid").val();
var cles = $("#cles").val();

$.ajax({
    url:'ajax/update-result-card-method-i.php',
    type: "POST",
    data: {sub_one:subjt1,sub_two:subjt2,sub_three:subjt3,sub_four:subjt4,sub_five:subjt5,sub_six:subjt6,sub_seven:subjt7,sub_eight:subjt8,sub_nine:subjt9,sub_ten:subjt10,sub_eleven:subjt11,sub_twelve:subjt12,sub_thirteen:subjt13,sub_fourteen:subjt14,totl_one:totlmrks1,totl_two:totlmrks2,totl_three:totlmrks3,totl_four:totlmrks4,totl_five:totlmrks5,totl_six:totlmrks6,totl_seven:totlmrks7,totl_eight:totlmrks8,totl_nine:totlmrks9,totl_ten:totlmrks10,totl_eleven:totlmrks11,totl_twelve:totlmrks12,totl_thirteen:totlmrks13,totl_fourteen:totlmrks14,obtan_one:obtnmrks1,obtan_two:obtnmrks2,obtan_three:obtnmrks3,obtan_four:obtnmrks4,obtan_five:obtnmrks5,obtan_six:obtnmrks6,obtan_seven:obtnmrks7,obtan_eight:obtnmrks8,obtan_nine:obtnmrks9,obtan_ten:obtnmrks10,obtan_eleven:obtnmrks11,obtan_twelve:obtnmrks12,obtan_thirteen:obtnmrks13,obtan_fourteen:obtnmrks14,ptg_one:perctge1,ptg_two:perctge2,ptg_three:perctge3,ptg_four:perctge4,ptg_five:perctge5,ptg_six:perctge6,ptg_seven:perctge7,ptg_eight:perctge8,ptg_nine:perctge9,ptg_ten:perctge10,ptg_eleven:perctge11,ptg_twelve:perctge12,ptg_thirteen:perctge13,ptg_fourteen:perctge14,rmrks_one:rmrks1,rmrks_two:rmrks2,rmrks_three:rmrks3,rmrks_four:rmrks4,rmrks_five:rmrks5,rmrks_six:rmrks6,rmrks_seven:rmrks7,rmrks_eight:rmrks8,rmrks_nine:rmrks9,rmrks_ten:rmrks10,rmrks_eleven:rmrks11,rmrks_twelve:rmrks12,rmrks_thirteen:rmrks13,rmrks_fourteen:rmrks14,ovrall_total:ovraltotal,overall_obtain:ovralobtn,overall_perctage:ovralperctge,overall_grade:ovralgrde,overall_pstion:ovralpostn,stu_id:studntid,pasing_remrks:pasfalsatus,updt_clas:cles},
    success: function(updtecard){
if(updtecard == 1){
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "Result Successfully Update!"
});
}else{
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "error",
  title: "Result is not Update!"
});
}
    }
});

    });
});
</script>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>