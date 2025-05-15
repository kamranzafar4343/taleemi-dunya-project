<?php
$servername = "localhost";
// $users = "u720239079_taleemiportal";
$users = "root";
// $passwrd = "3f:oR*NP";
$passwrd = "";
$bdname = "u720239079_taleemi";

$con = mysqli_connect($servername, $users, $passwrd, $bdname);

if ($con) {
} else {
	die("Conecction Faild!") . mysqli_connect_error();
}
