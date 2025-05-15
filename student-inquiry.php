<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#add-inquiry"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">student inquiry</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<style type="text/css">
#clops:focus{ border: none; }
</style>
<!-- Modal -->
<div class="modal fade" id="spce" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">Check class space</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form>
<div class="row">
    <input id="instutes" type="hidden" class="form-control" value="<?php echo $userId; ?>">
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-3">
        <label class="text-capitalize">class</label>
        <select class="text-capitalize form-select" id="cls">
            <option class="text-capitalize">select class</option>
<?php
$sl_clots = mysqli_query($con,"select * from addClass where institute_id='$userId' order by id asc");
while($clots = mysqli_fetch_array($sl_clots)){
    $id = $clots['id'];
?>
    <option class="text-capitalize" value="<?php echo $id; ?>"><?php echo $clots['class_name']; ?></option>
<?php } ?>
        </select>
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-3">
        <label class="text-capitalize">section</label>
        <select class="form-select text-capitalize" id="strngs">
            <option class="text-capitalize">---Select Section---</option>
        </select>
    </div>
</div>
</form>
<table class="w-100">
    <tr style="background-color:hsl(35,100%,80%);color:black;">
        <th>Sr#</th>
        <th>Class</th>
        <th>Section</th>
        <th>Total</th>
        <th>Strength</th>
        <th>Available</th>
    </tr>
    <tr id="tlbe" style="background-color:hsl(35,100%,80%);color:black;"></tr>
</table>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
/// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instutes').value;
 //   console.log(insti);
$.ajax({
   url:'ajax/class-strength.php',
   type:"POST",
   data:{ class_title:class_name,institute_code:insti },
   success: function(result){
       $('#strngs').html(result);
   }
    });
});

/// Class to Section
$('#strngs').on('change',function(){
 var sectuin = this.value;
 var instiu = document.getElementById('instutes').value;
 var clpps = document.getElementById('cls').value;
//   console.log(instiu);
   
$.ajax({
   url:'ajax/section-strength.php',
   type:"POST",
   data:{ section_name:sectuin,institute_codes:instiu,class_tile:clpps },
   success: function(results){
       $('#tlbe').html(results);
       //console.log(results);
   }
    });

});
</script>

<div class="container-fluid mt-4" style="background:hsl(0,0%,15%);">
    <div class="row bg-apna">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 py-1">
<div class="d-flex">
    <div class="flex-fill">
        <h5 class="text-uppercase text-center fs-5 fw-bold">student inquiry form</h5>
    </div>
    <div class="">
<a href="student-inquiry-manager" class="me-3 btn btn-dark p-1" target="_blank"title="Manager">
    <i class="fa-solid fa-screwdriver-wrench"></i>
</a>
<a href="#" class="me-3 btn btn-warning p-1" title="Check Class Space" data-bs-toggle="modal" data-bs-target="#spce">
    <i class="fa-regular fa-rectangle-list"></i>
</a>
<a href="#" target="_blank" class="me-3 btn btn-danger p-1" title="Inquiry Form Template">
    <i class="fa-solid fa-cloud-arrow-down"></i>
</a>
<a href="#" target="_blank" class="me-3 btn btn-success p-1" title="Video Help">
    <i class="fa-solid fa-video"></i>
</a>
    </div>
</div>
    </div>
</div>
<form method="post" enctype="multipart/form-data" class="pt-4">
        <div class="row">
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">student name</label>
                <input autocomplete="off" name="stdent" type="text" class="form-control" placeholder="Enter Your Student Name">
                <input name="usr_ids" type="hidden" class="form-control" value="<?php echo $userId; ?>" id="colid">
                <input name="usr_ids" type="hidden" class="form-control" value="<?php echo $userId; ?>" id="colids">
                <input type="hidden" value="<?php echo $userId; ?>" id="instutes">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">father name</label>
                <input autocomplete="off" name="fthr" type="text" class="form-control" placeholder="Enter Father Name">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">gender</label>
                <input name="ids" type="hidden" class="form-control" value="<?php echo rand(10,1000000); ?>">
                <input name="dte" type="hidden" class="form-control" value="<?php echo date("j-m-Y"); ?>">
                <select name="sex" class="form-select">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Custom</option>
                </select>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">medium</label>
                <select name="mdm" class="form-select">
                    <option>English</option>
                    <option>Urdu</option>
                </select>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">class</label>
                <select name="cls" class="text-capitalize form-select" id="clas">
                    <option class="text-capitalize" value="">---select class---</option>
<?php
$cls_mnger = mysqli_query($con,"select * from addClass where institute_id='$userId' order by id asc");
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
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
<label class="text-capitalize text-white">Section</label>
<select class="form-select text-capitalize" id="sectn" name="secton"><option value="" class="text-capitalize">---select section---</option></select>
            </div>
<script type="text/javascript">

/// Class to Section
$('#clas').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instutes').value;
//    console.log(class_name);
 
$.ajax({
   url:'ajax/class-strength.php',
   type:"POST",
   data:{ class_title:class_name,institute_code:insti },
   success: function(result){
       $('#sectn').html(result);
      //console.log(result);
   }
    });
});

/// Class to Monthly Fee
$('#clas').on('change',function(){
 var className = this.value;
 var instiClsId = document.getElementById('colid').value;
//    console.log(instiClsId);
 
$.ajax({
   url:'ajax/ajax-class-monthly-fee.php',
   type:"POST",
   data:{ class_titles:className,institute_codes:instiClsId },
   success: function(datas){
       $('#monthfee').html(datas);
       //console.log(datas);
   }
    });
});

$(document).ready(function(){
   $("#monthfee").on('click',function(){
//            e.preventDefault();
    var monthffe = this.value;
    var colegeIds = $("#colids").val();
    var clasTles = $("#clas").val();
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
<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">session</label>
                <select name="seijn" class="text-capitalize form-select">
<?php
$sesn_mnger = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
$cntsn = mysqli_num_rows($sesn_mnger);
if($cntsn == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($sesn = mysqli_fetch_array($sesn_mnger)){
    $id = $sesn['id'];
    $institute_id = $sesn['institute_id'];
    $session = $sesn['session'];
?>
                    <option class="text-capitalize"><?php echo $session; ?></option>
<?php } ?>
                </select>
</div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">cell no.</label>
                <input autocomplete="off" name="phne" type="text" class="form-control" placeholder="xxxxxxxxxxxxxxxx" onkeypress="isInputNumber(event)"  maxlength="11">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">Whatsapp no.</label> <span class="text-muted">(Optional)</span>
                <input autocomplete="off"name="cel" type="text" class="form-control" placeholder="xxxxxxxxxxxxxxxx" onkeypress="isInputNumber(event)"  maxlength="11">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">previous institute</label>
                <input autocomplete="off" name="pre_insti" type="text" class="form-control" placeholder="Last Institute Name">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">address</label>
                <input autocomplete="off" name="area" type="text" class="form-control" placeholder="Current Address">
            </div>
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 px-4 mb-3">
    <h4 class="fs-4 fw-bold text-white text-capitalize border-bottom">academic fee</h4>
</div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">monthly /Annual fee</label>
                <select id="monthfee" name="mntlyfee"class="form-select text-capitalize">
                    <option value="0">Select Monthly / Annual Fee</option>
                </select>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">discount (%)</label>
<select id="discnt" name="disct" class="form-select text-capitalize"><option value="0">select discount</option></select>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">after discount fee</label>
                <input autocomplete="off" id="paidfee" name="totl_fee" onkeyup="monthlyFeefinal()" onclick="monthlyFeefinal()" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
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
<div class="col-12 px-4 mb-3">
    <h4 class="fs-4 fw-bold text-white text-capitalize border-bottom">other charges</h4>
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
    $charges7 = $chrgtitle['charges7'];
}
?>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges1)){ echo $charges1; }else{ echo "admission fee"; }?></label>
                <input autocomplete="off" id="admfee" name="admsnfe" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges2)){ echo $charges2; }else{ echo "annual fund"; }?></label>
                <input autocomplete="off" id="anulfee" name="anualfnd" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges3)){ echo $charges3; }else{ echo "books"; }?></label>
                <input autocomplete="off" id="boks" name="boks" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges4)){ echo $charges4; }else{ echo "uniform"; }?></label>
                <input autocomplete="off" id="unfrm" name="unfrm" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges5)){ echo $charges5; }else{ echo "stationary"; }?></label>
                <input autocomplete="off" id="stnry" name="stnry" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges6)){ echo $charges6; }else{ echo "others"; }?></label>
                <input autocomplete="off" id="othrs" name="othrs" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">total payable amount</label>
                <input autocomplete="off" id="othr_totl" name="othr_totl" onkeyup="otherFeetotal()" onclick="otherFeetotal()" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-10 col-xl-10 col-xxl-10 px-4 mb-3">
                <label class="fs-6 text-capitalize">Remarks</label>
                <input name="remrks" class="form-control" id="p1" type="text" placeholder="Write Remarks.....">
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
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3 mb-3 px-4" style="background:hsl(0,0%,15%);">
    <div class="d-grid">
<button name="btn_sve" type="submit" class="btn btn-apna text-uppercase"><i class="fa-regular fa-floppy-disk"></i> &nbsp; save inquiry form</button>
    </div>
</div>
</form>  
        </div>

<?php
if(isset($_POST['btn_sve'])){
    
    $insti_ids = $_POST['usr_ids'];
    $stdent = $_POST['stdent'];
    $fthr = $_POST['fthr'];
    $ids = $_POST['ids'];
    $dte = $_POST['dte'];
    $sex = $_POST['sex'];
    $mdm = $_POST['mdm'];
    $cls = strtolower($_POST['cls']);
    $secton = strtolower($_POST['secton']);
    $seijn = $_POST['seijn'];
    $phne = $_POST['phne'];
    $cel = $_POST['cel'];
    $pre_insti = $_POST['pre_insti'];
    $area = $_POST['area'];
    $mntlyfee = $_POST['mntlyfee'];
    $disct = $_POST['disct'];
    $totl_fee = $_POST['totl_fee'];
    $admsnfe = $_POST['admsnfe'];
    $anualfnd = $_POST['anualfnd'];
    $boks = $_POST['boks'];
    $unfrm = $_POST['unfrm'];
    $stnry = $_POST['stnry'];
    $othrs = $_POST['othrs'];
    $othr_totl = $_POST['othr_totl'];
    $remrks = mysqli_real_escape_string($con,$_POST['remrks']);
    $mth = date("m");
    $stats = "pending";
$duplicate = mysqli_query($con,"select * from studentInquiry where instituteId='$usr_ids' && phone='$phne' && studentName='$stdent' && fatherName='$fthr'");
if(mysqli_num_rows($duplicate) > 0){
    echo "<script>swal.fire('Sorry!','Student Inquiry Already Submited.','info');</script>";
}else{
$stud_inqury = mysqli_query($con,"insert into studentInquiry (instituteId,session,studentName,fatherName,inquiryId,dates,gender,medium,class,section,phone,cell,previousInstitute,location,monthlyFee,discount,totalFee,admissionFee,annualFund,books,uniform,stationary,others,otherTotal,remarks,month,status) values ('$insti_ids','$seijn','$stdent','$fthr','$ids','$dte','$sex','$mdm','$cls','$secton','$phne','$cel','$pre_insti','$area','$mntlyfee','$disct','$totl_fee','$admsnfe','$anualfnd','$boks','$unfrm','$stnry','$othrs','$othr_totl','$remrks','$mth','$stats')");
if($stud_inqury){ echo '<script>
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
  title: "Form Submited successfully!"
});
</script>'; }else{ echo '<script>const Toast = Swal.mixin({
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
  title: "Your Inquiry Form is not Submit!"
});</script>'; }    
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