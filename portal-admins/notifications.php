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
      <h1>Notifications</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='home'">Home</a></li>
          <li class="breadcrumb-item active">Notifications</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
<div class="d-flex">
    <div class="p-2 flex-fill">
      <h5 class="card-title">Notification Form</h5>  
    </div>
</div>
              <!-- General Form Elements -->
<form method="post" enctype="multipart/form-data">
<div class="row mb-3">
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Date</label> 
        <input type="date" class="form-control" name="apldte">
    </div>
    <div class="col-sm-12 mb-3">
        <label for="inputText" class="col-form-label">Remarks</label> 
        <textarea class="form-control txtarea" rows="3" name="rmrks"></textarea>
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
        <button name="sbmits" type="submit" class="btn btn-primary">Send</button>
    </div>
</div>
</form>
            </div>
          </div>
<?php
if(isset($_POST['sbmits'])){
    
    $apldte = $_POST['apldte'];
    $rmrks = mysqli_real_escape_string($con,$_POST['rmrks']);
    
    $inst_nofty = mysqli_query($con,"insert into adminNotifications(noti_date,notification)values('$apldte','$rmrks')");
    if($inst_nofty === true){
echo '<script>
Swal.fire({
  title: "Good job!",
  text: "Your Notification Successfully Send!",
  icon: "success"
});
</script>';
header("Refresh:0; url=notifications");
    }else{
echo '<script>
Swal.fire({
  title: "Sorry!",
  text: "Your Notification is not Send!",
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