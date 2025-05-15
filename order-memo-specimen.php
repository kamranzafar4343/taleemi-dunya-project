<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#stock"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='order-book'"> order book</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='order-book-manager'"> order book manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> order book cash memo</li>
  </ol>
</nav>
<?php
if(isset($_GET['id'])){
    $ordrid = $_GET['id'];
    $sl_ordrs = mysqli_query($con,"select * from orderBook where memo_id='$ordrid' && instituteId='$userId'");
$orders = mysqli_fetch_assoc($sl_ordrs);
$dates = $orders['dates'];
$frmt = explode("-",$dates);
$dt = $frmt['2'];
$mnt = $frmt['1'];
$yr = $frmt['0'];
$fdte = $dt."-".$mnt."-".$yr;
$company_name = $orders['company_name'];
$vendor_name = $orders['vendor_name'];
$remarks = $orders['remarks'];
$memo_id = $orders['memo_id'];
}
?>
<div class="container-fluid mt-4">
    <div class="row datas">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
<table class="w-100 bg-white">
    <tr align="center"><th colspan="5"class="p-0 text-uppercase fs-4 fw-bold"><?php echo $instituteName; ?></th></tr>
    <tr align="center"><td colspan="5"class="p-0 text-capitalize"><b>Contact:</b> <?php echo $cell; ?></td></tr>
    <tr align="center"><td colspan="5"class="p-0 text-capitalize"><b>Address:</b> <?php echo $mainaddress; ?></td></tr>
    <tr>
        <th style="font-size:0.7rem;" class="p-0">ID#</th>
        <td style="font-size:0.7rem;" class="p-0"><?php echo $memo_id; ?></td>
        <th style="font-size:0.7rem;" class="p-0">Date:</th>
        <td style="font-size:0.7rem;" class="p-0" colspan="2"><?php echo $fdte; ?></td>
    </tr>
    <tr><td class="p-0 text-capitalize" colspan="5"><b style="font-size:0.7rem;">Name: </b><span style="font-size:0.7rem;border-bottom:1px solid black;"class="px-5"><?php echo $vendor_name; ?></span></td></tr>
    <tr>
<td class="p-0 text-capitalize" style="font-size:0.7rem;" colspan="5"><b style="font-size:0.7rem;">remarks: </b><span style="font-size:0.7rem;border-bottom:1px solid black;"class="px-5"><?php echo $remarks; ?></span></td>
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
$ordsl = mysqli_query($con,"select * from orderBook where memo_id='$ordrid' && instituteId='$userId'");
while($dt <= 100 && $reslt_ordrs = mysqli_fetch_array($ordsl)){
    $item_title = $reslt_ordrs['item_title'];
    $qty = $reslt_ordrs['qty'];
    $qtys += $reslt_ordrs['qty'];
?>
    <tr>
        <th width="20" style="border:1px solid black;" class="p-0"><?php echo $dt++; ?></th>
        <td style="border:1px solid black;font-size:0.7rem;" class="p-0 text-capitalize"><?php echo $item_title; ?></td>
        <td width="30" style="border:1px solid black;text-align:center;font-size:0.7rem;" class="p-0"><?php echo $qty; ?></td>
        <td style="border:1px solid black;text-align:center;font-size:0.7rem;" class="py-1 p-0"><input type="text" disabled style="width:50px;"></td>
        <td style="border:1px solid black;text-align:center;font-size:0.7rem;" class="py-1 p-0"><input type="text" disabled style="width:50px;"></td>
    </tr>
<?php } ?>
    <tr>
        <th class="p-0"></th>
        <td class="p-0"></td>
        <th class="p-0" style="text-align:center;font-size:0.7rem;"><?php echo $qtys; ?></th>
        <td style="text-align:center;" class="py-1 p-0"><input type="text" disabled style="width:50px;"></td>
        <td style="text-align:center;" class="py-1 p-0"><input type="text" disabled style="width:50px;"></td>
    </tr>
    <tr>
        <th colspan="2">Authorize Signatures: _____________________</th>
        <th colspan="3">Vendor Signatures: _____________________</th>
    </tr>
</table>
        </div>
<hr>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
<table class="w-100 bg-white">
    <tr align="center"><th colspan="5"class="p-0 text-uppercase fs-4 fw-bold"><?php echo $instituteName; ?></th></tr>
    <tr align="center"><td colspan="5"class="p-0 text-capitalize"><b>Contact:</b> <?php echo $cell; ?></td></tr>
    <tr align="center"><td colspan="5"class="p-0 text-capitalize"><b>Address:</b> <?php echo $mainaddress; ?></td></tr>
    <tr>
        <th style="font-size:0.7rem;" class="p-0">ID#</th>
        <td style="font-size:0.7rem;" class="p-0"><?php echo $memo_id; ?></td>
        <th style="font-size:0.7rem;" class="p-0">Date:</th>
        <td style="font-size:0.7rem;" class="p-0" colspan="2"><?php echo $fdte; ?></td>
    </tr>
    <tr><td class="p-0 text-capitalize" colspan="5"><b style="font-size:0.7rem;">Name: </b><span style="font-size:0.7rem;border-bottom:1px solid black;"class="px-5"><?php echo $vendor_name; ?></span></td></tr>
    <tr>
<td class="p-0 text-capitalize" style="font-size:0.7rem;" colspan="5"><b style="font-size:0.7rem;">remarks: </b><span style="font-size:0.7rem;border-bottom:1px solid black;"class="px-5"><?php echo $remarks; ?></span></td>
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
$ordsl = mysqli_query($con,"select * from orderBook where memo_id='$ordrid' && instituteId='$userId'");
while($dt <= 100 && $reslt_ordrs = mysqli_fetch_array($ordsl)){
    $item_title = $reslt_ordrs['item_title'];
    $qty = $reslt_ordrs['qty'];
    $qtys += $reslt_ordrs['qty'];
?>
    <tr>
        <th width="20" style="border:1px solid black;" class="p-0"><?php echo $dt++; ?></th>
        <td style="border:1px solid black;font-size:0.7rem;" class="p-0 text-capitalize"><?php echo $item_title; ?></td>
        <td width="30" style="border:1px solid black;text-align:center;font-size:0.7rem;" class="p-0"><?php echo $qty; ?></td>
        <td style="border:1px solid black;text-align:center;font-size:0.7rem;" class="py-1 p-0"><input type="text" disabled style="width:50px;"></td>
        <td style="border:1px solid black;text-align:center;font-size:0.7rem;" class="py-1 p-0"><input type="text" disabled style="width:50px;"></td>
    </tr>
<?php } ?>
    <tr>
        <th class="p-0"></th>
        <td class="p-0"></td>
        <th class="p-0" style="text-align:center;font-size:0.7rem;"><?php echo $qtys; ?></th>
        <td style="text-align:center;" class="py-1 p-0"><input type="text" disabled style="width:50px;"></td>
        <td style="text-align:center;" class="py-1 p-0"><input type="text" disabled style="width:50px;"></td>
    </tr>
    <tr>
        <th colspan="2">Authorize Signatures: _____________________</th>
        <th colspan="3">Vendor Signatures: _____________________</th>
    </tr>
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