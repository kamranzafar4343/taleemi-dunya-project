<?php
require_once("../functions/db.php");

$a = 1;

    $cles = $_POST['cles'];
    $sectn = $_POST['sectn'];
    $instip = $_POST['instip'];
    $sesnip = $_POST['sesnip'];
    $manthsip = $_POST['manthsip'];

$sl_clas = mysqli_query($con,"select * from fee_collection where class LIKE '%$cles%' && section LIKE '%$sectn%' && instituteId LIKE '%$instip%' && session LIKE '%$sesnip%' && month LIKE '%$manthsip%' && fees_status LIKE '%Unpaid%'");
$deflter = "";
$count = mysqli_num_rows($sl_clas);
if($count == 2){
if($count > 0){ 
//if($count == 2){
$deflter = "<table class='w-100 bg-apna-body'>
<tr class='bg-apna'>
    <th class='border-apna'>Sr#</th>
    <th class='border-apna'>Roll#</th>
    <th class='border-apna'>Image</th>
    <th class='border-apna'>Name</th>
    <th class='border-apna'>Father Name</th>
    <th class='border-apna'>Class</th>
    <th class='border-apna'>Section</th>
    <th class='border-apna'>Session</th>
    <th class='border-apna'>Monthly Fee</th>
    <th class='border-apna'>Arreras</th>
    <th class='border-apna'>Month</th>
    <th class='border-apna'>Status</th>
</tr>";
while($a <= 100000 && $result = mysqli_fetch_array($sl_clas)){
$stafid = $result['id'];
$instituteId = $result['instituteId'];
$student_name = $result['student_name'];
$father_name = $result['father_name'];
$class = $result['class'];
$section = $result['section'];
$session = $result['session'];
$rollno = $result['rollno'];
if(!empty($result['student_imgs'])){ $student_imgs = $result['student_imgs']; }else{ $student_imgs = "users.jpg"; }
$monthly_fee = $result['monthly_fee'];
$monthly_fees += $result['monthly_fee'];
$remaing_balance = $result['remaing_balance'];
$remaing_balance += $result['remaing_balance'];
$fees_status = $result['fees_status'];
$month = $result['month'];
$monthName = date('F', mktime(0, 0, 0, $month, 10));

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$deflter .= '<tr align="center">
    <td class="border-apna">'.$a++.'</td>
    <td class="border-apna">'.$rollno.'</td>
    <td class="border-apna" width="30"><img src="student_imgs/'.$student_imgs.'" class="img-fluid" style="width:80%;"></td>
    <td class="text-capitalize border-apna">'.$student_name.'</td>
    <td class="text-capitalize border-apna">'.$father_name.'</td>
    <td class="text-uppercase border-apna">'.$class_name.'</td>
    <td class="text-uppercase border-apna">'.$section.'</td>
    <td class="border-apna">'.$session.'</td>
    <td class="border-apna">'.$monthly_fee.'</td>
    <td class="border-apna">'.$remaing_balance.'</td>
    <td class="border-apna">'.$monthName.'</td>
    <td class="border-apna">'.$fees_status.'</td>
    <input type="hidden" value="'.$instituteId.'" name="inst_id">
</tr>';
    }
$deflter .= '<tr align="center">
    <td class="border-apna"></td>
    <td class="border-apna"></td>
    <td class="border-apna"></td>
    <td class="border-apna"></td>
    <td class="border-apna"></td>
    <td class="border-apna"></td>
    <td class="border-apna"></td>
    <td class="border-apna"></td>
    <td class="border-apna">'.$monthly_fees.'</td>
    <td class="border-apna">'.$remaing_balance.'</td>
    <td class="border-apna"></td>
    <input type="hidden" value="'.$instituteId.'" name="inst_id">
</tr>';
$deflter .= "</table>";
mysqli_close($con);
echo $deflter;
//}else{ echo "<div class='alert alert-success'>There are no Defaulter Students!</div>"; }
}else{ echo "<div class='alert alert-danger text-capitalize'>record not found</div>"; }
}else{ echo "<div class='alert alert-success'>There are no Defaulter Students!</div>"; }
?>