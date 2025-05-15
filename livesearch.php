<?php
require_once("functions/db.php"); 

if(isset($_POST['input'])){
    
    $input = $_POST['input'];
    
$result = mysqli_query($con,"select * from addStudents where digitalCard LIKE '%{$input}%'");

if(mysqli_num_rows($result)>0){ 
while($row = mysqli_fetch_array($result)){
    
    
    $instituteId = $row['instituteId'];
    $studentName = $row['studentName'];
    $image = $row['image'];
    $fatherName = $row['fatherName'];
    $class = $row['class'];
    $section = $row['section'];
    $session = $row['session'];
    $roll_num = $row['roll_num'];
    $stats = "P";
    
    $dtes = date("j-m-Y");
    $mnts = date("m");
    date_default_timezone_set("Asia/Karachi"); 
    $pk_mnt = date("h:i");
    $at_time = date("h:i:s A");
    $instituteId = $row['instituteId'];
 
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];    
    
$duplicate = mysqli_query($con,"select * from attandance where instituteId='$instituteId' && roll_no='$roll_num' && date='$dtes'");  
if(mysqli_num_rows($duplicate) > 0){
echo "<div class='alert alert-success text-uppercase'> Attendance is already marked.</div>";
}else{
$inst_attend = mysqli_query($con,"insert into attandance (stu_name,student_img,father_name,class,section,session,roll_no,status,date,month,att_time,instituteId)values('$studentName','$image','$fatherName','$class','$section','$session','$roll_num','$stats','$dtes','$mnts','$at_time','$instituteId')");
exit();
        }
?>
<table class="table table-responsive table-striped w-100 bg-white">
    <tr>
        <td rowspan="2" width="70"><img src="student_imgs/<?php echo $image; ?>" class="img-fluid"></td>
        <td><h4 class="fs-4 fw-bold">Student Name</h4></td>
        <td><h4 class="text-capitalize"><?php echo $studentName; ?></h4></td>
        <td><h4 class="fs-4 fw-bold">Father Name</h4></td>
        <td><h4 class="text-capitalize"><?php echo $fatherName; ?></h4></td>
        <td><h4 class="fs-4 fw-bold">Class</h4></td>
        <td><h4 class="text-uppercase"><?php echo $class_name; ?></h4></td>
        <td><h4 class="fs-4 fw-bold">Section</h4></td>
        <td><h4 class="text-uppercase"><?php echo $section; ?></h4></td>
    </tr>
    <tr align="center">
        <th colspan="8"><h1 class="fs-1 fw-bold text-success text-uppercase">present</h1></th>
    </tr>
</table>

<?php
}  
}else{
    echo "<div class='alert alert-danger text-uppercase'> there are no record.</div>";
}  
    }
?>