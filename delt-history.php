<?php
require_once("source/head-section.php");

if (isset($_GET['id'])){

	$ids = $_GET['id'];

	$del = mysqli_query($con,"DELETE FROM new_admission_collection where id = '$ids'");

	if ($del){
header("Location: new-admission-history");		
	} else {
header("Location: new-admission-history");
	}
}
require_once("source/foot-section.php");
?>