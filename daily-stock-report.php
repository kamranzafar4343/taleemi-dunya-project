<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#stock"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> daily inventory report</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col datas">
<table class="table table-responsive table-striped w-100 bg-white">
    <tr align="center">
        <th width="100">
<img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid">
        </th>
        <th colspan="10">
<h4 class="text-uppercase fs-4 fw-bold"><?php echo $instituteName; ?></h4>
<div class="text-capitalize">phone: <span class="fw-normal"><?php echo $mainphones; ?></span>&nbsp; cell: <span class="fw-normal"><?php echo $cell; ?></span> </div>
<div class="text-capitalize">address: <span class="fw-normal"><?php echo $mainaddress; ?></span> </div>
        </th>
    </tr>
    <tr align="center">
        <th>Sr.No</th>
        <th>Date</th>
        <th>Name</th>
        <th>Business Type</th>
        <th>Item Title</th>
        <th>Qty</th>
        <th>Unit Price</th>
        <th>Total Price</th>
        <th>Bill#</th>
    </tr>

<form method="post" enctype="multipart/form-data">
<?php    
$b = 1;

$nws = date("j-m-Y");
$mnth = date("m");
$sl_stud = mysqli_query($con,"select * from addStock where instituteId='$userId' && month='$mnth' && date='$nws' order by id desc");
$counts = mysqli_num_rows($sl_stud);
if($counts == 0){ echo "<div class='fs-6 text-capitalize alert alert-danger'>there are no record here.</div>"; }
while($b <= 100000 && $rows = mysqli_fetch_array($sl_stud)){
$studntid = $rows['id'];
$date = $rows['date'];
$name = $rows['name'];
$business_type = $rows['business_type'];
$item_title = $rows['item_title'];
$qty = $rows['qty'];
$unit_price = $rows['unit_price'];
$total_price = $rows['total_price'];
$bill_no = $rows['bill_no'];
?>
<tr align="center">
    <td><?php echo $b++; ?></td>
    <td><?php echo $date; ?></td>
    <td class="text-capitalize"><?php echo $name; ?></td>
    <td class="text-capitalize"><?php echo $business_type; ?></td>
    <td class="text-capitalize"><?php echo $item_title; ?></td>
    <td><?php echo $qty; ?></td>
    <td><?php echo $unit_price; ?></td>
    <td><?php echo $total_price; ?></td>
    <td><?php echo $bill_no; ?></td>
    <input type="hidden" value="<?php echo $userId; ?>" name="inst_id">
</tr>
<?php } ?>

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

<script type="text/javascript">
$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>
</div>
<?php require_once("source/foot-section.php"); ?>