<?php
require_once("../functions/db.php");

$inst_id = $_POST['inst_id'];
$chlan_status = "samester";
$cless = $_POST['cless'];
$sectn = $_POST['sectn'];
$sesns = $_POST['sesns'];
$mnths = $_POST['mnths'];

$sel_chlns = mysqli_query($con,"select * from fee_collection where instituteId='$inst_id' && challan_status='$chlan_status' && class='$cless' && section='$sectn' && session='$sesns' && month='$mnths'");
$fuls = "";
if(mysqli_num_rows($sel_chlns)>0){
$fuls = '<table class="table table-responsive w-100"><tr align="center" class="bg-apna"><th>Sr#</th><th><input type="checkbox" id="select_all"></th><th>Roll No.</th><th>Image</th><th>Student Name</th><th>Father Name</th><th>Class</th><th>Section</th><th>Session</th><th>Month</th><th>Fee Status</th><th>Challan</th><th>Family Challan</th><th>Edit</th><th>Del</th></tr>';
$ats = 1;
while($ats<=1000000 && $result = mysqli_fetch_array($sel_chlns)){
    
$id = $result['id'];
$instituteId = $result['instituteId'];
$roll_num = $result['rollno'];
if(!empty($result['student_imgs'])){ $frmimage = $result['student_imgs']; }else{ $frmimage="users.jpg";}
$studentName = $result['student_name'];
$fatherName = $result['father_name'];
$class = $result['class'];
$section = $result['section'];
$month = $result['month'];
$monthName = date('F', mktime(0, 0, 0, $month, 10));
$session = $result['session'];
$fees_status = $result['fees_status'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
    
$fuls .= '<form method="post" name="data_table">
<tr align="center" id="'.$id.'" style="background:hsl(35, 100%, 80%);">
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$ats++.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><input type="checkbox" class="emp_checkbox" data-emp-id="'.$id.'"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$roll_num.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);" width="50"><img class="img-fluid" src="student_imgs/'.$frmimage.'"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize">'.$studentName.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize">'.$fatherName.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase">'.$class_name.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase">'.$section.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$session.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$monthName.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize">'.$fees_status.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">
        <a href="challan-specimen-samesterly?id='.$id.'" target="_blank" class="btn">
            <i class="fa-solid fa-file-invoice" style="color:hsl(330,100%,50%);"></i>
        </a>
    </td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><a href="family-challan-specimen-samesterly?id='.$roll_num.'" target="_blank" class="btn"><i class="fa-solid fa-file-invoice" style="color:hsl(270,100%,50%);"></i></a></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><a href="edit-challan-values?id='.$id.'" target="_blank" class="btn"><i class="fa-solid fa-edit text-success"></i></a></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><a href="challan-del?id='.$id.'" class="btn"><i class="fa fa-trash-alt text-danger"></i></a></td>
</tr>';
}
$fuls .= '</form></table>';
echo $fuls;
}else{ echo "<div class='alert alert-danger text-capitalize'>there are no result found!</div>"; }

?>