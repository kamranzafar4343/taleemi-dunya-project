<?php require_once("source/header.php"); require_once("source/navbar.php"); require_once("source/sidebar.php"); ?>
<style>
    textarea {
  resize: none;
}
</style>
<?php
if(isset($_GET['id'])){
    $ids = $_GET['id'];
$sl_nmbr = mysqli_query($con,"select * from confirmSchools where institute_id='$ids'");
$results = mysqli_fetch_assoc($sl_nmbr);
$id = $results['id'];
$institute_id = $results['institute_id'];
$institute_name = $results['institute_name'];
$frmcell = $results['cell'];
}
?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1 class="text-capitalize">Whatsapp Send to <?php echo $institute_name; ?></h1>
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
<div class="row">
    <div class="col-12 mb-3">
        <input type="hidden" class="form-control" id="phones" value="<?php echo $frmcell; ?>">
<label class="text-capitalize">Message</label>
<textarea class="form-control" rows="20" placeholder="Write Message....." id="conts"></textarea>  
    </div>
    <div class="col-12" align="right">
<button type="button" onclick="whatsappSend()" class="btn btn-success text-capitalize"><i class="fa-brands fa-whatsapp"></i> Send on Whatsapp</button>
    </div>
</div>
        </div>
    </div>
    </section>
<script>
function whatsappSend(){

var phnes = document.getElementById("phones").value;
var conteing = document.getElementById("conts").value;
 
var url = "https://wa.me/"+phnes+"?text=%20"+conteing;
 
window.open(url,'_blank').focus();
}
</script>
  </main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>