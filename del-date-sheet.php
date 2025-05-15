<?php

require_once("source/head-section.php");

if (isset($_GET['id'])){

	$ids = $_GET['id'];

	$del = mysqli_query($con,"DELETE FROM dateSheet where code = '$ids'");

	if ($del){
		echo "<script>  
alert('Your Record Removed!');
		</script>";
header("Location: date-sheet-manager");		
	} else {
echo "<script>
alert('Your Record is not Removed!');
		</script>";
header("Location: date-sheet-manager");
	}
}
require_once("source/foot-section.php");
?>