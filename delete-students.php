<?php
require_once("functions/db.php");

if(isset($_POST['emp_id'])) {
	$emp_id = trim($_POST['emp_id']);	
	$sql = "DELETE FROM addStudents WHERE id in ($emp_id)";
	$resultset = mysqli_query($con,$sql) or die("database error:". mysqli_error($con));
	echo $emp_id;
}
?>