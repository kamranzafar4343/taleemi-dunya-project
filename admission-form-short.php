<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#add-students"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'">Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> short admission form</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row bg-apna mb-5">
        <div class="col-10">
<div class="d-flex">
    <div class="text-center flex-fill">
<h4 class="text-uppercase text-center fs-4 fw-bolder py-2">quick admission form</h4>
    </div>
</div>
        </div>
        <div  class="col-2 mt-1" align="right">
<a href="all-students" target="_blank" class="btn btn-dark p-1" title="Student Manager"><i class="fa-solid fa-screwdriver-wrench"></i></a>
<a href="#" class="btn btn-danger p-1" title="Student Form Template"><i class="fa-solid fa-cloud-arrow-down"></i></a>
<a href="#" data-bs-toggle="modal" data-bs-target="#adstdntvideo" class="btn btn-success p-1" title="Video Help"><i class="fa-solid fa-video"></i></a>
        </div>
    </div>  
<!-- Modal -->
<div class="modal fade" id="adstdntvideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">Add Staff</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<div class="row">
    <div class="col-12">
<iframe width="100%" src="https://www.youtube.com/embed/eo9srv-gyW4?si=hRp45Zh60zvGxKl8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
</div>
      </div>
      
    </div>
  </div>
</div>
<!-----End Modal--------->
        <div class="row">
<div class="col-12">
<form id="short-admission-form">
<div class="row">
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="fs-6 text-capitalize text-white">Family ID#</label>
        <input id="stuid" value="<?php echo rand(10,100000); ?>" class="form-control" type="text" onkeypress="isInputNumber(event)">
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="fs-6 text-capitalize text-white">Roll#</label>
        <input id="rolno" value="<?php echo rand(10,100000); ?>" class="form-control" type="text">
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="fs-6 text-capitalize text-white">student name</label> <span class="text-danger">*</span>
<input type="text" id="usr_name" class="form-control" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" placeholder="Enter Student Name" autocomplete="off">
<input type="hidden" value="<?php echo $userId; ?>" id="instid">
<input type="hidden" value="<?php echo $userId; ?>" id="instutes">
<input type="hidden" value="<?php echo $userId; ?>" id="feeids">
<input type="hidden" value="<?php echo $userId; ?>" id="colids">
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
<label class="fs-6 text-capitalize text-white">father name</label> <span class="text-danger">*</span>
<input type="text" id="f_name" class="form-control" placeholder="Enter Father Name" autocomplete="off" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="fs-6 text-capitalize text-white">class</label> <span class="text-danger">*</span>
<select class="form-select text-capitalize" id="cls">
    <option value="" class="text-capitalize">---select class---</option>
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
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="fs-6 text-capitalize text-white">Section</label> <span class="text-danger">*</span>
<select class="form-select text-capitalize" id="strngs"><option value="">---select section---</option></select>
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
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="fs-6 text-capitalize text-white">medium</label> <span class="text-danger">*</span>
<select class="form-control text-capitalize" id="mdm"><option value=" " class="text-capitalize">select medium</option><option class="text-capitalize">English</option><option class="text-capitalize">Urdu</option></select>
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="fs-6 text-capitalize text-white">session</label> <span class="text-danger">*</span>
<select class="form-select" id="sesn">
<?php
$sl_selsesn = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
while($ses_reslt=mysqli_fetch_array($sl_selsesn)){
?>
    <option><?php echo $ses_reslt['session']; ?></option>
<?php } ?>
</select>
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="fs-6 text-capitalize text-white">gender</label> <span class="text-danger">*</span>
<select class="form-control text-capitalize" id="gndr">
    <option value="">Select Session</option>
    <option value="male">Male</option>
    <option value="female">Female</option>
</select>
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="fs-6 text-capitalize text-white">cell</label> <span class="text-danger">*</span>
<input type="text" id="phnes" class="form-control" placeholder="xxxxxxxxxxx" autocom    plete="off" maxlength="11" onkeypress="isInputNumber(event)">
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="fs-6 text-capitalize text-white">Bay Form</label> <span class="text-danger">*</span>
<input type="text" id="bfrm" class="form-control" placeholder="xxxxxxxxxxx" autocomplete="off" maxlength="13" onkeypress="isInputNumber(event)">
    </div>
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
<label class="fs-6 text-capitalize text-white">date of birth</label> <span class="text-danger">*</span>
<input type="date" id="dobs" class="form-control">
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

    <div class="col-6 col-sm-4 col-md-4 col-lg-2 col-xl-2 col-xxl-2 mb-3">
<section class="progress-area text-white"></section>
<section class="uploaded-area text-warning"></section>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-7 col-xl-8 col-xxl-8 px-4 mb-3">
<label class="fs-6 text-capitalize text-white">address</label> <span class="text-danger">*</span>
<input type="text" id="areas" class="form-control" placeholder="Enter Current Address" autocomplete="off">
    </div>
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 px-4 mb-3">
    <h4 class="fs-4 fw-bold text-white text-capitalize border-bottom">academic fee</h4>
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
    <label class="fs-6 text-capitalize">monthly fee</label> <span class="text-danger">*</span>
    <select id="monthfee" class="form-control text-capitalize" onchange="monthlyFeefinal()">
        <option value="0">Select Month Fee</option>
    </select>
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
    <label class="fs-6 text-capitalize">final discount (%)</label> <span class="text-danger">*</span>
    <input type="text" onkeypress="isInputNumber(event)" id="discnt" class="form-control" onkeyup="monthlyFeefinal()" onchange="monthlyFeefinal()" onblur="monthlyFeefinal()" onclick="monthlyFeefinal()" value="0">
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
    <label class="fs-6 text-capitalize">after discount fee</label> <span class="text-danger">*</span>
    <input autocomplete="off" id="paidfee" onkeyup="monthlyFeefinal()" onchange="monthlyFeefinal()" onblur="monthlyFeefinal()" onclick="monthlyFeefinal()" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
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
    <label class="fs-6 text-capitalize">mode of payment</label>
    <select class="form-select text-capitalize" id="mods">
        <option class="text-capitalize" value="">---select mode of payment---</option>
        <option class="text-capitalize" value="monthly">monthly</option>
        <option class="text-capitalize" value="installment">installment</option>
        <option class="text-capitalize" value="annualy">annualy</option>
    </select>
</div>
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
}
?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges1)){ echo $charges1; }else{ echo "admission fee"; }?></label>
                <input autocomplete="off" id="admfee" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)" onkeyup="otherFeetotal()" onchange="otherFeetotal()" onblur="otherFeetotal()" onclick="otherFeetotal()">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges2)){ echo $charges2; }else{ echo "annual fund"; }?></label>
                <input autocomplete="off" id="anulfee" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)" onkeyup="otherFeetotal()" onchange="otherFeetotal()" onblur="otherFeetotal()" onclick="otherFeetotal()">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges3)){ echo $charges3; }else{ echo "books"; }?></label>
                <input autocomplete="off" id="boks" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)" onkeyup="otherFeetotal()" onchange="otherFeetotal()" onblur="otherFeetotal()" onclick="otherFeetotal()">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges4)){ echo $charges4; }else{ echo "uniform"; }?></label>
                <input autocomplete="off" id="unfrm" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)" onkeyup="otherFeetotal()" onchange="otherFeetotal()" onblur="otherFeetotal()" onclick="otherFeetotal()">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges5)){ echo $charges5; }else{ echo "stationary"; }?></label>
                <input autocomplete="off" id="stnry" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)" onkeyup="otherFeetotal()" onchange="otherFeetotal()" onblur="otherFeetotal()" onclick="otherFeetotal()">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize"><?php if(!empty($charges6)){ echo $charges6; }else{ echo "others"; }?></label>
                <input autocomplete="off" id="othrs" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)" onkeyup="otherFeetotal()" onchange="otherFeetotal()" onblur="otherFeetotal()" onclick="otherFeetotal()">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 px-4 mb-3">
                <label class="fs-6 text-capitalize">total payable amount</label>
                <input autocomplete="off" id="othr_totl" onkeyup="otherFeetotal()" onchange="otherFeetotal()" onblur="otherFeetotal()" onclick="otherFeetotal()" type="text" class="form-control" placeholder="00.00" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-10 col-xxl-10 px-4 mb-3">
                <label class="fs-6 text-capitalize">Remarks</label>
                <input class="form-control" type="text" id="p1" placeholder="Write Remarks.....">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3" align="right">
                <button id="btn-form-sves" type="submit" class="btn btn-apna text-uppercase"><i class="fa fa-save"></i> save</button>
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
        </div>
<script>
$(document).ready(function(){
    $("#btn-form-sves").on('click',function(e){
        e.preventDefault();
        var instId = $("#instid").val();
        var studentId = $("#stuid").val();
        var rolNo = $("#rolno").val();
        var usr_name = $("#usr_name").val();
        var f_name = $("#f_name").val();
        var cls = $("#cls").val();
        var strngs = $("#strngs").val();
        var mdum = $("#mdm").val();
        var sesn = $("#sesn").val();
        var gndar = $("#gndr").val();
        var phne = $("#phnes").val();
        var befrm = $("#bfrm").val();
        var dob = $("#dobs").val();
        var area = $("#areas").val();
        var monthfee = $("#monthfee").val();
        var discnt = $("#discnt").val();
        var paidfee = $("#paidfee").val();
        var admfee = $("#admfee").val();
        var anulfee = $("#anulfee").val();
        var boks = $("#boks").val();
        var unfrm = $("#unfrm").val();
        var stnry = $("#stnry").val();
        var othrs = $("#othrs").val();
        var othr_totl = $("#othr_totl").val();
        var p1 = $("#p1").val();
        var moding = $("#mods").val();
        var uimgs = $("#files").val().replace(/C:\\fakepath\\/i, '');
       
       // console.log(uimgs);
        
if(usr_name == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Enter the Student Name Field!', showConfirmButton: false, timer: 1500 }); 
    
}else if(f_name == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Enter the Father Name Field!', showConfirmButton: false, timer: 1500 }); 
    
}else if(cls == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Select the Class!', showConfirmButton: false, timer: 1500 }); 
    
}else if(strngs == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Select the Section', showConfirmButton: false, timer: 1500 });
    
}else if(mdum == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Select the Medium', showConfirmButton: false, timer: 1500 }); 
    
}else if(sesn == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Select the Session', showConfirmButton: false, timer: 1500 }); 
    
}else if(gndar == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Select the Gender', showConfirmButton: false, timer: 1500 }); 
    
}else if(phne == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Enter the Cell Number', showConfirmButton: false, timer: 1500 }); 
    
}else if(befrm == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Enter the B-Form Number', showConfirmButton: false, timer: 1500 }); 
    
}else if(uimgs == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Select Student Image', showConfirmButton: false, timer: 1500 }); 
    
}else if (dob == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Choose the Date of Birth', showConfirmButton: false, timer: 1500 }); 
    
}else if(area == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Enter Student Address', showConfirmButton: false, timer: 1500 }); 
    
}else if(monthfee == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Select the Monthly Fee!', showConfirmButton: false, timer: 1500 }); 
    
}else if(discnt == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Select the Discount', showConfirmButton: false, timer: 1500 }); 
    
}else if(paidfee == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Click / Press Key on After Discount Fee Field!', showConfirmButton: false, timer: 1500 }); }else{
    
    $.ajax({
    url: 'ajax/ajax-insert-quick-form.php',
    type: "POST",
    data: {insti_id:instId,student_id:studentId,roll_no:rolNo,user_names:usr_name,father_name:f_name,aply_cls:cls,cls_section:strngs,medim:mdum,schol_sesn:sesn,gynder:gndar,contact:phne,bayfrm:befrm,date_of_birth:dob,adres:area,fnal_fe:monthfee,fe_disc:discnt,rem_fee:paidfee,carg_one:admfee,carg_two:anulfee,carg_three:boks,carg_four:unfrm,carge_five:stnry,carg_six:othrs,totl_amnt:othr_totl,remrks:p1,stimeg:uimgs,py_mods:moding},
    success: function(data){
     console.log(data);
if(data == 101){
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
  title: 'Your Student Rage is Over. Please Contact Your Company!'
})    
}else if(data == 11){

Swal.fire({
  title: "Try Again!",
  text: "Your Form is not submited.Please Check your Cell Nummber and Session!",
  icon: "warning"
});
}else if(data == 1){
    
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
  title: 'Quick Form successfully Saved!'
})
$("#short-admission-form").trigger("reset");
window.onload =  window.location = location.href;
    
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
  title: 'Quick Form Not Saved!'
})
    
}

    }
        });
        
}    
       
    });             
});
</script>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>
