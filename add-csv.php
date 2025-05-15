<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#add-students"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'">Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> add CSV form</li>
  </ol>
</nav>
<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 bg-apna py-1">
<div class="d-flex">
    <div class="text-center">
<a href="source/student-records-for-taleemi-portal.xlsx" download class="text-uppercase px-5 py-2 nav-links bg-success text-white"> <i class="fa-regular fa-circle-down"></i> Export excel file</a>
    </div>
    <div class="text-center flex-fill">
<h4 class="text-uppercase text-center fs-4 fw-bolder">CSV File Upload</h4>
    </div>
    <div class="text-center">
<a href="all-students" target="_blank" class="btn btn-dark p-1" title="Student Manager"><i class="fa-solid fa-screwdriver-wrench"></i></a>
<a href="#" class="btn btn-danger p-1" title="Student Form Template"><i class="fa-solid fa-cloud-arrow-down"></i></a>
<a href="#" data-bs-toggle="modal" data-bs-target="#adstdntvideo" class="btn btn-success p-1" title="Video Help"><i class="fa-solid fa-video"></i></a>
    </div>
</div>
        </div>  
    </div>
<form method="post" enctype="multipart/form-data">
    <div class="row">
        <input name="insti_id" class="form-control" type="hidden" value="<?php echo $userId; ?>">
        <input name="stu_id" value="<?php echo rand(0,100000); ?>" type="hidden">
        <input name="rol_no" value="<?php echo rand(0,100000); ?>" type="hidden">
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
            <label class="text-capitalize fw-bold">CSV Upload</label>
<div class="input-group">
    <input type="file" class="form-control" name="files">
    <button type="submit" class="btn btn-apna text-uppercase" name="csv_btn" accept=".csv"><i class="fa-solid fa-file-import"></i> Import</button>
</div>
        </div>
    </div>
</form>
<?php
if (isset($_POST['csv_btn'])){
    
    if ($_FILES['files']['name']){
        $filename = explode(".",$_FILES['files']['name']);
        if($filename[1]=="csv"){
            $handle = fopen($_FILES['files']['tmp_name'],"r");
            while($data = fgetcsv($handle)){
    $insti_id = $_POST['insti_id'];
    $ad_date = mysqli_real_escape_string($con,$data[0]);
    $fmly_id = mysqli_real_escape_string($con,$data[1]);
    $rol_no = mysqli_real_escape_string($con,$data[2]);
    $clas = mysqli_real_escape_string($con,$data[3]);
    $sectn = mysqli_real_escape_string($con,$data[4]);
    $medm = mysqli_real_escape_string($con,$data[5]);
    $sessn = mysqli_real_escape_string($con,$data[6]);
    $imgs = mysqli_real_escape_string($con,$data[7]);
    $stname = mysqli_real_escape_string($con,$data[8]);
    $bfrm = mysqli_real_escape_string($con,$data[9]);
    $gnder = mysqli_real_escape_string($con,$data[10]);
    $dtofbrth = mysqli_real_escape_string($con,$data[11]);
    $hmadres = mysqli_real_escape_string($con,$data[12]);
    $ftnme = mysqli_real_escape_string($con,$data[13]);
    $cnes = mysqli_real_escape_string($con,$data[14]);
    $cels = mysqli_real_escape_string($con,$data[15]);
    $mnthfe = mysqli_real_escape_string($con,$data[16]);
    $discnt = mysqli_real_escape_string($con,$data[17]);
    $finl_fe = mysqli_real_escape_string($con,$data[18]);
    $admnfee = mysqli_real_escape_string($con,$data[19]);
    $anulfnd = mysqli_real_escape_string($con,$data[20]);
    $boks = mysqli_real_escape_string($con,$data[21]);
    $unfrm = mysqli_real_escape_string($con,$data[22]);
    $statnry = mysqli_real_escape_string($con,$data[23]);
    $othrs = mysqli_real_escape_string($con,$data[24]);
    $totl_amnt = mysqli_real_escape_string($con,$data[25]);


 $itms_uplod = mysqli_query($con,"insert into addStudents(instituteId,admissionDate,familyId,roll_num,class,section,medium,session,image,studentName,bForm,gender,dateOfBirth,homeAddress,fatherName,cnic,cell,monthlyFee,discount,totalFee,admissionFee,annualFund,books,uniform,stationary,others,totalAmount)values('$insti_id','$ad_date','$fmly_id','$rol_no','$clas','$sectn','$medm','$sessn','$imgs','".$stname."','$bfrm','$gnder','$dtofbrth','$hmadres','$ftnme','$cnes','$cels','$mnthfe','$discnt','$finl_fe','$admnfee','$anulfnd','$boks','$unfrm','$statnry','$othrs','$totl_amnt')");  
if($itms_uplod){ echo "<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'File Successfully Import!'
})
</script>"; }else{ echo "<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: 'CSV is not Import!'
})
</script>"; }


            }
            fclose($handle);
//echo "<script>swal('Good Job!', 'CSV File Successfully Submited!', 'success');</script>";
        }
    }
}
?>

</div>
<?php require_once("source/foot-section.php"); ?>
<!-- Modal -->
<div class="modal fade" id="adstdntvideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">Add Staff</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<div class="row">
    <div class="col-12">
<iframe width="100%" src="https://www.youtube.com/embed/eo9srv-gyW4?si=hRp45Zh60zvGxKl8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
</div>
      </div>
      
    </div>
  </div>
</div>
<!-----End Modal--------->