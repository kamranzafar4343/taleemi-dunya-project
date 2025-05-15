<?php
require_once("../functions/db.php");

$aply_instute = $_POST['aply_instute'];
$aply_mnths = $_POST['aply_mnths'];
$aply_sesion = $_POST['aply_sesion'];



$tr = 1;
$sel_stfattnd = mysqli_query($con,"select * from addStaff where instituteId='$aply_instute' && session='$aply_sesion'");
if(mysqli_num_rows($sel_stfattnd)>0){
?>
<div class="row">
    <div class="col-12 mb-3">
<table class="w-100 bg-apna">
    <tr>
        <th>#</th>
        <th width="50">Image</th>
        <th>ID#</th>
        <th>Staff Name</th>
        <th>Presents</th>
        <th>Absents</th>
        <th>Leaves</th>
        <th>Holidays</th>
    </tr>
<?php
while($tr <= 100000 && $clps = mysqli_fetch_array($sel_stfattnd)){
    
    $student_img = $clps['staffimage'];
    $roll_no = $clps['staffId'];
    $stu_name = $clps['staffName'];
    
$att_p = mysqli_query($con,"select * from staffAttendance where instituteId='$aply_instute' && staff_id='$roll_no' && month='$aply_mnths' && session='$aply_sesion' && status='P'");
$count_p = mysqli_num_rows($att_p);

$att_a = mysqli_query($con,"select * from staffAttendance where instituteId='$aply_instute' && staff_id='$roll_no' && month='$aply_mnths' && session='$aply_sesion' && status='A'");
$count_a = mysqli_num_rows($att_a);

$att_l = mysqli_query($con,"select * from staffAttendance where instituteId='$aply_instute' && staff_id='$roll_no' && month='$aply_mnths' && session='$aply_sesion' && status='L'");
$count_l = mysqli_num_rows($att_l);

$att_h = mysqli_query($con,"select * from staffAttendance where instituteId='$aply_instute' && staff_id='$roll_no' && month='$aply_mnths' && session='$aply_sesion' && status='H'");
$count_h = mysqli_num_rows($att_h);
?>
<tr style="background-color:hsl(35,100%,80%);">
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $tr++; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);" width="50">
        <img src="staff_imgs/<?php echo $student_img; ?>" class="img-fluid">
    </td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $roll_no; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);" class="text-capitalize"><?php echo $stu_name; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $count_p; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $count_a; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $count_l; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $count_h; ?></td>
</tr>
<?php } ?>
</table>
    </div>
</div>
<?php
}else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; }
?>