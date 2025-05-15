<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid mb-3">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#clection"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> new admission collection</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-6 mb-3">
<form id="newFormcollection">
<div class="input-group mb-4">
    <input type="text" id="searchbar" class="form-control" placeholder="Enter Roll No# Search">
    <input type="hidden" id="institue" class="form-control" required value="<?php echo $userId; ?>">
    <button type="submit" id="searchbtn" class="btn btn-apna text-uppercase"><i class="fas fa-search"></i> search</button>
</div>
</form>
</div>
    </div>
<div class="row">
    <div class="col mb-3">
<div id="new-fee-colect"></div>
    </div>
</div>    
    
<script>
$(document).ready(function(){
    $("#searchbtn").on('click',function(e){
        e.preventDefault();
        var searchBar = $("#searchbar").val();
        var instiId = $("#institue").val();
//        alert(instiId);
        
if(searchBar == ""){
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
      title: "Please Enter Roll#!"
    });
}else{
    
    $.ajax({
    url: 'ajax/ajax-new-admission-collection.php',
    type: "POST",
    data: {search_btn:searchBar,insti_id:instiId},
    success: function(datas){
        $("#new-fee-colect").html(datas);

    }
        });
}    

    });             
});
</script>   
</div>

<?php require_once("source/foot-section.php"); ?>
