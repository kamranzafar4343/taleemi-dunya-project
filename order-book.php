<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#stock"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> order book</li>
  </ol>
</nav>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
            <div class="card bg-apna">
                <div class="card-header">
<div class="d-flex">
    <div class="flex-fill"><h4 class="fs-4 fw-bold text-uppercase">order book</h4></div>
    <div class=""><a class="btn btn-primary text-capitalize p-1 px-4" href="order-book-manager"><i class="fa fa-cog"></i> order book manager</a></div>
</div>
                </div>
                <div class="card-body" style="background:hsl(0,0%,15%);">
<form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize fw-bold">order date</label>
        <input type="date" class="form-control" name="dts">
        <input type="hidden" class="form-control" value="<?php echo $userId; ?>" name="inst_ids">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize fw-bold">company name</label>
        <select class="form-select text-capitalize" name="com_nme">
            <option class="text-capitalize">---select company name---</option>
<?php
$sl_comp = mysqli_query($con,"select * from vendorAccount where instituteId='$userId'");
while($vn = mysqli_fetch_array($sl_comp)){
    $company_name = $vn['company_name'];
?>
    <option class="text-capitalize"><?php echo $company_name; ?></option>
<?php } ?>
        </select>
    </div>
<script>
$(document).ready(function(){
    $(".chosn").chosen();
});    
</script>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize fw-bold">vendor name</label>
        <input type="text" class="form-control" name="vdn_nme">
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
        <label class="text-capitalize fw-bold">remarks</label>
        <input type="text" class="form-control" name="rmks">
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
        <h6 class="fs-6 fw-bold text-uppercase" style="border-bottom:1px dashed black;">choose items</h6>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
        <table class="table table-bordered" id="dynamic_field">  
    <tr>  
         <td>
<label class="text-capitalize fw-bold">Item title</label>
<input type="text" name="titl[]" placeholder="Enter Item Name" class="form-control" />
        </td>  
         <td>
<label class="text-capitalize fw-bold">Qty</label>
<input type="text" name="qty[]" placeholder="Enter Qty" onkeypress="isInputNumber(event)" class="form-control" />
        </td>
<script>
$(document).ready(function(){
    var i=1; 
 $("#add").click(function(){
     i++; 
     $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="titl[]" placeholder="Enter Item Title" class="form-control" /></td><td><input type="text" name="qty[]" placeholder="Enter Qty" onkeypress="isInputNumber(event)" class="form-control"/></td><td><div class="d-grid"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="fa-solid fa-minus"></i></button></div></td></tr>');
 });

$(document).on('click', '.btn_remove', function(){  
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove();
                }); 

});
</script>
         <td>
<div class="d-grid mt-4">
    <button type="button" id="add" class="btn btn-success text-capitalize"><i class="fa-solid fa-plus"></i> add new items</button>
</div>
        </td>  
    </tr>
</table>
    </div>
    <div class="col-12 mb-3">
<div class="d-grid">
    <button class="btn btn-apna text-uppercase" type="submit" name="ordr_btn"><i class="fa-solid fa-jet-fighter"></i> order place</button>
</div>
    </div>
</div>
</form>
<?php
if(isset($_POST['ordr_btn'])){
    
    $com_nme = $_POST['com_nme'];
    $vdn_nme = $_POST['vdn_nme'];
    $rmks = $_POST['rmks'];
    $titl = $_POST['titl'];
    $qty = $_POST['qty'];
    $mnths = date("m");
    $dts = $_POST['dts'];
    $inst_ids = $_POST['inst_ids'];
    $unq_id = rand(10,100000);

foreach ($titl as $key => $value) {
  $inst_ordr = mysqli_query($con,"insert into orderBook (company_name,vendor_name,remarks,item_title,qty,months,dates,instituteId,memo_id) values ('$com_nme','$vdn_nme','$rmks','".$value."','".$qty[$key]."','$mnths','$dts','$inst_ids','$unq_id')");
                }
if($inst_ordr == true){
echo "<script>
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
  title: 'Order Place Successfully!'
})
</script>";
}else{
echo "<script>
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
  title: 'Order is not Place!'
})
</script>";
    }
}
?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>