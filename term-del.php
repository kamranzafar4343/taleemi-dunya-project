<?php

require_once("source/head-section.php");

if (isset($_GET['id'])){

	$ids = $_GET['id'];

	$del = mysqli_query($con,"DELETE FROM addTerms where id = '$ids'");

	if ($del){
header("Location: terms-manager");		
	} else {
header("Location: terms-manager");
	}
}
require_once("source/foot-section.php");
?>