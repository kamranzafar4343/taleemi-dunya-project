<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#stock"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='order-book'"> order book</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> order manager</li>
  </ol>
</nav>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
<table class="table table-responsive w-100">
    <tr class="bg-apna">
        <th>Sr#</th>
        <th>Date</th>
        <th>Company</th>
        <th>Vendor</th>
        <th>Item Title</th>
        <th>Qty</th>
        <th>Memo</th>
    </tr>
<?php
$c= 1;
$sl_or = mysqli_query($con,"select * from orderBook where instituteId='$userId' group by memo_id");
if(mysqli_num_rows($sl_or)>0){
    while($c <= 100000 && $ordr = mysqli_fetch_array($sl_or)){
$dates = $ordr['dates'];
$frmt = explode("-",$dates);
$dte = $frmt['2'];
$mth = $frmt['1'];
$yrs = $frmt['0'];
$fuldte = $dte."-".$mth."-".$yrs;
$company_name = $ordr['company_name'];
$vendor_name = $ordr['vendor_name'];
$item_title = $ordr['item_title'];
$qty = $ordr['qty'];
$memo_id = $ordr['memo_id'];
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $c++; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $fuldte; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-capitalize"><?php echo $company_name; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-capitalize"><?php echo $vendor_name; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-capitalize"><?php echo $item_title; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $qty; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><a href="order-memo-specimen?id=<?php echo $memo_id; ?>" title=""><i class="fa-regular fa-rectangle-list text-success"></i></a></td>
</tr>
<?php
    }
}else{ echo "<div class='alert alert-danger text-capitalize'>there are no order place!</div>"; }
?>
</table>
        </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>