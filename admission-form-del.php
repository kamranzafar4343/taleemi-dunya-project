<?php

require_once("source/head-section.php");

if (isset($_GET['id'])){

	$ids = $_GET['id'];

	$del = mysqli_query($con,"DELETE FROM addStudents where id = '$ids'");

	if ($del){
		echo "<script>
alert('Your Record Removed!');
		</script>";
header("Location: class-wis-student-lists");		
	} else {
echo "<script>
alert('Your Record is not Removed!');
		</script>";
		header("Location: class-wis-student-lists");
	}
}
require_once("source/foot-section.php");
?>