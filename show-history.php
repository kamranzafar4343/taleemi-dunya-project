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
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='dispatch-history'"> dispatch history</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"><?php echo $vname; ?></li>
  </ol>
</nav>
<div class="container-fluid mt-4 ">
<div class="row datas">
    <div class="col-12 mb-3">
<table class="table table-responsive table-striped w-100 bg-white">
    <tr align="center">
        <th width="60"><img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid"></th>
        <th>
            <h4 class="fs-4 fw-bold text-uppercase"><?php echo $instituteName; ?></h4>
            <h6 class="fs-6 text-uppercase"><?php echo $campus; ?></h6>
        </th>
    </tr>
    <tr align="center"><th colspan="2">Vendor Name : <span class="text-capitalize"><?php echo $vname; ?></span></th></tr>
</table>
<table class="table table-responsive table-striped w-100 bg-white">
    <tr>
        <th style="padding:2px;font-size:0.8rem;">Sr#</th>
        <th style="padding:2px;font-size:0.8rem;">Date</th>
        <th style="padding:2px;font-size:0.8rem;">Item Title</th>
        <th style="padding:2px;font-size:0.8rem;">Purchase Unit</th>
        <th style="padding:2px;font-size:0.8rem;">Sale Unit</th>
        <th style="padding:2px;font-size:0.8rem;">Current Qty</th>
        <th style="padding:2px;font-size:0.8rem;">Dispatch Qty</th>
        <th style="padding:2px;font-size:0.8rem;">Remaining Qty</th>
        <th style="padding:2px;font-size:0.8rem;">Total Amount</th>
        <th style="padding:2px;font-size:0.8rem;">Receiver Name</th>
        <th style="padding:2px;font-size:0.8rem;">Dispatcher Name</th>
        <th style="padding:2px;font-size:0.8rem;">Status</th>
    </tr>
<?php
$a=1;
$sl_stck = mysqli_query($con,"select * from dispatchStock where instituteId='$userId' && vname='$vname'");
if(mysqli_num_rows($sl_stck)>0){
while($a <= 100000 && $strslt = mysqli_fetch_array($sl_stck)){
    $id = $strslt['id'];
    $vname = $strslt['vname'];
    $account_type = $strslt['account_type'];
    $item = $strslt['item'];
    $business_type = $strslt['business_type'];
    $item_title = $strslt['item_title'];
    $qty = $strslt['qty'];
    $dispatch_qty = $strslt['dispatch_qty'];
    $remaining_qty = $strslt['remaining_qty'];
    $unit_price = $strslt['unit_price'];
    $sale_unit_price = $strslt['sale_unit_price'];
    $total_price = $strslt['total_price'];
    $receiver_name = $strslt['receiver_name'];
    $dispatcher_name = $strslt['dispatcher_name'];
    $dispatch_date = $strslt['dispatch_date'];
    $totl = $sale_unit_price * $dispatch_qty;
?>
<tr>
    <th style="padding:2px;font-size:0.8rem;"><?php echo $a++; ?></th>
    <th style="padding:2px;font-size:0.8rem;"><?php echo $dispatch_date; ?></th>
    <td style="padding:2px;font-size:0.8rem;" class="text-capitalize"><?php echo $item_title; ?></td>
    <td style="padding:2px;font-size:0.8rem;"><?php echo $unit_price; ?></td>
    <td style="padding:2px;font-size:0.8rem;"><?php echo $sale_unit_price; ?></td>
    <td style="padding:2px;font-size:0.8rem;"><?php echo $qty; ?></td>
    <td style="padding:2px;font-size:0.8rem;"><?php echo $dispatch_qty; ?></td>
    <td style="padding:2px;font-size:0.8rem;"><?php echo $remaining_qty; ?></td>
    <td style="padding:2px;font-size:0.8rem;"><?php echo $totl; ?></td>
    <td style="padding:2px;font-size:0.8rem;" class="text-capitalize"><?php echo $receiver_name; ?></td>
    <td style="padding:2px;font-size:0.8rem;" class="text-capitalize"><?php echo $dispatcher_name; ?></td>
    <td style="padding:2px;font-size:0.8rem;" class="text-capitalize"><input type="text" disabled style="width:70px;"></td>
</tr>
<?php } }else{ echo "<div class='text-capitalize alert alert-danger'>there are no record found!</div>"; } ?>
</table>
    </div>


</div>

<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
    </div>
</div>

</div>
<script type="text/javascript">
$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>
<?php require_once("source/foot-section.php"); ?>