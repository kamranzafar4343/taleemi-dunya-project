<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#exames"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Create date sheet</li>
  </ol>
</nav>
<div class="container-fluid mt-4">
<form method="post" enctype="multipart/form-data">
    <div class="row bg-apna">
        <div class="col-12">
<h4 class="text-uppercase text-center py-2">Create Date Sheet</h4>
        </div>
<div class="col">
    <div class="row p-3" style="background-color:hsl(0,0%,15%);">
<div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 cl-xxl-2">
        <label class="text-capitalize">class</label>
            <select class="form-select text-capitalize" name="cles" id="cls">
                <option class="text-capitalize" value="">---select class---</option>
<?php
$sl_cl = mysqli_query($con,"select * from addClass where institute_id='$userId'");
$cnst = mysqli_num_rows($sl_cl);
if($cnst == 0){ echo "<div class='alert alert-success text-capitalize'>There are no class generate.</div>"; }
while($row = mysqli_fetch_array($sl_cl)){
    $id = $row['id'];
    $institute_id = $row['institute_id'];
    $class_name = $row['class_name'];
?>
<option class="text-capitalize" value="<?php echo $id; ?>"><?php echo $class_name; ?></option>
<?php } ?>
            </select>
            
    </div>
    <input type="hidden" value="<?php echo $userId; ?>" id="instids">
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 cl-xxl-2">
        <label class="text-capitalize">section</label>
        <select class="form-select text-capitalize" name="scned" id="strngs"><option value=" ">---select section---</option></select>
    </div>
<script>
/// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instids').value;
//    console.log(class_name);
 
$.ajax({
   url:'ajax/class-strength.php',
   type:"POST",
   data:{ class_title:class_name,institute_code:insti },
   success: function(result){
       $('#strngs').html(result);
      //console.log(result);
   }
    });
});
</script>
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 cl-xxl-2">
        <label class="text-capitalize">term / samester / month</label>
            <select class="form-select text-capitalize" name="smest">
                <option value="" class="text-capitalize">---select term/samester/month---</option>
<?php
$sns = date("Y");
$sl_tems = mysqli_query($con,"select * from addTerms where instituteId='$userId' && session='$sns'");
$cns = mysqli_num_rows($sl_tems);
if($cns == 0){ echo "<div class='alert alert-success text-capitalize'>There are no term generate.</div>"; }
while($rest = mysqli_fetch_array($sl_tems)){
    $id = $rest['id'];
    $session = $rest['session'];
    $term = $rest['term'];
?>
<option class="text-capitalize"><?php echo $term; ?></option>
<?php } ?>
            </select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 cl-xxl-2">
        <label class="text-capitalize">session</label>
            <select class="form-select text-capitalize" name="sesin">
                <option class="text-capitalize" value="">---select session---</option>
<?php
$sl_sesn = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
$cnse = mysqli_num_rows($sl_sesn);
if($cnse == 0){ echo "<div class='alert alert-success text-capitalize'>There are no Session generate.</div>"; }
while($rests = mysqli_fetch_array($sl_sesn)){
    $id = $rests['id'];
    $institute_id = $rests['institute_id'];
    $session = $rests['session'];
?>
<option class="text-capitalize"><?php echo $session; ?></option>
<?php } ?>
            </select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 cl-xxl-2 mt-4">
        <button type="submit" name="gen_dat_sheet" class="btn btn-apna text-capitalize"> <i class="fa-regular fa-circle-check"></i> Create</button>
    </div>
    </div>
</div>
    
</div>
</form>
<?php
if(isset($_POST['gen_dat_sheet'])){
    
    $cles = $_POST['cles'];
    $scned = $_POST['scned'];
    $smest = $_POST['smest'];
    $sesin = $_POST['sesin'];
?>
    <div class="row">
<div class="col mt-5">
<form method="post" enctype="multipart/form-data">
<table class="table table-resposive table-striped w-100" style='background:hsl(35, 100%, 80%);'>
    <input value="<?php echo $cles; ?>" type="hidden" name="clid">
    <input value="<?php echo $scned; ?>" type="hidden" name="sectn">
    <input value="<?php echo $smest; ?>" type="hidden" name="smestr">
    <input value="<?php echo $sesin; ?>" type="hidden" name="sessn">
    <tr>
        <th>Date</th>
        <th>Day</th>
        <th>Subject</th>
        <th>Syllabus</th>
    </tr>
<?php
$sl_suji = mysqli_query($con,"select * from addSubjects where institute_id='$userId' && classid='$cles'");
$cnks = mysqli_num_rows($sl_suji);
for ($x = 1; $x <= $cnks; $x++) {
?>
    <tr>
        <td><input type="date" class="form-control text-capitalize" name="dtes[]"></td>
        <td>
<select class="form-select text-capitalize" name="din[]">
    <option class="text-capitalize">Sunday</option>
    <option class="text-capitalize">Monday</option>
    <option class="text-capitalize">Tuesday</option>
    <option class="text-capitalize">Wednesday</option>
    <option class="text-capitalize">Thursday</option>
    <option class="text-capitalize">Friday</option>
    <option class="text-capitalize">Saturday</option>
</select>
        </td>
        <td><select class="form-select text-capitalize" name="sbj[]">
            <option value="" class="text-capitalize">---select subject---</option>
<?php
$sl_subjt = mysqli_query($con,"select * from addSubjects where institute_id='$userId' && classid='$cles'");
while($subi = mysqli_fetch_array($sl_subjt)){
?>
<option class="text-capitalize"><?php echo $subi['subject_name']; ?></option>
<?php } ?>
        </select></td>
        <td><input type="text" class="form-control text-capitalize" name="syl[]"></td>
    </tr>
<?php } ?>
<input type="hidden" value="<?php echo $userId; ?>" name="instids" id="instids">
<input type="hidden" value="<?php echo rand(0,235426); ?>" name="cds">
<tr align="right">
    <td colspan="5"><button type="submit" class="btn btn-apna text-uppercase" name="dt_btn"><i class="fa fa-save"></i> save date sheet</button></td>
</tr>
</table>
</form>
</div>    
    </div>
<?php } 
if(isset($_POST['dt_btn'])){
    
    $din = $_POST['din'];
    $clid = $_POST['clid'];
    $sectn = $_POST['sectn'];
    $smestr = $_POST['smestr'];
    $dtes = $_POST['dtes'];
    $sbj = $_POST['sbj'];
    $syl = $_POST['syl'];
    $yers = $_POST['sessn'];
    $instids = $_POST['instids'];
    $cds = $_POST['cds'];
    $cdte = date("j-m-Y");
    
foreach ($din as $key => $value) {
  $inst_atte = mysqli_query($con,"insert into dateSheet (day,date,classid,section,terms,subject,syllabus,session,instituteId,code,create_date) values ('".$value."','".$dtes[$key]."','$clid','$sectn','$smestr','".$sbj[$key]."','".$syl[$key]."','$yers','$instids','$cds','$cdte')");    
  }
  if ($inst_atte){
  echo "<script>const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Date Sheet Created Successfully!'
})</script>";

}else{
  echo "<script>
  const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: 'Date Sheet is not Created!'
})
  </script>";
  } 
    
}

?>
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