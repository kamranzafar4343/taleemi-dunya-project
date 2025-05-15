<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Social posts</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
<?php
$eslct_pst = mysqli_query($con,"select * from socialPost");
if(mysqli_num_rows($eslct_pst)){
    while($rslts = mysqli_fetch_array($eslct_pst)){
        $id = $rslts['id'];
        $post_name = $rslts['post_name'];
?>
<div class="col-6 col-md-4 col-lg-3 mb-3">
    <div class="card">
        <a href="#">
            <img src="portal-admins/social-post/<?php echo $post_name; ?>" class="img-fluid">
        </a>
        <div class="card-body">
<div class="d-flex">
    <div class="flex-fill">
        <div class="d-grid">
<a href="social-post-convert-to-pdf?id=<?php echo $id; ?> && inst=<?php echo $userId; ?>" class="btn btn-danger" target="_blank">
    <i class="fa-regular fa-circle-down"></i> PDF Download
</a>
        </div>
    </div>
    <div class="flex-fill">
        <div class="d-grid">
            <a href="html-convert-to-image?id=<?php echo $id; ?> && inst=<?php echo $userId; ?>" class="btn btn-success" target="_blank">
                <i class="fa-regular fa-circle-down"></i> JPG Download
            </a>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
<?php
    }
}else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; }
?>
    </div>
    

</div>
<?php require_once("source/foot-section.php"); ?>