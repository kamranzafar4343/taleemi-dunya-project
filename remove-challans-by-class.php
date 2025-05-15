<?php
require_once("source/head-section.php");

if (isset($_GET['id'])){

	$ids = $_GET['id'];
	$clessp = $_GET['clessp'];
	$sec = $_GET['sec'];
	$sesin = $_GET['sesin'];
	$mnh = $_GET['mnh'];
	$instidp = $_GET['instidp'];

	$del = mysqli_query($con,"DELETE FROM fee_collection where dates='$ids' && instituteId='$instidp' && class='$clessp' && section='$sec' && session='$sesin' && month='$mnh'");

	if ($del){
		echo "<script>  
alert('Your Record Removed!');
		</script>";
header("Location: challan-manager");		
	} else {
echo "<script>
alert('Your Record is not Removed!');
		</script>";
header("Location: challan-manager");
	}
}
require_once("source/foot-section.php");
?>