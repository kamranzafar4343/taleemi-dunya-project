<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#add-students"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> add siblings</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function(){ rolsnr.focus() }
</script>
<div class="container-fluid mt-4">
    <form id="serchSbling">
<div class="row">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">Family ID#</label>
        <input class="form-control" type="text" id="rolsnr" onkeypress="isInputNumber(event)" required>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <input type="hidden" value="<?php echo $userId; ?>" id="inst">
        <label class="text-capitalize">session</label>
<select id="sesn" class="form-select">
<?php
$cls_mnger = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $session = $clis['session'];
?>
    <option class="text-capitalize"><?php echo $session; ?></option>
<?php } ?>
</select>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mt-4">
        <div class="d-grid">
            <button id="btn-gen" type="submit" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> Generate form</button>
        </div>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 offset-lg-4 offset-sm-9 mt-4" align="right">
<a href="sibling-manager" target="_blank" class="btn btn-dark p-1" title="Sibling Manager"><i class="fa-solid fa-screwdriver-wrench"></i></a>
<a href="#" target="_blank" class="btn btn-danger p-1" title="Student Form Template"><i class="fa-solid fa-cloud-arrow-down"></i></a>
<a href="#" data-bs-toggle="modal" data-bs-target="#adstdntvideo" class="btn btn-success p-1" title="Video Help"><i class="fa-solid fa-video"></i></a>
    </div>
</div>
    </form>
<script>
$(document).ready(function(){
    $("#btn-gen").on('click',function(e){
        e.preventDefault();
var instf = $("#inst").val();
var sesnf = $("#sesn").val();
var fmly = $("#rolsnr").val();
if(fmly == ""){
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
  title: 'Please Fill the Family ID'
})
}else{
    $.ajax({
        url: 'ajax/ajax-family-tree.php',
        type: "POST",
        data: {instfs:instf,sesnfs:sesnf,fmlys:fmly},
        success: function(datas){
            //console.log(datas);
            $("#famly-tree").html(datas);
        }
    });
}

    });
});
</script>    
<br><br>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
<div id="search-sibling"></div>
<script>
$(document).ready(function(){
    $("#btn-gen").on('click',function(e){
        e.preventDefault();
var rolsnr = $("#rolsnr").val();
var inst = $("#inst").val();
var sesn = $("#sesn").val();
//console.log(inst);
if(rolsnr == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Enter the Family No#', showConfirmButton: false, timer: 1500 }); }else{
    $.ajax({
url:'ajax/ajax-search-student-for-sibling.php',
type: "POST",
data: {rolsnrs:rolsnr,insts:inst,sesns:sesn},
success: function(results){
    $("#search-sibling").html(results);
//    $("#serchSbling").trigger("reset");
    //console.log(results);
}
        
    });
}


    });
});
</script>
        </div>
<style>
.brdrs, .brdrs tr, .brdrs tr th, .brdrs tr td{
    border:2px solid black;
}
</style>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 mb-3">
<div id="famly-tree"></div>
        </div>
        
    </div> 
</div>
<?php require_once("source/foot-section.php"); ?>
<!-- Modal -->
<div class="modal fade" id="adstdntvideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">Add Staff</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<div class="row">
    <div class="col-12">
<iframe width="100%" src="https://www.youtube.com/embed/eo9srv-gyW4?si=hRp45Zh60zvGxKl8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
</div>
      </div>
      
    </div>
  </div>
</div>
<!-----End Modal--------->