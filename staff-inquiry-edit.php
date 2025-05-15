<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#inquiry-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'">Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='staff-inquiry-manager'">staff inquiry manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">staff inquiry</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_GET['id'])){
    $ides = $_GET['id'];
    $sel_inqury = mysqli_query($con,"select * from staffInquiry where InstituteID='$userId' && id='$ides'");
    $inqry = mysqli_fetch_assoc($sel_inqury);
    $staffName = $inqry['staffName'];
    $gender = $inqry['gender'];
    $qualification = $inqry['qualification'];
    $staffType = $inqry['staffType'];
    $subject1 = $inqry['subject1'];
    $subject2 = $inqry['subject2'];
    $previousInstitute = $inqry['previousInstitute'];
    $demandSalary = $inqry['demandSalary'];
    $whatsapp = $inqry['whatsapp'];
    $refrence = $inqry['refrence'];
    $remarks = $inqry['remarks'];
}
?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<form method="post" enctype="multipart/form-data">   
    <div class="card mb-3">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                <h3 class="fs-3 fw-bold text-uppercase text-center py-3 bg-apna1 text-white">staff inquiry form</h3>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">staff name</label>
                <input name="s_nme" value="<?php echo $staffName; ?>" type="text" class="form-control" placeholder="Staff Name">
                <input name="dtes" type="hidden" value="<?php echo date("j-m-Y"); ?>" class="form-control"onkeypress="isInputNumber(event)">
                <input name="usr_id" type="hidden" value="<?php echo rand(10,928934); ?>" class="form-control"onkeypress="isInputNumber(event)">
                <input name="insti_id" type="hidden" value="<?php  echo $userId; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">gender</label> <span class="text-capitalize text-warning"><?php echo "(".$gender.")"; ?></span>
                <select name="sex" class="form-control">
                    <option></option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Custom</option>
                </select>
                <input type="hidden" value="<?php echo $gender; ?>" name="sex_old">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">qualification</label>
                <input name="qua" value="<?php echo $qualification; ?>" type="text" class="form-control">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">staff type</label> <span class="text-capitalize text-warning"><?php echo "(".$staffType.")"; ?></span>
                <select name="stf_tpe" class="form-control">
                    <option></option>
                    <option>Visitor</option>
                    <option>Full Day</option>
                </select>
                <input type="hidden" value="<?php echo $staffType; ?>" name="stf_tpe_old">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">subject 1</label> <span class="text-capitalize text-warning"><?php echo "(".$subject1.")"; ?></span>
                <select name="subj1" class="form-control">
                    <option></option>
                    <option>English</option>
                    <option>Urdu</option>
                    <option>Islamiat</option>
                </select>
                <input type="hidden" value="<?php echo $subject1; ?>" name="subj1_old">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">subject 2</label> <span class="text-capitalize text-warning"><?php echo "(".$subject2.")"; ?></span>
                <select name="sub2" class="form-control">
                    <option></option>
                    <option>Physics</option>
                    <option>Biology</option>
                    <option>Chemistry</option>
                </select>
                <input type="hidden" value="<?php echo $subject2; ?>" name="sub2_old">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">Previous Institute</label>
                <input name="pre_insti" value="<?php echo $previousInstitute; ?>" class="form-control" type="text" placeholder="Last Institute">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">Demand Salary</label>
                <input name="demnd_salry" value="<?php echo $demandSalary; ?>" class="form-control" type="text" onkeypress="isInputNumber(event)"  maxlength="11" placeholder="Enter Demanded Salary">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">whatsapp no.</label>
                <input name="wthsap" value="<?php echo $whatsapp; ?>" class="form-control" type="text" placeholder="Enter Whatsapp No." onkeypress="isInputNumber(event)"  maxlength="11">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">Refrence</label>
                <input name="refrnce" value="<?php echo $refrence; ?>" class="form-control" type="text" placeholder="Enter Reference">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-3 col-xxl-3 mb-3 px-4">
                <label class="fs-6 text-capitalize">remarks</label>
                <input name="remks" value="<?php echo $remarks; ?>" class="form-control" type="text" placeholder="Enter Admission Fee">
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
    
    $s_nme = $_POST['s_nme'];
    if(!empty($_POST['sex'])){ $sex = $_POST['sex']; }else{ $sex = $_POST['sex_old']; }
    $qua = $_POST['qua'];
    if(!empty($_POST['stf_tpe'])){ $stf_tpe = $_POST['stf_tpe']; }else{ $stf_tpe = $_POST['stf_tpe_old']; }
    if(!empty($_POST['subj1'])){ $subj1 = $_POST['subj1']; }else{ $subj1 = $_POST['subj1_old']; }
    if(!empty($_POST['sub2'])){ $sub2 = $_POST['sub2']; }else{ $sub2 = $_POST['sub2_old']; }
    $pre_insti = $_POST['pre_insti'];
    $demnd_salry = $_POST['demnd_salry'];
    $wthsap = $_POST['wthsap'];
    $refrnce = $_POST['refrnce'];
    $remks = mysqli_real_escape_string($con,$_POST['remks']);


$inst_staf = mysqli_query($con,"update staffInquiry set staffName='$s_nme',gender='$sex',qualification='$qua',staffType='$stf_tpe',subject1='$subj1',subject2='$sub2',previousInstitute='$pre_insti',demandSalary='$demnd_salry',whatsapp='$wthsap',refrence='$refrnce',remarks='$remks' where id='$ides'");
if($inst_staf){ echo "<script>swal.fire('Good Jobs!','Staff Successfully Updated.','success');</script>"; }else{ echo "<script>swal.fire('Oops!','Staff is not Updated','error');</script>"; }    

}
?>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>
