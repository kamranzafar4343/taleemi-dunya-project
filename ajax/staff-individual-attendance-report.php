<?php
require_once("../functions/db.php");

$aply_instute = $_POST['aply_instute'];
$aply_mnths = $_POST['aply_mnths'];
$aply_sesion = $_POST['aply_sesion'];
$aply_stafid = $_POST['aply_stafid'];

$instids = mysqli_query($con,"select * from confirmSchools where institute_id='$aply_instute'");
$rslts = mysqli_fetch_assoc($instids);
$institute_name = $rslts['institute_name'];
$campus = $rslts['campus'];
$logo = $rslts['logo'];

$staf = mysqli_query($con,"select * from addStaff where instituteId='$aply_instute' && session='$aply_sesion' && staffId='$aply_stafid'");
$result = mysqli_fetch_assoc($staf);
$staffimage = $result['staffimage'];
$staffName = $result['staffName'];
$fatherName = $result['fatherName'];
$staffId = $result['staffId'];

$tr = 1;
$sel_stfattnd = mysqli_query($con,"select * from staffAttendance where instituteId='$aply_instute' && staff_id='$aply_stafid' && month='$aply_mnths' && session='$aply_sesion' order by date asc");
if(mysqli_num_rows($sel_stfattnd)>0){
?>
<div class="fetch-old-attendance-history"></div>
<div class="row">
    <div class="col-12 mb-3">
<table class="w-100" style="background-color:hsl(35,100%,80%);">
    <tr>
        <th width="50">
<img src="portal-admins/institute-logos/<?php echo $logo; ?>" class="img-fluid">
        </th>
        <th colspan="6">
<h4 class="text-center fs-4 fw-bolder"><?php echo $institute_name; ?></h4>
<h6 class="text-center fs-6 fw-bold"><?php echo $campus; ?></h6>
        </th>
        <th width="50">
<img src="staff_imgs/<?php echo $staffimage; ?>" class="img-fluid">
        </th>
    </tr>
    <tr align="center">
        <th colspan="8" class="text-uppercase">Monthly Individual Report</th>
    </tr>
    <tr align="center">
        <th colspan="2" style="border:1px solid hsl(0,100%,0%);">Staff Name</th>
        <td style="border:1px solid hsl(0,100%,0%);"><?php echo $staffName; ?></td>
        <th style="border:1px solid hsl(0,100%,0%);">Father Name</th>
        <td style="border:1px solid hsl(0,100%,0%);"><?php echo $fatherName; ?></td>
        <th colspan="2" style="border:1px solid hsl(0,100%,0%);">Staff ID#</th>
        <td style="border:1px solid hsl(0,100%,0%);"><?php echo $staffId; ?></td>
    </tr>
    <tr class="bg-apna" align="center">
        <th style="border:1px solid hsl(0,100%,0%);">#</th>
        <th style="border:1px solid hsl(0,100%,0%);">Date</th>
        <th style="border:1px solid hsl(0,100%,0%);">Status</th>
        <th style="border:1px solid hsl(0,100%,0%);">Time In</th>
        <th style="border:1px solid hsl(0,100%,0%);">Time Out</th>
        <th style="border:1px solid hsl(0,100%,0%);">Month</th>
        <th style="border:1px solid hsl(0,100%,0%);">Edit</th>
        <th style="border:1px solid hsl(0,100%,0%);">Del</th>
    </tr>
<?php
while($tr <= 100000 && $clps = mysqli_fetch_array($sel_stfattnd)){
    
    $ids = $clps['id'];
    $date = $clps['date'];
    $status = $clps['status'];
    $att_time = $clps['att_time'];
    $time_out = $clps['time_out'];
    $month = $clps['month'];
    $monthName = date('M', mktime(0, 0, 0, $month, 10));
?>
<tr style="background-color:hsl(35,100%,80%);">
    <td style="border:1px solid hsl(0,100%,0%);"><?php echo $tr++; ?></td>
    <td style="border:1px solid hsl(0,100%,0%);"><?php echo $date; ?></td>
    <td style="border:1px solid hsl(0,100%,0%);"><?php echo $status; ?></td>
    <td style="border:1px solid hsl(0,100%,0%);"><?php echo $att_time; ?></td>
    <td style="border:1px solid hsl(0,100%,0%);"><?php echo $time_out; ?></td>
    <td style="border:1px solid hsl(0,100%,0%);"><?php echo $monthName; ?></td>
    <td style="border:1px solid hsl(0,100%,0%);">
<a href="#" class="rcrdeditbtn btn" rowid="<?php echo $ids; ?>"><i class="fa fa-edit text-success"></i></a>
    </td>
    <td style="border:1px solid hsl(0,100%,0%);">
<a href="#" class="atremvebtn btn" rowid="<?php echo $ids; ?>"><i class="fa fa-trash-alt text-danger"></i></a>
    </td>
</tr>
<?php } ?>
</table>
    </div>
</div>
<?php }else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; } ?>
<script>
$(document).ready(function(){
$(".rcrdeditbtn").on('click',function(){
var edtid = $(this).attr("rowid");
$.ajax({
    url: 'ajax/update-individual-record-for-attendance.php',
    type: "POST",
    data: {recrd_id:edtid},
    success: function(rcrds){ $(".fetch-old-attendance-history").html(rcrds); }
});
    });
    
/// Delete Record
    $(".atremvebtn").on('click',function(){
var atdids = $(this).attr("rowid");
$.ajax({
    url: 'ajax/staff-attendance-remove.php',
    type: "POST",
    data: {attdence_id:atdids},
    success: function(regstratedncremve){
if(regstratedncremve == 1){
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
  title: "Attendance Successfully Delete!"
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
  title: "Attendance is not Delete!"
});
}
    }
});
    });
});
</script>