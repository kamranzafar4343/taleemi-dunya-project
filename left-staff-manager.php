<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#staff-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> left staff manager</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<table class="table table-responsive w-100 pt-3" id="allstudents">
<thead>
    <tr align="center" class="bg-apna">
        <th>Sr.No</th>
        <th>StaffID</th>
        <th>Image</th>
        <th>Staff Name</th>
        <th>Father Name</th>
        <th>Post</th>
        <th>Type</th>
        <th>Session</th>
        <th>Rejoin</th>
    </tr>
</thead>
<tbody>
<?php    
$b = 1;
$sl_stud = mysqli_query($con,"select * from leftStaff where instituteId='$userId'");
$counts = mysqli_num_rows($sl_stud);
if($counts == 0){ echo "<div class='alert alert-danger text-uppercase'>there are no record here.</div>"; }
while($b <= 100000 && $rows = mysqli_fetch_array($sl_stud)){
$stafid = $rows['id'];
$instituteId = $rows['instituteId'];
$staffName = $rows['staffName'];
$fatherName = $rows['fatherName'];
$appliedPost = $rows['appliedPost'];
$staffType = $rows['staffType'];
$session = $rows['session'];
$staffId = $rows['staffId'];
$staffimage = $rows['staffimage'];
?>
<tr align="center" style="background:hsl(35, 100%, 80%);">
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $b++; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $staffId; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" width="50"><img src="staff_imgs/<?php if(!empty($staffimage)){ echo $staffimage; }else{ echo "users.jpg"; } ?>" class="img-fluid"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $staffName; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $fatherName; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $appliedPost; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $staffType; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $session; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><a href="left-staff-rejoin?id=<?php echo $stafid; ?>" class="btn btn-success">Rejoin</a></td>
    <input type="hidden" value="<?php echo $userId; ?>" name="inst_id">
</tr>
<?php } ?>
</tbody>
</table>
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
<?php require_once("source/foot-section.php"); ?>