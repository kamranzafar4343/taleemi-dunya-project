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
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> result card</li>
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
$terms = $tm['term'];
    }
?>
<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-12" align='right'>
<button class='btn btn-apna' id="btn_print"><i class="fa fa-print"></i> Print</button>
        </div>
<div class="col-12 mb-3 datas" style="padding-right:7rem;">
    <table class="table table-responsive table-striped w-100" style="background:hsl(35,100%,80%);">
<tr>
    <th width="50"><img src="portal-admins/institute-logos/<?php echo $image;?>" class="img-fluid"></th>
    <th colspan="8">
        <h1 class="p-0 fs-1 fw-bolder text-uppercase text-center"><?php echo $instituteName; ?></h1>
        <div class="text-center text-capitalize fs-4"><?php echo $campus; ?></div>
    </th>
    <th width="50"><img src="student_imgs/<?php if($stu_image == "None"){ echo "users.jpg";}elseif($stu_image == "none"){ echo "users.jpg";}elseif(empty($stu_image)){ echo "users.jpg";}else{ echo $stu_image; } ?>" class="img-fluid"></th>
</tr>
<tr>
    <th colspan="10"><h6 class="text-capitalize fs-3 text-center fw-bold"><?php echo $terms; ?> Result Card <?php echo $session; ?></h6></th>
</tr>
<tr>
    <th colspan="3" class="fs-5">Student Name</th>
    <td colspan="2" class="fs-5"><?php echo $student_name; ?></td>
    <th colspan="3" class="fs-5">Father Name</th>
    <td colspan="2" class="fs-5"><?php echo $father_name; ?></td>
</tr>
<tr>
    <th colspan="3" class="fs-5">Class</th>
    <td colspan="2" class="fs-5"><?php echo $class_names; ?></td>
    <th colspan="3" class="fs-5">Section</th>
    <td colspan="2" class="fs-5"><?php echo $section; ?></td>
</tr>
<tr>
    <th colspan="3" class="fs-5">Roll#</th>
    <td colspan="2" class="fs-5"><?php echo $rollnumber; ?></td>
    <th colspan="3" class="fs-5">Type</th>
    <td colspan="2" class="fs-5"><?php echo $terms; ?></td>
</tr>
<tr><th colspan="11"></th></tr>
<tr align="center">
    <th style="border:1px solid black;font-size:1.2rem;" rowspan="2">Subjects</th>
    <th style="border:1px solid black;font-size:1.2rem;" colspan="9">Detail of Marks Obtained by Candidate</th>
</tr>
<tr>
    <th style="border:1px solid black;">Total Marks</th>
    <th style="border:1px solid black;">Obt.Marks</th>
    <th style="border:1px solid black;">%age</th>
    <th style="border:1px solid black;" colspan="6">Grade / Remarks</th>
</tr>
<?php if(empty($subject1)){ }else{ ?>
<tr>
    <td style="border:1px solid black;"><?php echo $subject1; ?></td>
    <td style="border:1px solid black;"><?php echo $total_marks1; ?></td>
    <td style="border:1px solid black;"><?php echo $obtain_marks1; ?></td>
    <td style="border:1px solid black;"><?php echo $percentage1; ?></td>
    <td style="border:1px solid black;" colspan="6"><?php echo $remarks1; ?></td>
</tr>
<?php }
if(empty($subject2)){ }else{ ?>
<tr>
    <td style="border:1px solid black;"><?php echo $subject2; ?></td>
    <td style="border:1px solid black;"><?php echo $total_marks2; ?></td>
    <td style="border:1px solid black;"><?php echo $obtain_marks2; ?></td>
    <td style="border:1px solid black;"><?php echo $percentage2; ?></td>
    <td style="border:1px solid black;" colspan="6"><?php echo $remarks2; ?></td>
</tr>
<?php }
if(empty($subject3)){ }else{ ?>
<tr>
    <td style="border:1px solid black;"><?php echo $subject3; ?></td>
    <td style="border:1px solid black;"><?php echo $total_marks3; ?></td>
    <td style="border:1px solid black;"><?php echo $obtain_marks3; ?></td>
    <td style="border:1px solid black;"><?php echo $percentage3; ?></td>
    <td style="border:1px solid black;" colspan="6"><?php echo $remarks3; ?></td>
</tr>
<?php }
if(empty($subject4)){ }else{ ?>
<tr>
    <td style="border:1px solid black;"><?php echo $subject4; ?></td>
    <td style="border:1px solid black;"><?php echo $total_marks4; ?></td>
    <td style="border:1px solid black;"><?php echo $obtain_marks4; ?></td>
    <td style="border:1px solid black;"><?php echo $percentage4; ?></td>
    <td style="border:1px solid black;" colspan="6"><?php echo $remarks4; ?></td>
</tr>
<?php }if(empty($subject5)){ }else{ ?>
<tr>
    <td style="border:1px solid black;"><?php echo $subject5; ?></td>
    <td style="border:1px solid black;"><?php echo $total_marks5; ?></td>
    <td style="border:1px solid black;"><?php echo $obtain_marks5; ?></td>
    <td style="border:1px solid black;"><?php echo $percentage5; ?></td>
    <td style="border:1px solid black;" colspan="6"><?php echo $remarks5; ?></td>
</tr>
<?php }
if(empty($subject6)){ }else{ ?>
<tr>
    <td style="border:1px solid black;"><?php echo $subject6; ?></td>
    <td style="border:1px solid black;"><?php echo $total_marks6; ?></td>
    <td style="border:1px solid black;"><?php echo $obtain_marks6; ?></td>
    <td style="border:1px solid black;"><?php echo $percentage6; ?></td>
    <td style="border:1px solid black;" colspan="6"><?php echo $remarks6; ?></td>
</tr>
<?php }
if(empty($subject7)){ }else{ ?>
<tr>
    <td style="border:1px solid black;"><?php echo $subject7; ?></td>
    <td style="border:1px solid black;"><?php echo $total_marks7; ?></td>
    <td style="border:1px solid black;"><?php echo $obtain_marks7; ?></td>
    <td style="border:1px solid black;"><?php echo $percentage7; ?></td>
    <td style="border:1px solid black;" colspan="6"><?php echo $remarks7; ?></td>
</tr>
<?php }
if(empty($subject8)){ }else{ ?>
<tr>
    <td style="border:1px solid black;"><?php echo $subject8; ?></td>
    <td style="border:1px solid black;"><?php echo $total_marks8; ?></td>
    <td style="border:1px solid black;"><?php echo $obtain_marks8; ?></td>
    <td style="border:1px solid black;"><?php echo $percentage8; ?></td>
    <td style="border:1px solid black;" colspan="6"><?php echo $remarks8; ?></td>
</tr>
<?php }
if(empty($subject9)){ }else{ ?>
<tr>
    <td style="border:1px solid black;"><?php echo $subject9; ?></td>
    <td style="border:1px solid black;"><?php echo $total_marks9; ?></td>
    <td style="border:1px solid black;"><?php echo $obtain_marks9; ?></td>
    <td style="border:1px solid black;"><?php echo $percentage9; ?></td>
    <td style="border:1px solid black;" colspan="6"><?php echo $remarks9; ?></td>
</tr>
<?php }
if(empty($subject10)){ }else{ ?>
<tr>
    <td style="border:1px solid black;"><?php echo $subject10; ?></td>
    <td style="border:1px solid black;"><?php echo $total_marks10; ?></td>
    <td style="border:1px solid black;"><?php echo $obtain_marks10; ?></td>
    <td style="border:1px solid black;"><?php echo $percentage10; ?></td>
    <td style="border:1px solid black;" colspan="6"><?php echo $remarks10; ?></td>
</tr>
<?php }
if(empty($subject11)){ }else{ ?>
<tr>
    <td style="border:1px solid black;"><?php echo $subject11; ?></td>
    <td style="border:1px solid black;"><?php echo $total_marks11; ?></td>
    <td style="border:1px solid black;"><?php echo $obtain_marks11; ?></td>
    <td style="border:1px solid black;"><?php echo $percentage11; ?></td>
    <td style="border:1px solid black;" colspan="6"><?php echo $remarks11; ?></td>
</tr>
<?php }
if(empty($subject12)){ }else{ ?>
<tr>
    <td style="border:1px solid black;"><?php echo $subject12; ?></td>
    <td style="border:1px solid black;"><?php echo $total_marks12; ?></td>
    <td style="border:1px solid black;"><?php echo $obtain_marks12; ?></td>
    <td style="border:1px solid black;"><?php echo $percentage12; ?></td>
    <td style="border:1px solid black;" colspan="6"><?php echo $remarks12; ?></td>
</tr>
<?php }
if(empty($subject13)){ }else{ ?>
<tr>
    <td style="border:1px solid black;"><?php echo $subject13; ?></td>
    <td style="border:1px solid black;"><?php echo $total_marks13; ?></td>
    <td style="border:1px solid black;"><?php echo $obtain_marks13; ?></td>
    <td style="border:1px solid black;"><?php echo $percentage13; ?></td>
    <td style="border:1px solid black;" colspan="6"><?php echo $remarks13; ?></td>
</tr>
<?php } 
if(empty($subject14)){ }else{ ?>
<tr>
    <td style="border:1px solid black;"><?php echo $subject14; ?></td>
    <td style="border:1px solid black;"><?php echo $total_marks14; ?></td>
    <td style="border:1px solid black;"><?php echo $obtain_marks14; ?></td>
    <td style="border:1px solid black;"><?php echo $percentage14; ?></td>
    <td style="border:1px solid black;" colspan="6"><?php echo $remarks14; ?></td>
</tr>
<?php } ?>
<tr align="center">
    <th style="border:1px solid black;">T.Marks</th>
    <td style="border:1px solid black;"><?php echo $sub_total; ?></td>
    <th style="border:1px solid black;">Obtn.Marks</th>
    <td style="border:1px solid black;"><?php echo $overall_obtained; ?></td>
    <th style="border:1px solid black;">%age</th>
    <td style="border:1px solid black;"><?php echo $overall_percentage; ?></td>
    <th style="border:1px solid black;">Grade</th>
    <td style="border:1px solid black;"><?php echo $overall_grade; ?></td>
    <th style="border:1px solid black;">Positions</th>
    <td style="border:1px solid black;"><?php echo $positions;  ?></td>
</tr>
<tr>
    <th style="border:1px solid black;">Status</th>
    <td style="border:1px solid black;" colspan="9"><?php echo $overall_status; ?></td>
</tr>
<tr><th colspan="11" class="p-2"></th></tr>
<tr align="center">
    <th style="border:1px solid black;text-transform:uppercase;"colspan="6">Grading Formula</th>
    <th style="border:1px solid black;text-transform:uppercase;"colspan="5">Attendance</th>
</tr>
<tr align="center">
    <th style="border:1px solid black;">A+</th>
    <td style="border:1px solid black;">Outstanding</td>
    <td style="border:1px solid black;">(90-100)</td>
    <th style="border:1px solid black;">A</th>
    <td style="border:1px solid black;">Excellent</td>
    <td style="border:1px solid black;">(80-90)</td>
<?php
$attd_total = mysqli_query($con,"select * from results where instituteId='$userId' && terms='$term' && roll_no='$rollnumber'");
$count_total = mysqli_num_rows($attd_total);
?>
    <th style="border:1px solid black;text-align:left;" colspan="3">Total No. of Working Days:</th>
    <td style="border:1px solid black;"><?php echo $count_total; ?></td>
</tr>
<tr align="center">
    <th style="border:1px solid black;">B</th>
    <td style="border:1px solid black;">V.Good</td>
    <td style="border:1px solid black;">(80-70)</td>
    <th style="border:1px solid black;">C</th>
    <td style="border:1px solid black;">Good</td>
    <td style="border:1px solid black;">(60-50)</td>
<?php
$attd_presnt = mysqli_query($con,"select * from results where instituteId='$userId' && terms='$term' && roll_no='$rollnumber' && attendance='P'");
$count_presnt = mysqli_num_rows($attd_presnt);
?>
    <th style="border:1px solid black;text-align:left;" colspan="3">Total Present:</th>
    <td style="border:1px solid black;"><?php echo $count_presnt; ?></td>
</tr>
<tr align="center">
    <th style="border:1px solid black;">D</th>
    <td style="border:1px solid black;">Better</td>
    <td style="border:1px solid black;">(50-40)</td>
    <th style="border:1px solid black;">E</th>
    <td style="border:1px solid black;">Needs Improvement</td>
    <td style="border:1px solid black;">(40 and Below)</td>
<?php
$attd_abst = mysqli_query($con,"select * from results where instituteId='$userId' && terms='$term' && roll_no='$rollnumber' && attendance='A'");
$count_absnt = mysqli_num_rows($attd_abst);
?>
    <th style="border:1px solid black;text-align:left;" colspan="3">Total Absents:</th>
    <td style="border:1px solid black;"><?php echo $count_absnt; ?></td>
</tr>
<tr><th colspan="11"><div id="myChart" style="width:100%;height:300px;"></div></th></tr>
<tr>
    <th colspan="3">Principal Signature:</th>
    <td colspan="2">_________________</td>
    <th colspan="3">Teacher Signature:</th>
    <td colspan="2">_________________</td>
</tr>
<table class="w-100 fixed-bottom">
    <tr style='background:hsl(35, 100%, 80%);' align="center">
        <th colspan="15">
            Address: <span class="fw-normal"><?php if(!empty($mainaddress)){ echo $mainaddress; }else{ echo "Please Enter Your Address from Profile!"; } ?></span>
        </th>
    </tr>
    <tr style='background:hsl(35, 100%, 80%);' align="center">
        <th colspan="15">
            Cell: <span class="fw-normal"><?php if(!empty($cell)){ echo $cell; }else{ echo "Please Enter Your Cell from Profile!"; } ?></span>
        </th>
    </tr>
</table>
    </table>
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
<?php require_once("source/foot-section.php"); ?>
<script>
google.charts.load('current',{packages:['corechart','bar']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Subject', 'Obtain Marks'],

<?php if(empty($subject1)){ }else{ ?>['<?php echo $subject1; ?>',<?php echo $obtain_marks1; ?>], <?php } ?>
<?php if(empty($subject2)){ }else{ ?>['<?php echo $subject2; ?>',<?php echo $obtain_marks2; ?>], <?php } ?>
<?php if(empty($subject3)){ }else{ ?>['<?php echo $subject3; ?>',<?php echo $obtain_marks3; ?>], <?php } ?>
<?php if(empty($subject4)){ }else{ ?>['<?php echo $subject4; ?>',<?php echo $obtain_marks4; ?>], <?php } ?>
<?php if(empty($subject5)){ }else{ ?>['<?php echo $subject5; ?>',<?php echo $obtain_marks5; ?>], <?php } ?>
<?php if(empty($subject6)){ }else{ ?>['<?php echo $subject6; ?>',<?php echo $obtain_marks6; ?>], <?php } ?>
<?php if(empty($subject7)){ }else{ ?>['<?php echo $subject7; ?>',<?php echo $obtain_marks7; ?>], <?php } ?>
<?php if(empty($subject8)){ }else{ ?>['<?php echo $subject8; ?>',<?php echo $obtain_marks8; ?>], <?php } ?>
<?php if(empty($subject9)){ }else{ ?>['<?php echo $subject9; ?>',<?php echo $obtain_marks9; ?>], <?php } ?>
<?php if(empty($subject10)){ }else{ ?>['<?php echo $subject10; ?>',<?php echo $obtain_marks10; ?>], <?php } ?>
<?php if(empty($subject11)){ }else{ ?>['<?php echo $subject11; ?>',<?php echo $obtain_marks11; ?>], <?php } ?>
<?php if(empty($subject12)){ }else{ ?>['<?php echo $subject12; ?>',<?php echo $obtain_marks12; ?>], <?php } ?>
<?php if(empty($subject13)){ }else{ ?>['<?php echo $subject13; ?>',<?php echo $obtain_marks13; ?>], <?php } ?>
<?php if(empty($subject14)){ }else{ ?>['<?php echo $subject14; ?>',<?php echo $obtain_marks14; ?>], <?php } ?>

]);

// Set Options
const options = {
  title: '<?php echo $terms; ?>',
//  chartArea: {top:70, bottom:80, left:'10%', right:'20%', 'width':'1000%' },
  titleTextStyle: {
      bold: true,
      italic: true,
      fontSize: 18,
  },
  legend: { position: 'top', maxLines: 3 },
  bar: { groupWidth: '30%' },
  isStacked: true,
};

// Draw
const chart = new google.visualization.ColumnChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>