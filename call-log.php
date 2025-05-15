<?php require_once("source/head-section.php"); require_once("source/navbar.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Call Log</li>
  </ol>
</nav>
<div class="container-fluid mt-4">
<form method="post" enctype="multipart/form-data">
    <div class="row">
<input type="hidden" value="<?php echo $userId; ?>" name="inst_id">
<input type="hidden" value="<?php echo date("j-m-Y"); ?>" name="dtes">
<input type="hidden" value="<?php echo rand(10,10000); ?>" name="inqids">
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<label class="text-uppercase">Type</label>
<select class="form-select text-capitalize" name="tpes">
    <option class="text-capitalize">student inquiry</option>
    <option class="text-capitalize">Staff inquiry</option>
    <option class="text-capitalize">visitor</option>
    <option class="text-capitalize">marketing</option>
</select>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">student name</label>
            <input class="form-control" type="text" name="snme">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">father name</label>
            <input class="form-control" type="text" name="fnme">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">phone</label>
            <input class="form-control" type="text" name="phne" onkeypress="isInputNumber">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize">cell</label>
            <input class="form-control" type="text" name="sel" onkeypress="isInputNumber">
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
            <label class="text-capitalize">remarks</label>
            <textarea class="form-control" rows="10" placeholder="Write......" name="rmrks"></textarea>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-4" align="right">
<button type="submit" name="btn_itm" class="btn btn-apna text-uppercase"> <i class="fa-regular fa-square-check"></i> submit</button>
        </div>
    </div>
</form>
<?php
if(isset($_POST['btn_itm'])){
    
    $inst_id = $_POST['inst_id'];
    $dtes = $_POST['dtes'];
    $inqids = $_POST['inqids'];
    $tpes = $_POST['tpes'];
    $snme = $_POST['snme'];
    $fnme = $_POST['fnme'];
    $phne = $_POST['phne'];
    $sel = $_POST['sel'];
    $rmrks = $_POST['rmrks'];

$inst_lg = mysqli_query($con,"insert into callLog (instituteId,dates,unqid,type,customer_name,father_name,phone,cell,content) values ('$inst_id','$dtes','$inqids','$tpes','$snme','$fnme','$phne','$sel','$rmrks')");
if($inst_lg){ echo "<script>swal.fire('Good Job!','Call Log Register Successfully Update.','success');</script>"; }else{ echo "<script>swal.fire('Oops!','Call Log inquiry is not Submited.','error');</script>"; }
}
?>
</div>
<?php require_once("source/foot-section.php"); ?>