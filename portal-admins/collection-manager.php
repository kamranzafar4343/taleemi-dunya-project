<?php require_once("source/header.php"); require_once("source/navbar.php"); require_once("source/sidebar.php"); ?>
<style> textarea { resize: none; } </style>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Collection</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-capitalize" href="javascript:void()" onclick="location.href='home'">Home</a></li>
          <li class="breadcrumb-item active text-capitalize">collection manager</li>
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
<h5 class="card-title text-capitalize">collection manager</h5>
    </div>
    <div class="p-2">
<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#instlnmelist">Find Institute ID</button>
    </div>
</div>
        <!-- General Form Elements -->
<div class="row">
    <div class="col-3 mb-3">
<label class="text-capitalize fs-6">Institute ID#</label>
<input type="text" class="form-control instid" placeholder="0000" onkeypress="isInputNumber(event)">
    </div>
    <div class="col-3 mb-3 mt-4">
<button type="submit" class="btn btn-primary text-capitalize gnbtn">generate</button>
    </div>
    <div class="col-12 mt-3">
<div class="fetch-installment-detail"></div>
    </div>
</div>

    </div>
</div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>
<script>
function installmentDetail(){
 $(document).ready(function(){
    $(".gnbtn").on('click',function(e){
e.preventDefault();
var instid = $(".instid").val();
if(instid != ""){
    $.ajax({
url: 'ajax/get-installments.php',
    type: "POST",
    data: {institute_ids:instid},
    success: function(ftchinstlmnts){ $(".fetch-installment-detail").html(ftchinstlmnts); }    
    });
    
}
    });
});
        }
installmentDetail();

$(document).on("click",".clctdelet",function(){
    var rmveid = $(this).attr('rowid');
    if(rmveid != ""){
$.ajax({
    url: 'ajax/delete-collection-manager.php',
    type: "POST",
    data: {del_id:rmveid},
    success: function(clectnremve){ 
if(clectnremve == 1){
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
  title: "Installment Successfully Delete!"
});
installmentDetail();
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
  title: "Installment Delete!"
});
}
        
    }
});
    }
});
</script>
  
  
  
  
  <!-- Create Installment Modal -->
<div class="modal fade" id="instlnmelist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Find Institute ID#</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form class="instlmentForm">
    <div class="row">
        <div class="col mb-3">
<label class="text-capitalize">Institute Name</label>
<input type="text" class="form-control instnmes" placeholder="Please Enter Institute Name">
        </div>
    </div>
</form>
<div class="row">
    <div class="col">
<div class="name-listing"></div>
    </div>
</div>
<script>
$(document).ready(function(){
    $(".instnmes").on('keyup',function(e){
e.preventDefault();
var instnames = $(this).val();

if(instnames != ""){
    $.ajax({
url: 'ajax/search-institute-ids.php',
type: "POST",
data: {institute_names:instnames},
success: function(instinmes){
    $(".name-listing").html(instinmes);
    $(".name-listing").css('display','block');
}
    });
}else{
    $(".name-listing").css('display','none');
}

    });
});
</script>
      </div>
    </div>
  </div>
</div>