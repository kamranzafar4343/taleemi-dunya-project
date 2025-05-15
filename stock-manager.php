<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#stock"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='stock-in'"> add stock</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> stock manager</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
<table class="table table-responsive w-100">
    <tr class="bg-apna">
        <th>Sr#</th>
        <th>Bill#</th>
        <th>Name</th>
        <th>Business Type</th>
        <th>Item Title</th>
        <th>Qty</th>
        <th>Unit Price</th>
        <th>Total Price</th>
        <th>Bill</th>
    </tr>
<?php
$bi = 1;
$sl_blck = mysqli_query($con,"select * from addStock where instituteId='$userId'");
if(mysqli_num_rows($sl_blck)>0){
    while($bi <= 100000 && $results = mysqli_fetch_array($sl_blck)){

$bill_no = $results['bill_no'];
$name = $results['name'];
$business_type = $results['business_type'];
$item_title = $results['item_title'];
$qty = $results['qty'];
$unit_price = $results['unit_price'];
$total_price = $results['total_price'];
$attach_bill = $results['attach_bill'];
?>
<tr style="background:hsl(35, 100%, 80%);">
    <th style="border:1px solid hsl(25, 100%, 50%);"><?php echo $bi++; ?></th>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $bill_no; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $name; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $business_type; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $item_title; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $qty; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $unit_price; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $total_price; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" width="80">
<?php if(empty($attach_bill)){ echo "<a href='#' class='btn btn-secondary text-capitalize'>no bill</a>"; } else{ ?>
    <img src="add-stock-bills/<?php echo $attach_bill; ?>" class="img-fluid">
<?php } ?>
    </td>
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