<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> class wise student list</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <form id="clasFrm">
<div class="row">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize fs-6">class</label>
<select class="form-select text-uppercase" id="cls">
    <option class="text-capitalize" value="">---select class---</option>
<?php
$cls_mnger = mysqli_query($con,"select * from addClass where institute_id='$userId'");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $class_name = $clis['class_name'];
?>
    <option class="text-capitalize" value="<?php echo $id; ?>"><?php echo $class_name; ?></option>
<?php } ?>
</select>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize text-white fs-6">Section</label>
<select class="form-select text-capitalize" id="strngs"><option value=" ">---select section---</option></select>
    </div>
<script>
/// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instutes').value;
//    console.log(class_name);
 
$.ajax({
   url:'ajax/class-strength.php',
   type:"POST",
   data:{ class_title:class_name,institute_code:insti },
   success: function(result){
       $('#strngs').html(result);
      //console.log(result);
   }
    });
});
 $(document).ready(function(){
    $("#classstudents").DataTable({
        columnDefs: [{
            "defaultContent": "-",
            "targets": "_all"
        }],
        bLengthChange: true,
        lengthMenu: [[10, 50, 100, -1], [10, 50, 100, "All"]],
        bFilter: true,
        bSort: true,
        bPaginate: true
    });
});
</script>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <input type="hidden" value="<?php echo $userId; ?>" name="inst" id="instutes">
        <label class="text-capitalize fs-6">session</label>
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
            <button id="btngenclas" type="submit" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> Generate</button>
        </div>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mt-4">
        <a href="admission-form-short" target="_blank" class="btn btn-primary" title="Student Manager"><i class="fa-solid fa-file-invoice"></i></a>
        <a href="#" class="btn btn-danger" title="Student Form Template"><i class="fa-solid fa-cloud-arrow-down"></i></a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#stdntmngervideo" class="btn btn-success" title="Video Help"><i class="fa-solid fa-video"></i></a>
    </div>
</div>
    </form>
<script type="text/javascript">
$(document).ready(function(){
    $("#btngenclas").on('click',function(e){
        e.preventDefault();
var cls = $("#cls").val();
var strngs = $("#strngs").val();
var instutes = $("#instutes").val();
var sesn = $("#sesn").val();

if(cls == ""){
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
  title: 'Please Select Class!'
})
}else if(strngs == ""){
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
  title: 'Please Select Section!'
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
  title: 'Please Select Session!'
})
}else{
    $.ajax({
url: 'ajax/fetch-class-wise-students.php',
type: "POST",
data: {cles:cls,sectn:strngs,sesin:sesn,inst_ids:instutes},
success: function(results){
    $(".class-wise-table-record").html(results);
}
    });
}

    });
});
</script>
<br>
<div class="class-wise-table-record"></div>
<div class="row">
    <div class="col-12" align="right">
      <button class='btn btn-primary text-capitalize' id='btn_print'><i class='fa fa-print'></i> Print</button>  
    </div>
</div>
<script>
    $("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>

</div>
<?php require_once("source/foot-section.php"); ?>
<!-- Modal -->
<div class="modal fade" id="stdntmngervideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">Add Staff</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<div class="row">
    <div class="col-12">
<iframe width="100%" src="https://www.youtube.com/embed/_LNF5KXJ7w0?si=s8OAhzoDQY_EH1km" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
</div>
      </div>
      
    </div>
  </div>
</div>
<!-----End Modal--------->