<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#add-inquiry"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'">Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">staff inquiry</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<form method="post" enctype="multipart/form-data">   
    <div class="card mb-3" style="border:none;">
        <div class="row bg-apna py-1">
             <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 py-1">
<div class="d-flex">
    <div class="flex-fill">
        <h5 class="text-uppercase text-center fs-5 fw-bold">staff inquiry form</h5>
    </div>
    <div class="">
<a href="staff-inquiry-manager" target="_blank" title="Staff Manager" class="me-3 btn-dark btn p-1">
    <i class="fa-solid fa-screwdriver-wrench"></i>
</a>
<a href="#" target="_blank" title="Inquiry Form Template" class="me-3 btn btn-danger p-1">
    <i class="fa-solid fa-cloud-arrow-down"></i>
</a>
<a href="#" target="_blank" title="Video Help" class="me-3 btn btn-success p-1">
    <i class="fa-solid fa-video"></i>
</a>
    </div>
</div>
    </div>

        </div>    
<div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">staff name</label>
                <input name="s_nme" type="text" class="form-control" placeholder="Staff Name">
                <input name="dtes" type="hidden" value="<?php echo date("j-m-Y"); ?>" class="form-control"onkeypress="isInputNumber(event)">
                <input name="usr_id" type="hidden" value="<?php echo rand(10,928934); ?>" class="form-control"onkeypress="isInputNumber(event)">
                <input name="insti_id" type="hidden" value="<?php  echo $userId; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">gender</label>
                <select name="sex" class="form-control">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Custom</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">qualification</label>
                <input name="qua" type="text" class="form-control">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">staff type</label>
                <select name="stf_tpe" class="form-control">
                    <option>Visitor</option>
                    <option>Full Day</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">subject 1</label>
                <input type="text" class="form-control" name="subj1">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">subject 2</label>
                <input type="text" class="form-control" name="sub2">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">Previous Institute</label>
                <input name="pre_insti" class="form-control" type="text" placeholder="Last Institute">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">Demand Salary</label>
                <input name="demnd_salry" class="form-control" type="text" onkeypress="isInputNumber(event)"  maxlength="11" placeholder="Enter Demanded Salary">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">whatsapp no.</label>
                <input name="wthsap" class="form-control" type="text" placeholder="Enter Whatsapp No." onkeypress="isInputNumber(event)"  maxlength="11">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">Refrence</label>
                <input name="refrnce" class="form-control" type="text" placeholder="Enter Reference">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">remarks</label>
                <input name="remks" class="form-control" type="text" placeholder="Enter Admission Fee">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3 px-4">
                <div class="d-grid">
                    <button name="btn_staf" type="submit" class="btn btn-apna text-uppercase"><i class="fa fa-save"></i> save</button>                    
                </div>
            </div>
        </div>
    </div>
</form>  
        </div>
<?php
if(isset($_POST['btn_staf'])){
    
    $insti_id = $_POST['insti_id'];
    $usr_id = $_POST['usr_id'];
    $dtes = $_POST['dtes'];
    $s_nme = mysqli_real_escape_string($con,$_POST['s_nme']);
    $sex = $_POST['sex'];
    $qua = mysqli_real_escape_string($con,$_POST['qua']);
    $stf_tpe = $_POST['stf_tpe'];
    $subj1 = $_POST['subj1'];
    $sub2 = $_POST['sub2'];
    $pre_insti = mysqli_real_escape_string($con,$_POST['pre_insti']);
    $demnd_salry = $_POST['demnd_salry'];
    $wthsap = $_POST['wthsap'];
    $refrnce = mysqli_real_escape_string($con,$_POST['refrnce']);
    $remks = mysqli_real_escape_string($con,$_POST['remks']);

$duplicate = mysqli_query($con,"select * from staffInquiry where InstituteID='$insti_id' && whatsapp='$wthsap' && staffName='$s_nme'");
if(mysqli_num_rows($duplicate) > 0){
    echo "<script>swal.fire('Sorry!','Student Inquiry Already Submited.','info');</script>";
}else{

$inst_staf = mysqli_query($con,"insert into staffInquiry (InstituteID,userID,dates,staffName,gender,qualification,staffType,subject1,subject2,previousInstitute,demandSalary,whatsapp,refrence,remarks) values ('$insti_id','$usr_id','$dtes','$s_nme','$sex','$qua','$stf_tpe','$subj1','$sub2','$pre_insti','$demnd_salry','$wthsap','$refrnce','$remks')");
if($inst_staf){ echo "<script>swal.fire('Good Jobs!','Staff Successfully Added.','success');</script>"; }else{ echo "<script>swal.fire('Oops!','Staff is not Added','error');</script>"; }    
    }
}
?>
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

<?php require_once("source/foot-section.php"); ?>