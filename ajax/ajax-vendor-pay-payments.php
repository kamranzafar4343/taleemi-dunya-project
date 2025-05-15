<?php
require_once("../functions/db.php");

$vd_ide = $_POST['vd_ide'];
$inst_cdes = $_POST['inst_cdes'];
$vndr_names = $_POST['vndr_names'];
$totl_amnts = $_POST['totl_amnts'];
$recvede = $_POST['recvede'];
$t_blcne = $_POST['t_blcne'];
$totl_rev = $_POST['totl_rev'];
$moth = date("m");
$dtes = date("j-m-Y");
$pymtid = rand(10,100000);
$yrs = date("Y");

$inst_pymt = mysqli_query($con,"insert into stockPaidForm (vendId,instituteId,vendr_name,total_amount,received,balance,total_received,month,date,paymentId,session) values('$vd_ide','$inst_cdes','$vndr_names','$totl_amnts','$recvede','$t_blcne','$totl_rev','$moth','$dtes','$pymtid','$yrs')");
if($inst_pymt == true){ echo 1; }else{ echo 0; }

?>