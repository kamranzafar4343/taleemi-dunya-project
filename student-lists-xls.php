<?php 
include("functions/db.php"); 

if (isset($_GET['id'])){
    
   $ids = $_GET['id'];
   

$selct_clas = mysqli_query($con,"select * from addStudents where instituteId='$ids'");

$html = "<table><tr>
<th>AD.Date</th>
<th>Family#</th>
<th>Roll#</th>
<th>Class</th>
<th>Section</th>
<th>Medium</th>
<th>Session</th>
<th>Image</th>
<th>Student Name</th>
<th>B-Form</th>
<th>Gender</th>
<th>D-O-B</th>
<th>Address</th>
<th>Father Name</th>
<th>CNIC</th>
<th>Cell</th>
<th>M.Fee</th>
<th>Discount</th>
<th>Final Fee</th>
<th>Other Charges 1</th>
<th>Other Charges 2</th>
<th>Other Charges 3</th>
<th>Other Charges 4</th>
<th>Other Charges 5</th>
<th>Other Charges 6</th>
<th>Total</th>
<th>P.Balance</th>
</tr>";
    while($frms = mysqli_fetch_array($selct_clas)){
        
        $admissionDate = $frms['admissionDate'];
        $familyId = $frms['familyId'];
        $roll_num = $frms['roll_num'];
        $class = $frms['class'];
        $section = $frms['section'];
        $medium = $frms['medium'];
        $session = $frms['session'];
        $image = $frms['image'];
        $studentName = $frms['studentName'];
        $bForm = $frms['bForm'];
        $gender = $frms['gender'];
        $dateOfBirth = $frms['dateOfBirth'];
        $homeAddress = $frms['homeAddress'];
        $fatherName = $frms['fatherName'];
        $cnic = $frms['cnic'];
        $cell = $frms['cell'];
        $monthlyFee = $frms['monthlyFee'];
        $discount = $frms['discount'];
        $totalFee = $frms['totalFee'];
        $admissionFee = $frms['admissionFee'];
        $annualFund = $frms['annualFund'];
        $books = $frms['books'];
        $uniform = $frms['uniform'];
        $stationary = $frms['stationary'];
        $others = $frms['others'];
        $totalAmount = $frms['totalAmount'];
        $previous_session_fee = $frms['previous_session_fee'];
            
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$ids' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$html .= "<tr>
<td>$admissionDate</td>
<td>$familyId</td>
<td>$roll_num</td>
<td>$class_name</td>
<td>$section</td>
<td>$medium</td>
<td>$session</td>
<td>$image</td>
<td>$studentName</td>
<td>$bForm</td>
<td>$gender</td>
<td>$dateOfBirth</td>
<td>$homeAddress</td>
<td>$fatherName</td>
<td>$cnic</td>
<td>$cell</td>
<td>$monthlyFee</td>
<td>$discount</td>
<td>$totalFee</td>
<td>$admissionFee</td>
<td>$annualFund</td>
<td>$books</td>
<td>$uniform</td>
<td>$stationary</td>
<td>$others</td>
<td>$totalAmount</td>
<td>$previous_session_fee</td>

</tr>";
    }
$html .="</table>";
header('Content-Type:application/xlsx');
header('Content-Desposition:attachment;filename=all-student-record.xlsx');
echo $html;
                    }
?>