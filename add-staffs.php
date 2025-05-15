<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark p-3">
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'">Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> Add Staff</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row bg-apna mb-5">
        <div class="col-10">
<div class="d-flex">
    <div class="text-center flex-fill">
<h4 class="text-uppercase text-center fs-4 fw-bolder py-2">Add Staff</h4>
    </div>
</div>
        </div>
        <div  class="col-2 mt-1" align="right">
<a href="overall-staff" target="_blank" class="btn btn-dark p-1" title="Staff Manager"><i class="fa-solid fa-screwdriver-wrench"></i></a>
<a href="#" class="btn btn-danger p-1" title="Student Form Template"><i class="fa-solid fa-cloud-arrow-down"></i></a>
<a href="#" data-bs-toggle="modal" data-bs-target="#stfvideo" class="btn btn-success p-1" title="Video Help"><i class="fa-solid fa-video"></i></a>
        </div>
    </div>
    
    
<!-- Modal -->
<div class="modal fade" id="stfvideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">Add Staff</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<div class="row">
    <div class="col-12">
<iframe width="100%" src="https://www.youtube.com/embed/rN4kAJopjxw?si=mkO_lKIqIU9c78i9" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
</div>
      </div>
      
    </div>
  </div>
</div>
<!-----End Modal--------->
        <div class="row">
            <div class="col-12">
<form id="stafForm">   
    <div class="card mb-3">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                <h3 class="fs-3 fw-bold text-uppercase text-center py-3 bg-apna1 text-white">add staff Form</h3>
            </div>
                <input id="instiid" value="<?php echo $userId; ?>" type="hidden" class="form-control">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">joining date</label>
                <input id="jongdte" type="date" class="form-control">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Session</label>
                <select class="form-select aplysesins">
<?php
$sel_sesn = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
while($seins = mysqli_fetch_array($sel_sesn)){
    $session = $seins['session'];
 echo '<option>'.$session.'</option>';  
}
?>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Staff ID#</label>
                <input id="stfid" type="text" class="form-control" value="<?php echo rand(10,100000); ?>" onkeypress="isInputNumber(event)">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">applied for post</label>
                <select id="pst" class="form-control">
                    <option class="text-capitalize" value="">---select applied post---</option>
                    <option>Teaching</option>
                    <option>Non-Teaching</option>
                    <option>Admin</option>
                </select>
            </div>
<script>
$(document).ready(function(){
     $('.sbjct').hide(); 
    $('#pst').change(function(){
        if($('#pst').val() == 'Teaching') {
            $('.sbjct').show(); 
        } else {
            $('.sbjct').hide(); 
        } 
    });
});
</script>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-42mb-3 px-4">
                <label class="fs-6 text-capitalize">Staff Type</label>
                <select id="stftpe" class="form-control">
                    <option>Visitor</option>
                    <option>Full Day</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Marital Status</label>
                <select id="mritl" class="form-control">
                    <option>Married</option>
                    <option>Unmaried</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Staff Name</label>
                <input id="stnme" class="form-control" type="text" placeholder="Enter Your Staff Name">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Gender</label>
                <select id="gndr" class="form-control">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Custom</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Father / Husband Name</label>
                <input id="fthrnme" class="form-control" type="text" placeholder="Enter Father Name">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">CNIC</label> <span class="text-danger">*</span>
                <input id="cnc" class="form-control" type="text" onkeypress="isInputNumber(event)"  maxlength="13" placeholder="Enter CNIC No.">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">D-O-B</label>
                <input id="dob" class="form-control" type="date">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Cell #</label> <span class="text-danger">*</span>
                <input id="cel" class="form-control" type="text" onkeypress="isInputNumber(event)"  maxlength="11">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Whatsapp #</label> 
                <input id="phne" class="form-control" type="text" placeholder="Enter Mobile No." onkeypress="isInputNumber(event)"  maxlength="11">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4 sbjct">
                <label class="fs-6 text-capitalize">Subject</label>
                <input class="form-control" id="sub" type="text">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Home Address</label>
                <input id="area" type="text" class="form-control" placeholder="Enter Your Home Address">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Qualification</label>
                <input id="qua" class="form-control" type="text" placeholder="Enter your Qualification">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">decided Salary</label>
                <input id="slry" class="form-control" type="text" placeholder="Enter Demaned Salary" onkeypress="isInputNumber(event)"  maxlength="11">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Time In</label>
                <input id="tmein" class="form-control" type="time" placeholder="Enter Time In">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">Time Out</label>
                <input id="tmeout" class="form-control" type="time" placeholder="Enter Time Out">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">facebook account</label>
                <input id="fbac" class="form-control" type="text" placeholder="Enter Facebook Address">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">gmail account</label>
                <input id="gmla" class="form-control" type="text" placeholder="Enter Gmail Address">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3 px-4">
                <label class="fs-6 text-capitalize">image</label>
<div class="input-group">
    <input id="file" class="form-control" type="file" accept=".png,.jpg,.jpeg">
    <span id="uploaded_image"></span>
</div>
                
            </div>
<script>
$(document).ready(function(){
 $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['png','jpg','jpeg']) == -1) 
  {
   Swal.fire({ position: 'top-end', icon: 'info', title: 'Only Allow the JPG, PNG and JPEG Files', showConfirmButton: false, timer: 1500 });
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 100000)
  {
   Swal.fire({ position: 'top-end', icon: 'info', title: 'Image File Size Too Big!', showConfirmButton: false, timer: 1500 });
  }
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"staff-img-upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image').html(data);
    }
   });
  }
 });
});
</script>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="d-grid">
                    <button id="btn-form-sve" type="submit" class="btn btn-apna text-uppercase"><i class="fa fa-save"></i> save</button>                    
                </div>
            </div>
        </div>
    </div>
</form>
            </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>
<script>
$(document).ready(function(){
    $("#btn-form-sve").on('click',function(e){
    
e.preventDefault();

        var stfid = $("#stfid").val();
        var instiid = $("#instiid").val();
        var aplysesins = $(".aplysesins").val();
        var jongdte = $("#jongdte").val();
        var pst = $("#pst").val();
        var stftpe = $("#stftpe").val();
        var mritl = $("#mritl").val();
        var stnme = $("#stnme").val();
        var gndr = $("#gndr").val();
        var fthrnme = $("#fthrnme").val();
        var cnc = $("#cnc").val();
        var dob = $("#dob").val();
        var phne = $("#phne").val();
        var cel = $("#cel").val();
        var sub = $("#sub").val();
        var area = $("#area").val();
        var qua = $("#qua").val();
        var slry = $("#slry").val();
        var tmein = $("#tmein").val();
        var tmeout = $("#tmeout").val();
        var fbac = $("#fbac").val();
        var gmla = $("#gmla").val();
        var imgs = $("#file").val().replace(/C:\\fakepath\\/i, '');
if(stfid == ""){
    Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Enter Staff ID#', showConfirmButton: false, timer: 1500 });
}else if(jongdte == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Enter the Joing Date!', showConfirmButton: false, timer: 1500 }); 
    
}else if(pst == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Select the Post!', showConfirmButton: false, timer: 1500 }); 
    
}else if(stftpe == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Select the Type!', showConfirmButton: false, timer: 1500 }); 
    
}else if(stnme == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Enter the Staff Name', showConfirmButton: false, timer: 1500 });
    
}else if(gndr == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Select the Gender', showConfirmButton: false, timer: 1500 }); 
    
}else if(fthrnme == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Enter the Father Name', showConfirmButton: false, timer: 1500 }); 
    
}else if(cnc == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Enter the CNIC', showConfirmButton: false, timer: 1500 }); 
    
}else if(cel == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Enter the Cell Number', showConfirmButton: false, timer: 1500 }); 
    
}else if(slry == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Enter the Salary', showConfirmButton: false, timer: 1500 }); 
    
}else if (tmein == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Select the Time In', showConfirmButton: false, timer: 1500 }); 
    
}else if(tmeout == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Select the Time Out', showConfirmButton: false, timer: 1500 }); 
    
}else if(imgs == ""){ Swal.fire({ position: 'top-end', icon: 'info', title: 'Please Select the Staff Image!', showConfirmButton: false, timer: 1500 }); 
    
}else{
    
$.ajax({
    url: 'ajax/ajax-insert-staff-form.php',
    type: "POST",
    data: {stfidys:stfid,instiidys:instiid,jongdteys:jongdte,pstys:pst,stftpeys:stftpe,mritlys:mritl,stnmeys:stnme,gndrys:gndr,fthrnmeys:fthrnme,cncys:cnc,dobys:dob,phneys:phne,celys:cel,subys:sub,areays:area,quays:qua,slryys:slry,tmeinys:tmein,tmeoutys:tmeout,fbacys:fbac,gmlays:gmla,imgsys:imgs,ap_sesions:aplysesins},
    success: function(data){
if(data == 1){ Swal.fire({ position: 'top-end', icon: 'success', title: 'Staff Form Successfully Submited', showConfirmButton: false, timer: 1500 }); $("#stafForm").trigger("reset"); document.location.reload(); }else{ Swal.fire({ position: 'top-end', icon: 'error', title: 'Staff Form is not Submited', showConfirmButton: false, timer: 1500 });  }
    }
        });
}    
       
    });             
});
</script>
