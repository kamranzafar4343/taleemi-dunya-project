<?php
require_once("../functions/db.php");

$inst_id = $_POST['inst_id'];
$aply_cls = $_POST['aply_cls'];
$aply_sectn = $_POST['aply_sectn'];
$apl_sesin = $_POST['apl_sesin'];
$dtes = $_POST['dtes'];

$a=1;

$slAtendcne = mysqli_query($con,"select * from attandance where instituteId='$inst_id' && class='$aply_cls' && section='$aply_sectn' && session='$apl_sesin' && date='$dtes'");
if(mysqli_num_rows($slAtendcne)>0){
?>
<table class="w-100" style="background-color:hsl(35,100%,80%);">
<tr align="center" class="bg-apna">
    <th>Sr.No</th>
    <th><input type="checkbox" id="select_all"></th>
    <th>Date</th>
    <th>Image</th>
    <th>Student Name</th>
    <th>Father Name</th>
    <th>Class</th>
    <th>Section</th>
    <th>Session</th>
    <th>Roll No.</th>
    <th>Status</th>
    <th>Edit</th>
</tr>
<?php
    while($a <= 100000 && $result = mysqli_fetch_array($slAtendcne)){
$ides = $result['id'];
$instituteId = $result['instituteId'];
$studentName = $result['stu_name'];
if(!empty($result['student_img'])){ $fimage = $result['student_img']; }else{ $fimage = "users.jpg"; }
$fatherName = $result['father_name'];
$class = $result['class'];
$section = $result['section'];
$session = $result['session'];
$roll_num = $result['roll_no'];
$status = $result['status'];
$date = $result['date'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<form class="updtFrm">
<tr align="center" style="background:hsl(35, 100%, 80%);">
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $a++; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><input type="checkbox" class="emp_checkbox" data-emp-id="<?php echo $ides; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $date; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" width="50"><img class="img-fluid" src="student_imgs/<?php echo $fimage; ?>"></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $studentName; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-capitalize"><?php echo $fatherName; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $class_name; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);" class="text-uppercase"><?php echo $section ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $session; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $roll_num; ?></td>
    <input type="hidden" value="<?php echo $st_date; ?>" id="stdte">
    <td style="border:1px solid hsl(25, 100%, 50%);"><?php echo $status; ?></td>
    <td style="border:1px solid hsl(25, 100%, 50%);">
        <button class="btn updtebtn" rowid="<?php echo $ides; ?>"><i class="fa fa-edit text-success"></i></button>
    </td>
</tr>
<?php
    }
?>
</form></table>
<?php }else{ echo "<div class='alert alert-danger text-capitalize'>there are no record found!</div>"; } ?>

<div class="row mt-5">
	<div class="col-12 well" align="right">
		<span class="rows_selected btn btn-success text-capitalize" id="select_count">0 Selected</span>
		<a type="button" id="delete_records" class="btn btn-danger pull-right text-uppercase"><i class="fa fa-trash-alt"></i> Delete</a>
	</div>
</div>
<script>
$(document).on('click','.updtebtn',function(){

var ids = $(this).attr("rowid");

$.ajax({
    url: 'ajax/update-attendance.php',
    type: "POST",
    data:{st_id:ids},
    success: function(datas){
$(".updte-section").html(datas);
    }
    
});
    });
</script>
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
				url: "delete-attendance.php",  
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