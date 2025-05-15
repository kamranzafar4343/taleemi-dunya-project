<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> account information</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
<div class="row">
    <div class="col-12">
        <h3 class="text-center text-uppercase fs-3 fw-bolder" style="color:hsl(28,100%,40%);"><?php echo $instituteName; ?></h3>
        <h6 class="text-center text-uppercase text-white">(ID#<?php echo $userId; ?>)</h6>
<table class="w-100">
    <thead>
        <tr style="background-color:hsl(35, 100%, 80%);">
            <th style="border:1px solid hsl(28,100%,40%);">Package</th>
            <th style="border:1px solid hsl(28,100%,40%);">Strength</th>
            <th style="border:1px solid hsl(28,100%,40%);">Activation Date</th>
            <th style="border:1px solid hsl(28,100%,40%);">Expiry Date</th>
            <th style="border:1px solid hsl(28,100%,40%);">Plan</th>
        </tr>
        <tr style="background-color:hsl(35, 100%, 80%);">
            <td style="border:1px solid hsl(28,100%,40%);"><?php echo $account_type; ?></td>
            <td style="border:1px solid hsl(28,100%,40%);"><?php echo $strength; ?></td>
            <td style="border:1px solid hsl(28,100%,40%);"><?php echo $joining_date; ?></td>
            <td style="border:1px solid hsl(28,100%,40%);"><?php echo $de_activation_date; ?></td>
            <td style="border:1px solid hsl(28,100%,40%);"><?php echo $plan; ?></td>
        </tr>
        <tr style="background-color:hsl(35, 100%, 80%);">
            <th style="border:1px solid hsl(28,100%,40%);">Decieded Payment</th>
            <th style="border:1px solid hsl(28,100%,40%);">Receive Payment</th>
            <th style="border:1px solid hsl(28,100%,40%);">Balance</th>
            <th style="border:1px solid hsl(28,100%,40%);">Reference</th>
            <th style="border:1px solid hsl(28,100%,40%);">Status</th>
        </tr>
        <tr style="background-color:hsl(35, 100%, 80%);">
            <td style="border:1px solid hsl(28,100%,40%);"><?php echo $decieded_payment; ?></td>
            <td style="border:1px solid hsl(28,100%,40%);"><?php echo $receive_payment; ?></td>
            <td style="border:1px solid hsl(28,100%,40%);"><?php echo $balance; ?></td>
            <td style="border:1px solid hsl(28,100%,40%);"><?php echo $payment_reference; ?></td>
            <td style="border:1px solid hsl(28,100%,40%);"><?php echo $status; ?></td>
        </tr>
    </thead>
</table>

    </div>
    <div class="col-12"></div>
</div>
    
    <div class="row mt-4">
        <div class="col text-center" style="width:100%;overflow:100%;">
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
<?php require_once("source/foot-section.php"); ?>