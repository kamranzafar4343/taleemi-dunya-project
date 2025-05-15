<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid mb-3">
    <div class="row">
<?php
if(isset($_GET['rols'])){
    $rolsnbr = $_GET['rols'];
    $sel_rol = mysqli_query($con,"select * from fee_collection where instituteId='$userId' && rollno='$rolsnbr'");
    $reslts = mysqli_fetch_assoc($sel_rol);
    $student_imgs = $reslts['student_imgs'];
    $rollno = $reslts['rollno'];
    $session = $reslts['session'];
    $student_name = $reslts['student_name'];
    $father_name = $reslts['father_name'];
    $class = $reslts['class'];
    $section = $reslts['section'];
    $monthly_fee = $reslts['monthly_fee'];
    $total_amount = $reslts['total_amount'];
    $receive_monthly = $reslts['receive_monthly'];
    $remaing_balance = $reslts['remaing_balance'];
    $month = $reslts['month'];
    $monthName = date("F", mktime(0, 0, 0, $month, 10));
}
?>
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='dashboard'"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> <?php echo $student_name; ?> Fee History</li>
  </ol>
</nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
<div class="col-12 datas">
    <table class="table table-responsive w-100">
        <thead>
            <tr style="background-color:hsl(35,100%,60%);" align="center">
                <th width="50">
<img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid">
                </th>
                <th colspan="8">
<h3 class="text-uppercase fs-3 fw-bolder"><?php echo $instituteName; ?></h3>
<h6 class="text-uppercase fs-6"><?php echo $campus; ?></h6>
                </th>
                <th width="50">
<img src="student_imgs/<?php echo $student_imgs; ?>" class="img-fluid">
                </th>
            </tr>
            <tr align="center" class="bg-apna">
                <th style="border:1px solid hsl(28,100%,50%);" colspan="10" class="text-capitalize"><?php echo $student_name; ?> Fee History <?php echo $session; ?></th>
            </tr>
            <tr style="background-color:hsl(35,100%,70%);">
                <th colspan="1" style="border:1px solid hsl(28,100%,50%);">St.Name</th>
                <td colspan="2" class="text-capitalize" style="border:1px solid hsl(28,100%,50%);"><?php echo $student_name; ?></td>
                <th colspan="1" style="border:1px solid hsl(28,100%,50%);">F.Name</th>
                <td colspan="2" class="text-capitalize" style="border:1px solid hsl(28,100%,50%);"><?php echo $father_name; ?></td>
                <th colspan="1" style="border:1px solid hsl(28,100%,50%);">Roll #</th>
                <td colspan="3" style="border:1px solid hsl(28,100%,50%);"><?php echo $rollno; ?></td>
            </tr>
            <tr style="background-color:hsl(35,100%,70%);">
                <th colspan="1" style="border:1px solid hsl(28,100%,50%);">Class</th>
                <td colspan="2" class="text-capitalize" style="border:1px solid hsl(28,100%,50%);"><?php echo $class; ?></td>
                <th colspan="1" style="border:1px solid hsl(28,100%,50%);">Section</th>
                <td colspan="2" class="text-capitalize" style="border:1px solid hsl(28,100%,50%);"><?php echo $section; ?></td>
                <th colspan="1" style="border:1px solid hsl(28,100%,50%);">Month</th>
                <td colspan="3" class="text-capitalize" style="border:1px solid hsl(28,100%,50%);"><?php echo $monthName; ?></td>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-apna">
                <th style="border:1px solid hsl(28,100%,50%);">Sr#</th>
                <th style="border:1px solid hsl(28,100%,50%);">Date</th>
                <th style="border:1px solid hsl(28,100%,50%);">M.Fee</th>
                <th style="border:1px solid hsl(28,100%,50%);">Received</th>
                <th style="border:1px solid hsl(28,100%,50%);">Balance</th>
                <th style="border:1px solid hsl(28,100%,50%);">Fine</th>
                <th style="border:1px solid hsl(28,100%,50%);">Month</th>
                <th style="border:1px solid hsl(28,100%,50%);">Status</th>
                <th style="border:1px solid hsl(28,100%,50%);">Type</th>
                <th style="border:1px solid hsl(28,100%,50%);">Del</th>
            </tr>
<?php
$ea = 1;
    $sel_rols = mysqli_query($con,"select * from fee_collection where instituteId='$userId' && rollno='$rolsnbr' order by id desc");
    while($ea <= 10000 && $results = mysqli_fetch_assoc($sel_rols)){
    $student_imgs = $results['student_imgs'];
    $rollno = $results['rollno'];
    $session = $results['session'];
    $student_name = $results['student_name'];
    $father_name = $results['father_name'];
    $class = $results['class'];
    $section = $results['section'];
    $fine = $results['fine'];
    $monthly_fee = $results['monthly_fee'];
    $total_amount = $results['total_amount'];
    $receive_monthly = $results['receive_monthly'];
    $remaing_balance = $results['remaing_balance'];
    $dates = $results['dates'];
    $fees_status = $results['fees_status'];
    $account_type = $results['account_type'];
    $month = $results['month'];
    $monthName = date("F", mktime(0, 0, 0, $month, 10));
?>
<tr style="background-color:hsl(35,100%,80%);">
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $ea++; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $dates; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $monthly_fee; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $receive_monthly; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $remaing_balance; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $fine; ?></th>
    <td style="border:1px solid hsl(28,100%,50%);"><?php echo $monthName; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);" class="text-capitalize"><?php echo $fees_status; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);" class="text-capitalize"><?php echo $account_type; ?></td>
    <td style="border:1px solid hsl(28,100%,50%);"><a href="#"><i class="fa fa-trash-alt text-danger"></i></a></td>
</tr>
<?php } ?>
        </tbody>
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