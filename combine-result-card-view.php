<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#exame-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='combine-result-card'"> combine result card</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> combine results card</li>
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
    $ary = $_GET['ary'];
    $sel_stu = mysqli_query($con,"select * from results where roll_no='$ids' && instituteId='$userId'");
    $reslt = mysqli_fetch_assoc($sel_stu);
    $student_name = $reslt['student_name'];
    $father_name = $reslt['father_name'];
    $student_img = $reslt['student_img'];
    $class = $reslt['class'];
    $section = $reslt['section'];
    $session = $reslt['session'];
    $attendance = $reslt['attendance'];
    $roll_no = $reslt['roll_no'];
    $total_marks = $reslt['total_marks'];
    $marks = $reslt['marks'];
    $passing_marks = $reslt['passing_marks'];
    $terms = $reslt['terms'];
    $months = $reslt['months'];
    $remarks = $reslt['remarks'];
    $instituteId = $reslt['instituteId'];
    $date = $reslt['date'];
    $resultId = $reslt['resultId'];
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
}
?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col mb-3 datas">
<table class="table table-responsive w-100">
    <thead>
        <tr align="center" style='background:hsl(35, 100%, 80%);'>
            <th style='border:1px solid hsl(25, 100%, 50%);' width="50">
                <img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid">
            </th>
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="14">
                <h4 class="fs-4 fw-bold text-uppercase text-center"><?php echo $instituteName; ?></h4>
                <div class="text-center"><span class="text-capitalize" style="text-decoration:underline;"><?php echo $campus; ?></span></div>
            </th>
            <th width="50" style='border:1px solid hsl(25, 100%, 50%);'>
                <img src="student_imgs/<?php echo $student_img; ?>" class="img-fluid" style="width:50%;">
            </th>
        </tr>
        <tr align="center" style='background:hsl(35,100%,80%);'>
            <th style='border:1px solid hsl(25,100%,50%);' colspan="16">
                <h1 class="text-capitalize fs-1 fw-bolder">report card</h1>
            </th>
        </tr>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="5">Student Name:</th>
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="3"><span class="text-capitalize" style="text-decoration:underline;"><?php echo $student_name; ?></span></th>
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="5">Father Name:</th>
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="3"><span class="text-capitalize" style="text-decoration:underline;"><?php echo $father_name; ?></span></th>
        </tr>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="5">Class:</th>
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="3"><span class="text-capitalize" style="text-decoration:underline;"><?php echo $class_name; ?></span></th>
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="5">Roll No:</th>
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="3"><span class="text-capitalize" style="text-decoration:underline;"><?php echo $roll_no; ?></span></th>
        </tr>
        <tr class="bg-apna" align="center">
            <th style='border:1px solid hsl(25, 100%, 50%);font-size:1.3rem;line-height:70px;' rowspan="2" colspan="2">Subjects</th>
            <th style='border:1px solid hsl(25, 100%, 50%);font-size:1.4rem;' colspan="12">Marks and Grades</th>
            <th style='border:1px solid hsl(25, 100%, 50%);font-size:1.2rem;' rowspan="2">%</th>
            <th style='border:1px solid hsl(25, 100%, 50%);font-size:1.2rem;line-height:70px;' rowspan="2" colspan="2">Remarks/Grades</th>
        </tr>
        <tr class="bg-apna" align="center">
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="2" class="text-capitalize">T1</th>
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="2" class="text-capitalize">T2</th>
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="2" class="text-capitalize">T3</th>
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="2" class="text-capitalize">T4</th>
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="2" class="text-capitalize">T5</th>
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="2" class="text-capitalize">T6</th>
        </tr>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="2"></th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>T.M</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>O.M</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>T.M</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>O.M</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>T.M</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>O.M</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>T.M</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>O.M</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>T.M</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>O.M</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>T.M</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'>O.M</th>
            <th style='border:1px solid hsl(25, 100%, 50%);'></th>
            <th style='border:1px solid hsl(25, 100%, 50%);'></th>
        </tr>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th style='border:1px solid hsl(25, 100%, 50%);' colspan="2" class="text-capitalize">Math</th>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
        </tr>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th style='border:1px solid hsl(25, 100%, 50%);font-size:1.3rem;' colspan="2">Total Marks</th>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
            <td style='border:1px solid hsl(25, 100%, 50%);'></td>
        </tr>
        <tr style='background:hsl(35, 100%, 80%);' align="right">
            <th colspan="16">
                Teacher's Signature: _______________
            </th>
        </tr>
        <tr style='background:hsl(35, 100%, 80%);' align="center">
            <th colspan="16" class="text-capitalize">
                <?php echo $mainaddress." | ".$cell; ?>
            </th>
        </tr>
    </thead>
</table>
        </div>
    </div>

<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-apna' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
    </div>
</div>    
  <div class="row mt-4">
    <div class="col text-center" style="width:100%;overflow:hidden;">
        <script type="text/javascript">
	atOptions = {
		'key' : '4b35b8604d3ef79cbbf7b5e1fd1d5934',
		'format' : 'iframe',
		'height' : 90,
		'width' : 728,
		'params' : {}
	};
	
</script>
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