<?php
require_once("../functions/db.php");


    
$rolsnrs = $_POST['rolsnrs'];
$insts = $_POST['insts'];
$sesns = $_POST['sesns'];

$sl_stdnt = mysqli_query($con,"select * from addStudents where instituteId LIKE '%$insts%' && familyId LIKE '%$rolsnrs%'");
if(mysqli_num_rows($sl_stdnt)>0){
while($result = mysqli_fetch_array($sl_stdnt)){
    
$instituteId = $result['instituteId'];
$admissionDate = $result['admissionDate'];
$familyId = $result['familyId'];
$roll_num = $result['roll_num'];
$class = $result['class'];
$section = $result['section'];
$session = $result['session'];
$medium = $result['medium'];
$frmimage = $result['image'];
$studentName = $result['studentName'];
$bForm = $result['bForm'];
$gender = $result['gender'];
$dateOfBirth = $result['dateOfBirth'];
$religion = $result['religion'];
$phone = $result['phone'];
$living = $result['living'];
$homeAddress = $result['homeAddress'];
$city = $result['city'];
$district = $result['district'];
$town = $result['town'];
$fatherName = $result['fatherName'];
$cnic = $result['cnic'];
$cell = $result['cell'];
$whatsapp = $result['whatsapp'];
$occupation = $result['occupation'];
$qualification = $result['qualification'];
}
?>
<form id="serchdbleFrm">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
<div class="card mb-3 bg-white">
    <div class="card-header"><h4 class="fs-4 fw-bold text-capitalize"> Family Head: <span style="color:hsl(300,90%,40%);" class="fs-4 fw-bold"> Mr.<?php echo $fatherName; ?></span> CNIC: <span style="color:hsl(340,70%,40%);" class="fs-6 fw-bold"> <?php if(!empty($cnic)){ echo $cnic; }else{ echo "ID Card Number Required"; } ?> </span></h4></div>
    <div class="card-body bg-dark">
<div class="row">

        <input class="form-control" type="hidden" id="fmyID" value="<?php echo $familyId; ?>">
        <input class="form-control" type="hidden" id="rolNmbr">
        <input class="form-control" type="hidden" id="adDte" value="<?php echo date("j-m-Y"); ?>">
        <input class="form-control" type="hidden" id="rlgns" value="<?php echo $religion; ?>">
        <input class="form-control" type="hidden" id="phnes" value="<?php echo $phone; ?>">
        <input class="form-control" type="hidden" id="lvng" value="<?php echo $living; ?>">
        <input class="form-control" type="hidden" id="ctis" value="<?php echo $city; ?>">
        <input class="form-control" type="hidden" id="distc" value="<?php echo $district; ?>">
        <input class="form-control" type="hidden" id="hadres" value="<?php echo $homeAddress; ?>">
        <input class="form-control" type="hidden" id="fnme" value="<?php echo $fatherName; ?>">
        <input class="form-control" type="hidden" id="cncno" value="<?php echo $cnic; ?>">
        <input class="form-control" type="hidden" id="sels" value="<?php echo $cell; ?>">
        <input class="form-control" type="hidden" id="whtsap" value="<?php echo $whatsapp; ?>">
        <input class="form-control" type="hidden" id="ocptn" value="<?php echo $occupation; ?>">
        <input class="form-control" type="hidden" id="qul" value="<?php echo $qualification; ?>">
        <input class="form-control" type="hidden" id="twn" value="<?php echo $town; ?>">
        <input type="hidden" value="<?php echo $instituteId; ?>" id="instutes">
        <input type="hidden" value="<?php echo $instituteId; ?>" id="clsInsti">
        <input type="hidden" value="<?php echo $instituteId; ?>" id="feeids">
        <input type="hidden" value="<?php echo $instituteId; ?>" id="colids">
</div>
<div class="row">
   <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
       <label class="text-capitalize">student name</label>
       <input type="text" class="form-control" id="snme">
    </div>
<script>
var n = Math.floor(Math.random() * 11);
var k = Math.floor(Math.random() * 1000000);
document.getElementById("rolNmbr").value=k;
</script>
   <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
      <label class="text-capitalize text-white">class</label>
      <select class="form-select text-capitalize" id="cls">
         <option value=" ">select class</option>
         <?php
            $cls_mnger=mysqli_query($con, "select * from addClass where institute_id='$instituteId'");
            $cnts=mysqli_num_rows($cls_mnger);
            if($cnts==0) {
               echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
            }
            
            while($clis=mysqli_fetch_array($cls_mnger)) {
               $id=$clis['id'];
               $institute_id=$clis['institute_id'];
               $class_name=$clis['class_name'];
               ?>
                <option class="text-capitalize" value="<?php echo $id; ?>"><?php echo $class_name; ?></option>
         <?php
            }
            
            ?>
      </select>
   </div>
   <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
      <label class="text-capitalize text-white">Section</label>
      <select class="form-select text-capitalize" id="strngs"><option value=" ">select section</option></select>
   </div>
<script>
    /// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('clsInsti').value;
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
   <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
      <label class="text-capitalize text-white">session</label>
      <select class="form-select text-capitalize" id="sesns">
         <?php
            $cls_secsns = mysqli_query($con, "select * from addSession where institute_id='$instituteId' order by id desc");
            $cntsn=mysqli_num_rows($cls_secsns);
            if($cntsn==0) {
               echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
            }
            while($sein=mysqli_fetch_array($cls_secsns)) {
               $id= $sein ['id'];
               $institute_id= $sein ['institute_id'];
               $session = $sein ['session'];
               ?>
                <option class="text-capitalize"><?php echo $session; ?></option>
         <?php
            }
            
            ?>
      </select>
   </div>
   <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
       <label class="text-capitalize">Student Image</label>
<div class="input-group">
    <input type="file" class="form-control" id="files">
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
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
       <label class="text-capitalize">medium</label>
       <select class="form-select text-capitalize" id="mdm">
           <option>English</option>
           <option>Urdu</option>
       </select>
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
       <label class="text-capitalize">Gender</label>
       <select class="form-select text-capitalize" id="gndr">
           <option>Male</option>
           <option>Female</option>
       </select>
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
   <label class="text-capitalize">date of birth</label>
   <input type="date" id="dofbth" class="form-control">
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
   <label class="text-capitalize">B-Form No#</label>
   <input type="text" id="bfrm" class="form-control" onkeypress="isInputNumber(event)" maxlength="13">
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
   <label class="text-capitalize">facebook account</label>
   <input type="text" id="fbact" class="form-control">
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
   <label class="text-capitalize">gmail account</label>
   <input type="text" id="gmlact" class="form-control">
</div>

   <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 px-4 mb-3">
      <h4 class="fs-4 fw-bold text-white text-capitalize border-bottom">academic fee</h4>
   </div>
   <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
      <label class="fs-6 text-capitalize">monthly fee</label>
      <input type="text" onchange="feeDiscount()" id="monthfee" class="form-control text-capitalize" onkeypress="isInputNumber(event)">
   </div>
   <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
      <label class="fs-6 text-capitalize">discount (%)</label>
      <input id="discnt" class="form-control text-capitalize" type="text" onkeypress="isInputNumber(event)">
   </div>
   <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3"><label class="fs-6 text-capitalize">after discount fee</label><input autocomplete="off" id="paidfee" onkeyup="monthlyFeefinal()" onclick="monthlyFeefinal()" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)"></div>
   <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 px-4 mb-3">
      <h4 class="fs-4 fw-bold text-white text-capitalize border-bottom">other charges</h4>
   </div>
   <?php $sl_titles=mysqli_query($con, "select * from addChargesTitle where instituteId='$userId' order by id desc");
      while($chrgtitle=mysqli_fetch_array($sl_titles)) {
          $charges1=$chrgtitle['charges1'];
          $charges2=$chrgtitle['charges2'];
          $charges3=$chrgtitle['charges3'];
          $charges4=$chrgtitle['charges4'];
          $charges5=$chrgtitle['charges5'];
          $charges6=$chrgtitle['charges6'];
      }
      
      ?>
   <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3"><label class="fs-6 text-capitalize"><?php if( !empty($charges1)) {
      echo $charges1;
      }
      
      else {
      echo "admission fee";
      }
      
      ?></label><input autocomplete="off" id="admfee" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)"></div>
   <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3"><label class="fs-6 text-capitalize"><?php if( !empty($charges2)) {
      echo $charges2;
      }
      
      else {
      echo "annual fund";
      }
      
      ?></label><input autocomplete="off" id="anulfee" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)"></div>
   <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3"><label class="fs-6 text-capitalize"><?php if( !empty($charges3)) {
      echo $charges3;
      }
      
      else {
      echo "books";
      }
      
      ?></label><input autocomplete="off" id="boks" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)"></div>
   <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3"><label class="fs-6 text-capitalize"><?php if( !empty($charges4)) {
      echo $charges4;
      }
      
      else {
      echo "uniform";
      }
      
      ?></label><input autocomplete="off" id="unfrm" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)"></div>
   <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3"><label class="fs-6 text-capitalize"><?php if( !empty($charges5)) {
      echo $charges5;
      }
      
      else {
      echo "stationary";
      }
      
      ?></label><input autocomplete="off" id="stnry" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)"></div>
   <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3"><label class="fs-6 text-capitalize"><?php if( !empty($charges6)) {
      echo $charges6;
      }
      
      else {
      echo "others";
      }
      
      ?></label><input autocomplete="off" id="othrs" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)"></div>
   <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
      <label class="fs-6 text-capitalize">total payable amount</label>
      <input autocomplete="off" id="othr_totl" onkeyup="otherFeeTotals()" onclick="otherFeeTotals()" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
   </div>
</div>
    <div class="row">
        <div class="col-12 mb-3">
            <div class="d-grid"><button id="AddSibling" class="btn btn-apna text-uppercase"><i class="fa-solid fa-square-plus"></i> add student by family</button< /div>
            </div>
        </div>
    </div>



<script>

function monthlyFeefinal(){
    var mFee = document.getElementById('monthfee').value;
    var discount = document.getElementById('discnt').value;
    var feepay = mFee * discount / 100;
    var pymntFee = mFee - feepay;
    document.getElementById('paidfee').value = pymntFee;
        }
function otherFeeTotals(){
    var totlfes = document.getElementById('paidfee').value;
    var admFees = document.getElementById('admfee').value;
    var anulFees = document.getElementById('anulfee').value;
    var boksAmnt = document.getElementById('boks').value;
    var unfrmAmnt = document.getElementById('unfrm').value;
    var stnryAmnt = document.getElementById('stnry').value;
    var othrsAmnt = document.getElementById('othrs').value;
    admFeess = admFees * 1;
    anulFeess = anulFees * 1;
    one = admFeess + anulFeess;
    boksAmnts = boksAmnt * 1;
    two = boksAmnts + one;
    unfrmAmnts = unfrmAmnt * 1;
    three = unfrmAmnts + two;
    stnryAmnts = stnryAmnt * 1;
    four = stnryAmnts + three;
    othrsAmnts = othrsAmnt * 1;
    five = othrsAmnts + four;
    totalFess = totlfes * 1;
    six = totalFess + five; 
    document.getElementById('othr_totl').value = six;
}
</script>
    </div>
</div>
        </div>
    </div>
</form>

<script>
$(document).ready(function(){
    $("#AddSibling").on('click',function(e){
e.preventDefault();
var colIds = $("#colids").val();
var adDte = $("#adDte").val();
var fmyID = $("#fmyID").val();
var rolNmbr = $("#rolNmbr").val();
var clsf = $("#cls").val();
var stRngs = $("#strngs").val();
var mdum = $("#mdm").val();
var sesns = $("#sesns").val();
var fileNme = $("#files").val().replace(/C:\\fakepath\\/i, '');
var sNme = $("#snme").val();
var bfrm = $("#bfrm").val();
var gnDer = $("#gndr").val();
var dofbth = $("#dofbth").val();
var rlgns = $("#rlgns").val();
var phnes = $("#phnes").val();
var lvng = $("#lvng").val();
var hadres = $("#hadres").val();
var ctis = $("#ctis").val();
var distc = $("#distc").val();
var twn = $("#twn").val();
var fnmes = $("#fnme").val();
var cncnos = $("#cncno").val();
var selss = $("#sels").val();
var whtsaps = $("#whtsap").val();
var ocptns = $("#ocptn").val();
var quls = $("#qul").val();
var fbAct = $("#fbact").val();
var gmlAct = $("#gmlact").val();
var mothFee = $("#monthfee").val();
var Discnt = $("#discnt").val();
var paidFee = $("#paidfee").val();
var admFee = $("#admfee").val();
var anulFee = $("#anulfee").val();
var bokes = $("#boks").val();
var unfrem = $("#unfrm").val();
var Stnory = $("#stnry").val();
var othors = $("#othrs").val();
var OthrTotl = $("#othr_totl").val();



if(sNme == ""){
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
  icon: 'info',
  title: 'Student Name Field Reuired!'
})
}else if(clsf == ""){
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
  icon: 'info',
  title: 'Please Class Select!'
})
}else if(stRngs == ""){
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
  icon: 'info',
  title: 'Please Select Section!'
})
}else if (mdum == ""){
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
  icon: 'info',
  title: 'Please Select Medium!'
})
}else if(sesns == ""){
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
  icon: 'info',
  title: 'Please Select Session!'
})
}else if(fileNme == ""){
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
  icon: 'info',
  title: 'Please Select Student Image!'
})
}else if(bfrm == ""){
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
  icon: 'info',
  title: 'Please B-Form No#!'
})
}else if(gnDer == ""){
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
  icon: 'info',
  title: 'Please Select Gender!'
})
}else{
    $.ajax({
url: 'ajax/ajax-sibling-form-submit.php',
type: "POST",
data: {colIdsfmly:colIds,adDtefmly:adDte,fmyIDfmly:fmyID,rolNmbrfmly:rolNmbr,clsffmly:clsf,stRngsfmly:stRngs,mdumfmly:mdum,sesnsfmly:sesns,fileNmefmly:fileNme,sNmefmly:sNme,bfrmfmly:bfrm,gnDerfmly:gnDer,dofbthfmly:dofbth,rlgnsfmly:rlgns,phnesfmly:phnes,lvngfmly:lvng,hadresfmly:hadres,ctisfmly:ctis,distcfmly:distc,twnfmly:twn,fnmefmly:fnmes,cncnofmly:cncnos,selsfmly:selss,whtsapfmly:whtsaps,ocptnfmly:ocptns,qulfmly:quls,fbActfmly:fbAct,gmlActfmly:gmlAct,mothFeefmly:mothFee,Discntfmly:Discnt,paidFeefmly:paidFee,admFeefmly:admFee,anulFeefmly:anulFee,bokesfmly:bokes,unfremfmly:unfrem,Stnoryfmly:Stnory,othorsfmly:othors,OthrTotlfmly:OthrTotl},
success: function(formresult){
if(formresult == 1){
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
  icon: 'success',
  title: 'Student Successfully Added!'
})
$("#serchdbleFrm").trigger("reset");
//window.onload =  window.location = location.href;
    }else{
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
  title: 'Student Admission not Added!'
})
    }
   
}
    });
}


    });
});
</script>

<?php
}else{ echo "<div class='alert alert-danger text-capitalize'>record not found</div>"; }
?>