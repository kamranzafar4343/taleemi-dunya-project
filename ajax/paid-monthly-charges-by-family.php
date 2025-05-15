<?php
require_once("../functions/db.php");

$fmly_nbr = $_POST['fmly_nbr'];
$inst_id = $_POST['inst_id'];
$user_role = $_POST['user_role'];
$aply_months = $_POST['aply_months'];
$aply_sesions = $_POST['aply_sesions'];


$sel_fee = mysqli_query($con,"select * from fee_collection where familyId='$fmly_nbr' && instituteId='$inst_id' && month='$aply_months' && session='$aply_sesions' && challan_status='monthly'");
if(mysqli_num_rows($sel_fee)>0){
    while($rows=mysqli_fetch_array($sel_fee)){
$feid = $rows['id'];
$instituteId = $rows['instituteId'];
$student_imgs = $rows['student_imgs'];
$familyId = $rows['familyId'];
$rollno = $rows['rollno'];
$session = $rows['session'];
$student_name[] = $rows['student_name'];
$father_name = $rows['father_name'];
$class = $rows['class'];
$section = $rows['section'];
$monthly_fee[] = $rows['monthly_fee'];
$discounts = $rows['discounts'];
$fine = $rows['fine'];
$previous_balance = $rows['previous_balance'];
$total_amount = $rows['total_amount'];
$receive_monthly = $rows['receive_monthly'];
$remaing_balance = $rows['remaing_balance'];
$fees_status = $rows['fees_status'];
$month = $rows['month'];
$dates = $rows['dates'];
$monthName = date("F", mktime(0, 0, 0, $month, 10));


$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
}
}else{ echo ""; }
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 mb-3">
            <div class="row bg-apna" style="border:1px solid hsl(25, 100%, 50%);">
<div class="col-12">
            <h6 class="fs-5 text-uppercase py-1 fw-bold text-center"> "<?php echo $father_name; ?>" monthly fee submission</h6>
<form method="post" enctype="multipart/form-data">
<div class="row py-3" style="background-color:hsl(0,0%,15%);">   
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Receive Date</label>
        <input type="date" class="form-control">
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Session</label>
        <select class="form-select">
<?php
$sel_sesin = mysqli_query($con,"select * from addSession where institute_id='$instituteId' order by id desc");
if(mysqli_num_rows($sel_sesin)>0){
    while($sesins = mysqli_fetch_array($sel_sesin)){
        $session = $sesins['session'];
echo "<option>$session</option>";
    }
}else{ echo "<option>Session Not Create!</option>"; }
?>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mb-3">
        <label class="text-capitalize">Account Type</label>
        <select class="form-select text-capitalize" id="acttype">
            <option class="text-capitalize">Cash</option>
            <option class="text-capitalize">Bank</option>
            <option class="text-capitalize">JazzCash</option>
            <option class="text-capitalize">easyPaisa</option>
            <option class="text-capitalize">Upaisa</option>
        </select>
    </div>
    <div class="col-12 mb-3">
<table class="table table-responsive w-100 myTables">
    <thead>
        <tr class="bg-apna">
            <th>Sr#</th>
            <th>Roll#</th>
            <th>St.Name</th>
            <th>Class</th>
            <th>Section</th>
            <th>Monthly Fee</th>
            <th>Previous</th>
            <th>C.Fee</th>
            <th>Receiving</th>
            <th>Remaining</th>
        </tr>
    </thead>
    <tbody>
<?php
$re=1;
$sel_mnth = mysqli_query($con,"select * from fee_collection where familyId='$fmly_nbr' && instituteId='$inst_id' && month='$aply_months' && session='$aply_sesions' && challan_status='monthly'");
while($re <= 100000 && $fes = mysqli_fetch_array($sel_mnth)){
    $ides = $fes['id'];
    $rollno = $fes['rollno'];
    $student_name = $fes['student_name'];
    $class = $fes['class'];
    $section = $fes['section'];
    $monthly_fee = $fes['monthly_fee'];
    $previous_balance = $fes['previous_balance'];
    $totls = $monthly_fee + $previous_balance;
    $totling += $monthly_fee + $previous_balance;
    
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$instituteId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];    
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td><?php echo $re++; ?></td>
    <td><?php echo $rollno; ?></td>
    <td class="text-capitalize"><?php echo $student_name; ?></td>
    <td class="text-capitalize"><?php echo $class_name; ?></td>
    <td class="text-capitalize"><?php echo $section; ?></td>
    <td><input readonly value="<?php echo $monthly_fee; ?>" class="form-control" name="mnthlyfe[]" onkeypress="isInputNumber(event)" placeholder="00"></td>
    <td><input readonly value="<?php echo $previous_balance; ?>" name="prvblnce[]" class="form-control" onkeypress="isInputNumber(event)" placeholder="00"></td>
    <td><input readonly class="form-control" onkeypress="isInputNumber(event)" id="totls" name="totl[]" placeholder="00" value="<?php echo $totls; ?>"></td>
    <td><input class="form-control" onkeypress="isInputNumber(event)" id="recvd" onkeyup="subtrctValues()" name="recvd[]" placeholder="00"></td>
    <td><input class="form-control" onkeypress="isInputNumber(event)" id="blnce" name="remang[]" placeholder="00"></td>
    <input type="hidden" name="idms[]" value="<?php echo $ides; ?>">
</tr>
<?php } ?>
<tr style='background:hsl(35, 100%, 80%);'>
    <th colspan="9" class="fs-4">Total Marks</th>
    <td colspan="1" class="fs-4"><?php echo $totling; ?></td>
</tr>
    </tbody>
</table>
    </div>
    <div class="d-grid">
        <button class="btn btn-apna text-uppercase" id="btnpeid" type="submit">
            <i class="fa-solid fa-plus"></i> receive Family Charges
        </button>
    </div>
</div>
</form>
<script>
$(document).ready(function(){
    $("#btnpeid").on('click',function(e){
e.preventDefault();
var acttype = $("#acttype").val();
var mnthlyfe = [];
 $('input[name="mnthlyfe[]"]').each(function(){
     mnthlyfe.push(this.value);
 });
var prvblnce = [];
 $('input[name="prvblnce[]"]').each(function(){
     prvblnce.push(this.value);
 });
var totl = [];
 $('input[name="totl[]"]').each(function(){
     totl.push(this.value);
 });
var recvd = [];
 $('input[name="recvd[]"]').each(function(){
     recvd.push(this.value);
 });
 
var remang = [];
 $('input[name="remang[]"]').each(function(){
     remang.push(this.value);
 });

var idms = [];
 $('input[name="idms[]"]').each(function(){
     idms.push(this.value);
 });

alert(idms);

    });
});
</script>
    
</div>
            </div>
        </div>
<!------Receive Other Charges Modal----------->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mb-3 datas">
<div class="student-fee-history"></div>       
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
<div align='right' class='p-5'>
  <button class='btn btn-success' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
    </div>
</div>  