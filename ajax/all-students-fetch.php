<?php
require_once("../functions/db.php");

$schl_id = $_POST['schl_id'];
?>
<style>
.stckbtn, .lftbtns{ cursor: pointer; }
</style>
<script>
     $(document).ready(function(){
    $("#allstudents").DataTable({
        columnDefs: [{
            "defaultContent": "-",
            "targets": "_all"
        }],
        bLengthChange: true,
        lengthMenu: [[10, 50, 100, -1], [10, 50, 100, "All"]],
        bFilter: true,
        bSort: true,
        bPaginate: true
    });
});
</script>
<div class="container-fluid mt-4">

<div class="row">
    <div class="col-12 mb-3" align="right">
<div class='input-group'>
  <a href="student-lists-xls?id=<?php echo $schl_id; ?>" class='btn btn-success text-uppercase'><i class="fa-regular fa-file-excel"></i> xls</a>
  <a href="student-lists-pdf?id=<?php echo $schl_id; ?> && instnme=<?php echo $instituteName; ?> && cpms=<?php echo $campus; ?> && logs=<?php echo $image; ?>" target="_blank" class='btn btn-danger text-capitalize'><i class="fa-solid fa-file-pdf"></i> PDF</a>
  <button class='btn btn-primary text-capitalize' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
    </div>
</div>
<script type="text/javascript">
$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>
    <div class="row">
        <div class="col datas">
<table class="bg-apna-body w-100" id="allstudents">
    <thead>
        <tr align="center" class="bg-apna">
            <th class="border-apna">#</th>
            <th class="border-apna"><input type="checkbox" id="select_all"></th>
            <th class="border-apna">A.D</th>
            <th class="border-apna" width="20">Image</th>
            <th class="border-apna">Student Name</th>
            <th class="border-apna">Father Name</th>
            <th class="border-apna">Family ID#</th>
            <th class="border-apna">Class</th>
            <th class="border-apna">Section</th>
            <th class="border-apna">Session</th>
            <th class="border-apna">Roll No.</th>
            <th class="border-apna">Cell</th>
            <th class="border-apna">Struck Off</th>
            <th class="border-apna">Left</th>
            <th class="border-apna">Challan</th>
            <th class="border-apna">Form</th>
            <th class="border-apna">App SMS</th>
            <th class="border-apna">SMS</th>
            <th class="border-apna">Whatsapp</th>
            <th class="border-apna">Edit</th>
            <th class="border-apna">Delete</th>
        </tr>
    </thead>
    <tbody>
<?php    
$b = 1;
$sl_stud = mysqli_query($con,"select * from addStudents where instituteId='$schl_id'");
$counts = mysqli_num_rows($sl_stud);
if($counts == 0){ echo "<div class='alert alert-danger text-uppercase'>there are no record here.</div>"; }
while($b <= 100000 && $rows = mysqli_fetch_array($sl_stud)){
$studntid = $rows['id'];
$instituteId = $rows['instituteId'];
$familyId = $rows['familyId'];
$admissionDate = $rows['admissionDate'];
$studentName = $rows['studentName'];
$frmimage = $rows['image'];
$fatherName = $rows['fatherName'];
$class = $rows['class'];
$section = $rows['section'];
$session = $rows['session'];
$roll_num = $rows['roll_num'];
$cells = $rows['cell'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$schl_id' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
?>
<tr align="center">
    <td class="border-apna"><?php echo $b++; ?></td>
    <td class="border-apna"><input type="checkbox" class="emp_checkbox" data-emp-id="<?php echo $studntid; ?>"></td>
    <td class="border-apna"><?php echo $admissionDate; ?></td>
    <td class="border-apna" width="20">
<img src="student_imgs/<?php if(empty($frmimage) || $frmimage == "none" || $frmimage == "None" || $frmimage == "NONE"){ echo "users.jpg"; }else{ echo $frmimage; } ?>" class="img-fluid" style="width:70%;">
    </td>
    <td class="border-apna text-capitalize"><?php echo $studentName; ?></td>
    <td class="border-apna text-capitalize"><?php echo $fatherName; ?></td>
    <td class="border-apna"><input type="text" value="<?php echo $familyId; ?>" readonly style="width:50px;font-size:0.8rem;"></td>
    <td class="border-apna text-uppercase"><?php echo $class_name; ?></td>
    <td class="border-apna text-uppercase"><?php echo $section; ?></td>
    <td class="border-apna"><?php echo $session; ?></td>
    <td class="border-apna">
        <input value="<?php echo $roll_num; ?>" type="text" readonly style="width:50px;font-size:0.8rem;">
    </td>
    <td class="border-apna"><?php echo $cells; ?></td>
    <td class="border-apna"><span class='nav-link stckbtn' rowid="<?php echo $studntid; ?>" style='color:hsl(261, 100%, 50%);'>Struck</span></td>
    <td class="border-apna"><span class='nav-link lftbtns' rowid="<?php echo $studntid; ?>" style='color:hsl(310,100%,50%);'>Left</span></td>
    <td class="border-apna"><a href='student-admission-challan?id=<?php echo $studntid; ?>' target="_blank" class='btn'><i class='fa-solid fa-file-invoice'></i></a></td>
    <td class="border-apna"><a class='btn' href='student-print-form?id=<?php echo $studntid; ?>' target="_blank" title='Student New Admission Form'><i class='fa-solid fa-table-columns text-primary'></i></a></td>
    <td class="border-apna"><a class='btn' href='individual-app-sms?id=<?php echo $studntid; ?>' title='Send App SMS' target="_blank"><i class='fa-regular fa-message text-danger'></i></a></td>
    <td class="border-apna"><a class='btn' href='sms-send-individual?id=<?php echo $studntid; ?>' target="_blank"><i class='fa-regular fa-comments text-info'></i></a></td>
    <td class="border-apna"><a href='whatsapp-individual-sender?id=<?php echo $studntid; ?>' target="_blank" class='btn'><i class='fa-brands fa-whatsapp text-success'></i></a></td>
    <td class="border-apna">
<?php if($schl_id == 705834){ ?>
<a href='computer-form-edit?id=<?php echo $studntid; ?>' target="_blank" class='btn'><i class='text-success fas fa-edit'></i></a>
<?php }else{ ?>
<a href='admission-form-edit?id=<?php echo $studntid; ?>' target="_blank" class='btn'><i class='text-success fas fa-edit'></i></a>
<?php } ?>

    </td>
    <td class="border-apna">
<?php if($schl_id == "758948"){ echo "<a href='#' class='btn'><i class='text-danger fas fa-trash'></i></a>"; }else{ ?>
        <a href='admission-form-del?id=<?php echo $studntid; ?>' class='btn'><i class='text-danger fas fa-trash-alt'></i></a>
<?php } ?>
    </td>
    <input type="hidden" value="<?php echo $schl_id; ?>" name="inst_id">
</tr>
<?php } ?>
 </tbody>
</table>

        </div>
    </div>
<div class="row">
	<div class="col-12 well" align="right">
		<span class="rows_selected btn btn-success text-capitalize" id="select_count">0 Selected</span>
		<a type="button" id="delete_records" class="btn btn-danger pull-right text-uppercase"><i class="fa fa-trash-alt"></i> Delete</a>
	</div>
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
				url: "delete-students.php",  
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