<?php
require_once("source/head-section.php");

if (isset($_GET['id'])){

	$ids = $_GET['id'];
	$isntids = $_GET['isntids'];

	$del = mysqli_query($con,"DELETE FROM attandance where date='$ids' && instituteId='$isntids'");

	if ($del){
		echo "<script>  
alert('Your Record Removed!');
		</script>";
header("Location: today-attendance");		
	} else {
echo "<script>
alert('Your Record is not Removed!');
		</script>";
header("Location: today-attendance");
	}
}
require_once("source/foot-section.php");
?>