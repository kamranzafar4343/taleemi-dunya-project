<?php
require_once("../functions/db.php");
$vdr_srch = $_POST['vdr_srch'];
$col_id = $_POST['col_id'];

$sl_srch_venr = mysqli_query($con,"select * from vendorAccount where instituteId LIKE '%$col_id%' && vname LIKE '%$vdr_srch%'");
if(mysqli_num_rows($sl_srch_venr)>0){
    while($relt = mysqli_fetch_array($sl_srch_venr)){
$vname = $relt['vname'];
$vids = $relt['vids'];
$business_type = $relt['business_type'];
$items = $relt['items'];
?>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xl-2 mb-3">
    <div class="card mb-3 text-center cards">
<a href="show-stock?id=<?php echo $vids; ?>" class="nav-links text-uppercase p-3 px-4 fs-4" style="background-color:hsl(0, 100%, 90%);">
            <?php echo $vname; ?>
            <h5 class="fs-5 text-secondary text-capitalize"><?php echo $business_type."<span style='font-size:0.8rem;'> (".$items.")</span>"; ?></h5>
        </a>
    </div> 
</div>
<?php
    }
}else{
    echo "<div class='alert alert-danger text-capitalize'>there are no record found!</div>";
}

?>