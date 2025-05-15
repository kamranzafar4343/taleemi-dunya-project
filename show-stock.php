<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
<?php
if(isset($_GET['id'])){
    $vide = $_GET['id'];
    $sel_vndr = mysqli_query($con,"select * from vendorAccount where instituteId='$userId' && vids='$vide'");
    $vnme = mysqli_fetch_assoc($sel_vndr);
    $vname = $vnme['vname'];
}
?>
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#stock"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
<li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='stock-out'"> dispatch stock</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"><?php echo $vname; ?></li>
  </ol>
</nav>
<style>
.bg-danger-opacity{
    background-color:hsl(0, 100%, 74%);
}
.bg-success-opacity{
    background-color:hsl(112, 100%, 74%);
}
</style>
<div class="container-fluid mt-4">
<div class="row">
<?php
$sl_stck = mysqli_query($con,"select * from addStock where instituteId='$userId' && name='$vname'");
if(mysqli_num_rows($sl_stck)>0){
while($strslt = mysqli_fetch_array($sl_stck)){
    $id = $strslt['id'];
    $account_type = $strslt['account_type'];
    $items = $strslt['items'];
    $name = $strslt['name'];
    $business_type = $strslt['business_type'];
    $item_title = $strslt['item_title'];
    $qty = $strslt['qty'];
    $unit_price = $strslt['unit_price'];
    $total_price = $strslt['total_price'];
    $vendor_id = $strslt['vendor_id'];
$sl_remstk = mysqli_query($con,"select * from dispatchStock where instituteId='$userId' && vendor_id='$vendor_id' order by id desc limit 0,1");
$remstk = mysqli_fetch_assoc($sl_remstk);
$remaining_qty = $remstk['remaining_qty'];
?>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<a href="#" class="nav-links" data-bs-toggle="modal" data-bs-target="#vndr<?php echo $id; ?>" title="">
    <div class="card cards <?php if($remaining_qty <= 5){ echo "bg-danger-opacity"; }elseif($remaining_qty <= 10){ echo "bg-success-opacity"; }elseif($remaining_qty > 10){ echo "bg-white"; } ?>">
        <div class="card-body" align="center">
            <h4 class="fs-4 fw-bold text-capitalize"><?php echo $item_title; ?></h4>
<div class="d-flex">
    <div class="flex-fill p-2 text-center text-capitalize">qty</div>
    <div class="flex-fill p-2 text-center text-capitalize">U.P</div>
    <div class="flex-fill p-2 text-center text-capitalize">price</div>
</div>
<div class="d-flex">
    <div class="flex-fill p-2 text-center text-capitalize fw-normal"><?php if(!empty($remaining_qty)){ echo $remaining_qty; }else{ echo $qty; } ?></div>
    <div class="flex-fill p-2 text-center text-capitalize fw-normal"><?php echo $unit_price; ?></div>
    <div class="flex-fill p-2 text-center text-capitalize fw-normal"><?php echo $total_price; ?></div>
</div>
            
        </div>
    </div>
</a>
</div>
<!-- Modal -->
<div class="modal fade" id="vndr<?php echo $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel"><?php echo $item_title; ?></h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">Total Qty</label>
            <input class="form-control" value="<?php if(!empty($remaining_qty)){ echo $remaining_qty; }else{ echo $qty; } ?>" name="qties" type="text" onkeypress="isInputNumber(event)">
            <input class="form-control" value="<?php echo $vendor_id; ?>" name="itm_id" type="hidden">
            <input class="form-control" value="<?php echo $account_type; ?>" name="ac_type" type="hidden">
            <input class="form-control" value="<?php echo $items; ?>" name="stk_itm" type="hidden">
            <input class="form-control" value="<?php echo $name; ?>" name="stk_nme" type="hidden">
            <input class="form-control" value="<?php echo $business_type; ?>" name="busnes_type" type="hidden">
            <input class="form-control" value="<?php echo $item_title; ?>" name="stk_item_title" type="hidden">
            <input class="form-control" value="<?php echo $userId; ?>" name="inst_id" type="hidden">
            <input class="form-control" value="<?php echo $total_price; ?>" name="totl_prce" type="hidden">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">purchase (Per unit)</label>
            <input class="form-control" value="<?php echo $unit_price; ?>" name="unt_prce" type="text" onkeypress="isInputNumber(event)">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">Sale Price (Per Unit)</label>
            <input class="form-control" type="text" onkeypress="isInputNumber(event)" name="sale_prce">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">Dispatch Qty</label>
            <input class="form-control" type="text" onkeypress="isInputNumber(event)" name="disp_qty">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3 col-xxl-2 mb-3">
            <label class="text-capitalize">receiver Name</label>
            <input class="form-control" type="text" name="rec_nme">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3 col-xxl-2 mb-3">
            <label class="text-capitalize">Dispatcher Name</label>
            <input class="form-control" type="text" name="dis_nme">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-1 col-xxl-1 mb-3 mt-4">
            <button type="submit" class="btn btn-apna text-capitalize" name="btn_dipstch">dispatch</button>
        </div>
    </div>
</form>
      </div>
    </div>
  </div>
</div>
<?php } ?> 
 
<?php }else{ echo "<div class='text-capitalize alert alert-danger'>there are no record found!</div>"; } ?>

</div>
<?php
if(isset($_POST['btn_dipstch'])){
    
    $itm_id = $_POST['itm_id'];
    $stk_nme = $_POST['stk_nme'];
    $ac_type = $_POST['ac_type'];
    $stk_itm = $_POST['stk_itm'];
    $busnes_type = $_POST['busnes_type'];
    $stk_item_title = $_POST['stk_item_title'];
    $qties = $_POST['qties'];
    if(!empty($_POST['disp_qty'])){ $disp_qty = $_POST['disp_qty']; }else{ $disp_qty = "0"; }
    $unt_prce = $_POST['unt_prce'];
    $sale_prce = $_POST['sale_prce'];
    $totl_prce = $sale_prce * $disp_qty;
    $rec_nme = $_POST['rec_nme'];
    $dis_nme = $_POST['dis_nme'];
    $dip_mnth = date("m");
    $dip_dte = date("j-m-Y");
    $inst_id = $_POST['inst_id'];
    $rem_quty = $qties - $disp_qty;
    $tl_price = $rem_quty * $unt_prce;

 $ints_stck = mysqli_query($con,"insert into dispatchStock(vendor_id,vname,account_type,item,business_type,item_title,qty,dispatch_qty,remaining_qty,rem_total_price,unit_price,sale_unit_price,total_price,receiver_name,dispatcher_name,month,dispatch_date,instituteId)values('$itm_id','$stk_nme','$ac_type','$stk_itm','$busnes_type','$stk_item_title','$qties','$disp_qty','$rem_quty','$tl_price','$unt_prce','$sale_prce','$totl_prce','$rec_nme','$dis_nme','$dip_mnth','$dip_dte','$inst_id')");

if($ints_stck == true){ echo "<script>const Toast = Swal.mixin({
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
  title: 'Dispatch Successfully'
})</script>";
    header("Refresh:0;");
}else{ echo "<script>const Toast = Swal.mixin({
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
  title: 'Not Approved!'
})</script>"; }

}
?>
</div>

<?php require_once("source/foot-section.php"); ?>