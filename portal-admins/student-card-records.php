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
          <li class="breadcrumb-item active">Assign Student Card#</li>
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
<form id="clsform">  
<div class="row">
    <input type="hidden" value="<?php echo $tblid; ?>" id="instutes">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xl-2 mb-3">
        <label class="text-capitalize">class</label>
        <select class="form-select text-capitalize" id="cls">
            <option class="text-capitalize" value=" " selected>---select class---</option>
<?php
$sl_cls = mysqli_query($con,"select * from addClass where institute_id='$tblid'");
while($reslt = mysqli_fetch_array($sl_cls)){
    $cid = $reslt['id'];
    $class_name = $reslt['class_name'];
?>
<option class="text-capitlaize" value="<?php echo $cid; ?>"><?php echo $class_name; ?></option>
<?php } ?>
        </select>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xl-2 mb-3">
<label class="text-capitalize text-white">Section</label>
<select class="form-select text-capitalize" id="strngs"><option value="" selected>select section</option></select>
    </div>
<script>
    /// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instutes').value;
//    console.log(class_name);
 
$.ajax({
   url:'../ajax/class-strength.php',
   type:"POST",
   data:{ class_title:class_name,institute_code:insti },
   success: function(result){
      $('#strngs').html(result);
    //  alert(result);
   }
    });
});
</script>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xl-2 mb-3">
<label class="text-capitalize text-white">session</label>
<select class="form-select text-capitalize" id="sesion">
    <?php
$sl_sesn = mysqli_query($con,"select * from addSession where institute_id='$tblid' order by id desc");
while($reslts = mysqli_fetch_array($sl_sesn)){
    $session = $reslts['session'];
?>
<option class="text-capitlaize"><?php echo $session; ?></option>
<?php } ?>
</select>
    </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xl-2 mb-3 mt-4">
<div class="d-grid">
    <button type="submit" class="btn btn-primary text-capitalize" id="btnSearch"><i class="fa fa-search"></i> search</button>
</div>
    </div>
</div>
</form>
<script>
$(document).ready(function(){
    $("#btnSearch").on('click',function(e){
e.preventDefault();
var clas = $("#cls").val();
var sectn = $("#strngs").val();
var sesn = $("#sesion").val();
var instCde = $("#instutes").val();

if(clas == ""){
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
  icon: 'info',
  title: 'Before Select Class'
})
}else if(sectn == ""){
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
  icon: 'info',
  title: 'Before Select Section!'
})
}else if(sesn == ""){
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
  icon: 'info',
  title: 'Before Select Session!'
})
}else if(instCde == ""){
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
  icon: 'info',
  title: 'Your Institute Code Error! Please Contact Developer'
})
}else{
    $.ajax({
        url: '../ajax/assign-card-fetch-record.php',
        type: "POST",
        data: {clased:clas,sectned:sectn,sesned:sesn,instCdeed:instCde},
        success:function(datas){ 
        //    console.log(datas); 
            $("#card-record").html(datas);
        }
    });
}
    });
});
</script>
<div class="row">
    <div class="col-12 mb-3">
<div id="card-record"></div>
    </div>
</div>

            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>