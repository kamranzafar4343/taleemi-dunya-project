<?php
require_once("../functions/db.php");

$institute_names = $_POST['institute_names'];
$res=1;
$html="";
$sel_inst = mysqli_query($con,"select * from confirmSchools where owner_name LIKe '%$institute_names%' || institute_name LIKe '%$institute_names%'");
$html = '<table class="table table-responsive table-striped table-bordered w-100"><tr><th>#</th><th>Joining Date</th><th>Logo</th><th>ID#</th><th>Institute Name</th><th>Owner Name</th><th>Contact</th></tr>';
while($res <= 10000 && $results = mysqli_fetch_assoc($sel_inst)){
$joining_date = $results['joining_date'];
$logo = $results['logo'];
$institute_id = $results['institute_id'];
$institute_name = $results['institute_name'];
$owner_name = $results['owner_name'];
$phone = $results['phone'];

$html .= '<tr><td>'.$res++.'</td><td>'.$joining_date.'</td><td>'.$logo.'</td><td>'.$institute_id.'</td><td>'.$institute_name.'</td><td>'.$owner_name.'</td><td>'.$phone.'</td></tr>';
}
$html .= "</table>";
echo $html;
?>
