<?php
require_once("../functions/db.php");

$fe_ids = $_POST['fe_id'];
$previus = $_POST['previus'];
$disc = $_POST['disc'];
$fnes = $_POST['fnes'];
$evy_month = $_POST['evy_month'];
$duesd_dates = $_POST['duesd_dates'];
$aply_sesion = $_POST['aply_sesion'];

$updte_pey = mysqli_query($con,"update fee_collection set session='$aply_sesion',previous_balance='$previus',discounts='$disc',fine='$fnes',month='$evy_month',due_dates='$duesd_dates' where id='$fe_ids'");

if($updte_pey == true){ echo 1; }else{ echo 0; }

?>