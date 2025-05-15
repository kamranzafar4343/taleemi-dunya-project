<?php
require_once("../functions/db.php");

$acls=1; 

$colgcod = $_POST['colgcodes'];

$sl_claseing = mysqli_query($con,"select * from addFees where instituteId='$colgcod'");
$outputs = "";
if(mysqli_num_rows($sl_claseing)>0){
    $outputs = "<table class='table table-responsive table-striped w-100' id='allstudents'>
<thead><tr class='bg-apna'><th>Sr#</td><th>Class</th><th>Monthly Fee</th><th>Discount</th><th>After Discount Fee</th><th>Action</th></tr></thead><tbody>";
    while($acls <= 1000000 && $resltcls = mysqli_fetch_array($sl_claseing)){
        $id = $resltcls['id'];
        $month_fee = $resltcls['month_fee'];
        $class_name = $resltcls['class_name'];
        $discount = $resltcls['discount'];
        $disc_fee = $month_fee * $discount/100;
        $dis_fes = $month_fee - $disc_fee;
        
$sl_clm = mysqli_query($con,"select * from addClass where id='$class_name' && institute_id='$colgcod'");
$rest = mysqli_fetch_assoc($sl_clm);
$class_names = $rest['class_name'];
        
$outputs .= "<tr id='".$id."' style='background:hsl(35, 100%, 80%);'><td style='border:1px solid hsl(25, 100%, 50%);'>".$acls++."</td><td style='border:1px solid hsl(25, 100%, 50%);' class='text-uppercase'>$class_names</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$month_fee</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$discount</td><td class='text-uppercase' style='border:1px solid hsl(25, 100%, 50%);'>$dis_fes</td><td style='border:1px solid hsl(25, 100%, 50%);'><button class='btn text-capitalize delete-btn' data-id='$id'><i class='fa fa-trash-alt text-danger'></i> </button></td></tr>";
    }
$outputs .= "</tbody></table>";

mysqli_close($con);
echo $outputs;
}else{
    echo "<div class='alert alert-danger text-capitalize'>record not found</div>";
}
?>
<input type="hidden" value="<?php echo $colgcod; ?>" id="clgsids">
<script>
function loadfeerecord(){
    var instid = $("#clgsids").val();
    $.ajax({
        url: 'ajax/ajax-fees-fetch-record.php',
        type: "POST",
        data:{colgcodes:instid},
        success: function(result){
            $("#tables-data").html(result);
        }
    });
}
    $(document).on("click",".delete-btn",function(){
        var stid = $(this).data("id");
$.ajax({
    url: 'ajax/delete-fee-by-class.php',
    type: "POST",
    data: {ids:stid},
    success: function(response){ 
if(response == 1){
loadfeerecord();
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Successfully Fee Delete!'
})
}else{
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: 'Fee is not Remove'
})
}
        
    }
    
});
    });
</script>    