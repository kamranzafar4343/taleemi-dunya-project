<?php
require_once("../functions/db.php");

$edit_idps = $_POST['edit_idps'];

$sel_dybok = mysqli_query($con,"select * from dayBook where id='$edit_idps'");
$result = mysqli_fetch_assoc($sel_dybok);
$id = $result['id'];
$date = $result['date'];
$user_id = $result['user_id'];
?>
<form class="updtFrm">
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-3">
        <label class="fs-6 text-capitalize">Date</label> <span class="text-warning"> (<?php echo $date; ?>)</span>
        <input class="form-control dydate" type="date">
        <div id="dtemsg"></div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-3">
        <label class="fs-6 text-capitalize">User ID#</label>
        <input class="form-control dyusrid" type="text" value="<?php echo $user_id; ?>">
    </div>
    <input type="hidden" value="<?php echo $id; ?>" class="rcrds">
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-3 mt-4">
        <div class="d-grid gap-3">
<button class="btn btn-apna text-uppercase updtbtn" type="submit"> <i class="fa-solid fa-arrow-rotate-right"></i> update</button>
        </div>
    </div>
</div>
</form>
<script>
$(document).ready(function(){
$(".updtbtn").on('click',function(e){
e.preventDefault();
var dydate = $(".dydate").val();
var dyusrid = $(".dyusrid").val();
var rcrds = $(".rcrds").val();
if(dydate == ""){
document.getElementById("dtemsg").innerHTML="<div class='alert alert-success p-2'>Please Choose Date!</div>";
}else{
    $.ajax({
url: 'ajax/update-day-book.php',
type: "POST",
data: {day_dtes:dydate,day_rols:dyusrid,day_id:rcrds},
success: function(updtdays){
    if(updtdays == 1){
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
  title: "Day Book Record Update Successfully!"
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
  icon: "info",
  title: "Day Book Record is not Update!"
});
    }
}
    });
}
    });
});
</script>