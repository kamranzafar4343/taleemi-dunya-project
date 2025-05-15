<?php require_once("source/head-section.php"); require_once("source/navbar.php"); ?>
<div class="container-fluid mb-3">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'">Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='fee-collection'"> fee collection</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> fee submission</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_GET['id'])){
    
$feid = $_GET['id'];

$sel_fee = mysqli_query($con,"select * from fee_collection where id='$feid'");

$result=mysqli_fetch_assoc($sel_fee);
    
$uid = $result['id'];
$student_imgs = $result['student_imgs'];
$rollno = $result['rollno'];
$session = $result['session'];
$student_name = $result['student_name'];
$father_name = $result['father_name'];
$class = $result['class'];
$section = $result['section'];
$monthly_fee = $result['monthly_fee'];
$other_charges = $result['other_charges'];
$previous_balance = $result['previous_balance'];
$total_amount = $result['total_amount'];
$receive_monthly = $result['receive_monthly'];
$remaing_balance = $result['remaing_balance'];
$fees_status = $result['fees_status'];
$month = $result['month'];
$monthName = date("F", mktime(0, 0, 0, $month, 10));
}
?>
<div class="container-fluid">
<div class="row">
    <div class="col">
<form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
        <h6 class="fs-6 text-uppercase text-white bg-dark p-2 px-4">student information</h6>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">roll no#</label>
        <input name="inst_id" type="hidden" class="form-control" value="<?php echo $userId; ?>">
        <input readonly type="text" class="form-control" placeholder="00" value="<?php echo $rollno; ?>">
        <input name="rolno" type="hidden" class="form-control" placeholder="00" value="<?php echo $rollno; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">student name</label>
        <input readonly type="text" class="form-control" placeholder="Student Name" value="<?php echo $student_name; ?>">
        <input name="stu_nme" type="hidden" value="<?php echo $student_name; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">father name</label>
        <input readonly type="text" class="form-control" placeholder="Father Name" value="<?php echo $father_name; ?>">
        <input name="fthr_nme" type="hidden" value="<?php echo $father_name; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">class</label>
        <input readonly type="text" class="form-control" placeholder="Class" value="<?php echo $class; ?>">
        <input name="clos" type="hidden" value="<?php echo $class; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">section</label>
        <input readonly type="text" class="form-control" placeholder="Section" value="<?php echo $section; ?>">
        <input name="soctn" type="hidden" value="<?php echo $section; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">session</label>
        <input readonly type="text" class="form-control" placeholder="Session" value="<?php echo $session; ?>">
        <input name="sosn" type="hidden" value="<?php echo $session; ?>">
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
        <h6 class="fs-6 text-uppercase text-white bg-dark p-2 px-4">monthly  fee submission</h6>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">monthly fee</label>
        <input readonly type="text" class="form-control" placeholder="00" autocomplete="off" onkeypress="isInputNumber(event)" value="<?php echo $monthly_fee; ?>">
        <input name="monthy" type="hidden" onkeypress="isInputNumber(event)" value="<?php echo $monthly_fee; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Other Charges</label>
        <input name="othr_chrges" type="text" class="form-control" placeholder="00" onkeypress="isInputNumber(event)" autocomplete="off" value="<?php echo $other_charges; ?>">
    </div>
<?php
error_reporting (E_ALL ^ E_NOTICE);
$ids='';
$sel_fee = mysqli_query($con,"select previous_balance from fee_collection where rollno='$rollno' ORDER BY id DESC limit 0,1");
$results = mysqli_fetch_assoc($sel_fee);
$previous_balance = $results['previous_balance'];
?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">previous balance</label>
        <input name="prev" type="text" class="form-control" placeholder="00" onkeypress="isInputNumber(event)" autocomplete="off" value="<?php if(empty($previous_balance)){ echo "0"; }else{ echo $previous_balance; } ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">total amount</label>
        <input name="totl" type="text" class="form-control" placeholder="00" onkeypress="isInputNumber(event)" autocomplete="off" value="<?php echo $total_amount; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">received</label>
        <input name="recive" type="text" class="form-control" placeholder="00" onkeypress="isInputNumber(event)" autocomplete="off" value="<?php echo $receive_monthly; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">current balance</label>
        <input name="reming" type="text" class="form-control" placeholder="00" onkeypress="isInputNumber(event)" autocomplete="off" value="<?php echo $remaing_balance; ?>">
    </div>
<?php if($fees_status == "paid"){ ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Fee Status</label>
        <input name="stets" type="text" class="form-control" placeholder="Fee Status" autocomplete="off" value="<?php echo $fees_status; ?>">
    </div>
<?php }else{ ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Fee Status</label>
        <select class="form-control text-capitalize" name="stetes">
            <option class="text-capitalize">paid</option>
            <option class="text-capitalize">unpaid</option>
        </select>
    </div>
<?php } ?>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
        <label class="text-capitalize">Remarks</label>
        <textarea name="remks" class="form-control" placeholder="Write Message......."></textarea>
    </div>
<?php if(empty($student_imgs)){ }else{ ?>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3" align="center">
        <img src="student_imgs/<?php echo $student_imgs; ?>" class="img-fluid" style="width:10%;">
    </div>
<?php } ?>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3" align="right">
        <button name="btn_fes" class="text-uppercase btn btn-apna"><i class="fas fa-save"></i> save</button>
    </div>
</div>
</form>
<?php
if(isset($_POST['btn_fes'])){
    

$monthy = $_POST['monthy'];
$prev = $_POST['prev'];
$othr_chrges = $_POST['othr_chrges'];
$totl = $_POST['totl'];
$recive = $_POST['recive'];
$reming = $_POST['reming'];
$stets = strtolower($_POST['stetes']);
$remks = $_POST['remks'];

$subtfee = mysqli_query($con,"update fee_collection set monthly_fee='$monthy',previous_balance='$prev',other_charges='$othr_chrges',total_amount='$totl',receive_monthly='$recive',remaing_balance='$reming',fees_status='$stets',remarks='$remks' where id='$uid'");
if($subtfee){ echo "<script>swal.fire('Good Job!','Fee Submission Successfully Done.','success');</script>"; }else{ echo "<script>swal.fire('Oops!','Fee Submission is not Done.','error');</script>"; }

}
?>
    </div>
</div>
   
</div>


<?php require_once("source/foot-section.php"); ?>