<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#acad-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='section-manager'">section manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">edit section</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_GET['id'])){
    $ides = $_GET['id'];
    $sel_inqury = mysqli_query($con,"select * from addSection where institute_id='$userId' && id='$ides'");
    $inqry = mysqli_fetch_assoc($sel_inqury);
    $institute_id = $inqry['institute_id'];
    $class = $inqry['class'];
    $section_name = $inqry['section_name'];
    $strength = $inqry['strength'];
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
}
?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<form method="post" enctype="multipart/form-data">
<div class="row">
    <input name="instidss" class="form-control instidss" type="hidden" value="<?php echo $userId; ?>">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize text-white fs-6">class</label>
        <select class="form-select text-capitalize" name="clis" id="cls">
                <option value="<?php echo $class; ?>" class="text-capitalize"><?php echo $class_name; ?></option>
<?php
$sl_cls = mysqli_query($con,"select * from addClass where institute_id='$userId'");
while($clots = mysqli_fetch_array($sl_cls)){
    $id = $clots['id'];
    $class_name = $clots['class_name'];
?> 
<option class="text-capitalize" value="<?php echo $id; ?>"><?php echo $class_name; ?></option>
<?php } ?>
        </select>
        <input type="hidden" value="<?php echo $class; ?>" name="cles_old">
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="fs-6 text-capitalize text-white">Section</label>
<input class="form-control" name="sectn" value="<?php echo $section_name; ?>">
    </div>
    <input type="hidden" value="<?php echo $section_name; ?>" name="sectn_old">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize text-white">strength</label>
        <input name="strgths" class="form-control" type="text" value="<?php echo $strength; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mt-4">
        <div class="d-grid">
            <button name="updte_sessn" class="text-uppercase btn btn-apna" type="submit"><i class="fa fa-redo"></i> update</button>
        </div>    
    </div>
</div>
</form>
        </div>
<?php
if(isset($_POST['updte_sessn'])){
 
 $instidss = $_POST['instidss']; 
if(!empty($_POST['clis'])){ $clis = strtolower($_POST['clis']); }else{ $clis = $_POST['cles_old']; }
if(!empty($_POST['sectn'])){ $sesins = $_POST['sectn']; }else{ $sesins = $_POST['sectn_old']; }
 $strgths = $_POST['strgths'];

$duplic = mysqli_query($con,"select * from addSection where institute_id='$instidss' && class='$clis' && section_name='$sesins'");
if(mysqli_num_rows($duplic)>0){
    echo "<script>swal.fire('This Class and Section Already Created!');</script>";
}else{
 $updte_sesn = mysqli_query($con,"update addSection set class='$clis',section_name='$sesins',strength='$strgths' where id='$ides'");
 if($updte_sesn){ 
     echo "<script>swal.fire('Session Successfully Update!');</script>"; 
    header("location: section-manager");     
 }else{ echo "<script>swal.fire('Ooops!','Session is not Update.','error');</script>"; }    
}

        }
?>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>