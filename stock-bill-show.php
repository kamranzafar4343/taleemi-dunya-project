<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#stock"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='stock-billing'"> billing</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> show stock bill </li>
  </ol>
</nav>
<?php
if(isset($_GET['id'])){
    $ids = $_GET['id'];
    $sl_bil = mysqli_query($con,"select * from addStock where bill_no='$ids' && instituteId='$userId'");
    $result = mysqli_fetch_assoc($sl_bil);
$bill_no = $result['bill_no'];
$date = $result['date'];
$name = $result['name'];
$account_type = $result['account_type'];
$vendor_id = $result['vendor_id'];
$items = $result['items'];
$business_type = $result['business_type'];
$area = $result['area'];
$item_title = $result['item_title'];
$qty = $result['qty'];
$unit_price = $result['unit_price'];
$attach_bill = $result['attach_bill'];
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col mb-3 datas">
<table class="table table-responsive table-striped w-100 bg-white">
    <tr align="center">
        <th class="p-0" rowspan="2" width="70"><img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid"></th>
        <th colspan="4"class="p-0"><h4 class="text-center text-uppercase fs-4 fw-bold"><?php echo $instituteName; ?></h4></th>
    </tr>
    <tr align="center"><th colspan="4"class="p-0"><h6 class="fs-6 text-capitalize text-center"><?php echo $campus; ?></h6></th></tr>
    <tr align="center"><th colspan="5"class="p-0"><h6 class="fs-6 text-uppercase text-center fw-bold">use for clearance</h6></th></tr>
    <tr>
        <th class="p-0">Bill ID</th>
        <td class="p-0"><?php echo $bill_no; ?></td>
        <th class="p-0" colspan="2">Date</th>
        <td class="p-0"><?php echo $date; ?></td>
    </tr>
    <tr>
        <th class="p-0">Name</th>
        <td class="p-0"><?php echo $name; ?></td>
        <th class="p-0" colspan="2">Mode</th>
        <td class="p-0"><?php echo $account_type; ?></td>
    </tr>
    <tr><td colspan="5" class="p-2"></td></tr>
    <tr align="center" style="border:1px solid black;">
        <th width="20"style="border:1px solid black;font-size:0.7rem;" class="p-0">Sr#</th>
        <th style="border:1px solid black;font-size:0.7rem;" class="p-0">Particular</th>
        <th width="30" style="border:1px solid black;font-size:0.7rem;" class="p-0">Qty</th>
        <th style="border:1px solid black;font-size:0.7rem;" class="p-0">Unit Price</th>
        <th style="border:1px solid black;font-size:0.7rem;" class="p-0">Amount</th>
    </tr>
<?php
$dt = 1; 
$ordsl = mysqli_query($con,"select * from addStock where bill_no='$bill_no' && instituteId='$userId'");
while($dt <= 100 && $reslt_stock = mysqli_fetch_array($ordsl)){
    $item_title = $reslt_stock['item_title'];
    $qty = $reslt_stock['qty'];
    $qtys += $reslt_stock['qty'];
    $unit_price = $reslt_stock['unit_price'];
    $total_price = $reslt_stock['total_price'];
    $total_prices += $reslt_stock['total_price'];
?>
    <tr>
        <th width="20" style="border:1px solid black;" class="p-0"><?php echo $dt++; ?></th>
        <td style="border:1px solid black;font-size:0.7rem;" class="p-0 text-capitalize"><?php echo $item_title; ?></td>
        <td width="30" style="border:1px solid black;text-align:center;font-size:0.7rem;" class="p-0"><?php echo $qty; ?></td>
        <td style="border:1px solid black;text-align:center;font-size:0.7rem;" class="py-1 p-0"><?php echo $unit_price; ?></td>
        <td style="border:1px solid black;text-align:center;font-size:0.7rem;" class="py-1 p-0"><?php echo $total_price; ?></td>
    </tr>
<?php } ?>
    <tr>
        <th class="p-0"></th>
        <td class="p-0"></td>
        <th class="p-0" style="border:1px solid black;text-align:center;font-size:0.7rem;"><?php echo $qtys; ?></th>
        <td style="border:1px solid black;text-align:center;font-size:0.7rem;" class="py-1 p-0 text-uppercase fw-bold">total amount</td>
        <td style="border:1px solid black;text-align:center;font-size:0.7rem;" class="py-1 p-0 fw-bold"><?php echo $total_prices; ?></td>
    </tr>
    <tr>
        <th colspan="2">Authorize Signatures: _____________________</th>
        <th colspan="3">Vendor Signatures: _____________________</th>
    </tr>
</table>
        </div>
        <div class="col mb-3">
            <img src="add-stock-bills/<?php if(!empty($attach_bill)){ echo $attach_bill; }else{ echo "empty-invoice.png"; } ?>" class="img-fluid">
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