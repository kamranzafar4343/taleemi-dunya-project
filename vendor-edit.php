<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#stock"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='create-vendor-account'">create vendor account</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> edit vendor account</li>
  </ol>
</nav>
<?php
if(isset($_GET['id'])){
    $ids = $_GET['id'];
$sl_act = mysqli_query($con,"select * from vendorAccount where id='$ids'");
$result = mysqli_fetch_assoc($sl_act);

$id = $result['id'];
$dates = $result['dates'];
$type = $result['type'];
$items = $result['items'];
$vname = $result['vname'];
$company_name = $result['company_name'];
$company_email = $result['company_email'];
$contacts = $result['contacts'];
$business_type = $result['business_type'];
$websites = $result['websites'];
$reference = $result['reference'];
$reference_phone = $result['reference_phone'];
$address = $result['address'];
$remarks = $result['remarks'];
$instituteId = $result['instituteId'];
    }
?>
<div class="container-fluid mt-4">
    <div class="row bg-apna">
        <div class="col-12">
<h4 class="fs-4 fw-bold text-uppercase text-center py-2">edit vendor account</h4>
        </div>
    </div>
<form id="vndrForm">
<div class="row" style="background:hsl(0,0%,15%);">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Date of Joining</label>
        <input class="form-control" type="date" id="vdts" value="<?php echo $dates; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Business Type</label>
        <input type="text" class="form-control text-capitalize" placeholder="Enter Business Type" id="coptype" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" value="<?php echo $business_type; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize">business items</label><span class="text-capitalize text-warning"> <?php echo "(".$items.")"; ?></span>
<select class="text-capitalize form-select" id="itmed">
    <option class="text-capitalize" value="">---select item---</option>
<?php
$sl_itms = mysqli_query($con,"select * from items where institute_id='$instituteId'");
while($result=mysqli_fetch_array($sl_itms)){
    $business_item = $result['business_item'];
?>
<option class="text-capitalize"><?php echo $business_item; ?></option>
<?php } ?>
</select>
        <input type="hidden" class="form-control text-capitalize" value="<?php echo $items; ?>" id="itmedold">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Payment Mode</label> <span class="text-capitalize text-warning"> <?php echo "(".$type.")"; ?></span>
        <select class="form-select text-capitalize" id="vacnt">
            <option class="text-capitalize"><?php echo $type; ?></option>
            <option class="text-capitalize">Cash</option>
            <option class="text-capitalize">Credit</option>
        </select>
    </div>
</div>
<div class="row" style="background:hsl(0,0%,15%);">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Vendor Name</label>
        <input type="text" class="form-control text-capitalize" placeholder="Enter Vendor Name" id="vnme" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" value="<?php echo $vname; ?>">
        <input type="hidden" class="form-control text-capitalize" value="<?php echo $userId; ?>" id="instusr">
        <input type="hidden" class="form-control text-capitalize" value="<?php echo $id; ?>" id="vnids">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Company Name</label>
        <input type="text" class="form-control text-capitalize" placeholder="Enter Company Name" id="copnme" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" value="<?php echo $company_name; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Company Email</label>
        <input type="email" class="form-control" placeholder="Enter Company Email" id="copmail" value="<?php echo $company_email; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Contact</label>
        <input type="text" class="form-control" placeholder="Enter Contact#" onkeypress="isInputNumber(event)" id="contct" maxlength="11" value="<?php echo $contacts; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Website Url</label>
        <input type="text" class="form-control" placeholder="Enter Company Website Url" id="copweb" value="<?php echo $websites; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Reference</label>
        <input class="form-control" type="text" id="refrn" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" value="<?php echo $reference; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Reference contact</label>
        <input class="form-control" type="text" onkeypress="isInputNumber(event)" maxlength="11" id="refcont" value="<?php echo $reference_phone; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-4 col-xxl-2 mb-3">
        <label class="text-capitalize">Vendor / Company Address</label>
        <input type="text" class="form-control text-capitalize" placeholder="Enter Address" id="coploc" value="<?php echo $address; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-4 col-xxl-2 mb-3">
        <label class="text-capitalize">remarks</label>
        <input type="text" class="form-control text-capitalize" placeholder="Enter Remarks" id="contnt" value="<?php echo $remarks; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-4 col-xxl-2 mt-4" align="right">
        <div class="d-grid">
            <button type="submit" class="text-capitalize btn btn-apna" id="vendbtn"> <i class="fa-solid fa-retweet"></i> update</button>
        </div>
    </div>
</div>
</form>

<script>
$(document).ready(function(){
    $("#vendbtn").click(function(e){
e.preventDefault();
var vdtes = $("#vdts").val();
var vacnttp = $("#vacnt").val();
var vnditms = $("#itmed").val();
var vndrNme = $("#vnme").val();
var instiUsr = $("#instusr").val();
var compNme = $("#copnme").val();
var compMail = $("#copmail").val();
var compCntct = $("#contct").val();
var compType = $("#coptype").val();
var compWeb = $("#copweb").val();
var refrenc = $("#refrn").val();
var refcntct = $("#refcont").val();
var compLoc = $("#coploc").val();
var rmrks = $("#contnt").val();
var vndIds = $("#vnids").val();

if(vnditms == ""){
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
  icon: 'warning',
  title: 'Please Select Vendor Item!'
})
}else if(vndrNme == ""){
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
  icon: 'warning',
  title: 'Please Enter Vendor Name!'
})
}else if(compNme == ""){
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
  icon: 'warning',
  title: 'Please Enter Company Name!'
})
}else if(compMail == ""){
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
  icon: 'warning',
  title: 'Please Enter Company Email!'
})
}else if(compCntct == ""){
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
  icon: 'warning',
  title: 'Please Enter Company Contact!'
})
}else if(compLoc == ""){
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
  icon: 'warning',
  title: 'Please Enter Company Location!'
})
}else{
    $.ajax({
        url: 'ajax/ajax-vendor-fetch.php',
        type: "POST",
        data:{v_dts:vdtes,v_act_tp:vacnttp,vd_its:vnditms,vdr_nme:vndrNme,inti_usr:instiUsr,cp_nme:compNme,cp_mal:compMail,cp_ctct:compCntct,cp_type:compType,cp_web:compWeb,refnc:refrenc,ref_phne:refcntct,cp_loc:compLoc,rmrkes:rmrks,vnder_id:vndIds},
        success: function(vendorresult){ 
if(vendorresult == 1){
location.reload(true);    
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
  icon: 'success',
  title: 'Vendor Account Successfully Update!'
})
}else{
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
  icon: 'error',
  title: 'Vendor Account is not Update!'
})
}

        }
    });
}

    });
});
</script>
</div>

<?php require_once("source/foot-section.php"); ?>