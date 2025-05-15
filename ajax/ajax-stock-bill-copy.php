<?php
require_once("../functions/db.php");

$bils_id = $_POST['bils_id'];
$ints_id = $_POST['ints_id'];

$sl_bils = mysqli_query($con,"select * from addStock where instituteId='$ints_id' && bill_no='$bils_id' group by bill_no");
if(mysqli_num_rows($sl_bils)>0){
    while($reuslt = mysqli_fetch_array($sl_bils)){
$vendor_id = $reuslt['vendor_id'];
$account_type = $reuslt['account_type'];
$items = $reuslt['items'];
$name = $reuslt['name'];
$business_type = $reuslt['business_type'];
$area = $reuslt['area'];
$item_title = $reuslt['item_title'];
$qty = $reuslt['qty'];
$unit_price = $reuslt['unit_price'];
$total_price = $reuslt['total_price'];
$bill_no = $reuslt['bill_no'];
    }
?>
<form id="pymtFrms">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<div class="card text-center">
    <a href="stock-bill-show?id=<?php echo $bill_no; ?>" class="nav-links bg-white p-3 px-4">
        <h4 class="fs-4 fw-bold text-uppercase text-center"><?php echo $name; ?></h4>
        <h6 class="fs-6 text-center text-secondary">Bill No#: <?php echo $bill_no; ?></h6>
    </a>
</div>
            </div>
        </div>
    </div>
</form>
<?php }else{ echo "<div class='alert alert-danger text-capitalize'>there are no record found!</div>"; } ?>