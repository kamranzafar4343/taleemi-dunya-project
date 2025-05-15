<?php require_once("source/head-section.php"); require_once("source/navbar.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='home'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> notices</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
<?php
$sl_garly = mysqli_query($con,"select * from staffNotices where instituteId='$instituteId' order by id desc");
$cont = mysqli_num_rows($sl_garly);
if($cont == 0){ echo "<div class='alert alert-danger text-capitalize'>there are no record found.</div>"; }
while($result=mysqli_fetch_array($sl_garly)){
    $id = $result['id'];
    $messages = $result['messages'];
    $dates = $result['dates'];
?>
<div class="col-6 mb-3" align="center">
    <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#notices<?php echo $id; ?>">
        <div class="card bg-white" align="center">
<div class="card-body" align="justify" style="font-size:0.9rem;"><?php echo $messages; ?></div>
        </div>
    </a>
</div>


<!-- Modal -->
<div class="modal fade" id="notices<?php echo $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Notice Date is <?php echo $dates; ?></h1>
        <button type="button" class="btn-close btn-white-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<p><?php echo $messages; ?></p>
      </div>
    </div>
  </div>
</div>

<?php } ?>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>