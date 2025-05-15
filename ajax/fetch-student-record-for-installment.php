<?php
require_once("../functions/db.php");

$ins_id = $_POST['ins_id'];
$rol_no = $_POST['rol_no'];
$instlmnt = $_POST['instlmnt'];
$aply_sesions = $_POST['aply_sesions'];

$schl = mysqli_query($con,"select * from confirmSchools where institute_id='$ins_id'");
$schol = mysqli_fetch_assoc($schl);
$institute_name = $schol['institute_name'];
$campus = $schol['campus'];
$logo = $schol['logo'];


$sel_apni = mysqli_query($con,"select * from addStudents where instituteId='$ins_id' && roll_num='$rol_no'");
$reslts = mysqli_fetch_assoc($sel_apni);
$admissionDate = $reslts['admissionDate'];
$formts = explode("-",$admissionDate);
$dtings = $formts['0'];
$mnths = $formts['1'];
$yeors = $formts['2'];
$monthName = date("M", mktime(0, 0, 0, $mnths, 10));

$admsns = $dtings.",".$monthName."/".$yeors;
$fmimages = $reslts['image'];
$famlIds = $reslts['familyId'];
$rolnms = $reslts['roll_num'];
$clas = $reslts['class'];
$sctin = $reslts['section'];
$sesin = $reslts['session'];
$stdntNme = $reslts['studentName'];
$fthrNme = $reslts['fatherName'];
$ttalFe = $reslts['totalFee'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$ins_id' && id='$clas'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<form>
    <div class="row mt-3">
        <div class="col-12" align="center">
<table class="w-100">
    <thead>
        <tr style='background:hsl(35, 100%, 80%);' align="center">
            <th width="70">
    <img src="portal-admins/institute-logos/<?php echo $logo; ?>" class="form-control" style="width:100%;">
            </th>
            <th colspan="6">
                <h4 class="fs-4 fw-bolder text-uppercase text-center p-0"><?php echo $institute_name; ?></h4>
                <div class="text-capitalize text-center p-0"><?php echo $campus; ?></div>
            </th>
            <th width="70">
    <img src="student_imgs/<?php echo $fmimages; ?>" class="form-control" style="width:100%;">
            </th>
        </tr>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th style="border:1px solid hsl(0, 0%, 0%);">St.Name</th>
            <td style="border:1px solid hsl(0, 0%, 0%);" class="text-capitalize"><?php echo $stdntNme; ?></td>
            <th style="border:1px solid hsl(0, 0%, 0%);">Father Name</th>
            <td style="border:1px solid hsl(0, 0%, 0%);" class="text-capitalize"><?php echo $fthrNme; ?></td>
            <th style="border:1px solid hsl(0, 0%, 0%);">Roll#</th>
            <td style="border:1px solid hsl(0, 0%, 0%);"><?php echo $rolnms; ?></td>
            <th style="border:1px solid hsl(0, 0%, 0%);">AD.Date</th>
            <td style="border:1px solid hsl(0, 0%, 0%);"><?php echo $admsns; ?></td>
    </tr>
    <tr style='background:hsl(35, 100%, 80%);'>
        <th style="border:1px solid hsl(0, 0%, 0%);">Class</th>
        <td style="border:1px solid hsl(0, 0%, 0%);" class="text-capitalize"><?php echo $class_name; ?></td>
        <th style="border:1px solid hsl(0, 0%, 0%);">Section</th>
        <td style="border:1px solid hsl(0, 0%, 0%);" class="text-capitalize"><?php echo $sctin; ?></td>
        <th style="border:1px solid hsl(0, 0%, 0%);">Session</th>
        <td style="border:1px solid hsl(0, 0%, 0%);" class="text-capitalize"><?php echo $sesin; ?></td>
        <th style="border:1px solid hsl(0, 0%, 0%);">Decieded Fee</th>
        <td style="border:1px solid hsl(0, 0%, 0%);" class="text-capitalize"><?php echo $ttalFe; ?></td>
    </tr>
    <tr style='background:hsl(35, 100%, 80%);' align="center">
        <th colspan="8" class="text-uppercase">Installment Plan</th>
    </tr>
        <tr class="bg-apna">
            <th style="border:1px solid hsl(0, 0%, 0%);">Sr#</th>
            <th style="border:1px solid hsl(0, 0%, 0%);">Month</th>
            <th style="border:1px solid hsl(0, 0%, 0%);" colspan="2">Issue Date</th>
            <th style="border:1px solid hsl(0, 0%, 0%);" colspan="2">Due Date</th>
            <th style="border:1px solid hsl(0, 0%, 0%);" colspan="2">Installment Fee</th>
        </tr>
    </thead>
    <tbody>
<?php
$as=1;
$slect_instlmt = mysqli_query($con,"select * from addStudents where instituteId='$ins_id' && roll_num='$rol_no'");
if(mysqli_num_rows($slect_instlmt)>0){
    while($as <= 10000 && $result = mysqli_fetch_array($slect_instlmt)){
$instituteId = $result['instituteId'];
$frmimage = $result['image'];
$familyId = $result['familyId'];
$roll_num = $result['roll_num'];
$class = $result['class'];
$section = $result['section'];
$session = $result['session'];
$studentName = $result['studentName'];
$fatherName = $result['fatherName'];
$totalFee = $result['totalFee'];
$mode_of_payment = $result['mode_of_payment'];

$instal = round($totalFee/$instlmnt);

for($w=1;$w<=$instlmnt;$w++){
?>
<input class="form-control chln_inst" type="hidden" value="<?php echo $instituteId; ?>">
<input class="form-control chln_img" type="hidden" value="<?php echo $frmimage; ?>">
<input class="form-control chln_fmly" type="hidden" value="<?php echo $familyId; ?>">
<input class="form-control chln_fthr" type="hidden" value="<?php echo $fatherName; ?>">
<input class="form-control chln_rols" type="hidden" value="<?php echo $roll_num; ?>">
<input class="form-control chln_cls" type="hidden" value="<?php echo $class; ?>">
<input class="form-control chln_st" type="hidden" value="<?php echo $studentName; ?>">
<input class="form-control chln_sectn" type="hidden" value="<?php echo $section; ?>">
<input class="form-control chln_sesin" type="hidden" value="<?php echo $aply_sesions; ?>">
        <tr style='background:hsl(35, 100%, 80%);'>
            <td><?php echo $as++; ?></td>
            <td>
<select class="text-capitalize form-select dd1">
    <option class="text-capitalize" value="<?php echo date("m"); ?>"><?php echo date("M"); ?></option>
    <option class="text-capitalize" value="01">jan</option>
    <option class="text-capitalize" value="02">feb</option>
    <option class="text-capitalize" value="03">march</option>
    <option class="text-capitalize" value="04">april</option>
    <option class="text-capitalize" value="05">may</option>
    <option class="text-capitalize" value="06">june</option>
    <option class="text-capitalize" value="07">july</option>
    <option class="text-capitalize" value="08">aug</option>
    <option class="text-capitalize" value="09">sep</option>
    <option class="text-capitalize" value="10">oct</option>
    <option class="text-capitalize" value="11">nov</option>
    <option class="text-capitalize" value="12">dec</option>
</select>
            </td>
            <td colspan="2">
<input class="form-control" type="date" name="isuesdtes[]">
            </td>
            <td colspan="2">
<input class="form-control" type="date" name="duedtes[]">
            </td>
            <td  colspan="2">
<input class="form-control" type="text" name="instlment[]" onkeypress="isInputNumber(event)" value="<?php echo round($totalFee/$instlmnt); ?>">
            </td>
        </tr>
<?php
}
    }
}else{ echo "<div class='alert alert-danger'>There are no Student Available!</div>"; }
?>
<tr align="right">
    <td colspan="11">
<button type="submit" id="gentchln" class="btn btn-apna text-uppercase"> generate challan</button>
    </td>
</tr>
    </tbody>
</table>
        </div>
    </div>
</form>
<script>
$(document).ready(function(){
    $("#gentchln").on('click',function(e){
e.preventDefault();

var chln_inst = $(".chln_inst").val();
var chln_img = $(".chln_img").val();
var chln_fmly = $(".chln_fmly").val();
var chln_rols = $(".chln_rols").val();
var chln_st = $(".chln_st").val();
var chln_fthr = $(".chln_fthr").val();
var chln_cls = $(".chln_cls").val();
var chln_sectn = $(".chln_sectn").val();
var chln_sesin = $(".chln_sesin").val();

var instlment = [];
 $('input[name="instlment[]"]').each(function(){
     instlment.push(this.value);
 });
 var dd1 = [];
 $('select.dd1').each(function(){
     dd1.push(this.value);
 });
var duedtes = [];
 $('input[name="duedtes[]"]').each(function(){
     duedtes.push(this.value);
 });
 var isuesdtes = [];
 $('input[name="isuesdtes[]"]').each(function(){
     isuesdtes.push(this.value);
 });
if(isuesdtes == ""){
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
  title: "Please Select Issue Date!"
}); 
}else if(duedtes == ""){
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
  title: "Please Select Due Date!"
});
}else{
    $.ajax({
    url: 'ajax/installment-challan-generate.php',
    type: "POST",
    data: {inst_ids:chln_inst,stu_img:chln_img,famly_id:chln_fmly,rol_num:chln_rols,stu_nme:chln_st,fathr_nme:chln_fthr,cles:chln_cls,sectn:chln_sectn,sesins:chln_sesin,amnt:instlment,aply_months:dd1,due_dates:duedtes,isueing_date:isuesdtes},
    success: function(dats){
if(dats == 1){
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
  title: "Challan Generate Successfully!"
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
  title: "Challan is not Generate!"
}); 
        }
    }
        }); 
} 

    });
});
</script>