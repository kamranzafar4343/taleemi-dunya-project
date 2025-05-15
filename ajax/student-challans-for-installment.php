<?php
require_once("../functions/db.php");

$ins_id = $_POST['ins_id'];
$rol_no = $_POST['rol_no'];
$apl_sesins = $_POST['apl_sesins'];

$at=1;

$sel_inst_chlns = mysqli_query($con,"select * from fee_collection where instituteId='$ins_id' && rollno='$rol_no' && session='$apl_sesins' && challan_status='installment'");
$fils="";
if(mysqli_num_rows($sel_inst_chlns)>0){
$fils= "<table class='w-100 table table-responsive'><thead><tr class='bg-apna'><th>Sr#</th><th>Roll#</th><th>Due Date</th><th>Student Name</th><th>Father Name</th><th>Class</th><th>Section</th><th>Session</th><th>Fee</th><th>Month</th><th>Status</th><th>Challan</th><th>Edit</th><th>Del</th></tr></thead><tbody>";
    while($at <= 100000 && $frt = mysqli_fetch_array($sel_inst_chlns)){
$id = $frt['id'];
$instituteId = $frt['instituteId'];
$student_imgs = $frt['student_imgs'];
$rollno = $frt['rollno'];
$session = $frt['session'];
$student_name = $frt['student_name'];
$father_name = $frt['father_name'];
$class = $frt['class'];
$section = $frt['section'];
$monthly_fee = $frt['monthly_fee'];
$fees_status = $frt['fees_status'];
$due_dates = $frt['due_dates'];
$month = $frt['month'];
$monthName = date("M", mktime(0, 0, 0, $month, 10));

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];


$fils .= "<tr style='background:hsl(35, 100%, 80%);'>
<th style='border:1px solid hsl(25, 100%, 50%);'>".$at++."</th>
<td style='border:1px solid hsl(25, 100%, 50%);'>$rollno</td>
<td style='border:1px solid hsl(25, 100%, 50%);'>$due_dates</td>
<td style='border:1px solid hsl(25, 100%, 50%);' class='text-capitalize'>$student_name</td>
<td style='border:1px solid hsl(25, 100%, 50%);' class='text-capitalize'>$father_name</td>
<td style='border:1px solid hsl(25, 100%, 50%);' class='text-uppercase'>$class_name</td>
<td style='border:1px solid hsl(25, 100%, 50%);' class='text-uppercase'>$section</td>
<td style='border:1px solid hsl(25, 100%, 50%);'>$session</td>
<td style='border:1px solid hsl(25, 100%, 50%);'>$monthly_fee</td>
<td style='border:1px solid hsl(25, 100%, 50%);' class='text-capitalize'>$monthName</td>
<td style='border:1px solid hsl(25, 100%, 50%);' class='text-capitalize'>$fees_status</td>
<td style='border:1px solid hsl(25, 100%, 50%);'><a href='installment-challan?id=$id' target='_blank' class='btn'><i class='fa-solid fa-file-invoice' style='color:hsl(250,80%,40%);'></i></a></td>
<td style='border:1px solid hsl(25, 100%, 50%);'><a href='edit-installment-challan?id=$id' target='_blank' class='btn'><i class='text-success fa fa-edit'></i></a></td>
<td style='border:1px solid hsl(25, 100%, 50%);'><a href='#' target='_blank' class='btn trshbtn' rowid='$id'><i class='text-danger fa fa-trash-alt'></i></a></td>
</tr>";

    }
$fils .= "</tbody></table>";
echo $fils; 
}else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; }
?>
<script>
$(document).ready(function(){
    $(".trshbtn").on('click',function(e){
e.preventDefault();
var ids = $(this).attr("rowid");

$.ajax({
    url: 'ajax/delete-installment.php',
    type: "POST",
    data: {del_ids:ids},
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
  title: "Challan Successfully Delete!"
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
  title: "Challan is not Delete!"
});
}
    }
});

    });
});
</script>