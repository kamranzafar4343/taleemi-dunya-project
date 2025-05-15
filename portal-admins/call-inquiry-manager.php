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
      <h1>Call Inquiry</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='home'">Home</a></li>
          <li class="breadcrumb-item active">Call Inquiry Manager</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
<div class="col-sm-12 col-lg-3">
    <label class="text-capitalize">Status</label>
    <select class="form-select text-capitalize lsttype">
        <option>confirmed</option>
        <option>not confirmed</option>
        <option>waiting</option>
        <option>no reply</option>
    </select>
</div>
<div class="col-sm-12 col-lg-3 mt-4">
    <div class="d-grid">
        <button class="text-capitalize btn btn-primary adinqrybtn" type="submit">add</button>
    </div>
</div>
      </div>
    </section>
  </main><!-- End #main -->
<?php require_once("source/footer.php"); ?>
<script>
    $(document).ready(function(){
$(".adinqrybtn").on('click',function(e){
    e.preventDefault();
var lsttype = $(".lsttype").val();
$.ajax({
    url: '',
    type: "",
    data: {},
    success: function(rject){ alert(rject); }
    
});
});
    });
</script>