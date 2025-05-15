<?php
require_once("../functions/db.php");

$inst_ids = $_POST['inst_ids'];
$sesins = $_POST['sesins'];
$strt_dte = $_POST['strt_dte'];

$a=1;

$sl_atendce = mysqli_query($con,"select * from staffAttendance where instituteId='$inst_ids' && session='$sesins' && date='$strt_dte'");

$fils = "";

if($a <= 100000 && mysqli_num_rows($sl_atendce)>0){

$fils .= '<table class="w-100">
    <tr align="center" class="bg-apna">
        <th>Sr.No</th>
        <th>StaffID</th>
        <th>Student Name</th>
        <th>Father Name</th>
        <th>Post</th>
        <th>Type</th>
        <th>Session</th>
        <th>Time In</th>
        <th>Time Out</th>
        <th>Status</th>
        <th>Action</th>
    </tr>';
while($a <= 100000 && $result = mysqli_fetch_array($sl_atendce)){
    
$ides = $result['id'];
$instituteId = $result['instituteId'];
$staff_name = $result['staff_name'];
$father_name = $result['father_name'];
$post = $result['post'];
$staffType = $result['staffType'];
$session = $result['session'];
$staff_id = $result['staff_id'];
$att_time = $result['att_time'];
$time_out = $result['time_out'];
$status = $result['status'];

$fils .= '<tr align="center" style="background:hsl(35, 100%, 80%);">
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$a++.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$staff_id.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$staff_name.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$father_name.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$post.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$staffType.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$session.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$att_time.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$time_out.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$status.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">
<a href="#" class="updtbtn" rowid="'.$ides.'"><i class="fa fa-edit text-success"></i></a>
    </td>
</tr>';
    }
$fils .= '</table>';
echo $fils; 
}else{ echo "<div class='alert alert-danger text-capitalize'>there are no attendance this date!</div>"; }
?>
<script>
$(document).ready(function(){
    $(".updtbtn").on('click',function(e){
e.preventDefault();

var atid = $(this).attr("rowid");

$.ajax({
    url: 'ajax/update-attendance-single.php',
    type: "POST",
    data:{atend_id:atid},
    success: function(datas){
$(".updte-atendance").html(datas);

    }
    
});
    });
});
</script>