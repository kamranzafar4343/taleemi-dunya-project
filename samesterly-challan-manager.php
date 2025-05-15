<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#chlan-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"> <i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> installment challan manager</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <form class="chlnFrm">
<div class="row">
    <div class="col-12 col-sm-6 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">class</label>
<select class="form-select text-uppercase" id="cls">
    <option class="text-capitalize" value="">---select class---</option>
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
    <div class="col-12 col-sm-6 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
<label class="text-capitalize text-white">Section</label>
<select class="form-select text-capitalize" id="strngs"><option value=" ">---select section---</option></select>
    </div>
<script>
    /// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instutes').value;
//    console.log(class_name);
 
$.ajax({
   url:'ajax/class-strength.php',
   type:"POST",
   data:{class_title:class_name,institute_code:insti},
   success: function(result){
       $('#strngs').html(result);
      //console.log(result);
   }
    });
});
</script>
    <div class="col-12 col-sm-6 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <input type="hidden" value="<?php echo $userId; ?>" id="instutes">
        <label class="text-capitalize">session</label>
<select id="sesn" class="form-select text-capitalize">
<?php
$cls_mnger = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
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
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
        <label class="text-capitalize">month</label>
        <select class="form-select text-capitalize" id="mnt">
            <option class="text-capitalize" value="<?php echo date("m"); ?>"><?php echo date("F"); ?></option>
            <option class="text-capitalize devider"></option>
            <option class="text-capitalize" value="01">Jun</option>
            <option class="text-capitalize" value="02">Fab</option>
            <option class="text-capitalize" value="03">March</option>
            <option class="text-capitalize" value="04">April</option>
            <option class="text-capitalize" value="05">may</option>
            <option class="text-capitalize" value="06">june</option>
            <option class="text-capitalize" value="07">july</option>
            <option class="text-capitalize" value="08">aug</option>
            <option class="text-capitalize" value="09">sep</option>
            <option class="text-capitalize" value="10">oct</option>
            <option class="text-capitalize" value="11">nov</option>
            <option class="text-capitalize" value="12">dec</option>
        </select>
    </div>
    
    <div class="col-12 col-sm-6 col-md-3 col-lg-2 col-xl-2 col-xxl-2 mt-4">
        <div class="d-grid">
            <button id="btngenchln" type="submit" class="btn btn-apna text-uppercase"><i class="fas fa-redo"></i> Generate</button>
        </div>
    </div>    
</div>
    </form>
<br><br>
<div class="challan-class-wise-monthly"></div>
<script>
$(document).ready(function(){
    $("#btngenchln").on('click',function(e){
e.preventDefault();
var cls = $("#cls").val();
var strngs = $("#strngs").val();
var instutes = $("#instutes").val();
var sesn = $("#sesn").val();
var mnt = $("#mnt").val();

if(cls == ""){
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
  title: 'Please Select Class!'
})
}else if(strngs == ""){
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
}else{
    $.ajax({
url: 'ajax/fetch-samesterly-challan-manager.php',
type: "POST",
data: {cless:cls,sectn:strngs,inst_id:instutes,sesns:sesn,mnths:mnt},
success: function(results){
    $(".challan-class-wise-monthly").html(results);
}
    });
}


    });
});
</script>
<div class="row">
		<div class="col-12 well" align="right">
			<span class="rows_selected btn btn-success text-capitalize" id="select_count">0 Selected</span>
			<a type="button" id="delete_records" class="btn btn-danger pull-right text-uppercase"><i class="fa fa-trash-alt"></i> Delete</a>
		</div>
</div>	
<script>
   $(document).on('click', '#select_all', function() {          	
		$(".emp_checkbox").prop("checked", this.checked);
		$("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
	});	
	$(document).on('click', '.emp_checkbox', function() {		
		if ($('.emp_checkbox:checked').length == $('.emp_checkbox').length) {
			$('#select_all').prop('checked', true);
		} else {
			$('#select_all').prop('checked', false);
		}
		$("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
	});  
	
// delete selected records
$('#delete_records').on('click', function(e) { 
	var employee = [];  
	$(".emp_checkbox:checked").each(function() {  
		employee.push($(this).data('emp-id'));
	});	
	if(employee.length <=0)  {  
		alert("Please select records.");  
	}  
	else { 	
		WRN_PROFILE_DELETE = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" row?";  
		var checked = confirm(WRN_PROFILE_DELETE);  
		if(checked == true) {			
			var selected_values = employee.join(","); 
			$.ajax({ 
				type: "POST",  
				url: "delete-multiple-challan.php",  
				cache:false,  
				data: 'emp_id='+selected_values,  
				success: function(response) {	
					// remove deleted employee rows
					var emp_ids = response.split(",");
					for (var i=0; i < emp_ids.length; i++ ) {						
						$("#"+emp_ids[i]).remove();
					}									
				}   
			});				
		}  
	}  
});	
	
</script>
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