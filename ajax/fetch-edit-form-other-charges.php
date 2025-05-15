<?php
require_once("../functions/db.php");

$othr_id = $_POST['othr_id'];

$select_othr = mysqli_query($con,"select * from addOtherChargesDecieded where id='$othr_id'");
$fech = mysqli_fetch_assoc($select_othr);
$idps = $fech['id'];
$charges_title = $fech['charges_title'];
$charges_amount = $fech['charges_amount'];
$types = $fech['type'];
?>
<form class="othrFrm">
    <div class="row">
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <input value="<?php echo $charges_title; ?>" class="form-control" name="tiles" type="text">
            <input value="<?php echo $idps; ?>" class="form-control" name="othrid" type="hidden">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <input value="<?php echo $charges_amount; ?>" class="form-control" name="amnt" type="text" onkeypress="isInputNumber(event)">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <select class="form-select text-capitalize tps">
<option class="text-capitalize" value="<?php echo $types; ?>"><?php if($types == 1){ echo "monthly charges"; }elseif($types == 2){ echo "event charges"; }elseif($types == 3){ echo "Inventory"; }elseif($types == 4){ echo "exam charges"; }?></option>
<option class="text-capitalize" value="1">monthly charges</option>
<option class="text-capitalize" value="2">event charges</option>
<option class="text-capitalize" value="3">Inventory</option>
<option class="text-capitalize" value="4">exam charges</option>
            </select>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <div class="d-grid">
<button type="submit" class="btn btn-apna text-uppercase" id="editsothers"> 
    <i class="fa-solid fa-arrow-rotate-right"></i> update
</button>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <a href="#" onclick="remvoe()"><i class="fa-solid fa-xmark text-danger"></i></a>
        </div>
    </div>
</form>
<script>
function remvoe(){
    $(".othrFrm").remove();
}
$(document).ready(function(){
    $("#editsothers").on('click',function(e){
e.preventDefault();

var tiles = $('input[name="tiles"]').val();
var othrid = $('input[name="othrid"]').val();
var amnt = $('input[name="amnt"]').val();
var tps = $('.tps').val();

$.ajax({
    url: 'ajax/edit-other-charges.php',
    type: "POST",
    data: {othr_title:tiles,oth_ids:othrid,amounts:amnt,orgnl_typs:tps},
success: function(datas){
if(datas == 1){
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "Other Charges Update Successfully!"
});
}else{
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "error",
  title: "Other Charges is not Update!"
});
    }
}
    });   

    });
    
});
</script>