<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#stock"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> vendor account</li>
  </ol>
</nav>
<div class="container-fluid mt-4">
    <div class="row bg-apna">
        <div class="col-10 py-2">
<h4 class="fs-4 fw-bold text-uppercase text-center">create vendor account</h4>
        </div>
        <div class="col-2" align="right">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#itms"><i class="fa-solid fa-plus"></i> Add Business Title</button>

<div class="modal fade" id="itms" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">add items</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" align="left">
<form id="aditmform">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-uppercase">Business Type</label>
<input type="hidden" value="<?php echo $userId; ?>" id="inst_id">
<input type="text" class="form-control" id="bstype" placeholder="Enter Business Type">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-uppercase">Business Item</label>
    <input type="text" class="form-control" id="bsnsitm" placeholder="Enter Business Item">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 mt-4">
    <button type="submit" id="btnitm" class="btn btn-apna text-uppercase"><i class="fa-solid fa-plus"></i> add business items</button>
        </div>
        
    </div>
</form> 
<div class="row mt-2">
<div id="vendr-items"></div>
</div>
      </div>
    </div>
  </div>
</div>

<script>
function fetchItems(){
    var schlId = $("#inst_id").val();
$.ajax({
url: 'ajax/ajax-fetch-items.php',
type: "POST",
data: {instu_ids:schlId},
success: function(datas){ $("#vendr-items").html(datas); }
    });
}
fetchItems();
$(document).ready(function(){
    $("#btnitm").on('click',function(e){
e.preventDefault();
var instIds = $("#inst_id").val();
var bsTpe = $("#bstype").val();
var bsnItm = $("#bsnsitm").val();
//console.log(itms);

if(bsTpe == ""){
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
  title: 'Please Enter Business Type!'
})
}else if(bsnItm == ""){
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
  title: 'Please Enter Business Item!'
})  
}else{
    $.ajax({
url: 'ajax/ajax-add-items.php',
type: "POST",
data: {inst_ids:instIds,busn_type:bsTpe,busn_items:bsnItm},
success: function(results){ if(results == 1){
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
  title: 'Item Successfully Added!'
})  
$("#aditmform").trigger("reset");
fetchItems();
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
  title: 'Item is not Added!'
})  
} }
    });
}

    });
});
</script>


        </div>
    </div>
<form id="vndrForm">
<div class="row" style='background:hsl(0,0%,15%);'>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Date of Joining</label>
        <input class="form-control" type="date" id="vdts">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize">Business Type</label>
<select class="form-select text-capitalize" id="coptype">
    <option class="text-capitalize" value=" ">---select business type---</option>
<?php
$sl_bus = mysqli_query($con,"select * from items where institute_id='$userId' group by business_type");
while($rslt = mysqli_fetch_array($sl_bus)){
    $business_type = $rslt['business_type'];
?>
<option class="text-capitalize"><?php echo $business_type; ?></option>
<?php } ?>
</select>        
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize">business items</label>
<select class="text-capitalize form-select" id="itmed">
    <option class="text-capitalize" value="">---select business item---</option>
</select>
    </div>
<script>
/// Class to Section
$('#coptype').on('change',function(){
 var businesTpe = this.value;
 var instIds = document.getElementById('inst_id').value;
 //   console.log(businesTpe);
$.ajax({
   url:'ajax/fetch-business-items.php',
   type:"POST",
   data:{busins_type:businesTpe,instite_code:instIds},
   success: function(result){
       $('#itmed').html(result);
   }
    });
});

</script>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Payment Mode</label>
        <select class="form-select text-capitalize" id="vacnt">
            <option class="text-capitalize" value=" ">---select type---</option>
            <option class="text-capitalize">Cash</option>
            <option class="text-capitalize">Credit</option>
        </select>
    </div>
</div>
<div class="row" style='background:hsl(0,0%,15%);'>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Vendor Name</label>
        <input type="text" class="form-control text-capitalize" placeholder="Enter Vendor Name" id="vnme" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
        <input type="hidden" class="form-control text-capitalize" value="<?php echo $userId; ?>" id="instusr">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Company Name</label>
        <input type="text" class="form-control text-capitalize" placeholder="Enter Company Name" id="copnme" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Company Email</label>
        <input type="email" class="form-control" placeholder="Enter Company Email" id="copmail">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Contact</label>
        <input type="text" class="form-control" placeholder="Enter Contact#" onkeypress="isInputNumber(event)" id="contct" maxlength="11">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Website Url</label>
        <input type="text" class="form-control" placeholder="Enter Company Website Url" id="copweb">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Reference</label>
        <input class="form-control" type="text" id="refrn" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Reference contact</label>
        <input class="form-control" type="text" onkeypress="isInputNumber(event)" maxlength="11" id="refcont">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-4 col-xxl-2 mb-3">
        <label class="text-capitalize">Vendor / Company Address</label>
        <input type="text" class="form-control text-capitalize" placeholder="Enter Address" id="coploc">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-4 col-xxl-2 mb-3">
        <label class="text-capitalize">remarks</label>
        <input type="text" class="form-control text-capitalize" placeholder="Enter Remarks" id="contnt">
    </div>
    
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mt-4" align="right">
        <div class="d-grid">
            <button type="submit" class="text-capitalize btn btn-success" id="vendbtn"><i class="fa fa-save"></i> save</button>
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
        url: 'ajax/ajax-vendor-added.php',
        type: "POST",
        data:{v_dts:vdtes,v_act_tp:vacnttp,vd_its:vnditms,vdr_nme:vndrNme,inti_usr:instiUsr,cp_nme:compNme,cp_mal:compMail,cp_ctct:compCntct,cp_type:compType,cp_web:compWeb,refnc:refrenc,ref_phne:refcntct,cp_loc:compLoc,rmrkes:rmrks},
        success: function(vendorresult){ 
if(vendorresult == 1){
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
  title: 'Vendor Account Successfully Created!'
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
  title: 'Vendor Account is not Created!'
})
}
        }
    });
}

    });
});
</script>
<hr style="border-bottom:1px dashed white;">
<div class="row mt-4">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
<div class="d-flex">
    <div class="flex-fill">
<h4 class="fs-4 fw-bold text-uppercase text-center bg-apna py-1">vendor manager</h4>
    </div>
    <div class="">
<form id="vdrForm">
    <div class="input-group">
<input type="search" placeholder="Enter Search Vendor Name" class="form-control bg-apna-opacity" id="vndrnames">
<button type="submit" class="btn btn-apna text-uppercase" id="serchvendr"><i class="fa fa-search"></i> search</button>
    </div>
</form>
<script>
$(document).ready(function(){
    $("#serchvendr").click(function(e){
e.preventDefault();
var vndNames = $("#vndrnames").val();
var instiIds = $("#instusr").val();
if(vndNames == ""){
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
  title: 'Item Successfully Added!'
})  
}else{
    $.ajax({
url: 'ajax/ajax-vendor-search.php',
type: "POST",
data: {vn_nams:vndNames,inst_ids:instiIds},
success: function(datavendorlist){
    $("#srch-vndr").html(datavendorlist);
    $("#vdrForm").trigger("reset");
}
    });
}


    });
});
</script>
    </div>
</div>
<table class="table table-responsive table-striped w-100">
    <tr style="background:hsl(35,100%,80%);border:1px solid hsl(25, 100%, 50%);" align="center">
        <th style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);">Sr#</th>
        <th style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);">Date</th>
        <th style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);">Vendor ID#</th>
        <th style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);">Payment Mode</th>
        <th style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);">Business Type</th>
        <th style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);">Business Item</th>
        <th style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);">Vendor Name</th>
        <th style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);">Contact#</th>
        <th style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);">Whatsapp</th>
        <th style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);">Deed</th>
        <th style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);">Card</th>
        <th style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);">BlackList</th>
        <th style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" colspan="2">Action</th>
    </tr>
    <tr style="background:hsl(35, 100%, 80%);"><td id="srch-vndr" colspan="20"></td></tr>
<?php
$ac = 1;
$sl_vnr = mysqli_query($con,"select * from vendorAccount where instituteId='$userId'");
if(mysqli_num_rows($sl_vnr)>0){
    while($ac <= 100000 && $vreslt = mysqli_fetch_array($sl_vnr)){
$ides = $vreslt['id'];
$dates = $vreslt['dates'];
$frmt = explode("-",$dates);
$dt = $frmt['2'];
$mnt = $frmt['1'];
$yr = $frmt['0'];
$fldte = $dt."-".$mnt."-".$yr;
$vids = $vreslt['vids'];
$type = $vreslt['type'];
$business_type = $vreslt['business_type'];
$items = $vreslt['items'];
$vname = $vreslt['vname'];
$contacts = $vreslt['contacts'];
?>
<tr style="background:hsl(35, 100%, 80%);">
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><?php echo $ac++; ?></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><?php echo $fldte; ?></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><?php echo $vids; ?></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $type; ?></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $business_type; ?></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $items; ?></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $vname; ?></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);"><?php echo $contacts; ?></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" align="center"><a href="vendor-whatsapp?id=<?php echo $ides; ?>"><i class="fa-brands fa-whatsapp text-success"></i></a></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" align="center"><a href="vendor-deed?id=<?php echo $ides; ?>"><i class="fa-regular fa-handshake text-danger"></i></a></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" align="center"><a href="vendor-card?id=<?php echo $ides; ?>"><i class="fa-regular fa-address-card" style="color:hsl(110,100%,40%);"></i></a></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" align="center"><a href="vendor-black-list?id=<?php echo $ides; ?>"><i class="fa-solid fa-ban text-black"></i></a></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" align="center"><a href="vendor-edit?id=<?php echo $ides; ?>"><i class="fa fa-edit text-success"></i></a></td>
    <td style="padding:2px;font-size:1rem;border:1px solid hsl(25, 100%, 50%);" align="center"><a href="vendor-del?id=<?php echo $ides; ?>"><i class="fa fa-trash-alt text-danger"></i></a></td>
</tr>
<?php
    }
}else{ echo "<div class='alert alert-danger text-capitalize'>there are no record found!</div>"; }
?>
</table>
    </div>
</div>
</div>
<?php require_once("source/foot-section.php"); ?>