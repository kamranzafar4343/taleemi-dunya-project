<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#exames"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> enter result-I</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">class</label>
<select name="clse" class="form-select text-uppercase" id="cls">
    <option class="text-capitlaize" value="">---select class--</option>
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
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">section</label>
<select name="sectn" class="form-select text-capitalize" id="strngs">
    <option class="text-capitlaize" value="">---select section---</option>
</select>
    </div>
<script>
    /// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instutes').value;
 //   console.log(insti);
$.ajax({
   url:'ajax/class-strength.php',
   type:"POST",
   data:{ class_title:class_name,institute_code:insti },
   success: function(result){
       $('#strngs').html(result);
   }
    });
});
    /// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instutes').value;
 //   console.log(insti);
$.ajax({
   url:'ajax/ajax-subject-list.php',
   type:"POST",
   data:{ class_title:class_name,institute_code:insti },
   success: function(result){
       $('#subjectss').html(result);
   }
    });
});
</script>
<div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">Subject</label>
<select name="subj" id="subjectss" class="form-select text-capitalize"><option class="text-capitalize">---select subject---</option></select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <input type="hidden" value="<?php echo $userId; ?>" name="inst" id="instutes">
        <label class="text-capitalize">session</label>
<select name="sesn" class="form-select">
<?php
$cls_mnger = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $session = $clis['session'];
?>
    <option class="text-capitalize"><?php echo $session; ?></option>
<?php } ?>
</select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">Examination Type</label>
<select id="temss" name="temss" class="form-select text-capitalize">
<?php
$cls_tems = mysqli_query($con,"select * from addTerms where instituteId='$userId'");
$cntsi = mysqli_num_rows($cls_tems);
if($cntsi == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($terms = mysqli_fetch_array($cls_tems)){
    $id = $terms['id'];
    $termid = $terms['termid'];
    $term = $terms['term'];
?>
    <option class="text-capitalize" value="<?php echo $termid; ?>"><?php echo $term; ?></option>
<?php } ?>
</select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mt-4">
        <div class="d-grid">
            <button name="btn_gen" type="submit" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> Generate</button>
        </div>
    </div>    
</div>
    </form>
<br><br>
    <div class="row">
        <div class="col datas">
<table class="table table-responsive w-100">
    <tr align="center" style="background:hsl(35, 100%, 80%);">
        <th width="50"><img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid"></th>
        <th colspan="11">
<h4 class="fs-4 fw-bold text-uppercase"><?php echo $instituteName; ?></h4>
<div class="text-center text-capitalize fw-bold"><span class="fw-normal" style="border-bottom:1px solid black;"><?php echo $campus; ?></span></div>
        </th>
    </tr>
<?php
if(isset($_POST['btn_gen'])){
    
$clse = $_POST['clse'];
$sesn = $_POST['sesn'];
$inst = $_POST['inst'];
$sectn = $_POST['sectn'];
$subj = $_POST['subj'];
$temss = $_POST['temss'];
    }
?>
    <tr><th colspan="12">Award List Subject Wise (<?php echo $subj; ?>)</th></tr>
    <tr align="center" class="bg-apna">
        <th>Sr.No</th>
        <th>Image</th>
        <th>Student Name</th>
        <th>Class</th>
        <th>Section</th>
        <th>Session</th>
        <th>Attendance</th>
        <th>Obt.Marks</th>
        <th>T.Marks</th>
        <th>%age</th>
        <th>Grade</th>
        <th>Positions</th>
    </tr>
<?php
$a = 1;
if(isset($_POST['btn_gen'])){
    
$clse = $_POST['clse'];
$sesn = $_POST['sesn'];
$inst = $_POST['inst'];
$sectn = $_POST['sectn'];
$subj = $_POST['subj'];
$temss = $_POST['temss'];
    
$sl_clas = mysqli_query($con,"select * from results where instituteId LIKE '%$inst%' && class LIKE '%$clse%' && section LIKE '%$sectn%' && session LIKE '%$sesn%' && terms LIKE '%$temss%' && subject LIKE '%$subj%'");
$count = mysqli_num_rows($sl_clas);
if($count == 0){ echo "<div class='alert alert-danger text-uppercase'>there are no record here.</div>"; }
while($a <= 100000 && $result = mysqli_fetch_array($sl_clas)){
$instituteId = $result['instituteId'];
$studentName = $result['student_name'];
$student_img = $result['student_img'];
$class = $result['class'];
$section = $result['section'];
$session = $result['session'];
$attendance = $result['attendance'];
$marks = $result['marks'];
$total_marks = $result['total_marks'];
$prctge = $marks/$total_marks*100;

if($prctge >= 90){ $prtge = "A+"; }elseif($prctge >= 80){ $prtge = "A"; }elseif($prctge >= 70){ $prtge =  "B+"; }elseif($prctge >= 60){ $prtge = "C"; }elseif($prctge >= 50){ $prtge = "D"; }else{ $prtge = "F"; }

if($prctge >= 90){ $pstn = "1"; }elseif($prctge >= 80){ $pstn = "2"; }elseif($prctge >= 70){ $pstn =  "3"; }elseif($prctge >= 60){ $pstn = "4"; }elseif($prctge >= 50){ $pstn = "5"; }else{ $pstn = "6"; }


$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<tr align="center" style="background:hsl(35, 100%, 80%);">
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $a++; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" width="50">
        <img class="img-fluid" src="student_imgs/<?php if(!empty($student_img)){ echo $student_img; }else{ echo "users.jpg"; } ?>">
    </td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $studentName; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $class_name; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $section; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $session; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $attendance; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $marks; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $total_marks; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $prctge; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $prtge; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $pstn; ?></td>
</tr>
<?php
    }    
}
?>
</table>
        </div>
    </div>
<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
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