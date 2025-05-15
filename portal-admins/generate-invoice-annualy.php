<?php require_once("source/header.php"); require_once("source/navbar.php"); require_once("source/sidebar.php"); ?>
<style> textarea { resize: none; } </style>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Collection</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-capitalize" href="javascript:void()" onclick="location.href='home'">Home</a></li>
          <li class="breadcrumb-item active text-capitalize">annnaly invoice generate</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
<div class="card">
    <div class="card-body">
        <h5 class="card-title text-capitalize">annnaly invoice generate</h5>
        <!-- General Form Elements -->
<div class="row">
    <div class="col mb-3">
<table class="table table-responsive table-striped w-100">
    <tr>
        <th>Sr#</th>
        <th>Code</th>
        <th>Type</th>
        <th>Plan</th>
        <th>Owner</th>
        <th>Institute</th>
        <th>Invoice</th>
    </tr>
<?php
$a = 1;
$sl_inv = mysqli_query($con,"select * from confirmSchools where assign_role='director' && plan='1 Year'");
while($a <= 100000 && $result = mysqli_fetch_array($sl_inv)){
    $id = $result['id'];
    $institute_id = $result['institute_id'];
    $account_type = $result['account_type'];
    $plan = $result['plan'];
    $owner_name = $result['owner_name'];
    $institute_name = $result['institute_name'];
    $yres = date("Y");
?>
<form id="invoiceForm">
<tr>
    <th><?php echo $a++; ?></th>
    <td><input type="text" value="<?php echo $institute_id; ?>" style="width:70px;"></td>
    <td><?php echo $account_type; ?></td>
    <td><?php echo $plan; ?></td>
    <td><?php echo $owner_name; ?></td>
    <td><?php echo $institute_name; ?></td>
    <td>
<?php
$sl_colctn = mysqli_query($con,"select * from schoolCollection where instituteId='$institute_id'");
$rlt = mysqli_fetch_array($sl_colctn);
$month = $rlt['month'];
$year = $rlt['year'];
if($year == $yres){
?>
<button href="#" class="btn btn-success text-capitalize" disabled><i class="bi bi-receipt-cutoff"></i> generate</button>
<?php }else{ ?>
<a href="generate-annualy-invoice?id=<?php echo $id; ?>" class="btn btn-success text-capitalize"><i class="bi bi-receipt-cutoff"></i> generate</a>
<?php } ?>
    </td>
</tr>
</form>
<?php } ?>
</table>
    </div>
</div>
    </div>
</div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>