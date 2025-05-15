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
<script> 
    // wait for the DOM to be loaded 
$(document).ready(function() { 
    $('#imgForm').ajaxForm({
        target:'#imagesPreview',
        beforeSubmit:function(){
            $('#uploadStatus').html('<p class="text-success text-capitalize">uploading file....</p>');
        },
        success:function(data){
        //    $('#images').val('');
            $('#imagesPreview').html(data);
        },
        error:function(){
            $('#uploadStatus').html('<p>Upload failed! Please try again.</p>');
        }
    }); 
}); 
</script>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Image File</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='home'">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='school-records'">School Records</a></li>
          <li class="breadcrumb-item active">Images Upload</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Images Upload</h5>

              <!-- General Form Elements -->
<form id="imgForm" method="post" enctype="multipart/form-data" action="upload-img.php"> 
<div class="input-group">
    <input type="file" class="form-control" name="images[]" id="images" multiple accept=".png,.jpg,.jpeg"/> 
    <button type="submit" class="btn btn-primary text-uppercase" name="submit">import</button> 
</div>
</form>
<div id="uploadStatus"></div>
<!-- gallery view of uploaded images --> 
<div class="gallery" id="imagesPreview"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
</main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>