<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> payroll monthly report</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col datas">
<table class="table table-responsive table-striped w-100 bg-white">
    <tr align="center">
        <th width="100">
<img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid">
        </th>
        <th colspan="13">
<h4 class="text-uppercase fs-4 fw-bold"><?php echo $instituteName; ?></h4>
<div class="text-capitalize">phone: <span class="fw-normal"><?php echo $mainphones; ?></span>&nbsp; cell: <span class="fw-normal"><?php echo $cell; ?></span> </div>
<div class="text-capitalize">address: <span class="fw-normal"><?php echo $mainaddress; ?></span> </div>
        </th>
    </tr>
    <tr align="center">
        <th style="padding:2px;font-size:0.9rem;" width="3">Sr.No</th>
        <th style="padding:2px;font-size:0.9rem;">Date</th>
        <th style="padding:2px;font-size:0.9rem;">Image</th>
        <th style="padding:2px;font-size:0.9rem;">Student Name</th>
        <th style="padding:2px;font-size:0.9rem;">Post</th>
        <th style="padding:2px;font-size:0.9rem;">Type</th>
        <th style="padding:2px;font-size:0.9rem;">Salary</th>
        <th style="padding:2px;font-size:0.9rem;">Presents</th>
        <th style="padding:2px;font-size:0.9rem;">Absents</th>
        <th style="padding:2px;font-size:0.9rem;">Advance</th>
        <th style="padding:2px;font-size:0.9rem;">Bonus</th>
        <th style="padding:2px;font-size:0.9rem;">Net Salary</th>
        <th style="padding:2px;font-size:0.9rem;">Pay Amount</th>
        <th style="padding:2px;font-size:0.9rem;">Remaining Payable</th>
    </tr>

<form method="post" enctype="multipart/form-data">
<?php    
$b = 1;

$newdt = date("m");
$sl_stud = mysqli_query($con,"select * from payroll where instituteId='$userId' && month='$newdt' order by id desc");
$counts = mysqli_num_rows($sl_stud);
if($counts == 0){ echo "<div class='fs-6 text-capitalize alert alert-danger alert-dismissible fade show'>Today attendance List is not Genereate.
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>"; }
while($b <= 100000 && $rows = mysqli_fetch_array($sl_stud)){
$studntid = $rows['id'];
$instituteId = $rows['instituteId'];
$salary_date = $rows['salary_date'];
$staff_name = $rows['staff_name'];
$staff_image = $rows['staff_image'];
$apply_post = $rows['apply_post'];
$staff_type = $rows['staff_type'];
$salary = $rows['salary'];
$presents = $rows['presents'];
$absents = $rows['absents'];
$advance_salary = $rows['advance_salary'];
$bonus = $rows['bonus'];
$fint_net_salary = $rows['fint_net_salary'];
$month = $rows['month'];
$pay_amount = $rows['pay_amount'];
$pay_amounts += $rows['pay_amount'];
$remaing_payable = $rows['remaing_payable'];
?>
<tr align="center">
    <td style="padding:2px;font-size:0.9rem;" width="3"><?php echo $b++; ?></td>
    <td style="padding:2px;font-size:0.9rem;"><?php echo $salary_date; ?></td>
    <td style="padding:2px;font-size:0.9rem;" width="20"><img src="staff_imgs/<?php echo $staff_image; ?>" class="img-fluid"></td>
    <td class="text-capitalize" style="padding:2px;font-size:0.9rem;"><?php echo $staff_name; ?></td>
    <td class="text-capitalize" style="padding:2px;font-size:0.9rem;"><?php echo $apply_post; ?></td>
    <td class="text-capitalize" style="padding:2px;font-size:0.9rem;"><?php echo $staff_type; ?></td>
    <td class="text-capitalize" style="padding:2px;font-size:0.9rem;"><?php echo $salary; ?></td>
    <td style="padding:2px;font-size:0.9rem;"><?php echo $presents; ?></td>
    <td style="padding:2px;font-size:0.9rem;"><?php echo $absents; ?></td>
    <td style="padding:2px;font-size:0.9rem;"><?php echo $advance_salary; ?></td>
    <td style="padding:2px;font-size:0.9rem;"><?php echo $bonus; ?></td>
    <td style="padding:2px;font-size:0.9rem;"><?php echo $fint_net_salary; ?></td>
    <td style="padding:2px;font-size:0.9rem;"><?php echo $pay_amount; ?></td>
    <td style="padding:2px;font-size:0.9rem;"><?php echo $remaing_payable; ?></td>
</tr>
<?php } ?>
</form>
<tr align="right">
    <th colspan="4" class="fs-4 fw-bold text-capitalize"> total pay amount</th>
    <th colspan="10" class="fs-4 fw-bold"> <?php echo $pay_amounts; ?></th>
</tr>
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