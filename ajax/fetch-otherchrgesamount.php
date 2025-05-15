<?php
require_once("../functions/db.php");

$colge_cde = $_POST['colge_cde'];

$as =1;
$sl_tble = mysqli_query($con,"select * from addOtherChargesDecieded where instituteId='$colge_cde'");
$tbles = "";
if(mysqli_num_rows($sl_tble)>0){
$tbles .= "<table class='table table-responsive w-100'><tr class='bg-apna'><th>Sr#</th><th>Class</th><th>Chages Name</th><th>Amount</th><th>Type</th><th>Edit</th><th>Del</th></tr>";
while($as <= 10000 && $reslt = mysqli_fetch_array($sl_tble)){
    $id = $reslt['id'];
    $charges_title = $reslt['charges_title'];
    $charges_amount = $reslt['charges_amount'];
    $class = $reslt['class'];
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$colge_cde' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

    if($reslt['type'] == 1){ $types = "Monthly Charges"; }elseif($reslt['type'] == 2){ $types = "Event Charges"; }elseif($reslt['type'] == 3){ $types = "Inventory"; }elseif($reslt['type'] == 4){ $types = "Exame Charges"; }elseif($reslt['type'] == 5){ $types = "Late Fee Fine"; }else{ $types = "---"; }
$tbles .= "<tr style='background:hsl(35, 100%, 80%);'><td style='border:1px solid hsl(25, 100%, 50%);'>".$as++."</td><td style='border:1px solid hsl(25, 100%, 50%);' class='text-capitalize'>$class_name</td><td style='border:1px solid hsl(25, 100%, 50%);' class='text-capitalize'>$charges_title</td><td style='border:1px solid hsl(25, 100%, 50%);'>$charges_amount</td><td style='border:1px solid hsl(25, 100%, 50%);'>$types</td><td style='border:1px solid hsl(25, 100%, 50%);'><a href='#' class='editothrs' rowid='$id'><i class='fa fa-edit text-success'></i></a></td><td style='border:1px solid hsl(25, 100%, 50%);'><a href='#' class='othrdel' rowid='$id'><i class='fa fa-trash-alt text-danger'></i></a></td></tr>";
}
$tbles .= "</table>";
echo $tbles;
}else{ echo "<div class='text-capitalize alert alert-danger'>there are no record found!</div>"; }
?>
<script>
$(document).ready(function(){
    $(".editothrs").on('click',function(e){
e.preventDefault();
var edtothr = $(this).attr("rowid");
$.ajax({
url: 'ajax/fetch-edit-form-other-charges.php',
type: "POST",
data: {othr_id:edtothr},
success: function(dtsas){
    $(".edit-othrs").html(dtsas);
}
});
    });
    
    
    $(".othrdel").on('click',function(e){
e.preventDefault();
var othrtble = $(this).attr("rowid");
$.ajax({
    url:'ajax/del-other-charges.php',
    type: "POST",
    data: {ids:othrtble},
    success: function(reslts){
if(reslts == 1){
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
  title: "Other Charges Successfully Remove!"
});
window.location.reload();
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
  title: "Other Charges is not Remove!"
});
}
    }
});
    });
});
</script>