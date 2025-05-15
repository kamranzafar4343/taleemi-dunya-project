<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#inquiry-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'">Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> staff inquiry Manager</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
    $("#stfinqtable").DataTable({
        columnDefs: [{
            "defaultContent": "-",
            "targets": "_all"
        }],
        bLengthChange: true,
        lengthMenu: [[10, 20, -1], [10, 50, "All"]],
        bFilter: true,
        bSort: true,
        bPaginate: true
    });
});
</script>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<table class="table table-responsive w-100 pt-4" id="stfinqtable">
    <thead>
        <tr class="bg-apna">
            <th>Date</th>
            <th>Staff ID</th>
            <th>Staff Name</th>
            <th>Qualification</th>
            <th>Subject1</th>
            <th>Subject 2</th>
            <th>D.Salary</th>
            <th>Whatsapp</th>
            <th>Edit</th>
            <th>Del</th>
        </tr>
    </thead>
    <tbody>
<?php
$sl_inqy = mysqli_query($con,"select * from staffInquiry where InstituteID='$userId' order by id desc");
$cnt = mysqli_num_rows($sl_inqy);
if($cnt == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($result = mysqli_fetch_array($sl_inqy)){
    $id = $result['id'];
    $dates = $result['dates'];
    $userID = $result['userID'];
    $staffName = $result['staffName'];
    $qualification = $result['qualification'];
    $subject1 = $result['subject1'];
    $subject2 = $result['subject2'];
    $demandSalary = $result['demandSalary'];
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $dates; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $userID; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-capitalize"><?php echo $staffName; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-uppercase"><?php echo $qualification; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-capitalize"><?php echo $subject1; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-capitalize"><?php echo $subject2; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $demandSalary; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><a href="staff-inquiry-whatsapp-form?id=<?php echo $id; ?>" target="_blank"><i class="fa-brands fa-whatsapp text-success"></i></a></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><a href="staff-inquiry-edit?id=<?php echo $id; ?>" target="_blank"><i class="text-success fas fa-edit"></i></a></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><a href="staff-inquiry-del?id=<?php echo $id; ?>"><i class="text-danger fas fa-trash-alt"></i></a></td>
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
	
</script>
    </div>
</div>
</div>
<?php require_once("source/foot-section.php"); ?>