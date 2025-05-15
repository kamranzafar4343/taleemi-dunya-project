<?php
require_once("../functions/db.php");

$cles = $_POST['cles'];
$sectn = $_POST['sectn'];
$sesin = $_POST['sesin'];
$inst_ids = $_POST['inst_ids'];
$as=1;
$fl = "";


$usr = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_ids'");
$row = mysqli_fetch_assoc($usr);
$strength = $row['strength'];

$sl_clas = mysqli_query($con,"select * from addStudents where instituteId='$inst_ids' && class='$cles' && section='$sectn' && session='$sesin'");
if(mysqli_num_rows($sl_clas)>0){
?>
<div class='row datas'>
    <div class='col'>
        <table class='w-100 bg-apna-body'>
            <thead>
                <tr class='bg-apna'>
                    <th class="border-apna">Sr#</th>
                    <th class="border-apna">AD.Date</th>
                    <th class="border-apna">Roll#</th>
                    <th class="border-apna">FamilyID</th>
                    <th class="border-apna">Student Name</th>
                    <th class="border-apna">Father Name</th>
                    <th class="border-apna">Class</th>
                    <th class="border-apna">Section</th>
                    <th class="border-apna">Session</th>
                </tr>
            </thead>
            </tbody>
<?php
while($as <= 100000 && $result = mysqli_fetch_array($sl_clas)){
$stid = $result['id'];
$admissionDate = $result['admissionDate'];
if(!empty($result['image'])){ $frmimage = $result['image']; }else{ $frmimage = "users.jpg";}
$roll_num = $result['roll_num'];
$familyId = $result['familyId'];
$studentName = $result['studentName'];
$fatherName = $result['fatherName'];
$class = $result['class'];
$section = $result['section'];
$session = $result['session'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<tr>
    <td class="border-apna"><?php echo $as++; ?></td>
    <td class="border-apna"><?php echo $admissionDate; ?></td>
    <td class="border-apna"><?php echo $roll_num; ?></td>
    <td class="border-apna"><?php echo $familyId; ?></td>
    <td class='text-capitalize border-apna'><?php echo $studentName; ?></td>
    <td class='text-capitalize border-apna'><?php echo $fatherName; ?></td>
    <td class='text-uppercase border-apna'><?php echo $class_name; ?></td>
    <td class='text-uppercase border-apna'><?php echo $section; ?></td>
    <td class="border-apna"><?php echo $session; ?></td>
</tr>
<?php } ?>
<tr align="center">
    <td colspan="10"><h4 class="text-uppercase">promote class</h4></td>
</tr>
<form>
<tr>
    <td>
        <label class="text-capitalize text-dark fw-bold fs-6">Class</label>
<select class="form-select text-uppercase" id="clss">
    <option class="text-capitalize" value="<?php echo $class; ?>"><?php echo $class_name; ?></option>
<?php
$cls_mnger = mysqli_query($con,"select * from addClass where institute_id='$inst_ids'");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $class_name = $clis['class_name'];
?>
    <option class="text-capitalize" value="<?php echo $id; ?>"><?php echo $class_name; ?></option>
<?php } ?>
</select>
    </td>
    <td>
        <label class="text-capitalize fs-6 text-dark fw-bold">Section</label>
        <select class="form-select text-capitalize" id="sectns"><option value="<?php echo $section; ?>"><?php echo $section; ?></option></select>
    </td>
    <td colspan="3">
<input type="hidden" value="<?php echo $inst_ids; ?>" id="instids">
<input type="hidden" value="<?php echo $class; ?>" id="oldclas">
<input type="hidden" value="<?php echo $section; ?>" id="oldsectns">
<input type="hidden" value="<?php echo $session; ?>" id="oldsesins">
        <label class="text-capitalize fs-6 text-dark fw-bold">session</label>
        <select id="sesins" class="form-select">
            <option value="<?php echo $session; ?>"><?php echo $session; ?></option>
        <?php
        $cls_mnger = mysqli_query($con,"select * from addSession where institute_id='$inst_ids' order by id desc");
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
    </td>
    <td>
<div class="d-grid mt-4">
    <button id="prmtclas" type="submit" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> Promote</button>
</div>
    </td>
</tr>
</form>
</tbody></table></div></div>
<?php }else{ echo "<div class='alert alert-danger text-capitalize'>there are no class student found!</div>"; } ?>
<script type="text/javascript">
    /// Class to Section
$('#clss').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instids').value;
 
$.ajax({
   url:'ajax/class-strength.php',
   type:"POST",
   data:{ class_title:class_name,institute_code:insti},
   success: function(result){
       $('#sectns').html(result);
      //console.log(result);
   }
    });
});

$(document).ready(function(){
    $("#prmtclas").on('click',function(e){
e.preventDefault();
var clss = $("#clss").val();
var sectns = $("#sectns").val();
var instids = $("#instids").val();
var sesins = $("#sesins").val();
var oldclas = $("#oldclas").val();
var oldsectns = $("#oldsectns").val();
var oldsesins = $("#oldsesins").val();

$.ajax({
   url:'ajax/promote-class-students.php',
   type:"POST",
   data:{aply_clss:clss,aply_sectns:sectns,aply_instids:instids,aply_sesins:sesins,old_clases:oldclas,old_sectins:oldsectns,old_sesionss:oldsesins},
   success: function(results){

if(results == 1){
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
  title: "Class Promote Successfully!"
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
  title: "Class is not Promote!"
});
}

   }
    });


    });
});

</script>