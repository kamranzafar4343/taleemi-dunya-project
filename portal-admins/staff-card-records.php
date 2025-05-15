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
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='school-records'">School Records</a></li>
          <li class="breadcrumb-item active">Assign Staff Card#</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<?php
if(isset($_GET['id'])){
    $tblid = $_GET['id'];
}
?>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">File Information</h5>
              <!-- General Form Elements -->
<div class="row">
    <input type="hidden" value="<?php echo $tblid; ?>" id="instId">
<script>
function fetchCards(){
    var instutId = $("#instId").val();
$.ajax({
    url: '../ajax/ajax-fetch-staff-card.php',
    type: "POST",
    data: {instut_ids:instutId},
    success:function(resultcard){ 
//        console.log(resultcard); 
        $("#card-record-staff").html(resultcard);
    }
});
}
fetchCards()
</script>
    <div class="col-12 mb-3">
<div id="card-record-staff"></div>
    </div>
</div>

            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>