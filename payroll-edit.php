<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#accounts"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'">Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='payroll-manager'">Payroll manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> update payroll</li>
  </ol>
</nav>
<?php
if(isset($_GET['id'])){
    $ids = $_GET['id'];
    $sl_pr = mysqli_query($con,"select * from payroll where id='$ids'");
    $result = mysqli_fetch_array($sl_pr);
    
    $staff_name = $result['staff_name'];
    $staff_type = $result['staff_type'];
    $apply_post = $result['apply_post'];
    $staff_image = $result['staff_image'];
    $salary = $result['salary'];
    $presents = $result['presents'];
    $absents = $result['absents'];
    $leaved = $result['leaved'];
    $half_leave = $result['half_leave'];
    $per_day_salary = $result['per_day_salary'];
    $advance_salary = $result['advance_salary'];
    $bonus = $result['bonus'];
    $net_salary = $result['net_salary'];
    $fint_net_salary = $result['fint_net_salary'];
    $month = $result['month'];
    $pay_amount = $result['pay_amount'];
    $remaing_payable = $result['remaing_payable'];
    $staff_id = $result['staff_id'];
    $instituteId = $result['instituteId'];
    $session = $result['session'];
    $salary_date = $result['salary_date'];
}
?>
<div class="container-fluid">
<div class="row mt-3 bg-apna">
    <div class="col">
            <h4 class="text-center text-uppercase py-2">payroll of month "<?php echo date('F', mktime(0, 0, 0, $month, 10)); ?>"</h4>
<form method="post" enctype="multipart/form-data">
<div class="row" style="background-color:hsl(0,0%,15%);">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">Staff ID#</label>
        <input type="text" class="form-control" value="<?php echo $staff_id; ?>" name="stfid">
        <input type="hidden" class="form-control" value="<?php echo $instituteId; ?>" name="isntids">
        <input type="hidden" class="form-control" value="<?php echo $session; ?>" name="sesn">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Staff Name</label>
        <input type="text" class="form-control" value="<?php echo $staff_name; ?>" name="snme">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Staff Type</label>
        <input type="text" class="form-control" value="<?php echo $staff_type; ?>" name="stf_tpe">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Post</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="pst" value="<?php echo $apply_post; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Salary</label>
        <input type="text" class="form-control" value="<?php echo $salary; ?>" name="slry">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Presents</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="prest" value="<?php echo $presents; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Absents</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="absnt" value="<?php echo $absents; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Leave</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="leve" value="<?php echo $leaved; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Half Leave</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="hf_leve" value="<?php echo $half_leave; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Per Day Salary</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="pr_dy_slry" value="<?php echo $per_day_salary; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Advance Salary</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" id="adv_slry" name="adv_slry" value="<?php echo $advance_salary;?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Bonus</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" id="bons" name="bons" value="<?php echo $bonus;?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Net Salary</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="net_slray" id="net_slray" value="<?php echo $net_salary; ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Final Net Salary</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="net_slry" id="net_slry" value="<?php echo $fint_net_salary; ?>" onload="netSalary()" onclick="netSalary()" onkeyup="netSalary()">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Pay Amount</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" value="<?php echo $pay_amount; ?>" onkeyup="remainingBalance()" onclick="remainingBalance()" id="pay_amnt" name="pay_amnt" value="0">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">remaining payable</label>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" value="<?php echo $remaing_payable; ?>" id="rem_pyable" name="rem_pyable" value="0">
    </div>
<script>
function netSalary(){
var fulSlry = document.getElementById('net_slray').value;
var advance = document.getElementById('adv_slry').value;
var buns = document.getElementById('bons').value;

var fuls = fulSlry - advance;
var dedctSlry = fuls * 1;
var bpns = buns * 1;
var finl = dedctSlry + bpns; 
document.getElementById('net_slry').value=finl;
}
function remainingBalance(){
var nets = document.getElementById('net_slry').value;
var pad = document.getElementById('pay_amnt').value;
var remBlnce = nets - pad;
document.getElementById('rem_pyable').value=remBlnce;

    }
</script>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Month</label>
        <input type="text" class="form-control" value="<?php echo date('F', mktime(0, 0, 0, $mnts, 10)); ?>">
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3 mt-4">
        <button class="btn btn-apna text-uppercase" type="submit" name="btn_slry_pay"> <i class="fa-solid fa-retweet"></i> update</button>
    </div>
</div>
</form>
    </div>
</div>
<?php
if(isset($_POST['btn_slry_pay'])){

    $snme = $_POST['snme'];
    $stf_tpe = $_POST['stf_tpe'];
    $pst = $_POST['pst'];
    $stfimg = $_POST['stfimg'];
    $slry = $_POST['slry'];
    $prest = $_POST['prest'];
    $absnt = $_POST['absnt'];
    $leve = $_POST['leve'];
    $hf_leve = $_POST['hf_leve'];
    $pr_dy_slry = $_POST['pr_dy_slry'];
    $adv_slry = $_POST['adv_slry'];
    $bons = $_POST['bons'];
    $net_slry = $_POST['net_slry'];
    $monthes = $_POST['monthes'];
    if(!empty($_POST['pay_amnt'])){ $pay_amnt = $_POST['pay_amnt']; }else{ echo "0"; }
    if(!empty($_POST['rem_pyable'])){ $rem_pyable = $_POST['rem_pyable']; }else{ echo "0"; }
    $stfid = $_POST['stfid'];
    $isntids = $_POST['isntids'];
    $sesn = $_POST['sesn'];
    $py_dte = $_POST['py_dte'];
    

$dollar = mysqli_query($con,"update payroll set pay_amount='$pay_amnt',remaing_payable='$rem_pyable' where id='$ids'");
if($dollar){
 echo "<script>Swal.fire({position: 'top-end',icon: 'success',title: 'This Staff Salary Paid',showConfirmButton: false,timer: 1500 })</script>";
}else{ echo "<script>Swal.fire({position: 'top-end',icon: 'error',title: 'This Staff Salary is not Paid',showConfirmButton: false,timer: 1500 })</script>"; }
    }
?>
</div>
<?php require_once("source/foot-section.php"); ?>
