<?php
require_once("../functions/db.php");

$inst_ids = $_POST['inst_ids'];
$aply_mnths = $_POST['aply_mnths'];
$aply_sesin = $_POST['aply_sesin'];

$sel_schl = mysqli_query($con,"select * from confirmSchools where institute_id='$inst_ids'");
$ftch = mysqli_fetch_assoc($sel_schl);
$institute_name = $ftch['institute_name'];
$campus = $ftch['campus'];
$logos = $ftch['logo'];

$st=1;

$sel_chrges = mysqli_query($con,"select * from addChargesTitle where instituteId='$inst_ids'");
$chrgs = mysqli_fetch_assoc($sel_chrges);
$charges1 = $chrgs['charges1'];
$charges2 = $chrgs['charges2'];
$charges3 = $chrgs['charges3'];
$charges4 = $chrgs['charges4'];
$charges5 = $chrgs['charges5'];
$charges6 = $chrgs['charges6'];

$selct_list = mysqli_query($con,"select * from new_admission_collection where instituteId='$inst_ids' && month='$aply_mnths' && session='$aply_sesin' order by dates asc");
if(mysqli_num_rows($selct_list)>0){
?>
<div class="row">
    <div class="col-12 mb-3">
<table class="w-100" style="background-color:hsl(35,100%,80%);">
    <thead>
        <tr>
            <th width="60"><img src="portal-admins/institute-logos/<?php echo $logos; ?>" class="img-fluid"></th>
            <th colspan="11">
<h4 class="fs-4 fw-bolder text-uppercase text-center"><?php echo $institute_name; ?></h4>
<div class="text-center text-capitalize"><?php echo $campus; ?></div>
            </th>
        </tr>
        <tr align="center">
            <th style="border:1px solid black;">#</th>
            <th style="border:1px solid black;" width="40">Image</th>
            <th style="border:1px solid black;">Date</th>
            <th style="border:1px solid black;">Roll#</th>
            <th style="border:1px solid black;">Student Name</th>
            <th style="border:1px solid black;">Class</th>
            <th style="border:1px solid black;">Section</th>
            <th style="border:1px solid black;">
<?php if(!empty($charges1)){ echo $charges1; }else{ echo "Adm.Fee"; } ?>
            </th>
            <th style="border:1px solid black;">
<?php if(!empty($charges2)){ echo $charges2; }else{ echo "Anual fund"; } ?>
            </th>
            <th style="border:1px solid black;">
<?php if(!empty($charges3)){ echo $charges3; }else{ echo "Books"; } ?>
            </th>
            <th style="border:1px solid black;">
<?php if(!empty($charges4)){ echo $charges4; }else{ echo "Uniform"; } ?>
            </th>
            <th style="border:1px solid black;">
<?php if(!empty($charges5)){ echo $charges5; }else{ echo "Stationary"; } ?>
            </th>
            <th style="border:1px solid black;">
<?php if(!empty($charges6)){ echo $charges6; }else{ echo "Others"; } ?>
            </th>
            <th style="border:1px solid black;">Received</th>
            <th style="border:1px solid black;">Month</th>
        </tr>
    </thead>
    <tbody>
<?php
 while($st <= 100000 && $results = mysqli_fetch_array($selct_list)){
$dates = $results['dates'];
$roll_num = $results['roll_num'];
$class = $results['class'];
$section = $results['section'];
$image = $results['image'];
$studentName = $results['studentName'];
$fatherName = $results['fatherName'];
$admission_fee = $results['admission_fee'];
$annual_fund = $results['annual_fund'];
$books = $results['books'];
$unifrom = $results['unifrom'];
$stationary = $results['stationary'];
$others = $results['others'];
$totalAmount = $results['totalAmount'];
$receive_amount = $results['receive_amount'];
$balance_amuont = $results['balance_amuont'];
$total_collect_fee = $results['total_collect_fee'];
$totalAmount = $results['totalAmount'];
$month = $results['month'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$inst_ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_names = $rel['class_name'];
?>
<tr>
    <td style="border:1px solid black;"><?php echo $st++; ?></td>
    <td style="border:1px solid black;"><img src="student_imgs/<?php echo $image; ?>" class="img-fluid"></td>
    <td style="border:1px solid black;"><?php echo $dates; ?></td>
    <td style="border:1px solid black;"><?php echo $roll_num; ?></td>
    <td style="border:1px solid black;"><?php echo $studentName; ?></td>
    <td style="border:1px solid black;"><?php echo $class_names; ?></td>
    <td style="border:1px solid black;" class="text-capitalize"><?php echo $section; ?></td>
    <td style="border:1px solid black;"><?php echo $admission_fee; ?></td>
    <td style="border:1px solid black;"><?php echo $annual_fund; ?></td>
    <td style="border:1px solid black;"><?php echo $books; ?></td>
    <td style="border:1px solid black;"><?php echo $unifrom; ?></td>
    <td style="border:1px solid black;"><?php echo $stationary; ?></td>
    <td style="border:1px solid black;"><?php echo $others; ?></td>
    <td style="border:1px solid black;"><?php echo $receive_amount; ?></td>
    <td style="border:1px solid black;"><?php echo $month; ?></td>
</tr>
<?php }
$slct_list = mysqli_query($con,"select SUM(admission_fee) as admfees from new_admission_collection where instituteId='$inst_ids' && month='$aply_mnths' && session='$aply_sesin' order by dates asc");
while($sets=mysqli_fetch_array($slct_list)){
    $admfees = $sets['admfees'];
}
$slct_fnds = mysqli_query($con,"select SUM(annual_fund) as anulfunds from new_admission_collection where instituteId='$inst_ids' && month='$aply_mnths' && session='$aply_sesin' order by dates asc");
while($anul=mysqli_fetch_array($slct_fnds)){
    $anulfunds = $anul['anulfunds'];
}
$slct_bks = mysqli_query($con,"select SUM(books) as bokng from new_admission_collection where instituteId='$inst_ids' && month='$aply_mnths' && session='$aply_sesin' order by dates asc");
while($boks=mysqli_fetch_array($slct_bks)){
    $bokng = $boks['bokng'];
}
$slct_unfrms = mysqli_query($con,"select SUM(unifrom) as unfrms from new_admission_collection where instituteId='$inst_ids' && month='$aply_mnths' && session='$aply_sesin' order by dates asc");
while($unfms=mysqli_fetch_array($slct_unfrms)){
    $unfrms = $unfms['unfrms'];
}
$slct_stntry = mysqli_query($con,"select SUM(stationary) as stanry from new_admission_collection where instituteId='$inst_ids' && month='$aply_mnths' && session='$aply_sesin' order by dates asc");
while($statnry=mysqli_fetch_array($slct_stntry)){
    $stanry = $statnry['stanry'];
}
$slt_othrs = mysqli_query($con,"select SUM(others) as oths from new_admission_collection where instituteId='$inst_ids' && month='$aply_mnths' && session='$aply_sesin' order by dates asc");
while($othrs=mysqli_fetch_array($slt_othrs)){
    $oths = $othrs['oths'];
}
$slt_rcvd = mysqli_query($con,"select SUM(receive_amount) as recvd from new_admission_collection where instituteId='$inst_ids' && month='$aply_mnths' && session='$aply_sesin' order by dates asc");
while($rcvd=mysqli_fetch_array($slt_rcvd)){
    $recvd = $rcvd['recvd'];
}
?>
<tr>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"></td>
    <td style="border:1px solid black;"><?php echo $admfees; ?></td>
    <td style="border:1px solid black;"><?php echo $anulfunds; ?></td>
    <td style="border:1px solid black;"><?php echo $bokng; ?></td>
    <td style="border:1px solid black;"><?php echo $unfrms; ?></td>
    <td style="border:1px solid black;"><?php echo $stanry; ?></td>
    <td style="border:1px solid black;"><?php echo $oths; ?></td>
    <th style="border:1px solid black;"><?php echo $recvd; ?></th>
</tr>
    </tbody>
</table>
    </div>
</div>
<?php }else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; } ?>