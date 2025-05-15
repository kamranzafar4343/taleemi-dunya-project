<?php
require_once("functions/db.php");

if (isset($_GET['id'])){

	$ids = $_GET['id'];
	$files = $_GET['files'];
    $dir = "social-post";

$selcts = mysqli_query($con,"select * from socialPost where id= {$ids}");
$row = mysqli_fetch_assoc($selcts);

unlink("social-post/".$row['post_name']);

	$del = mysqli_query($con,"DELETE FROM socialPost where id = '$ids'");

	if ($del){
		echo "<script>  
alert('Your Record Removed!');
		</script>";
header("Location: social-post-manager");
	} else {
echo "<script>
alert('Your Record is not Removed!');
		</script>";
header("Location: social-post-manager");
	}
}
?>