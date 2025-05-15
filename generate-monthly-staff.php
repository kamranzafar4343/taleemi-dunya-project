<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#attendance-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Generate monthly attendance staff</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">Session</label>
        <input type="hidden" value="<?php echo $userId; ?>" name="inst" id="instutes">
<select name="sesn" class="form-select text-capitalize">
<?php
$cls_mnger = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $session = $clis['session'];
?>
    <option class="text-capitalize"><?php echo $session; ?></option>
<?php } ?>
</select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">month</label>
        <select class="form-select text-capitalize" name="mnth">
            <option value="<?php echo date("m"); ?>"><?php echo date("F"); ?></option>
            <option value="01">Jan</option>
            <option value="02">Feb</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">Jun</option>
            <option value="07">July</option>
            <option value="08">Aug</option>
            <option value="09">Sep</option>
            <option value="10">Oct</option>
            <option value="11">Nov</option>
            <option value="12">Dec</option>
        </select>
    </div>
    
    
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2">
        <div class="d-grid mt-4">
            <button name="btn_gen" type="submit" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> Generate</button>
        </div>
    </div>    
</div>
    </form>
<br><br>
<?php
if(isset($_POST['btn_gen'])){
    
    $inst = $_POST['inst'];
    $sesn = $_POST['sesn'];
    $mnth = $_POST['mnth'];
}
$month=date("m");
$first_day_this_month = date('Y-'.$month.'-01'); // hard-coded '01' for first day
$fmrtfirst = explode("-",$first_day_this_month);
$dte_start = $fmrtfirst['2'];
$last_day_this_month  = date('Y-'.$month.'-t');
$fmrtlst = explode("-",$last_day_this_month);
$dte_last = $fmrtlst['2'];
?>
    <div class="row datas">
        <div class="col">
<table class="table table-responsive table-striped w-100 bg-white">
<tr>
    <th colspan="3">Monthly Class Attendance</th>
    <th colspan="30"><h4 class="fs-4 fw-bold text-uppercase text-center"><?php echo $instituteName; ?></h4></th>
</tr>
<tr>
    <th>Admin</th>
    <td>_________________</td>
    <th colspan="4"></th>
    <td colspan="3"></td>
    <th colspan="6">Month</th>
    <td colspan="8"><span class="text-uppercase px-5" style="border-bottom:1px solid black;"><?php if(!empty($mnth)){ echo $monthName = date('F', mktime(0, 0, 0, $mnth, 10)); }else{ echo date("F"); } ?></span></td>
    <th colspan="4">Year</th>
    <td colspan="8"><span class="text-uppercase px-5" style="border-bottom:1px solid black;"><?php echo date("Y"); ?></span></td>
</tr>
    <tr align="center" class="bg-apna-opacity">
        <th>Sr.No</th>
        <th>Staff Name</th>
<?php
for($dte_start=1; $dte_start <= $dte_last; $dte_start++){
    echo "<th>$dte_start</th>";
}
?>
    </tr>
<?php
$a = 1;
if(isset($_POST['btn_gen'])){
    
    $inst = $_POST['inst'];
    $sesn = $_POST['sesn'];
    $mnth = $_POST['mnth'];
$sl_clas = mysqli_query($con,"select * from addStaff where instituteId='$inst'");
$count = mysqli_num_rows($sl_clas);
if($count == 0){ echo "<div class='alert alert-danger text-uppercase'>there are no record here.</div>"; }
while($a <= 100000 && $result = mysqli_fetch_array($sl_clas)){
$instituteId = $result['instituteId'];
$staffName = $result['staffName'];
$staffimage = $result['staffimage'];
$staffId = $result['staffId'];

?>
<tr>
    <td><?php echo $a++; ?></td>
    <td class="text-capitalize"><?php echo $staffName; ?></td>
    <?php for($r=1; $r<=31; $r++){ echo "<td></td>"; } ?>
</tr>
<?php
    }    
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
<div class="row mt-4">
    <div class="col text-center" style="width:100%;overflow:hidden;">
        <script type="text/javascript">
	atOptions = {
		'key' : '4b35b8604d3ef79cbbf7b5e1fd1d5934',
		'format' : 'iframe',
		'height' : 90,
		'width' : 728,
		'params' : {}
	};
	
</script>
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
<?php require_once("source/foot-section.php"); ?>