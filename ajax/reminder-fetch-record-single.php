<?php
require_once("../functions/db.php");

$inst_ds = $_POST['inst_ds'];
$rol_s = $_POST['rol_s'];

$sl_remdr = mysqli_query($con,"select * from reminders where instituteId='$inst_ds' && user_role='$rol_s' order by id desc limit 0,1");

if(mysqli_num_rows($sl_remdr)>0){
    while($roys = mysqli_fetch_array($sl_remdr)){
$remid = $roys['id'];
$dates = $roys['dates'];
$frmts = explode("-",$dates);
$dte = $frmts['2'];
$mont = $frmts['1'];
$monthName = date('F', mktime(0, 0, 0, $mont, 10));
$times = $roys['times'];
$ftmts = explode(":",$times);
$hrs = $ftmts["0"];
$mint = $ftmts["1"];
if($hrs <= 12){ $splizer = "PM"; }else{ $splizer = "AM"; }
$contents = $roys['contents'];
?>
<div class="row mb-3">
    <div class="col-12">
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading"><?php echo $dte.",".$monthName."  ".$hrs.":".$mint." ".$splizer; ?></h4>
  <p><?php echo $contents; ?></p>
  <hr>
  <p class="mb-0">
      <div class="d-grid">
<a href="del-reminders?id=<?php echo $remid; ?>" class="btn btn-danger">
    <i class="fa-solid fa-xmark fa-2x"></i>
</a>
      </div>
  </p>
</div>
        
    </div>
</div>
<?php
    } 
}else{ echo "<div class='text-capitalize alert alert-success'>there are no To Do List.</div>"; }
?>