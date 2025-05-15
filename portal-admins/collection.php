<?php require_once("source/header.php"); require_once("source/navbar.php"); require_once("source/sidebar.php"); ?>
<style> textarea { resize: none; } </style>
<main id="main" class="main">

    <div class="pagetitle p-0">
      <h1>Collection</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-capitalize" href="javascript:void()" onclick="location.href='home'">Home</a></li>
          <li class="breadcrumb-item active text-capitalize">individual collection</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section p-0">
<div class="row">
    <div class="offset-6 col-3 mb-3">
<div class="d-grid">
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#instlnmelist">Find Institute ID</button>
</div>
        </div>
        <div class="col-3 mb-3">
<div class="d-grid">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create Installments</button>
</div>
        </div>
</div>
      <div class="row">
        <div class="col-lg-12">
<div class="card">
    <div class="card-body">
        <h5 class="card-title text-capitalize">individual collection</h5>
        <!-- General Form Elements -->
<form id="feeForm">
    <div class="row">
        <div class="col-3 mb-3">
    <label class="text-capitalize">institute iD</label>
    <input type="text" class="form-control vlu" onkeypress="isInputNumber(event)">
        </div>
        <div class="col-3 mb-3">
    <label class="text-capitalize">Month</label>
    <select class="text-capitalize form-select mnths">
        <option class="text-capitalize" value="<?php echo date("m"); ?>"><?php echo date("M"); ?></option>
        <option class="text-capitalize" value="01">jan</option>
        <option class="text-capitalize" value="02">feb</option>
        <option class="text-capitalize" value="03">mar</option>
        <option class="text-capitalize" value="04">apr</option>
        <option class="text-capitalize" value="05">may</option>
        <option class="text-capitalize" value="06">jun</option>
        <option class="text-capitalize" value="07">jul</option>
        <option class="text-capitalize" value="08">aug</option>
        <option class="text-capitalize" value="09">sep</option>
        <option class="text-capitalize" value="10">oct</option>
        <option class="text-capitalize" value="11">nov</option>
        <option class="text-capitalize" value="12">dec</option>
    </select>
        </div>
        <div class="col-3 mb-3">
    <label class="text-capitalize">Year</label>
    <select class="text-capitalize form-select yrs">
<?php
for($a=2024;$a<=2030;$a++){
    echo "<option>$a</option>";
}
?>
    </select>
        </div>
        <div class="col-3 mb-3 mt-4">
<button type="submit" class="btn btn-primary text-capitalize btnserch"><i class="bi bi-search"></i> search</button>
        </div>
    </div>
</form>
<script>
$(document).ready(function(){
    $(".btnserch").click(function(e){
e.preventDefault();
var vlu = $(".vlu").val();
var mnths = $(".mnths").val();
var yrs = $(".yrs").val();
if(vlu != ""){
    $.ajax({
url: 'ajax/charges-collection.php',
type: "POST",
data: {inst_ides:vlu,aply_month:mnths,sesion:yrs},
success: function(modls){
  $(".fee-serach-data").html(modls);

}
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
  icon: "info",
  title: "Please Enter the Institute ID!"
});
}
    });
});
</script>
<div class="fee-serach-data"></div>
    </div>
</div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
<?php require_once("source/footer.php"); ?>
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

<!-- Create Installment Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Installments</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form class="instlmentForm">
    <div class="row">
        <div class="col mb-3">
<label class="text-capitalize">Institute ID</label>
<input type="text" class="form-control instid" placeholder="Please Enter Institute ID#" onkeypress="isInputNumber(event)">
        </div>
        <div class="col mb-3">
<label class="text-capitalize">Installment</label>
<select class="form-select instlmnt">
    <option class="text-capitalize" value="1">1 installment</option>
    <option class="text-capitalize" value="2">2 installments</option>
    <option class="text-capitalize" value="3">3 installments</option>
    <option class="text-capitalize" value="4">4 installments</option>
    <option class="text-capitalize" value="5">5 installments</option>
    <option class="text-capitalize" value="6">6 installments</option>
    <option class="text-capitalize" value="7">7 installments</option>
    <option class="text-capitalize" value="8">8 installments</option>
    <option class="text-capitalize" value="9">9 installments</option>
    <option class="text-capitalize" value="10">10 installments</option>
    <option class="text-capitalize" value="11">11 installments</option>
    <option class="text-capitalize" value="12">12 installments</option>
</select>
        </div>
        <div class="col mb-3 mt-4">
<div class="d-grid">
    <button class="btn btn-primary text-capitalize gnrtebtn">Generate</button>
</div>
        </div>
    </div>
</form>
<div class="institute-installments-list"></div>
<script>
$(document).ready(function(){
    $(".gnrtebtn").on('click',function(e){
e.preventDefault();
var instid = $(".instid").val();
var instlmnt = $(".instlmnt").val();
if(instid != ""){
    $.ajax({
url: 'ajax/create-institute-installments.php',
type: "POST",
data: {institute_ids:instid,aply_instlmnt:instlmnt},
success: function(instpreser){
    $(".institute-installments-list").html(instpreser);
}
    });
}else{}
    });
});
</script>
      </div>
    </div>
  </div>
</div>