<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#student-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'">Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> edit admission form</li>
  </ol>
</nav>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<div class="d-flex">
    <div class="p-2 text-center flex-fill">
<h4 class="text-uppercase text-center text-white mb-5">edit admission form</h4>
    </div>
</div>
<?php
if(isset($_GET['id'])){
    $ides = $_GET['id'];
    $sle_frm = mysqli_query($con,"select * from addStudents where instituteId='$userId' && id='$ides'");
    $frm = mysqli_fetch_assoc($sle_frm);
    
$stid = $frm['id'];
$admissionDate = $frm['admissionDate'];
$familyId = $frm['familyId'];
$roll_num = $frm['roll_num'];
$class = $frm['class'];
$section = $frm['section'];
$mediums = $frm['medium'];
$sessions = $frm['session'];
$frmsimage = $frm['image'];
$studentName = $frm['studentName'];
$bForm = $frm['bForm'];
$gender = $frm['gender'];
$dateOfBirth = $frm['dateOfBirth'];
$religion = $frm['religion'];
$phone = $frm['phone'];
$living = $frm['living'];
$homeAddress = $frm['homeAddress'];
$city = $frm['city'];
$district = $frm['district'];
$town = $frm['town'];
$fatherName = $frm['fatherName'];
$cnic = $frm['cnic'];
$cell = $frm['cell'];
$whatsapp = $frm['whatsapp'];
$occupation = $frm['occupation'];
$qualification = $frm['qualification'];
$facebook = $frm['facebook'];
$gmail = $frm['gmail'];
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
$remarks = $frm['remarks'];
$mode_of_payment = $frm['mode_of_payment'];
$previous_session_fee = $frm['previous_session_fee'];
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

    }
?>
<form method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $userId; ?>" id="instutes">
    <input type="hidden" value="<?php echo $userId; ?>" id="feeids">
    <input type="hidden" value="<?php echo $userId; ?>" id="colids">
    <div class="row">
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fs-6">Admission Date</label><span class="text-uppercase text-warning"> <?php echo "(".$admissionDate.")"; ?></span>
            <input type="date" class="form-control" value="<?php echo $admissionDate; ?>" name="addtes">
            <input type="hidden" class="form-control" value="<?php echo $admissionDate; ?>" name="addtes_old">
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fs-6">familyiD#</label>
            <input type="text" onkeypress="isInputNumber(event)" class="form-control" value="<?php echo $familyId; ?>" name="fmlyids">
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
            <label class="text-capitalize fs-6">Roll#</label>
            <input type="text" class="form-control" value="<?php echo $roll_num; ?>" name="rolnbr">
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2"> 
<label class="text-capitalize text-white">class</label> <span class="text-capitalize text-warning"><?php echo "(".$class_name.")"; ?></span>
<select class="form-select text-capitalize" id="cls" name="clas">
        <option class="text-capitalize" value="<?php echo $class; ?>"><?php echo $class_name; ?></option>
<?php
$cls_mnger = mysqli_query($con,"select * from addClass where institute_id='$userId'");
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
<input type="hidden" value="<?php echo $class; ?>" name='clas_old'>
        </div>
<script>
/*
VirtualSelect.init({ 
  ele: '#cls' 
});
*/
</script>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">Section</label> <span class="text-capitalize text-warning"><?php echo "(".$section.")"; ?></span>
<select class="form-select text-capitalize" id="strngs" name="sectn"><option value="">---select section---</option></select>
<input type="hidden" value="<?php echo $section; ?>" name='sectn_old'>
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">medium</label><span class="text-capitalize text-warning"> <?php echo "(".$mediums.")"; ?></span>
<select class="form-select text-capitalize" name="mdem"><option value="" class="text-capitalize">select medium</option><option class="text-capitalize">English</option><option class="text-capitalize">Urdu</option></select>
<input type="hidden" value="<?php echo $mediums; ?>" name='mdms_old'>
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">session</label><span class="text-capitalize text-warning"> <?php echo "(".$sessions.")"; ?></span>
<select class="form-select" name="sesn">
    <option value="" class="text-capitalize">---Select Session---</option>
<?php
$sl_selsesn = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
while($ses_reslt=mysqli_fetch_array($sl_selsesn)){
?>
    <option><?php echo $ses_reslt['session']; ?></option>
<?php } ?>
</select>
<input type="hidden" value="<?php echo $sessions; ?>" name='sesnsss_old'>
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">Student Image</label>
<div class="input-group">
<?php if(!empty($frmsimage)){ ?>
    <img src="student_imgs/<?php echo $frmsimage; ?>" class="img-fluid" style="width:10%;">
<?php }else{ ?>
    <img src="student_imgs/users.jpg" class="img-fluid" style="width:10%;">
<?php } ?>
    <input type="file" id="files" name="fils" class="form-control" accept=".png,.jpg,.jpeg">
    <input type="hidden" value="<?php echo $frmsimage; ?>" name='fils_old'>
</div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <h4 class="text-capitalize text-white fs-4 fw-bold" style="border-bottom:2px dashed white;">personal information</h4>
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">student name</label>
<input type="text" name="usr_name" class="form-control text-capitalize" value="<?php echo $studentName; ?>" placeholder="Enter Student Name" autocomplete="off" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">Bay Form No</label>
<input type="text" name="bfrm" class="form-control" value="<?php echo $bForm; ?>" placeholder="xxxxxxxxxxx" autocomplete="off" maxlength="13" onkeypress="isInputNumber(event)">
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">gender</label> <span class="text-capitalize text-warning"><?php echo "(".$gender.")"; ?></span>
<select class="form-select text-capitalize" name="gndr">
    <option value="" class="text-capitalize">---Select Gender---</option>
    <option value="male">Male</option>
    <option value="female">Female</option>
</select>
<input type="hidden" value="<?php echo $gender; ?>" name='gndr_old'>
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">date of birth</label> <span class="text-capitalize text-warning"><?php echo "(".$dateOfBirth.")"; ?></span>
<input type="date" name="dob" class="form-control" value="<?php echo $dateOfBirth; ?>">
<input type="hidden" name="dob_old" class="form-control" value="<?php echo $dateOfBirth; ?>">
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">religion</label>
<input type="text" name="relgn" class="form-control" value="<?php echo $religion; ?>">
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">home phone</label>
<input type="text" name="ptcl" class="form-control" value="<?php echo $phone; ?>" placeholder="xxxxxxxxxxx" autocomplete="off" maxlength="11" onkeypress="isInputNumber(event)">
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">living with</label> <span class="text-capitalize text-warning"><?php echo "(".$living.")"; ?></span>
<select class="form-select text-capitalize" name="lvng">
    <option value="" class="text-capitalize">---select living with---</option>
    <option class="text-capitalize">parents</option>
    <option class="text-capitalize">gaurdian</option>
</select>
<input type="hidden" value="<?php echo $living; ?>" name='lvng_old'>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8 col-xxl-8 mb-3">
<label class="text-capitalize text-white">address</label>
<input type="text" name="area" class="form-control" value="<?php echo $homeAddress; ?>" placeholder="Enter Current Address" autocomplete="off">
        </div>
         <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">city</label>
<input type="text" name="cty" class="form-control" value="<?php echo $city; ?>">
        </div>
         <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">district</label>
<input type="text" name="ditct" class="form-control" value="<?php echo $district; ?>">
        </div>
         <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">town</label>
<input type="text" name="twn" class="form-control" value="<?php echo $town; ?>">
        </div>
    </div>
<script type="text/javascript">
/// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instutes').value;
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

// Class to Monthly Fee
$('#cls').on('change',function(){
 var class_names = this.value;
 var instifeeid = document.getElementById('feeids').value;
  //  console.log(insti_fee_id);
 
$.ajax({
   url:'ajax/ajax-class-monthly-fee.php',
   type:"POST",
   data:{ class_titles:class_names,institute_codes:instifeeid },
   success: function(results){
       $('#monthfee').html(results);
      //console.log(results);
   }
    });
    
});

//// Monthly Fee to Discount

$(document).ready(function(){
   $("#monthfee").on('click',function(){
//            e.preventDefault();
    var monthffe = this.value;
    var colegeIds = $("#colids").val();
    var clasTles = $("#cls").val();
//    console.log(colegeIds);

$.ajax({
   url:'ajax/ajax-class-monthly-discount.php',
   type:"POST",
   data:{ classes_title:clasTles,schols_code:colegeIds,month_fe:monthffe},
   success: function(data){
       $('#discnt').html(data);
      // console.log(data);
   }
    });


   });
});    

</script>    
<div class="row">
    <div class="col-12 mb-3">
        <h4 class="text-capitalize text-white fs-4 fw-bold" style="border-bottom:2px dashed white;">father / gaurdian detail</h4>
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">father name</label>
<input type="text" name="f_name" class="form-control" value="<?php echo $fatherName; ?>" placeholder="Enter Father Name" autocomplete="off" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">CNIC No</label>
<input type="text" name="cnc" class="form-control" value="<?php echo $cnic; ?>" placeholder="xxxxxxxxxxx" autocomplete="off" maxlength="13" onkeypress="isInputNumber(event)">
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">Cell No</label>
<input type="text" name="cels" class="form-control" value="<?php echo $cell; ?>" placeholder="xxxxxxxxxxx" autocomplete="off" maxlength="11" onkeypress="isInputNumber(event)">
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">whatsapp</label>
<input type="text" name="whatsap" class="form-control" value="<?php echo $whatsapp; ?>" placeholder="xxxxxxxxxxx" autocomplete="off" maxlength="11" onkeypress="isInputNumber(event)">
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">Occupation</label>
<input type="text" name="occp" class="form-control" value="<?php echo $occupation; ?>" placeholder="Enter Father Name" autocomplete="off" autocomplete="off">
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">Qualification</label>
<input type="text" name="qulf" class="form-control" value="<?php echo $qualification; ?>" placeholder="Enter Father Name" autocomplete="off" autocomplete="off">
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">facebook account</label>
<input type="text" name="fb_ac" class="form-control" value="<?php echo $facebook; ?>" placeholder="Enter Father Name" autocomplete="off" autocomplete="off">
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="text-capitalize text-white">gmail account</label>
<input type="text" name="gml_ac" class="form-control" value="<?php echo $gmail; ?>" placeholder="Enter Father Name" autocomplete="off" autocomplete="off">
    </div>
    
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 px-4 mb-3">
    <h4 class="fs-4 fw-bold text-white text-capitalize" style="border-bottom:2px dashed white;">academic fee</h4>
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
    <label class="fs-6 text-capitalize">monthly fee</label> <span class="text-capitalize text-warning">
    <input name="monthfee" id="monthfee" onclick="monthlyFeefinal()" onkeyup="monthlyFeefinal()" onchange="monthlyFeefinal()" onblur="monthlyFeefinal()" class="form-control text-capitalize" value="<?php echo $monthlyFee; ?>">
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
    <label class="fs-6 text-capitalize">discount</label>
    <input name="discnt" id="discnt" class="form-control text-capitalize" value="<?php echo $discount; ?>" onclick="monthlyFeefinal()" onkeyup="monthlyFeefinal()" onchange="monthlyFeefinal()" onblur="monthlyFeefinal()">
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
    <label class="fs-6 text-capitalize">after discount fee</label>
    <input autocomplete="off" name="paidfee" id="paidfee" value="<?php echo $totalFee; ?>" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
</div>
<script>
function monthlyFeefinal(){
    var mFee = document.getElementById('monthfee').value;
    var discount = document.getElementById('discnt').value;
    var feepay = mFee * discount / 100;
    var pymntFee = mFee - feepay;
    document.getElementById('paidfee').value = pymntFee;
        }
</script>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
    <label class="fs-6 text-capitalize">mode of payment</label> <span class="text-capitalize text-warning"><?php echo " (".$mode_of_payment.")"; ?></span>
    <select class="form-select text-capitalize" name="mods">
        <option class="text-capitalize" value="">---select mode of payment---</option>
        <option class="text-capitalize" value="monthly">monthly</option>
        <option class="text-capitalize" value="installment">installment</option>
        <option class="text-capitalize" value="annualy">annualy</option>
    </select>
    <input value="<?php echo $mode_of_payment; ?>" type="hidden" name="mods_old">
</div>
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 px-4 mb-3">
    <h4 class="fs-4 fw-bold text-white text-capitalize" style="border-bottom:2px dashed white;">new admission other charges</h4>
</div>
<?php
$sl_titles = mysqli_query($con,"select * from addChargesTitle where instituteId='$userId' order by id desc limit 0,1");
while($chrgtitle = mysqli_fetch_array($sl_titles)){
    
    $charges1 = $chrgtitle['charges1'];
    $charges2 = $chrgtitle['charges2'];
    $charges3 = $chrgtitle['charges3'];
    $charges4 = $chrgtitle['charges4'];
    $charges5 = $chrgtitle['charges5'];
    $charges6 = $chrgtitle['charges6'];
}
?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges1)){ echo $charges1; }else{ echo "admission fee"; }?></label>
                <input autocomplete="off" name="admfee" id="admfee" value="<?php echo $admissionFee; ?>" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges2)){ echo $charges2; }else{ echo "annual fund"; }?></label>
                <input autocomplete="off" name="anulfee" id="anulfee" value="<?php echo $annualFund; ?>" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges3)){ echo $charges3; }else{ echo "books"; }?></label>
                <input autocomplete="off" name="boks" id="boks" value="<?php echo $books; ?>" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges4)){ echo $charges4; }else{ echo "uniform"; }?></label>
                <input autocomplete="off" name="unfrm" id="unfrm" value="<?php echo $uniform; ?>" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges5)){ echo $charges5; }else{ echo "stationary"; }?></label>
                <input autocomplete="off" name="stnry" id="stnry" value="<?php echo $stationary; ?>" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges6)){ echo $charges6; }else{ echo "others"; }?></label>
                <input autocomplete="off" name="othrs" id="othrs" value="<?php echo $others; ?>" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">total payable amount</label>
                <input autocomplete="off" name="othr_totl" id="othr_totl" value="<?php echo $totalAmount; ?>" onkeyup="otherFeetotal()" onclick="otherFeetotal()" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 px-4 mb-3">
                <label class="fs-6 text-capitalize">Remarks</label>
                <textarea class="form-control" name="p1" rows="10" placeholder="Write Message....." value="<?php echo $remarks; ?>"></textarea>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3" align="right">
                <button name="btn_form_sve" type="submit" class="btn btn-apna text-uppercase submitBtn"><i class="fa-solid fa-rotate"></i> update</button>
            </div>
<script>
function otherFeetotal(){
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
</form>
<?php
if(isset($_POST['btn_form_sve'])){
    
    if(!empty($_POST['addtes'])){ $addtes = $_POST['addtes']; }else{ $addtes = $_POST['addtes_old']; }
    $fmlyids = $_POST['fmlyids'];
    $rolnbr = $_POST['rolnbr'];
  if(!empty($_POST['clas'])){ $clas = $_POST['clas']; }else{ $clas = $_POST['clas_old']; }
  
  if(!empty($_POST['sectn'])){ $sectn = $_POST['sectn']; }else{ $sectn = $_POST['sectn_old']; }  
  
  if(!empty($_POST['mdem'])){ $mdum = $_POST['mdem']; }else{ $mdum = $_POST['mdms_old']; }  
  if(!empty($_POST['sesn'])){ $sesins = $_POST['sesn']; }else{ $sesins = $_POST['sesnsss_old']; } 
  
  if(!empty($_FILES['fils']['name'])){
      $fils = $_FILES['fils']['name'];  
      $filstmp = $_FILES['fils']['tmp_name'];
      $chgenme = rand(10,1002923).$fils;
      $path = "student_imgs/".$chgenme;
      move_uploaded_file($filstmp,$path);
  }else{ $chgenme = $_POST['fils_old']; } 
  
  $stdtnids = $_POST['stdtnids'];
  $usr_name = $_POST['usr_name'];
  $bfrm = $_POST['bfrm'];
  if(!empty($_POST['gndr'])){ $gndr = $_POST['gndr']; }else{ $gndr = $_POST['gndr_old']; }
  if(!empty($_POST['dob'])){ $dob = $_POST['dob']; }else{ $dob = $_POST['dob_old']; }
  $relgn = $_POST['relgn'];
  $ptcl = $_POST['ptcl'];
  if(!empty($_POST['lvng'])){ $lvng = $_POST['lvng']; }else{ $lvng = $_POST['lvng_old']; }
  $area = $_POST['area'];
  $cty = $_POST['cty'];
  $ditct = $_POST['ditct'];
  $twn = $_POST['twn'];
  $f_name = $_POST['f_name'];
  $cnc = $_POST['cnc'];
  $cels = $_POST['cels'];
  $whatsap = $_POST['whatsap'];
  $occp = $_POST['occp'];
  $qulf = $_POST['qulf'];
  $fb_ac = $_POST['fb_ac'];
  $gml_ac = $_POST['gml_ac'];
  $p1 = mysqli_real_escape_string($con,$_POST['p1']);
  $monthfee = $_POST['monthfee'];
  $discnt = $_POST['discnt'];
  $paidfee = $_POST['paidfee'];
  $admfee = $_POST['admfee'];
  $anulfee = $_POST['anulfee'];
  $boks = $_POST['boks'];
  $unfrm = $_POST['unfrm'];
  $stnry = $_POST['stnry'];
  $othrs = $_POST['othrs'];
  $othr_totl = $_POST['othr_totl'];
  if(!empty($_POST['mods'])){ $mods = $_POST['mods']; }else{ $mods = $_POST['mods_old']; }
  $prevblnce = $_POST['prevblnce'];
  
$updtStudnt = mysqli_query($con,"update addStudents set admissionDate='$addtes',familyId='$fmlyids',roll_num='$rolnbr',class='$clas',section='$sectn',medium='$mdum',session='$sesins',image='$chgenme',studentName='$usr_name',bForm='$bfrm',gender='$gndr',dateOfBirth='$dob',religion='$relgn',phone='$ptcl',living='$lvng',homeAddress='$area',city='$cty',district='$ditct',town='$twn',fatherName='$f_name',cnic='$cnc',cell='$cels',whatsapp='$whatsap',occupation='$occp',qualification='$qulf',facebook='$fb_ac',gmail='$gml_ac',remarks='$p1',monthlyFee='$monthfee',discount='$discnt',totalFee='$paidfee',admissionFee='$admfee',annualFund='$anulfee',books='$boks',uniform='$unfrm',stationary='$stnry',others='$othrs',totalAmount='$othr_totl',mode_of_payment='$mods',previous_session_fee='$prevblnce' where id='$ides'");
if($updtStudnt ==  true){
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
  title: 'Admission Form is Successfully Update!'
})</script>";
header("Refresh:0; url=admission-form-edit?id=$ides");
}else{
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
  icon: 'error',
  title: 'Admission Form is not Updated!'
})</script>";    
    }
}
?>
        </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>
