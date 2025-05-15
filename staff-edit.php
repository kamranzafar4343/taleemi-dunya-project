<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#staff-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='overall-staff'">staff manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">staff inquiry update</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_GET['id'])){
    $ides = $_GET['id'];
    $sel_inqury = mysqli_query($con,"select * from addStaff where InstituteID='$userId' && id='$ides'");
    $inqry = mysqli_fetch_assoc($sel_inqury);
    
    $staffId = $inqry['staffId'];
    $appliedPost = $inqry['appliedPost'];
    $staffType = $inqry['staffType'];
    $maritalStatus = $inqry['maritalStatus'];
    $staffName = $inqry['staffName'];
    $gender = $inqry['gender'];
    $fatherName = $inqry['fatherName'];
    $cnic = $inqry['cnic'];
    $dob = $inqry['dob'];
    $phone = $inqry['phone'];
    $cell = $inqry['cell'];
    $subject = $inqry['subject'];
    $location = $inqry['location'];
    $qualification = $inqry['qualification'];
    $salary = $inqry['salary'];
    $timeIn = $inqry['timeIn'];
    $timeOut = $inqry['timeOut'];
    $facebookAcount = $inqry['facebookAcount'];
    $gmailAcount = $inqry['gmailAcount'];
    $staffimage = $inqry['staffimage'];
    $session = $inqry['session'];
    $month = $inqry['month'];
}
?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<form method="post" enctype="multipart/form-data">   
    <div class="card mb-3">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                <h3 class="fs-3 fw-bold text-uppercase text-center py-3 bg-apna1 text-white">update staff Form</h3>
            </div>
<div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-11 col-xxl-11 mb-3">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Session</label>
                <select class="form-select" name="seins">
                    <option><?php echo $session; ?></option>
<?php
$sel_sesn = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
while($seins = mysqli_fetch_array($sel_sesn)){
    $session = $seins['session'];
 echo '<option>'.$session.'</option>';  
}
?>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Staff ID#</label>
                <input name="stfid" type="text" class="form-control" value="<?php echo $staffId; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">applied for post</label> <span class="text-warning"><?php echo "(".$appliedPost.")"?></span>
                <select name="pst" class="form-control">
                    <option></option>
                    <option>Teaching</option>
                    <option>Non-Teaching</option>
                    <option>Admin</option>
                </select>
                <input type="hidden" value="<?php echo $appliedPost; ?>" name="pst_old">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-42mb-3 px-4">
                <label class="fs-6 text-capitalize">Staff Type</label> <span class="text-warning"><?php echo "(".$staffType.")"?></span>
                <select name="stf_tpe" class="form-control">
                    <option></option>
                    <option>Visitor</option>
                    <option>Full Day</option>
                </select>
                 <input type="hidden" value="<?php echo $staffType; ?>" name="stf_tpe_old">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Marital Status</label> <span class="text-warning"><?php echo "(".$maritalStatus.")"?></span>
                <select name="mritl" class="form-control">
                    <option></option>
                    <option>Married</option>
                    <option>Unmaried</option>
                </select>
                 <input type="hidden" value="<?php echo $maritalStatus; ?>" name="mritl_old">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Staff Name</label>
                <input name="st_nme" class="form-control" type="text" placeholder="Enter Your Staff Name" value="<?php echo $staffName; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Gender</label> <span class="text-warning"><?php echo "(".$gender.")"?></span>
                <select name="gndr" class="form-control">
                    <option></option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Custom</option>
                </select>
                 <input type="hidden" value="<?php echo $gender; ?>" name="gndr_old">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Father / Husband Name</label>
                <input name="fthr_nme" class="form-control" type="text" placeholder="Enter Father Name" value="<?php echo $fatherName; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">CNIC</label> <span class="text-danger">*</span>
                <input name="cnc" class="form-control" type="text" onkeypress="isInputNumber(event)"  maxlength="13" placeholder="Enter CNIC No." value="<?php echo $cnic; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">D-O-B</label>
                <input name="dob" class="form-control" type="date" value="<?php echo $dob; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Cell#</label> <span class="text-danger">*</span>
                <input name="cel" class="form-control" type="text" onkeypress="isInputNumber(event)"  maxlength="11" value="<?php echo $cell; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Whatsapp#</label>
                <input name="phne" class="form-control" type="text" placeholder="Enter Mobile No." onkeypress="isInputNumber(event)"  maxlength="11" value="<?php echo $phone; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Subject</label> <span class="text-warning text-capitalize"><?php echo "(".$subject.")"?></span>
<select class="form-control text-capitalize" name="sub">
    <option></option>
    <?php
$cls_mnger = mysqli_query($con,"select * from addSubjects where institute_id='$userId'");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $subject_name = $clis['subject_name'];
?>
    <option class="text-capitalize"><?php echo $subject_name; ?></option>
<?php } ?>
</select>
                <input name="sub_old" class="form-control" type="hidden" value="<?php echo $subject; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Home Address</label>
                <input name="area" type="text" class="form-control" placeholder="Enter Your Home Address" value="<?php echo $location; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Qualification</label>
                <input name="qua" class="form-control" type="text" placeholder="Enter your Qualification" value="<?php echo $qualification; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Salary Demand</label>
                <input name="slry" class="form-control" type="text" placeholder="Enter Demaned Salary" onkeypress="isInputNumber(event)"  maxlength="11" value="<?php echo $salary; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Time In</label>
                <input name="tme_in" class="form-control" type="time" placeholder="Enter Time In" value="<?php echo $timeIn; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Time Out</label>
                <input name="tme_out" class="form-control" type="time" placeholder="Enter Time Out" value="<?php echo $timeOut; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">facebook account</label>
                <input name="fb_ac" class="form-control" type="text" placeholder="Enter Facebook Address" value="<?php echo $facebookAcount; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">gmail account</label>
                <input name="gmla" class="form-control" type="text" placeholder="Enter Gmail Address" value="<?php echo $gmailAcount; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Image</label>
                <input name="imges" class="form-control" type="file">
                <input name="imges_old" type="hidden" value="<?php echo $staffimage; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Month</label>
                <input name="mnthnme" class="form-control" type="text" value="<?php echo $month; ?>">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="d-grid">
                    <button name="btn_sve" type="submit" class="btn btn-apna text-white text-uppercase"><i class="fa fa-save"></i> update</button>                    
                </div>
            </div>
    </div>
</div>
<div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1 col-xxl-1 mb-3 text-center">
    <?php if(empty($staffimage)){ echo "<img src='staff_imgs/users.jpg' class='img-fluid' width='100%'>"; }else{ ?>
                <img src="staff_imgs/<?php echo $staffimage; ?>" class="img-fluid">
    <?php } ?>
</div>
            
        </div>
    </div>
</form>
        </div>
<?php
if(isset($_POST['btn_sve'])){
    $seins = $_POST['seins'];
    $stfid = $_POST['stfid'];
    if(!empty($_POST['pst'])){ $pst = $_POST['pst']; }else{ $pst = $_POST['pst_old']; }
    if(!empty($_POST['stf_tpe'])){ $stf_tpe = $_POST['stf_tpe']; }else{ $stf_tpe = $_POST['stf_tpe_old']; }
    if(!empty($_POST['mritl'])){ $mritl = $_POST['mritl']; }else{ $mritl = $_POST['mritl_old']; }
    $st_nme = $_POST['st_nme'];
    if(!empty($_POST['gndr'])){ $gndr = $_POST['gndr']; }else{ $gndr = $_POST['gndr_old']; }
    $fthr_nme = $_POST['fthr_nme'];
    $cnc = $_POST['cnc'];
    $dob = $_POST['dob'];
    $phne = $_POST['phne'];
    $cel = $_POST['cel'];
    if(!empty($_POST['sub'])){ $sub = $_POST['sub']; }else{ $sub = $_POST['sub_old']; }
    $area = $_POST['area'];
    $qua = $_POST['qua'];
    $slry = $_POST['slry'];
    $tme_in = $_POST['tme_in'];
    $tme_out = $_POST['tme_out'];
    $fb_ac = $_POST['fb_ac'];
    $gmla = $_POST['gmla'];
    
if(!empty($_FILES['imges']['name'])){
    $imges = $_FILES['imges']['name'];
    $imgestmp = $_FILES['imges']['tmp_name'];
    $allowing = array('png','jpg', 'jpeg');
    $extents = pathinfo($imges,PATHINFO_EXTENSION);
    $pathes = "staff_imgs/".$imges;
    move_uploaded_file($imgestmp,$pathes);
}else{ $imges = $_POST['imges_old']; }
    


$inst_stf = mysqli_query($con,"update addStaff set staffId='$stfid',appliedPost='$pst',staffType='$stf_tpe',maritalStatus='$mritl',staffName='$st_nme',gender='$gndr',fatherName='$fthr_nme',cnic='$cnc',dob='$dob',phone='$phne',cell='$cel',subject='$sub',location='$area',qualification='$qua',salary='$slry',timeIn='$tme_in',timeOut='$tme_out',facebookAcount='$fb_ac',gmailAcount='$gmla',session='$seins',staffimage='$imges' where id='$ides'");
if($inst_stf){ 
    echo "<script>swal.fire('Good Job!','Staff Successfully Update','success');</script>";
    header("Refresh:0; url=staff-edit?id=$ides");
    }else{ echo "<script>swal.fire('Sorry!','Staff is not Update.','error');</script>"; }
    
}
?>
    </div>
</div>

<?php require_once("source/foot-section.php"); ?>