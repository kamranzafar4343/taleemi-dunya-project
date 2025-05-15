<?php
require_once("../functions/db.php");

$institu_ids = $_POST['institu_ids'];
$load_clases = $_POST['load_clases'];

$sel_inst = mysqli_query($con,"select * from confirmSchools where institute_id='$institu_ids'");
$scol = mysqli_fetch_assoc($sel_inst);
$institute_id = $scol['institute_id'];
$institute_name = $scol['institute_name'];
$campus = $scol['campus'];
$cell = $scol['cell'];
$logos = $scol['logo'];
$address = $scol['address'];
$account_detail = $scol['account_detail'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$institu_ids' && id='$load_clases'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_names = $rel['class_name'];

$sel_prds = mysqli_query($con,"select * from addPeriods where instituteId='$institu_ids' && class='$load_clases'");
if(mysqli_num_rows($sel_prds)>0){
?>
<div class="row">
    <div class="col-12">
        <div class="card mb-3 p-3" style="background-color:hsl(35,100%,95%);">
<div class="d-flex mb-3">
    <div class="flex-fill">
<h6 class="fs-6 fw-bolder text-uppercase">timetable of class <?php echo "(".$class_names.")"; ?></h6>
<p class="p-0 text-muted">Find below class the class timetable. You may update the class timetable below. Manage study periods in campus settings menu.</p>
    </div>
    <div class="">
<button class="btn btn-success text-capitalize asignprde" type="submit"><i class="fa-regular fa-square-plus"></i> assign new period</button>
<button class="btn btn-primary text-capitalize" type="submit" id="btn_print"><i class="fa-solid fa-print"></i> print</button>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
   $("#btn_print").on('click',function(e){
e.preventDefault();
        var mode = 'iframe';
        var close = mode == "popup";
        var options = {mode:mode,popClose:close};
        $("div .datas").printArea(options);
    }); 
});
</script>
<div class="row">
    <div class="col-12 mb-3 datas">
<table class="w-100">
    <tr align='center'>
<td rowspan="2"><img src='portal-admins/institute-logos/<?php echo $logos; ?>' class='img-fluid' width='50'></td>
<td colspan='7'><span class="fw-bold text-uppercase fs-4 fw-bolder"><?php echo $institute_name; ?></span></td>
    </tr>
    <tr align='center'>
<td colspan="8" class="text-capitalize fw-bold"><?php echo $class_names; ?> Time Table</td>
    </tr>
    <tr align='center'>
<td colspan="8" class="text-capitalize"></td>
    </tr>
    <tr class="bg-apna" style="border:1px solid hsl(0,0%,0%);text-align:center;">
        <th style="border:1px solid hsl(0,0%,0%);" class="text-uppercase">Period</th>
        <th style="border:1px solid hsl(0,0%,0%);" class="text-uppercase">time</th>
        <th style="border:1px solid hsl(0,0%,0%);" class="text-uppercase">monday</th>
        <th style="border:1px solid hsl(0,0%,0%);" class="text-uppercase">tuesday</th>
        <th style="border:1px solid hsl(0,0%,0%);" class="text-uppercase">wednesday</th>
        <th style="border:1px solid hsl(0,0%,0%);" class="text-uppercase">thursday</th>
        <th style="border:1px solid hsl(0,0%,0%);" class="text-uppercase">friday</th>
        <th style="border:1px solid hsl(0,0%,0%);" class="text-uppercase">saturday</th>
    </tr>
        
<?php
    while($prds = mysqli_fetch_array($sel_prds)){
$class = $prds['class'];
$period_no = $prds['period_no'];
$start_time = $prds['start_time'];
$end_time = $prds['end_time'];
$period_type = $prds['period_type'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$institu_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$sel_asgn = mysqli_query($con,"select * from asignPeriods where instituteId='$institu_ids' && class='$class' && period_no='$period_no'");
$asnftch = mysqli_fetch_assoc($sel_asgn);
$subject = $asnftch['subject'];
$days_no = $asnftch['days_no'];
$teachers = $asnftch['teachers'];
?>
<tr style="border:1px solid hsl(0,0%,0%);">
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo "PERIOD ".$period_no; ?></td>
    <td style="border:1px solid hsl(0,0%,0%);"><?php echo $start_time." To ".$end_time;?></td>
<?php
if($period_type == 'prayer time'){ echo "<td colspan='6' class='text-capitalize text-center fs-5 fw-bolder' style='background-color:hsl(120,100%,80%);'>$period_type</td>";
}elseif($period_type == 'break'){ echo "<td colspan='6' class='text-capitalize text-center fs-5 fw-bolder' style='background-color:hsl(0,100%,80%);'>$period_type</td>"; }else{ ?>
<td style="border:1px solid hsl(0,0%,0%);text-align:center;">
<?php if($days_no == 1){echo $subject."<br><span class='text-danger text-capitalize'>(".$teachers.")</span>"; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid hsl(0,0%,0%);text-align:center;">
<?php if($days_no == 2){echo $subject."<br><span class='text-danger text-capitalize'>(".$teachers.")</span>"; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid hsl(0,0%,0%);text-align:center;">
<?php if($days_no == 3){echo $subject."<br><span class='text-danger text-capitalize'>(".$teachers.")</span>"; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid hsl(0,0%,0%);text-align:center;">
<?php if($days_no == 4){echo $subject."<br><span class='text-danger text-capitalize'>(".$teachers.")</span>"; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid hsl(0,0%,0%);text-align:center;">
<?php if($days_no == 5){echo $subject."<br><span class='text-danger text-capitalize'>(".$teachers.")</span>"; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid hsl(0,0%,0%);text-align:center;">
<?php if($days_no == 6){echo $subject."<br><span class='text-danger text-capitalize'>(".$teachers.")</span>"; }else{ echo "---"; } ?>
    </td>
<?php } ?>
</tr>
<?php } ?>
    </table>
        </div>
    </div>
</div>
    </div>
</div>
<script>
$(document).ready(function(){
    $(".asignprde").on('click',function(e){
e.preventDefault();        
$("#asignmdl").modal('show');
    });
});    
</script>
<?php }else{ echo "<div class='alert alert-danger'>There are no Period Found!</div>"; }  ?>
<!-- Modal -->
<div class="modal fade" id="asignmdl" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5 text-capitalize" id="staticBackdropLabel"> assing new period to teacher</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form>
    <div class="row">
        <input type="hidden" value="<?php echo $institu_ids; ?>" class="instidsp">
        <input type="hidden" value="<?php echo $load_clases; ?>" class="clses">
        <div class="col-4 mb-3">
            <label class="fs-6 text-capitalize">Section</label>
            <select class="form-select text-capitalize sectn">
                <option class="text-capitalize" value="">---select section---</option>
<?php
$sel_sectn = mysqli_query($con,"select * from addSection where institute_id='$institu_ids' && class='$load_clases'");
if(mysqli_num_rows($sel_sectn)>0){
    while($sectns = mysqli_fetch_array($sel_sectn)){
$section_name = $sectns['section_name'];
echo "<option>$section_name</option>"; 
    }
}else{ echo "<option>Add Sections!</option>"; }
?>
            </select>
        </div>
        <div class="col-4 mb-3">
            <label class="fs-6 text-capitalize">day</label>
            <select class="form-select text-capitalize dys">
                <option class="text-capitalize" value="">---select day---</option>
                <option class="text-capitalize" value="1">Monday</option>
                <option class="text-capitalize" value="2">Tuesday</option>
                <option class="text-capitalize" value="3">Wednesday</option>
                <option class="text-capitalize" value="4">thursday</option>
                <option class="text-capitalize" value="5">friday</option>
                <option class="text-capitalize" value="6">saturday</option>
            </select>
        </div>
        <div class="col-4 mb-3">
            <label class="fs-6 text-capitalize">periods</label>
            <select class="form-select text-capitalize" id="prids">
                <option class="text-capitalize" value="">---select Period---</option>
                <?php
$sel_prds = mysqli_query($con,"select * from addPeriods where instituteId='$institu_ids' && class='$load_clases'");
if(mysqli_num_rows($sel_prds)>0){
    while($perds = mysqli_fetch_array($sel_prds)){
$period_no = $perds['period_no'];
echo "<option value='$period_no'> Period ".$period_no."</option>"; 
    }
}else{ echo "<option>Add Sections!</option>"; }
        ?>
            </select>
        </div>
        <div class="col-4 mb-3">
            <label class="fs-6 text-capitalize">subjects</label>
            <select class="form-select text-capitalize sbjects">
                <option class="text-capitalize" value="">---select subject---</option>
<?php
$sel_sbjct = mysqli_query($con,"select * from addSubjects where institute_id='$institu_ids' && classid='$load_clases'");
if(mysqli_num_rows($sel_sbjct)>0){
    while($sbjct = mysqli_fetch_array($sel_sbjct)){
$subject_name = $sbjct['subject_name'];
echo "<option>$subject_name</option>"; 
    }
}else{ echo "<option>Add Sections!</option>"; }
?>
            </select>
        </div>
        <div class="col-4 mb-3">
            <label class="fs-6 text-capitalize">teacher</label>
            <select class="form-select text-capitalize techrs">
                <option class="text-capitalize" value="">---select teacher---</option>
<?php
$sel_techr = mysqli_query($con,"select * from addStaff where instituteId='$institu_ids'");
if(mysqli_num_rows($sel_techr)>0){
    while($stfs = mysqli_fetch_array($sel_techr)){
$staffName = $stfs['staffName'];
echo "<option>$staffName</option>"; 
    }
}else{ echo "<option>Please Add Staff!</option>"; }
?>
            </select>
        </div>
        <div class="col-4 mb-3 mt-4">
            <div class="d-grid">
<button class="btn btn-apna text-capitalize asingsbtn">assign <i class="fa-solid fa-angles-right"></i></button>
            </div>
        </div>
    </div>
</form>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    $(".asingsbtn").on('click',function(e){
e.preventDefault();
var instidsp = $(".instidsp").val();
var clses = $(".clses").val();
var sectn = $(".sectn").val();
var dys = $(".dys").val();
var prids = $("#prids").val();
var sbjects = $(".sbjects").val();
var techrs = $(".techrs").val();

if(sectn == ""){
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "info",
  title: "Please Select Section!"
});
}else if(dys == ""){
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "info",
  title: "Please Select Day!"
});
}else if(prids == ""){
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "info",
  title: "Please Select Period!"
});
}else if(sbjects == ""){
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "info",
  title: "Please Select Subject!"
});
}else if(techrs == ""){
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "info",
  title: "Please Select Staff!"
});
}else{
    $.ajax({
url: 'ajax/insert-asign-periods-to-teacher.php',
type: "POST",
data: {instit_ides:instidsp,aply_cls:clses,aply_sectns:sectn,aply_days:dys,perid_no:prids,aply_sbjct:sbjects,aply_techrs:techrs},
success: function(tabletims){ 
    if(tabletims == 11){
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "warning",
  title: "This Period Already Assign!"
});
    }else if(tabletims == 1){
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "Period Successfully Assign!"
});
    }else{
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "error",
  title: "Period is not Assign!"
});
    }
}
    });
}
    });
});
</script>