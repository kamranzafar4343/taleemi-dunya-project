<?php 
require_once("source/header.php"); 
require_once("source/navbar.php"); 
require_once("source/sidebar.php"); 
?>
<style>
    textarea {
  resize: none;
}
</style>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>CSV File</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='home'">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='school-records'">school records</a></li>
          <li class="breadcrumb-item active">CSV Records Upload</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
<?php
if(isset($_GET['id'])){
    $ids = $_GET['id'];
    $sl_gt = mysqli_query($con,"select * from confirmSchools where institute_id='$ids'");
    $result = mysqli_fetch_array($sl_gt);
    $institute_id = $result['institute_id'];
    $institute_name = strtolower($result['institute_name']);
}
?>
              <h5 class="card-title text-capitalize"><?php echo $institute_name; ?> Institute</h5>
              <!-- General Form Elements -->
<form method="post" enctype="multipart/form-data">
    <div class="row">
        <input name="insti_id" class="form-control" type="hidden" value="<?php echo $institute_id; ?>">
        <input name="stu_id" value="<?php echo rand(0,100000); ?>" type="hidden">
        <input name="rol_no" value="<?php echo rand(0,100000); ?>" type="hidden">
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3">
            <label class="text-capitalize fw-bold">CSV Upload</label>
<div class="input-group">
    <input type="file" class="form-control" name="files">
    <button type="submit" class="btn btn-primary text-uppercase" name="csv_btn" accept=".csv"><i class="fa-solid fa-file-import"></i> Import</button>
</div>
        </div>
    </div>
</form>
            </div>
          </div>
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
    $prev_record = mysqli_real_escape_string($con,$data[26]);


 $itms_uplod = mysqli_query($con,"insert into addStudents(instituteId,admissionDate,familyId,roll_num,class,section,medium,session,image,studentName,bForm,gender,dateOfBirth,homeAddress,fatherName,cnic,cell,monthlyFee,discount,totalFee,admissionFee,annualFund,books,uniform,stationary,others,totalAmount,previous_session_fee)values('$insti_id','$ad_date','$fmly_id','$rol_no','$clas','$sectn','$medm','$sessn','$imgs','".$stname."','$bfrm','$gnder','$dtofbrth','$hmadres','$ftnme','$cnes','$cels','$mnthfe','$discnt','$finl_fe','$admnfee','$anulfnd','$boks','$unfrm','$statnry','$othrs','$totl_amnt','$prev_record')");  
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
  title: 'File Successfully Import'
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
  title: 'CSV is not Import'
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

      </div>
    </section>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
<div class="card">
    <div class="card-body">
<h5 class="card-title text-capitalize"><?php echo $institute_name; ?> Institute Students Record</h5>
<table class="table datatable">
    <tr>
        <th scope="col">Sr#</th>
        <th scope="col">FID#</th>
        <th scope="col">Roll#</th>
        <th scope="col">Student Name</th>
        <th scope="col">Class</th>
        <th scope="col">Contact</th>
    </tr>
<?php
$a = 1; 
$sl_plt = mysqli_query($con,"select * from addStudents where instituteId='$ids'");
if(mysqli_num_rows($sl_plt)>0){
    while($a <= 100000 && $result = mysqli_fetch_array($sl_plt)){
$frmimage = $result['image'];
$familyId = $result['familyId'];
$roll_num = $result['roll_num'];
$studentName = $result['studentName'];
$fatherName = $result['fatherName'];
$class = $result['class'];
$section = $result['section'];
$cell = $result['cell'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<tr>
    <th><?php echo $a++; ?></th>
    <td><?php echo $familyId; ?></td>
    <td><?php echo $roll_num; ?></td>
    <td><?php echo $studentName; ?></td>
    <td class="text-uppercase"><?php echo $class_name; ?></td>
    <td><?php echo $cell; ?></td>
</tr>
<?php
    }
}else{ echo "<div class='alert alert-danger text-capitalize'>there are no record found!</div>"; }
?>
</table>
    </div>
</div>
        </div>
    </div>    
</section>

  </main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>