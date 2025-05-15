<?php
require_once("../functions/db.php");

$rolnbr = $_POST['rolnbr'];
$colg_id = $_POST['colg_id'];

$sle_frm = mysqli_query($con,"select * from addStudents where instituteId='$colg_id' && roll_num='$rolnbr'");
if(mysqli_num_rows($sle_frm)>0){
$frm = mysqli_fetch_assoc($sle_frm);
$admissionDate = $frm['admissionDate'];
$familyId = $frm['familyId'];
$roll_num = $frm['roll_num'];
$sessions = $frm['session'];
$studentName = $frm['studentName'];
$bForm = $frm['bForm'];
$gender = $frm['gender'];
$dateOfBirth = $frm['dateOfBirth'];
$phone = $frm['phone'];
$religion = $frm['religion'];
$city = $frm['city'];
$district = $frm['district'];
$town = $frm['town'];
$frmsimage = $frm['image'];
$homeAddress = $frm['homeAddress'];
$fatherName = $frm['fatherName'];
$occupation = $frm['occupation'];
$qualification = $frm['qualification'];
$cells = $frm['cell'];
$whatsapp = $frm['whatsapp'];
$remarks = $frm['remarks'];
$mode_of_payment = $frm['mode_of_payment'];
$class = $frm['class'];
$section = $frm['section'];

$monthlyFee = $frm['monthlyFee'];
$discount = $frm['discount'];
$totalFee = $frm['totalFee'];


$admissionFee = $frm['admissionFee'];
$annualFund = $frm['annualFund'];
$books = $frm['books'];
$uniform = $frm['uniform'];
$stationary = $frm['stationary'];
$others = $frm['others'];
$totalAmount = $frm['totalAmount'];

$sl_clsip1 = mysqli_query($con,"select * from addClass where institute_id='$colg_id' && id='$class'");
$rel1 = mysqli_fetch_assoc($sl_clsip1);
$class_name1 = $rel1['class_name'];
?>

  <div class="row">
<div class="col-12 mb-3">
    <div class="fs-6 fw-bolder text-uppercase px-3 py-1 bars">student information</div>
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6 text-capitalize">Admission Date</label> <span class="text-warning">(<?php echo $admissionDate; ?>)</span>
    <input type="date" class="form-control admsndte" value="<?php echo $admissionDate; ?>">
    <input type="hidden" class="admsndteold" value="<?php echo $admissionDate; ?>">
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6 text-capitalize">Registration#</label>
    <input type="text" class="form-control regtn" value="<?php echo $familyId; ?>">
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6 text-capitalize">Roll#</label>
    <input type="text" class="form-control rolnbr" value="<?php echo $roll_num; ?>">
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6 text-capitalize">session</label>
    <select class="form-select text-capitalize" id="sesins">
        <option><?php echo $sessions; ?></option>
<?php
$sel_sesins = mysqli_query($con,"select * from addSession where institute_id='$colg_id' order by id desc");
if(mysqli_num_rows($sel_sesins)>0){
    while($sesin = mysqli_fetch_array($sel_sesins)){
$session = $sesin['session'];
echo "<option>$session</option>"; 
    }
}else{ echo "<option value=''>Session Not Found!</option>"; }
?>
    </select>
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6 text-capitalize">Student Name</label>
    <input type="text" class="form-control stnme" id="stnme" placeholder="Enter Student Name" value="<?php echo $studentName; ?>">
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6 text-capitalize">Bay Form #</label>
    <input type="text" onkeypress="isInputNumber(event)" id="byfrm" class="form-control byfrm" placeholder="xxxxx-xxxxxxx-x" value="<?php echo $bForm; ?>">
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6 text-capitalize">gender</label>
    <select class="text-capitalize form-select" id="gendr">
        <option class="text-capitalize"><?php echo $gender; ?></option>
        <option class="text-capitalize">male</option>
        <option class="text-capitalize">female</option>
    </select>
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6">Date of Birth</label>
    <input type="date" class="form-control dtbrth" value="<?php echo $dateOfBirth; ?>">
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6">Cell#</label>
    <input type="text" onkeypress="isInputNumber(event)" id="contct" class="form-control contct" placeholder="xxxx-xxxxxxxx" value="<?php echo $phone; ?>">
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6">Religion</label>
    <select class="text-capitalize form-select relgn">
        <option><?php echo $religion; ?></option>
        <option>Muslim</option>
        <option>Non-Muslim</option>
    </select>
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6">City</label>
    <input type="text" class="form-control preschl" placeholder="City" value="<?php echo $city; ?>">
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6">District</label>
    <input type="text" class="form-control distrct" placeholder="District" value="<?php echo $district; ?>">
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6">Town</label>
    <input type="text" class="form-control twn" placeholder="Town" value="<?php echo $town; ?>">
</div>
<div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
    <label class="fs-6 text-capitalize text-white">Student Image</label> <span class="text-danger">*</span>
    <div class="input-group">
        <input type="file" id="files" class="form-control" accept=".png,.jpg,.jpeg">
        <div id="img-upload" class="px-3"></div>
    </div>
</div>
<script>
    $(document).ready(function() {
    $('#files').change(function(){
        var file_data = $('#files').prop('files')[0];
        var form_data = new FormData();                  
        form_data.append('files', file_data);
        $.ajax({
            url: "upload-img.php",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                $("#img-upload").html(data);
            //    console.log(data);
            }
        });
    });
});

</script>
<div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
    <label class="fs-6">Current Address</label>
    <input type="text" class="form-control crntadrs" placeholder="Enter Your Home Address" value="<?php echo $homeAddress; ?>">
</div>
<div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-3">
    <img class="img-fluid" src="student_imgs/<?php if(!empty($frmsimage)){ echo $frmsimage; }else{ echo "users.jpg"; } ?>" style="width:20%;">
</div>
<div class="col-12 mb-3">
    <div class="fs-6 fw-bolder text-uppercase px-3 py-1 bars">Father information</div>
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6 text-capitalize">Father Name</label>
    <input type="text" class="form-control fthrnme" placeholder="Enter Student Name" value="<?php echo $fatherName; ?>">
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6">Occupation</label>
    <input type="text" class="form-control ocptn" placeholder="Enter Your Last Class" value="<?php echo $occupation; ?>">
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6">Qualification</label>
    <select class="form-select text-capitalize qulfctn">
        <option class="text-capitalize"><?php echo $qualification; ?></option>
        <option class="text-capitalize">un educated</option>
        <option class="text-capitalize">middle</option>
        <option class="text-capitalize">matric</option>
        <option class="text-capitalize">intermediate</option>
        <option class="text-capitalize">graduation</option>
        <option class="text-capitalize">master</option>
        <option class="text-capitalize">m-phil</option>
        <option class="text-capitalize">phd</option>
    </select>
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6">Father Contact #</label>
    <input type="text" onkeypress="isInputNumber(event)" class="form-control fthrphne" placeholder="xxxx-xxxxxxxx" value="<?php echo $cells; ?>">
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6">Whatsapp#</label>
    <input type="text" onkeypress="isInputNumber(event)" class="form-control hmephne" placeholder="xxxx-xxxxxxxx" value="<?php echo $whatsapp; ?>">
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6">Reference</label>
    <input type="text" class="form-control refrnce" placeholder="Enter Your Reference Name" value="<?php echo $remarks; ?>">
</div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <label class="fs-6">Source</label>
    <select class="form-select text-capitalize sorce">
        <option class="text-capitalize"><?php echo $mode_of_payment; ?></option>
        <option class="text-capitalize">student</option>
        <option class="text-capitalize">brochure</option>
        <option class="text-capitalize">banner</option>
        <option class="text-capitalize">social media</option>
        <option class="text-capitalize">others</option>
    </select>
</div>
<div class="col-12 mb-3">
    <div class="fs-6 fw-bolder text-uppercase px-3 py-1 bars">Academic information</div>
</div>
<input type="hidden" value="<?php echo $colg_id; ?>" id="instid">
<input type="hidden" value="<?php echo $ides; ?>" id="stids">
<input type="hidden" value="<?php echo $frmsimage; ?>" id="oldimges">
<table class="w-100 table-style">
    <tr align="center">
        <th>Select Class</th>
        <th>Section</th>
        <th>Fee</th>
        <th>Discount (%)</th>
        <th>After Discount Fee</th>
    </tr>
    <tr>
        <td>
<select class="form-select text-capitalize cls1">
    <option class="text-capitalize" value="">---select class---</option>
<?php
$sel_cls1= mysqli_query($con,"select * from addClass where institute_id='$colg_id'");
if(mysqli_num_rows($sel_cls1)>0){
    while($clas1=mysqli_fetch_array($sel_cls1)){
$ids = $clas1['id'];
$class_name = $clas1['class_name'];
$duration = $clas1['duration'];
echo "<option class='text-capitalize' value='$ids'>$class_name</option>";
    }
}else{ echo "<option class='text-capitalize' value=''>Class no Found!</option>"; }
?>
</select>
        </td>
        <td>
<select class="form-select text-capitalize sectn1">
    <option class="text-capitalize">---Select Section---</option>
</select>
        </td>
        <td>
<select class="form-select text-capitalize mfe1" id="mfe1" onchange="feeDiscont1()">
    <option class="text-capitalize" value="">---select Fee---</option>
</select>
        </td>
        <td>
<input type="text" class="form-control disct1" value="0" id="disct1" onkeypress="isInputNumber(event)" onkeyup="feeDiscont1()" onblur="feeDiscont1()" onchange="feeDiscont1()" onclick="feeDiscont1()">
        </td>
        <td>
<input type="text" class="form-control discfee1" id="discfee1" onkeypress="isInputNumber(event)" onkeyup="feeDiscont1()" onblur="feeDiscont1()" onchange="feeDiscont1()" onclick="feeDiscont1()">
        </td>
    </tr>
</table>
<div class="col-12 mb-3 mt-3" align="right">
    <button class="btn btn-apna text-uppercase svebtns"><i class="fa fa-save"></i> Save</button>
</div>
    </div>
<script>
//// Monthly Fee 1 to Discout Fee 1
function feeDiscont1(){
var mnthFee = parseInt(document.getElementById("mfe1").value);
var disicnt = parseInt(document.getElementById("disct1").value);
var fes = mnthFee * disicnt/100;
var pymntFee = mnthFee - fes;
document.getElementById("discfee1").value=pymntFee;
    }
/// Class 1 to Section
$('.cls1').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instid').value;

$.ajax({
   url:'ajax/class-strength.php',
   type:"POST",
   data:{ class_title:class_name,institute_code:insti },
   success: function(result){
       $('.sectn1').html(result);
      //console.log(result);
   }
    }); 
});
// Class 1 to Monthly Fee
$('.cls1').on('change',function(){
 var class_names = this.value;
 var instifeeid = document.getElementById('instid').value;
 
$.ajax({
   url:'ajax/ajax-class-monthly-fee.php',
   type:"POST",
   data:{ class_titles:class_names,institute_codes:instifeeid },
   success: function(results){
       $('.mfe1').html(results);
   }
    });
    
});
</script>
<?php 
}else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; }
?>
<script>
$(document).ready(function(){
    $('.svebtns').on('click',function(e){
e.preventDefault();
var instids = $("#instid").val();
var gendr = $("#gendr").val();
var distrct = $(".distrct").val();
var twn = $(".twn").val();
var admsndte = $(".admsndte").val();
var sesins = $("#sesins").val();
var regtn = $(".regtn").val();
var rolnbr = $(".rolnbr").val();
var stnme = $(".stnme").val();
var byfrm = $(".byfrm").val();
var dtbrth = $(".dtbrth").val();
var contct = $(".contct").val();
var qulfctn = $(".qulfctn").val();
var preschl = $(".preschl").val();
var relgn = $(".relgn").val();
var crntadrs = $(".crntadrs").val();
var fthrnme = $(".fthrnme").val();
var ocptn = $(".ocptn").val();
var fthrphne = $(".fthrphne").val();
var hmephne = $(".hmephne").val();
var refrnce = $(".refrnce").val();

var cls1 = $(".cls1").val();
var sectn1 = $(".sectn1").val();
var mfe1 = $(".mfe1").val();
var disct1 = $(".disct1").val();
var discfee1 = $(".discfee1").val();

var uimgs = $("#files").val().replace(/C:\\fakepath\\/i, '');

var sorce = $(".sorce").val();

$.ajax({
    url: 'ajax/insert-computer-college-form.php',
    type: "POST",
    data: {registrn:regtn,rol_numbr:rolnbr,stu_name:stnme,bay_form:byfrm,date_birth:dtbrth,cel:contct,qualifictn:qulfctn,cities:preschl,relign:relgn,crnt_addres:crntadrs,fathr_name:fthrnme,occupatn:ocptn,fathr_pnone:fthrphne,home_contct:hmephne,refernces:refrnce,class_one:cls1,sectin_one:sectn1,month_feone:mfe1,discount_one:disct1,discntfe_one:discfee1,ad_date:admsndte,aply_sesions:sesins,schol_id:instids,aply_genders:gendr,districts:distrct,twons:twn,st_imge:uimgs,st_source:sorce},
    success: function(frms){
if(frms == 1){
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
  title: "Admission Form in Successfully Save!"
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
  title: "Admission Form is not Save!"
}); 
}
    }
});

    });
});
</script>
  