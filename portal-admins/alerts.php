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
      <h1>Alerts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='home'">Home</a></li>
          <li class="breadcrumb-item active">Alerts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<?php
$sel_alsts = mysqli_query($con,"select * from mainAlerts where id='1'");
$shws = mysqli_fetch_assoc($sel_alsts);
$content = $shws['content'];
?>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
<div class="d-flex">
    <div class="p-2 flex-fill">
      <h5 class="card-title">Alerts Form</h5>  
    </div>
</div>
              <!-- General Form Elements -->
<form method="post" enctype="multipart/form-data">
<div class="row mb-3">
    <div class="col-sm-12 mb-3">
        <label for="inputText" class="col-form-label">Remarks</label> 
        <textarea class="form-control txtarea" rows="3" name="rmrks"><?php echo $content; ?></textarea>
    </div><br><br>
<script>
ClassicEditor
    .create( document.querySelector( '.txtarea' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>
    <div class="col-sm-12" align="right">
        <button name="sbmits" type="submit" class="btn btn-primary">Update</button>
    </div>
</div>
</form>
            </div>
          </div>
<?php
if(isset($_POST['sbmits'])){
    $rmrks = mysqli_real_escape_string($con,$_POST['rmrks']);
    
    $updtealrt = mysqli_query($con,"update mainAlerts set content='$rmrks' where id='1'");
    if($updtealrt === true){
echo '<script>
Swal.fire({
  title: "Good job!",
  text: "Your Alert Successfully Update!",
  icon: "success"
});
</script>';
header("Refresh:0; url=alerts");
    }else{
echo '<script>
Swal.fire({
  title: "Sorry!",
  text: "Your Alert is not Update!",
  icon: "error"
});
</script>';
    }
}
?>
        </div>

      </div>
    </section>

  </main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>