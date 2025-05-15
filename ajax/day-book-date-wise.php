<?php
require_once("../functions/db.php");

$daily_dates = $_POST['daily_dates'];
$inst_ids = $_POST['inst_ids'];

$frmt = explode("-",$daily_dates);
$dtes = $frmt['2'];
$mnth = $frmt['1'];
$yers = $frmt['0'];
$frmtdte = $dtes."-".$mnth."-".$yers;

$sel_dy = mysqli_query($con,"select * from dayBook where institute_id='$inst_ids' && date='$frmtdte'");
if(mysqli_num_rows($sel_dy)>0){
?>
<br>
<div class="edit-day-book"></div>
<div class="row">
    <div class="col-12">
        <table class="table w-100" style="background-color:hsla(35,100%,80%,1);">
<thead>
    <tr class="bg-apna">
        <th><input type="checkbox" id="select_all"></th>
        <th>Sr#</th>
        <th>Date</th>
        <th>User ID#</th>
        <th>User</th>
        <th>Type</th>
        <th>Narration</th>
        <th>Income</th>
        <th>Expense</th>
        <th>Month</th>
        <th>Session</th>
        <th colspan="2">Action</th>
    </tr>
</thead>
<tbody>
<?php
$rts = 1;
while($rts <= 10000 && $dts = mysqli_fetch_array($sel_dy)){
    $ids = $dts['id'];
    $user_id = $dts['user_id'];
    $image = $dts['image'];
    $user_name = $dts['user_name'];
    $user_id = $dts['user_id'];
    $account_type = $dts['account_type'];
    $narration = $dts['narration'];
    $income = $dts['income'];
    $expense = $dts['expense'];
    $date = $dts['date'];
    $month = $dts['month'];
    $session = $dts['session'];
    $role = $dts['role'];
    $monthName = date("M", mktime(0, 0, 0, $month, 10));
?>
<tr>
    <td><input type="checkbox" class="emp_checkbox" data-emp-id="<?php echo $ids; ?>"></td>
    <td><?php echo $rts++; ?></td>
    <td><?php echo $date; ?></td>
    <td><?php echo $user_id; ?></td>
    <td><?php echo $user_name; ?></td>
    <td><?php echo $account_type; ?></td>
    <td><?php echo $narration; ?></td>
    <td><?php echo $income; ?></td>
    <td><?php echo $expense; ?></td>
    <td><?php echo $monthName; ?></td>
    <td><?php echo $session; ?></td>
    <td><a href="#" class="dyedits" rowid="<?php echo $ids; ?>"><i class="fa fa-edit text-success"></i></a></td>
    <td><a href="#" class="dydel" rowid="<?php echo $ids; ?>"><i class="fa fa-trash-alt text-danger"></i></a></td>
</tr>
<?php } 
$selctIncme = mysqli_query($con,"select SUM(income) as icmes from dayBook where institute_id='$inst_ids' && date='$frmtdte'");
while($icm = mysqli_fetch_array($selctIncme)){
    $icmes = $icm['icmes'];
}

$selctExpnse = mysqli_query($con,"select SUM(expense) as expnse from dayBook where institute_id='$inst_ids' && date='$frmtdte'");
while($expo = mysqli_fetch_array($selctExpnse)){
    $expnse = $expo['expnse'];
}
?>

<tr>
    <th class="fs-4 fw-bold" colspan="3">Total Income</th>
    <th class="fs-4 fw-bold" colspan="3"><?php echo $icmes; ?></th>
    <th class="fs-4 fw-bold" colspan="3">Total Expense</th>
    <th class="fs-4 fw-bold" colspan="3"><?php echo $expnse; ?></th>
</tr>
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
				url: "delete-multiple-daybook-record.php",  
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
<?php }else{ echo "<div class='alert alert-danger'>There are no Record found!</div>"; }  ?>

<script>
$(document).ready(function(){
/// Day Book Entry Edit Start
$(".dyedits").on('click',function(e){
e.preventDefault();
edtids = $(this).attr("rowid");
$.ajax({
url:'ajax/edit-day-book-record.php',
type: "POST",
data: {edit_idps:edtids},
success: function(edtsids){ $(".edit-day-book").html(edtsids); }
    });
});
/// Day Book Entry Edit End

/// Day Book Entry Delete Start
    $(".dydel").on('click',function(e){
e.preventDefault();
dayid = $(this).attr("rowid");

$.ajax({
    url: 'ajax/delete-daybook-by-id.php',
    type: "POST",
    data: {dels_id:dayid},
    success: function(datswises){
if(datswises == 1){
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
  title: "Record Successfully Submited!"
});
}else{
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
  icon: "info",
  title: "Query is not Removed!"
}); 
}
    }
});
    });
/////// Day Book Entry Delete End
});
</script>