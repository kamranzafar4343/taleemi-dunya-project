<?php
require_once("../functions/db.php");

$ins_ed = $_POST['ins_ed'];
$sch_vl = $_POST['sch_vl'];

$sl_vndr = mysqli_query($con,"select * from vendorAccount where instituteId LIKE '%$ins_ed%' && vids LIKE '%$sch_vl%'");
if(mysqli_num_rows($sl_vndr)>0){
    while($veresult = mysqli_fetch_array($sl_vndr)){
$id = $veresult['id'];
$type = $veresult['type'];
$items = $veresult['items'];
$vname = $veresult['vname'];
$business_type = $veresult['business_type'];
$vids = $veresult['vids'];
$instituteId = $veresult['instituteId'];
?>

  <div class="row">
        <div class="col-12">
<div class="card mb-3 bg-apna">
    <div class="card-header"><h4 class="fs-4 fw-bold text-uppercase text-center"> add stock account of <?php echo $vname; ?> <span class="fs-6 text-white"> Vendor ID# <?php echo $vids; ?></span></h4></div>
    <div class="card-body" style="background:hsl(0,0%,15%);">
<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fw-bold">Purchasing date</label>
            <input class="form-control" type="date" name="stckdte">
            <input class="form-control" type="hidden" name="stinstid" value="<?php echo $instituteId; ?>">
            <input class="form-control" type="hidden" name="vendid" value="<?php echo $vids; ?>">
            <input class="form-control" type="hidden" name="stc_id" value="<?php echo rand(10,100000); ?>">
        </div>
            <input class="form-control text-capitalize" name="sttpes" type="hidden" value="<?php echo $type;?>">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fw-bold">business type</label>
            <input class="form-control text-capitalize" name="stbusnestps" type="text" value="<?php echo $business_type;?>">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fw-bold">Business item</label>
            <input class="form-control text-capitalize" name="stitms" type="text" value="<?php echo $items;?>">
        </div>
            <input class="form-control text-capitalize" name="stnme" type="hidden" value="<?php echo $vname;?>">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fw-bold">stock location</label>
            <input class="form-control text-capitalize" name="stloc" type="text" value="" placeholder="Enter Stock Location">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fw-bold">Attach Bill</label>
            <input class="form-control text-capitalize" name="bils" type="file" value="">
        </div>
        <div class="col-12 mb-3">
<table class="table table-bordered" id="dynamic_field">  
    <tr>  
         <td>
<label class="text-capitalize fw-bold">Item Title</label>
<input type="text" name="titl[]" placeholder="Enter Item Name" class="form-control" />
        </td>  
         <td>
<label class="text-capitalize fw-bold">Qty</label>
<input type="text" name="qty[]" placeholder="Enter Qty" onkeypress="isInputNumber(event)" class="form-control" />
        </td>  
         <td>
<label class="text-capitalize fw-bold">Unit Price</label>
<input type="text" name="untprce[]" placeholder="Enter Unite Price" onkeypress="isInputNumber(event)" class="form-control" />
         </td>  
         <td>
<label class="text-capitalize fw-bold">Total Price</label>
<input type="text" name="tprce[]" placeholder="Enter Total Price" onkeypress="isInputNumber(event)" class="form-control" />
         </td>  
         <td>
             <label class="text-capitalize fw-bold">Add New Fields</label>
<div class="d-grid">
    <button type="button" id="add" class="btn btn-success"><i class="fa-solid fa-plus"></i></button>
</div>
        </td>  
    </tr>
</table> 
        </div>
        <div class="col-12 mb-3" align="right">
            <button class="btn btn-apna text-uppercase" name="stck_btns" type="submit"><i class="fa fa-save"></i> save</button>
        </div>
    </div>
</form>

    </div>
</div>
<script>
$(document).ready(function(){
    var i=1; 
 $("#add").click(function(){
     i++; 
     $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="titl[]" placeholder="Enter Item Name" class="form-control" /></td><td><input type="text" name="qty[]" placeholder="Enter Qty" onkeypress="isInputNumber(event)" class="form-control"/></td><td><input type="text" name="Untprce[]" placeholder="Enter Unite Price" onkeypress="isInputNumber(event)" class="form-control" /></td><td><input type="text" name="tprce[]" placeholder="Enter Total Price" onkeypress="isInputNumber(event)" class="form-control"/></td><td><div class="d-grid"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="fa-solid fa-minus"></i></button></div></td></tr>');
 });

$(document).on('click', '.btn_remove', function(){  
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove();
                }); 

});
</script>
        </div>
    </div>
<?php
}
    }else{
    echo "<div class='alert alert-danger text-capitalize'>there are no record found!</div>";
}

?>