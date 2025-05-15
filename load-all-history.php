<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid mb-3">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#clection"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> fee History</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div align='right'>
              <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 datas">
<?php
if(isset($_GET['rolsnmbr'])){
$rolsnmbr = $_GET['rolsnmbr'];    
$institute = $_GET['institute'];  

$sel_ples = mysqli_query($con,"select * from fee_collection where rollno='$rolsnmbr' && instituteId='$institute'");
$result = mysqli_fetch_assoc($sel_ples);

$student_imgs = $result['student_imgs'];
$rollno = $result['rollno'];
$session = $result['session'];
$student_name = $result['student_name'];
$father_name = $result['father_name'];
$class = $result['class'];
$section = $result['section'];
}



$sl_prf = mysqli_query($con,"select * from confirmSchools where institute_id='$userId'");
$rslt = mysqli_fetch_assoc($sl_prf);
$institute_name = $rslt['institute_name'];
$campus = $rslt['campus'];
$logo = $rslt['logo'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];


$fls = "";

$sl_fe = mysqli_query($con,"select * from fee_collection where rollno='$rolsnmbr' && instituteId='$institute' order by id desc");
if(mysqli_num_rows($sl_fe)>0){
    $fls = '<table class="table table-striped table-responsive w-100 bg-white fe-colct">
    <tr align="center" style="background:hsl(35, 100%, 60%);">
        <th width="50">
<img src="portal-admins/institute-logos/'.$logo.'" class="img-fluid">
        </th>
        <th colspan="8">
            <h4 class="fs-4 fw-bold text-uppercase">'.$institute_name.'</h4>
            <div class="text-center text-capitalize fw-bold">Campus: <span class="fw-normal">'.$campus.'</span></div>
        </th>
        <th width="50" colspan="2">
<img src="student_imgs/'.$student_imgs.'" class="img-fluid" style="width:50%;height:50px;">
        </th>
    </tr>
    <tr class="bg-apna"><th colspan="11" style="border:1px solid hsl(25, 100%, 50%);"><h6 class="fs-6 fw-bold text-center text-uppercase">fee history</h6></th></tr>
    <tr align="center" style="background:hsl(35, 100%, 70%);">
        <th style="border:1px solid hsl(25, 100%, 50%);" colspan="3">Student Name</th>
        <td style="border:1px solid hsl(25, 100%, 50%);" colspan="2" class="text-capitalize">'.$student_name.'</td>
        <th style="border:1px solid hsl(25, 100%, 50%);" colspan="2">Father Name</th>
        <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize">'.$father_name.'</td>
        <th style="border:1px solid hsl(25, 100%, 50%);">Roll#</th>
        <td style="border:1px solid hsl(25, 100%, 50%);" colspan="2">'.$rollno.'</td>
    </tr>
    <tr align="center" style="background:hsl(35, 100%, 70%);">
        <th style="border:1px solid hsl(25, 100%, 50%);" colspan="3">Class</th>
        <td style="border:1px solid hsl(25, 100%, 50%);" colspan="2" class="text-uppercase">'.$class_name.'</td>
        <th style="border:1px solid hsl(25, 100%, 50%);" colspan="2">Section</th>
        <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase">'.$section.'</td>
        <th style="border:1px solid hsl(25, 100%, 50%);">Session</th>
        <td style="border:1px solid hsl(25, 100%, 50%);" colspan="2">'.$session.'</td>
    </tr>
    <tr class="bg-apna"><th style="border:1px solid hsl(25, 100%, 50%);">Sr.No</th><th style="border:1px solid hsl(25, 100%, 50%);">Date</th><th style="border:1px solid hsl(25, 100%, 50%);">M.Fee</th><th style="border:1px solid hsl(25, 100%, 50%);">Received</th><th style="border:1px solid hsl(25, 100%, 50%);">Balance</th><th style="border:1px solid hsl(25, 100%, 50%);">Fine</th><th style="border:1px solid hsl(25, 100%, 50%);">Month</th><th style="border:1px solid hsl(25, 100%, 50%);">Session</th><th style="border:1px solid hsl(25, 100%, 50%);">Status</th><th style="border:1px solid hsl(25, 100%, 50%);">Type</th><th style="border:1px solid hsl(25, 100%, 50%);">Del</th></tr>';
    
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
if($rows['fees_status'] == "paid"){ $fees_status = "<div class='text-success'>".$rows['fees_status']."</div>"; }else{ $fees_status = $rows['fees_status']; }
$account_type = $rows['account_type'];
$dates = $rows['dates'];
$month = $rows['month'];
$monthName = date("F", mktime(0, 0, 0, $month, 10));

$fls .= '<tr style="background:hsl(35, 100%, 80%);">
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$ds++.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$dates.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$monthly_fee.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$receive_monthly.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$remaing_balance.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);">'.$fine.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize">'.$monthName.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize">'.$session.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><a class="fs-6 fw-bold text-uppercase text-danger nav-link" style="font-size:0.7rem;" href="collect-fee?id='.$feid.'">'.$fees_status.'</a></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize">'.$account_type.'</td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><a href="#" class="trshalts btn" rowid="'.$feid.'"><i class="fa fa-trash-alt text-danger"></i></a></td>
</tr>';

    }

$fls .= '</table>.';
echo $fls;
}else{ echo "<div class='alert alert-danger'>There are no Fee History!</div>"; }

?> 
        </div>
    </div>
</div>

<?php require_once("source/foot-section.php"); ?>
<script type="text/javascript">
$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>