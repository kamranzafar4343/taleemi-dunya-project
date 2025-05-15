<?php require_once("source/header.php"); require_once("source/navbar.php"); require_once("source/sidebar.php"); ?>
<style>
    textarea {
  resize: none;
}
</style>
<?php
if(isset($_GET['id'])){
    $ids = $_GET['id'];
$sl_nmbr = mysqli_query($con,"select * from addStudents where id='$ids'");
$results = mysqli_fetch_assoc($sl_nmbr);
$id = $results['id'];
$studentName = $results['studentName'];
$digitalCard = $results['digitalCard'];
}
?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1 class="text-capitalize">Assign Number to <?php echo $studentName; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='home'">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='school-records'">School Records</a></li>
          <li class="breadcrumb-item active">Assign Card Number</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
    <div class="row">
        <div class="card p-5">
<form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
<label class="text-capitalize fw-bold mb-3">Enter Digital Card# Here</label>
<div class="input-group">
    <input name="nmbrs" class="form-control" type="text" onkeypress="isInputNumber(event)" value="<?php echo $digitalCard; ?>">
    <button name="btn_crd" type="submit" class="btn btn-primary text-capitalize">assign card</button>
</div>
                </div>
            </div>
</form>
        </div>
<?php
if(isset($_POST['btn_crd'])){
    $nmbrs = $_POST['nmbrs'];
$updt = mysqli_query($con,"update addStudents set digitalCard='$nmbrs' where id='$ids'");
if($updt){
    echo "<script>
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
  title: 'Digital Card Successfully Assign!'
})</script>";
}else{
    echo "<script>
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
  title: 'Digital Card is not Assign!'
})</script>";    
    }
}
?>
    </div>
    </section>

  </main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>