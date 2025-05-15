<!-- Modal -->
<div class="modal fade" id="academics" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">academics</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<div class="row">
    
    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
        <div class="card mb-3 text-center">
            <a href="#" class="nav-links text-uppercase bg-white p-3 px-4" data-bs-toggle="modal" data-bs-target="#add-clas">Add Class</a>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
        <div class="card mb-3 text-center">
            <a href="#" class="nav-links text-uppercase bg-white p-3 px-4" data-bs-toggle="modal" data-bs-target="#add-sectn">Add Section</a>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
        <div class="card mb-3 text-center">
            <a href="#" class="nav-links text-uppercase bg-white p-3 px-4" data-bs-toggle="modal" data-bs-target="#add-subj">Add Subject</a>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
        <div class="card mb-3 text-center">
            <a href="#" class="nav-links text-uppercase bg-white p-3 px-4" data-bs-toggle="modal" data-bs-target="#add-sesn">Add Session</a>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
        <div class="card mb-3 text-center">
            <a href="#" class="nav-links text-uppercase bg-white p-3 px-4" data-bs-toggle="modal" data-bs-target="#add-trm">Add Examination Type</a>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
        <div class="card mb-3 text-center">
<a href="#" data-bs-toggle="modal" data-bs-target="#timetble" class="nav-links text-uppercase bg-white p-3 px-4">create time table</a>
        </div>
    </div>
    
</div>
      </div>
      
    </div>
  </div>
</div>

<!-- Time Table Modal -->
<div class="modal fade" id="timetble" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">Create Time Table</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<div class="row">
    <div class="col">
        <div class="card mb-3 text-center">
            <a href="#" class="nav-links text-uppercase bg-white p-3 px-4" data-bs-toggle="modal" data-bs-target="#scholtble" >School Time Table</a>
        </div>
    </div>
    <div class="col">
        <div class="card mb-3 text-center">
<a href="javascript:void()" onclick="location.href='create-time-table'" class="nav-links text-uppercase bg-white p-3 px-4">class time table</a>
        </div>
    </div>
    
</div>
      </div>
      
    </div>
  </div>
</div>

<!-- School Time Table Modal -->
<div class="modal fade" id="scholtble" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">School time table</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form class="timFrm">
<div class="row">
    <div class="col">
<label class="text-capitalize">time in</label>
<input type="time" class="form-control timin" id="timeInput">
    </div>
    <div class="col">
<label class="text-capitalize">time out</label>
<input type="time" class="form-control timout">
    </div>
    <div class="col mt-4">
<div class="d-grid">
    <button type="submit" class="btn btn-apna text-uppercase scholtimbtn">add school timing</button>
</div>
    </div>
</div>
</form>
<script>
$(document).ready(function(){
    $(".scholtimbtn").on('click',function(e){
e.preventDefault();
var timIns = $(".timin").val();
var timOuts = $(".timout").val();
var schlCdes = $("#instidss").val();
if(timIns == ""){
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
  title: 'Select Time In!'
})  
}else if(timOuts == ""){
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
  title: 'Select Time Out!'
})
}else if(schlCdes == ""){
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
  icon: 'warning',
  title: 'Please Contact Your Admin!'
})
}else{
    $.ajax({
url: 'ajax/insert-school-timing.php',
type: "POST",
data: {tm_ins:timIns,tm_ot:timOuts,scl_iedes:schlCdes},
success:function(resulttime){
if(resulttime == 1){
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
  title: 'School Timing Successfully Apply!'
})
$("#timFrm").trigger("reset");
document.location.reload();
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
  title: 'School Time is not Apply'
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
  </div>
</div>






<!-- Modal Session -->
<div class="modal fade" id="add-sesn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">Add session</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form id="sesnform" class="mb-4">
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize text-white">create session</label>
        <input id="sesin" class="form-control" type="text" placeholder="Create Session" onkeypress="isInputNumber(event)" maxlength="4">
        <input id="instidss" class="form-control" type="hidden" value="<?php echo $userId; ?>">
        <input id="instidssesn" class="form-control" type="hidden" value="<?php echo $userId; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize text-white">from</label>
        <input type="date" class="form-control" id="strtdte">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize text-white">to</label>
        <input type="date" class="form-control" id="enddte">
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
        <div class="d-grid">
            <button id="btn-sessn" class="text-uppercase btn btn-apna" type="submit"><i class="fa fa-save"></i> save</button>
        </div>    
    </div>
</div>
</form>
<div class="row">
    <div class="col-12">
<div id="table-session-data"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
function loadSession(){
    
    var instutosesn = $("#instidssesn").val();
    $.ajax({
        url: 'ajax/ajax-session-fetch-record.php',
        type: "POST",
        data:{codesclgesesn:instutosesn},
        success: function(result){
            $("#table-session-data").html(result);
        }
    });
}
loadSession();

        $("#btn-sessn").on('click',function(e){
            e.preventDefault();
            var sessns = $("#sesin").val();
            var instutsesn = $("#instidss").val();
            var strtDtes = $("#strtdte").val();
            var endDtes = $("#enddte").val();
         if(sessns == ""){
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
  icon: 'warning',
  title: 'Please Enter Your Session!'
})
         }else if(strtDtes == ""){
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
  icon: 'warning',
  title: 'Please Select Your Starting Date!'
})
         }else if(endDtes == ""){
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
  icon: 'warning',
  title: 'Please Select Your Ending Date!'
})
         }else{
$.ajax({
    url: 'ajax/ajax-session-insert.php',
    type: "POST",
    data: {sessn_titles:sessns,scholsesn_code:instutsesn,strt_dats:strtDtes,end_dats:endDtes},
    success: function(data){
    //$("#clsses").html(data);
if(data == 11){
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
  icon: 'warning',
  title: 'Session Already Submited!'
}) 
    $("#sesnform").trigger("reset"); loadSession();
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
  title: 'Session Successfully Submited!'
}) 
document.location.reload();
$("#sesnform").trigger("reset"); loadSession(); 
}else{ Swal.fire({ position: 'top-end', icon: 'error', title: 'Session is not Saved', showConfirmButton: false, timer: 1500 }); $("#sesnform").trigger("reset"); }
        
    }
});             
         }
        });
    });
</script>
      </div>
      
    </div>
  </div>
</div>


<!-- Modal Term -->
<div class="modal fade" id="add-trm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">Add Examination Type</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form id="terform" class="mb-3">
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
        <label class="text-capitalize text-white">Enter Examination Type</label>
        <input id="trms" class="form-control" type="text" placeholder="Enter Term / Samester / Month" autocomplete="off">
        <input id="instides" class="form-control" type="hidden" value="<?php echo $userId; ?>">
        <input id="instsmstr" class="form-control" type="hidden" value="<?php echo $userId; ?>">
        <input id="sesnso" class="form-control" type="hidden" value="<?php echo date("Y"); ?>">
        <input id="tmids" class="form-control" type="hidden" value="<?php echo rand(10,9999); ?>">
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
        <div class="d-grid">
            <button id="btntems" class="text-uppercase btn btn-apna" type="submit"><i class="fa fa-save"></i> save</button>
        </div>    
    </div>
</div>
</form>
<div class="row">
    <div class="col-12">
<div id="table-terms-data"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
function loadTerm(){
    
    var instsmster = $("#instsmstr").val();
    $.ajax({
        url: 'ajax/ajax-terms-fetch-record.php',
        type: "POST",
        data:{colgecodesmster:instsmster},
        success: function(result){
            $("#table-terms-data").html(result);
        }
    });
}
loadTerm();

        $("#btntems").on('click',function(e){
            e.preventDefault();
            var smasterscls = $("#trms").val();
            var shopids = $("#instides").val();
            var samasterid = $("#tmids").val();
            var sesnsofrm = $("#sesnso").val();
         if(smasterscls == ""){
Swal.fire({ position: 'top-end', icon: 'info', title: 'Your Field is Empty', showConfirmButton: false, timer: 1500 });
         }else{
$.ajax({
    url: 'ajax/ajax-terms-insert.php',
    type: "POST",
    data: {term_titles:smasterscls,term_ids:samasterid,instute_id:shopids,sesions_term:sesnsofrm},
    success: function(data){
    //$("#clsses").html(data);
if(data == 1){ 
    Swal.fire({ position: 'top-end', icon: 'success', title: 'Term / Samester / Month Successfully Submited', showConfirmButton: false, timer: 1500 }); 
    $("#terform").trigger("reset"); 
    loadTerm(); 
    document.location.reload();
}else{ Swal.fire({ position: 'top-end', icon: 'error', title: 'Term / Samester / Month is not Saved', showConfirmButton: false, timer: 1500 }); $("#terform").trigger("reset"); }
        
    }
});             
         }

          
        });
    });
</script>
      </div>
    </div>
  </div>
</div>

<!-- Modal Class -->
<div class="modal fade" id="add-clas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">Add Class</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form id="addfms">
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 mb-3">
        <label class="text-capitalize text-white">class name</label>
        <input id="clsnme" class="form-control" type="text" placeholder="Enter Class Name" autocomplete="off">
        <input id="instid" class="form-control" type="hidden" value="<?php echo $userId; ?>">
        <input id="instod" class="form-control" type="hidden" value="<?php echo $userId; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 mb-3">
        <label class="text-capitalize text-white">duration</label>
        <input type="text" class="form-control" autocomplete="off" id="drtn">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 mb-3 mt-4">
        <div class="d-grid">
            <button id="sve-btn" class="text-uppercase btn btn-apna" type="submit"><i class="fa fa-save"></i> save</button>
        </div>    
    </div>
</div>
</form>
<br>
<div class="row">
    <div class="col">
<div id="table-data"></div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
function loadclasses(){
    
    var instuto = $("#instod").val();
    $.ajax({
        url: 'ajax/ajax-class-fetch-record.php',
        type: "POST",
        data:{colgcod:instuto},
        success: function(result){
            $("#table-data").html(result);
        }
    });
}
loadclasses();

$("#sve-btn").on('click',function(e){
            e.preventDefault();
            var clased = $("#clsnme").val();
            var instut = $("#instid").val();
            var dratn = $("#drtn").val();
         if(clased == ""){
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
  icon: 'warning',
  title: 'Please Enter Your Class Name!'
})
         }else if(dratn == ""){
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
  icon: 'warning',
  title: 'Please Enter Your Duration!'
})
         }else{
$.ajax({
    url: 'ajax/ajax-class-insert.php',
    type: "POST",
    data: {class_titles:clased,schol_code:instut,duratin:dratn},
    success: function(data){
    //$("#clsses").html(data);
if(data == 1){ Swal.fire({ position: 'top-end', icon: 'success', title: 'Class Successfully Submited', showConfirmButton: false, timer: 1500 }); $("#addfms").trigger("reset"); loadclasses(); }else{ Swal.fire({ position: 'top-end', icon: 'error', title: 'Class is not Saved', showConfirmButton: false, timer: 1500 }); $("#addfms").trigger("reset"); }
        
    }
});             
         }

          
        });
    });
</script>
      </div>
    </div>
  </div>
</div>

<!-- Modal Section -->
<div class="modal fade" id="add-sectn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">Add section</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form id="sectnform">
<div class="row">    
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 mb-3">
        <label class="text-capitalize text-white fs-6">Class</label>
        <select class="form-select text-capitalize" id="clps">
            <option class="text-capitalize" value="">---select class---</option>
<?php
$sl_plos = mysqli_query($con,"select * from addClass where institute_id='$userId'");
while($clos = mysqli_fetch_array($sl_plos)){
    $id = $clos['id'];
    $class_name = $clos['class_name'];
?>
    <option class="text-capitalize" value="<?php echo $id; ?>"><?php echo $class_name; ?></option>
<?php } ?>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 mb-3">
        <label class="text-capitalize text-white fs-6">section name</label>
        <input id="sctnnme" class="form-control" type="text" placeholder="Enter Section Name" autocomplete="off">
        <input id="instiidsec" class="form-control" type="hidden" value="<?php echo $userId; ?>">
        <input id="instisctn" class="form-control" type="hidden" value="<?php echo $userId; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 mb-3">
        <label class="text-capitalize text-white fs-6">Class Capacity</label>
        <input id="nmbrs" class="form-control" type="text" placeholder="00" onkeypress="isInputNumber()" autocomplete="off">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 mb-3 mt-4">
        <div class="d-grid">
            <button id="sve-section-btn" class="text-uppercase btn btn-apna" type="submit"><i class="fa fa-save"></i> save</button>
        </div>    
    </div>
</div>
</form>
<div class="row">
    <div class="col-12">
        <div id="table-section-data"></div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
function loadsections(){
    
    var instutosectn = $("#instisctn").val();
    $.ajax({
        url: 'ajax/ajax-section-fetch-record.php',
        type: "POST",
        data:{sectn_colge_code:instutosectn},
        success: function(result){
            $("#table-section-data").html(result);
        }
    });
}
loadsections();

        $("#sve-section-btn").on('click',function(e){
            e.preventDefault();
            var sectnclas = $("#clps").val();
            var sectnsnmt = $("#sctnnme").val();
            var instutsecn = $("#instiidsec").val();
            var sectnnumbr = $("#nmbrs").val();
         if(sectnsnmt == "" || sectnclas == "" || sectnnumbr == ""){
Swal.fire({ position: 'top-end', icon: 'info', title: 'Your Field is Empty', showConfirmButton: false, timer: 1500 });
         }else{
$.ajax({
    url: 'ajax/ajax-section-insert.php',
    type: "POST",
    data: {section_class:sectnclas,sectn_title:sectnsnmt,school_code:instutsecn,section_numbr:sectnnumbr},
    success: function(data){
    //$("#clsses").html(data);
if(data == 1){ Swal.fire({ position: 'top-end', icon: 'success', title: 'Section Successfully Submited', showConfirmButton: false, timer: 1500 }); $("#sectnform").trigger("reset"); loadsections(); }else{ Swal.fire({ position: 'top-end', icon: 'error', title: 'Section is not Saved', showConfirmButton: false, timer: 1500 }); $("#sectnform").trigger("reset"); }
        
    }
});             
         }

          
        });
    });
</script>
    
</div>
      </div>
      
    </div>
  </div>
</div>

<!-- Modal Subject -->
<div class="modal fade" id="add-subj" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">Add Subject</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form id="sbjtform" class="mb-2">
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 mb-3">
        <label class="text-capitalize text-white">class</label>
        <select class="form-select text-capitalize" id="closid">
<?php
$sl_cl = mysqli_query($con,"select * from addClass where institute_id='$userId'");
$cnst = mysqli_num_rows($sl_cl);
if($cnst == 0){ echo "<div class='alert alert-success text-capitalize'>There are no class generate.</div>"; }
while($row = mysqli_fetch_array($sl_cl)){
    $id = $row['id'];
    $institute_id = $row['institute_id'];
    $class_name = $row['class_name'];
?>
<option value="<?php echo $id; ?>" class="text-capitalize"><?php echo $class_name; ?></option>
<?php } ?>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 mb-3">
        <label class="text-capitalize text-white">subject name</label>
        <input id="sujnme" class="form-control" type="text" placeholder="Enter Subject Name" autocomplete="off">
        <input id="institutesid" class="form-control" type="hidden" value="<?php echo $userId; ?>">
        <input id="institutesidpk" class="form-control" type="hidden" value="<?php echo $userId; ?>">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 mb-3 mt-4">
        <div class="d-grid">
            <button id="btnsujbts" class="text-uppercase btn btn-apna" type="submit"><i class="fa fa-save"></i> save</button>
        </div>    
    </div>
</div>
</form>
<div class="row">
    <div class="col-12">
        <div id="table-subjects-data"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
function loadSubjects(){
    
    var instsbj = $("#institutesidpk").val();
    $.ajax({
        url: 'ajax/ajax-subjects-fetch-record.php',
        type: "POST",
        data:{institue_sbjtid:instsbj},
        success: function(result){
            $("#table-subjects-data").html(result);
        }
    });
}
loadSubjects();

        $("#btnsujbts").on('click',function(e){
            e.preventDefault();
            var subjinstid = $("#institutesid").val();
            var subjtitle = $("#sujnme").val();
            var sbclsid = $("#closid").val();
         if(subjtitle == ""){
Swal.fire({ position: 'top-end', icon: 'info', title: 'Your Field is Empty', showConfirmButton: false, timer: 1500 });
         }else{
$.ajax({
    url: 'ajax/ajax-subject-insert.php',
    type: "POST",
    data: {subject_titles:subjtitle,institutes_id:subjinstid,sbjcls_id:sbclsid},
    success: function(data){
    //$("#clsses").html(data);
if(data == 1){ 
    Swal.fire({ position: 'top-end', icon: 'success', title: 'Subject Successfully Submited', showConfirmButton: false, timer: 1500 }); 
    $("#sbjtform").trigger("reset"); 
    loadSubjects(); 
    //document.location.reload(); 
}else{ Swal.fire({ position: 'top-end', icon: 'error', title: 'Subject is not Saved', showConfirmButton: false, timer: 1500 }); $("#sbjtform").trigger("reset"); }
        
    }
});             
         }

          
        });
    });
</script>
      </div>
    </div>
  </div>
</div>



