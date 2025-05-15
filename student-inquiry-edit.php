<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#inquiry-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'">Home</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='student-inquiry-manager'">student inquiry manager</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page">edit student inquiry</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_GET['id'])){
    $ides = $_GET['id'];
$sel_inquiry = mysqli_query($con,"select * from studentInquiry where id='$ides' && instituteId='$userId'");
$inqry = mysqli_fetch_assoc($sel_inquiry);
$instituteId = $inqry['instituteId'];
$studentName = $inqry['studentName'];
$fatherName = $inqry['fatherName'];
$inquiryId = $inqry['inquiryId'];
$dates = $inqry['dates'];
$gender = $inqry['gender'];
$medium = $inqry['medium'];
$class = $inqry['class'];
$section = $inqry['section'];
$phone = $inqry['phone'];
$cell = $inqry['cell'];
$previousInstitute = $inqry['previousInstitute'];
$location = $inqry['location'];
$monthlyFee = $inqry['monthlyFee'];
$discount = $inqry['discount'];
$after_discount_fee = $inqry['after_discount_fee'];
$testFund = $inqry['testFund'];
$totalFee = $inqry['totalFee'];
$admissionFee = $inqry['admissionFee'];
$annualFund = $inqry['annualFund'];
$books = $inqry['books'];
$uniform = $inqry['uniform'];
$stationary = $inqry['stationary'];
$others = $inqry['others'];
$otherTotal = $inqry['otherTotal'];
$remarks = $inqry['remarks'];
$status = $inqry['status'];
}
$sl_clos = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rstl = mysqli_fetch_assoc($sl_clos);
$class_name = $rstl['class_name'];
?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
            <h2 class="text-uppercase text-white text-center fs-2 fw-bold p-3">edit student inquiry</h2>
<form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">student name</label>
                <input autocomplete="off" name="stdent" type="text" value="<?php echo $studentName; ?>" class="form-control text-capitalize" placeholder="Edit Your Student Name">
                <input name="usr_ids" type="hidden" id="instid" class="form-control" value="<?php echo $userId; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">father name</label>
                <input autocomplete="off" name="fthr" value="<?php echo $fatherName; ?>" type="text" class="form-control" placeholder="Enter Father Name">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">gender</label> <span class="text-capitalize text-warning"> <?php echo "(".$gender.")"; ?></span>
                <input name="ids" type="hidden" class="form-control" value="<?php echo rand(10,1000000); ?>">
                <input name="dte" type="hidden" class="form-control" value="<?php echo date("j-m-Y"); ?>">
                <select name="sex" class="form-control">
                    <option></option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Custom</option>
                </select>
                <input value="<?php echo $gender; ?>" type="hidden" name="sex_old">
                <input value="<?php echo $userId; ?>" type="hidden" id="instutes">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">medium</label> <span class="text-capitalize text-warning"><?php echo "(".$medium.")"; ?></span>
                <select name="mdm" class="form-select">
                    <option></option>
                    <option>English</option>
                    <option>Urdu</option>
                </select>
                <input value="<?php echo $medium; ?>" type="hidden" name="mdm_old">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">class</label> <span class="text-uppercase text-warning"><?php echo "(".$class_name.")"; ?></span>
                <select name="cls" class="form-select" id="cls">
                    <option class="text-capitalize" value=''>---select class---</option>
<?php
$sl_cls = mysqli_query($con,"select * from addClass where institute_id='$userId'");
if(mysqli_num_rows($sl_cls)>0){
    while($rst = mysqli_fetch_array($sl_cls)){
$id = $rst['id'];
$class_name = $rst['class_name'];
echo "<option class='text-capitalize' value='".$id."'>".$class_name."</option>";
    }
}else{
    echo "<option class='text-capitalize' value=''>There are no class found!</option>";
}
?>
                </select>
                <input type="hidden" value="<?php echo $class; ?>" name="cls_old">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
<label class="text-capitalize text-white fs-6">Section</label> <span class="text-uppercase text-warning"><?php echo "(".$section.")"; ?></span>
<select class="form-select text-capitalize" id="sectn" name="secton"><option value="" class="text-capitalize">---select section---</option></select>
            </div>
            <input type="hidden" value="<?php echo $section; ?>" name="secton_old">
<script>
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
       $('#sectn').html(result);
      //console.log(result);
   }
    });
});
</script>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">cell no.</label>
                <input autocomplete="off" name="phne" type="text" value="<?php  echo $phone; ?>" class="form-control" placeholder="xxxxxxxxxxxxxxxx" onkeypress="isInputNumber(event)"  maxlength="11">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">mobile no.</label> <span class="text-muted">(Optional)</span>
                <input autocomplete="off"name="cel" type="text" value="<?php echo $cell; ?>" class="form-control" placeholder="xxxxxxxxxxxxxxxx" onkeypress="isInputNumber(event)"  maxlength="11">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">previous institute</label>
                <input autocomplete="off" name="pre_insti" type="text" value="<?php echo $previousInstitute; ?>" class="form-control" placeholder="Last Institute Name">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">address</label>
                <input autocomplete="off" name="area" type="text" value="<?php echo $location; ?>" class="form-control" placeholder="Current Address">
            </div>
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 px-4 mb-3">
    <h4 class="fs-4 fw-bold text-white text-capitalize border-bottom">academic fee</h4>
</div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">monthly fee</label> <span class="text-capitalize text-warning"><?php echo "(".$monthlyFee.")"; ?></span>
<input id="monthfee" name="mntlyfee" type="text" onkeypress="isInputNumber(event)" class="form-control" value="<?php echo $monthlyFee; ?>">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">discount (%)</label> <span class="text-capitalize text-warning"><?php echo "(".$discount.")"; ?></span>
                <input autocomplete="off" id="discnt" name="disct" type="text" value="<?php echo $discount; ?>" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">after discount fee</label>
                <input autocomplete="off" id="paidfee" name="after_discnt_fee" value="<?php echo $after_discount_fee; ?>" onkeyup="monthlyFeefinal()" onclick="monthlyFeefinal()" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
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
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 px-4 mb-3">
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
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
<label class="fs-6 text-capitalize"><?php if(!empty($charges1)){ echo $charges1; }else{ echo "admission fee"; }?></label> <span class="text-capitalize text-warning"><?php echo "(".$admissionFee.")"; ?></span>
                <input autocomplete="off" id="admfee" name="admsnfe" type="text" value="<?php echo $admissionFee; ?>" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
<label class="fs-6 text-capitalize"><?php if(!empty($charges2)){ echo $charges2; }else{ echo "annual fund"; }?></label>  <span class="text-capitalize text-warning"><?php echo "(".$annualFund.")"; ?></span>
                <input autocomplete="off" id="anulfee" name="anualfnd" type="text" value="<?php echo $annualFund; ?>" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges3)){ echo $charges3; }else{ echo "books"; }?></label> <span class="text-capitalize text-warning"><?php echo "(".$books.")"; ?></span>
                <input autocomplete="off" id="boks" name="boks" type="text" value="<?php echo $books; ?>" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges4)){ echo $charges4; }else{ echo "uniform"; }?></label> <span class="text-capitalize text-warning"><?php echo "(".$uniform.")"; ?></span>
                <input autocomplete="off" id="unfrm" name="unfrm" type="text" value="<?php echo $uniform; ?>" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges5)){ echo $charges5; }else{ echo "stationary"; }?></label> <span class="text-capitalize text-warning"><?php echo "(".$stationary.")"; ?></span>
                <input autocomplete="off" id="stnry" name="stnry" type="text" value="<?php echo $stationary; ?>" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges6)){ echo $charges6; }else{ echo "others"; }?></label> <span class="text-capitalize text-warning"><?php echo "(".$others.")"; ?></span>
                <input autocomplete="off" id="othrs" name="othrs" type="text" value="<?php echo $others; ?>" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">total payable amount</label>
                <input autocomplete="off" id="othr_totl" name="othr_totl" value="<?php echo $otherTotal; ?>" onkeyup="otherFeetotal()" onclick="otherFeetotal()" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="text-capitalize">status</label> <span class="text-capitalize text-warning"><?php echo "(".$status.")"; ?></span>
                <select class="form-control text-capitalize" name="sts">
                    <option></option>
                    <option class="text-capitalize">pending</option>
                    <option class="text-capitalize">confirmed</option>
                    <option class="text-capitalize">not confirmed</option>
                </select>
                <input type="hidden" value="<?php echo $status; ?>" name="sts_old">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 px-4 mb-3">
                <label class="fs-6 text-capitalize">Remarks</label>
                <textarea name="remrks" class="form-control" id="p1" rows="10" placeholder="Write Message....."><?php echo $remarks; ?></textarea>
            </div>
<script>
function otherFeetotal(){
    var paidFees = document.getElementById('paidfee').value;
    var admFees = document.getElementById('admfee').value;
    var anulFees = document.getElementById('anulfee').value;
    var boksAmnt = document.getElementById('boks').value;
    var unfrmAmnt = document.getElementById('unfrm').value;
    var stnryAmnt = document.getElementById('stnry').value;
    var othrsAmnt = document.getElementById('othrs').value;
    paedFees = paidFees * 1;
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
    six = paedFees + five;
    
    document.getElementById('othr_totl').value = six;
}
</script>            
        </div>
<script type="text/javascript">
ClassicEditor
    .create(document.querySelector( '#p1' ) )
    .catch( error => {
        console.error( error );
} );
</script>            
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3 mb-3 px-4" align="right">
    <button name="btn_sve" type="submit" class="btn btn-apna text-uppercase"><i class="fa-solid fa-arrow-rotate-right"></i> &nbsp; update</button>
</div>
</form>  
        </div>
<?php
if(isset($_POST['btn_sve'])){
    
    $insti_ids = $_POST['usr_ids'];
    $stdent = $_POST['stdent'];
    $fthr = $_POST['fthr'];
    if(!empty($_POST['sex'])){ $sex = $_POST['sex']; }else{ $sex = $_POST['sex_old'];}
    if(!empty($_POST['mdm'])){ $mdm = $_POST['mdm']; }else{ $mdm = $_POST['mdm_old'];}
    if(!empty($_POST['cls'])){ $cls = $_POST['cls']; }else{ $cls = $_POST['cls_old'];}
    if(!empty($_POST['secton'])){ $secton = $_POST['secton']; }else{ $secton = $_POST['secton_old'];}
    $phne = $_POST['phne'];
    $cel = $_POST['cel'];
    $pre_insti = $_POST['pre_insti'];
    $area = $_POST['area'];
    $mntlyfee = $_POST['mntlyfee'];
    $disct = $_POST['disct'];
    $after_discnt_fee = $_POST['after_discnt_fee'];
    $tst_fnd = $_POST['tst_fnd'];
    $totl_fee = $_POST['totl_fee'];
    $admsnfe = $_POST['admsnfe'];
    $anualfnd = $_POST['anualfnd'];
    $boks = $_POST['boks'];
    $unfrm = $_POST['unfrm'];
    $stnry = $_POST['stnry'];
    $othrs = $_POST['othrs'];
    $othr_totl = $_POST['othr_totl'];
    $remrks = mysqli_real_escape_string($con,$_POST['remrks']);
    if(!empty($_POST['sts'])){ $sts = $_POST['sts']; }else{ $sts = $_POST['sts_old']; }
    

$stud_inqury = mysqli_query($con,"update studentInquiry set studentName='$stdent',fatherName='$fthr',gender='$sex',medium='$mdm',class='$cls',section='$secton',phone='$phne',cell='$cel',previousInstitute='$pre_insti',location='$area',monthlyFee='$mntlyfee',discount='$disct',totalFee='$after_discnt_fee',admissionFee='$admsnfe',annualFund='$anualfnd',books='$boks',uniform='$unfrm',stationary='$stnry',others='$othrs',otherTotal='$othr_totl',remarks='$remrks',status='$sts' where id='$ides'");
if($stud_inqury){ echo "<script>
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
  title: 'Inquiry Form Successfully Update'
})
</script>"; }else{ echo "<script>
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
  title: 'Form is not Update.'
})
</script>"; }    


    
}
?>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>