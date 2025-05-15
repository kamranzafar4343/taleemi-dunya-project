<?php
require_once("../functions/db.php");

$aply_instute = $_POST['aply_instute'];
$aply_mnths = $_POST['aply_mnths'];
$aply_sesion = $_POST['aply_sesion'];



$tr = 1;
$sel_stfattnd = mysqli_query($con,"select * from staffAttendance where instituteId='$aply_instute' && session='$aply_sesion' && month='$aply_mnths' order by date asc");
if(mysqli_num_rows($sel_stfattnd)>0){
?>
<div class="fetch-old-attendance-history"></div>
<div class="row">
    <div class="col-12 mb-3">
<table class="w-100 bg-apna-body">
    <tr class="bg-apna">
        <th class="border-apna">#</th>
        <th class="border-apna" width="50">Image</th>
        <th class="border-apna">ID#</th>
        <th class="border-apna">Date</th>
        <th class="border-apna">Staff Name</th>
        <th class="border-apna">Status</th>
        <th class="border-apna">Time In</th>
        <th class="border-apna">Time Out</th>
        <th class="border-apna">Month</th>
        <th class="border-apna">Edit</th>
    </tr>
<?php
while($tr <= 100000 && $clps = mysqli_fetch_array($sel_stfattnd)){
    
    $id = $clps['id'];
    $staffimages = $clps['staffimages'];
    $staff_id = $clps['staff_id'];
    $date = $clps['date'];
    $staff_name = $clps['staff_name'];
    $status = $clps['status'];
    $att_time = $clps['att_time'];
    $time_out = $clps['time_out'];
    $month = $clps['month'];
    $monthName = date("M", mktime(0, 0, 0, $month, 10));
?>
<tr>
    <td class="border-apna"><?php echo $tr++; ?></td>
    <td class="border-apna" width="30">
        <img src="staff_imgs/<?php echo $staffimages; ?>" class="img-fluid" style="width:50%;">
    </td>
    <td class="border-apna"><?php echo $staff_id; ?></td>
    <td class="border-apna"><?php echo $date; ?></td>
    <td class="text-capitalize border-apna"><?php echo $staff_name; ?></td>
    <td class="border-apna"><?php echo $status; ?></td>
    <td class="border-apna"><?php echo $att_time; ?></td>
    <td class="border-apna"><?php echo $time_out; ?></td>
    <td class="border-apna"><?php echo $monthName; ?></td>
    <td class="border-apna">
<a href="#" class="rcrdeditbtn btn" rowid="<?php echo $id; ?>"><i class="fa fa-edit text-success"></i></a>
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
    url: 'ajax/update-old-monthly-record-for-attendance.php',
    type: "POST",
    data: {recrd_id:edtid},
    success: function(rcrds){ $(".fetch-old-attendance-history").html(rcrds); }
});
    });
});
</script>