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
          <li class="breadcrumb-item active">Inquiry</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
      <h5 class="card-title">User Information</h5>
              <!-- General Form Elements -->
<form class="frmSbit">
<div class="row mb-3">
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Date</label> 
        <input type="date" class="form-control inqdte">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Institute Name</label>
        <input type="text" class="form-control instnme">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Institute Type</label> 
        <select class="form-select insttype">
            <option>School</option>
            <option>Academy</option>
            <option>College</option>
            <option>Computer College</option>
            <option>Language Center</option>
        </select>
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Owner Name</label> 
        <input type="text" class="form-control ownrnme">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Whatsapp #</label>
        <input type="text" class="form-control whtsaps" onkeypress="isInputNumber(event)" maxlength="11">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Area</label> 
        <input type="text" class="form-control aras">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Status</label> 
        <select class="form-select text-capitalize stus">
            <option class="text-capitalize">confirmed</option>
            <option class="text-capitalize">not confirmed</option>
            <option class="text-capitalize">waiting</option>
            <option class="text-capitalize">no reply</option>
        </select>
    </div>
    <div class="col-sm-12 mb-3">
        <label for="inputText" class="col-form-label">Follow Up</label> 
        <textarea class="form-control folwup" rows="10" placeholder="Write Here......."></textarea>
    </div>
    <div class="col-sm-12" align="right">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary sbmits">Submit</button>
        </div>
    </div>
</div>
</form>
            </div>
        </div>

    </div>

</div>
    </section>
  </main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>
<script>
$(document).ready(function(){
    $(".sbmits").on('click',function(e){
e.preventDefault();

var inqdte = $(".inqdte").val();
var instnme = $(".instnme").val();
var insttype = $(".insttype").val();
var ownrnme = $(".ownrnme").val();
var whtsaps = $(".whtsaps").val();
var aras = $(".aras").val();
var stus = $(".stus").val();
var folwup = $(".folwup").val();

$.ajax({
    url: 'ajax/insert-call-inquiry.php',
    type: "POST",
    data: {inqry_date:inqdte,inst_nams:instnme,inst_typs:insttype,ownrs_name:ownrnme,whats_aps:whtsaps,inq_areas:aras,inq_status:stus,inq_flwup:folwup},
    success: function(requsts){ 
if(requsts == 1){
    const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "Inquiry Successfully Submited!"
});
}else{
    const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "error",
  title: "Inquiry is not Submited!"
});
}
    }
});

    });
});
</script>