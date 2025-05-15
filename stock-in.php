<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#stock"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> add stock</li>
  </ol>
</nav>
<div class="container-fluid mt-4">
<form id="srchForm">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
<div class="d-flex">
    <div class=""><button class="btn btn-secondary text-capitalize fs-6">enter vendor ID#</button></div>
    <div class="flex-fill me-2">
<div class="input-group">
    <input type="hidden" class="text-capitalize form-control" value="<?php echo $userId; ?>" id="instids">
    <input type="text" class="text-capitalize form-control" onkeypress="isInputNumber(event)" id="srchvlues" placeholder="Enter Vendor#">
    <button class="btn btn-apna text-capitalize" id="srchbtns" type="submit"><i class="fa fa-search"></i> search</button>
</div>
    </div>
    <div class="">
<a class="btn btn-primary text-capitalize" href="javascript:void()" onclick="location.href='stock-manager'"><i class="fa fa-cog"></i> stock manager</a>
    </div>
</div>
        </div>
    </div>
</form>
  <div class="row" id="form-show-vendor">
        <div class="col-12">
<div class="card mb-3 bg-apna">
    <div class="card-header"><h4 class="fs-4 fw-bold text-uppercase text-center">general add stock</h4></div>
    <div class="card-body" style="background:hsl(0,0%,15%);">
<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fw-bold">purchasing date</label>
            <input class="form-control" type="date" name="stckdte">
            <input class="form-control" type="hidden" name="stinstid" value="<?php echo $userId; ?>">
            <input class="form-control" type="hidden" name="stc_id" value="<?php echo rand(10,100000); ?>">
            <input class="form-control" type="hidden" name="vendid" value="<?php echo rand(10,158000); ?>">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fw-bold">Payment Mode</label>
            <select class="form-select text-capitalize" name="sttpes">
                <option class="text-capitalize" value=" ">---select payment mode---</option>
                <option class="text-capitalize">cash</option>
                <option class="text-capitalize">credit</option>
            </select>
        </div>
            <input class="form-control text-capitalize" name="stbusnestps" type="hidden" value="Self">
            <input class="form-control text-capitalize" name="stitms" type="hidden" value="Self">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fw-bold">Purchase From</label>
            <input class="form-control text-capitalize" name="stnme" type="text" placeholder="Enter Shop Name">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fw-bold">stock location</label>
            <input class="form-control text-capitalize" name="stloc" type="text" placeholder="Enter Stock Location">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fw-bold">attach bill</label>
            <input class="form-control text-capitalize" type="file" name="bils">
        </div>
        <div class="col-12 mb-3">
<table class="table table-bordered" id="dynamic_field">  
    <tr>  
         <td>
<label class="text-capitalize fw-bold">Item Title</label>
<input type="text" name="titl[]" placeholder="Enter Item Name" class="form-control" />
        </td>  
         <td>
<label class="text-capitalize fw-bold">Qty</label>
<input type="text" name="qty[]" placeholder="Enter Qty" onkeypress="isInputNumber(event)" class="form-control" />
        </td>  
         <td>
<label class="text-capitalize fw-bold">Unit Price</label>
<input type="text" name="untprce[]" placeholder="Enter Unite Price" onkeypress="isInputNumber(event)" class="form-control" />
         </td>  
         <td>
<label class="text-capitalize fw-bold">Total Price</label>
<input type="text" name="tprce[]" placeholder="Enter Total Price" onkeypress="isInputNumber(event)" class="form-control" />
         </td>  
         <td>
             <label class="text-capitalize fw-bold">Add New Fields</label>
<div class="d-grid">
    <button type="button" id="add" class="btn btn-success"><i class="fa-solid fa-plus"></i></button>
</div>
        </td>  
    </tr>
</table> 
        </div>
        <div class="col-12 mb-3" align="right">
            <button class="btn btn-apna text-uppercase" name="stck_btns" type="submit"><i class="fa fa-save"></i> save</button>
        </div>
    </div>
</form>
<?php
if(isset($_POST['stck_btns'])){
    
    $vendid = $_POST['vendid'];
    $sttpes = $_POST['sttpes'];
    $stitms = $_POST['stitms'];
    $stnme = $_POST['stnme'];
    $stbusnestps = $_POST['stbusnestps'];
    $stloc = $_POST['stloc'];
    $titl = $_POST['titl'];
    $qty = $_POST['qty'];
    $untprce = $_POST['untprce'];
    $tprce = $_POST['tprce'];
    $bil = $_POST['stc_id'];
    $moth = date("m");
    $stckdte = $_POST['stckdte'];
    $stinstid = $_POST['stinstid'];
    
    $bils = $_FILES['bils']['name'];
    $bilstmp = $_FILES['bils']['tmp_name'];
    $allowed =  array('png' ,'jpg', 'pdf');
    $ext = pathinfo($bils, PATHINFO_EXTENSION);
    $path = "add-stock-bills/".$bils;
    move_uploaded_file($bilstmp,$path);

if(!in_array($ext,$allowed)){
    echo "<script>swal.fire('Attachment Rule Apply!',First Attach Your Bill in only PNG, JPG and PDF Formates.','warning');</script>";
}else{
foreach ($titl as $key => $value) {
  $inst_stck = mysqli_query($con,"insert into addStock(vendor_id,account_type,items,name,business_type,area,item_title,qty,unit_price,total_price,bill_no,month,date,instituteId,attach_bill) values ('$vendid','$sttpes','$stitms','$stnme','$stbusnestps','$stloc','".$value."','".$qty[$key]."','".$untprce[$key]."','".$tprce[$key]."','$bil','$moth','$stckdte','$stinstid','$bils')");    
  }
if($inst_stck == true){ echo "<script>swal.fire('Successfull');</script>"; }else{ echo "<script>swal.fire('Error');</script>"; }
        }
}

?>
    </div>
</div>
<script>
$(document).ready(function(){
    var i=1; 
 $("#add").click(function(){
     i++; 
     $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="titl[]" placeholder="Enter Item Name" class="form-control" /></td><td><input type="text" name="qty[]" placeholder="Enter Qty" onkeypress="isInputNumber(event)" class="form-control"/></td><td><input type="text" name="Untprce[]" placeholder="Enter Unite Price" onkeypress="isInputNumber(event)" class="form-control" /></td><td><input type="text" name="tprce[]" placeholder="Enter Total Price" onkeypress="isInputNumber(event)" class="form-control"/></td><td><div class="d-grid"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="fa-solid fa-minus"></i></button></div></td></tr>');
 });

$(document).on('click', '.btn_remove', function(){  
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove();
                }); 

});
</script>
        </div>
    </div>


</div>
<script>
$(document).ready(function(){
    $("#srchbtns").click(function(e){
e.preventDefault();
var insId = $("#instids").val();
var schVlus = $("#srchvlues").val();
if(schVlus == ""){
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
  title: 'Vendor Search Empty!'
})
}else{
 $.ajax({
     url: 'ajax/ajax-search-vendors.php',
     type: "POST",
     data: {ins_ed:insId,sch_vl:schVlus},
     success: function(data){
$("#form-show-vendor").html(data);
$("#srchForm").trigger("reset");
     }
 });
    
}
    });
});
</script>

<?php require_once("source/foot-section.php"); ?>