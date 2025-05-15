<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#staff-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> salary sheet</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<?php
$moth = date("m");
$monthName = date('F', mktime(0, 0, 0, $moth, 10));
?>
<div class="container-fluid mt-4">
    <form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-4">
<label class="fs-6 text-capitalize">Month</label>
<select class="form-select text-capitalize" name="mnths">
    <option class="text-capitalize" value="<?php echo date("m"); ?>"><?php echo date("M"); ?></option>
    <option class="text-capitalize" value="01">jan</option>
    <option class="text-capitalize" value="02">feb</option>
    <option class="text-capitalize" value="03">mar</option>
    <option class="text-capitalize" value="04">apr</option>
    <option class="text-capitalize" value="05">may</option>
    <option class="text-capitalize" value="06">jun</option>
    <option class="text-capitalize" value="07">jul</option>
    <option class="text-capitalize" value="08">aug</option>
    <option class="text-capitalize" value="09">sep</option>
    <option class="text-capitalize" value="10">oct</option>
    <option class="text-capitalize" value="11">nov</option>
    <option class="text-capitalize" value="12">dec</option>
</select>
    </div>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-4">
        <input type="hidden" value="<?php echo $userId; ?>" name="inst">
<label class="text-capitalize">session</label>
<select name="sesn" class="form-select">
<?php
$cls_mnger = mysqli_query($con,"select * from addSession where institute_id='$userId'");
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
    
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mt-4">
        <div class="d-grid">
            <button name="btn_gen" type="submit" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> Generate</button>
        </div>
    </div>    
</div>
    </form>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<table class="w-100 bg-apna-body">
<thead>
    <tr align="center" class="bg-apna">
        <th class="border-apna">Sr.No</th>
        <th class="border-apna">StaffID</th>
        <th class="border-apna">Image</th>
        <th class="border-apna">Staff Name</th>
        <th class="border-apna">Father Name</th>
        <th class="border-apna">Post</th>
        <th class="border-apna">Type</th>
        <th class="border-apna">Session</th>
        <th class="border-apna">Basic Salary</th>
        <th class="border-apna">Monthly Slip</th>
        <th class="border-apna">Annual Sheet</th>
    </tr>
</thead>
<tbody>
<?php
$a = 1;
if(isset($_POST['btn_gen'])){
    $mnths = $_POST['mnths'];
    $sesn = $_POST['sesn'];
    $inst = $_POST['inst'];
$sl_clas = mysqli_query($con,"select * from addStaff where instituteId='$inst' && session='$sesn' order by id desc");
$count = mysqli_num_rows($sl_clas);
if($count > 0){ 
while($a <= 100000 && $result = mysqli_fetch_array($sl_clas)){
$stafid = $result['id'];
$instituteId = $result['instituteId'];
$staffName = $result['staffName'];
$fatherName = $result['fatherName'];
$appliedPost = $result['appliedPost'];
$staffType = $result['staffType'];
$session = $result['session'];
$staffId = $result['staffId'];
$salary = $result['salary'];
if(!empty($result['staffimage'])){ $staffimage = $result['staffimage']; }else{ $staffimage = "users.jpg"; }
?>
<tr align="center" style="background-color:hsla(0,0%,40%,0.2);">
    <td class="border-apna"><?php echo $a++; ?></td>
    <td class="border-apna"><?php echo $staffId; ?></td>
    <td class="border-apna" width="20"><img src="staff_imgs/<?php echo $staffimage; ?>" class="img-fluid"></td>
    <td class="border-apna"><?php echo $staffName; ?></td>
    <td class="border-apna"><?php echo $fatherName; ?></td>
    <td class="border-apna"><?php echo $appliedPost; ?></td>
    <td class="border-apna"><?php echo $staffType; ?></td>
    <td class="border-apna"><?php echo $session; ?></td>
    <td class="border-apna"><?php echo $salary; ?></td>
    <td class="border-apna"><a class="btn btn-success text-capitalize" href="monthly-salary-slip?id=<?php echo $staffId; ?> && mnth=<?php echo $mnths; ?> && sesin=<?php echo $sesn; ?>" target="_blank">monthly slip</a></td>
    <td class="border-apna"><a class="btn btn-danger text-capitalize" href="annual-salary-sheet?id=<?php echo $staffId; ?> && mnth=<?php echo $mnths;?> && sesin=<?php echo $sesn; ?>" target="_blank">annual sheet</a></td>
    <input type="hidden" value="<?php echo $userId; ?>" name="inst_id">
</tr>
<?php    
    }
}else{ echo "<div class='alert alert-success p-2'>There are no Record Found!</div>"; } 
}
$b = 1;
$mn = date("m");
$yrs = date("Y");
$sl_stud = mysqli_query($con,"select * from addStaff where instituteId='$userId' && session='$yrs' order by id desc");
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
$salary = $rows['salary'];
if(!empty($rows['staffimage'])){ $staffimage = $rows['staffimage']; }else{ $staffimage = "users.jpg"; }
?>
<tr align="center">
    <td class="border-apna"><?php echo $b++; ?></td>
    <td class="border-apna"><?php echo $staffId; ?></td>
    <td class="border-apna" width="20"><img src="staff_imgs/<?php echo $staffimage; ?>" class="img-fluid"></td>
    <td class="border-apna"><?php echo $staffName; ?></td>
    <td class="border-apna"><?php echo $fatherName; ?></td>
    <td class="border-apna"><?php echo $appliedPost; ?></td>
    <td class="border-apna"><?php echo $staffType; ?></td>
    <td class="border-apna"><?php echo $session; ?></td>
    <td class="border-apna"><?php echo $salary; ?></td>
    <td class="border-apna"><a class="btn btn-success text-capitalize" href="monthly-salary-slip?id=<?php echo $staffId; ?> && mnth=<?php echo $mn; ?> && sesin=<?php echo $yrs; ?>" target="_blank">monthly slip</a></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><a class="btn btn-danger text-capitalize" href="annual-salary-sheet?id=<?php echo $staffId; ?> && mnth=<?php echo $mn; ?> && sesin=<?php echo $yrs; ?>" target="_blank">annual sheet</a></td>
    <input type="hidden" value="<?php echo $userId; ?>" name="inst_id">
</tr>
<?php } ?>
</tbody>
</table>
        </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>