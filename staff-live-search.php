<?php
require_once("functions/db.php"); 

if(isset($_POST['input_vlue'])){
    
    $input = $_POST['input_vlue'];
    
$result = mysqli_query($con,"select * from addStaff where digitalCard LIKE '%$input%'");

if(mysqli_num_rows($result)>0){ 
while($row = mysqli_fetch_array($result)){
    
    $staffName = $row['staffName'];
    $fatherName = $row['fatherName'];
    $appliedPost = $row['appliedPost'];
    $staffType = $row['staffType'];
    $session = $row['session'];
    $staffId = $row['staffId'];
    $staffimage = $row['staffimage'];
    $stats = "P";
    $dtes = date("j-m-Y");
    $mnts = date("m");
    date_default_timezone_set("Asia/Karachi"); 
    $pk_mnt = date("h:i");
    $at_time = date("h:i:s A");
    $instituteId = $row['instituteId'];
    
$duplicate = mysqli_query($con,"select * from staffAttendance where instituteId='$instituteId' && staff_id='$staffId' && date='$dtes'");  
if(mysqli_num_rows($duplicate) > 0){
    echo "<div class='alert alert-success text-capitalize fs-4'>this staff attendance is already marked.</div>";
    //echo "<script>swal.fire('Sorry!','This Student Attendance Already Marked.','info');</script>";
}else{
$inst_attend = mysqli_query($con,"insert into staffAttendance (staff_name,father_name,staffimages,post,staffType,session,staff_id,status,date,month,att_time,instituteId)values('$staffName','$fatherName','$staffimage','$appliedPost','$staffType','$session','$staffId','$stats','$dtes','$mnts','$at_time','$instituteId')");
exit();
        }
}  
?>
<table class="table table-responsive table-striped w-100 bg-white">
    <tr>
       <td rowspan="3" width="100"><img class="img-fluid" src="staff_imgs/<?php echo $staffimage; ?>"></td> 
    </tr>
    <tr>
        <td><h4 class="fs-4 fw-bold">Staff Name</h4></td>
        <td><h4><?php echo $staffName; ?></h4></td>
        <td><h4 class="fs-4 fw-bold">Father Name</h4></td>
        <td><h4><?php echo $fatherName; ?></h4></td>
        <td><h4 class="fs-4 fw-bold">Applied Post</h4></td>
        <td><h4><?php echo $appliedPost; ?></h4></td>
        <td><h4 class="fs-4 fw-bold">Type</h4></td>
        <td><h4><?php echo $staffType; ?></h4></td>
    </tr>
    <tr align="center">
        <th colspan="8"><h1 class="fs-1 fw-bold text-success text-uppercase">present</h1></th>
    </tr>
</table>
<?php
}else{
    echo "<div class='alert alert-danger text-uppercase'> there are no record.</div>";
}  
    }
?>