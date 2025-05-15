<?php
require_once("../functions/db.php");

$st_rol = $_POST['st_rol'];
$schol_id = $_POST['schol_id'];
$stu_id = $_POST['stu_id'];
$sname = $_POST['sname'];
$fname = $_POST['fname'];
$cles = $_POST['cles'];
$sectn = $_POST['sectn'];
$sesin = $_POST['sesin'];

if(!empty($_POST['st_imge'])){ $st_imge = $_POST['st_imge']; }else{ $st_imge = "users.jpg"; }

$sl_prf = mysqli_query($con,"select * from confirmSchools where institute_id='$schol_id'");
$rslt = mysqli_fetch_assoc($sl_prf);
$institute_name = $rslt['institute_name'];
$campus = $rslt['campus'];
$logo = $rslt['logo'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$schol_id' && id='$cles'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];


$fls = "";

$sl_fe = mysqli_query($con,"select * from fee_collection where rollno='$st_rol' && instituteId='$schol_id' && session='$sesin' order by id desc");
if(mysqli_num_rows($sl_fe)>0){
    $fls = '<table class="table table-striped table-responsive w-100 bg-white fe-colct">
    <tr align="center" style="background:hsl(35, 100%, 60%);">
        <th width="50">
<img src="portal-admins/institute-logos/'.$logo.'" class="img-fluid">
        </th>
        <th colspan="7">
            <h4 class="fs-4 fw-bold text-uppercase">'.$institute_name.'</h4>
            <div class="text-center text-capitalize fw-bold">Campus: <span class="fw-normal">'.$campus.'</span></div>
        </th>
        <th width="50" colspan="2">
<img src="student_imgs/'.$st_imge.'" class="img-fluid" style="width:50%;height:50px;">
        </th>
    </tr>
    <tr class="bg-apna"><th colspan="11" style="border:1px solid hsl(25, 100%, 50%);"><h6 class="fs-6 fw-bold text-center text-uppercase">fee history</h6></th></tr>
    <tr align="center" style="background:hsl(35, 100%, 70%);">
        <th style="border:1px solid hsl(25, 100%, 50%);" colspan="2">St.Name:</th>
        <td style="border:1px solid hsl(25, 100%, 50%);" colspan="2" class="text-capitalize">'.$sname.'</td>
        <th style="border:1px solid hsl(25, 100%, 50%);" colspan="2">F.Name:</th>
        <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize">'.$fname.'</td>
        <th style="border:1px solid hsl(25, 100%, 50%);">Roll#:</th>
        <td style="border:1px solid hsl(25, 100%, 50%);" colspan="2">'.$st_rol.'</td>
    </tr>
    <tr align="center" style="background:hsl(35, 100%, 70%);">
        <th style="border:1px solid hsl(25, 100%, 50%);" colspan="2">Class:</th>
        <td style="border:1px solid hsl(25, 100%, 50%);" colspan="2" class="text-uppercase">'.$class_name.'</td>
        <th style="border:1px solid hsl(25, 100%, 50%);" colspan="2">Section:</th>
        <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase">'.$sectn.'</td>
        <th style="border:1px solid hsl(25, 100%, 50%);">Session:</th>
        <td style="border:1px solid hsl(25, 100%, 50%);" colspan="2">'.$sesin.'</td>
    </tr>
    <tr class="bg-apna"><th style="border:1px solid hsl(25, 100%, 50%);">#</th><th style="border:1px solid hsl(25, 100%, 50%);">Issue Date</th><th style="border:1px solid hsl(25, 100%, 50%);">M.Fee</th><th style="border:1px solid hsl(25, 100%, 50%);">Received</th><th style="border:1px solid hsl(25, 100%, 50%);">Balance</th><th style="border:1px solid hsl(25, 100%, 50%);">Reminder</th><th style="border:1px solid hsl(25, 100%, 50%);">Month</th><th style="border:1px solid hsl(25, 100%, 50%);">Due Date</th><th style="border:1px solid hsl(25, 100%, 50%);">Status</th><th style="border:1px solid hsl(25, 100%, 50%);">Del</th></tr>';
    
$ds = 1;
while($ds <= 100000 && $rows = mysqli_fetch_array($sl_fe)){
 $feid = $rows['id'];
$student_imgs = $rows['student_imgs'];
$rollno = $rows['rollno'];
$session = $rows['session'];
$student_name = $rows['student_name'];
$father_name = $rows['father_name'];
$class = $rows['class'];
$section = $rows['section'];
$monthly_fee = $rows['monthly_fee'];
$monthly_fees += $rows['monthly_fee'];
$previous_balance = $rows['previous_balance'];
$fine = $rows['fine'];
$total_amount = $rows['total_amount'];
$receive_monthly = $rows['receive_monthly'];
$remaing_balance = $rows['remaing_balance'];
if($rows['fees_status'] == "paid"){ $fees_status = "<div class='text-success'>".$rows['fees_status']."</div>"; }elseif($rows['fees_status'] == "balance"){ $fees_status = "<div class='text-primary'>".$rows['fees_status']."</div>"; }else{ $fees_status = $rows['fees_status']; }
$account_type = $rows['account_type'];
$dates = $rows['dates'];
if(!empty($rows['due_dates'])){ $due_dates = $rows['due_dates']; }else{ $due_dates = "---"; }
$receive_date = $rows['receive_date'];
$remarks = $rows['remarks'];
$month = $rows['month'];
$monthName = date("M", mktime(0, 0, 0, $month, 10)); 

$fls .= '<tr style="background:hsl(35, 100%, 80%);">
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$ds++.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$dates.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$monthly_fee.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$receive_monthly.'<div class="text-center text-danger" style="font-size:0.7rem;">'.$receive_date.'</div></td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$remaing_balance.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);font-size:0.8rem;">'.$remarks.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize">'.$monthName.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize">'.$due_dates.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize">
        <a class="fs-6 fw-bold text-uppercase text-danger nav-link" style="font-size:0.7rem;" href="collect-fee?id='.$feid.'">'.$fees_status.'</a>
    </td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><a href="#" class="trshalts btn" rowid="'.$feid.'"><i class="fa fa-trash-alt text-danger"></i></a></td>
</tr>';

    }

$fls .= '</table>.';
echo $fls;
}else{ echo "<div class='alert alert-danger'>There are no Fee History!</div>"; }

?>
