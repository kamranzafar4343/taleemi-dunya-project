<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='struck-off-manager'"> struck off students</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> student fee history</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<style>
.bordrs, .bordrs tr, .bordrs tr td, .bordrs tr th{
    border:2px solid black;
}
</style>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 mb-3 datas">
<table class="table table-responsive table-stiped w-100 mb-3 bg-white">
    <tr align="center">
        <th width="100"><img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid"></th>
        <th colspan="9">
<h4 class="fs-4 fw-bold text-uppercase"><?php echo $instituteName; ?></h4>
<div class="text-center text-capitalize fw-bold">Cell: <span class="fw-normal"><?php echo $cell; ?></span></div>
<div class="text-center text-capitalize fw-bold">address: <span class="fw-normal"><?php echo $mainaddress; ?></span></div>
        </th>
    </tr>
</table>
<table class="table table-responsive table-striped w-100 bg-white bordrs">
    <tr align="center">
        <th colspan="14"><h6 class="text-capitalize fs-6 fw-bold">stuck off student list</h6></th>
    </tr>
    <tr>
        <th>Sr#</th>
        <th>Student Name</th>
        <th>Father Name</th>
        <th>Class</th>
        <th>Section</th>
        <th>Session</th>
        <th>Fee</th>
        <th>Previous</th>
        <th>Discount</th>
        <th>T.Amount</th>
        <th>Received</th>
        <th>Remaining</th>
        <th>Fee Status</th>
        <th>Month</th>
    </tr>
<?php
$ab =1;
if(isset($_GET['id'])){
    $ids = $_GET['id'];
    $sesn = date("Y");
    $sl_fe = mysqli_query($con,"select * from fee_collection where instituteId='$userId' && rollno='$ids' && session='$sesn'");
if(mysqli_num_rows($sl_fe)>0){
    while($ab <= 100000 && $reslt = mysqli_fetch_array($sl_fe)){
        $student_imgs = $reslt['student_imgs'];
        $rollno = $reslt['rollno'];
        $session = $reslt['session'];
        $student_name = $reslt['student_name'];
        $father_name = $reslt['father_name'];
        $class = $reslt['class'];
        $section = $reslt['section'];
        $monthly_fee = $reslt['monthly_fee'];
        $previous_balance = $reslt['previous_balance'];
        $discounts = $reslt['discounts'];
        $total_amount = $reslt['total_amount'];
        $receive_monthly = $reslt['receive_monthly'];
        $remaing_balance = $reslt['remaing_balance'];
        $fees_status = $reslt['fees_status'];
        $month = $reslt['month'];
        $monthName = date('F', mktime(0, 0, 0, $month, 10));
?>   
<tr>
    <td><?php echo $ab++; ?></td>
    <td class="text-capitalize"><?php echo $student_name; ?></td>
    <td class="text-capitalize"><?php echo $father_name; ?></td>
    <td class="text-uppercase"><?php echo $class; ?></td>
    <td class="text-uppercase"><?php echo $section; ?></td>
    <td><?php echo $session; ?></td>
    <td><?php echo $monthly_fee; ?></td>
    <td><?php echo $previous_balance; ?></td>
    <td><?php echo $discounts; ?></td>
    <td><?php echo $total_amount; ?></td>
    <td><?php echo $receive_monthly; ?></td>
    <td><?php echo $remaing_balance; ?></td>
    <td class="text-capitalize fw-bold"><?php echo $fees_status; ?></td>
    <td><?php echo $monthName; ?></td>
</tr>
<?php        
    }
}else{ echo "<div class='alert alert-danger text-capitalize'>there are no record found!</div>"; }    
}
?>
</table>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
<div align='right' class='p-5'>
    <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
        </div>
    </div>
<script type="text/javascript">
$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>
</div>
<?php require_once("source/foot-section.php"); ?>