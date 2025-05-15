<?php

require_once("functions/db.php");

if (isset($_GET['id'])){
	$ids = $_GET['id'];
	$del = mysqli_query($con,"DELETE FROM confirmSchools where id='$ids'");
if ($del){ echo "<script>alert('Your Record Removed!');</script>"; header("Location: user-manager"); } else { echo "<script>alert('Your Record is not Removed!');</script>"; header("Location: user-manager"); }
}
?>