<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#exame-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Date Sheet Manager</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col">
<div class="row">
<?php
$sl_sht = mysqli_query($con,"select classid,code,terms,create_date from dateSheet where instituteId='$userId' group by classid,code,terms,create_date");
$counts = mysqli_num_rows($sl_sht);
if($counts == 0){ echo "<div class='alert alert-success text-capitalize'>there are no record.</div>"; }
while($result = mysqli_fetch_array($sl_sht)){
    $classid = $result['classid'];
    $terms = $result['terms'];
    $code = $result['code'];
    $create_date = $result['create_date'];
$sl_clso = mysqli_query($con,"select * from addClass where id='$classid' && institute_id='$userId'");
$rst = mysqli_fetch_assoc($sl_clso);
?>    
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
        <div class="card mb-3 text-center bg-white">
<a href="view-date-sheet?id=<?php echo $code; ?>" class="text-uppercase nav-links fs-6 py-4">
    <?php echo $rst['class_name']." Date Sheet"; ?>
<h4 class="text-uppercase fs-4 fw-bold m-0 p-0"><?php echo $terms; ?></h4>
<h6><?php echo $create_date; ?></h6>    
</a>
<div class="card-body p-0">
    <a href="del-date-sheet?id=<?php echo $code; ?>" class="text-capitalize text-danger nav-link"><i class="fa fa-trash-alt"></i> Remove</a>
</div>
        </div>
    </div>
<?php } ?>    
</div>
        </div>
    </div>
<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-apna' id="btn_print"><i class="fa fa-print"></i> Print</button>
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
	document.write('<scr' + 'ipt type="text/javascript" src="//www.highcpmcreativeformat.com/4b35b8604d3ef79cbbf7b5e1fd1d5934/invoke.js"></scr' + 'ipt>');
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