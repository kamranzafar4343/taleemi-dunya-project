<?php
require_once("../functions/db.php");

$inqry_date = $_POST['inqry_date'];
$inst_nams = $_POST['inst_nams'];
$inst_typs = $_POST['inst_typs'];
$ownrs_name = $_POST['ownrs_name'];
$whats_aps = $_POST['whats_aps'];
$inq_areas = $_POST['inq_areas'];
$inq_status = $_POST['inq_status'];
$inq_flwup = $_POST['inq_flwup'];

$qry = mysqli_query($con,"insert into accountsInquiry(inq_date,institute_name,institute_type,owner_name,whatsapp,location,status,follow_up)values('$inqry_date','$inst_nams','$inst_typs','$ownrs_name','$whats_aps','$inq_areas','$inq_status','$inq_flwup')");
if($qry === true){ echo 1; }else{ echo 0; }
?>